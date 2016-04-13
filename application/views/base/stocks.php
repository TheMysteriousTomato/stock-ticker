<h2 class="text-center underline">Stocks</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Category</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
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

<h2 class="text-center underline">5 Latest Movements</h2>
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
{status}
{round}
{/status}
