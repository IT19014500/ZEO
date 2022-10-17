<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2 || $_SESSION['ref']==6 || $_SESSION['ref']==1){
?>

<?php
  $rth=$_SESSION['uname'];
  $derth=base64_encode($rth);

  $sqlsif="SELECT * FROM markadmin where username = '$derth' ";
  $resultsif=$conn->query($sqlsif);
  while($recordsif = mysqli_fetch_array($resultsif)){
    $madscl = $recordsif['scid'];
    $sqlnsc="SELECT * FROM school where scid = $madscl ";
    $resultnsc=$conn->query($sqlnsc);
    while($recordnsc = mysqli_fetch_array($resultnsc)){
      $madnms = $recordnsc['name'];
      $demadnms = base64_decode($madnms);
    }
  }
?>

      
<?php
  $prboid = "Normal";
  if(isset($_GET['prbuid'])){
    $prboid = $_GET['prbuid'];
  }
  $sql3="SELECT * FROM marktbl where scid = $madscl ";
  $result3=$conn->query($sql3);
?> 

<?php
  if(isset($_POST['submit'])){
    $Tscid=$_POST['Oscid'];
    $TsuID=$_POST['OsuID'];
    $Tcls=$_POST['Ocls'];
    $Ttmid=$_POST['Otmid'];
    $Tsidv=$_POST['Osidv'];
    $Tmark=$_POST['Omark'];

    $Ttmidvar = base64_encode($Ttmid);
    $Tsidvvar = base64_encode($Tsidv);


    $add="INSERT INTO marktbl(scid,suID,class,tmid,sidv,mark)VALUES('$Tscid','$TsuID','$Tcls','$Ttmidvar','$Tsidvvar','$Tmark')";

    if($conn-> query($add)==TRUE){
?>

<Script>
    alert("Marks Details Added!");
    location='addMarks.php';
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
    <title>ZEO Marks Admin</title>
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
            require_once 'menu/topNavigation/MarkAdmin/markingNpgTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once 'menu/MarkAdmin/markAdminNpgMenu.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Marks</em></strong></h1><br>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="#" method="post">
                            <div align="left">
                                <select class="form-control" id = "Oscid1" name="Oscid" required>
                                <option value="<?php echo $madscl; ?>" selected><?php echo $demadnms; ?></option>
                                </select>
                            </div><br>
                            <?php
                            $sqlbn="SELECT * FROM subject ";
                            $resultbn=$conn->query($sqlbn);
                            ?> 
                            <div align="left">
                                <select class="form-control" id = "OsuID1" name="OsuID" placeholder="ENTER SUBJECT ID" required>
                                <option value="0" selected>-Select Subject-</option>
                                <?php
                                    while($recordbn = mysqli_fetch_array($resultbn)){
                                        $scc=$recordbn['suID'];
                                        $sccnam=$recordbn['name'];
                                        $desccnam = base64_decode($sccnam);

                                        $fca = $recordbn['caid'];
                                        $fssid = $recordbn['ssid'];

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
                                ?>
                                <option value="<?php echo $scc; ?>" ><?php echo $desccnam." ( ".$destqna." - ".$decxna." ) "; ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div><br>
                            <div align="left">
                                <select class="form-control" id = "Otmid1" name="Otmid" required>
                                    <option value="0" selected>-Select Term-</option>
                                    <option value="Term 1" >Term 1</option>
                                    <option value="Term 2" >Term 2</option>
                                    <option value="Term 3" >Term 3</option>
                                </select>
                            </div><br>
                            <div align="left">
                                <input type="text" class="form-control" id = "Osidv1"  name="Osidv"  placeholder="STUDENT ID" required>
                            </div><br>
                            <?php
                                $sqlcls="SELECT * FROM classtbllet ";
                                $resultcls=$conn->query($sqlcls);
                            ?> 
                            <div align="left">
                                <select class="form-control" id = "Ocls1" name="Ocls" required>
                                <option value="0" selected>-Select Class-</option>
                                <?php
                                    while($recordcls = mysqli_fetch_array($resultcls)){  
                                        $clsid=$recordcls['cleid'];
                                        $clidgclz=$recordcls['clid'];
                                        $sqlmcl="SELECT * FROM classt where clid = $clidgclz ";
                                        $resultmcl=$conn->query($sqlmcl);
                                        while($recordmcl = mysqli_fetch_array($resultmcl)){
                                            $clter = $recordmcl['class'];
                                            $declter = base64_decode($clter);
                                        }
                                        $letternm=$recordcls['letter'];
                                        $deletternm = base64_decode($letternm);
                                        
                                ?>
                                    <option value="<?php echo $clsid; ?>" ><?php echo $declter." - ".$deletternm; ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div><br> 
                            <div align="left">
                                <input type="text" class="form-control" id = "Omark1"  name="Omark"  placeholder="ENTER MARKS" required>
                            </div><br>
                            <div align="right">
                                <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="SUBMIT">
                                <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Student Marks List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Marks</caption>
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Term</th>
                                            <th>Marks</th>
                                            <th>Grade</th>
                                            <?php
                                            if($prboid=="Normal"){
                                                ?>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>Student ID</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Term</th>
                                            <th>Marks</th>
                                            <th>Grade</th> -->
                                            <?php
                                            // if($prboid=="Normal"){
                                            ?>
                                            <!-- <th>EDIT</th>
                                            <th>DELETE</th> -->
                                            <?php
                                            // }
                                            ?>
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while($record3 = mysqli_fetch_array($result3)){
                                            $mks = $record3['mark'];
                                            $clst = $record3['class'];

                                            $sqlclp="SELECT * FROM classtbllet where cleid = $clst";
                                            $resultclp=$conn->query($sqlclp);
                                            while($recordclp = mysqli_fetch_array($resultclp)){
                                                $eccnp = $recordclp['clid'];
                                                $sqlocln="SELECT * FROM classt where clid = $eccnp";
                                                $resultocln=$conn->query($sqlocln);
                                                while($recordocln = mysqli_fetch_array($resultocln)){
                                                $boclnm = $recordocln['class'];
                                                $deboclnm = base64_decode($boclnm);
                                                }
                                                $envletter = $recordclp['letter'];
                                                $deenvletter = base64_decode($envletter);
                                            }

                                            $gdes = "";

                                            $entmid = $record3['tmid'];
                                            $ensidv = $record3['sidv'];


                                            $deentmid = base64_decode($entmid);
                                            $deensidv = base64_decode($ensidv);

                                            $csun = $record3['suID'];

                                            $sqlfri="SELECT * FROM subject where suID = $csun";
                                            $resultfri=$conn->query($sqlfri);
                                            while($recordfri = mysqli_fetch_array($resultfri)){


                                                $bca = $recordfri['caid'];
                                                $sbsdt = $recordfri['ssid'];
                                                $enname = $recordfri['name'];
                                                $deenname = base64_decode($enname);
                                                $sqlca="SELECT * FROM subcategory where caid = $bca";
                                                $resultca=$conn->query($sqlca);
                                                while($recordca = mysqli_fetch_array($resultca)){
                                                $scanm = $recordca['name'];
                                                $descanm = base64_decode($scanm);  
                                                }

                                                $sqlstr="SELECT * FROM substream where ssid = $sbsdt";
                                                $resultstr=$conn->query($sqlstr);
                                                while($recordstr = mysqli_fetch_array($resultstr)){
                                                $stranm = $recordstr['name'];
                                                $destranm = base64_decode($stranm);
                                                }
                                            }
                                        ?>
                                            <tr style="color:#000000;background-color:#ffffff;">
                                                <td><?php echo $deensidv; ?></td>
                                                <td><?php echo $deboclnm." - ".$deenvletter; ?></td>
                                                <td><?php echo $deenname." ( ".$destranm." - ".$descanm." )"; ?></td>
                                                <td><?php echo $deentmid; ?></td>
                                                <td><?php echo $record3['mark']; ?></td> 
                                                <!-- Grade Calculate Start -->
                                                <?php
                                                    if($mks>=75){
                                                        $gdes = "A";
                                                    }elseif($mks<75 && $mks>=65){
                                                        $gdes = "B";
                                                    }elseif($mks<65 && $mks>=55){
                                                        $gdes = "C";
                                                    }elseif($mks<55 && $mks>=35){
                                                        $gdes = "S";
                                                    }elseif($mks<35 && $mks>=0){
                                                        $gdes = "F";
                                                    }else{
                                                        $gdes = "ab";
                                                    }
                                                ?>
                                                <!-- Grade Calculate End -->
                                                <td><?php echo $gdes; ?></td>
                                                <?php
                                                    if($prboid=="Normal"){
                                                ?>
                                                        <td><a href="../../Action/marks/stuMarkUpdate.php?id=<?php echo $record3['mid']; ?>"><button class = "btn btn-primary">EDIT</button></a></td>
                                                        <td><a href="../../Action/marks/stuMarkDelete.php?id=<?php echo $record3['mid']; ?>"><button class = "btn btn-danger">DELETE</button></a></td>
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