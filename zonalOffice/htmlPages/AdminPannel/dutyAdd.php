<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2 || $_SESSION['ref']==4){
?>

<?php 
  $sql3="SELECT * FROM duties WHERE iden IN (SELECT iden FROM bmemtbl);";
  $result3=$conn->query($sql3);
?>

<?php
  if(isset($_POST['submit'])){
    
    $Tduty=$_POST['Oduty'];
    $Tbmemid=$_POST['Obmemid'];

    $Tdutyvar = base64_encode($Tduty);
    $Tbmemidvar = base64_encode($Tbmemid);

    $add="INSERT INTO duties(duty,iden)VALUES('$Tdutyvar','$Tbmemidvar')";

    if($conn-> query($add)==TRUE){

?>

<Script>
    alert("Duty Details Added!");
    location='dutyAdd.php';

</Script>

<?php
    exit();
    }
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
            require_once 'menu/topNavigation/mainAdminTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once 'menu/branchAdminBasic.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Member Duty</em></strong></h1><br>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="#" method="post">
                            <div align="left">
                                <input type="text" class="form-control" id = "Oduty1"  name="Oduty" placeholder="ENTER DUTY" required>
                            </div><br>
                            <?php
                                $sqlchg="SELECT * FROM bmemtbl ";
                                $resultchg=$conn->query($sqlchg);
                            ?> 
                            <div align="left">
                                <select class="form-control" id = "Obmemid1" name="Obmemid" placeholder="ENTER NIC" required>
                                <option value="0" selected>-Select NIC-</option>
                                <?php
                                    while($recordchg = mysqli_fetch_array($resultchg)){  
                                        $mbmem=$recordchg['iden'];
                                        $dembmem = base64_decode($mbmem);
                                        
                                ?>
                                    <option value="<?php echo $dembmem; ?>" ><?php echo $dembmem; ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div><br> 
                            <div align="right">
                                <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="SUBMIT">
                                <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Duty List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Duty List</caption>
                                    <thead>
                                        <tr>
                                            <th>DUID</th>
                                            <th>DUTY</th>
                                            <th>MEMBER ID</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>DUID</th>
                                            <th>DUTY</th>
                                            <th>MEMBER ID</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while($record3 = mysqli_fetch_array($result3)){
                                                $enduty = $record3['duty'];
                                                $deenduty = base64_decode($enduty);
                                                
                                                $eniden = $record3['iden'];
                                                $deeniden = base64_decode($eniden);           
                                        ?>
                                            <tr style="color:#000000;background-color:#ffffff;">
                                                <td><?php echo $record3['duid']; ?></td>
                                                <td><?php echo $deenduty; ?></td>
                                                <td><?php echo $deeniden; ?></td>
                                                <td><a href="../../Action/Duty/dutyUpdate.php?id=<?php echo $record3['duid']; ?>&pgi=<?php echo 'bme'; ?>"><button class="btn btn-primary">EDIT</button></a></td>
                                                <td><a href="../../Action/Duty/dutyDelete.php?id=<?php echo $record3['duid']; ?>&pgi=<?php echo 'bme'; ?>"><button class="btn btn-danger">DELETE</button></a></td>
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