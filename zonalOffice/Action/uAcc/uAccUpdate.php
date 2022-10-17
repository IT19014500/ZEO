<?php
    try{
        include('../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>
<?php
    try{
        $id=$_GET['id'];
        $sqltq="SELECT * FROM users where email = '$id' ";
        $resulttq=$conn->query($sqltq);
    }catch(Exception $e) {
        echo "Authentication Failed!";
    }
?> 
<?php
    try{
        if(isset($_POST['submit'])){

            $Tuname=$_POST['Ouname'];
            $Tpwd=$_POST['Opwd'];
            $Treid=$_POST['Oreid'];

            $Tunamevar = base64_encode($Tuname);
            $Tpwdvar = md5($Tpwd);

            $update="UPDATE users SET uname='$Tunamevar', pwd='$Tpwdvar', reid='$Treid' where email='$id' ";

            if($conn-> query($update)==TRUE){
        ?>
                <Script>
                    alert("User Account Updated!");
                    location= '../../htmlPages/AdminPannel/userAccountCr.php';
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
    <title>ZEO Admin</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
                require_once '../../htmlPages/AdminPannel/menu/actionFolderMenu.php';
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
                    <a href = "../../htmlPages/AdminPannel/userAccountCr.php"><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update</em></strong></h1><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">User Account Details</h3><br>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                    <?php
                                        try{
                                            while($recordtq = mysqli_fetch_array($resulttq)){

                                                $enuname = $recordtq['uname'];
                                                $enpwd = $recordtq['pwd'];
                                                $enrehck = $recordtq['reid'];

                                                $deuname = base64_decode($enuname);
                                                $depwd = base64_decode($enpwd);
                                                
                                                $ustatusp = "hidden";
                                                if($enrehck==2 || $enrehck==3 || $enrehck==4 || $enrehck==8){
                                                    $ustatusp = "text";
                                                }
                                        ?>
                                            <div class="form-group">
                                                <?php
                                                    if($ustatusp == "text"){
                                                ?>
                                                <label for="Ouname" style="color:#000000;">User Name</label>
                                                <?php
                                                    }else{
                                                ?>
                                                    <label style="color:#000000;">User Name - <?php echo $deuname; ?></label>
                                                <?php
                                                    }
                                                ?>
                                                <div class="input-group">
                                                    <?php
                                                        if($ustatusp == "text"){
                                                    ?>
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <input type="<?php echo $ustatusp; ?>" class="form-control" id = "Ouname1"  name="Ouname" value="<?php echo $deuname; ?>" placeholder="ENTER User Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Opwd" style="color:#000000;">Password</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <input type="text" class="form-control" id = "Opwd1"  name="Opwd" placeholder="Enter New Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    $bbc="";
                                                    $bbcd="";
                                                    $sqlbn="SELECT * FROM usercgs ";
                                                    $resultbn=$conn->query($sqlbn);
                                                ?>
                                                <label for="Oreid" style="color:#000000;">User Role</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <select class="form-control" id = "Oreid1" name="Oreid" required>
                                                        <?php
                                                            while($recordbn = mysqli_fetch_array($resultbn)){  
                                                                $scc=$recordbn['reid'];
                                                                $scch=$recordtq['reid'];
                                                                $enscchglu = $recordbn['profession'];
                                                                if($scc==$scch){
                                                                    $bbc='selected';
                                                                    $bbcd=$scc;
                                                                }
                                                        ?>
                                                        <option value="<?php echo $scc; ?>" <?php if($bbcd==$scc){echo $bbc;}?>><?php echo $enscchglu; ?></option>
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