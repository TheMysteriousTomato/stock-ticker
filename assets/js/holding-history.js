$(function () {
    var range = []; // Defaults to 0-10
    var categories;
    var values;
    var series_data = [];

    var name = $("#playername").html();

    $.ajax({
        url: '/player/getTransactions/' + name,
        dataType: 'JSON'
    }).done( function(data){

        categories = data[0];
        values     = data[1];

        $.each(categories, function( index, value ) {
            var obj = new Object();
            obj.name = value;
            obj.data = values[index];
            series_data.push(obj);
        });

        $('#holdings-chart').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'The BSX'
                },
                xAxis: {
                    categories: ['Your Stocks']
                },
                credits: {
                    enabled: false
                },
                series: series_data
            }); //End of chart
    }); //End of ajax call
}); //End of document ready