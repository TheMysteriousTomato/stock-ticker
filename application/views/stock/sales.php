<h2 class="text-center underline">Stocks</h2>
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
        <td>{datetime}</td>
        <td>{player}</td>
        <td>{stock}</td>
        <td>{trans}</td>
        <td>{quantity}</td>
    </tr>
    {/trans}
    </tbody>
</table>