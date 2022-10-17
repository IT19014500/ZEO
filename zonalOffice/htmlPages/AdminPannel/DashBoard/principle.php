<?php
  include('../../../connection.php');
  session_start();
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){
?>

<?php
  $rth = $_SESSION['uname'];
  $derth = base64_encode($rth);

  $sqlli="SELECT * FROM school WHERE census = '$derth'";
  $resultli=$conn->query($sqlli);
  while($recordli = mysqli_fetch_array($resultli)){
    $vht = $recordli['scid'];
    $vhtnprt = $recordli['name'];
    $devhtnprt = base64_decode($vhtnprt);

  }
?>

<?php
  $sql3="SELECT * FROM teacher where scid = $vht";
  $result3=$conn->query($sql3);

  $counttesl = mysqli_num_rows($result3);
?>

<?php
  $sqlsuv="SELECT * FROM teacher where scid = $vht && tid NOT IN (SELECT tid FROM prisign);";
  $resultsuv=$conn->query($sqlsuv);

  $countsuv = mysqli_num_rows($resultsuv);

  $sqlpol="SELECT * FROM teacher WHERE scid=110";
  $resultpol=$conn->query($sqlpol);

  $countpol = mysqli_num_rows($resultpol);

?>

<?php
    $sqlbmn="SELECT * FROM teacher WHERE scid = $vht";
    $resultbmn=$conn->query($sqlbmn);
    while($recordbmn = mysqli_fetch_array($resultbmn)){
        $fhg=$recordbmn['tid'];
        $sqljg="SELECT * FROM tvaccationtbl WHERE tid = $fhg ";
        $resultjg=$conn->query($sqljg);
        $countvacs = mysqli_num_rows($resultjg);
    }
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
    <title>Principal</title>
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
            require_once '../menu/topNavigation/Principal/PrincipalTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../menu/Principal/dashboard.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        <div style="background-color:#d3eeff;" class="page-wrapper">
            <!-- ===== Page-Container ===== -->
            <br>
            <div style="float:right;color:#000000;margin-right:15px;"><strong><?php echo $devhtnprt;?></strong></div>
            <div class="container-fluid">
                <div class="row m-0">
                        <div style="background-color:#d6ddff;color:#000000;" class="col-md-3 col-sm-6 info-box">
                            <div class="media">
                                <div class="media-left">
                                    <span class="icoleaf bg-primary text-white"><em class="mdi mdi-checkbox-marked-circle-outline"></em></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="info-count text-blue"><?php echo $countsuv; ?></h3>
                                    <p class="info-text font-12">REQUEST</p>
                                    <span class="hr-line"></span>
                                    <p class="info-ot font-15">In Zone<span class="label label-rounded label-success">5</span></p>
                                </div>
                            </div>
                        </div>
                        <div style="background-color:#d6ddff;color:#000000;" class="col-md-3 col-sm-6 info-box">
                            <div class="media">
                                <div class="media-left">
                                    <span class="icoleaf bg-primary text-white"><em class="mdi mdi-checkbox-marked-circle-outline"></em></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="info-count text-blue"><?php echo $countpol; ?></h3>
                                    <p class="info-text font-12">POOL</p>
                                    <span class="hr-line"></span>
                                    <p class="info-ot font-15">Precent<span class="label label-rounded label-success"><?php echo ($countpol/$counttesl)*100; ?>%</span></p>
                                </div>
                            </div>
                        </div>
                        <div style="background-color:#d6ddff;color:#000000;" class="col-md-3 col-sm-6 info-box">
                            <div class="media">
                                <div class="media-left">
                                    <span class="icoleaf bg-primary text-white"><em class="mdi mdi-checkbox-marked-circle-outline"></em></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="info-count text-blue"><?php echo $counttesl; ?></h3>
                                    <p class="info-text font-12">TEACHERS</p>
                                    <span class="hr-line"></span>
                                    <p class="info-ot font-15">Target<span class="label label-rounded label-success">50</span></p>
                                </div>
                            </div>
                        </div>
                        <div style="background-color:#d6ddff;color:#000000;" class="col-md-3 col-sm-6 info-box">
                            <div class="media">
                                <div class="media-left">
                                    <span class="icoleaf bg-primary text-white"><em class="mdi mdi-checkbox-marked-circle-outline"></em></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="info-count text-blue"><?php echo $countvacs; ?></h3>
                                    <p class="info-text font-12">Vaccation</p>
                                    <span class="hr-line"></span>
                                    <p class="info-ot font-15">Precent<span class="label label-rounded label-success"><?php echo ($countvacs/$counttesl)*100; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Main Subject Marks</h3>
                            <ul class="list-inline text-right">
                                <li>
                                    <h5><em class="fa fa-circle text-info m-r-5"></em>Science</h5> </li>
                                <li>
                                    <h5><em class="fa fa-circle text-warning m-r-5"></em>Maths</h5> </li>
                                <li>
                                    <h5><em class="fa fa-circle text-purple m-r-5"></em>English</h5> </li>
                            </ul>
                            <div id="morris-area-chart"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="white-box">
                            <h4 class="box-title">Task Progress</h4>
                            <div class="task-widget t-a-c">
                                <div class="task-chart" id="sparklinedashdb"></div>
                                <div class="task-content font-16 t-a-c">
                                    <div class="col-sm-6 b-r">
                                        Urgent Tasks <br><br>
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
    <!--Morris JavaScript -->
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/raphael/raphael-min.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/morrisjs/morris.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/morris-data.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/chartist-js/dist/chartist.min.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- <script src="../jthemes.org/demo-admin/cubic/plugins/components/sparkline/jquery.sparkline.min.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/sparkline/jquery.charts-sparkline.js"></script> -->
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