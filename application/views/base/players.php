<h2 class="text-center underline home-titles">Players</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Avatar</th>
            <th>Name</th>
            <th>Cash</th>
            <th>Equity</th>
        </tr>
    </thead>
    <tbody>
        {players}
        <tr>
            <td><img class="thumbnail" src="{avatar}" alt="{Player}" height="50px"></td>
            <td><a href={href}>{Player}</a></td>
            <td>{Cash}</td>
            <td>{Equity}</td
        </tr>
        {/players}
    </tbody>
</table>

<h2 class="text-center underline home-titles">5 Latest Transactions</h2>
<table class="table table-striped">
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
    {latesttransactions}
    <tr>
        <td><a href={href}>{DateTime}</a></td>
        <td>{Player}</td>
        <td>{Stock}</td>
        <td>{Trans}</td>
        <td>{Quantity}</td>
    </tr>
    {/latesttransactions}
    </tbody>
</table>

