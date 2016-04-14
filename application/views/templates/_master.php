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

    <!-- Check Server -->
    <script src="/assets/js/check-server.js"></script>
</head>
<body>
    {header}
    {content}
    {footer}

    <!-- Status Modal -->
    <div id="status-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><em>Current Server Status</em></h4>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>Round:</dt>
                        <dd><kbd id="status-round">{status-round}</kbd></dd>
                        <dt>State:</dt>
                        <dd><kbd id="status-desc">{status-desc}</kbd></dd>
                        <dt>Upcoming:</dt>
                        <dd><kbd id="status-upcoming">{status-upcoming}</kbd></dd>
                        <dt>Countdown:</dt>
                        <dd><kbd id="status-countdown">{status-countdown}</kbd></dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
