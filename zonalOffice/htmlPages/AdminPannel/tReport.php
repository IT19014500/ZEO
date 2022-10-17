<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<?php 
$prboid = "Normal";
if(isset($_GET['prbuid'])){
  $prboid = $_GET['prbuid'];
}
$rty = "No";
$ghti = 7;
$sqlbyta="SELECT * FROM msucesslist";
$resultbyta=$conn->query($sqlbyta);


$sqlcdf="SELECT * FROM msucessalttble";
$resultcdf=$conn->query($sqlcdf);


?>

<?php
  while($recordbyta = mysqli_fetch_array($resultbyta)){


$bytaid = $recordbyta['nic'];
$bytanicr = $recordbyta['rdate'];


$date=date('Y-m-d');

$date1=date_create($date);
$date2=date_create($bytanicr);

$astri=date_diff($date1,$date2);


// Add deleting date here
if($astri->format("%a") >= $ghti){

    $Tnamemvar = $recordbyta['name'];
    $Ttpnmvar = $recordbyta['tpn'];
    $Tnicmvar = $bytaid;
    $Trdatemvar = $bytanicr;



    $addmsucessl="INSERT INTO msucessalttble(name,tpn,nic,rdate)VALUES('$Tnamemvar','$Ttpnmvar','$Tnicmvar','$Trdatemvar')";
    $conn-> query($addmsucessl);
  
    $deletebyd="delete from msucesslist where nic= '$bytaid'";
    $resultbyd=$conn->query($deletebyd);
  
  }
  
}

?>



      
<?php
  
  $sqltd="SELECT * FROM msucesslist";
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
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Mutual Transfer</em></strong></h1><br>
                <div class="row">
                <div class="col-sm-8">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Weekly List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>TRID</th>
                                            <th>NAME</th>
                                            <th>TP</th>
                                            <th>NIC</th>
                                            <?php
                                            if($prboid=="Normal"){
                                                ?>
                                            <th>ACTION</th>
                                            <?php
                                                }
                                                ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>TRID</th>
                                            <th>NAME</th>
                                            <th>TP</th>
                                            <th>NIC</th> -->
                                            <?php
                                            // if($prboid=="Normal"){
                                            ?>
                                            <!-- <th>ACTION</th> -->
                                            <?php
                                                // }
                                            ?>
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while($recordtd = mysqli_fetch_array($resulttd)){
                                        $traci = $recordtd['msid'];

                                        $ennamem = $recordtd['name'];
                                        $entpnm = $recordtd['tpn'];
                                        $ennicm = $recordtd['nic'];

                                        $deennamem = base64_decode($ennamem);
                                        $deentpnm = base64_decode($entpnm);
                                        $deennicm = base64_decode($ennicm);
                                                            
                                    ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <td style="color:black;"><?php echo $recordtd['msid']; ?></td>
                                            <td><?php echo $deennamem; ?></td>
                                            <td><?php echo $deentpnm; ?></td>
                                            <td><?php echo $deennicm; ?></td>
                                            
                                            <?php
                                            if($prboid=="Normal"){
                                                ?>
                                            <td><a href="../../Action/tReport/tRdelete.php?id=<?php echo $recordtd['msid']; ?>"><button style="background-color:#B11E1E;">Remove</button></a></td>
                                            <?php
                                                }
                                            ?>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">More than week List</h3>
                            <div class="table-responsive">
                                <table id="example26" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>TRID</th>
                                            <th>NAME</th>
                                            <th>TP</th>
                                            <th>NIC</th>
                                            <?php
                                            if($prboid=="Normal"){
                                            ?>
                                            <th>ACTION</th>
                                            <?php
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>TRID</th>
                                            <th>NAME</th>
                                            <th>TP</th>
                                            <th>NIC</th> -->
                                            <?php
                                            // if($prboid=="Normal"){
                                            ?>
                                            <!-- <th>ACTION</th> -->
                                            <?php
                                                // }
                                            ?>
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while($recordcdf = mysqli_fetch_array($resultcdf)){
                                        

                                        $ennamemcdf = $recordcdf['name'];
                                        $entpnmcdf = $recordcdf['tpn'];
                                        $ennicmcdf = $recordcdf['nic'];

                                        $deennamemcdf = base64_decode($ennamemcdf);
                                        $deentpnmcdf = base64_decode($entpnmcdf);
                                        $deennicmcdf = base64_decode($ennicmcdf);
                                                            
                                    ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <td style="color:black;"><?php echo $recordcdf['msuid']; ?></td>
                                            <td><?php echo $deennamemcdf; ?></td>
                                            <td><?php echo $deentpnmcdf; ?></td>
                                            <td><?php echo $deennicmcdf; ?></td>
                                            
                                            <?php
                                            if($prboid=="Normal"){
                                                ?>
                                            <td><a href="../../Action/tReport/perDelete.php?id=<?php echo $recordcdf['msuid']; ?>"><button style="background-color:#B11E1E;">Remove</button></a></td>
                                                <?php
                                                }
                                                ?>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
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

    $('#example26').DataTable({
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