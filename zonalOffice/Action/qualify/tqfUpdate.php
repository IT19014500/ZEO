<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){

?>

<?php
  $id=$_GET['id'];
  $sql3="SELECT * FROM qualification where tid = $id";
  $result3=$conn->query($sql3);

?>

<?php
    if(isset($_POST['submit'])){

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

    if($_SESSION['ref']==1){
        $update="UPDATE qualification SET ba='$Tbavar',bsc='$Tbscvar',bscs='$Tbscsvar',bcom='$Tbcomvar',bed='$Tbedvar',bba='$Tbbavar',other='$Tothervar',pgde='$Tpgdevar',pgdem='$Tpgdemvar',pgdea='$Tpgdeavar',oPther='$ToPthervar',ma='$Tmavar',msc='$Tmscvar',med='$Tmedvar',mphil='$Tmphilvar',phd='$Tphdvar' WHERE tid=$id";
    }elseif($_SESSION['ref']==5){
        $update="INSERT INTO qualificationtmp(tid,ba,bsc,bscs,bcom,bed,bba,other,pgde,pgdem,pgdea,oPther,ma,msc,med,mphil,phd)VALUES('$id','$Tbavar','$Tbscvar','$Tbscsvar','','$Tbedvar','$Tbbavar','$Tothervar','$Tpgdevar','$Tpgdemvar','$Tpgdeavar','$ToPthervar','$Tmavar','$Tmscvar','$Tmedvar','$Tmphilvar','$Tphdvar')";
    }

    if($conn-> query($update)==TRUE){
?>
<Script>

<?php 
    if($_SESSION['ref']==1){ 
?>
    alert("Qualification Details Updated!");
<?php 
    }elseif($_SESSION['ref']==5){
?>
    alert("Qualification Details will be Updated After Zonal Head Approval!");
<?php
    } 
?>
    location= '../../htmlPages/clientSide/qualifiList.php';
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
    <title>School</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
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
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){

                require_once '../../htmlPages/AdminPannel/menu/actionFolder/teacherlistPrinActionMenu.php';

            }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){

                require_once '../../htmlPages/AdminPannel/menu/actionFolder/teacherlistActionMenu.php';
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href = '../../htmlPages/clientSide/qualifiList.php'><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update Qualification Details</em></strong></h1><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Modify</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"> comment </p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                        <?php
                                            while($record3 = mysqli_fetch_array($result3)){
                                            $enba = $record3['ba'];
                                            $enbsc = $record3['bsc'];
                                            $enbscs = $record3['bscs'];
                                            $enbcom = $record3['bcom'];
                                            $enbed = $record3['bed'];
                                            $enbba = $record3['bba'];
                                            $enother = $record3['other'];
                                            $enpgde = $record3['pgde'];
                                            $enpgdem = $record3['pgdem'];
                                            $enpgdea = $record3['pgdea'];
                                            $enoPther = $record3['oPther'];
                                            $enma = $record3['ma'];
                                            $enmsc = $record3['msc'];
                                            $enmed = $record3['med'];
                                            $enmphil = $record3['mphil'];
                                            $enphd = $record3['phd'];

                                            $deenba = base64_decode($enba);
                                            $deenbsc = base64_decode($enbsc);
                                            $deenbscs = base64_decode($enbscs);
                                            $deenbcom = base64_decode($enbcom);
                                            $deenbed = base64_decode($enbed);
                                            $deenbba = base64_decode($enbba);
                                            $deenother = base64_decode($enother);
                                            $deenpgde = base64_decode($enpgde);
                                            $deenpgdem = base64_decode($enpgdem);
                                            $deenpgdea = base64_decode($enpgdea);
                                            $deenoPther = base64_decode($enoPther);
                                            $deenma = base64_decode($enma);
                                            $deenmsc = base64_decode($enmsc);
                                            $deenmed = base64_decode($enmed);
                                            $deenmphil = base64_decode($enmphil);
                                            $deenphd = base64_decode($enphd);            
                                        ?>
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <h3 class="box-title m-b-0">Degree</h3>
                                            <!-- <p class="text-muted font-13 m-b-30">  </p> -->
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Oba1"  name="Oba" value="BA" <?php if($deenba=="BA"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="Oba1">&nbspBA </label>
                                            </div>

                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Obsc1"  name="Obsc" value="BSc(Mgt)" <?php if($deenbsc=="BSc(Mgt)"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="Obsc1">&nbspBSc(Mgt) </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Obscs1"  name="Obscs" value="BSc(Science)" <?php if($deenbscs=="BSc(Science)"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="Obscs1">&nbspBSc(Science) </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Obcom1"  name="Obcom" value="BCom" <?php if($deenbcom=="BCom"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="Obcom1">&nbspBCom </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Obed1"  name="Obed" value="BEd" <?php if($deenbed=="BEd"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="Obed1">&nbspBEd </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Obba1"  name="Obba" value="BBA" <?php if($deenbba=="BBA"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="Obba1">&nbspBBA </label>
                                            </div>
                                            
                                        </div>
                                        <div align="left" style="margin-left:15px;width:350px;">
                                            <input type="text" class="form-control" id = "Oother1"  name="Oother" placeholder="OTHER" >
                                        </div>


                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <h3 style="width:250px;" class="box-title m-b-0" >Post Degree Diploma</h3>
                                            <!-- <p class="text-muted font-13 m-b-30">  </p> -->
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Opgde1"  name="Opgde" value="PGDE" <?php if($deenpgde=="PGDE"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="Opgde1">&nbspPGDE </label>
                                            </div>

                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Opgdem1"  name="Opgdem" value="PGDEM" <?php if($deenpgdem=="PGDEM"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="pgdem1">&nbspPGDEM </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Opgdea1"  name="Opgdea" value="PGDEA" <?php if($deenpgdea=="PGDEA"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="pgdea1">&nbspPGDEA </label>
                                            </div>
                                        </div>
                                        <div align="left" style ="margin-left:15px;width:350px;">
                                            <input type="text" class="form-control" id = "OoPther1"  name="OoPther" placeholder="OTHER" value="<?php echo $deenoPther; ?>" >
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <h3 style="width:250px;" class="box-title m-b-0" >Post Degree</h3>
                                            <!-- <p class="text-muted font-13 m-b-30">  </p> -->
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Oma1"  name="Oma" value="MA" <?php if($deenma=="MA"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="Oma1">&nbspMA </label>
                                            </div>

                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Omsc1"  name="Omsc" value="MSc" <?php if($deenmsc=="MSc"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="msc1">&nbspMSc </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Omed1"  name="Omed" value="MEd" <?php if($deenmed=="MEd"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="Omed1">&nbspMEd </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Omphil1"  name="Omphil" value="MPhil" <?php if($deenmphil=="MPhil"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="Omed1">&nbspMPhil </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Ophd1"  name="Ophd" value="phd" <?php if($deenphd=="phd"){ echo "Checked";}?>>
                                                <label style="color:#000000;" for="Omed1">&nbspphd </label>
                                            </div>
                                        </div>
                                        
                                        <br><br><br><br><br><br><br><br><br><br>
                                        <?php
                                            }
                                        ?>
                                        <div style="float:right;">
                                            <input style="height:50px;" type="submit" id = "submit" name = "submit" class="btn btn-success waves-effect waves-light m-r-10" value="UPDATE">
                                            <input style="height:50px;" type="reset" class="btn btn-inverse waves-effect waves-light" id = "reset" value="RESET">
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
    <script src="../../htmlPages/AdminPannel/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

    <!--Style Switcher -->
    <script src="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
}else{
  echo "Please Login!";
}
?>