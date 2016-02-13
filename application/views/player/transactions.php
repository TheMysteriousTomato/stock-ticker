<h2 class="text-center underline">Transactions</h2>
<table class="table">
    <thead>
    <tr>
        <th>DateTime</th>
        <th>Player</th>
        <th>Stock</th>
        <th>Trans</th>
        <th>Quantity</th>
    </tr>
    </thead>
    <tbody>
    {ptrans}
    <tr class="row-{Trans}">
        <td>{DateTime}</td>
        <td>{Player}</td>
        <td>{Stock}</td>
        <td>{Trans}</td>
        <td>{Quantity}</td>
    </tr>

    {/ptrans}
    </tbody>
</table>