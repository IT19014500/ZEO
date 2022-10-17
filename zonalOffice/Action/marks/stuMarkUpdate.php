<?php
    try{
        include('../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==6){
?>
<?php
    try{
        $id=$_GET['id'];
        $sqltq="SELECT * FROM marktbl where mid = $id ";
        $resulttq=$conn->query($sqltq);
    }catch(Exception $e) {
        echo "Marking List Loading Failed!";
    }
?>
<?php
    try{
        if(isset($_POST['submit'])){
            $Tscid=$_POST['Oscid'];
            $TsuID=$_POST['OsuID'];
            $Tclass=$_POST['Oclass'];
            $Ttmid=$_POST['Otmid'];
            $Tsidv=$_POST['Osidv'];
            $Tmark=$_POST['Omark'];

            $Ttmidvar = base64_encode($Ttmid);
            $Tsidvvar = base64_encode($Tsidv);

            $update="UPDATE marktbl SET scid='$Tscid',suID='$TsuID',class='$Tclass',tmid='$Ttmidvar',sidv='$Tsidvvar',mark='$Tmark' where mid=$id ";

            if($conn-> query($update)==TRUE){
    ?>
                <Script>
                    alert("Student marks Details Updated!");
                    location= '../../htmlPages/AdminPannel/addMarks.php';
                </Script>
    <?php
            exit();
            }
        }
    }catch(Exception $e) {
        echo "Update Failed!";
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
    <title>ZEO Marking Admin</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type=text/javascript src="../../htmlPages/bootstrap/js/schoolFetch.js"></script>
    <!-- ===== Animation CSS ===== -->
    <link href="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/css/colors/default.css" id="theme" rel="stylesheet">
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
            try{
                require_once '../../htmlPages/AdminPannel/menu/topNavigation/MarkAdmin/actionFolderMkTPN.php';
            }catch(Exception $e) {
                echo "Top Navigation Loading Failed!";
            }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            try{
                require_once '../../htmlPages/AdminPannel/menu/actionFolder/actionFolderMkMenu.php';
            }catch(Exception $e) {
                echo "Navigation Bar Loading Failed!";
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href = "../../htmlPages/AdminPannel/addMarks.php"><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update</em></strong></h1><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Modify Marks</h3><br>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                        <?php
                                            try{
                                                while($recordtq = mysqli_fetch_array($resulttq)){
                                                    $ensidv = $recordtq['sidv'];
                                                    $enmark = $recordtq['mark'];
                                                    $enscidprt = $recordtq['scid'];

                                                    $deensidv = base64_decode($ensidv);    
                                            ?>
                                            <?php
                                                $sqlmst="SELECT * FROM school WHERE scid = $enscidprt";
                                                $resultmst=$conn->query($sqlmst);
                                            ?>
                                            <div class="form-group">
                                                <label style="color:#000000;" for="Oscid" >School</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                    <select class="form-control" id = "Oscid1" name="Oscid" placeholder="Select School" required>
                                                        <?php
                                                            while($recordmst = mysqli_fetch_array($resultmst)){  
                                                                $enkklmnams = $recordmst['name'];
                                                                $deenkklmnams = base64_decode($enkklmnams); 
                                                        ?>
                                                        <option value="<?php echo $enscidprt; ?>" ><?php echo $deenkklmnams; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    $sse="";
                                                    $stro="";
                                                    $sqlslk="SELECT * FROM subject ";
                                                    $resultslk=$conn->query($sqlslk);
                                                ?>
                                                <label style="color:#000000;" for="OsuID" >Subject</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                    <select class="form-control" id = "OsuID1" name="OsuID" placeholder="Select Subject" required>
                                                        <?php
                                                            while($recordslk = mysqli_fetch_array($resultslk)){  
                                                                $sbi=$recordslk['suID'];
                                                                $sbvc=$recordtq['suID'];
                                                                $enslkname = $recordslk['name'];
                                                                $deenslkname = base64_decode($enslkname);

                                                                $fca = $recordslk['caid'];
                                                                $fssid = $recordslk['ssid'];

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

                                                                if($sbi==$sbvc){
                                                                    $sse='selected';
                                                                    $stro=$sbi;
                                                                }

                                                        ?>
                                                        <option value="<?php echo $sbi; ?>"  <?php if($stro==$sbi){echo $sse;}?>><?php echo $deenslkname." ( ".$decxna." - ".$destqna." )"; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    $tcki = $recordtq['tmid'];
                                                    $detcki = base64_decode($tcki);
                                                ?>
                                                <label style="color:#000000;" for="Otmid" >Term</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                    <select class="form-control" id = "Otmid1" name="Otmid" required>
                                                        <option value="Term 1" <?php if($detcki=="Term 1"){echo 'selected';}?>>Term 1</option>
                                                        <option value="Term 2" <?php if($detcki=="Term 2"){echo 'selected';}?>>Term 2</option>
                                                        <option value="Term 3" <?php if($detcki=="Term 3"){echo 'selected';}?>>Term 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label style="color:#000000;" for="Osidv">Student ID</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                    <input type="text" class="form-control" id = "Osidv1"  name="Osidv" value="<?php echo $deensidv; ?>" placeholder="ENTER STUDENT ID" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    $cgt="";
                                                    $cusl="";
                                                    $sqllsd="SELECT * FROM classtbllet ";
                                                    $resultlsd=$conn->query($sqllsd);
                                                ?>
                                                <label style="color:#000000;" for="OsuID" >Class</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                    <select class="form-control" id = "Oclass1" name="Oclass" placeholder="Select Class " required>
                                                        <?php
                                                            while($recordlsd = mysqli_fetch_array($resultlsd)){  
                                                                $clji=$recordlsd['cleid'];
                                                                $ofgj=$recordtq['class'];
                                                                $enslklett = $recordlsd['letter'];
                                                                $deenslklett = base64_decode($enslklett);
                                                                $sqlvmb="SELECT * FROM classt ";
                                                                $resultvmb=$conn->query($sqlvmb);
                                                                while($recordvmb = mysqli_fetch_array($resultvmb)){
                                                                    $enslkclass = $recordvmb['class'];
                                                                    $deenslkclass = base64_decode($enslkclass);
                                                                }
                                                                if($clji==$ofgj){
                                                                    $cgt='selected';
                                                                    $cusl=$clji;
                                                                }

                                                        ?>
                                                        <option value="<?php echo $clji; ?>"  <?php if($cusl==$clji){echo $cgt;}?>><?php echo $deenslkclass." - ".$deenslklett; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label style="color:#000000;" for="Omark">Marks</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                    <input type="text" class="form-control" id = "Omark1"  name="Omark" value="<?php echo $enmark; ?>" placeholder="ENTER NUMERICAL VALUE HERE" required>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            }catch(Exception $e) {
                                                echo "Form Loading Failed!";
                                            }
                                        ?>
                                        <input style="height:50px;" type="submit" id = "submit" name = "submit" class="btn btn-success waves-effect waves-light m-r-10" value="UPDATE">
                                        <input style="height:50px;" type="reset" class="btn btn-inverse waves-effect waves-light" id = "reset" value="RESET">
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
    <script src="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/custom.js"></script>
    <script src="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
    <script src="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
        }else{
            echo "Please Login!";
        }
    }catch(Exception $e) {
        echo "Connection Failed!";
    }
?>