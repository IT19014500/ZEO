<?php
    try{
        include('../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){
?>
<?php
    try{
        $rth = $_SESSION['uname'];
        $derth = base64_encode($rth);

        $sqlli="SELECT * FROM school WHERE census = '$derth'";
        $resultli=$conn->query($sqlli);
        while($recordli = mysqli_fetch_array($resultli)){
            $vht = $recordli['scid'];
        }
    }catch(Exception $e) {
        echo "Schools Reading Fail!";
    }
?>
<?php
    try{
        $reiduc = 5;
        $sql3="SELECT * FROM teacher where scid= $vht";
        $result3=$conn->query($sql3);
    }catch(Exception $e) {
        echo "Teacher List Reading Fail!";
    }
?>


<?php
    try{
        if(isset($_POST['submit'])){
            $TfullName=$_POST['OfullName'];
            $TaddressT=$_POST['OaddressT'];
            $Tnic=$_POST['Onic'];
            $Tonic=$_POST['Onic'];
            $Tnic=strtoupper($Tonic);
            $Tdob=$_POST['Odob'];
            $Ttp=$_POST['Otp'];
            $Twtp=$_POST['Owtp'];
            $Tsex=$_POST['Osex'];
            $Tmstatus=$_POST['Omstatus'];
            $TfbName=$_POST['OfbName'];
            $TeMail=$_POST['OeMail'];
            $Tsalschool=$_POST['Osalschool'];
            $placement=$_POST['Oplacement'];
            $Tscid=$vht;
            
            $Tpllang=$_POST['Opllang'];
            $Tpldate=$_POST['Opldate'];
            $TsuID=$_POST['OsuID'];
            $Tprofession=$_POST['Oprofession'];

            $TfullNamevar = base64_encode($TfullName);
            $TaddressTvar = base64_encode($TaddressT);
            $Tnicvar = base64_encode($Tnic);
            $Tnicmd = md5($Tnic);

            $Ttpvar = base64_encode($Ttp);
            $Twtpvar = base64_encode($Twtp);
            $Tsexvar = base64_encode($Tsex);
            
            $TfbNamevar = base64_encode($TfbName);
            $TeMailvar = base64_encode($TeMail);
            $Tsalschoolvar = base64_encode($Tsalschool);

            $cknst = "No";
            $sqltco="SELECT * FROM teacher where nic= '$Tnicvar'";
            $resulttco=$conn->query($sqltco);
            while($recordtco = mysqli_fetch_array($resulttco)){
                $cknst = "Yes";
            }

            if($cknst == "No"){
                $add="INSERT INTO teacher(fullname,addressT,nic,dob,tp,wtp,sex,mstatus,fbName,eMail,salschool,placement,scid,pllang,pldate,suID,cpro)VALUES('$TfullNamevar','$TaddressTvar','$Tnicvar','$Tdob','$Ttpvar','$Twtpvar','$Tsexvar','$Tmstatus','$TfbNamevar','$TeMailvar','$Tsalschoolvar','$placement','$Tscid','$Tpllang','$Tpldate','$TsuID','$Tprofession')";
                $addusrby="INSERT INTO users(email,uname,pwd,reid)VALUES('$Tnicvar','$Tnicvar','$Tnicmd','$reiduc')";
                $conn-> query($addusrby);
            }elseif($cknst == "Yes"){
            ?>
                <Script>
                    alert("Already added!");
                    location='qualificationCustomer.php';
                </Script>   
            <?php
            }
            if($conn-> query($add)==TRUE){
?>
                <Script>
                    alert("Teacher Details Added!");
                    location='qualificationCustomer.php';
                </Script>
<?php
            exit();
            }
        }
    }catch(Exception $e) {
        echo "Registration Fail!";
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
                require_once '../AdminPannel/menu/Principal/teacherlistPrinMenu.php';
            }catch(Exception $e) {
                echo "Navigation Bar Loading Fail!";
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                    <div class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="teacherlist.php"><button class="btn btn-block btn-primary">Teacher List</button></a>
                    </div>
                    <div style="float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="ser&grade.php"><button class="btn btn-block ">Step 2</button></a>
                    </div>
                    <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Teacher Details</em></strong></h1> <br><br>
                <div class="row">
                    <div class="col-md-6">
                        <div style="background-color:#d6ddff;" class="white-box">
                        <h3 class="box-title m-b-0">Registration Form</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"></p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                        <input type="text" class="form-control" id = "OfullName1"  name="OfullName" placeholder="NAME WITH INITIALS" required>
                                        <br>
                                        <input type="text" class="form-control" id = "OaddressT1"  name="OaddressT" placeholder="ENTER ADDRESS" required>
                                        <br>
                                        <input type="text" style="text-transform: uppercase;"  class="form-control" id = "Onic1"  name="Onic" placeholder="ENTER NIC" required>
                                        <br>
                                        <input type="text" class="form-control" id = "Odob1" name="Odob" placeholder="DATE OF BIRTH" required>
                                        <br>
                                        <input type="text" class="form-control" id = "Otp1" name="Otp" placeholder="TELEPHONE NUMBER" >
                                        <br>
                                        <input type="text" class="form-control" id = "Owtp1" name="Owtp" placeholder="WHATSAPP NUMBER" >
                                        <br>
                                        <select class="form-control" id = "Osex1" name="Osex" placeholder="ENTER SEX" required>
                                            <option value="Not Selected" selected>-Select Gender-</option>
                                            <option value="Male" >Male</option>
                                            <option value="Female" >Female</option>
                                            <option value="Other" >Other</option>
                                        </select>
                                        <br>   
                                        <?php
                                        try{
                                            $sqlmst="SELECT * FROM mstatus ";
                                            $resultmst=$conn->query($sqlmst);
                                        }catch(Exception $e) {
                                            echo "Marital status Reading Fail!";
                                        }
                                        ?>
                                        <select class="form-control" id = "Omstatus1" name="Omstatus" placeholder="ENTER MARITAL STATUS" required>
                                            <option value="0" selected>-Select Marital Status-</option>
                                            <?php
                                                try{
                                                    while($recordmst = mysqli_fetch_array($resultmst)){  
                                                        $msta=$recordmst['mrid'];
                                                        $mstanam=$recordmst['status'];
                                                        $demstanam = base64_decode($mstanam);
                                            ?>
                                                        <option value="<?php echo $msta; ?>" ><?php echo $demstanam; ?></option>
                                            <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Marital Status Loading Fail!";
                                                }
                                            ?>
                                        </select>
                                        <br>            
                                        <input type="text" class="form-control" id = "OfbName1" name="OfbName" placeholder="FACEBOOK NAME" >
                                        <br>
                                        <input type="text" class="form-control" id = "OeMail1" name="OeMail" placeholder="ENTER E-MAIL ADDRESS" >
                                        <br>
                                        <input type="text" class="form-control" id = "Osalschool1" name="Osalschool" placeholder="ENTER SALARY EARNING SCHOOL (IF ATTACHMENT)" >
                                        <br>
                                        <?php
                                        try{
                                            $sqlbn="SELECT * FROM plcategory ";
                                            $resultbn=$conn->query($sqlbn);
                                        }catch(Exception $e) {
                                            echo "Placement category Reading Fail!";
                                        }
                                        ?> 
                                        <select class="form-control" id = "Oplacement1" name="Oplacement" placeholder="ENTER PLACEMENT CATEGORY" required>
                                            <option value="Placement" selected>-Appointment Category-</option>
                                            <?php
                                            try{
                                                while($recordbn = mysqli_fetch_array($resultbn)){  
                                                    $pcc=$recordbn['plid'];
                                                    $pccnam=$recordbn['name'];
                                                    $depccnam = base64_decode($pccnam);
                                                ?>
                                                <option value="<?php echo $pcc; ?>" ><?php echo $depccnam; ?></option>
                                            <?php
                                                }
                                            }catch(Exception $e) {
                                                echo "Placement category Loading Fail!";
                                            }
                                            ?>

                                        </select>
                                        <br>
                                        <?php
                                            try{
                                                $sqllan="SELECT * FROM languages ";
                                                $resultlan=$conn->query($sqllan);
                                            }catch(Exception $e) {
                                                echo "Language List Reading Fail!";
                                            }
                                        ?>
                                        <select class="form-control" id = "Opllang1" name="Opllang" placeholder="ENTER PLACEMENT LANGUAGE ID" required>
                                            <option value="0" selected>-Appointment Language-</option>
                                            <?php
                                                try{
                                                    while($recordlan = mysqli_fetch_array($resultlan)){  
                                                        $lj=$recordlan['lid'];
                                                        $ljna=$recordlan['name'];
                                                        $deljna = base64_decode($ljna);
                                            ?>
                                                        <option value="<?php echo $lj; ?>"><?php echo $deljna; ?></option>
                                            <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Language List Loading Fail!";
                                                }
                                            ?>
                                        </select>
                                        <br>
                                            <input type="text" class="form-control" id = "Opldate1" name="Opldate" placeholder="DATE OF APPOINTMENT" required>
                                        <br>
                                        <?php
                                        try{
                                            $sqlsip="SELECT * FROM subject";
                                            $resultsip=$conn->query($sqlsip);
                                        }catch(Exception $e) {
                                            echo "Subject List Reading Fail!";
                                        }
                                        ?>
                                        <select class="form-control" id = "OsuID1" name="OsuID" placeholder="ENTER PLACEMENT SUBJECT ID" required>
                                            <option value="0" selected>-Appointment Subject-</option>
                                            <?php
                                                try{
                                                    while($recordsip = mysqli_fetch_array($resultsip)){  
                                                        $caj=$recordsip['caid'];
                                                        $stj=$recordsip['ssid'];  
                                                        $kj=$recordsip['suID'];
                                                        $kjna=$recordsip['name'];
                                                        $dekjna = base64_decode($kjna);

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
                                            ?>
                                                        <option value="<?php echo $kj; ?>"><?php echo $dekjna." (".$desstjnam." - ".$decajnam." )"; ?></option>
                                                <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Subject List Loading Fail!";
                                                }
                                                ?>
                                            </select>
                                        <br>
                                        <?php
                                            try{
                                                $sqlpr="SELECT * FROM profession ";
                                                $resultpr=$conn->query($sqlpr);
                                            }catch(Exception $e) {
                                                echo "Profession List Reading Fail!";
                                            }
                                        ?> 
                                        <select class="form-control" id = "Oprofession1" name="Oprofession" placeholder="ENTER PROFESSION" required>
                                            <option value="0" selected>-Select Profession-</option>
                                            <?php
                                            try{
                                                while($recordpr = mysqli_fetch_array($resultpr)){  
                                                    $ss=$recordpr['proid'];
                                                    $ssnam=$recordpr['name'];
                                                    $dessnam = base64_decode($ssnam);

                                            ?>
                                                
                                                <option value="<?php echo $ss; ?>"><?php echo $dessnam; ?></option>
                                            <?php
                                                }
                                            }catch(Exception $e) {
                                                echo "Profession List Loading Fail!";
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