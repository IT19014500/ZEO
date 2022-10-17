<?php
  include('../../../connection.php');
  session_start();
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){
?>

<?php
$date1=date('Y-m-d');
$date=date_create($date1);

$ghti=245;
$sqlbyta="SELECT * FROM interzone";
$resultbyta=$conn->query($sqlbyta);

while($recordbyta = mysqli_fetch_array($resultbyta)){

$bytaid = $recordbyta['tid'];
$bytanicr = $recordbyta['sdate'];

$bytanicr2=date_create($bytanicr);

$astri=date_diff($date,$bytanicr2);

// Add deleting date here
if($astri->format("%a") >= $ghti){
  $deletebyd="delete from interzone where tid= $bytaid";
  $resultbyd=$conn->query($deletebyd);
  }
}

// 2 table start
$sqlbyac="SELECT * FROM interzoneprovi";
$resultbyac=$conn->query($sqlbyac);

while($recordbyac = mysqli_fetch_array($resultbyac)){
  $byacid = $recordbyac['tid'];
  $byacnicr = $recordbyac['sdate'];

  $byacnicr2=date_create($byacnicr);

  $astriac=date_diff($date,$byacnicr2);

  // Add deleting date here
  if($astriac->format("%a") >= $ghti){

    $deletebyac="delete from interzoneprovi where tid= $byacid";
    $resultbyac=$conn->query($deletebyac);
  
  }
  
}
// 2 table end

// 3 table start
$sqljv="SELECT * FROM inregion";
$resultjv=$conn->query($sqljv);

while($recordjv = mysqli_fetch_array($resultjv)){

  $jvid = $recordjv['tid'];
  $jvnicr = $recordjv['sdate'];

  $jvnicr2=date_create($jvnicr);

  $astrijv=date_diff($date,$jvnicr2);

  // Add deleting date here
  if($astrijv->format("%a") >= $ghti){

    $deletejv="delete from inregion where tid= $jvid";
    $resultjv=$conn->query($deletejv);
  
  }
  
}
// 3 table end

// 4 table start
$sqlsair="SELECT * FROM inregionprovi";
$resultsair=$conn->query($sqlsair);

while($recordsair = mysqli_fetch_array($resultsair)){
  $sairid = $recordsair['tid'];
  $sairnicr = $recordsair['sdate'];

  $sairnicr2=date_create($sairnicr);

  $astrisair=date_diff($date,$sairnicr2);

  // Add deleting date here
  if($astrisair->format("%a") >= $ghti){
    $deletesair="delete from inregionprovi where tid= $sairid";
    $resultsair=$conn->query($deletesair);
  }
}
// 4 table end

// 5 table start
$sqlvls="SELECT * FROM ipronation";
$resultvls=$conn->query($sqlvls);

while($recordvls = mysqli_fetch_array($resultvls)){
  $vlsid = $recordvls['tid'];
  $vlsnicr = $recordvls['sdate'];

  $vlsnicr2=date_create($vlsnicr);

  $astrivls=date_diff($date,$vlsnicr2);

  // Add deleting date here
  if($astrivls->format("%a") >= $ghti){

    $deletevls="delete from ipronation where tid= $vlsid";
    $resultvls=$conn->query($deletevls);
  
  }
  
}
// 5 table end

// 6 table start
$sqldvn="SELECT * FROM ipoprscl";
$resultdvn=$conn->query($sqldvn);

while($recorddvn = mysqli_fetch_array($resultdvn)){
  $dvnid = $recorddvn['tid'];
  $dvnnicr = $recorddvn['sdate'];

  $dvnnicr2=date_create($dvnnicr);

  $astridvn=date_diff($date,$dvnnicr2);

  // Add deleting date here
  if($astridvn->format("%a") >= $ghti){
    $deletedvn="delete from ipoprscl where tid= $dvnid";
    $resultdvn=$conn->query($deletedvn);
  }
}
// 6 table end
?>


<?php
  $twni = $_SESSION['uname'];
  $detwni = base64_encode($twni);

  $nicsc = 0;
  $sclnams = "";
  $sqlnicr="SELECT * FROM teacher WHERE nic = '$detwni'";
  $resultnicr=$conn->query($sqlnicr);
    
  while($recordnicr = mysqli_fetch_array($resultnicr)){  
    $nicsc=$recordnicr['scid'];
    $fsa=$recordnicr['tid'];          
  }

  $sqlsc="SELECT * FROM school WHERE scid = $nicsc ";
  $resultsc=$conn->query($sqlsc);
  while($recordsc = mysqli_fetch_array($resultsc)){
    $sclnams = $recordsc['name'];
    $desclnams = base64_decode($sclnams);
  } 
?>

<?php

  $sqlsuv="SELECT * FROM subject WHERE suID IN (SELECT suID FROM nptteach WHERE tid = $fsa);";
  $resultsuv=$conn->query($sqlsuv);

  $countsuv = mysqli_num_rows($resultsuv);

  $sqlbvs="SELECT sum(period) AS totper FROM nptteach WHERE suID IN (SELECT suID FROM nptteach WHERE tid = $fsa);";
  $resultbvs=$conn->query($sqlbvs);

  $recbvs = mysqli_fetch_assoc($resultbvs);
  $sjl = $recbvs['totper'];

?>


<?php
if(isset($_GET['cid'])){
  $ctfcid = $_GET['cid'];

  $ckctf = "No";
  $sqlctf="SELECT * FROM certifyreq WHERE tid = $ctfcid";
  $resultctf=$conn->query($sqlctf);
  while($recordctf = mysqli_fetch_array($resultctf)){
    $ckctf = "Yes";
  }

  if($ckctf == "No"){
  $addctf="INSERT INTO certifyreq(tid)VALUES('$ctfcid')";
}elseif($ckctf == "Yes"){
?>

  <Script>
      alert("Already Requested!");
      location='teacherAdmin.php';
  </Script>
    
<?php
  }
  if($conn-> query($addctf)==TRUE){

?>

<Script>
  alert("Certificate Request Added!");
  location='teacherAdmin.php';

</Script>

<?php
  exit();
  }
?>

<?php
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
    <title>Teacher</title>
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
            require_once '../menu/topNavigation/Teacher/dashboardTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../menu/Teacher/teacherDashboard.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        <div style="background-color:#d3eeff;" class="page-wrapper">
            <!-- ===== Page-Container ===== -->
            <br>
            <div style="float:right;color:#000000;margin-right:15px;"><strong><?php echo $desclnams;?></strong></div>
            <div style="height:20px;width:150px;margin-left:15px;" >
                <a href="teacherAdmin.php?cid=<?php echo $fsa; ?>"><button class="btn btn-block btn-primary">Service Certificate</button></a>
            </div>
            <div class="container-fluid">
                <div class="row m-0">
                        <div style="background-color:#d6ddff;color:#000000;" class="col-md-3 col-sm-6 info-box">
                            <div class="media">
                                <div class="media-left">
                                    <span class="icoleaf bg-primary text-white"><em class="mdi mdi-checkbox-marked-circle-outline"></em></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="info-count text-blue"><?php if($sjl==""){echo "0";}else{echo $sjl;} ?></h3>
                                    <p class="info-text font-12">PERIODS</p>
                                    <span class="hr-line"></span>
                                    <p class="info-ot font-15">In School<span class="label label-rounded label-success">5</span></p>
                                </div>
                            </div>
                        </div>
                        <div style="background-color:#d6ddff;color:#000000;" class="col-md-3 col-sm-6 info-box">
                            <div class="media">
                                <div class="media-left">
                                    <span class="icoleaf bg-primary text-white"><em class="mdi mdi-checkbox-marked-circle-outline"></em></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="info-count text-blue"><?php if($countsuv==0){ echo "0";}else{ echo $countsuv;} ?></h3>
                                    <p class="info-text font-12">SUBJECTS</p>
                                    <span class="hr-line"></span>
                                    <p class="info-ot font-15">Precent<span class="label label-rounded label-success"><?php echo "0"; ?>%</span></p>
                                </div>
                            </div>
                        </div>
                        <div style="background-color:#d6ddff;color:#000000;" class="col-md-3 col-sm-6 info-box">
                            <div class="media">
                                <div class="media-left">
                                    <span class="icoleaf bg-primary text-white"><em class="mdi mdi-checkbox-marked-circle-outline"></em></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="info-count text-blue"><?php echo "0"; ?></h3>
                                    <p class="info-text font-12">Students</p>
                                    <span class="hr-line"></span>
                                    <p class="info-ot font-15">Marks ><span class="label label-rounded label-success">75</span></p>
                                </div>
                            </div>
                        </div>
                        <div style="background-color:#d6ddff;color:#000000;" class="col-md-3 col-sm-6 info-box">
                            <div class="media">
                                <div class="media-left">
                                    <span class="icoleaf bg-primary text-white"><em class="mdi mdi-checkbox-marked-circle-outline"></em></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="info-count text-blue"><?php echo "0"; ?></h3>
                                    <p class="info-text font-12">Students</p>
                                    <span class="hr-line"></span>
                                    <p class="info-ot font-15">Marks <<span class="label label-rounded label-success">45</span></p>
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Notice</h3>
                            <p style="color:#364ea3;"><strong>*You need to wait 7 days for result, after you edit your profile.</strong></p>
                            <ul class="text-left" style="color:#000000;">
                            <?php
                                $apliz = "No";
                                $aplipz = "No";
                                $aplirp = "No";
                                $aplipo = "No";
                                $aplipn = "No";
                                $aplipsc = "No";
                                $sqlapl="SELECT * FROM interzoneapr WHERE tid = $fsa";
                                $resultapl=$conn->query($sqlapl);
                                while($recordapl = mysqli_fetch_array($resultapl)){
                                    $apliz = "Yes";
                                }
                                $sqlpapl="SELECT * FROM interzoneproviapr WHERE tid = $fsa";
                                $resultpapl=$conn->query($sqlpapl);
                                while($recordpapl = mysqli_fetch_array($resultpapl)){
                                    $aplipz = "Yes";
                                }
                                $sqlirp="SELECT * FROM inregionapr WHERE tid = $fsa";
                                $resultirp=$conn->query($sqlirp);
                                while($recordirp = mysqli_fetch_array($resultirp)){
                                    $aplirp = "Yes";
                                }
                                $sqlipo="SELECT * FROM inregionproviapr WHERE tid = $fsa";
                                $resultipo=$conn->query($sqlipo);
                                while($recordipo = mysqli_fetch_array($resultipo)){
                                    $aplipo = "Yes";
                                }
                                $sqlipn="SELECT * FROM ipronationapr WHERE tid = $fsa";
                                $resultipn=$conn->query($sqlipn);
                                while($recordipn = mysqli_fetch_array($resultipn)){
                                    $aplipn = "Yes";
                                }
                                $sqlipsc="SELECT * FROM ipoprsclapr WHERE tid = $fsa";
                                $resultipsc=$conn->query($sqlipsc);
                                while($recordipsc = mysqli_fetch_array($resultipsc)){
                                    $aplipsc = "Yes";
                                }
                                ?>
                                    <?php if($apliz == "Yes"){ ?>
                                    <li><?php echo "Your National School Inter zone request has been approved."; ?></li> 
                                    <?php
                                    }if($aplipz == "Yes"){ ?>
                                    <li><?php echo "Your National School Intra zone request has been approved."; ?></li> 
                                    <?php
                                    }if($aplirp == "Yes"){ ?>
                                    <li><?php echo "Your National School Inter-Provincial request has been approved."; ?></li> 
                                    <?php
                                    }if($aplipo == "Yes"){ ?>
                                    <li><?php echo "Your Provincial School Inter zone request has been approved."; ?></li> 
                                    <?php
                                    }if($aplipn == "Yes"){ ?>
                                    <li><?php echo "Your Provincial School Intra zone request has been approved."; ?></li> 
                                    <?php
                                    }if($aplipsc == "Yes"){ ?>
                                    <li><?php echo "Your Provincial School Inter-Provincial request has been approved."; ?></li> 
                                <?php
                                    }
                                ?>
                            </ul>
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