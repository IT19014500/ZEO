<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2 || $_SESSION['ref']==3){
?>
      
<?php
  
  $sql3="SELECT * FROM district";
  $result3=$conn->query($sql3);

?>


<?php
    if(isset($_POST['submit'])){
        $Tdistcode=$_POST['Odistcode'];
        $Tdistname=$_POST['Odistname'];
        $Tprocode=$_POST['Oprocode'];

        $Tdistcodevar = base64_encode($Tdistcode);
        $Tdistnamevar = base64_encode($Tdistname);
        $Tprocodevar = base64_encode($Tprocode);

        $add="INSERT INTO district(distcode,distname,procode)VALUES('$Tdistcodevar','$Tdistnamevar','$Tprocodevar')";

        if($conn-> query($add)==TRUE){
?>

<Script>
    alert("District Details Added!");
    location='district.php';
</Script>

<?php
        exit();
        }
?>

<?php
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
    <title>ZEO Row Admin</title>
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
            require_once 'menu/topNavigation/RowAdmin/rowAdminTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once 'menu/RowAdmin/RowAdBasic.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage District</em></strong></h1><br>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="#" method="post">
                            <input type="text" class="form-control" id = "Odistname1"  name="Odistname" placeholder="ENTER DISTRICT NAME" required>
                            <br>
                            <input type="text" class="form-control" id = "Odistcode1"  name="Odistcode" placeholder="ENTER DISTRICT CODE" required>
                            <br>
                            <input type="text" class="form-control" id = "Oprocode1"  name="Oprocode" placeholder="ENTER PROVINCE CODE" required>
                            <br>
                            <div style="float:right">
                                <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="SUBMIT">
                                <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">District List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>DISTRICT CODE</th>
                                            <th>DISTRICT</th>
                                            <th>PROVINCE CODE</th>
                                            <th>EDIT</th>
                                            <?php
                                                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
                                            ?> 
                                            <th>DELETE</th>
                                            <?php
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>ZID</th>
                                            <th>ZONE</th>
                                            <th>EDIT</th> -->
                                            <?php
                                                // if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
                                            ?> 
                                            <!-- <th>DELETE</th> -->
                                            <?php
                                                // }
                                            ?>
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while($record3 = mysqli_fetch_array($result3)){
                                                $endistname = $record3['distname'];
                                                $deendistname = base64_decode($endistname);
                                                $endistcode = $record3['distcode'];
                                                $deendistcode = base64_decode($endistcode);
                                                $enprocode = $record3['procode'];
                                                $deenprocode = base64_decode($enprocode);
                                        ?>
                                            <tr style="color:#000000;background-color:#ffffff;">
                                                <td><?php echo $deendistcode; ?></td>
                                                <td><?php echo $deendistname; ?></td>
                                                <td><?php echo $deenprocode; ?></td>
                                                <td><a href="../../Action/district/disUpdate.php?id=<?php echo $endistcode; ?>"><button class="btn btn-primary">EDIT</button></a></td>
                                                <?php
                                                    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
                                                ?>         
                                                <td><a href="../../Action/district/disDelete.php?id=<?php echo $endistcode; ?>"><button class="btn btn-danger">DELETE</button></a></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                        <?php
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
?>