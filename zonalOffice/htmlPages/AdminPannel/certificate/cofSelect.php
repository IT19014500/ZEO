<?php
    try{
        include('../../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>
<?php
    try{
        $rth=$_SESSION['uname'];
        $derth=base64_encode($rth);
    }catch(Exception $e) {
        echo "Authentication Failed!";
    }
?>    
<?php
    try{
    $prboid = "Normal";
    if(isset($_GET['prbuid'])){
        $prboid = $_GET['prbuid'];
    }
    $sql3="SELECT * FROM coftbl";
    $result3=$conn->query($sql3);
    }catch(Exception $e) {
        echo "Data Reading Failed!";
    }
?> 

<?php
    try{
        if(isset($_POST['submit'])){
            $Tucg=$_POST['Oucg'];
            $Tscid=$_POST['Oscid'];

            $add="INSERT INTO coftbl(uname,scid)VALUES('$Tucg','$Tscid')";

            if($conn-> query($add)==TRUE){

?>

        <Script>
            alert("Certificate Officer School Added!");
            location='cofSelect.php';

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
    <link rel="icon" type="image/png" sizes="16x16" href="../../../images/logoGvmnt.png">
    <title>ZEO Admin</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type=text/javascript src="../../bootstrap/js/schoolFetch.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                require_once '../menu/adminSecondInCof.php';
            }catch(Exception $e) {
                echo "Navigation Bar Loading Failed!";
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <a href="cofSelect.php?prbuid=<?php echo "print"; ?>"><button style="background-color:#0C4574;float:right;margin-right:50px;border-radius:18px;width:120px;height:50px;color:#ffffff;border:none;">Print Mode</button></a>
                <a href="cofSelect.php?prbuid=<?php echo "Normal"; ?>"><button style="background-color:#0C4574;float:right;margin-right:30px;border-radius:18px;width:130px;height:50px;color:#ffffff;border:none;">Normal Mode</button></a><br><br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Certificate Officer</em></strong></h1><br>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="" method="post">
                            <?php
                                try{
                                    $sqlucg="SELECT * FROM users WHERE reid = 7";
                                    $resultucg=$conn->query($sqlucg);
                                }catch(Exception $e) {
                                    echo "User List Reading Failed!";
                                }
                            ?> 
                            <select class="form-control" id = "Oucg1" name="Oucg" required>
                                <option value="" selected>-Select Username-</option>
                                <?php
                                    try{
                                        while($recorducg = mysqli_fetch_array($resultucg)){  
                                            $unameid=$recorducg['uname'];
                                            $deunameid = base64_decode($unameid);
                                ?>
                                            <option value="<?php echo $unameid; ?>" ><?php echo $deunameid; ?></option>
                                <?php
                                        }
                                    }catch(Exception $e) {
                                        echo "Username identificaton Failed!";
                                    }
                                ?>
                            </select>
                            <br>
                            <?php
                                try{
                                    $sqlersc="SELECT * FROM school where scid != 110";
                                    $resultersc=$conn->query($sqlersc);
                                    echo "<select style='width:320px;' id='Oscid1' name='Oscid' class='form-control'>";
                                    echo "<option vaue='0' selected>-- Select Responsible School --</option>";
                                    while($recordersc = mysqli_fetch_array($resultersc)){  
                                        $ersi=$recordersc['scid'];
                                        $ersinam=$recordersc['name'];
                                        $deersinam = base64_decode($ersinam);
                                        echo "<option value='$ersi'>$deersinam</option>";
                                    }
                                    echo "</select>";
                                    echo "<br>";
                                }catch(Exception $e) {
                                    echo "School List Reading Failed!";
                                }
                            ?>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
                            <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />
                            <script>
                                $("#Oscid1").chosen();
                            </script>
                            <br>
                            <div style="float:right;">
                                <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="SUBMIT">
                                <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">School List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Allocated Officers</caption>
                                    <thead>
                                        <tr>
                                            <th>CERTIFICATE OFFICER</th>
                                            <th>SCHOOL</th>
                                            <?php
                                                try{
                                                    if($prboid=="Normal"){
                                            ?>
                                                        <th>EDIT</th>
                                                        <th>DELETE</th>
                                            <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Action Detection Failed!";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>CERTIFICATE OFFICER</th>
                                            <th>SCHOOL</th> -->
                                            <?php
                                            // if($prboid=="Normal"){
                                                ?>
                                            <!-- <th>EDIT</th>
                                            <th>DELETE</th> -->
                                            <?php
                                            // }
                                            ?>
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            try{
                                                while($record3 = mysqli_fetch_array($result3)){
                                                    $cofrid = $record3['cofid'];
                                                    $scscid = $record3['scid'];
                                                    $unameprt = $record3['uname'];
                                                    $deunameprt = base64_decode($unameprt);
                                                    $sqlsclp="SELECT * FROM school WHERE scid = $scscid";
                                                    $resultsclp=$conn->query($sqlsclp);
                                                    while($recordsclp = mysqli_fetch_array($resultsclp)){
                                                        $sclpnm = $recordsclp['name'];
                                                        $desclpnm = base64_decode($sclpnm);
                                                    } 
                                        ?>
                                                    <tr style="color:#000000;background-color:#ffffff;">
                                                        <td><?php echo $deunameprt; ?></td>
                                                        <td><?php echo $desclpnm; ?></td>
                                                        <?php
                                                            if($prboid=="Normal"){
                                                        ?>
                                                        <td><a href="../../../Action/certificate/cofUpdate.php?id=<?php echo $cofrid; ?>"><button class = "btn btn-primary">EDIT</button></a></td>
                                                        <td><a href="../../../Action/certificate/cofDelete.php?id=<?php echo $cofrid; ?>"><button class = "btn btn-danger">DELETE</button></a></td>
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
        echo "Connection Failed!";
    }
?>