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

    <!-- Switch Stylesheet -->
    <link rel="stylesheet" href="/assets/css/bootstrap-switch.min.css">

    <!-- jQuery -->
    <script src="/assets/js/jQuery.min.js"></script>

    <!-- Highcharts -->
    <script src="/assets/js/highcharts.js"></script>

    <!-- Module Export -->
    <script src="/assets/js/module-exporting.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="/assets/js/bootstrap.min.js"></script>

    <!-- Bootstrap Switch -->
    <script src="/assets/js/bootstrap-switch.min.js"></script>
</head>
<body>
    {header}
    {content}
    {footer}
</body>
</html>
