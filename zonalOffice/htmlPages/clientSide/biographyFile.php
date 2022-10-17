<?php
try{
  include('../../connection.php');
  session_start();
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<?php
try{
  $prtid=$_GET['proli'];
  $stckp="nmode";
  
  $balka = "Yes";

  if(isset($_GET['modid'])){
    $stckp = $_GET['modid'];
  }

  $sqljao="SELECT * FROM teacher where tid = $prtid && tid NOT IN (SELECT tid FROM ofisign);";
  $resultjao=$conn->query($sqljao);
  while($recordjao = mysqli_fetch_array($resultjao)){
    $balka = "No";
  }
        
  $jabus = "No";
        
  $sqljpl="SELECT * FROM teacher where tid = $prtid && tid IN (SELECT tid FROM teachertmp);";
  $resultjpl=$conn->query($sqljpl);
  while($recordjpl = mysqli_fetch_array($resultjpl)){
    $jabus = "Yes";
  }

  $debtspnm = "";
  $debtspscl = "";
  $denpsgdnm = "";
  $dtytkd = "";
  $demtsusnm = "";
  $descanm = "";
  $destrpnm = "";
  $decsdnm = "";
  $desbtrnm = "";
  $declnunm = "";
  $decldtlnm = "";
  $detstnm = "";
  $descjnme = "";
  $deponbm = "";
  $dezbcm = "";

  $desgrdnm = "";
  $decprnm = "";
  $demdinm = "";
  $depsinm = "";
  $descanm = "";
  $destrpnm = "";
  $pldt = "";
  $depclnm = "";

  $deprefs = "";
  $ptes = "";
  $ppros = "";

  $debname = "";
  $debaddress = "";
  $debnic = "";
  $debtp = "";
  $debwhtap = "";
  $debgdr = "";
  $defbname = "";
  $debemail = "";

  $denpsgdnm = "";
  $dtytkd = "";
  $demtsusnm = "";
  $decsdnm = "";
  $desbtrnm = "";
  $declnunm = "";
  $decldtlnm = "";

  $desudssnm = "";
  $desfcnm = "";
  $destgnm = "";
  $decnpnm = "";
  $declklnm = "";
  $cpri = "";

  $desbhn = "";
  $decgfnm = "";
  $desjnnm = "";

  $deedqba = "";
  $deedqbscm = "";
  $deedqbabscs = "";
  $deedqbed = "";
  $deedqbba = "";
  $deedqoth = "";
  $deedqpgde = "";
  $deedqpgdem = "";
  $deedqpgdea = "";
  $deedqsecoth = "";
  $deedqma = "";
  $deedqmsc = "";
  $deedqmed = "";
  $deedqmphil = "";
  $deedqphd = "";

  $rth = $_SESSION['uname'];
  $derth = base64_encode($rth);
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){
    $vhtscid = 0;
    $sql3="SELECT * FROM teacher where nic = '$derth'";
    $result3=$conn->query($sql3);
    while($record3 = mysqli_fetch_array($result3)){
      $vhtscid = $record3['scid'];
    }
    $sqlli="SELECT * FROM school WHERE scid = '$vhtscid'";
    }else{
      $sqlli="SELECT * FROM school WHERE census = '$derth'";
    }
    $resultli=$conn->query($sqlli);
    while($recordli = mysqli_fetch_array($resultli)){
      $vhtnprt = $recordli['name'];
      $devhtnprt = base64_decode($vhtnprt);
    }
}catch(Exception $e) {
    echo "Database Reading Fail!";
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
    <title>ZEO BIO</title>
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
    <!-- school fetch -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type=text/javascript src="../bootstrap/js/schoolFetch.js"></script>
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
                require_once '../AdminPannel/menu/topNavigation/Teacher/TeacherlistPrinTPN.php';
            }catch(Exception $e) {
                echo "Top Navigation Load Fail!";
            }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            try{
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){
        ?>
        <?php
                    require_once '../AdminPannel/menu/Principal/teacherlistPrinMenu.php';
        ?>
        <?php
                }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){
        ?>
        <?php
                    require_once '../AdminPannel/menu/Teacher/teacherlistMenu.php';
        ?>
        <?php
                }
            }catch(Exception $e) {
                echo "Navigation Load Fail!";
            }
        ?>
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href="teacherlist.php"><button class="btn btn-block btn-primary">Back</button></a>
                </div><br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Profile</em></strong></h1><br>
                <div class="row">
                        <div class="col-md-6">
                            <div style="background-color:#d6ddff;" class="white-box">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                            <?php
                                            try{
                                                $msts = 0;
                                                $plcat = 0;
                                                $bplsid = 0;
                                                $bmeid = 0;
                                                $bcpro = 0;

                                                $sqlbd="SELECT * FROM teacher where tid = $prtid";
                                                $resultbd=$conn->query($sqlbd);
                                                while($recordbd = mysqli_fetch_array($resultbd)){
                                                    $bname = $recordbd['fullname'];
                                                    $baddress = $recordbd['addressT'];
                                                    $bnic = $recordbd['nic'];
                                                    $btp = $recordbd['tp'];
                                                    $bwhtap = $recordbd['wtp'];
                                                    $bgdr = $recordbd['sex'];
                                                    $msts = $recordbd['mstatus'];
                                                    $fbname = $recordbd['fbName'];
                                                    $bemail = $recordbd['eMail'];
                                                    $plcat = $recordbd['placement'];
                                                    $pldt = $recordbd['pldate'];
                                                    $bplsid = $recordbd['suID'];
                                                    $bmeid = $recordbd['pllang'];
                                                    $bcpro = $recordbd['cpro'];


                                                    if($msts!=0){
                                                        $sqlmts="SELECT * FROM mstatus where mrid = $msts";
                                                        $resultmts=$conn->query($sqlmts);
                                                        while($recordmts = mysqli_fetch_array($resultmts)){
                                                            $mstnm = $recordmts['status'];
                                                            $demstnm = base64_decode($mstnm);
                                                        }
                                                        
                                                    }
                                                    if($plcat != 0){
                                                        $sqlpcl="SELECT * FROM plcategory where plid = $plcat";
                                                        $resultpcl=$conn->query($sqlpcl);
                                                        while($recordpcl = mysqli_fetch_array($resultpcl)){
                                                        $pclnm = $recordpcl['name'];
                                                        $depclnm = base64_decode($pclnm);
                                                        }
                                                    }
                                                    if($bplsid!=0){
                                                        $sqlpsi="SELECT * FROM subject where suID = $bplsid";
                                                        $resultpsi=$conn->query($sqlpsi);
                                                        while($recordpsi = mysqli_fetch_array($resultpsi)){
                                                            $psinm = $recordpsi['name'];
                                                            $depsinm = base64_decode($psinm);
                                                            $pcatgi = $recordpsi['caid'];
                                                            $pstrei = $recordpsi['ssid'];

                                                            $sqlsca="SELECT * FROM subcategory where caid = $pcatgi";
                                                            $resultsca=$conn->query($sqlsca);
                                                            while($recordsca = mysqli_fetch_array($resultsca)){
                                                                $scanm = $recordsca['name'];
                                                                $descanm = base64_decode($scanm);
                                                            }

                                                            $sqlstrp="SELECT * FROM substream where ssid = $pstrei";
                                                            $resultstrp=$conn->query($sqlstrp);
                                                            while($recordstrp = mysqli_fetch_array($resultstrp)){
                                                                $strpnm = $recordstrp['name'];
                                                                $destrpnm = base64_decode($strpnm);
                                                            }
                                                        }
                                                    }
                                                    if($bmeid!=0){
                                                        $sqlmdi="SELECT * FROM languages where lid = $bmeid";
                                                        $resultmdi=$conn->query($sqlmdi);
                                                        while($recordmdi = mysqli_fetch_array($resultmdi)){
                                                        $mdinm = $recordmdi['name'];
                                                        $demdinm = base64_decode($mdinm);
                                                        }
                                                    }
                                                    if($bcpro!=0){
                                                        $sqlcpr="SELECT * FROM profession where proid = $bcpro";
                                                        $resultcpr=$conn->query($sqlcpr);
                                                        while($recordcpr = mysqli_fetch_array($resultcpr)){
                                                            $cprnm = $recordcpr['name'];
                                                            $decprnm = base64_decode($cprnm);
                                                        }
                                                    }

                                                        $debname = base64_decode($bname);
                                                        $debaddress = base64_decode($baddress);
                                                        $debnic = base64_decode($bnic);
                                                        $debtp = base64_decode($btp);
                                                        $debwhtap = base64_decode($bwhtap);
                                                        $debgdr = base64_decode($bgdr);
                                                        $defbname = base64_decode($fbname);
                                                        $debemail = base64_decode($bemail);
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Connection Fail!";
                                                }
                                            ?>
                                            
                                        <h3 class="box-title m-b-0">School - <?php echo $devhtnprt;?></h3><br>
                                            <?php
                                                try{
                                                    if($jabus == "No" && ($balka=="No" || $_SESSION['ref']==5)){
                                            ?>
                                                <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                    <a href="../../Action/teacher/bUpdate.php?id=<?php echo $prtid; ?>"><span class="btn btn-block btn-primary">Edit</span></a>
                                                </div>
                                                <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                    <a href="qualificationCustomer.php"><span class="btn btn-block btn-success">Add</span></a>
                                                </div><br><br><br>
                                            <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Connection Fail!";
                                                }
                                            ?>
                                        <form class="form-horizontal">
                                            <?php
                                                try{
                                            ?>
                                                    <div class="form-group">
                                                        <label for="nme" style="color:#000000;" class="col-sm-3 control-label">Name with Initials</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="nme1" name="nme" value="<?php echo $debname; ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pma" style="color:#000000;" class="col-sm-3 control-label">Permenent Address</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="pma1" name="pma" value="<?php echo $debaddress; ?>"> </div>
                                                        </div>
                                                    </div><div class="form-group">
                                                        <label for="nic" style="color:#000000;" class="col-sm-3 control-label">NIC</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="nic1" name="nic" value="<?php echo $debnic; ?>"> </div>
                                                        </div>
                                                    </div><div class="form-group">
                                                        <label for="tpn" style="color:#000000;" class="col-sm-3 control-label">Telephone</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="tpn1" name="tpn" value="<?php echo $debtp; ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="wtp" style="color:#000000;" class="col-sm-3 control-label">WhatsApp</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="wtp1" name="wtp" value="<?php echo $debwhtap; ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gdr" style="color:#000000;" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="gdr1" name="gdr" value="<?php echo $debgdr; ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mts" style="color:#000000;" class="col-sm-3 control-label">Marital Status</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="mts1" name="mts" value="<?php echo $demstnm; ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fbn" style="color:#000000;" class="col-sm-3 control-label">Facebook Name</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="fbn1" name="fbn" value="<?php echo $defbname; ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ema" style="color:#000000;" class="col-sm-3 control-label">E-mail Address</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="ema1" name="ema" value="<?php echo $debemail; ?>"> </div>
                                                        </div>
                                                    </div><br>
                                                    <h6 style="color:#000000;" class="m-b-30 font-13">Current Service Details</h6>
                                                    <div class="form-group">
                                                        <label for="csdp" style="color:#000000;" class="col-sm-3 control-label">Profession</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="csdp1" name="csdp" value="<?php echo $decprnm; ?>"> </div>
                                                        </div>
                                                    </div><br>
                                            <?php
                                                }catch(Exception $e) {
                                                    echo "Basic Form Fail!";
                                                }
                                            ?>
                                            <h6 style="color:#000000;" class="m-b-30 font-13"> Details about Teaching </h6>
                                            <?php
                                                try{
                                                    $sqltdta="SELECT * FROM nptteach where tid = $prtid";
                                                    $resulttdta=$conn->query($sqltdta);
                                                }catch(Exception $e) {
                                                    echo "Teaching data reading Fail!";
                                                }
                                            ?>
                                            <?php
                                            try{
                                                $balsa = "Yes";
                                                if($_SESSION['ref']==5){
                                                    $balsa = "No";
                                                }
                    
                                                $sqlfdr="SELECT * FROM nptteach where tid = $prtid && tid NOT IN (SELECT tid FROM ofisign);";
                                                $resultfdr=$conn->query($sqlfdr);
                                                while($recordfdr = mysqli_fetch_array($resultfdr)){
                                                    $balsa = "No";
                                                }
                                            ?>
                                                <?php
                                                    if($balsa=="No"){
                                                ?>
                                                <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                    <a href="nprteachcs.php"><label class="btn btn-block btn-success">Add</label></a>
                                                </div>
                                                <br><br><br>
                                                <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Action setup Fail!";
                                                }
                                                ?>
                                            <div class="table-responsive">
                                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                                    <caption style="color:#000000;">Subjects</caption>
                                                    <thead>
                                                        <tr>
                                                            <?php
                                                            try{
                                                                if($balsa=="No"){
                                                            ?>
                                                                    <th>Action</th>
                                                            <?php
                                                                }
                                                                }catch(Exception $e) {
                                                                    echo "Connection Fail!";
                                                                }
                                                            ?>
                                                            <th>Subject</th>
                                                            <th>Class</th>
                                                            <th>Periods</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <!-- <th>Subject</th>
                                                            <th>Class</th>
                                                            <th>Periods</th> -->
                                                        </tr> 
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                            try{
                                                                while($recordtdta = mysqli_fetch_array($resulttdta)){
                                                                    $nbpti = $recordtdta['nptid'];
                                                                    $sudti = $recordtdta['suID'];
                                                                    $cldi = $recordtdta['owgrade'];
                                                                    $cpri = $recordtdta['period'];

                                                                    $sqlsuds="SELECT * FROM subject where suID = $sudti";
                                                                    $resultsuds=$conn->query($sqlsuds);
                                                                    while($recordsuds = mysqli_fetch_array($resultsuds)){
                                                                    $sudssnm = $recordsuds['name'];
                                                                    $desudssnm = base64_decode($sudssnm);

                                                                    $sudscat = $recordsuds['caid'];
                                                                    $sudstre = $recordsuds['ssid'];

                                                                    $sqlsfc="SELECT * FROM subcategory where caid = $sudscat";
                                                                    $resultsfc=$conn->query($sqlsfc);
                                                                    while($recordsfc = mysqli_fetch_array($resultsfc)){
                                                                        $sfcnm = $recordsfc['name'];
                                                                        $desfcnm = base64_decode($sfcnm);
                                                                    }

                                                                    $sqlstg="SELECT * FROM substream where ssid = $sudstre";
                                                                    $resultstg=$conn->query($sqlstg);
                                                                    while($recordsstg = mysqli_fetch_array($resultstg)){
                                                                        $stgnm = $recordsstg['name'];
                                                                        $destgnm = base64_decode($stgnm);
                                                                    }
                                                                    }

                                                                    $sqlclk="SELECT * FROM classtbllet where cleid = $cldi";
                                                                    $resultclk=$conn->query($sqlclk);
                                                                    while($recordclk = mysqli_fetch_array($resultclk)){
                                                                    $clkcid = $recordclk['clid'];
                                                                    $clklnm = $recordclk['letter'];
                                                                    $declklnm = base64_decode($clklnm);

                                                                    $sqlcnp="SELECT * FROM classt where clid = $clkcid";
                                                                    $resultcnp=$conn->query($sqlcnp);
                                                                    while($recordcnp = mysqli_fetch_array($resultcnp)){
                                                                        $cnpnm = $recordcnp['class'];
                                                                        $decnpnm = base64_decode($cnpnm);

                                                                    }
                                                                }
                                                        ?>
                                                                <tr style="color:#000000;background-color:#ffffff;">
                                                                    <?php
                                                                        if($balsa=="No"){
                                                                    ?>
                                                                    <!-- style="width:150px;background-color:#000000;color:#ffffff;" -->
                                                                    <td><a style="color:#cf0e0e;" href="../../Action/npteaching/nptUpdate.php?id=<?php echo $recordtdta['nptid']; ?>"><label class = "btn btn-primary">Edit</label></a></td>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <td><?php echo $desudssnm." ( ".$desfcnm." - ".$destgnm." )" ?></td>
                                                                    <td><?php echo $decnpnm." - ".$declklnm ?></td>
                                                                    <td><?php echo $cpri; ?></td>
                                                                </tr>
                                                        <?php
                                                                }
                                                            }catch(Exception $e) {
                                                                echo "teaching Details Fail!";
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php
                                                try{
                                                    $balma = "Yes";
                                                    if($_SESSION['ref']==5){
                                                        $balma = "No";
                                                    }
                    
                                                    $sqlby="SELECT * FROM qualification where tid = $prtid && tid NOT IN (SELECT tid FROM ofisign);";
                                                    $resultby=$conn->query($sqlby);
                                                    while($recordby = mysqli_fetch_array($resultby)){
                                                        $balma = "No";
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Qualification Reading Fail!";
                                                }
                                            ?>
                                            <br><br>
                                            <h6 style="color:#000000;" class="m-b-30 font-13"> Educational Qualifications </h6>
                                            <?php
                                                try{
                                                    if($balma=="No"){
                                            ?>
                                                    <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                        <a href="tqualifics.php"><label class="btn btn-block btn-success">Add</label></a>
                                                    </div><br><br><br>
                                            <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Qualification Button Loading Fail!";
                                                }
                                            ?>
                                            <div class="table-responsive">
                                                <table id="example30" class="display nowrap" cellspacing="0" width="100%">
                                                    <caption style="color:#000000;">Qualifications</caption>
                                                    <thead>
                                                        <tr>
                                                            <?php
                                                                try{
                                                                    if($balma=="No"){
                                                            ?>
                                                                        <th>Action</th>
                                                            <?php
                                                                    }
                                                                }catch(Exception $e) {
                                                                    echo "Qualification Details Loading Fail!";
                                                                }
                                                            ?>
                                                            <th>BA</th>
                                                            <th>BSc(Mgt)</th>
                                                            <th>BSc(Science)</th>
                                                            <th>BCom</th>
                                                            <th>BEd</th>
                                                            <th>BBA</th>
                                                            <th>Other Degree</th>
                                                            <th>PGDE</th>
                                                            <th>PGDEM</th>
                                                            <th>PGDEA</th>
                                                            <th>Other</th>
                                                            <th>MA</th>
                                                            <th>MSc</th>
                                                            <th>MEd</th>
                                                            <th>MPhil</th>
                                                            <th>phd</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <!-- <th>BA</th>
                                                            <th>BSc(Mgt)</th>
                                                            <th>BSc(Science)</th>
                                                            <th>BCom</th>
                                                            <th>BEd</th>
                                                            <th>BBA</th>
                                                            <th>Other Degree</th>
                                                            <th>PGDE</th>
                                                            <th>PGDEM</th>
                                                            <th>PGDEA</th>
                                                            <th>Other</th>
                                                            <th>MA</th>
                                                            <th>MSc</th>
                                                            <th>MEd</th>
                                                            <th>MPhil</th>
                                                            <th>phd</th> -->
                                                        </tr> 
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                            try{
                                                                $sqledq="SELECT * FROM qualification where tid = $prtid";
                                                                $resultedq=$conn->query($sqledq);
                                                                while($recordedq = mysqli_fetch_array($resultedq)){
                                                                    $edqba = $recordedq['ba'];
                                                                    $edqbscm = $recordedq['bsc'];
                                                                    $edqbabscs = $recordedq['bscs'];
                                                                    $edqbcom = $recordedq['bcom'];
                                                                    $edqbed = $recordedq['bed'];
                                                                    $edqbba = $recordedq['bba'];
                                                                    $edqoth = $recordedq['other'];
                                                                    $edqpgde = $recordedq['pgde'];
                                                                    $edqpgdem = $recordedq['pgdem'];
                                                                    $edqpgdea = $recordedq['pgdea'];
                                                                    $edqsecoth = $recordedq['oPther'];
                                                                    $edqma = $recordedq['ma'];
                                                                    $edqmsc = $recordedq['msc'];
                                                                    $edqmed = $recordedq['med'];
                                                                    $edqmphil = $recordedq['mphil'];
                                                                    $edqphd = $recordedq['phd'];

                                                                    $deedqba = base64_decode($edqba);
                                                                    $deedqbscm = base64_decode($edqbscm);
                                                                    $deedqbabscs = base64_decode($edqbabscs);
                                                                    $deedqbcom = base64_decode($edqbcom);
                                                                    $deedqbed = base64_decode($edqbed);
                                                                    $deedqbba = base64_decode($edqbba);
                                                                    $deedqoth = base64_decode($edqoth);
                                                                    $deedqpgde = base64_decode($edqpgde);
                                                                    $deedqpgdem = base64_decode($edqpgdem);
                                                                    $deedqpgdea = base64_decode($edqpgdea);
                                                                    $deedqsecoth = base64_decode($edqsecoth);
                                                                    $deedqma = base64_decode($edqma);
                                                                    $deedqmsc = base64_decode($edqmsc);
                                                                    $deedqmed = base64_decode($edqmed);
                                                                    $deedqmphil = base64_decode($edqmphil);
                                                                    $deedqphd = base64_decode($edqphd);
                                                        ?>
                                                        <tr style="color:#000000;background-color:#ffffff;">
                                                            <?php
                                                                if($balma=="No"){
                                                            ?>
                                                                    <td><a href="../../Action/qualify/tqfUpdate.php?id=<?php echo $prtid; ?>">&nbsp&nbsp<label class = "btn btn-primary">EDIT</label></a></td>
                                                            <?php
                                                                }
                                                            ?>
                                                                    <td><?php echo $deedqba;?></td>
                                                                    <td><?php echo $deedqbscm;?></td>
                                                                    <td><?php echo $deedqbabscs;?></td>
                                                                    <td><?php echo $deedqbcom;?></td>
                                                                    <td><?php echo $deedqbed;?></td>
                                                                    <td><?php echo $deedqbba;?></td>
                                                                    <td><?php echo $deedqoth;?></td>
                                                                    <td><?php echo $deedqpgde;?></td>
                                                                    <td><?php echo $deedqpgdem;?></td>
                                                                    <td><?php echo $deedqpgdea;?></td>
                                                                    <td><?php echo $deedqsecoth;?></td>
                                                                    <td><?php echo $deedqma;?></td>
                                                                    <td><?php echo $deedqmsc;?></td>
                                                                    <td><?php echo $deedqmed;?></td>
                                                                    <td><?php echo $deedqmphil;?></td>
                                                                    <td><?php echo $deedqphd;?></td>
                                                        </tr>
                                                        <?php
                                                                }
                                                            }catch(Exception $e) {
                                                                echo "Qualification Table Loading Fail!";
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div><br>
                                            <h6 style="color:#000000;" class="m-b-30 font-13"> Early Service Details </h6>
                                            <?php
                                                try{
                                                    $balso = "Yes";
                                                    if($_SESSION['ref']==5){
                                                        $balso = "No";
                                                    }
                    
                                                    $sqlfio="SELECT * FROM erservice where tid = $prtid && tid NOT IN (SELECT tid FROM ofisign);";
                                                    $resultfio=$conn->query($sqlfio);
                                                    while($recordfio = mysqli_fetch_array($resultfio)){
                                                        $balso = "No";
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Early Service Details checking Fail!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                                    if($balso=="No"){
                                            ?>
                                                        <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                            <a href="earlyServicecs.php"><label class="btn btn-block btn-success">Add</label></a>
                                                        </div><br><br><br>
                                            <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Early Service Button Loading Fail!";
                                                }
                                            ?>
                                            <div class="table-responsive">
                                                <table id="example32" class="display nowrap" cellspacing="0" width="100%">
                                                    <caption style="color:#000000;">Service details</caption>
                                                    <thead>
                                                        <tr>
                                                            <?php
                                                                try{
                                                                    if($balso=="No"){
                                                            ?>
                                                                        <th>Action</th>
                                                            <?php
                                                                    }
                                                                }catch(Exception $e) {
                                                                    echo "Early Details Loading Fail!";
                                                                }
                                                            ?>
                                                            <th>School</th>
                                                            <th>Province</th>
                                                            <th>Zone</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <!-- <th>School</th>
                                                            <th>Province</th>
                                                            <th>Zone</th>
                                                            <th>From</th>
                                                            <th>To</th> -->
                                                        </tr> 
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                        try{
                                                            $sqlerf="SELECT * FROM erservice where tid = $prtid";
                                                            $resulterf=$conn->query($sqlerf);
                                                            while($recorderf = mysqli_fetch_array($resulterf)){
                                                                $scli = $recorderf['school'];
                                                                $frmd = $recorderf['sdate'];
                                                                $todt = $recorderf['endate'];
                                                                $depvnname = "";
                                                                $dedtndistname = "";
                                                                $dezcgzone = "";

                                                                $sqlsck="SELECT * FROM school where scid = $scli";
                                                                $resultsck=$conn->query($sqlsck);
                                                                while($recordsck = mysqli_fetch_array($resultsck)){
                                                                    $scjnme = $recordsck['name'];
                                                                    $descjnme = base64_decode($scjnme);
                                                                    $buczonecode = $recordsck['zonecode'];
                                                                    // $debuczonecode = base64_decode($buczonecode);
                                                                    $sqlzcg="SELECT * FROM zonet where zonecode = '$buczonecode'";
                                                                    $resultzcg=$conn->query($sqlzcg);
                                                                    while($recordzcg = mysqli_fetch_array($resultzcg)){
                                                                        $zcgzone = $recordzcg['zone'];
                                                                        $dezcgzone = base64_decode($zcgzone);
                                                                    }
                                                                    $bucdistcode = $recordsck['distcode'];
                                                                    // $debucdistcode = base64_decode($bucdistcode);
                                                                    $sqldtn="SELECT * FROM district where distcode = '$bucdistcode'";
                                                                    $resultdtn=$conn->query($sqldtn);
                                                                    while($recorddtn = mysqli_fetch_array($resultdtn)){
                                                                        $dtndistname = $recorddtn['distname'];
                                                                        $dedtndistname = base64_decode($dtndistname);
                                                                        $dtnprocode = $recorddtn['procode'];
                                                                        $sqlpvn="SELECT * FROM provincet where procode = '$dtnprocode'";
                                                                        $resultpvn=$conn->query($sqlpvn);
                                                                        while($recordpvn = mysqli_fetch_array($resultpvn)){
                                                                            $pvnname = $recordpvn['name'];
                                                                            $depvnname = base64_decode($pvnname);
                                                                        }
                                                                    }
                                                                }
                                                        ?>
                                                        <tr style="color:#000000;background-color:#ffffff;">
                                                            <?php
                                                                if($balso=="No"){
                                                            ?>
                                                                    <td><a href="../../Action/erlservice/erlUpdate.php?id=<?php echo $recorderf['erlid']; ?>"><label class = "btn btn-primary">EDIT</label></a>
                                                            <?php
                                                                }
                                                            ?>
                                                                    <td><?php echo $descjnme; ?></td>
                                                                    <td><?php echo $depvnname; ?></td>
                                                                    <td><?php echo $dezcgzone; ?></td>
                                                                    <td><?php echo $frmd; ?></td>
                                                                    <td><?php echo $todt; ?></td>
                                                        </tr>
                                                        <?php
                                                                }
                                                            }catch(Exception $e) {
                                                                echo "Early Service Details Loading Fail!";
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="form-group m-b-0">
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="background-color:#d6ddff;" class="white-box">
                                <h6 style="color:#000000;" class="m-b-30 font-13"> If your spouce is in galewela zone, </h6>
                                <?php
                                    try{
                                        $balpo = "Yes";
                                        if($_SESSION['ref']==5){
                                            $balpo = "No";
                                        }

                                        $sqllpo="SELECT * FROM tspouce where tid = $prtid && tid NOT IN (SELECT tid FROM ofisign);";
                                        $resultlpo=$conn->query($sqllpo);
                                        while($recordlpo = mysqli_fetch_array($resultlpo)){
                                            $balpo = "No";
                                        }
                                    }catch(Exception $e) {
                                        echo "teaching Details Fail!";
                                    }
                                ?>
                                <?php
                                    try{
                                        if($balpo == "No"){
                                ?>
                                            <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                <a href="../../Action/spouce/sUpdate.php?id=<?php echo $prtid; ?>"><button class="btn btn-block btn-primary">Edit</button></a>
                                            </div>
                                            <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                <a href="spouceDetail.php"><button class="btn btn-block btn-success">Add</button></a>
                                            </div>
                                <?php
                                        }
                                    }catch(Exception $e) {
                                        echo "Spouce Button Loading Fail!";
                                    }
                                ?>
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <form class="form-horizontal">
                                            <?php
                                                try{
                                                    $sqltsp="SELECT * FROM tspouce where tid = $prtid";
                                                    $resulttsp=$conn->query($sqltsp);
                                                    while($recordtsp = mysqli_fetch_array($resulttsp)){
                                                        $btspnm = $recordtsp['spname'];
                                                        $btspscl = $recordtsp['spscl'];

                                                        $debtspnm = base64_decode($btspnm);
                                                        $debtspscl = base64_decode($btspscl);
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Spouce Database Reading Fail!";
                                                }
                                            ?>
                                            <br>
                                            <div class="form-group">
                                                <label for="spn" style="color:#000000;" class="col-sm-3 control-label">Spouce Name</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                        <input style="color:#000000;" type="text" class="form-control" id="spn1" name="spn" value="<?php echo $debtspnm; ?>"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="spscl" style="color:#000000;" class="col-sm-3 control-label">School</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                        <input style="color:#000000;" type="text" class="form-control" id="spscl1" name="spscl" value="<?php echo $debtspscl; ?>"> </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <form class="form-horizontal">
                                        <h6 style="color:#000000;" class="m-b-30 font-13"> Details about appointment, </h6>
                                        <?php
                                            try{
                                                if($jabus == "No" && ($balka=="No" || $_SESSION['ref']==5)){
                                        ?>
                                                    <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                        <a href="../../Action/teacher/bUpdate.php?id=<?php echo $prtid; ?>"><label class="btn btn-block btn-primary">Edit</label></a>
                                                    </div>
                                                    <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                        <a href="qualificationCustomer.php"><label class="btn btn-block btn-success">Add</label></a>
                                                    </div>
                                        <?php
                                                }
                                            }catch(Exception $e) {
                                                echo "Appointment Button Load Fail!";
                                            }
                                        ?>
                                        <br>
                                        <?php
                                            try{
                                        ?>
                                                <div class="form-group">
                                                    <br><br>
                                                    <label for="apc" style="color:#000000;" class="col-sm-3 control-label">Category</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                            <input style="color:#000000;" type="text" class="form-control" id="apc1" name="apc" value="<?php echo $depclnm; ?>"> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="apdt" style="color:#000000;" class="col-sm-3 control-label">Date</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                            <input style="color:#000000;" type="text" class="form-control" id="apdt1" name="apdt" value="<?php echo $pldt; ?>"> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sbj" style="color:#000000;" class="col-sm-3 control-label">Subject</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                            <input style="color:#000000;" type="text" class="form-control" id="sbj1" name="sbj" value="<?php echo $depsinm." (".$descanm." - ".$destrpnm." )"; ?>"> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mda" style="color:#000000;" class="col-sm-3 control-label">Media</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                            <input style="color:#000000;" type="text" class="form-control" id="mda1" name="mda" value="<?php echo $demdinm; ?>"> </div>
                                                    </div>
                                                </div>
                                            <?php
                                                }catch(Exception $e) {
                                                    echo "Appointment Form Loading Fail!";
                                                }
                                            ?>
                                            <h6 style="color:#000000;" class="m-b-30 font-13"> Principal graders & Assistant principal Details </h6>
                                            <?php
                                                try{
                                                    $sqlpsg="SELECT * FROM principle where tid = $prtid";
                                                    $resultpsg=$conn->query($sqlpsg);
                                                    while($recordpsg = mysqli_fetch_array($resultpsg)){
                                                        $psgid = $recordpsg['sgid'];
                                                        $ppros = $recordpsg['aprosdate'];
                                                        $ptes = $recordpsg['ateasdate'];
                                                        $prefs = $recordpsg['resfield'];

                                                        $deprefs = base64_decode($prefs);
                                                        $sqlsgr="SELECT * FROM serandgrade where sgid = $psgid";
                                                        $resultsgr=$conn->query($sqlsgr);
                                                        while($recordsgr = mysqli_fetch_array($resultsgr)){
                                                        $sgrdnm = $recordsgr['grade'];
                                                        $desgrdnm = base64_decode($sgrdnm);
                                                        }
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Grade details reading Fail!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                                    if($jabus == "No" && ($balka=="No" || $_SESSION['ref']==5)){
                                            ?>
                                                        <p style="float:right;color:#000000;"><strong> You can update this from Main admin panel </strong></p><br><br>
                                                <?php
                                                    }
                                                ?>
                                                    <div class="form-group">
                                                        <label for="sag" style="color:#000000;" class="col-sm-3 control-label">Service and Grade</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="sag1" name="sag" value="<?php echo $desgrdnm; ?>"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dtrp" style="color:#000000;" class="col-sm-3 control-label">Took duties (post)</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="dtrp1" name="dtrp" value="<?php echo $ppros; ?>"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dttap" style="color:#000000;" class="col-sm-3 control-label">Took duties (As teacher)</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="dttap1" name="dttap" value="<?php echo $ptes; ?>"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rpbl" style="color:#000000;" class="col-sm-3 control-label">Responsibilities</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="rpbl1" name="rpbl" value="<?php echo $deprefs; ?>"> </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }catch(Exception $e) {
                                                    echo "Principal Form Loading Fail!";
                                                }
                                            ?>
                                            <h6 style="color:#000000;" class="m-b-30 font-13"> Non-graded vice principals, principals and teachers </h6>
                                            <?php
                                                try{
                                                    $balnp = "Yes";
                                                    if($_SESSION['ref']==5){
                                                        $balnp = "No";
                                                    }
                                                    $sqldhp="SELECT * FROM nonprinciple where tid = $prtid && tid NOT IN (SELECT tid FROM ofisign);";
                                                    $resultdhp=$conn->query($sqldhp);
                                                    while($recorddhp = mysqli_fetch_array($resultdhp)){
                                                        $balnp = "No";
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Non principal data reading Fail!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                                    $sqlntg="SELECT * FROM nonprinciple where tid = $prtid";
                                                    $resultntg=$conn->query($sqlntg);
                                                    while($recordntg = mysqli_fetch_array($resultntg)){
                                                        $nprthf = $recordntg['nprid'];
                                                        $ntgsgi = $recordntg['sgid'];
                                                        $dtytkd = $recordntg['scwsdate'];
                                                        $msubid = $recordntg['msubject'];
                                                        $alcgid = $recordntg['owgrade'];

                                                        $sqlcldt="SELECT * FROM classtbllet where cleid = $alcgid";
                                                        $resultcldt=$conn->query($sqlcldt);
                                                        while($recordcldt = mysqli_fetch_array($resultcldt)){
                                                            $cldtcid = $recordcldt['clid'];
                                                            $cldtlnm = $recordcldt['letter'];
                                                            $decldtlnm = base64_decode($cldtlnm);

                                                            $sqlclnu="SELECT * FROM classt where clid = $cldtcid";
                                                            $resultclnu=$conn->query($sqlclnu);
                                                            while($recordclnu = mysqli_fetch_array($resultclnu)){
                                                                $clnunm = $recordclnu['class'];
                                                                $declnunm = base64_decode($clnunm);

                                                            }
                                                        }
                                                        $sqlnpsg="SELECT * FROM serandgrade where sgid = $ntgsgi";
                                                        $resultnpsg=$conn->query($sqlnpsg);
                                                        while($recordnpsg = mysqli_fetch_array($resultnpsg)){
                                                            $npsgdnm = $recordnpsg['grade'];
                                                            $denpsgdnm = base64_decode($npsgdnm);
                                                        }
                                                        $sqlmtsu="SELECT * FROM subject where suID = $msubid";
                                                        $resultmtsu=$conn->query($sqlmtsu);
                                                        while($recordmtsu = mysqli_fetch_array($resultmtsu)){
                                                            $mtsusnm = $recordmtsu['name'];
                                                            $demtsusnm = base64_decode($mtsusnm);

                                                            $pscat = $recordmtsu['caid'];
                                                            $pastre = $recordmtsu['ssid'];

                                                            $sqlcsd="SELECT * FROM subcategory where caid = $pscat";
                                                            $resultcsd=$conn->query($sqlcsd);
                                                            while($recordcsd = mysqli_fetch_array($resultcsd)){
                                                                $csdnm = $recordcsd['name'];
                                                                $decsdnm = base64_decode($csdnm);
                                                            }
                                                            $sqlsbtr="SELECT * FROM substream where ssid = $pastre";
                                                            $resultsbtr=$conn->query($sqlsbtr);
                                                            while($recordsbtr = mysqli_fetch_array($resultsbtr)){
                                                                $sbtrnm = $recordsbtr['name'];
                                                                $desbtrnm = base64_decode($sbtrnm);
                                                            }
                                                        }
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Subject details reading Fail!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                                    if($balnp == "No"){
                                            ?>
                                                        <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                            <a href="../../Action/nonprinciple/nprUpdate.php?id=<?php echo $nprthf; ?>"><label class="btn btn-block btn-primary">Edit</label></a>
                                                        </div>
                                                        <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                            <a href="ser&grade.php"><label class="btn btn-block btn-success">Add</label></a>
                                                        </div><br><br><br>
                                            <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Service and grade button loading Fail!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                            ?>
                                                    <div class="form-group">
                                                        <label for="sagb" style="color:#000000;" class="col-sm-3 control-label">Service and Grade</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="sagb1" name="sagb" value="<?php echo $denpsgdnm; ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tds" style="color:#000000;" class="col-sm-3 control-label">Took duties (School)</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="tds1" name="tds" value="<?php echo $dtytkd; ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mts" style="color:#000000;" class="col-sm-3 control-label">Main Subject (Teaching)</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="mts1" name="mts" value="<?php echo $demtsusnm." (".$decsdnm." - ".$desbtrnm." )"; ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alg" style="color:#000000;" class="col-sm-3 control-label">Allocated grade</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="alg1" name="alg" value="<?php echo $declnunm." - ".$decldtlnm?>"> </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }catch(Exception $e) {
                                                    echo "Non principal form loading Fail!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                                    $sqltts="SELECT * FROM tstbl where tid = $prtid";
                                                    $resulttts=$conn->query($sqltts);
                                                    while($recordtts = mysqli_fetch_array($resulttts)){

                                                        $tstnm = $recordtts['tsts'];
                                                        $detstnm = base64_decode($tstnm);
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Training details reading Fail!";
                                                }
                                            ?>
                                            <br>
                                            <h6 style="color:#000000;" class="m-b-30 font-13"> Training Status </h6>
                                            <?php
                                                try{
                                                    $balta = "Yes";
                                                    if($_SESSION['ref']==5){
                                                        $balta = "No";
                                                    }
                                                    $sqlbtf="SELECT * FROM tstbl where tid = $prtid && tid NOT IN (SELECT tid FROM ofisign);";
                                                    $resultbtf=$conn->query($sqlbtf);
                                                    while($recordbtf = mysqli_fetch_array($resultbtf)){
                                                        $balta = "No";
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Training status reading Fail!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                                    if($balta == "No"){
                                            ?>
                                                        <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                            <a href="../../Action/train/trainUpdate.php?id=<?php echo $prtid; ?>"><label class="btn btn-block btn-primary">Edit</label></a>
                                                        </div>
                                                        <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                            <a href="trainStatus.php"><label class="btn btn-block btn-success">Add</label></a>
                                                        </div>
                                                        <br><br><br>
                                            <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Training Button Load Fail!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                            ?>
                                                    <div class="form-group">
                                                        <label for="tst" style="color:#000000;" class="col-sm-3 control-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="tst1" name="tst" value="<?php echo $detstnm; ?>"> </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }catch(Exception $e) {
                                                    echo "Training Form Load Fail!";
                                                }
                                            ?>
                                            <br>
                                            <h6 style="color:#000000;" class="m-b-30 font-13"> Capable subjects </h6>
                                            <?php
                                            try{
                                                $balwa = "Yes";

                                                if($_SESSION['ref']==5){
                                                    $balwa = "No";
                                                }
                
                                                $sqlcbn="SELECT * FROM cpblesub where tid = $prtid && tid NOT IN (SELECT tid FROM ofisign);";
                                                $resultcbn=$conn->query($sqlcbn);
                                                while($recordcbn = mysqli_fetch_array($resultcbn)){
                                                    $balwa = "No";
                                                }
                                            }catch(Exception $e) {
                                                echo "Capable subject read Fail!";
                                            }
                                            ?>
                                            <?php
                                                try{
                                                    if($balwa == "No"){
                                            ?>
                                                        <div style="width:150px;float:right;" class="col-lg-2 col-sm-4 col-xs-12">
                                                            <a href="capableSub.php"><label class="btn btn-block btn-success">Add</label></a>
                                                        </div><br><br><br>
                                            <?php
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Capable subject button Fail!";
                                                }
                                            ?>
                                            <div class="table-responsive">
                                                <table id="example26" class="display nowrap" cellspacing="0" width="100%">
                                                    <caption style="color:#000000;">Subject List</caption>
                                                    <thead>
                                                        <tr>
                                                            <?php
                                                                try{
                                                                    if($balwa == "No"){
                                                            ?>
                                                                        <th>Action</th>
                                                            <?php
                                                                    }
                                                                }catch(Exception $e) {
                                                                    echo "Training Action Load Fail!";
                                                                }
                                                            ?>
                                                            <th>Subject</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <!-- <th>Subject</th> -->
                                                        </tr> 
                                                    </tfoot>
                                                    <tbody>
                                                    <?php
                                                        try{
                                                            $sqlcbl="SELECT * FROM cpblesub where tid = $prtid";
                                                            $resultcbl=$conn->query($sqlcbl);
                                                            while($recordcbl = mysqli_fetch_array($resultcbl)){
                                                                $sji = $recordcbl['suID'];

                                                                $sqlcbs="SELECT * FROM subject where suID = $sji";
                                                                $resultcbs=$conn->query($sqlcbs);
                                                                while($recordcbs = mysqli_fetch_array($resultcbs)){
                                                                    $sbhn = $recordcbs['name'];
                                                                    $desbhn = base64_decode($sbhn);

                                                                    $cmlcat = $recordcbs['caid'];
                                                                    $cmltre = $recordcbs['ssid'];

                                                                    $sqlcgf="SELECT * FROM subcategory where caid = $cmlcat";
                                                                    $resultcgf=$conn->query($sqlcgf);
                                                                    while($recordcgf = mysqli_fetch_array($resultcgf)){
                                                                        $cgfnm = $recordcgf['name'];
                                                                        $decgfnm = base64_decode($cgfnm);
                                                                    }

                                                                    $sqlsjn="SELECT * FROM substream where ssid = $cmltre";
                                                                    $resultsjn=$conn->query($sqlsjn);
                                                                    while($recordssjn = mysqli_fetch_array($resultsjn)){
                                                                        $sjnnm = $recordssjn['name'];
                                                                        $desjnnm = base64_decode($sjnnm);
                                                                    }
                                                    ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <?php
                                                                if($balwa == "No"){
                                                                ?>
                                                                <td><a href="../../Action/subject/cpblsbUpdate.php?id=<?php echo $recordcbl['cbid']; ?>"><label class="btn btn-primary">Edit</label></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $desbhn." ( ".$decgfnm." - ".$desjnnm." )"; ?></td>
                                                            </tr>
                                                        <?php
                                                                    }
                                                                }
                                                            }catch(Exception $e) {
                                                                echo "Capable subject Form Load Fail!";
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    $('#example26').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('#example30').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('#example32').DataTable({
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
    }catch(Exception $e) {
        echo "Connection Fail!";
    }
?>