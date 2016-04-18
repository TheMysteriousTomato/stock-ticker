<h2 class="text-center underline home-titles">Stocks</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Category</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody id="stocks-tbody">
        {stocks}
        <tr>
            <td><a href={href}>{Code}</a></td>
            <td>{Name}</td>
            <td>{Category}</td>
            <td>{Value}</td>
        </tr>
        {/stocks}
    </tbody>
</table>

<h2 class="text-center underline home-titles">5 Latest Movements</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Datetime</th>
            <th>Code</th>
            <th>Action</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
      {latestmovements}
        <tr>
            <td><a href={href}>{Datetime}</a></td>
            <td>{Code}</td>
            <td>{Action}</td>
            <td>{Amount}</td>
        </tr>
        {/latestmovements}

    </tbody>
</table>

<script>
    setInterval(function(){
        $.get("/gameplay/updatemarket", function(){}).done(
            function(data) {
                var body = $("#stocks-tbody");
                body.html("");
                $.each(data, function(k, v){
                    body.append("<tr>" +
                                    "<td><a href='/stock/display/'" + data[k]['Code'] + "> " + data[k]['Code'] + "</a></td>" +
                                    "<td>" + data[k]['Name']     + "</td>" +
                                    "<td>" + data[k]['Category'] + "</td>" +
                                    "<td>" + data[k]['Value']    + "</td>" +
                                "</tr>");
                });
            }).fail(function(err) {
                //console.error(err);
            }
        );
    }, 3500);
</script>