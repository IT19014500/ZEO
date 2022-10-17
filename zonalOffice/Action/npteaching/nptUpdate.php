<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){

?>

<?php

  $id=$_GET['id'];
  $sqltq="SELECT * FROM nptteach where nptid = $id ";
  $resulttq=$conn->query($sqltq);
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
    if(isset($_POST['submit'])){

        $otid=$_GET['id'];
        $TsuID=$_POST['OsuID'];
        $Towgrade=$_POST['Oowgrade'];
        $Tperiod=$_POST['Operiod'];
        $Ttid=$_POST['Otid'];

        if($_SESSION['ref']==1){
            $update="UPDATE nptteach SET suID='$TsuID',owgrade='$Towgrade',period='$Tperiod',tid='$Ttid' where nptid='$otid' ";
        }elseif($_SESSION['ref']==5){
            $update="INSERT INTO nptteachtemp(suID,owgrade,period,tid,nptid)VALUES('$TsuID','$Towgrade','$Tperiod','$Ttid','$otid') ";
        }

        if($conn-> query($update)==TRUE){
?>

<Script>
    <?php if($_SESSION['ref']==1){ ?>
        alert("Non Principle Teaching Details Updated!");
    <?php }elseif($_SESSION['ref']==5){ ?>
        alert("Your Details will be Updated after Zonal Head Approval!");
    <?php } ?>
    location= '../../htmlPages/clientSide/abtechingListcp.php';
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
                    <a href = '../../htmlPages/clientSide/abtechingListcp.php'><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update Teaching Details</em></strong></h1><br>
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
                                                $sqlpos="SELECT * FROM subject";
                                                $resultpos=$conn->query($sqlpos);
                                            ?> 
                                            <label style="color:#000000;" for="OsuID">Subject</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "OsuID1" name="OsuID" required>
                                                    <?php
                                                        while($recordpos = mysqli_fetch_array($resultpos)){
                                                            $cajl=$recordpos['caid'];
                                                            $sskl=$recordpos['ssid'];
                                                            $sqlcas="SELECT * FROM subcategory where caid = $cajl ";
                                                            $resultcas=$conn->query($sqlcas);
                                                            while($recordcas = mysqli_fetch_array($resultcas)){
                                                                $canm=$recordcas['name'];
                                                                $decanm = base64_decode($canm);
                                                            }

                                                            $sqlstf="SELECT * FROM substream where ssid = $sskl ";
                                                            $resultstf=$conn->query($sqlstf);
                                                            while($recordstf = mysqli_fetch_array($resultstf)){
                                                                $stynm=$recordstf['name'];
                                                                $destynm = base64_decode($stynm);
                                                            }

                                                            $jjl=$recordpos['suID'];
                                                            $jjhh=$recordtq['suID'];
                                                            $enjjlna=$recordpos['name'];
                                                            $deenjjlna = base64_decode($enjjlna);

                                                            if($jjl==$jjhh){
                                                                $bbn='selected';
                                                                $gros=$jjl;
                                                            }

                                                    ?>
                                                        <option value="<?php echo $jjl; ?>"  <?php if($gros==$jjl){echo $bbn;}?>><?php echo $deenjjlna." ( ".$destynm." - ".$decanm." )"; ?></option>
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
                                            <label style="color:#000000;" for="Oowgrade">Class</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Oowgrade1" name="Oowgrade" required>
                                                    <?php
                                                        while($recordgr = mysqli_fetch_array($resultgr)){  
                                                            $ogid=$recordgr['cleid'];
                                                            $oclnkd=$recordgr['clid'];
                                                            $sqlolc="SELECT * FROM classt where clid = $oclnkd ";
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
                                            <label style="color:#000000;" for="Operiod">Class Period Count</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Operiod1"  name="Operiod" value="<?php echo $recordtq['period']; ?>" placeholder="ENTER CLASS PERIODS" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                                $jjc="";
                                                $grood="";
                                                if($_SESSION['ref']==1){
                                                    $sqlmst="SELECT * FROM teacher WHERE scid = $vht && tid NOT IN (SELECT tid FROM ofisign);";
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
                                            <label style="color:#000000;" for="Otid">TEACHER NIC</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Otid1" name="Otid" placeholder="ENTER TEACHER ID" required>
                                                    <?php
                                                    if($_SESSION['ref']==1){
                                                        while($recordmst = mysqli_fetch_array($resultmst)){  
                                                            $msta=$recordmst['tid'];
                                                            $kklm=$recordtq['tid'];
                                                            $enmstah=$recordmst['nic'];
                                                            $deenmstah = base64_decode($enmstah);
                                                            if($msta==$kklm){
                                                                $jjc='selected';
                                                                $grood=$msta;
                                                            }
                                                    ?>
                                                        <option value="<?php echo $msta; ?>" <?php if($grood==$msta){echo $jjc;}?>><?php echo $deenmstah; ?></option>
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