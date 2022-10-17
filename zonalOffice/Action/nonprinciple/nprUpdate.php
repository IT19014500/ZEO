<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){

?>

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
  $id=$_GET['id'];
  $sqltq="SELECT * FROM nonprinciple where nprid = $id ";
  $resulttq=$conn->query($sqltq);
?> 

<?php
    if(isset($_POST['submit'])){

        $otid=$_GET['id'];
        $Tsgid=$_POST['Osgid'];
        $Tscwsdate=$_POST['Oscwsdate'];
        $Tmsubject=$_POST['Omsubject'];
        $Towgrade=$_POST['Oowgrade'];
        $Ttid=$_POST['Otid'];

        
        if($_SESSION['ref']==1){
            $update="UPDATE nonprinciple SET sgid='$Tsgid',scwsdate='$Tscwsdate',msubject='$Tmsubject',owgrade='$Towgrade',tid='$Ttid' where nprid='$otid' ";
        }elseif($_SESSION['ref']==5){
            $update="INSERT INTO nonprincipletemp(nprid,sgid,scwsdate,msubject,owgrade,tid)VALUES('$otid','$Tsgid','$Tscwsdate','$Tmsubject','$Towgrade','$Ttid') ";
        }

        if($conn-> query($update)==TRUE){
?>

<Script>
    <?php if($_SESSION['ref']==1){ ?>
    alert("Teacher Details Updated!");
    <?php }elseif($_SESSION['ref']==5){ ?>
    alert("Your Details will be Updated After Zonal Head Approval!");
    <?php 
        }    
    ?>
    location= '../../htmlPages/clientSide/nprList.php';
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
    <title>Row Admin</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
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
            require_once '../../htmlPages/AdminPannel/menu/topNavigation/actionFolderTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){

                require_once '../../htmlPages/AdminPannel/menu/actionFolder/teacherlistPrinActionMenu.php';

            }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){

                require_once '../../htmlPages/AdminPannel/menu/actionFolder/teacherlistActionMenu.php';
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href = '../../htmlPages/clientSide/nprList.php'><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update Service and Grade</em></strong></h1><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Modify</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"> comment </p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                        <?php
                                            while($recordtq = mysqli_fetch_array($resulttq)){
                                                $hlj = $recordtq['tid'];   
                                        ?>
                                        <div class="form-group">
                                            <?php
                                                $bbn="";
                                                $gros="";
                                                $sqlpos="SELECT * FROM serandgrade";
                                                $resultpos=$conn->query($sqlpos);
                                            ?>
                                            <label style="color:#000000;" for="Osgid">Teacher Grade</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Osgid1" name="Osgid" placeholder="SELECT GRADE ID" required>
                                                    <?php
                                                        while($recordpos = mysqli_fetch_array($resultpos)){  
                                                            $jjl=$recordpos['sgid'];
                                                            $jjhh=$recordtq['sgid'];
                                                            $enjjl = $recordpos['grade'];
                                                            $deenjjl = base64_decode($enjjl);


                                                            if($jjl==$jjhh){
                                                                $bbn='selected';
                                                                $gros=$jjl;
                                                            }
                                                    ?>
                                                        <option value="<?php echo $jjl; ?>"  <?php if($gros==$jjl){echo $bbn;}?>><?php echo $deenjjl; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Oscwsdate">Start Date According to Profession</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Oscwsdate1"  name="Oscwsdate" value="<?php echo $recordtq['scwsdate']; ?>" placeholder="START DATE ACCORDING TO PROFESSION" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                                $vlo="";
                                                $chw="";
                                                $sqlxzp="SELECT * FROM subject";
                                                $resultxzp=$conn->query($sqlxzp);
                                            ?>
                                            <label for="Omsubject">Subject</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Omsubject1" name="Omsubject" required>
                                                    <?php
                                                        while($recordxzp = mysqli_fetch_array($resultxzp)){  
                                                            $bmsdgid=$recordxzp['suID'];
                                                            $bmsdg=$recordtq['msubject'];
                                                            $ensjb=$recordxzp['name'];

                                                            $fca = $recordxzp['caid'];
                                                            $fssid = $recordxzp['ssid'];

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

                                                            $deensjb = base64_decode($ensjb);
                                                            if($bmsdgid==$bmsdg){
                                                                $vlo='selected';
                                                                $chw=$bmsdgid;
                                                            }
                                                    ?>
                                                    <option value="<?php echo $bmsdgid; ?>" <?php if($bmsdgid==$bmsdg){echo $vlo;}?>><?php echo $deensjb." (".$destqna." - ".$decxna." )"; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                                $ogc="";
                                                $ggd="";
                                                $sqlgr="SELECT * FROM classtbllet ";
                                                $resultgr=$conn->query($sqlgr);
                                            ?>
                                            <label for="Oowgrade">Allocated Class</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Oowgrade1" name="Oowgrade" placeholder="SELECT ALLOCATED CLASS" required>
                                                    <?php
                                                        while($recordgr = mysqli_fetch_array($resultgr)){  
                                                            $ogid=$recordgr['cleid'];
                                                            $ocld=$recordgr['clid'];
                                                            $sqlolc="SELECT * FROM classt where clid = $ocld ";
                                                            $resultolc=$conn->query($sqlolc);
                                                            while($recordolc = mysqli_fetch_array($resultolc)){  
                                                                $oclson=$recordolc['class'];
                                                                $deoclson = base64_decode($oclson);
                                                            }
                                                            $oglm=$recordtq['owgrade'];
                                                            $enoletter=$recordgr['letter'];
                                                            $deenoletter = base64_decode($enoletter);
                                                            if($ogid==$oglm){
                                                                $ogc='selected';
                                                                $ggd=$ogid;
                                                            }
                                                    ?>
                                                        <option value="<?php echo $ogid; ?>" <?php if($ogid==$oglm){echo $ogc;}?>><?php echo $deoclson." - ".$deenoletter; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                                $jjc="";
                                                $grood="";
                                                if($_SESSION['ref']==1){
                                                    $sqlmst="SELECT * FROM teacher WHERE scid = $vht AND tid NOT IN (SELECT tid FROM ofisign);";
                                                    $resultmst=$conn->query($sqlmst);
                                                }elseif($_SESSION['ref']==5){
                                                    $sqlmst="SELECT * FROM teacher WHERE tid = $hlj ";
                                                    $resultmst=$conn->query($sqlmst);
                                                    while($recordmst = mysqli_fetch_array($resultmst)){
                                                        $hljnna = $recordmst['nic'];
                                                        $dehljnna = base64_decode($hljnna);
                                                    }
                                                }
                                            ?>
                                            <label for="Otid">Teacher NIC</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Otid1" name="Otid" required>
                                                    <?php
                                                        if($_SESSION['ref']==1){
                                                            while($recordmst = mysqli_fetch_array($resultmst)){  
                                                                $msta=$recordmst['tid'];
                                                                $kklm=$recordtq['tid'];
                                                                $enmstane=$recordmst['nic'];
                                                                $deenmstane = base64_decode($enmstane);
                                                                if($msta==$kklm){
                                                                    $jjc='selected';
                                                                    $grood=$msta;
                                                                }
                                                    ?>
                                                    <option value="<?php echo $msta; ?>" <?php if($grood==$msta){echo $jjc;}?>><?php echo $deenmstane; ?></option>
                                                        <?php
                                                                }
                                                            }elseif($_SESSION['ref']==5){
                                                        ?>
                                                    <option value="<?php echo $hlj; ?>" selected><?php echo $dehljnna; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
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
    <script src="../../htmlPages/AdminPannel/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

    <!--Style Switcher -->
    <script src="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
}else{
  echo "Please Login!";
}
?>