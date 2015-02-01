<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UPA</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
        <!--SCRIPT-->
        <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
        <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>

        <script src="js/setup.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                setupLeftMenu();
                setSidebarHeight();
                enviarpeticion();
            });
            function enviarpeticion() {
                $("#btnEnvia").click(function () {
                    alert("Handler for .click() called.");
                });
            }
        </script>
    </head>
    <body>
        <div class="container_12">
            <div class="grid_12 header-repeat">
                <div id="branding">
                    <div class="floatleft">
                        <img src="img/logo.png" alt="Logo" /></div>
                    <div class="floatright">
                        <div class="floatleft">
                            <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                        <div class="floatleft marginleft10">
                            <ul class="inline-ul floatleft">
                                <li>Hello Admin</li>
                                <li><a href="#">Config</a></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                            <br />
                            <span class="small grey">Last Login: 3 hours ago</span>
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </div>
            </div>
            <div class="clear">
            </div>
            <div class="grid_12">
                <ul class="nav main">
                    <li class="ic-dashboard"><a href="dashboard.html"><span>Dashboard</span></a> </li>
                    <li class="ic-form-style"><a href="javascript:"><span>Controls</span></a>
                        <ul>
                            <li><a href="form-controls.html">Forms</a> </li>
                            <li><a href="buttons.html">Buttons</a> </li>
                            <li><a href="form-controls.html">Full Page Example</a> </li>
                            <li><a href="table.html">Page with Sidebar Example</a> </li>
                        </ul>
                    </li>
                    <li class="ic-typography"><a href="typography.html"><span>Typography</span></a></li>
                    <li class="ic-charts"><a href="charts.html"><span>Charts & Graphs</span></a></li>
                    <li class="ic-grid-tables"><a href="table.html"><span>Data Table</span></a></li>
                    <li class="ic-gallery dd"><a href="javascript:"><span>Image Galleries</span></a>
                        <ul>
                            <li><a href="image-gallery.html">Pretty Photo</a> </li>
                            <li><a href="gallery-with-filter.html">Gallery with Filter</a> </li>
                        </ul>
                    </li>
                    <li class="ic-notifications"><a href="notifications.html"><span>Notifications</span></a></li>
                </ul>
            </div>
            <div class="clear">
            </div>
            <div class="grid_2">
                <div class="box sidemenu">
                    <div class="block" id="section-menu">
                        <ul class="section menu">
                            <li>
                                <a class="menuitem">Mantenimiento</a>
                                <ul class="submenu">
                                    <li><a href="view/personal.php" target="ifPagina" >Personal</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="grid_10">
                <iframe id="ifPagina" name="ifPagina" scrolling="auto" frameborder="0" style="width:100%;height:100%;"></iframe>
            </div>

            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div id="site_info">
            <p>
                Copyright <a href="http://www.templatescreme.com">BlueWhale Admin</a>. All Rights Reserved.
            </p>
        </div>
    </body>
</html>
