<?php
    try{
        include('../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5 ){
?>
<?php
    try{
        if($_SESSION['ref']==1){
            $rth = $_SESSION['uname'];
            $derth = base64_encode($rth);

            $sqlli="SELECT * FROM school WHERE census = '$derth'";
            $resultli=$conn->query($sqlli);
            while($recordli = mysqli_fetch_array($resultli)){
                $vht = $recordli['scid'];
                $vhtnprt = $recordli['name'];
                $devhtnprt = base64_decode($vhtnprt);
            }
        }elseif($_SESSION['ref']==5){
            $rth = $_SESSION['uname'];
            $derth = base64_encode($rth);

            $sqlnu="SELECT * FROM teacher WHERE nic = '$derth' ";
            $resultnu=$conn->query($sqlnu);
            while($recordnu = mysqli_fetch_array($resultnu)){
                $fhg = $recordnu['tid'];
                $fhgnic = $recordnu['nic'];
                $defhgnic = base64_decode($fhgnic);     
            }
        }
    }catch(Exception $e) {
        echo "Data reading Fail!";
    }
?>

<?php
    try{
        if(isset($_POST['submit'])){

            $Teser=$_POST['Oeser'];
            // $Tproid=$_POST['Oproid'];
            // $Tzid=$_POST['Ozid'];
            $Tsdate=$_POST['Osdate'];
            $Tendate=$_POST['Oendate'];
            $Ttid=$_POST['Otid'];

            $add="INSERT INTO erservice(school,sdate,endate,tid)VALUES('$Teser','$Tsdate','$Tendate','$Ttid')";

            if($conn-> query($add)==TRUE){
?>
            <Script>
                alert("Early Service Details Added!");
                location='earlyServicecs.php';
            </Script>
<?php
            exit();
            }
        }
    }catch(Exception $e) {
        echo "Early service insert Fail!";
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
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../AdminPannel/cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- ===== Animation CSS ===== -->
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- school fetch -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type=text/javascript src="../bootstrap/js/schoolFetch.js"></script>
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
                require_once '../AdminPannel/menu/topNavigation/Teacher/TeacherlistPrinTPN.php';
            }catch(Exception $e) {
                echo "Top Navigation Loading Fail!";
            }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
        try{
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){

                require_once '../AdminPannel/menu/Principal/teacherlistPrinMenu.php';

            }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){

                require_once '../AdminPannel/menu/Teacher/teacherlistMenu.php';

            }
        }catch(Exception $e) {
            echo "Navigation bar loading Fail!";
        }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                    <div class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="earlysvcsList.php"><button style="width:150px;" class="btn btn-block btn-primary">View Services</button></a>
                    </div>
                    <div style="float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="extraActivity.php"><button class="btn btn-block ">Step 8</button></a>
                    </div>
                    <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Early Service Details</em></strong></h1><br>
                <div class="row">
                    <div class="col-md-6">
                        <div style="background-color:#d6ddff;" class="white-box">
                        <h3 class="box-title m-b-0">Early Service Details Form</h3><br>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                        <?php
                                            try{
                                                $sqlersc="SELECT * FROM school where scid != 110";
                                                $resultersc=$conn->query($sqlersc);
                                                echo "<div style='width:445px;'>";
                                                echo "<select id='Oeser1' name='Oeser' class='form-control'>";
                                                echo "<option vaue='0' selected>-- Select Early School --</option>";
                                                while($recordersc = mysqli_fetch_array($resultersc)){  
                                                    $ersi=$recordersc['scid'];
                                                    $ersinam=$recordersc['name'];
                                                    $deersinam = base64_decode($ersinam);
                                                    $ersidistcode=$recordersc['distcode'];
                                                    $deersidistcode = base64_decode($ersidistcode);
                                                    $ersizonecode=$recordersc['zonecode'];
                                                    $deersizonecode = base64_decode($ersizonecode);
                                                    $ersidivcode=$recordersc['divcode'];
                                                    $deersidivcode = base64_decode($ersidivcode);
                                                    echo "<option value='$ersi'>$deersinam ($deersidistcode - $deersizonecode($deersidivcode))</option>";
                                                }
                                                echo "</select>";
                                                echo "</div><br>";
                                            }catch(Exception $e) {
                                                echo "School list loading Fail!";
                                            }
                                        ?>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
                                            <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />
                                            <script>
                                                $("#Oeser1").chosen();
                                            </script>
                                        <br>
                                            <input type="text" class="form-control" id = "Osdate1"  name="Osdate" placeholder="ENTER START DATE(yyyy/mm/dd)" required>
                                        <br>
                                            <input type="text" class="form-control" id = "Oendate1"  name="Oendate" placeholder="ENTER END DATE(yyyy/mm/dd)" required>
                                        <br>
                                        <?php
                                            try{
                                                if($_SESSION['ref']==1){
                                                    $sqlmst="SELECT * FROM teacher WHERE scid = $vht && tid NOT IN (SELECT tid FROM ofisign);";
                                                }elseif($_SESSION['ref']==5){
                                                    $sqlmst="SELECT * FROM teacher WHERE tid = $fhg && tid NOT IN (SELECT tid FROM ofisign);";
                                                }
                                                    $resultmst=$conn->query($sqlmst);
                                            }catch(Exception $e) {
                                                echo "Teacher list reading fail!";
                                            }
                                        ?>
                                            <select class="form-control" id = "Otid1" name="Otid" placeholder="ENTER TEACHER ID" required>
                                            <?php
                                                try{
                                                    if($_SESSION['ref']==1){ 
                                            ?>
                                                        <option value="0" selected>-Select NIC-</option>
                                            <?php
                                                        while($recordmst = mysqli_fetch_array($resultmst)){  
                                                            $ttid=$recordmst['tid'];
                                                            $ttnam=$recordmst['nic'];
                                                            $dettnam = base64_decode($ttnam);
                                            ?>
                                                            <option value="<?php echo $ttid; ?>" ><?php echo $dettnam; ?></option>
                                                <?php
                                                        }
                                                        
                                                    }elseif($_SESSION['ref']==5){
                                                ?>
                                                        <option value="<?php echo $fhg; ?>" selected><?php echo $defhgnic; ?></option>
                                            <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Teacher list loading fail!";
                                                }
                                            ?>
                                            </select>
                                        <br>
                                        <div style="float:right;">
                                            <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="SUBMIT">
                                            <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
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
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/js/custom.js"></script>
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="../AdminPannel/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="../AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
        }else{
        echo "Please Login!";
        }
    }catch(Exception $e) {
        echo "Connection Fail!";
    }
?>