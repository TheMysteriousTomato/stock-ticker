<h2 class="text-center underline">Players</h2>
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
