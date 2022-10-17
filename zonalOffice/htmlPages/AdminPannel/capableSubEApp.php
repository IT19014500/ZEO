<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<?php
  $sqljub="SELECT * FROM cpblesubtemp";
  $resultjub=$conn->query($sqljub);
?>

<?php
  $sqldef="SELECT * FROM cpblesubtmdel";
  $resultdef=$conn->query($sqldef);
?> 

<?php
if(isset($_GET['delcbeif'])){

    $denpo = $_GET['delcbeif'];

    $deletetnact="delete from cpblesub where cbid= $denpo";
    $conn->query($deletetnact);

    $deletetnvb="delete from cpblesubtmdel where cbid= $denpo";
    $conn->query($deletetnvb);


    if($conn-> query($deletetnvb)==TRUE && $conn->query($deletetnact)==TRUE){

        ?>
        
        <Script>
            alert("Details Deleted!");
            location='capableSubEApp.php';
        
        </Script>
        
        <?php
            exit();
            }
        

}
?>

<?php
    if(isset($_GET['cbeif'])){
        
        $bytedi = $_GET['cbeif'];

        $sqledte="SELECT * FROM cpblesubtemp WHERE cbid = $bytedi";
        $resultedte=$conn->query($sqledte);

        while($recordedte = mysqli_fetch_array($resultedte)){

            $TsuID = $recordedte['suID'];
            $Ttid = $recordedte['tid'];
            $encdid = $recordedte['cbid'];
            

        }

        $updatetr="UPDATE cpblesub SET suID='$TsuID',tid='$Ttid' where cbid=$encdid ";
        $conn-> query($updatetr);

        $deletetnpr="delete from cpblesubtemp where cbid= $encdid";
        $conn->query($deletetnpr);

        if($conn-> query($updatetr)==TRUE && $conn->query($deletetnpr)==TRUE){

            ?>
            
            <Script>
                alert("Teacher Updated!");
                location='capableSubEApp.php';
            
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
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Profile Requests</em></strong></h1><br>
                <a href="ediitDashboard/headteEdit.php"><button style="margin-left:10px;border:none;width:150px;border-radius:16px;">Edit Pannel</button></a><br><br>
                <div class="row">
                <div class="col-sm-8">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Edit Requests</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Edit Request List</caption>
                                    <thead>
                                        <tr>
                                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
                                            <th>TEACHER ID</th>
                                            <th>SUBJECT</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>SUBJECT</th>
                                            <th>TEACHER ID</th>
                                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while($recordjub = mysqli_fetch_array($resultjub)){   
                                            $msubjub = $recordjub['suID'];
                                            $tniv = $recordjub['tid'];

                                            

                                                $sqlniv="SELECT * FROM teacher where tid = $tniv";
                                                $resultniv=$conn->query($sqlniv);
                                                while($recordniv = mysqli_fetch_array($resultniv)){
                                                    $nicol = $recordniv['nic'];
                                                    $denicol = base64_decode($nicol);
                                                }


                                                $sqlbl="SELECT * FROM subject where suID = $msubjub";
                                                $resultbl=$conn->query($sqlbl);
                                                while($recordbl = mysqli_fetch_array($resultbl)){
                                                    $blca = $recordbl['caid'];
                                                    $blstr = $recordbl['ssid'];
                                                    $blbv = $recordbl['name'];
                                                    

                                                    $deblbv = base64_decode($blbv);

                                                $sqlstjo="SELECT * FROM substream where ssid = $blstr";
                                                $resultstjo=$conn->query($sqlstjo);
                                                while($recordstjo = mysqli_fetch_array($resultstjo)){
                                                    $blstjo = $recordstjo['name'];
                                                    $deblstjo = base64_decode($blstjo);
                                                }

                                                $sqljtoc="SELECT * FROM subcategory where caid = $blca";
                                                $resultjtoc=$conn->query($sqljtoc);
                                                while($recordjtoc = mysqli_fetch_array($resultjtoc)){
                                                    $bljtoc = $recordjtoc['name'];
                                                    $debljtoc = base64_decode($bljtoc);
                                                }


                                            }
                                            
                                    ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <td><a href="<?php echo "capableSubEApp.php?cbeif="?><?php echo $recordjub['cbid']; ?>" ><button class="btn btn-primary">Approve</button></a></td>
                                            <td><?php echo $denicol; ?></td>
                                            <td><?php echo $deblbv." (".$deblstjo." - ".$debljtoc." )"; ?></td>
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
                            <h3 class="box-title m-b-0">Delete Requests</h3>
                            <div class="table-responsive">
                                <table id="example26" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Delete Request List</caption>
                                    <thead>
                                        <tr>
                                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
                                            <th>TEACHER ID</th>
                                            <th>SUBJECT</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
                                            <th>TEACHER ID</th>
                                            <th>SUBJECT</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while($recorddef = mysqli_fetch_array($resultdef)){   
                                            $msubdef = $recorddef['suID'];
                                            $tnivdef = $recorddef['tid'];

                                            $sqlvde="SELECT * FROM teacher where tid = $tnivdef";
                                            $resultvde=$conn->query($sqlvde);
                                            while($recordvde = mysqli_fetch_array($resultvde)){
                                                $nicvde = $recordvde['nic'];
                                                $denicvde = base64_decode($nicvde);
                                            }

                                            $sqlcpr="SELECT * FROM subject where suID = $msubdef";
                                            $resultcpr=$conn->query($sqlcpr);
                                            while($recordcpr = mysqli_fetch_array($resultcpr)){
                                                $cprca = $recordcpr['caid'];
                                                $cprstr = $recordcpr['ssid'];
                                                $cprbv = $recordcpr['name'];
                                                

                                                $decprbv = base64_decode($cprbv);

                                            $sqlsush="SELECT * FROM substream where ssid = $cprstr";
                                            $resultsush=$conn->query($sqlsush);
                                            while($recordsush = mysqli_fetch_array($resultsush)){
                                                $blsush = $recordsush['name'];
                                                $deblsush = base64_decode($blsush);
                                            }

                                            $sqlscon="SELECT * FROM subcategory where caid = $cprca";
                                            $resultscon=$conn->query($sqlscon);
                                            while($recordscon = mysqli_fetch_array($resultscon)){
                                                $blscon = $recordscon['name'];
                                                $deblscon = base64_decode($blscon);
                                            }

                                        }

                                    ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <td><a href="<?php echo "capableSubEApp.php?delcbeif="?><?php echo $recorddef['cbid']; ?>" ><button class="btn btn-primary">Approve</button></a></td>
                                            <td><?php echo $denicvde; ?></td>
                                            <td><?php echo $decprbv." (".$deblsush." - ".$deblscon." )"; ?></td>
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