<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<?php
    if(isset($_POST['submit'])){
        $id=$_POST['Opriid'];
    }else{
        $id=$_GET['id'];
    }
  $sqltq="SELECT * FROM principle where priid = $id ";
  $resulttq=$conn->query($sqltq);
?> 

<?php
if(isset($_POST['submit'])){

    $Tsgid=$_POST['Osgid'];
    $Taprosdate=$_POST['Oaprosdate'];
    $Tateasdate=$_POST['Oateasdate'];
    $Tresfield=$_POST['Oresfield'];
    $Ttid=$_POST['Otid'];
    $Temail=$_POST['Oemail'];

    $Temailvar = base64_encode($Temail);
    $Tresfieldvar = base64_encode($Tresfield);

    $update="UPDATE principle SET sgid='$Tsgid',aprosdate='$Taprosdate',ateasdate='$Tateasdate',resfield='$Tresfieldvar',tid='$Ttid',email='$Temailvar' WHERE priid= $id ";


    if($conn-> query($update)==TRUE){

?>

<Script>
    alert("Principle Details Updated!");
    location= '../../htmlPages/AdminPannel/principleAdd.php';

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
                    <a href = "../../htmlPages/AdminPannel/principleAdd.php"><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update</em></strong></h1><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Update Principal</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"> comment </p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                        <?php
                                            while($recordtq = mysqli_fetch_array($resulttq)){
                                                $enemail = $recordtq['email'];
                                                $enresfield = $recordtq['resfield'];
                                                $deenemail = base64_decode($enemail);
                                                $deenresfield = base64_decode($enresfield);
                                        ?>
                                        <div class="form-group">
                                            <?php
                                                $bbn="";
                                                $gros="";
                                                $enprity = "Principle";
                                                $deenprity = base64_encode($enprity);
                                                $sqlpos="SELECT * FROM serandgrade WHERE descri='$deenprity'";
                                                $resultpos=$conn->query($sqlpos);
                                            ?> 
                                            <label for="Osgid">Service Grade</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Osgid1" name="Osgid" required>
                                                    <?php
                                                        while($recordpos = mysqli_fetch_array($resultpos)){  
                                                            $jjl=$recordpos['sgid'];
                                                            $jjhh=$recordtq['sgid'];
                                                            $engradef = $recordpos['grade'];
                                                            $deengradef = base64_decode($engradef);
                                                            if($jjl==$jjhh){
                                                                $bbn='selected';
                                                                $gros=$jjl;
                                                            }
                                                    ?>
                                                        <option value="<?php echo $jjl; ?>"  <?php if($gros==$jjl){echo $bbn;}?>><?php echo $deengradef; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Oaprosdate">Start Date According to Proffession</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Oaprosdate1"  name="Oaprosdate" value="<?php echo $recordtq['aprosdate']; ?>" placeholder="START DATE ACCORDING TO PROFESSION" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Oateasdate">Start Date As a Teacher</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Oateasdate1"  name="Oateasdate" value="<?php echo $recordtq['ateasdate']; ?>" placeholder="START DATE AS A TEACHER" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Oresfield">Enter Responsible Fields</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Oresfield1"  name="Oresfield" value="<?php echo $deenresfield; ?>" placeholder="ENTER RESPONSIBLE FIELDS" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Oemail">Census Number</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                <input type="text" class="form-control" id = "Oemail1"  name="Oemail" value="<?php echo $deenemail; ?>" placeholder="Census Number" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                                $jjc="";
                                                $grood="";
                                                $sqlmst="SELECT * FROM teacher ";
                                                $resultmst=$conn->query($sqlmst);
                                            ?>
                                            <label for="Otid">Teacher NIC</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Otid1" name="Otid" placeholder="ENTER TEACHER NIC" required>
                                                    <?php
                                                        while($recordmst = mysqli_fetch_array($resultmst)){  
                                                            $msta=$recordmst['tid'];
                                                            $kklm=$recordtq['tid'];
                                                            $enmstan=$recordmst['nic'];
                                                            $deenmstan = base64_decode($enmstan);
                                                            if($msta==$kklm){
                                                                $jjc='selected';
                                                                $grood=$msta;
                                                            }
                                                    ?>
                                                        <option value="<?php echo $msta; ?>" <?php if($grood==$msta){echo $jjc;}?>><?php echo $deenmstan; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group"> -->
                                            <input type="hidden" class="form-control" id = "Opriid1" name="Opriid" value="<?php echo $recordtq['priid'];?>" required>
                                            <!-- <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                
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