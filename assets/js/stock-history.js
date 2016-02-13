$(function () {
    var range = []; // Defaults to 0-10

    var code = "", values = [], recent = "";

    $.ajax({
        url: '/movement/getMostRecent',
        dataType: 'JSON'
    }).done( function(data){
        recent = data;

        if ( location.pathname == "/stock" || location.pathname == "/stock/" )
            code = recent;
        else
            code = $("#stock_code").html();

        $.ajax({
            url: '/movement/getMovements/' + code,
            dataType: 'JSON'
        }).done( function(data){

            $.each(data, function( index, value ) {
                code = value.Code;
                var up_down = 1;

                if ( value.Action == "down" )
                    up_down = -1;

                values.push(parseInt(value.Amount) * up_down);
            });


            $('#temp-stocks').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'The BSX'
                },
                subtitle: {
                    text: 'Brought to you by The Mysterious Tomato'
                },
                xAxis: {
                    categories: range
                },
                yAxis: {
                    title: {
                        text: 'Price (peanuts)'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: code,
                    data: values
                }]
            }); //End of chart
        }); //End of movements
    }); //End of most recent
}); //End of document ready