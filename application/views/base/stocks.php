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
            <td><a href={href}>{code}</a></td>
            <td>{name}</td>
            <td>{category}</td>
            <td>{value}</td>
        </tr>
        {/stocks}
    </tbody>
</table>