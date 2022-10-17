<?php
try{
    include('../../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>
<?php
    try{
        $reiduc = 5;
        $sql3="SELECT * FROM teacher";
        $result3=$conn->query($sql3);
    }catch(Exception $e) {
        echo "Teacher List Reading Failed!";
    }
?>
<?php
    try{
        if(isset($_POST['submit'])){
            $TfullName=$_POST['OfullName'];
            $TaddressT=$_POST['OaddressT'];
            $Tnic=$_POST['Onic'];
            $Tdob=$_POST['Odob'];
            $Ttp=$_POST['Otp'];
            $Twtp=$_POST['Owtp'];
            $Tsex=$_POST['Osex'];
            $Tmstatus=$_POST['Omstatus'];
            $TfbName=$_POST['OfbName'];
            $TeMail=$_POST['OeMail'];
            $Tsalschool=$_POST['Osalschool'];
            $placement=$_POST['Oplacement'];
            $Tscid=$_POST['Oscid'];
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
            
            $cknstn = "No";
            $sqltcon="SELECT * FROM teacher where nic= '$Tnicvar'";
            $resulttcon=$conn->query($sqltcon);
            while($recordtcon = mysqli_fetch_array($resulttcon)){
            $cknstn = "Yes";
            }

            if($cknstn == "No"){
            $add="INSERT INTO teacher(fullname,addressT,nic,dob,tp,wtp,sex,mstatus,fbName,eMail,salschool,placement,scid,pllang,pldate,suID,cpro)VALUES('$TfullNamevar','$TaddressTvar','$Tnicvar','$Tdob','$Ttpvar','$Twtpvar','$Tsexvar','$Tmstatus','$TfbNamevar','$TeMailvar','$Tsalschoolvar','$placement','$Tscid','$Tpllang','$Tpldate','$TsuID','$Tprofession')";

            $addusrby="INSERT INTO users(email,uname,pwd,reid)VALUES('$Tnicvar','$Tnicvar','$Tnicmd','$reiduc')";
            $conn-> query($addusrby);
            }elseif($cknstn == "Yes"){
            ?>
                
            <Script>
                alert("Already added!");
                location='teacher.php';
            </Script>
                    
            <?php
            }
            if($conn-> query($add)==TRUE){

        ?>

        <Script>
            alert("Teacher Details Added!");
            location='teacher.php';

        </Script>

        <?php
            exit();
            }
        ?>

<?php
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
    <link rel="icon" type="image/png" sizes="16x16" href="../../../images/logoGvmnt.png">
    <title>ZEO Admin</title>
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
            try{
                require_once '../menu/topNavigation/headteEditTPN.php';
            }catch(Exception $e) {
                echo "Top Navigation Loading Failed!";
            }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            try{
                require_once '../menu/headteEditInFolder.php';
            }catch(Exception $e) {
                echo "Navigation Bar Loading Failed!";
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Edit and Delete Requests</em></strong></h1><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div style="background-color:#d6ddff;" class="white-box">
                            <h3 class="m-b-0 box-title">Check your requests </h3><br>
                            <div class="row">
                                <?php
                                    try{
                                ?>
                                        <div class="col-lg-2 col-sm-4 col-xs-12">
                                            <a href="../teacherEdit.php"><button class="btn btn-block btn-primary">Service & Grade</button></a>
                                        </div>
                                        <div class="col-lg-2 col-sm-4 col-xs-12">
                                            <a href="../teachingDetaEdit.php"><button class="btn btn-block btn-primary">Allocated Class</button></a>
                                        </div>
                                        <div class="col-lg-2 col-sm-4 col-xs-12">
                                            <a href="../capableSubEApp.php"><button class="btn btn-block btn-primary">Capable Subject</button></a>
                                        </div>
                                        <div class="col-lg-2 col-sm-4 col-xs-12">
                                            <a href="../trainEditApp.php"><button class="btn btn-block btn-primary">Training Status</button></a>
                                        </div>
                                        <div class="col-lg-2 col-sm-4 col-xs-12">
                                            <a href="../teaqualificationUpdt.php"><button class="btn btn-block btn-primary">Qualification</button></a>
                                        </div>
                                        <div class="col-lg-2 col-sm-4 col-xs-12">
                                            <a href="../ersvsEdit.php"><button class="btn btn-block btn-primary">Early Service</button></a>
                                        </div>
                                <?php
                                    }catch(Exception $e) {
                                        echo "Button Navigation Failed!";
                                    }
                                ?>
                            </div>
                            <h3 class="m-b-0 m-t-30 box-title"> </h3>
                            <div class="row">
                                <?php
                                    try{
                                ?>
                                        <div class="col-lg-2 col-sm-4 col-xs-12">
                                            <a href="../extraAct.php"><button class="btn btn-block btn-primary">Extra Activity</button></a>
                                        </div>
                                        <div class="col-lg-2 col-sm-4 col-xs-12">
                                            <a href="../exDutyAppr.php"><button class="btn btn-block btn-primary">Exam Duty</button></a>
                                        </div>
                                        <div class="col-lg-2 col-sm-4 col-xs-12">
                                            <a href="../tchildApr.php"><button class="btn btn-block btn-primary">Child List</button></a>
                                        </div>
                                        <div class="col-lg-2 col-sm-4 col-xs-12">
                                            <a href="../tspouceApr.php"><button class="btn btn-block btn-primary">Spouce</button></a>
                                        </div>
                                        <div class="col-lg-2 col-sm-4 col-xs-12">
                                            <a href="../pcardreApr.php"><button class="btn btn-block btn-primary">Cardre Requests</button></a>
                                        </div>
                                <?php
                                    }catch(Exception $e) {
                                        echo "Down Button Navigation Failed!";
                                    }
                                ?>
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
        echo "Connection Failed!";
    }
?>