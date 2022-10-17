<?php
    try{
        include('../../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2 || $_SESSION['ref']==7){
?>
<?php
    try{
        $adbcv = "No";
        $enscck =0;
        $deennamem = "";
        $deennicm = "";
        $deensnvm = "";
        $rth=$_SESSION['uname'];
        $derth=base64_encode($rth);
?>
<!-- 6 month start -->
    <?php
        $date1=date('Y-m-d');
        $date=date_create($date1);

        $ghti=180;
        $sqlbyta="SELECT * FROM certifyreq";
        $resultbyta=$conn->query($sqlbyta);

        while($recordbyta = mysqli_fetch_array($resultbyta)){

        $bytaid = $recordbyta['tid'];
        $bytanicr = $recordbyta['sdate'];

        $bytanicr2=date_create($bytanicr);

        $astri=date_diff($date,$bytanicr2);

        // Add deleting date here
        if($astri->format("%a") >= $ghti){

            $deletebyd="delete from certifyreq where tid= $bytaid";
            $resultbyd=$conn->query($deletebyd);
            
            }
            
        }
        // 6 month end
        $prboid = "Normal";
        if(isset($_GET['prbuid'])){
            $prboid = $_GET['prbuid'];
        }
    ?>

    <?php
        if(isset($_POST['submit'])){
            $coidrq = $_POST['coid'];
            $cdatepr = $_POST['cdate'];
            if($adbcv == "No"){
            $addcorq="INSERT INTO certifyreqck(tid,sdate)VALUES('$coidrq','$cdatepr')";
            }elseif($adbcv == "Yes"){
    ?>
                <Script>
                    alert("Already Approved!");
                    location='certifiAccessList.php';
                </Script>    
    <?php
            }
            if($conn-> query($addcorq)==TRUE){
    ?>
                <Script>
                    alert("Certificate Request Approved!");
                    location='certifiAccessList.php';
                </Script>
<?php
            exit();
            }
        }
    }catch(Exception $e) {
        echo "Data Reading Failed!";
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
    <title>Certificate Admin</title>
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
                require_once '../menu/topNavigation/CertifiOfficer/certifiTPN.php';
            }catch(Exception $e) {
                echo "Top Navigation Loading Failed!";
            }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        
        <!-- ===== Left-Sidebar ===== -->
        <?php
            try{
                require_once '../menu/CertifiOfficer/certifiListMenu.php';
            }catch(Exception $e) {
                echo "Navigation Bar Loading Failed!";
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Certificate Requests</em></strong></h1><br>
                <div class="row">
                    <div class="col-md-12">
                            <div style="background-color:#d6ddff;" class="white-box">
                            <h3 class="box-title m-b-0">Important</h3><br>
                                <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <ul style="color:#000000;">
                                            <li>You are Eligible to provide a service certificate for each teacher per 6 month.</li>
                                            <li>These Data will be deleted automatically in a every 6 month.</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                                <div style="background-color:#d6ddff;" class="white-box">
                                <h3 class="box-title m-b-0">Manage Certificates</h3><br>
                                <div class="table-responsive">
                                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                            <caption style="color:#000000;">Requestees</caption>
                                            <thead>
                                                <tr>
                                                    <th>NAME</th>
                                                    <th>NIC</th>
                                                    <th>SCHOOL</th>
                                                    <th>DATE</th>
                                                    <?php
                                                        try{
                                                            if($prboid=="Normal"){
                                                    ?>
                                                                <th>ACTION</th>
                                                    <?php
                                                            }
                                                        }catch(Exception $e) {
                                                            echo "Action Coloumn Loading Failed!";
                                                        }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <!-- <th>NAME</th>
                                                    <th>NIC</th>
                                                    <th>SCHOOL</th>
                                                    <th>DATE</th> -->
                                                    <!-- <th>ACTION</th> -->
                                                    
                                                </tr> 
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    try{
                                                        $sqltd="SELECT * FROM certifyreq";
                                                        $resulttd=$conn->query($sqltd);
                                                    }catch(Exception $e) {
                                                        echo "Certificate Req. List Reading Failed!";
                                                    }
                                                ?>
                                                <?php
                                                    try{
                                                        while($recordtd = mysqli_fetch_array($resulttd)){
                                                        $traci = $recordtd['tid'];
                                                        $enscck = 0;
                                                        $wslb = "No";
                                                        $adbcv = "No";

                                                        $sqlcfth="SELECT * FROM teacher WHERE tid = $traci";
                                                        $resultcfth=$conn->query($sqlcfth);
                                                        while($recordcfth = mysqli_fetch_array($resultcfth)){
                                                            $tracfth = $recordcfth['scid'];
                                                        }
                                                        $sqlcrt="SELECT * FROM teacher WHERE tid = $traci AND scid = $tracfth AND scid IN (SELECT scid from coftbl WHERE uname = '$derth');";
                                                        $resultcrt=$conn->query($sqlcrt);
                                                        while($recordcrt = mysqli_fetch_array($resultcrt)){
                                                            $ennamem = $recordcrt['fullname'];
                                                            $ennicm = $recordcrt['nic'];
                                                            $enscck = $recordcrt['scid'];

                                                            $sqlvst="SELECT * FROM school WHERE scid = $enscck";
                                                            $resultvst=$conn->query($sqlvst);
                                                            while($recordvst = mysqli_fetch_array($resultvst)){
                                                                $ensnvm = $recordvst['name'];
                                                                $deensnvm = base64_decode($ensnvm);
                                                            }
                    
                                                            $deennamem = base64_decode($ennamem);
                                                            $deennicm = base64_decode($ennicm);
                                                            $wslb = "Yes";
                                                        }
                                                        // check this
                                                        $trajuki = 0;
                                                        $sdateprt = "";
                
                                                        $sqlabdc="SELECT * FROM certifyreqck WHERE tid = $traci";
                                                        $resultabdc=$conn->query($sqlabdc);
                                                        while($recordabdc = mysqli_fetch_array($resultabdc)){
                                                            $trajuki = $recordabdc['tid'];
                                                            $sdateprt = $recordabdc['sdate'];
                                                        }
                                                        // AND scid = $enscck
                                                        $adbcv = "No";
                                                        $sqljuf="SELECT * FROM teacher WHERE tid = $trajuki AND scid IN (SELECT scid from coftbl WHERE uname = '$derth');";
                                                        $resultjuf=$conn->query($sqljuf);
                                                        while($recordjuf = mysqli_fetch_array($resultjuf)){
                                                            $adbcv = "Yes";
                                                        }                
                                                ?>
                                                    <tr style="color:#000000;background-color:#ffffff;">
                                                        <td><?php echo $deennamem; ?></td>
                                                        <td><?php echo $deennicm; ?></td>
                                                        <td><?php echo $deensnvm; ?></td>
                                                        <td>
                                                            <?php
                                                                if($prboid=="Normal"){
                                                                
                                                                    if($adbcv == "No" && $wslb == "Yes"){
                                                            ?>
                            
                                                                        <form action="" method="post">
                                                                            <input type="text" id="cdate1" name="cdate" placeholder="Enter Service Date Here" required>
                                                                            <input type="hidden" id="coid1" name="coid" value="<?php echo $traci; ?>" required>
                                                            <?php
                                                                    }elseif($adbcv == "Yes" && $wslb == "Yes"){
                                                                        echo $sdateprt;
                                                                    }
                                                            ?>
                                                        </td>
                                                        <td> 
                                                        <?php
                                                                    if($adbcv == "No" && $wslb == "Yes"){
                                                        ?>
                                                                            <input type="submit" id = "submit" name = "submit" style="background-color:dodgerblue;border:none;border-radius:18px;width:80px;height:30px;color:#ffffff;" value="Approve">
                                                                        </form>
                                                        <?php
                                                                    }
                                                        ?>
                                                        <?php
                                                            if($enscck != 0 && $deennamem != "" && $deennicm != "" && $deensnvm != ""){
                                                        ?>
                                                        <?php
                                                            $rmbtnck = "No";
                                                            $sqlrmbt="SELECT * FROM certifyreqadck WHERE tid = $traci";
                                                            $resultrmbt=$conn->query($sqlrmbt);
                                                            while($recordrmbt = mysqli_fetch_array($resultrmbt)){
                                                            $rmbtnck = "Yes";
                                                            }
                                                        ?>
                                                        <?php
                                                            if($rmbtnck == "No"){
                                                        ?>
                                                                <a href="../../../Action/certificate/cralDelete.php?id=<?php echo $traci; ?>"><button style="background-color:#B11E1E;border:none;border-radius:18px;width:80px;height:30px;color:#ffffff;">Remove</button></a>
                                                        <?php
                                                            }elseif($rmbtnck == "Yes"){
                                                        ?>
                                                                <label for="" style="color:#a8254f;">Admin Approved</label>
                                                        <?php
                                                                }
                                                            }
                                                        ?>
                                                        </td>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tr>
                                                <?php
                                                        }
                                                    }catch(Exception $e) {
                                                        echo "Data Reading Failed!";
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
    </script>
    <!--Style Switcher -->
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
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