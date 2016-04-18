<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Stock Ticker<i class="divider-vertical"></i></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
               
                <ul class="nav navbar-nav">
                    <li data-toggle="modal" data-target="#status-modal" class="status-link"><a href="javascript:void(0)">
                            <i class="fa fa-arrow-right" aria-hidden="true" style="color: forestgreen"></i>
                            Status
                            <i class="fa fa-arrow-left" aria-hidden="true" style="color: forestgreen"></i>
                        </a>

                    </li>
                    {menubar}
                </ul>

                <div class="nav navbar-nav navbar-right">
                    {login_control}
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>