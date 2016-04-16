<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Closed</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
</head>
<body>
    <header class="page-header">
        <h1 class="text-center">The Game is Currently <span class="text-danger"><b>Closed</b></span></h1>
    </header>
    <div class="container text-center" style="margin-top: 10%">
        <h3>
            You will be redirected back when the game is setup.
        </h3>
        <br><br>
        <h4>or you can visit the homepage <a href="window.location.assign(window.location.origin)" class="btn btn-default">here</a></h4>
    </div>
    <script src="/assets/js/jQuery.min.js"></script>
    <script>
        $( document ).ready(function() {
            setInterval(update, 500);
            function update(){
                $.get("/homepage/status", function(){}).done(
                    function(data) {
                        if ( data["state"] == 2 || data["state"] == 3 )
                            window.location.assign(window.location.origin + "/gameplay");
                        //console.log(data);
                    }).fail(function(err) {
                        //console.error(err);
                    }
                );
            }
        });
    </script>
</body>
</html>