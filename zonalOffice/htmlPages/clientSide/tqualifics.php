<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5 ){
?>

<?php
  if($_SESSION['ref']==1){
    $rth = $_SESSION['uname'];
    $derth = base64_encode($rth);
    $sqlli="SELECT * FROM school WHERE census = '$derth'";
    $resultli=$conn->query($sqlli);
    while($recordli = mysqli_fetch_array($resultli)){
      $vht = $recordli['scid'];
      $vhtnprt = $recordli['name'];
      $devhtnprt = base64_decode($vhtnprt);
    }
    }elseif($_SESSION['ref']==5){
      $rth = $_SESSION['uname'];
      $derth = base64_encode($rth);

      $sqlnu="SELECT * FROM teacher WHERE nic = '$derth' ";
      $resultnu=$conn->query($sqlnu);
      while($recordnu = mysqli_fetch_array($resultnu)){
        $fhg = $recordnu['tid'];
        $fhgnic = $recordnu['nic'];
        $defhgnic = base64_decode($fhgnic);    
      }
  }
?>

<?php
  if(isset($_POST['submit'])){
    $Ttid=$_POST['Otid'];
    $qckv = "No";
    $sqlcqo="SELECT * FROM qualification WHERE tid = $Ttid";
    $resultcqo=$conn->query($sqlcqo);
    while($recordcqo = mysqli_fetch_array($resultcqo)){
      $qckv = "avbl";
    }
    
    if(isset($_POST['Oba'])==null){
      $Tba="No";
      $Tbavar = base64_encode($Tba);
    }else{
      $Tba=$_POST['Oba'];
      $Tbavar = base64_encode($Tba);
    }
    
    if(isset($_POST['Obsc'])==null){
      $Tbsc="No";
      $Tbscvar = base64_encode($Tbsc);
    }else{
      $Tbsc=$_POST['Obsc'];
      $Tbscvar = base64_encode($Tbsc);
    }
    
    if(isset($_POST['Obscs'])==null){
      $Tbscs="No";
      $Tbscsvar = base64_encode($Tbscs);
    }else{
      $Tbscs=$_POST['Obscs'];
      $Tbscsvar = base64_encode($Tbscs);
    }
    if(isset($_POST['Obcom'])==null){
      $Tbcom="No";
      $Tbcomvar = base64_encode($Tbcom);
    }else{
      $Tbcom=$_POST['Obcom'];
      $Tbcomvar = base64_encode($Tbcom);
    }
    if(isset($_POST['Obed'])==null){
      $Tbed="No";
      $Tbedvar = base64_encode($Tbed);
    }else{
      $Tbed=$_POST['Obed'];
      $Tbedvar = base64_encode($Tbed);
    }

    if(isset($_POST['Obba'])==null){
      $Tbba="No";
      $Tbbavar = base64_encode($Tbba);
    }else{
      $Tbba=$_POST['Obba'];
      $Tbbavar = base64_encode($Tbba);
    }

    if(isset($_POST['Oother'])==null){
      $Tother="No";
      $Tothervar = base64_encode($Tother);
    }else{
      $Tother=$_POST['Oother'];
      $Tothervar = base64_encode($Tother);
    }
    
    if(isset($_POST['Opgde'])==null){
      $Tpgde="No";
      $Tpgdevar = base64_encode($Tpgde);
    }else{
      $Tpgde=$_POST['Opgde'];
      $Tpgdevar = base64_encode($Tpgde);
    }

    if(isset($_POST['Opgdem'])==null){
      $Tpgdem="No";
      $Tpgdemvar = base64_encode($Tpgdem);
    }else{
      $Tpgdem=$_POST['Opgdem'];
      $Tpgdemvar = base64_encode($Tpgdem);
    }

    if(isset($_POST['Opgdea'])==null){
      $Tpgdea="No";
      $Tpgdeavar = base64_encode($Tpgdea);
    }else{
      $Tpgdea=$_POST['Opgdea'];
      $Tpgdeavar = base64_encode($Tpgdea);
    }
    
    if(isset($_POST['OoPther'])==null){
      $ToPther="No";
      $ToPthervar = base64_encode($ToPther);
    }else{
      $ToPther=$_POST['OoPther'];
      $ToPthervar = base64_encode($ToPther);
    }
    
    if(isset($_POST['Oma'])==null){
      $Tma="No";
      $Tmavar = base64_encode($Tma);
    }else{
      $Tma=$_POST['Oma'];
      $Tmavar = base64_encode($Tma);
    }

    if(isset($_POST['Omsc'])==null){
      $Tmsc="No";
      $Tmscvar = base64_encode($Tmsc);
    }else{
      $Tmsc=$_POST['Omsc'];
      $Tmscvar = base64_encode($Tmsc);
    }

    if(isset($_POST['Omed'])==null){
      $Tmed="No";
      $Tmedvar = base64_encode($Tmed);
    }else{
      $Tmed=$_POST['Omed'];
      $Tmedvar = base64_encode($Tmed);
    }
 
    if(isset($_POST['Omphil'])==null){
      $Tmphil="No";
      $Tmphilvar = base64_encode($Tmphil);
    }else{
      $Tmphil=$_POST['Omphil'];
      $Tmphilvar = base64_encode($Tmphil);
    }
    
    if(isset($_POST['Ophd'])==null){
      $Tphd="No";
      $Tphdvar = base64_encode($Tphd);
    }else{
      $Tphd=$_POST['Ophd'];
      $Tphdvar = base64_encode($Tphd);
    }
    if($qckv == "No"){
      $add="INSERT INTO qualification(tid,ba,bsc,bscs,bcom,bed,bba,other,pgde,pgdem,pgdea,oPther,ma,msc,med,mphil,phd)VALUES('$Ttid','$Tbavar','$Tbscvar','$Tbscsvar','$Tbcomvar','$Tbedvar','$Tbbavar','$Tothervar','$Tpgdevar','$Tpgdemvar','$Tpgdeavar','$ToPthervar','$Tmavar','$Tmscvar','$Tmedvar','$Tmphilvar','$Tphdvar')";
    
    if($conn-> query($add)==TRUE){
?>

<Script>
    alert("Qualification Details Added!");
    location='tqualifics.php';
</Script>

<?php
      exit();
      }
    }else{
?>
<script>
  alert("Already Added!");
  location='tqualifics.php';
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
    <title>School</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../AdminPannel/cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
            require_once '../AdminPannel/menu/topNavigation/Teacher/TeacherlistPrinTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){

                require_once '../AdminPannel/menu/Principal/teacherlistPrinMenu.php';

            }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){

                require_once '../AdminPannel/menu/Teacher/teacherlistMenu.php';

            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                    <div class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="qualifiList.php"><button style="width:150px;" class="btn btn-block btn-primary">View Qualification</button></a>
                    </div>
                    <div style="float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="earlyServicecs.php"><button class="btn btn-block ">Step 7</button></a>
                    </div>
                    <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Qualification Details</em></strong></h1> <br><br>
                <div class="row">
                    <div class="col-md-6">
                        <div style="background-color:#d6ddff;" class="white-box">
                        <h3 class="box-title m-b-0">Qualification Details Form</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"></p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                        <div align="left">
                                            <select class="form-control" id = "Otid1" name="Otid" required>
                                            <?php if($_SESSION['ref']==1){ ?>
                                            <option value="0" selected>-Select NIC-</option>
                                            <?php
                                            $sqltcr="SELECT * FROM teacher WHERE scid = $vht && tid NOT IN (SELECT tid FROM ofisign);";
                                            $resulttcr=$conn->query($sqltcr);
                                                while($recordtcr = mysqli_fetch_array($resulttcr)){  
                                                    $tcrid=$recordtcr['tid'];
                                                    $tcrnam=$recordtcr['nic'];
                                                    $detcrnam = base64_decode($tcrnam);
                                            ?>
                                                <option value="<?php echo $tcrid; ?>" ><?php echo $detcrnam; ?></option>
                                            <?php
                                                }
                                            }elseif($_SESSION['ref']==5){
                                            ?>
                                                <option value="<?php echo $fhg; ?>" selected><?php echo $defhgnic; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <h3 class="box-title m-b-0">Degree</h3>
                                            <!-- <p class="text-muted font-13 m-b-30">  </p> -->
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Oba1"  name="Oba" value="BA">
                                                <label style="color:#000000;" for="Oba1">&nbspBA </label>
                                            </div>

                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Obsc1"  name="Obsc" value="BSc(Mgt)">
                                                <label style="color:#000000;" for="Obsc1">&nbspBSc(Mgt) </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Obscs1"  name="Obscs" value="BSc(Science)">
                                                <label style="color:#000000;" for="Obscs1">&nbspBSc(Science) </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Obcom1"  name="Obcom" value="BCom">
                                                <label style="color:#000000;" for="Obcom1">&nbspBCom </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Obed1"  name="Obed" value="BEd">
                                                <label style="color:#000000;" for="Obed1">&nbspBEd </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Obba1"  name="Obba" value="BBA">
                                                <label style="color:#000000;" for="Obba1">&nbspBBA </label>
                                            </div>
                                        </div>
                                        <div align="left" >
                                            <input type="text" class="form-control" id = "Oother1"  name="Oother" placeholder="OTHER" >
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <h3 style="width:250px;" class="box-title m-b-0" >Post Degree Diploma</h3>
                                            <!-- <p class="text-muted font-13 m-b-30">  </p> -->
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Opgde1"  name="Opgde" value="PGDE">
                                                <label style="color:#000000;" for="Opgde1">&nbspPGDE </label>
                                            </div>

                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "pgdem1"  name="pgdem" value="PGDEM">
                                                <label style="color:#000000;" for="pgdem1">&nbspPGDEM </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "pgdea1"  name="Opgdea" value="PGDEA">
                                                <label style="color:#000000;" for="pgdea1">&nbspPGDEA </label>
                                            </div>
                                        </div>
                                        <div align="left">
                                            <input type="text" class="form-control" id = "OoPther1"  name="OoPther" placeholder="OTHER" >
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <h3 style="width:250px;" class="box-title m-b-0" >Post Degree</h3>
                                            <!-- <p class="text-muted font-13 m-b-30">  </p> -->
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Oma1"  name="Oma" value="MA">
                                                <label style="color:#000000;" for="Oma1">&nbspMA </label>
                                            </div>

                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "msc1"  name="msc" value="MSc">
                                                <label style="color:#000000;" for="msc1">&nbspMSc </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Omed1"  name="Omed" value="MEd">
                                                <label style="color:#000000;" for="Omed1">&nbspMEd </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Omphil1"  name="Omphil" value="MPhil">
                                                <label style="color:#000000;" for="Omphil1">&nbspMPhil </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Ophd1"  name="Ophd" value="phd">
                                                <label style="color:#000000;" for="Ophd1">&nbspphd </label>
                                            </div>
                                        </div>
                                        <br><br><br><br><br><br><br><br><br><br>
                                        <div align="right">
                                            <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="SUBMIT">
                                            <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                                        </div>
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
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="../AdminPannel/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="../AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
}else{
  echo "Please Login!";
}
?>