<h2 class="text-center underline">Transactions</h2>
<table class="table">
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
    <tr class="row-{Trans}">
        <td>{DateTime}</td>
        <td>{Player}</td>
        <td>{Stock}</td>
        <td>{Trans}</td>
        <td>{Quantity}</td>
    </tr>
    {/trans}
    </tbody>
</table>