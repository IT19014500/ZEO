<?php
  include('../../../connection.php');
  session_start();
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==6 || $_SESSION['ref']==2 || $_SESSION['ref']==1){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../images/logoGvmnt.png">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Marks Admin</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="../jthemes.org/demo-admin/cubic/plugins/components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../jthemes.org/demo-admin/cubic/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- ===== Animation CSS ===== -->
    <link href="../jthemes.org/demo-admin/cubic/cubic-html/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="../jthemes.org/demo-admin/cubic/cubic-html/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="../jthemes.org/demo-admin/cubic/cubic-html/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="mini-sidebar">
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ===== Top-Navigation ===== -->
        <?php
            require_once '../menu/topNavigation/MarkAdmin/markingTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../menu/MarkAdmin/markAdminMenu.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        <div style="background-color:#d3eeff;" class="page-wrapper">
            <!-- ===== Page-Container ===== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="white-box ecom-stat-widget">
                            <div class="row">
                                <div class="col-xs-6">
                                    <span class="text-blue font-light"><?php echo ""; ?> </i></span>
                                    <p class="font-12">SUBJECT</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="icoleaf bg-primary text-white"><em class="mdi mdi-checkbox-marked-circle-outline"></em></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="white-box ecom-stat-widget">
                            <div class="row">
                                <div class="col-xs-6">
                                    <span class="text-blue font-light"><?php echo ""; ?> </span>
                                    <p class="font-12">STUDENT</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="icoleaf bg-success text-white"><em class="mdi mdi-comment-text-outline"></em></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="white-box ecom-stat-widget">
                            <div class="row">
                                <div class="col-xs-6">
                                    <span class="text-blue font-light"><?php echo ""; ?></span>
                                    <p class="font-12">AVERAGE</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="icoleaf bg-danger text-white"><em class="mdi mdi-coin"></em></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="white-box stat-widget">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <h4 class="box-title">Result</h4>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <select class="custom-select">
                                        <option selected value="0">Maths</option>
                                        <option value="1">Science</option>
                                    </select>
                                    <ul class="list-inline">
                                        <li>
                                            <h6 class="font-15"><em class="fa fa-circle m-r-5 text-success"></em>Grater than 75%</h6>
                                        </li>
                                        <li>
                                            <h6 class="font-15"><em class="fa fa-circle m-r-5 text-primary"></em>Less than 25%</h6>
                                        </li>
                                    </ul>
                                </div>
                                <div class="stat chart-pos"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="white-box">
                            <h4 class="box-title">Task Progress</h4>
                            <div class="task-widget t-a-c">
                                <div class="task-chart" id="sparklinedashdb"></div>
                                <div class="task-content font-16 t-a-c">
                                    <div class="col-sm-6 b-r">
                                        Urgent Tasks
                                        <h1 class="text-primary">05 <span class="font-16 text-muted">Tasks</span></h1>
                                    </div>
                                    <div class="col-sm-6">
                                        Normal Tasks
                                        <h1 class="text-primary">03 <span class="font-16 text-muted">Tasks</span></h1>
                                    </div>
                                </div>
                                <div class="task-assign font-16">
                                    Assigned To
                                    <ul class="list-inline">
                                        <li class="p-l-0">
                                            <img src="jthemes.org/demo-admin/cubic/plugins/images/users/#1.png" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave">
                                        </li>
                                        <li>
                                            <img src="jthemes.org/demo-admin/cubic/plugins/images/users/#2.png" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave">
                                        </li>
                                        <li>
                                            <img src="jthemes.org/demo-admin/cubic/plugins/images/users/#3.png" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave">
                                        </li>
                                        <li class="p-r-0">
                                            <a href="javascript:void(0);" class="btn btn-success font-16">3+</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ===== Right-Sidebar ===== -->
                <!-- ===== Right-Sidebar-End ===== -->
                <footer style="color:#000000;" class="footer t-a-c">
                    © 2022 Zonal Office Galewela. All rights reserved. <a style="color:#000000;" href = "https://www.facebook.com/AJCJ123"> Designed & Developed by Ayubowan JCJ</a>
                </footer>
            </div>
        <!-- ===== Page-Content-End ===== -->
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <!-- ===== jQuery ===== -->
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- ===== Bootstrap JavaScript ===== -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ===== Slimscroll JavaScript ===== -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/jquery.slimscroll.js"></script>
    <!-- ===== Wave Effects JavaScript ===== -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/waves.js"></script>
    <!-- ===== Menu Plugin JavaScript ===== -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/sidebarmenu.js"></script>
    <!-- ===== Custom JavaScript ===== -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/custom.js"></script>
    <!-- ===== Plugin JS ===== -->
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/chartist-js/dist/chartist.min.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/sparkline/jquery.sparkline.min.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/sparkline/jquery.charts-sparkline.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/knob/jquery.knob.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/easypiechart/dist/jquery.easypiechart.min.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/db1.js"></script>
    <!-- ===== Style Switcher JS ===== -->
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
}else{
  echo "Please Login!";
}
?>