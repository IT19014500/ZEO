<?php
    try{
        include('../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>
<?php
    try{
        $rth = $_SESSION['uname'];
        $derth = base64_encode($rth);
        $sqlli="SELECT * FROM principle WHERE email = '$derth'";
        $resultli=$conn->query($sqlli);
        while($recordli = mysqli_fetch_array($resultli)){
            $bjh = $recordli['tid'];
            $sqlnu="SELECT * FROM teacher WHERE tid = $bjh";
            $resultnu=$conn->query($sqlnu);
            while($recordnu = mysqli_fetch_array($resultnu)){
                $vht = $recordnu['scid'];
            }
        }
    }catch(Exception $e) {
        echo "Authentication Failed!";
    }
?>
<?php
    try{
        $id=$_GET['id'];
        $sqltq="SELECT * FROM exmduty where id = $id ";
        $resulttq=$conn->query($sqltq);
    }catch(Exception $e) {
        echo "Exam Duty Loading Failed!";
    }
?> 

<?php
    try{
        if(isset($_POST['submit'])){
            $Tedyear=$_POST['Oedyear'];
            $Texname=$_POST['Oexname'];
            $Tprofession=$_POST['Oprofession'];
            $Texcenter=$_POST['Oexcenter'];
            $Ttid=$_POST['Otid'];

            $Tedyearvar = base64_encode($Tedyear);
            $Texnamevar = base64_encode($Texname);
            $Tprofessionvar = base64_encode($Tprofession);
            $Texcentervar = base64_encode($Texcenter);

            if($_SESSION['ref']==1){
                $update="UPDATE exmduty SET edyear='$Tedyearvar',exname='$Texnamevar',profession='$Tprofessionvar',excenter='$Texcentervar',tid='$Ttid' where id=$id ";
            }elseif($_SESSION['ref']==5){
                $update="INSERT INTO exmdutytmp(id,edyear,exname,profession,excenter,tid)VALUES('$id','$Tedyearvar','$Texnamevar','$Tprofessionvar','$Texcentervar','$Ttid') ";
            }
            if($conn-> query($update)==TRUE){
?>
                <Script>
                    <?php
                        if($_SESSION['ref']==1){
                    ?>
                            alert("Exam Duty Details Updated!");
                    <?php
                        }elseif($_SESSION['ref']==5){
                    ?>
                            alert("Exam Duty Details will be Updated After Zonal Head Approval!");
                    <?php
                        }
                    ?>
                            location= '../../htmlPages/clientSide/exDutyExplist.php';
                </Script>
<?php
            exit();
            }
        }
    }catch(Exception $e) {
        echo "Insert Failed!";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type=text/javascript src="../../htmlPages/bootstrap/js/schoolFetch.js"></script>
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
            try{
                require_once '../../htmlPages/AdminPannel/menu/topNavigation/actionFolderTPN.php';
            }catch(Exception $e) {
                echo "Top Navigation Loading Failed!";
            }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            try{
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){
                    require_once '../../htmlPages/AdminPannel/menu/actionFolder/teacherlistPrinActionMenu.php';
                }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){
                    require_once '../../htmlPages/AdminPannel/menu/actionFolder/teacherlistActionMenu.php';
                }
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
                    <a href = '../../htmlPages/clientSide/exDutyExplist.php'><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update Exam Duty Details</em></strong></h1><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Modify</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"> comment </p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                        <?php
                                        try{
                                            while($recordtq = mysqli_fetch_array($resulttq)){
                                                $hlj = $recordtq['tid'];
                                                $enedyear = $recordtq['edyear'];
                                                $enexname = $recordtq['exname'];
                                                $enprofession = $recordtq['profession'];
                                                $enexcenter = $recordtq['excenter'];

                                                $deenedyear = base64_decode($enedyear);          
                                                $deenexname = base64_decode($enexname);
                                                $deenprofession = base64_decode($enprofession);
                                                $deenexcenter = base64_decode($enexcenter);
                                        ?>
                                                <div class="form-group">
                                                    <label style="color:#000000;" for="Oedyear">Exam Duty Year</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                        <input type="text" class="form-control" id = "Oedyear1"  name="Oedyear" value="<?php echo $deenedyear; ?>" placeholder="ENTER EXAM DUTY YEAR" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label style="color:#000000;" for="Oexname">Exam Name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                        <input type="text" class="form-control" id = "Oexname1"  name="Oexname" value="<?php echo $deenexname; ?>" placeholder="ENTER EXAM NAME" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label style="color:#000000;" for="Oprofession">Requested Proffession</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                        <input type="text" class="form-control" id = "Oprofession1"  name="Oprofession" value="<?php echo $deenprofession; ?>" placeholder="ENTER REQUESTED PROFESSION" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label style="color:#000000;" for="Oexcenter">Exam Center</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                        <input type="text" class="form-control" id = "Oexcenter1"  name="Oexcenter" value="<?php echo $deenexcenter; ?>" placeholder="ENTER EXAM CENTER" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <?php
                                                        $jam="";
                                                        $jac="";
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
                                                <label style="color:#000000;" for="Otid">Teacher NIC</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                        <select class="form-control" id = "Otid1" name="Otid" required>
                                                            <?php
                                                            if($_SESSION['ref']==1){
                                                                while($recordmst = mysqli_fetch_array($resultmst)){  
                                                                    $ttid=$recordmst['tid'];
                                                                    $tchc=$recordtq['tid'];
                                                                    $enttidna=$recordmst['nic'];
                                                                    $deenttidna = base64_decode($enttidna);
                                                                    if($tchc==$ttid){
                                                                        $jac='selected';
                                                                        $jam=$ttid;
                                                                    }
                                                            ?>
                                                                    <option value="<?php echo $ttid; ?>" <?php if($jam==$ttid){echo $jac;} ?>><?php echo $deenttidna; ?></option>
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
                                            }catch(Exception $e) {
                                                echo "Form Loading Failed!";
                                            }
                                        ?>
                                        <div style="float:right;">
                                            <input style="height:50px;" type="submit" id = "submit" name = "submit" class="btn btn-success waves-effect waves-light m-r-10" value="UPDATE">
                                            <input style="height:50px;" type="reset" class="btn btn-inverse waves-effect waves-light" id = "reset" value="RESET">
                                        </div>
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
    }catch(Exception $e) {
        echo "Connection Failed!";
    }
?>