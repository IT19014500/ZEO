<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<?php
  
  $sqljub="SELECT * FROM erservicetmp";
  $resultjub=$conn->query($sqljub);

?> 

<?php
  
  $sqldef="SELECT * FROM erservicetmdel";
  $resultdef=$conn->query($sqldef);

?>

<?php
  if(isset($_GET['deferlid'])){

      $denpo = $_GET['deferlid'];

      $deletetnact="delete from erservice where erlid= $denpo";
      $conn->query($deletetnact);

      $deletetnvb="delete from erservicetmdel where erlid= $denpo";
      $conn->query($deletetnvb);


      if($conn-> query($deletetnvb)==TRUE && $conn->query($deletetnact)==TRUE){

          ?>
          
          <Script>
              alert("Details Deleted!");
              location='ersvsEdit.php';
          
          </Script>
          
          <?php
              exit();
              }
          

  }
?>


<?php
    if(isset($_GET['erlid'])){
        
        $bytedi = $_GET['erlid'];

        $sqledte="SELECT * FROM erservicetmp WHERE erlid = $bytedi";
        $resultedte=$conn->query($sqledte);

        while($recordedte = mysqli_fetch_array($resultedte)){

            $Tschool=$recordedte['school'];
            // $Tproid=$recordedte['proid'];
            // $Tzid=$recordedte['zid'];
            $Tsdate=$recordedte['sdate'];
            $Tendate=$recordedte['endate'];
            $Ttid=$recordedte['tid'];

        }

        $updatetr="UPDATE erservice SET school='$Tschool',sdate='$Tsdate',endate='$Tendate',tid='$Ttid' where erlid=$bytedi ";
        $conn-> query($updatetr);

        $deletetnpr="delete from erservicetmp where erlid= $bytedi";
        $conn->query($deletetnpr);

        if($conn-> query($updatetr)==TRUE && $conn->query($deletetnpr) == TRUE){

        ?>
            
            <Script>
                alert("Early Service Updated!");
                location='ersvsEdit.php';
            
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
                                    <caption style="color:#000000;">Request List</caption>
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>TID</th>
                                            <th>SCHOOL</th>
                                            <th>PROVINCE</th>
                                            <th>ZONE</th>
                                            <th>START DATE</th>
                                            <th>END DATE</th>  
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>Action</th>
                                            <th>TID</th>
                                            <th>SCHOOL</th>
                                            <th>PROVINCE</th>
                                            <th>ZONE</th>
                                            <th>START DATE</th>
                                            <th>END DATE</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while($recordjub = mysqli_fetch_array($resultjub)){   
                                            $tniv = $recordjub['tid'];
                                            $juenba = $recordjub['school'];
                                            // $zidba = $recordjub['zid'];
                                            // $pkpr = $recordjub['proid'];

                                            $sqlniv="SELECT * FROM teacher where tid = $tniv";
                                            $resultniv=$conn->query($sqlniv);
                                            while($recordniv = mysqli_fetch_array($resultniv)){
                                                $nicol = $recordniv['nic'];
                                                $denicol = base64_decode($nicol);
                                            }

                                            $sqlsdp="SELECT * FROM school where scid = $juenba";
                                            $resultsdp=$conn->query($sqlsdp);
                                            while($recordsdp = mysqli_fetch_array($resultsdp)){
                                                $sdpol = $recordsdp['name'];
                                                $desdpol = base64_decode($sdpol);
                                                $buczonecode = $recordsdp['zonecode'];
                                                // $debuczonecode = base64_decode($buczonecode);
                                                $sqlzcg="SELECT * FROM zonet where zonecode = '$buczonecode'";
                                                $resultzcg=$conn->query($sqlzcg);
                                                while($recordzcg = mysqli_fetch_array($resultzcg)){
                                                    $zcgzone = $recordzcg['zone'];
                                                    $dezcgzone = base64_decode($zcgzone);
                                                }
                                                $bucdistcode = $recordsdp['distcode'];
                                                // $debucdistcode = base64_decode($bucdistcode);
                                                $sqldtn="SELECT * FROM district where distcode = '$bucdistcode'";
                                                $resultdtn=$conn->query($sqldtn);
                                                while($recorddtn = mysqli_fetch_array($resultdtn)){
                                                    $dtndistname = $recorddtn['distname'];
                                                    $dedtndistname = base64_decode($dtndistname);
                                                    $dtnprocode = $recorddtn['procode'];
                                                    $sqlpvn="SELECT * FROM provincet where procode = '$dtnprocode'";
                                                    $resultpvn=$conn->query($sqlpvn);
                                                    while($recordpvn = mysqli_fetch_array($resultpvn)){
                                                        $pvnname = $recordpvn['name'];
                                                        $depvnname = base64_decode($pvnname);
                                                    }
                                                }
                                            }
                                            
                                    ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <td><a href="<?php echo "ersvsEdit.php?erlid="?><?php echo $recordjub['erlid']; ?>" ><button class="btn btn-primary">Approve</button></a></td>
                                            <td><?php echo $denicol; ?></td>
                                            <td><?php echo $desdpol; ?></td>
                                            <td><?php echo $depvnname; ?></td>
                                            <td><?php echo $dezcgzone; ?></td>
                                            <td><?php echo $recordjub['sdate']; ?></td>
                                            <td><?php echo $recordjub['endate']; ?></td>
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
                                    <caption style="color:#000000;">Request List</caption>
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>TID</th>
                                            <th>SCHOOL</th>
                                            <th>PROVINCE</th>
                                            <th>ZONE</th>
                                            <th>START DATE</th>
                                            <th>END DATE</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>Action</th>
                                            <th>TID</th>
                                            <th>SCHOOL</th>
                                            <th>PROVINCE</th>
                                            <th>ZONE</th>
                                            <th>START DATE</th>
                                            <th>END DATE</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while($recorddef = mysqli_fetch_array($resultdef)){   
                                            $tnivdef = $recorddef['tid'];
                                            $juenbadef = $recorddef['school'];
                                            // $zidbadef = $recorddef['zid'];
                                            // $pkprdef = $recorddef['proid'];

                                            $sqltcg="SELECT * FROM teacher where tid = $tnivdef";
                                            $resulttcg=$conn->query($sqltcg);
                                            while($recordtcg = mysqli_fetch_array($resulttcg)){
                                                $nictcg = $recordtcg['nic'];
                                                $denictcg = base64_decode($nictcg);
                                            }
                                            $degbczone = "";
                                            $depqmname = "";
                                            $deapcdistname = "";
                                            $sqlsco="SELECT * FROM school where scid = $juenbadef";
                                            $resultsco=$conn->query($sqlsco);
                                            while($recordsco = mysqli_fetch_array($resultsco)){
                                                $scool = $recordsco['name'];
                                                $descool = base64_decode($scool);
                                                $scozonecode = $recordsco['zonecode'];
                                                // $debuczonecode = base64_decode($buczonecode);
                                                $sqlgbc="SELECT * FROM zonet where zonecode = '$scozonecode'";
                                                $resultgbc=$conn->query($sqlgbc);
                                                while($recordgbc = mysqli_fetch_array($resultgbc)){
                                                    $gbczone = $recordgbc['zone'];
                                                    $degbczone = base64_decode($gbczone);
                                                }
                                                $scodistcode = $recordsco['distcode'];
                                                // $debucdistcode = base64_decode($bucdistcode);
                                                $sqlapc="SELECT * FROM district where distcode = '$scodistcode'";
                                                $resultapc=$conn->query($sqlapc);
                                                while($recordapc = mysqli_fetch_array($resultapc)){
                                                    $apcdistname = $recordapc['distname'];
                                                    $deapcdistname = base64_decode($apcdistname);
                                                    $apcprocode = $recordapc['procode'];
                                                    $sqlpqm="SELECT * FROM provincet where procode = '$pqmprocode'";
                                                    $resultpqm=$conn->query($sqlpqm);
                                                    while($recordpqm = mysqli_fetch_array($resultpqm)){
                                                        $pqmname = $recordpqm['name'];
                                                        $depqmname = base64_decode($pqmname);
                                                    }
                                                }
                                            }
                                    ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <td><a href="<?php echo "ersvsEdit.php?deferlid="?><?php echo $recorddef['erlid']; ?>" ><button class="btn btn-primary">Approve</button></a></td>
                                            <td><?php echo $denictcg; ?></td>
                                            <td><?php echo $descool; ?></td>
                                            <td><?php echo $depqmname; ?></td>
                                            <td><?php echo $degbczone; ?></td>
                                            <td><?php echo $recorddef['sdate']; ?></td>
                                            <td><?php echo $recorddef['endate']; ?></td>
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