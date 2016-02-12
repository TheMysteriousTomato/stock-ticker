
<h2 class="text-center underline">Players</h2>
{form}
{select}

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
    {ptrans}
    <tr>

        <td>{DateTime}</td>
        <td>{Player}</td>
        <td>{Stock}</td>
        <td>{Trans}</td>
        <td>{Quantity}</td>
    </tr>

    {/ptrans}
    </tbody>
</table>