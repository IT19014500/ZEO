<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<!-- 6 month start -->
<?php
$date1=date('Y-m-d');
$date=date_create($date1);

$ghti=180;
$sqlbyta="SELECT * FROM certifyreq";
$resultbyta=$conn->query($sqlbyta);

while($recordbyta = mysqli_fetch_array($resultbyta)){

$bytaid = $recordbyta['tid'];
$bytanicr = $recordbyta['sdate'];


$bytanicr2=date_create($bytanicr);

$astri=date_diff($date,$bytanicr2);


// Add deleting date here
if($astri->format("%a") >= $ghti){

    $deletebyd="delete from certifyreq where tid= $bytaid";
    $resultbyd=$conn->query($deletebyd);
  
  }
  
}
// 6 month end


$prboid = "Normal";
if(isset($_GET['prbuid'])){
  $prboid = $_GET['prbuid'];
}
?>

<?php
$sqltd="SELECT * FROM certifyreqck";
$resulttd=$conn->query($sqltd);
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
    <title>ZEO Admin</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- ===== Animation CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/css/colors/default.css" id="theme" rel="stylesheet">
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
            require_once 'menu/topNavigation/mainAdminTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once 'menu/mainAdmin.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <a href="certifyApr.php?prbuid=<?php echo "print"; ?>"><button style="background-color:#0C4574;float:right;margin-right:50px;border-radius:18px;width:120px;height:50px;color:#ffffff;border:none;">Print Mode</button></a>
                <a href="certifyApr.php?prbuid=<?php echo "Normal"; ?>"><button style="background-color:#0C4574;float:right;margin-right:30px;border-radius:18px;width:130px;height:50px;color:#ffffff;border:none;">Normal Mode</button></a>
                <h1 style="color:#000000;text-align:center;"><strong><em>Admin Approval</em></strong></h1><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div style="background-color:#d6ddff;" class="white-box">
                            <h3 class="m-b-0 box-title">Service Certificate Requests</h3><br>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">System Conditions</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <h5>*&nbsp&nbsp&nbspYou are Eligible to provide a service certificate for each teacher per 6 month.</h5>
                                                <p>&nbsp&nbsp&nbspThese Data will be deleted automatically in a every 6 month.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">Service Certificate</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Requestees</caption>
                                                        <thead>
                                                            <tr>
                                                                <th>NAME</th>
                                                                <th>NIC</th>
                                                                <th>SCHOOL</th>
                                                                <?php
                                                                if($prboid=="Normal"){
                                                                    ?>
                                                                <th>ACTION</th>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        while($recordtd = mysqli_fetch_array($resulttd)){
                                                            $traci = $recordtd['tid'];


                                                            $adcv = "No";
                                                            $sqladc="SELECT * FROM certifyreqck WHERE tid = $traci AND tid IN (SELECT tid FROM certifyreqadck);";
                                                            $resultadc=$conn->query($sqladc);
                                                            while($recordadc = mysqli_fetch_array($resultadc)){
                                                                $adcv = "Yes";
                                                            }

                                                            $sqlcrt="SELECT * FROM teacher WHERE tid = $traci";
                                                            $resultcrt=$conn->query($sqlcrt);
                                                            while($recordcrt = mysqli_fetch_array($resultcrt)){
                                                                $ennamem = $recordcrt['fullname'];
                                                                $ennicm = $recordcrt['nic'];
                                                                $enscck = $recordcrt['scid'];

                                                                $sqlvst="SELECT * FROM school WHERE scid = $enscck";
                                                                $resultvst=$conn->query($sqlvst);
                                                                while($recordvst = mysqli_fetch_array($resultvst)){
                                                                    $ensnvm = $recordvst['name'];
                                                                    $deensnvm = base64_decode($ensnvm);
                                                                }


                                                                $deennamem = base64_decode($ennamem);
                                                                $deennicm = base64_decode($ennicm);
                                                            }                      
                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $deennamem; ?></td>
                                                                <td><?php echo $deennicm; ?></td>
                                                                <td><?php echo $deensnvm; ?></td>
                                                                
                                                                <?php
                                                                if($prboid=="Normal"){
                                                                    ?>
                                                                <td>
                                                                    <?php
                                                                    if($adcv == "No"){
                                                                    ?>
                                                                    <a href="certifyApr.php?cefid=<?php echo $traci; ?>"><button class="btn btn-primary">Approve</button></a>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                    <a href="../../Action/certificate/cradaDelete.php?id=<?php echo $traci; ?>"><button class="btn btn-danger">Remove</button></a>
                                                                </td>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <!-- <th>NAME</th>
                                                                <th>NIC</th>
                                                                <th>SCHOOL</th> -->
                                                                <?php
                                                                // if($prboid=="Normal"){
                                                                    ?>
                                                                <!-- <th>ACTION</th> -->
                                                                <?php
                                                                    // }
                                                                ?>
                                                            </tr> 
                                                        </tfoot>
                                                    </table><br>
                                                    <?php
                                                        if(isset($_GET['cefid'])){
                                                        $coidrq = $_GET['cefid'];
                                                        
                                                        $sqlacj="SELECT * FROM certifyreqck WHERE tid = $coidrq";
                                                        $resultacj=$conn->query($sqlacj);
                                                        while($recordacj = mysqli_fetch_array($resultacj)){
                                                            $coiadte = $recordacj['sdate'];
                                                        }

                                                        if($adcv == "No"){
                                                            $addcorq="INSERT INTO certifyreqadck(tid,sdate)VALUES('$coidrq','$coiadte')";
                                                        }elseif($adcv == "Yes"){
                                                        ?>
                                                            <Script>
                                                                alert("Already Approved!");
                                                                location='certifyApr.php';
                                                            </Script>

                                                        <?php
                                                        }
                                                        if($conn-> query($addcorq)==TRUE){

                                                        ?>
                                                            
                                                        <Script>
                                                            alert("Certificate Request Approved!");
                                                            location='certifyApr.php';
                                                        </Script>
                                                            
                                                        <?php
                                                            exit();
                                                            }
                                                        ?>
                                                            
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="jthemes.org/demo-admin/cubic/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/custom.js"></script>
    <script src="jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
    <script src="jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
}else{
  echo "Please Login!";
}
?>