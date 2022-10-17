<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<?php
  
  $sqljub="SELECT * FROM qualificationtmp";
  $resultjub=$conn->query($sqljub);

?> 

<?php
  
  $sqldef="SELECT * FROM qualificationtmdel";
  $resultdef=$conn->query($sqldef);

?>

<?php
if(isset($_GET['deftid'])){

    $denpo = $_GET['deftid'];

    $deletetnact="delete from qualification where tid= $denpo";
    $conn->query($deletetnact);

    $deletetnvb="delete from qualificationtmdel where tid= $denpo";
    $conn->query($deletetnvb);


    if($conn-> query($deletetnvb)==TRUE && $conn->query($deletetnact)==TRUE){

?>
        
        <Script>
            alert("Details Deleted!");
            location='teaqualificationUpdt.php';
        
        </Script>
        
<?php
    exit();
    }
        

}
?>

<?php
    if(isset($_GET['tid'])){
        
        $bytedi = $_GET['tid'];

        $sqledte="SELECT * FROM qualificationtmp WHERE tid = $bytedi";
        $resultedte=$conn->query($sqledte);

        while($recordedte = mysqli_fetch_array($resultedte)){

            $enba = $recordedte['ba'];
            $enbsc = $recordedte['bsc'];
            $enbscs = $recordedte['bscs'];
            $enbcom = $recordedte['bcom'];
            $enbed = $recordedte['bed'];
            $enbba = $recordedte['bba'];
            $enother = $recordedte['other'];
            $enpgde = $recordedte['pgde'];
            $enpgdem = $recordedte['pgdem'];
            $enpgdea = $recordedte['pgdea'];
            $enoPther = $recordedte['oPther'];
            $enma = $recordedte['ma'];
            $enmsc = $recordedte['msc'];
            $enmed = $recordedte['med'];
            $enmphil = $recordedte['mphil'];
            $enphd = $recordedte['phd'];
        }

        $updatetr="UPDATE qualification SET ba='$enba',bsc='$enbsc',bscs='$enbscs',bcom='$enbcom',bed='$enbed',bba='$enbba',other='$enother',pgde='$enpgde',pgdem='$enpgdem',pgdea='$enpgdea',oPther='$enoPther',ma='$enma',msc='$enmsc',med='$enmed',mphil='$enmphil',phd='$enphd' WHERE tid=$bytedi";
        $conn-> query($updatetr);

        $deletetnpr="delete from qualificationtmp where tid= $bytedi";
        $conn->query($deletetnpr);

        if($conn-> query($updatetr)==TRUE && $conn->query($deletetnpr) == TRUE){

            ?>
            
            <Script>
                alert("Teacher Qualification Updated!");
                location='teaqualificationUpdt.php';
            
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
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Teacher ID</th>
                                            <th>BA</th>
                                            <th>BSc(Mgt)</th>
                                            <th>BSc(Science)</th>
                                            <th>BCom</th>
                                            <th>BEd</th>
                                            <th>BBA</th>
                                            <th>Other Degree</th>
                                            <th>PGDE</th>
                                            <th>PGDEM</th>
                                            <th>PGDEA</th>
                                            <th>MA</th>
                                            <th>MSc</th>
                                            <th>MEd</th>
                                            <th>MPhil</th>
                                            <th>phd</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>Action</th>
                                            <th>Teacher ID</th>
                                            <th>BA</th>
                                            <th>BSc(Mgt)</th>
                                            <th>BSc(Science)</th>
                                            <th>BCom</th>
                                            <th>BEd</th>
                                            <th>BBA</th>
                                            <th>Other Degree</th>
                                            <th>PGDE</th>
                                            <th>PGDEM</th>
                                            <th>PGDEA</th>
                                            <th>MA</th>
                                            <th>MSc</th>
                                            <th>MEd</th>
                                            <th>MPhil</th>
                                            <th>phd</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while($recordjub = mysqli_fetch_array($resultjub)){
                                            $tniv = $recordjub['tid'];
                                            $juenba = $recordjub['ba'];
                                            $juenbsc = $recordjub['bsc'];
                                            $juenbscs = $recordjub['bscs'];
                                            $juenbcom = $recordjub['bcom'];
                                            $juenbed = $recordjub['bed'];
                                            $juenbba = $recordjub['bba'];
                                            $juenother = $recordjub['other'];
                                            $juenpgde = $recordjub['pgde'];
                                            $juenpgdem = $recordjub['pgdem'];
                                            $juenpgdea = $recordjub['pgdea'];
                                            $juenoPther = $recordjub['oPther'];
                                            $juenma = $recordjub['ma'];
                                            $juenmsc = $recordjub['msc'];
                                            $juenmed = $recordjub['med'];
                                            $juenmphil = $recordjub['mphil'];
                                            $juenphd = $recordjub['phd'];

                                            $deenba = base64_decode($juenba);
                                            $deenbsc = base64_decode($juenbsc);
                                            $deenbscs = base64_decode($juenbscs);
                                            $deenbcom = base64_decode($juenbcom);
                                            $deenbed = base64_decode($juenbed);
                                            $deenbba = base64_decode($juenbba);
                                            $deenother = base64_decode($juenother);
                                            $deenpgde = base64_decode($juenpgde);
                                            $deenpgdem = base64_decode($juenpgdem);
                                            $deenpgdea = base64_decode($juenpgdea);
                                            $deenoPther = base64_decode($juenoPther);
                                            $deenma = base64_decode($juenma);
                                            $deenmsc = base64_decode($juenmsc);
                                            $deenmed = base64_decode($juenmed);
                                            $deenmphil = base64_decode($juenmphil);
                                            $deenphd = base64_decode($juenphd);

                                            $sqlniv="SELECT * FROM teacher where tid = $tniv";
                                            $resultniv=$conn->query($sqlniv);
                                            while($recordniv = mysqli_fetch_array($resultniv)){
                                                $nicol = $recordniv['nic'];
                                                $denicol = base64_decode($nicol);
                                            }
                                    ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <td><a href="<?php echo "teaqualificationUpdt.php?tid="?><?php echo $recordjub['tid']; ?>" ><button class="btn btn-primary">Approve</button></a></td>
                                            <td><?php echo $denicol; ?></td>
                                            <td><?php echo $deenba; ?></td>
                                            <td><?php echo $deenbsc; ?></td>
                                            <td><?php echo $deenbscs; ?></td>
                                            <td><?php echo $deenbcom; ?></td>
                                            <td><?php echo $deenbed; ?></td>
                                            <td><?php echo $deenbba; ?></td>
                                            <td><?php echo $deenother; ?></td>
                                            <td><?php echo $deenpgde; ?></td>
                                            <td><?php echo $deenpgdem; ?></td>
                                            <td><?php echo $deenpgdea; ?></td>
                                            <td><?php echo $deenoPther; ?></td>
                                            <td><?php echo $deenma; ?></td>
                                            <td><?php echo $deenmsc; ?></td>
                                            <td><?php echo $deenmed; ?></td>
                                            <td><?php echo $deenmphil; ?></td>
                                            <td><?php echo $deenphd; ?></td>           
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
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Teacher ID</th>
                                            <th>BA</th>
                                            <th>BSc(Mgt)</th>
                                            <th>BSc(Science)</th>
                                            <th>BCom</th>
                                            <th>BEd</th>
                                            <th>BBA</th>
                                            <th>Other Degree</th>
                                            <th>PGDE</th>
                                            <th>PGDEM</th>
                                            <th>PGDEA</th>
                                            <th>MA</th>
                                            <th>MSc</th>
                                            <th>MEd</th>
                                            <th>MPhil</th>
                                            <th>phd</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>Action</th>
                                            <th>Teacher ID</th>
                                            <th>BA</th>
                                            <th>BSc(Mgt)</th>
                                            <th>BSc(Science)</th>
                                            <th>BCom</th>
                                            <th>BEd</th>
                                            <th>BBA</th>
                                            <th>Other Degree</th>
                                            <th>PGDE</th>
                                            <th>PGDEM</th>
                                            <th>PGDEA</th>
                                            <th>MA</th>
                                            <th>MSc</th>
                                            <th>MEd</th>
                                            <th>MPhil</th>
                                            <th>phd</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while($recorddef = mysqli_fetch_array($resultdef)){ 
                                            $tnivdef = $recorddef['tid'];  
                                            $defenba = $recorddef['ba'];
                                            $defenbsc = $recorddef['bsc'];
                                            $defenbscs = $recorddef['bscs'];
                                            $defenbcom = $recorddef['bcom'];
                                            $defenbed = $recorddef['bed'];
                                            $defenbba = $recorddef['bba'];
                                            $defenother = $recorddef['other'];
                                            $defenpgde = $recorddef['pgde'];
                                            $defenpgdem = $recorddef['pgdem'];
                                            $defenpgdea = $recorddef['pgdea'];
                                            $defenoPther = $recorddef['oPther'];
                                            $defenma = $recorddef['ma'];
                                            $defenmsc = $recorddef['msc'];
                                            $defenmed = $recorddef['med'];
                                            $defenmphil = $recorddef['mphil'];
                                            $defenphd = $recorddef['phd'];

                                            $dedefenba = base64_decode($defenba);
                                            $dedefenbsc = base64_decode($defenbsc);
                                            $dedefenbscs = base64_decode($defenbscs);
                                            $dedefenbcom = base64_decode($defenbcom);
                                            $dedefenbed = base64_decode($defenbed);
                                            $dedefenbba = base64_decode($defenbba);
                                            $dedefenother = base64_decode($defenother);
                                            $dedefenpgde = base64_decode($defenpgde);
                                            $dedefenpgdem = base64_decode($defenpgdem);
                                            $dedefenpgdea = base64_decode($defenpgdea);
                                            $dedefenoPther = base64_decode($defenoPther);
                                            $dedefenma = base64_decode($defenma);
                                            $dedefenmsc = base64_decode($defenmsc);
                                            $dedefenmed = base64_decode($defenmed);
                                            $dedefenmphil = base64_decode($defenmphil);
                                            $dedefenphd = base64_decode($defenphd);

                                            $sqltcg="SELECT * FROM teacher where tid = $tnivdef";
                                            $resulttcg=$conn->query($sqltcg);
                                            while($recordtcg = mysqli_fetch_array($resulttcg)){
                                                $nictcg = $recordtcg['nic'];
                                                $denictcg = base64_decode($nictcg);
                                            }
                                    ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <td><a href="<?php echo "teaqualificationUpdt.php?deftid="?><?php echo $recorddef['tid']; ?>" ><button class="btn btn-primary">Approve</button></a></td>
                                            <td><?php echo $denictcg; ?></td>
                                            <td><?php echo $dedefenba; ?></td>
                                            <td><?php echo $dedefenbsc; ?></td>
                                            <td><?php echo $dedefenbscs; ?></td>
                                            <td><?php echo $dedefenbcom; ?></td>
                                            <td><?php echo $dedefenbed; ?></td>
                                            <td><?php echo $dedefenbba; ?></td>
                                            <td><?php echo $dedefenother; ?></td>
                                            <td><?php echo $dedefenpgde; ?></td>
                                            <td><?php echo $dedefenpgdem; ?></td>
                                            <td><?php echo $dedefenpgdea; ?></td>
                                            <td><?php echo $dedefenoPther; ?></td>
                                            <td><?php echo $dedefenma; ?></td>
                                            <td><?php echo $dedefenmsc; ?></td>
                                            <td><?php echo $dedefenmed; ?></td>
                                            <td><?php echo $dedefenmphil; ?></td>
                                            <td><?php echo $dedefenphd; ?></td>
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