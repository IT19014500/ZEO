<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==8){
?>

<?php
ob_start();
    if(isset($_POST["import"])){
        $filename = $_FILES["file"]["tmp_name"];
        // if($_FILES["file"]["tmp_name"] > 0){
            $file = fopen($filename, "r");
            while(($column = fgetcsv($file, 0, ",")) !== FALSE){
                $column[1]=mysqli_real_escape_string($conn,$column[1]);
              if($column[0]=="divcode"||$column[1]=="divisionname"||$column[2]=="distcode"||$column[3]=="zonecode"){
                  continue;
              }
              $sqlinsert = "INSERT INTO divisimport(dvid,divcode,divisionname,distcode,zonecode)VALUES('','".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."')";
              $result = mysqli_query($conn,$sqlinsert);
              
            }
            if(!empty($result)){
            ?>
            <script>
                alert("CSV data imported into database sucessfully!");
                location='divisionDump.php';
            </script>
            <?php
            }
            else{
            ?>
            <script>
                alert("Problem in importing!");
                location='divisionDump.php';
            </script>
            <?php
            }
        // }
    }
ob_end_flush();
?>


<?php
    if(isset($_POST['emptalt'])){

        $delte="delete from divisimport where dvid != 0";
        $res=$conn->query($delte);

        if($res==TRUE){

?>

<Script>
    alert("Alter table Details removed!");
    location='divisionDump.php';
</Script>

<?php
        exit();
        }
    }
?>

<?php
    if(isset($_POST["tbimprt"])){
        $sqlds="SELECT * FROM divisimport";
        $resultds=$conn->query($sqlds);
        while($recordds = mysqli_fetch_array($resultds)){
            $ndivcode = $recordds['divcode'];
            $ndivisionname = $recordds['divisionname'];
            $ndistcode = $recordds['distcode'];
            $nzonecode = $recordds['zonecode'];

            $bzr = "No";

            $endivcode = base64_encode($ndivcode);
            $endivisionname = base64_encode($ndivisionname);
            $endistcode = base64_encode($ndistcode);
            $enzonecode = base64_encode($nzonecode);

            $sqlcrk="SELECT * FROM division WHERE divcode = '$endivcode'";
            $resultcrk=$conn->query($sqlcrk);
            while($recordcrk = mysqli_fetch_array($resultcrk)){
                $bzr = "Yes";
            }
            if($bzr == "No"){

            $add="INSERT INTO division(divcode,divisionname,distcode,zonecode)VALUES('$endivcode','$endivisionname','$endistcode','$enzonecode')";
            $restl = mysqli_query($conn,$add);
            }
        }
        if(!empty($restl)){
        ?>
        <script>
            alert("Imported into Division database sucessfully!");
            location='divisionDump.php';
        </script>
        <?php
        exit();
        }else{
        ?>
        <script>
            alert("Something went wrong!");
            location='divisionDump.php';
        </script>
<?php
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
    <title>Developer</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
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
            require_once '../AdminPannel/menu/topNavigation/developer/csDevTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../AdminPannel/menu/developer/csDevMenu.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Division List</em></strong></h1> <br><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Direct Import</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"> comment </p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="divisionDump.php" method="post" name="uploadCsv" enctype="multipart/form-data">   
                                        <div class="form-group">
                                            <label style="color:#000000;" for="file">Choose File</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="file" name="file" class="form-control" accept=".csv">
                                            </div>
                                        </div>
                                        <button type="submit" name="import" style="height:50px;" class="btn btn-success waves-effect waves-light m-r-10" >Import</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Alter table Operations</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"> comment </p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="col-lg-2 col-sm-4 col-xs-12">
                                        <form action="divisionDump.php" method="post" >
                                            <button style="width:150px;" type="submit" name="tbimprt" class="btn btn-block btn-primary">Move to Orginal</button>
                                        </form>
                                    </div><br><br><br>
                                    <div class="col-lg-2 col-sm-4 col-xs-12">
                                        <form action="divisionDump.php" method="post" >
                                            <button style="width:150px;" type="submit" name="emptalt" class="btn btn-block btn-danger">Empty Alter</button>
                                        </form>
                                    </div>
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
    <script src="../AdminPannel/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="../AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

    <!--Style Switcher -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
}else{
  echo "Please Login!";
}
?>