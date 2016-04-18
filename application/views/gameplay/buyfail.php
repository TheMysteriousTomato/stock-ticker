<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Failed to Purchase a Stock</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
</head>
<body>
<header class="page-header">
    <h1 class="text-center text-danger">Failure to Purchase!</h1>
</header>
<div class="container text-center" style="margin-top: 10%">
    <h3 class="text-danger">Error: {error}</h3>
    <h3>Redirecting back in <em><b>5</b></em></h3>
</div>
<script src="/assets/js/jQuery.min.js"></script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
            history.go(-1);
        }, 5000);
        var x = setInterval(function(){
            var b = $("b");
            var n = b.html();
            b.html(--n);
            if (n == 0) clearInterval(x);
        }, 1000);
    });
</script>
</body>
</html>