<?php
    include('../../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<!-- Add 7 day deletion here -->
<?php 

$date=date('Y-m-d');
$date1=date_create($date);



$ghti = 7;
$sqlbyta="SELECT * FROM nonprincipletmdel";
$resultbyta=$conn->query($sqlbyta);


  while($recordbyta = mysqli_fetch_array($resultbyta)){


$bytaid = $recordbyta['nprid'];
$bytanicr = $recordbyta['rdate'];


$date2=date_create($bytanicr);

$astri=date_diff($date1,$date2);



  // Add deleting date here
if($astri->format("%a") > $ghti){

    $deletebyd="delete from nonprincipletmdel where nprid= $bytaid";
    $conn->query($deletebyd);
  
  }
  
}

?>
<!-- End 7 day deletion here -->



<!-- Add 7 day 2 table deletion here -->
<?php 


$sqlbytane="SELECT * FROM nonprincipletemp";
$resultbytane=$conn->query($sqlbytane);


  while($recordbytane = mysqli_fetch_array($resultbytane)){


$bytaidne = $recordbytane['nprid'];
$bytanicrne = $recordbytane['rdate'];

$datene=date_create($bytanicrne);

$astrine=date_diff($date1,$datene);


    // Add deleting date here
if($astrine->format("%a") >= $ghti){

    $deletebydne="delete from nonprincipletemp where nprid= $bytaidne";
    $conn->query($deletebydne);
  
  }
  
}

?>
<!-- End 7 day 2 table deletion here -->


<!-- 2 start -->
<!-- Add 7 day deletion here -->
<?php 

$sqlnita="SELECT * FROM nptteachtmdel";
$resultnita=$conn->query($sqlnita);


  while($recordnita = mysqli_fetch_array($resultnita)){


$nitaid = $recordnita['nptid'];
$nitanicr = $recordnita['rdate'];

$nitadate=date_create($nitanicr);

$nitaastri=date_diff($date1,$nitadate);


// Add deleting date here
if($nitaastri->format("%a") >= $ghti){

    $deletenita="delete from nptteachtmdel where nptid= $nitaid";
    $conn->query($deletenita);
  
  }
  
}

?>
<!-- End 7 day deletion here -->



<!-- Add 7 day 2 table deletion here -->
<?php 


$sqltetw="SELECT * FROM nptteachtemp";
$resulttetw=$conn->query($sqltetw);


  while($recordtetw = mysqli_fetch_array($resulttetw)){


$tetwidne = $recordtetw['nptid'];
$tetwnicrne = $recordtetw['rdate'];

$tetwdate=date_create($tetwnicrne);

$tetwastrine=date_diff($date1,$tetwdate);


// Add deleting date here
if($tetwastrine->format("%a") >= $ghti){

    $deletetetw="delete from nptteachtemp where nptid= $tetwidne";
    $conn->query($deletetetw);
  
  }
  
}

?>
<!-- End 7 day 2 table deletion here -->
<!-- 2 end -->

<!-- 3rd start -->
<!-- Add 7 day deletion here -->
<?php 


$sqlqul="SELECT * FROM qualificationtmdel";
$resultqul=$conn->query($sqlqul);


  while($recordqul = mysqli_fetch_array($resultqul)){


$qulid = $recordqul['tid'];
$qulnicr = $recordqul['rdate'];

$quldate=date_create($qulnicr);

$qulastri=date_diff($date1,$quldate);

// Add deleting date here
if($qulastri->format("%a") >= $ghti){

    $deletequl="delete from qualificationtmdel where tid= $qulid";
    $conn->query($deletequl);
  
  }
  
}

?>
<!-- End 7 day deletion here -->



<!-- Add 7 day 2 table deletion here -->
<?php 


$sqlqulne="SELECT * FROM qualificationtmp";
$resultqulne=$conn->query($sqlqulne);


  while($recordqulne = mysqli_fetch_array($resultqulne)){


$qulidne = $recordqulne['tid'];
$qulnicrne = $recordqulne['rdate'];

$qulnicdate=date_create($qulnicrne);

$qulastrine=date_diff($date1,$qulnicdate);

// Add deleting date here
if($qulastrine->format("%a") >= $ghti){

    $deletequlne="delete from qualificationtmp where tid= $qulidne";
    $conn->query($deletequlne);
  
  }
  
}

?>
<!-- End 7 day 2 table deletion here -->
<!-- 3rd end -->

<!-- 4th start -->
<!-- Add 7 day deletion here -->
<?php 

$sqlerls="SELECT * FROM erservicetmdel";
$resulterls=$conn->query($sqlerls);


  while($recorderls = mysqli_fetch_array($resulterls)){


$erlsid = $recorderls['erlid'];
$erlsnicr = $recorderls['rdate'];

$erlsdate=date_create($erlsnicr);

$erlsastri=date_diff($date1,$erlsdate);


// Add deleting date here
if($erlsastri->format("%a") >= $ghti){

    $deleteerls="delete from erservicetmdel where erlid= $erlsid";
    $conn->query($deleteerls);
  
  }
  
}

?>
<!-- End 7 day deletion here -->



<!-- Add 7 day 2 table deletion here -->
<?php

$sqlerlsne="SELECT * FROM erservicetmp";
$resulterlsne=$conn->query($sqlerlsne);


  while($recorderlsne = mysqli_fetch_array($resulterlsne)){


$erlsidne = $recorderlsne['erlid'];
$erlsnicrne = $recorderlsne['rdate'];

$erlsnidate=date_create($erlsnicrne);

$erlsastrine=date_diff($date1,$erlsnidate);


// Add deleting date here
if($erlsastrine->format("%a") >= $ghti){

    $deleteerlsne="delete from erservicetmp where erlid= $erlsidne";
    $conn->query($deleteerlsne);
  
  }
  
}

?>
<!-- End 7 day 2 table deletion here -->
<!-- 4th end -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/logoGvmnt.png">
    <title>ZEO Admin</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="../jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- ===== Top-Navigation ===== -->
        <?php
            require_once '../menu/topNavigation/headteEditTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../menu/adminSecondInFolder.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Transfer Request</em></strong></h1><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div style="background-color:#d6ddff;" class="white-box">
                            <h3 class="m-b-0 box-title">Check your requests </h3><br>
                            <div class="row">

                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <a href="traReqInterDetail.php?intrid=<?php echo 1; ?>"><button class="btn btn-block btn-primary">Inter zone</button></a>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <a href="traReqInterDetail.php?intrid=<?php echo 2; ?>"><button class="btn btn-block btn-primary">Intra zone</button></a>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <a href="traReqInterDetail.php?intrid=<?php echo 3; ?>"><button class="btn btn-block btn-primary">Inter-provincial</button></a>
                                </div>
                            </div>
                            <!-- <h3 class="m-b-0 m-t-30 box-title"> </h3>
                            <div class="row">
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <a href="../extraAct.php"><button class="btn btn-block btn-primary">Extra Activity</button></a>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <a href="../exDutyAppr.php"><button class="btn btn-block btn-primary">Exam Duty</button></a>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <a href="../tchildApr.php"><button class="btn btn-block btn-primary">Child List</button></a>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <a href="../tspouceApr.php"><button class="btn btn-block btn-primary">Spouce</button></a>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <a href="../pcardreApr.php"><button class="btn btn-block btn-primary">Cardre Requests</button></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- ===== Right-Sidebar ===== -->
                <!-- ===== Right-Sidebar-End ===== -->
            </div>
            <!-- /.container-fluid -->
            <footer style="color:#000000;" class="footer t-a-c">
                © 2022 Zonal Office Galewela. All rights reserved. <a style="color:#000000;" href = "https://www.facebook.com/AJCJ123"> Designed & Developed by Ayubowan JCJ</a>
            </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/custom.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="../cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="../cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="../cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="../cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>

    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    <!--Style Switcher -->
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
}else{
  echo "Please Login!";
}
?>