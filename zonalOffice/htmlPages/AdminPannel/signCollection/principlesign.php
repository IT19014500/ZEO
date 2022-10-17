<?php
    include('../../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){
  
?>

<!-- school id filter by principle session -->
<?php
  $rth = $_SESSION['uname'];
  $derth = base64_encode($rth);

  $sqlli="SELECT * FROM school WHERE census = '$derth'";
  $resultli=$conn->query($sqlli);
  while($recordli = mysqli_fetch_array($resultli)){
    $vht = $recordli['scid'];

  }
?>

<?php


  $ykl = $_SESSION['ref'];
  
  if($ykl==2){
    $sqlte="SELECT * FROM teacher";
    $resultte=$conn->query($sqlte);
  }else{
    $sqlte="SELECT * FROM teacher where scid = $vht && tid NOT IN (SELECT tid FROM prisign);";
    $resultte=$conn->query($sqlte);
    
  }

  if(isset($_GET['adsi'])){
  $adsit=$_GET['adsi'];


  $addapr="INSERT INTO prisign(tid)VALUES('$adsit')";

  if($conn-> query($addapr)==TRUE){

?>

<Script>
  alert("Teacher Approved!");
  location='principlesign.php';

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
    <link rel="icon" type="image/png" sizes="16x16" href="../../../images/logoGvmnt.png">
    <title>Main Admin</title>
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
            require_once '../menu/topNavigation/Principal/PrincipalTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../menu/Principal/signCollection.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Provide Principal Approval</em></strong></h1><br>
                <div class="row">
                <div class="col-sm-8">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Approved List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>ACTION</th>
                                            <th>NAME</th>
                                            <th>ADDRESS</th>
                                            <th>NIC</th>
                                            <th>DOB</th>
                                            <th>TP</th>
                                            <th>WHATSAPP</th>
                                            <th>SEX</th>
                                            <th>MARITAL STATUS</th>
                                            <th>FB NAME</th>
                                            <th>E-MAIL</th>
                                            <th>EARNING SCHOOL</th>
                                            <th>PLACEMENT CATEGORY</th>
                                            <th>SCHOOL</th>
                                            <th>PLACEMENT LANGUAGE</th>
                                            <th>PLACEMENT DATE</th>
                                            <th>PLACEMENT SUBJECT</th>
                                            <th>PROFESSION</th>
                                            <th>REGISTERED DAY</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>ACTION</th>
                                            <th>NAME</th>
                                            <th>ADDRESS</th>
                                            <th>NIC</th>
                                            <th>DOB</th>
                                            <th>TP</th>
                                            <th>WHATSAPP</th>
                                            <th>SEX</th>
                                            <th>MARITAL STATUS</th>
                                            <th>FB NAME</th>
                                            <th>E-MAIL</th>
                                            <th>EARNING SCHOOL</th>
                                            <th>PLACEMENT CATEGORY</th>
                                            <th>SCHOOL</th>
                                            <th>PLACEMENT LANGUAGE</th>
                                            <th>PLACEMENT DATE</th>
                                            <th>PLACEMENT SUBJECT</th>
                                            <th>PROFESSION</th>
                                            <th>REGISTERED DAY</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while($recordte = mysqli_fetch_array($resultte)){
                                                $trre = $recordte['tid'];
                                            
                                                $enfullname = $recordte['fullname'];
                                                $enaddressT = $recordte['addressT'];
                                                $ennic = $recordte['nic'];
                                                $entp = $recordte['tp'];
                                                $enwtp = $recordte['wtp'];
                                                $ensex = $recordte['sex'];
                                                $eneMail = $recordte['eMail'];
                                                $enfbName = $recordte['fbName'];
                                                $ensalschool = $recordte['salschool'];

                                                $deenfullname = base64_decode($enfullname);
                                                $deenaddressT = base64_decode($enaddressT);
                                                $deennic = base64_decode($ennic);
                                                $deentp = base64_decode($entp);
                                                $deenwtp = base64_decode($enwtp);
                                                $deensex = base64_decode($ensex);
                                                $deeneMail = base64_decode($eneMail);
                                                $deenfbName = base64_decode($enfbName);
                                                $deensalschool = base64_decode($ensalschool);
                                        ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <?php
                                                $btr='';
                                                $sqltrr="SELECT * FROM prisign where tid = $trre";
                                                $resulttrr=$conn->query($sqltrr);

                                                while($recordtrr = mysqli_fetch_array($resulttrr)){
                                                    $btr='fnd';
                                                }
                                                if($btr!='fnd'){
                                            ?>
                                            <td><a href="<?php echo "principlesign.php?adsi="?><?php echo $recordte['tid']; ?>" ><button class="btn btn-primary">Approve</button></a></td>
                                            <?php
                                                }else{
                                            ?>
                                            <td><a href="<?php echo "../../../Action/tSign/priDelete.php?tea_ID="?><?php echo $recordte['tid']; ?>" ><button class="btn btn-danger">Remove</button></a></td> 
                                            <?php
                                                }
                                            ?>
                                            <td><?php echo $deenfullname; ?></td>
                                            <td><?php echo $deenaddressT; ?></td>
                                            <td><?php echo $deennic; ?></td>
                                            <td><?php echo $recordte['dob']; ?></td>
                                            <td><?php echo $deentp; ?></td>
                                            <td><?php echo $deenwtp; ?></td>
                                            <td><?php echo $deensex; ?></td>
                                            <?php
                                                $mstnid= $recordte['mstatus'];
                                                $sqlmsda="SELECT * FROM mstatus WHERE mrid = $mstnid";
                                                $resultmsda=$conn->query($sqlmsda);
                                                while($recordmsda = mysqli_fetch_array($resultmsda)){
                                                $enmsdanam = $recordmsda['status'];
                                                $deenmsdanam = base64_decode($enmsdanam);
                                                }
                                            ?> 
                                            <td><?php echo $deenmsdanam; ?></td>
                                            <td><?php echo $deenfbName; ?></td>
                                            <td><?php echo $deeneMail; ?></td>
                                            <td><?php echo $deensalschool; ?></td>
                                            <?php
                                                $placdid= $recordte['placement'];
                                                $sqlpla="SELECT * FROM plcategory WHERE plid = $placdid";
                                                $resultpla=$conn->query($sqlpla);
                                                while($recordpla = mysqli_fetch_array($resultpla)){
                                                    $enplanam = $recordpla['name'];
                                                    $deenplanam = base64_decode($enplanam);
                                                }
                                            ?> 
                                            <td><?php echo $deenplanam; ?></td>
                                            <?php
                                                $sciddid= $recordte['scid'];
                                                $sqlscls="SELECT * FROM school WHERE scid = $sciddid";
                                                $resultscls=$conn->query($sqlscls);
                                                while($recordscls = mysqli_fetch_array($resultscls)){
                                                    $ensclsnam = $recordscls['name'];
                                                    $deensclsnam = base64_decode($ensclsnam);
                                                }
                                            ?>
                                            <td><?php echo $deensclsnam; ?></td>
                                            <?php
                                                $pllangdid = $recordte['pllang'];
                                                $sqllans="SELECT * FROM languages WHERE lid = $pllangdid";
                                                $resultlans=$conn->query($sqllans);
                                                while($recordlans = mysqli_fetch_array($resultlans)){
                                                    $enlansnam = $recordlans['name'];
                                                    $deenlansnam = base64_decode($enlansnam);
                                                }
                                            ?>
                                            <td><?php echo $deenlansnam; ?></td>
                                            <td><?php echo $recordte['pldate']; ?></td>
                                            <?php
                                                $suIDdid = $recordte['suID'];
                                                $sqlsus="SELECT * FROM subject WHERE suID = $suIDdid";
                                                $resultsus=$conn->query($sqlsus);
                                                while($recordsus = mysqli_fetch_array($resultsus)){
                                                    $ensusnam = $recordsus['name'];
                                                    $deensusnam = base64_decode($ensusnam);
                                                    
                                                    $fca = $recordsus['caid'];
                                                    $fssid = $recordsus['ssid'];

                                                    $sqlcx="SELECT * FROM subcategory WHERE caid = $fca";
                                                    $resultcx=$conn->query($sqlcx);
                                                    while($recordcx = mysqli_fetch_array($resultcx)){
                                                    $cxna = $recordcx['name'];
                                                    $decxna = base64_decode($cxna);
                                                    }
                                                            
                                                    $sqlstq="SELECT * FROM substream WHERE ssid = $fssid";
                                                    $resultstq=$conn->query($sqlstq);
                                                    while($recordstq = mysqli_fetch_array($resultstq)){
                                                    $stqna = $recordstq['name'];
                                                    $destqna = base64_decode($stqna);
                                                    }
                                                }
                                            ?>
                                            <td><?php echo $deensusnam." ( ".$decxna." - ".$destqna." )"; ?></td>
                                            <?php
                                                $cprodid = $recordte['cpro'];
                                                $sqlcps="SELECT * FROM profession WHERE proid = $cprodid";
                                                $resultcps=$conn->query($sqlcps);
                                                while($recordcps = mysqli_fetch_array($resultcps)){
                                                    $encpsnam = $recordcps['name'];
                                                    $deencpsnam = base64_decode($encpsnam);
                                                }
                                            ?>
                                            <td><?php echo $deencpsnam; ?></td>
                                            <td><?php echo $recordte['registerDay']; ?></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                        $sql3="SELECT * FROM teachertmp where scid = $vht";
                        $result3=$conn->query($sql3);
                    ?>
                    <?php
                        if(isset($_GET['tidp'])){
                            
                            $bytedi = $_GET['tidp'];

                            $sqledte="SELECT * FROM teachertmp WHERE tid = $bytedi";
                            $resultedte=$conn->query($sqledte);

                            while($recordedte = mysqli_fetch_array($resultedte)){

                                $TfullNamevar=$recordedte['fullname'];
                                $TaddressTvar=$recordedte['addressT'];
                                $Tnicvar=$recordedte['nic'];
                                $Tdob=$recordedte['dob'];
                                $Ttpvar=$recordedte['tp'];
                                $Twtpvar=$recordedte['wtp'];
                                $Tsexvar=$recordedte['sex'];
                                $Tmstatus=$recordedte['mstatus'];
                                $TfbNamevar=$recordedte['fbName'];
                                $TeMailvar=$recordedte['eMail'];
                                $Tsalschoolvar=$recordedte['salschool'];
                                $placement=$recordedte['placement'];
                                $Tscid=$recordedte['scid'];
                                $Tpllang=$recordedte['pllang'];
                                $Tpldate=$recordedte['pldate'];
                                $TsuID=$recordedte['suID'];
                                $Tprofession=$recordedte['cpro'];
                        }

                        $updatetr="UPDATE teacher SET fullname='$TfullNamevar',addressT='$TaddressTvar',nic='$Tnicvar',dob='$Tdob',tp='$Ttpvar',wtp='$Twtpvar',sex='$Tsexvar',mstatus='$Tmstatus',fbName='$TfbNamevar',eMail='$TeMailvar',salschool='$Tsalschoolvar',placement='$placement',scid='$Tscid',pllang='$Tpllang',pldate='$Tpldate',suID='$TsuID',cpro='$Tprofession' where tid=$bytedi ";
                        $conn-> query($updatetr);

                        $deletetnpr="delete from teachertmp where tid= $bytedi";
                        $conn->query($deletetnpr);

                        if($conn-> query($updatetr)==TRUE && $conn->query($deletetnpr)==TRUE){

                    ?>
            
                    <Script>
                        alert("Teacher Updated!");
                        location='principlesign.php';
                    </Script>
                    <?php
                        exit();
                        }
                    }
                    ?>
                    <div class="col-sm-4">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Edit Requested List</h3>
                            <div class="table-responsive">
                                <table id="example26" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>ACTION</th>
                                            <th>NAME</th>
                                            <th>ADDRESS</th>
                                            <th>NIC</th>
                                            <th>DOB</th>
                                            <th>TP</th>
                                            <th>WHATSAPP</th>
                                            <th>SEX</th>
                                            <th>MARITAL STATUS</th>
                                            <th>FB NAME</th>
                                            <th>E-MAIL</th>
                                            <th>EARNING SCHOOL</th>
                                            <th>PLACEMENT CATEGORY</th>
                                            <th>SCHOOL ID</th>
                                            <th>PLACEMENT LANGUAGE</th>
                                            <th>PLACEMENT DATE</th>
                                            <th>PLACEMENT SUBJECT ID</th>
                                            <th>PROFESSION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>ACTION</th>
                                            <th>NAME</th>
                                            <th>ADDRESS</th>
                                            <th>NIC</th>
                                            <th>DOB</th>
                                            <th>TP</th>
                                            <th>WHATSAPP</th>
                                            <th>SEX</th>
                                            <th>MARITAL STATUS</th>
                                            <th>FB NAME</th>
                                            <th>E-MAIL</th>
                                            <th>EARNING SCHOOL</th>
                                            <th>PLACEMENT CATEGORY</th>
                                            <th>SCHOOL ID</th>
                                            <th>PLACEMENT LANGUAGE</th>
                                            <th>PLACEMENT DATE</th>
                                            <th>PLACEMENT SUBJECT ID</th>
                                            <th>PROFESSION</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while($record3 = mysqli_fetch_array($result3)){
                                            $tbit= $record3['tid'];
                                            $mst= $record3['mstatus'];
                                            $pmnt= $record3['placement'];
                                            $scna= $record3['scid'];
                                            $lanid= $record3['pllang'];
                                            $subjid= $record3['suID'];
                                            $profid= $record3['cpro'];
                                            $pldt= $record3['pldate'];
                                            $pdob= $record3['dob'];

                                            // New part start
                                                $enfullname = $record3['fullname'];
                                                $enaddressT = $record3['addressT'];
                                                $ennic = $record3['nic'];
                                                $entp = $record3['tp'];
                                                $enwtp = $record3['wtp'];
                                                $ensex = $record3['sex'];
                                                $eneMail = $record3['eMail'];
                                                $enfbName = $record3['fbName'];
                                                $ensalschool = $record3['salschool'];

                                                $deenfullname = base64_decode($enfullname);
                                                $deenaddressT = base64_decode($enaddressT);
                                                $deennic = base64_decode($ennic);
                                                $deentp = base64_decode($entp);
                                                $deenwtp = base64_decode($enwtp);
                                                $deensex = base64_decode($ensex);
                                                $deeneMail = base64_decode($eneMail);
                                                $deenfbName = base64_decode($enfbName);
                                                $deensalschool = base64_decode($ensalschool);
                                        ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <td>
                                                <a href="<?php echo "principlesign.php?tidp="?><?php echo $record3['tid']; ?>" ><button class="btn btn-primary">Approve</button></a>
                                                <br></br>
                                                <a href="<?php echo "../../../Action/teacher/apDelete.php?tids="?><?php echo $record3['tid']; ?>"><button class = "btn btn-danger">Remove</button></a>
                                            </td>
                                            <td><?php echo $deenfullname; ?></td>
                                            <td><?php echo $deenaddressT; ?></td>
                                            <td><?php echo $deennic; ?></td>
                                            <td><?php echo $pdob; ?></td>
                                            <td><?php echo $deentp; ?></td>
                                            <td><?php echo $deenwtp; ?></td>
                                            <td><?php echo $deensex; ?></td>
                                            <?php
                                                $sqlmst="SELECT * FROM mstatus where mrid=$mst";
                                                $resultmst=$conn->query($sqlmst);
                                                while($recordmst = mysqli_fetch_array($resultmst)){
                                                $enmstn = $recordmst['status'];
                                                $deenmstn = base64_decode($enmstn);
                                                }
                                            ?>
                                            <td><?php echo $deenmstn; ?></td>
                                            <td><?php echo $deenfbName; ?></td>
                                            <td><?php echo $deeneMail; ?></td>
                                            <td><?php echo $deensalschool; ?></td>
                                            <?php
                                                $sqlpct="SELECT * FROM plcategory where plid = $pmnt";
                                                $resultpct=$conn->query($sqlpct);
                                                while($recordpct = mysqli_fetch_array($resultpct)){
                                                $enpmns = $recordpct['name'];
                                                $deenpmns = base64_decode($enpmns);
                                                }
                                            ?>
                                            <td><?php echo $deenpmns; ?></td>
                                            <?php
                                                $sqlbn="SELECT * FROM school where scid = $scna";
                                                $resultbn=$conn->query($sqlbn);
                                                while($recordbn = mysqli_fetch_array($resultbn)){
                                                    $ensckl = $recordbn['name'];
                                                    $deensckl = base64_decode($ensckl);
                                                }
                                            ?>
                                            <td><?php echo $deensckl; ?></td>
                                            <?php
                                                $sqllan="SELECT * FROM languages where lid = $lanid";
                                                $resultlan=$conn->query($sqllan);
                                                while($recordlan = mysqli_fetch_array($resultlan)){
                                                    $enlab = $recordlan['name'];
                                                    $deenlab = base64_decode($enlab);
                                                }
                                            ?>
                                            <td><?php echo $deenlab; ?></td>
                                            <td><?php echo $pldt; ?></td>
                                            <?php
                                                $sqlsip="SELECT * FROM subject where suID = $subjid";
                                                $resultsip=$conn->query($sqlsip);
                                                while($recordsip = mysqli_fetch_array($resultsip)){
                                                    $ensubn = $recordsip['name'];
                                                    $deensubn = base64_decode($ensubn);

                                                    $caj=$recordsip['caid'];
                                                    $stj=$recordsip['ssid'];

                                                        $sqlsca="SELECT * FROM subcategory where caid = $caj";
                                                        $resultsca=$conn->query($sqlsca);
                                                        while($recordsca = mysqli_fetch_array($resultsca)){
                                                            $cajnam = $recordsca['name'];
                                                            $decajnam = base64_decode($cajnam);
                                                        }

                                                        $sqlsst="SELECT * FROM substream where ssid = $stj";
                                                        $resultsst=$conn->query($sqlsst);
                                                        while($recordsst = mysqli_fetch_array($resultsst)){
                                                            $sstjnam = $recordsst['name'];
                                                            $desstjnam = base64_decode($sstjnam);
                                                        }
                                                }
                                            ?>
                                            <td><?php echo $deensubn." ( ".$decajnam." - ".$desstjnam." )"; ?></td>
                                            <?php
                                                $sqlpr="SELECT * FROM profession where proid = $profid";
                                                $resultpr=$conn->query($sqlpr);
                                                while($recordpr = mysqli_fetch_array($resultpr)){
                                                    $enprop = $recordpr['name'];
                                                    $deenprop = base64_decode($enprop);
                                                }
                                            ?>
                                            <td><?php echo $deenprop; ?></td>
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

    $('#example26').DataTable({
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