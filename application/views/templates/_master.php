<?php
if ( !defined( 'APPPATH' ) )
    exit ( 'No direct script acces allowed!' );
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{title}</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="/assets/css/temp.css">


    <!-- jQuery -->
    <script src="/assets/js/jQuery.min.js"></script>



    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    </head>
<body>
    {header}
    {content}
    {footer}

    <!-- Latest compiled and minified JavaScript -->
    <script src="/assets/js/bootstrap.min.js"></script>

</body>
</html>
