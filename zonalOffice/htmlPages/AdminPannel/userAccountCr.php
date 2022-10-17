<?php
    try{
        include('../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
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
        echo "Connection Failed!";
    }
?>
<?php
    try{
        $sql3="SELECT * FROM users";
        $result3=$conn->query($sql3);
    }catch(Exception $e) {
        echo "User List Reading Failed!";
    }
?>
<?php
    try{
        if(isset($_POST['submit'])){        
            $Temail=$_POST['Oemail'];
            $Tuname=$_POST['Ouname'];
            $Tpwd = $_POST['Opwd'];
            $Treid = $_POST['Oreid'];

            $Temailvar = base64_encode($Temail);
            $Tunamevar = base64_encode($Tuname);
            $Tpwdvar = md5($Tpwd);

            $add="INSERT INTO users(email,uname,pwd,reid)VALUES('$Temailvar','$Tunamevar','$Tpwdvar','$Treid')";

            if($conn-> query($add)==TRUE){
        ?>
                <Script>
                    alert("User Accounts Added!");
                    location='userAccountCr.php';
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
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/logoGvmnt.png">
    <title>User Account</title>
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
            try{
                require_once 'menu/topNavigation/mainAdminTPN.php';
            }catch(Exception $e) {
                echo "Top Navigation Loading Failed!";
            }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            try{
                require_once 'menu/mainAdmin.php';
            }catch(Exception $e) {
                echo "Navigation Bar Loading Failed!";
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage User Accounts</em></strong></h1><br>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="#" method="post">
                            <input type="text" class="form-control" id = "Oemail1"  name="Oemail" placeholder="ENTER E-MAIL" required>
                            <br>
                            <input type="text" class="form-control" id = "Ouname1"  name="Ouname" placeholder="ENTER USER NAME" required>
                            <br>
                            <input type="text" class="form-control" id = "Opwd1"  name="Opwd" placeholder="ENTER PASSWORD" required>
                            <br>
                            <?php
                                try{
                                    $sqlpr="SELECT * FROM usercgs ";
                                    $resultpr=$conn->query($sqlpr);
                                }catch(Exception $e) {
                                    echo "User List Reading Failed!";
                                }
                            ?> 
                            <select class="form-control" id = "Oreid1" name="Oreid" placeholder="ENTER REFERENCE ID" required>
                                <option value="0" selected>-Select Reference-</option>
                                <?php
                                    try{
                                        while($recordpr = mysqli_fetch_array($resultpr)){  
                                            $ss=$recordpr['reid'];
                                            $ssna = $recordpr['profession'];
                                    ?>
                                            <option value="<?php echo $ss; ?>"><?php echo $ssna; ?></option>
                                <?php
                                        }
                                    }catch(Exception $e) {
                                        echo "Reference List Loading Failed!";
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
                    <div class="col-sm-8">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">User List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>EMAIL</th>
                                            <th>USER NAME</th>
                                            <th>PASSWORD</th>
                                            <th>REF ID</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>EMAIL</th>
                                            <th>USER NAME</th>
                                            <th>PASSWORD</th>
                                            <th>REF ID</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            try{
                                                while($record3 = mysqli_fetch_array($result3)){
                                                    $enemail = $record3['email'];
                                                    $enuname = $record3['uname'];
                                                    $enpwd = $record3['pwd'];

                                                    $deemail = base64_decode($enemail);
                                                    $deuname = base64_decode($enuname);              
                                            ?>
                                                <tr style="color:#000000;background-color:#ffffff;">
                                                    <td><?php echo $deemail; ?></td>
                                                    <td><?php echo $deuname; ?></td>
                                                    <td><input style="border:none;" type="password" value="<?php echo $enpwd; ?>"></td>
                                                    <td><?php echo $record3['reid']; ?></td>
                                                    <td><a href="../../Action/uAcc/uAccUpdate.php?id=<?php echo $record3['email']; ?>"><button class="btn btn-primary">EDIT</button></a></td>
                                                    <td><a href="../../Action/uAcc/uAccDelete.php?id=<?php echo $record3['email']; ?>"><button class="btn btn-danger">DELETE</button></a></td>
                                                    </tr>
                                        <?php
                                                }
                                            }catch(Exception $e) {
                                                echo "User List Reading Failed!";
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
                © 2022 Zonal Educational Office Galewela. All rights reserved. <a style="color:#000000;" href = "https://www.facebook.com/AJCJ123"> Designed & Developed by Ayubowan JCJ</a>
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
    }catch(Exception $e) {
        echo "Connection Failed!";
    }
?>