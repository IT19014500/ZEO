<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<?php
  if($_SESSION['ref']==1){
    $rth = $_SESSION['uname'];
    $derth = base64_encode($rth);

    $sqlli="SELECT * FROM school WHERE census = '$derth'";
    $resultli=$conn->query($sqlli);
    while($recordli = mysqli_fetch_array($resultli)){
      $vht = $recordli['scid'];
      $vhtnprt = $recordli['name'];
      $devhtnprt = base64_decode($vhtnprt);

    }
    }elseif($_SESSION['ref']==5){
        $rth = $_SESSION['uname'];
        $derth = base64_encode($rth);
        
        $sqlnu="SELECT * FROM teacher WHERE nic = '$derth' ";
        $resultnu=$conn->query($sqlnu);
        while($recordnu = mysqli_fetch_array($resultnu)){
          $fhg = $recordnu['tid'];
          $fhgnic = $recordnu['nic'];
          $defhgnic = base64_decode($fhgnic);
      
            
        }
    }
?>
    
<?php
  if(isset($_POST['submit'])){

    $Tedy=$_POST['Oedy'];
    $Texnam=$_POST['Oexnam'];
    $Tprof=$_POST['Oprof'];
    $Texcen=$_POST['Oexcen'];
    $Ttid=$_POST['Otid'];
    
    $Tedyvar = base64_encode($Tedy);
    $Texnamvar = base64_encode($Texnam);
    $Tprofvar = base64_encode($Tprof);
    $Texcenvar = base64_encode($Texcen);

    $add="INSERT INTO exmduty(edyear,exname,profession,excenter,tid)VALUES('$Tedyvar','$Texnamvar','$Tprofvar','$Texcenvar','$Ttid')";

    if($conn-> query($add)==TRUE){

?>

<Script>
    alert("Exam Duty Experience Added!");
    location='exDutyExp.php';
</Script>

<?php
    exit();
    }
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
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/logoGvmnt.png">
    <title>School</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../AdminPannel/cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- ===== Animation CSS ===== -->
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- school fetch -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type=text/javascript src="../bootstrap/js/schoolFetch.js"></script>
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
            require_once '../AdminPannel/menu/topNavigation/Teacher/TeacherlistPrinTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){

                require_once '../AdminPannel/menu/Principal/teacherlistPrinMenu.php';

            }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){

                require_once '../AdminPannel/menu/Teacher/teacherlistMenu.php';

            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                    <div class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="exDutyExplist.php"><button style="width:150px;" class="btn btn-block btn-primary">Duty Experience</button></a>
                    </div>
                    <div style="float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="childrenDetail.php"><button class="btn btn-block ">Step 10</button></a>
                    </div>
                    <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Past Exam Duty Details</em></strong></h1><br>
                <div class="row">
                    <div class="col-md-6">
                        <div style="background-color:#d6ddff;" class="white-box">
                        <h3 class="box-title m-b-0">Exam Duty Experience Form</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"></p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                        <div align="left">
		                                    <input type="text" class="form-control" id = "Oedy1"  name="Oedy" placeholder="ENTER YEAR" required>
                                        </div><br>
                                        <div align="left">
                                            <input type="text" class="form-control" id = "Oexnam1"  name="Oexnam" placeholder="EXAM NAME" required>
                                        </div><br>
                                        <div align="left">
                                            <input type="text" class="form-control" id = "Oprof1"  name="Oprof" placeholder="PROFESSION HANDLED" required>
                                        </div><br>
                                        <div align="left">
                                            <input type="text" class="form-control" id = "Oexcen1"  name="Oexcen" placeholder="EXAMINATION CENTER" required>
                                        </div><br>
                                        <?php
                                        if($_SESSION['ref']==1){
                                            $sqlmst="SELECT * FROM teacher WHERE scid = $vht && tid NOT IN (SELECT tid FROM ofisign);";
                                        }elseif($_SESSION['ref']==5){
                                            $sqlmst="SELECT * FROM teacher WHERE tid = $fhg && tid NOT IN (SELECT tid FROM ofisign);";
                                        }
                                            $resultmst=$conn->query($sqlmst);
                                        ?> 
                                        <div align="left">
                                            <select class="form-control" id = "Otid1" name="Otid" placeholder="ENTER TEACHER ID" required>
                                            <?php if($_SESSION['ref']==1){ ?>
                                            <option value="0" selected>-Select NIC-</option>
                                            <?php
                                                while($recordmst = mysqli_fetch_array($resultmst)){  
                                                    $ttid=$recordmst['tid'];
                                                    $ttnam=$recordmst['nic'];
                                                    $dettnam = base64_decode($ttnam);
                                            ?>
                                                <option value="<?php echo $ttid; ?>" ><?php echo $dettnam; ?></option>
                                            <?php
                                                }
                                                
                                            }elseif($_SESSION['ref']==5){
                                            ?>
                                                <option value="<?php echo $fhg; ?>" selected><?php echo $defhgnic; ?></option>
                                            <?php
                                                }
                                            ?>
                                            </select>
                                        </div><br>
                                        <div align="right">
                                            <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="SUBMIT">
                                            <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                                        </div>
                                    </form>
                                </div>
                            </div>
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
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/custom.js"></script>
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="../AdminPannel/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="../AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
}else{
  echo "Please Login!";
}
?>