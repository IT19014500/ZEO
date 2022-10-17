<?php
    include('../../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==8){
?>

<?php
  $sqluspr="SELECT * FROM users WHERE reid = 1";
  $resultuspr=$conn->query($sqluspr);

  $countuspr = mysqli_num_rows($resultuspr);

  $sqlusad="SELECT * FROM users WHERE reid = 2";
  $resultusad=$conn->query($sqlusad);

  $countusad = mysqli_num_rows($resultusad);

  $sqlusra="SELECT * FROM users WHERE reid = 3";
  $resultusra=$conn->query($sqlusra);

  $countusra = mysqli_num_rows($resultusra);

  $sqlusba="SELECT * FROM users WHERE reid = 4";
  $resultusba=$conn->query($sqlusba);

  $countusba = mysqli_num_rows($resultusba);

  $sqluste="SELECT * FROM users WHERE reid = 5";
  $resultuste=$conn->query($sqluste);

  $countuste = mysqli_num_rows($resultuste);

  $sqlusma="SELECT * FROM users WHERE reid = 6";
  $resultusma=$conn->query($sqlusma);

  $countusma = mysqli_num_rows($resultusma);

  $sqlusca="SELECT * FROM users WHERE reid = 7";
  $resultusca=$conn->query($sqlusca);

  $countusca = mysqli_num_rows($resultusca);

  $sqlusdr="SELECT * FROM users WHERE reid = 8";
  $resultusdr=$conn->query($sqlusdr);

  $countusdr = mysqli_num_rows($resultusdr);

  $scvna = 'Pool';
  $scvnavar = base64_encode($scvna);

  $sqlcsl="SELECT * FROM school WHERE name != '$scvnavar'";
  $resultcsl=$conn->query($sqlcsl);

  $countcsl = mysqli_num_rows($resultcsl);

  $sqlznt="SELECT * FROM zonet";
  $resultznt=$conn->query($sqlznt);

  $countznt = mysqli_num_rows($resultznt);

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
    <title>Main Admin</title>
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
            require_once '../menu/topNavigation/developer/devTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../menu/developer/devMenu.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        <div style="background-color:#d3eeff;" class="page-wrapper">
            <div class="row m-0">
                <div  style="background-color:#d6ddff;" class="col-md-3 col-sm-6 info-box">
                    <div class="media">
                        <div class="media-left">
                            <span class="icoleaf bg-primary text-white"><em class="mdi mdi-checkbox-marked-circle-outline"></em></span>
                        </div>
                        <div class="media-body">
                            <h3 class="info-count text-blue"><?php echo $countusad; ?></h3>
                            <p style="color:#000000;" class="info-text font-12">Main Admin</p>
                            <span class="hr-line"></span>
                            <p style="color:#000000;" class="info-ot font-15">Related<span class="label label-rounded label-success">2</span></p>
                        </div>
                    </div>
                </div>
                <div style="background-color:#d6ddff;" class="col-md-3 col-sm-6 info-box">
                    <div class="media">
                        <div class="media-left">
                            <span class="icoleaf bg-primary text-white"><em class="mdi mdi-comment-text-outline"></em></span>
                        </div>
                        <div class="media-body">
                            <h3 class="info-count text-blue"><?php echo $countusra; ?></h3>
                            <p style="color:#000000;" class="info-text font-12">Row Admin</p>
                            <span class="hr-line"></span>
                            <p style="color:#000000;" class="info-ot font-15">Extra<span class="label label-rounded label-danger"><?php echo 1-$countusra; ?></span></p>
                        </div>
                    </div>
                </div>
                <div style="background-color:#d6ddff;" class="col-md-3 col-sm-6 info-box">
                    <div class="media">
                        <div class="media-left">
                            <span class="icoleaf bg-primary text-white"><em class="mdi mdi-coin"></em></span>
                        </div>
                        <div class="media-body">
                            <h3 class="info-count text-blue"><?php echo $countusba; ?></h3>
                            <p style="color:#000000;" class="info-text font-12">Branch Admin</p>
                            <span class="hr-line"></span>
                            <p style="color:#000000;" class="info-ot font-15">Currently added</span></p>
                        </div>
                    </div>
                </div>
                <div style="background-color:#d6ddff;" class="col-md-3 col-sm-6 info-box b-r-0">
                    <div class="media">
                        <div class="media-left p-r-5">
                            <div id="earning" class="e" data-percent="60">
                                <div id="pending" class="p" data-percent="55"></div>
                                <div id="booking" class="b" data-percent="50"></div>
                            </div>
                        </div>
                        <div class="media-body">
                            <h2 class="text-blue font-22 m-t-0">Completion</h2>
                            <ul class="p-0 m-b-20">
                                <li><em class="fa fa-circle m-r-5 text-primary"></em><?php echo sprintf('%0.1f', round(($countuspr/109)*100, 2)); ?>% Princi.</li>
                                <li><em class="fa fa-circle m-r-5 text-primary"></em><?php echo sprintf('%0.1f', round(($countuste/109)*100, 2)); ?>% Teach.</li>
                                <li><em class="fa fa-circle m-r-5 text-info"></em><?php echo sprintf('%0.1f', round((1/5)*100, 2)); ?>% M. Adm.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===== Page-Container ===== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="white-box stat-widget">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <h4 class="box-title">Performance</h4>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <select class="custom-select">
                                        <option selected value="0">speed</option>
                                        <option value="1">Bandwidth</option>
                                    </select>
                                    <ul class="list-inline">
                                        <li>
                                            <h6 class="font-15"><em class="fa fa-circle m-r-5 text-success"></em>Less than 45</h6>
                                        </li>
                                        <li>
                                            <h6 class="font-15"><em class="fa fa-circle m-r-5 text-primary"></em>Grater than 75</h6>
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
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="white-box bg-primary color-box">
                            <h1 class="text-white font-light"><?php echo $countcsl; ?> <span class="font-14">School</span></h1>
                            <div class="ct-revenue chart-pos"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="white-box bg-success color-box">
                            <h1 class="text-white font-light m-b-0"><?php echo $countznt; ?></h1>
                            <span class="hr-line"></span>
                            <p class="cb-text">Zone</p>
                            <h6 class="text-white font-semibold">For All <span class="font-light"></span></h6>
                            <div class="chart">
                                <div class="ct-visit chart-pos"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="white-box bg-danger color-box">
                            <h1 class="text-white font-light m-b-0"><?php echo $countusdr; ?></h1>
                            <span class="hr-line"></span>
                            <p class="cb-text">Developer</p>
                            <h6 class="text-white font-semibold">1<span class="font-light">For Imports</span></h6>
                            <div class="chart">
                                <input class="knob" data-min="0" data-max="100" data-bgColor="#f86b4a" data-fgColor="#ffffff" data-displayInput=false data-width="96" data-height="96" data-thickness=".1" value="25" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ===== Right-Sidebar ===== -->
                <!-- ===== Right-Sidebar-End ===== -->
            </div>
            <!-- ===== Page-Container-End ===== -->
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