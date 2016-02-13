<h2 class="text-center underline">Stocks</h2>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Timestamp</th>
        <th>Player</th>
        <th>Stock</th>
        <th>Action</th>
        <th>Quantity</th>
    </tr>
    </thead>
    <tbody>
    {trans}
    <tr class="row-{type}">
        <td>{DateTime}</td>
        <td>{Player}</td>
        <td>{Stock}</td>
        <td>{Trans}</td>
        <td>{Quantity}</td>
    </tr>
    {/trans}
    </tbody>
</table>