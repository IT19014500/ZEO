<?php
    try{
        include('../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>
<?php
    try{
        $rth=$_SESSION['uname'];
        $derth=base64_encode($rth);
        $prboid = "Normal";
        if(isset($_GET['prbuid'])){
            $prboid = $_GET['prbuid'];
        }
        $sql3="SELECT * FROM markadmin ";
        $result3=$conn->query($sql3);
    }catch(Exception $e) {
        echo "User Authentication Failed!";
    }
?> 
<?php
    try{
        if(isset($_POST['submit'])){

            $Tmunm=$_POST['Omunm'];
            $Tscid=$_POST['Oscid'];

            $Tmunmvar = base64_encode($Tmunm);

            $add="INSERT INTO markadmin(username,scid)VALUES('$Tmunmvar','$Tscid')";

            if($conn-> query($add)==TRUE){
        ?>
        <Script>
            alert("Marks Admin Added!");
            location='markadmAd.php';
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
    <title>ZEO Admin</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type=text/javascript src="../bootstrap/js/schoolFetch.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Marking Admin</em></strong></h1><br>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="" method="post">
                            <?php
                                try{
                                    $sqlbn="SELECT * FROM users WHERE reid = 6 ";
                                    $resultbn=$conn->query($sqlbn);
                                }catch(Exception $e) {
                                    echo "User Loading Failed!";
                                }
                            ?>
                                <select class="form-control" id = "Omunm1" name="Omunm" required>
                                    <option value="0" selected>-Select Marks Admin-</option>
                                    <?php
                                        try{
                                            while($recordbn = mysqli_fetch_array($resultbn)){  
                                                $nenuname=$recordbn['email'];
                                                $denenuname = base64_decode($nenuname);
                                            ?>
                                                <option value="<?php echo $denenuname; ?>" ><?php echo $denenuname; ?></option>
                                    <?php
                                            }
                                        }catch(Exception $e) {
                                            echo "User Selection Failed!";
                                        }
                                    ?>
                                </select>
                                <br>
                            <?php
                                try{
                                    $sqlersc="SELECT * FROM school where scid != 110";
                                    $resultersc=$conn->query($sqlersc);
                                    echo "<div style='width:325px;'>";
                                    echo "<select id='Oscid1' name='Oscid' class='form-control'>";
                                    echo "<option vaue='0' selected>-- Select Responsible School --</option>";
                                    while($recordersc = mysqli_fetch_array($resultersc)){  
                                        $ersi=$recordersc['scid'];
                                        $ersinam=$recordersc['name'];
                                        $deersinam = base64_decode($ersinam);
                                        echo "<option value='$ersi'>$deersinam</option>";
                                    }
                                    echo "</select>";
                                    echo "</div><br>";
                                }catch(Exception $e) {
                                    echo "School List Loading Failed!";
                                }
                            ?>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
                            <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />

                            <script>
                                $("#Oscid1").chosen();
                            </script>

                            <div style="float:right;">
                                <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="SUBMIT">
                                <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                            </div>
                            <br>
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Mark Admin Allocated School List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Mark admin List</caption>
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>School</th>
                                            <?php
                                                try{
                                                    if($prboid=="Normal"){
                                            ?>
                                                        <th>EDIT</th>
                                                    <?php
                                                        }
                                                        if($prboid=="Normal"){
                                                    ?>
                                                        <th>DELETE</th>
                                            <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Action Loading Failed!";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>Username</th>
                                            <th>School</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        try{
                                            while($record3 = mysqli_fetch_array($result3)){
                                            $uns = $record3['username'];
                                            $sclmp = $record3['scid'];
                                        
                                            $deuns = base64_decode($uns);
                                        
                                            $sqlsct="SELECT * FROM school WHERE scid = $sclmp";
                                            $resultsct=$conn->query($sqlsct);
                                            while($recordsct = mysqli_fetch_array($resultsct)){
                                                $sclnme = $recordsct['name'];
                                                $desclnme = base64_decode($sclnme);
                                        
                                            }
                                    ?>  
                                                <tr style="color:#000000;background-color:#ffffff;">
                                                    <td><?php echo $deuns; ?></td>
                                                    <td><?php echo $desclnme; ?></td>
                                                    <?php
                                                        if($prboid=="Normal"){
                                                    ?>
                                                        <td><a href="../../Action/marks/markUpdate.php?id=<?php echo $record3['username']; ?>"><button class = "btn btn-primary">EDIT</button></a></td>
                                                    <?php
                                                        }
                                                    ?>
                                                    <?php
                                                        if($prboid=="Normal"){
                                                    ?>
                                                        <td><a href="../../Action/marks/markDelete.php?id=<?php echo $record3['username']; ?>"><button class = "btn btn-danger">DELETE</button></a></td>
                                                    <?php
                                                        }
                                                    ?>
                                                </tr>
                                            <?php
                                                }
                                            }catch(Exception $e) {
                                                echo "Data Processing Failed!";
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
        echo "Authentication Failed!";
    }
?>