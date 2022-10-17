<?php

include('../../connection.php');

  session_start();
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<?php
  $toteande = 0;
  $sql3="SELECT * FROM school";
  $result3=$conn->query($sql3);

?>

<?php
if(isset($_POST['submit'])){
    $Tname=$_POST['Oname'];
    $Taddress=$_POST['Oaddress'];
    $Ttpno=$_POST['Otpno'];
    $Tcensus=$_POST['Ocensus'];
    $Tschoolid=$_POST['Oschoolid'];
    $Tdistcode=$_POST['Odistcode'];
    $Tzonecode=$_POST['Ozonecode'];
    $Tdivcode=$_POST['Odivcode'];

    $Tnamevar = base64_encode($Tname);
    $Taddressvar = base64_encode($Taddress);
    $Ttpnovar = base64_encode($Ttpno);

    $Tcensusvar = base64_encode($Tcensus);
    $Tschoolidvar = base64_encode($Tschoolid);

    $Tdistcodevar = base64_encode($Tdistcode);
    $Tzonecodevar = base64_encode($Tzonecode);
    $Tdivcodevar = base64_encode($Tdivcode);

    $add="INSERT INTO school(name,address,tpno,census,schoolid,distcode,zonecode,divcode)VALUES('$Tnamevar','$Taddressvar','$Ttpnovar','$Tcensusvar','$Tschoolidvar','$Tdistcodevar','$Tzonecodevar','$Tdivcodevar')";

    if($conn-> query($add)==TRUE){

?>

<Script>
    alert("School Details Added!");
    location='school.php';

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
            require_once 'menu/mainAdmin.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Schools</em></strong></h1><br>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="#" method="post">
                            <div align="left">
                                <input type="text" class="form-control" id = "Oschoolid1"  name="Oschoolid" placeholder="ENTER SCHOOL ID" required>
                            </div><br>
                            <div align="left">
                                <input type="text" class="form-control" id = "Ocensus1"  name="Ocensus" placeholder="ENTER CENSUS NO" required>
                            </div><br>
                            <div align="left">
                                <input type="text" class="form-control" id = "Oname1"  name="Oname" placeholder="ENTER SCHOOL NAME" required>
                            </div><br>
                            <div align="left">
                                <input type="text" class="form-control" id = "Oaddress1"  name="Oaddress" placeholder="ENTER SCHOOL ADDRESS" required>
                            </div><br>
                            <div align="left">
                                <input type="text" class="form-control" id = "Otpno1"  name="Otpno" placeholder="ENTER TP NO" required>
                            </div><br>
                            <div align="left">
                                <input type="text" class="form-control" id = "Odistcode1"  name="Odistcode" placeholder="ENTER DISTRICT CODE" required>
                            </div><br>
                            <div align="left">
                                <input type="text" class="form-control" id = "Ozonecode1"  name="Ozonecode" placeholder="ENTER ZONE CODE" required>
                            </div><br>
                            <div align="left">
                                <input type="text" class="form-control" id = "Odivcode1"  name="Odivcode" placeholder="ENTER DIVISION CODE" required>
                            </div><br>
                            <div align="right">
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
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAME</th>
                                            <th>ADDRESS</th>
                                            <th>TP NO</th>
                                            <th>CENSUS NO</th>
                                            <th>SCHOOL ID</th>
                                            <th>DISTRICT CODE</th>
                                            <th>ZONE CODE</th>
                                            <th>DEVISION CODE</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while($record3 = mysqli_fetch_array($result3)){
                                            // scid != 110
                                                $sclprt = $record3['scid'];
                                                $enname = $record3['name'];
                                                $enaddress = $record3['address'];
                                                $entpno = $record3['tpno'];
                                                $encensus = $record3['census'];
                                                $enschoolid = $record3['schoolid'];
                                                $endistcode = $record3['distcode'];
                                                $enzonecode = $record3['zonecode'];
                                                $endivcode = $record3['divcode'];

                                                $deendistcode = base64_decode($endistcode);
                                                $deenzonecode = base64_decode($enzonecode);
                                                $deendivcode = base64_decode($endivcode);

                                                $deenname = base64_decode($enname);
                                                $deenaddress = base64_decode($enaddress);
                                                $deentpno = base64_decode($entpno);
                                                $deencensus = base64_decode($encensus);
                                                $deenschoolid = base64_decode($enschoolid);
                                                    
                                        ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <td><?php echo $sclprt; ?></td>
                                            <td><?php echo $deenname; ?></td>
                                            <td><?php echo $deenaddress; ?></td>
                                            <td><?php echo $deentpno; ?></td>
                                            <td><?php echo $deencensus; ?></td>
                                            <td><?php echo $deenschoolid; ?></td>
                                            <td><?php echo $deendistcode; ?></td>
                                            <td><?php echo $deenzonecode; ?></td>
                                            <td><?php echo $deendivcode; ?></td>
                                            <?php
                                            if($sclprt!=110){
                                            ?>
                                            <td><a href="../../Action/school/sUpdate.php?id=<?php echo $record3['scid']; ?>"><button class = "btn btn-primary">EDIT</button></a></td>
                                            <td><a href="../../Action/school/sDelete.php?id=<?php echo $record3['scid']; ?>"><button class = "btn btn-danger">DELETE</button></a></td>
                                            <?php
                                                }else{
                                            ?>
                                            <td>Access Denied</td>
                                            <td>Access Denied</td>
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