<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchased a Stock</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
</head>
<body>
    <header class="page-header">
        <h1 class="text-center text-success">You Successfully Purchased: {amount}x &nbsp;{stock}</h1>
    </header>
    <div class="container text-center" style="margin-top: 10%">
        <h3>Redirecting back in <em><b>5</b></em></h3>
    </div>
    <script src="/assets/js/jQuery.min.js"></script>
    <script>
        $(document).ready(function(){
            setTimeout(function(){
                history.go(-1);
            }, 5000);
            setInterval(function(){
                var b = $("b");
                var n = b.html();
                b.html(--n);
            }, 1000);
        });
    </script>
</body>
</html>