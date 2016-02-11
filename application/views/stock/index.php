<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


<table class="table">
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Category</th>
        <th>Value</th>
    </tr>
    {stocks}
    <tr>
        <td>{Code}</td>
        <td>{Name}</td>
        <td>{Category}</td>
        <td>{Value}</td>
    </tr>
    {/stocks}
</table>


<form method="post" accept-charset="utf-8" action="stock/search">
    <select name="dropdown" class="form-control" onchange="this.form.submit()">
    <?php

    foreach($stocks as $row){
        echo '<option value="'.$row->Code.'">'.$row->Code.'</option>';
    }
    ?>
</select>
</form>


</body>
</html>