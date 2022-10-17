<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<?php
    if(isset($_POST['submit'])){
        $id=$_POST['Otid'];
    }else{
    $id=$_GET['id'];
    }
    $sqltq="SELECT * FROM school where scid = $id ";
    $resulttq=$conn->query($sqltq);
?>

<?php
    if(isset($_POST['submit'])){

        // $id=$_POST['Otid'];
        $Tname=$_POST['Oname'];
        $Taddress=$_POST['Oaddress'];
        $Ttpno=$_POST['Otpno'];
        $Tcensus=$_POST['Ocensus'];
        $Tschoolid=$_POST['Oschoolid'];

        $Tdistcode=$_POST['Odistcode'];
        $Tzonecode=$_POST['Ozonecode'];
        $Tdivcode=$_POST['Odivcode'];

        $Tdistcodevar = base64_encode($Tdistcode);
        $Tzonecodevar = base64_encode($Tzonecode);
        $Tdivcodevar = base64_encode($Tdivcode);

        $Tnamevar = base64_encode($Tname);
        $Taddressvar = base64_encode($Taddress);
        $Ttpnovar = base64_encode($Ttpno);

        $Tcensusvar = base64_encode($Tcensus);
        $Tschoolidvar = base64_encode($Tschoolid);

        $update="UPDATE school SET name='$Tnamevar',address='$Taddressvar',tpno='$Ttpnovar',census='$Tcensusvar',schoolid='$Tschoolidvar',distcode='$Tdistcodevar',zonecode='$Tzonecodevar',divcode='$Tdivcodevar' where scid=$id ";


        if($conn-> query($update)==TRUE){
?>

<Script>
    alert("School Details Updated!");
    location= '../../htmlPages/AdminPannel/school.php';

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
            require_once '../../htmlPages/AdminPannel/menu/topNavigation/actionFolderTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../../htmlPages/AdminPannel/menu/actionFolderMenu.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href = "../../htmlPages/AdminPannel/school.php"><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div><br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update</em></strong></h1><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Update School</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"> comment </p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                        <?php
                                            while($recordtq = mysqli_fetch_array($resulttq)){
                                                $enname = $recordtq['name'];
                                                $enaddress = $recordtq['address'];
                                                $entpno = $recordtq['tpno'];
                                                $encensus = $recordtq['census'];
                                                $enschoolid = $recordtq['schoolid'];

                                                $endistcode = $recordtq['distcode'];
                                                $enzonecode = $recordtq['zonecode'];
                                                $endivcode = $recordtq['divcode'];

                                                $deendistcode = base64_decode($endistcode);
                                                $deenzonecode = base64_decode($enzonecode);
                                                $deendivcode = base64_decode($endivcode);


                                                $deenname = base64_decode($enname);
                                                $deenaddress = base64_decode($enaddress);
                                                $deentpno = base64_decode($entpno);
                                                $deencensus = base64_decode($encensus);
                                                $deenschoolid = base64_decode($enschoolid);
                                                        
                                        ?>
                                        <div class="form-group">
                                            <label for="Oschoolid" style="color:#000000;">School ID</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                <input type="text" class="form-control" id = "Oschoolid1"  name="Oschoolid" value="<?php echo $deenschoolid; ?>" placeholder="ENTER SCHOOL ID" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Ocensus" style="color:#000000;">Census Number</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Ocensus1"  name="Ocensus" value="<?php echo $deencensus; ?>" placeholder="ENTER CENSUS NO" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Oname" style="color:#000000;">School Name</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Oname1"  name="Oname" value="<?php echo $deenname; ?>" placeholder="ENTER SCHOOL NAME" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Oaddress" style="color:#000000;">School Address</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Oaddress1"  name="Oaddress" value="<?php echo $deenaddress; ?>" placeholder="ENTER SCHOOL ADDRESS" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Oaddress" style="color:#000000;">School TP Number</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Otpno1"  name="Otpno" value="<?php echo $deentpno; ?>" placeholder="ENTER TP NO" required>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="input-group"> -->
                                                <input type="hidden" class="form-control" id = "Otid1" name="Otid" value="<?php echo $recordtq['scid'];?>" required>
                                            <!-- </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="Odistcode" style="color:#000000;">District Code</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                <input type="text" class="form-control" id = "Odistcode1"  name="Odistcode" value="<?php echo $deendistcode; ?>" placeholder="ENTER DISTRICT CODE" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Ozonecode" style="color:#000000;">Zone Code</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Ozonecode1"  name="Ozonecode" value="<?php echo $deenzonecode; ?>" placeholder="ENTER ZONE CODE" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Odivcode" style="color:#000000;">Division Code</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Odivcode1"  name="Odivcode" value="<?php echo $deendivcode; ?>" placeholder="ENTER DIVISION CODE" required>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="checkbox checkbox-success">
                                                <input id="checkbox1" type="checkbox">
                                                <label for="checkbox1"> Remember me </label>
                                            </div>
                                        </div> -->
                                        <?php
                                            }
                                        ?>
                                        <!-- <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button> -->
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
?>