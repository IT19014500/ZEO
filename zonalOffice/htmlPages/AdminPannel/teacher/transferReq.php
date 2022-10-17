<?php
  include('../../../connection.php');
  session_start();
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){
?>

<?php
  $date1=date('Y-m-d');
  $date=date_create($date1);

  $ghti=245;
  $sqlbyta="SELECT * FROM interzone";
  $resultbyta=$conn->query($sqlbyta);

  while($recordbyta = mysqli_fetch_array($resultbyta)){

    $bytaid = $recordbyta['tid'];
    $bytanicr = $recordbyta['sdate'];

    $bytanicr2=date_create($bytanicr);

    $astri=date_diff($date,$bytanicr2);

    // Add deleting date here
    if($astri->format("%a") >= $ghti){
      $deletebyd="delete from interzone where tid= $bytaid";
      $resultbyd=$conn->query($deletebyd);  
    }
  }

    // 2 table start
    $sqlbyac="SELECT * FROM interzoneprovi";
    $resultbyac=$conn->query($sqlbyac);

    while($recordbyac = mysqli_fetch_array($resultbyac)){
    $byacid = $recordbyac['tid'];
    $byacnicr = $recordbyac['sdate'];

    $byacnicr2=date_create($byacnicr);

    $astriac=date_diff($date,$byacnicr2);

    // Add deleting date here
    if($astriac->format("%a") >= $ghti){
        $deletebyac="delete from interzoneprovi where tid= $byacid";
        $resultbyac=$conn->query($deletebyac);
    }
    }
    // 2 table end

    // 3 table start
    $sqljv="SELECT * FROM inregion";
    $resultjv=$conn->query($sqljv);

    while($recordjv = mysqli_fetch_array($resultjv)){
    $jvid = $recordjv['tid'];
    $jvnicr = $recordjv['sdate'];

    $jvnicr2=date_create($jvnicr);

    $astrijv=date_diff($date,$jvnicr2);

    // Add deleting date here
    if($astrijv->format("%a") >= $ghti){
        $deletejv="delete from inregion where tid= $jvid";
        $resultjv=$conn->query($deletejv);
    }
    }
    // 3 table end

    // 4 table start
    $sqlsair="SELECT * FROM inregionprovi";
    $resultsair=$conn->query($sqlsair);

    while($recordsair = mysqli_fetch_array($resultsair)){
    $sairid = $recordsair['tid'];
    $sairnicr = $recordsair['sdate'];

    $sairnicr2=date_create($sairnicr);

    $astrisair=date_diff($date,$sairnicr2);

    // Add deleting date here
    if($astrisair->format("%a") >= $ghti){
        $deletesair="delete from inregionprovi where tid= $sairid";
        $resultsair=$conn->query($deletesair);
    }
    
    }
    // 4 table end

    // 5 table start
    $sqlvls="SELECT * FROM ipronation";
    $resultvls=$conn->query($sqlvls);

    while($recordvls = mysqli_fetch_array($resultvls)){
        $vlsid = $recordvls['tid'];
        $vlsnicr = $recordvls['sdate'];

        $vlsnicr2=date_create($vlsnicr);

        $astrivls=date_diff($date,$vlsnicr2);

        // Add deleting date here
        if($astrivls->format("%a") >= $ghti){
            $deletevls="delete from ipronation where tid= $vlsid";
            $resultvls=$conn->query($deletevls);
        }
    }
    // 5 table end

    // 6 table start
    $sqldvn="SELECT * FROM ipoprscl";
    $resultdvn=$conn->query($sqldvn);

    while($recorddvn = mysqli_fetch_array($resultdvn)){
        $dvnid = $recorddvn['tid'];
        $dvnnicr = $recorddvn['sdate'];

        $dvnnicr2=date_create($dvnnicr);

        $astridvn=date_diff($date,$dvnnicr2);

        // Add deleting date here
        if($astridvn->format("%a") >= $ghti){
            $deletedvn="delete from ipoprscl where tid= $dvnid";
            $resultdvn=$conn->query($deletedvn);
        }
    }
    // 6 table end
?>

<?php
  $twni = $_SESSION['uname'];
  $detwni = base64_encode($twni);

  $nicsc = 0;
  $sclnams = "";
  $sqlnicr="SELECT * FROM teacher WHERE nic = '$detwni'";
  $resultnicr=$conn->query($sqlnicr);
    
  while($recordnicr = mysqli_fetch_array($resultnicr)){  
    $nicsc=$recordnicr['scid'];
    $fsa=$recordnicr['tid'];         
  }

  $sqlsc="SELECT * FROM school WHERE scid = $nicsc ";
  $resultsc=$conn->query($sqlsc);

  while($recordsc = mysqli_fetch_array($resultsc)){
    $sclnams = $recordsc['name'];
    $desclnams = base64_decode($sclnams);
  } 
?>


<?php
  if(isset($_POST['submit'])){
    $Tproviintr=$_POST['proviintr'];
    $Tdistinter=$_POST['distinter'];
    $Tcensuinter=$_POST['censuinter'];

    
    $Tdistintervar = base64_encode($Tdistinter);
    $Tcensuintervar = base64_encode($Tcensuinter);

    $ckiz = "No";
    $sqlcie="SELECT * FROM interzone WHERE tid = $fsa";
    $resultcie=$conn->query($sqlcie);
    while($recordcie = mysqli_fetch_array($resultcie)){
      $ckiz = "Yes";
    }
    if($ckiz == "No"){
    $addinz="INSERT INTO interzone(tid,province,district,census)VALUES('$fsa','$Tproviintr','$Tdistintervar','$Tcensuintervar')";
    }elseif($ckiz == "Yes"){
    ?>

      <Script>
          alert("Already Requested!");
          location='transferReq.php';
      </Script>
      
      <?php
    }
    if($conn-> query($addinz)==TRUE){
?>

<Script>
  alert("Inter Zone National School Request Added Successfully!");
  location='transferReq.php';
</Script>

<?php
  exit();
  }
}
?>

<!-- 2part start -->

<!-- In the region -->
<?php
  if(isset($_POST['submitinr'])){
    $Tproviing=$_POST['provi'];
    $Tdistiing=$_POST['distripro'];
    $Tcensuing=$_POST['scsel'];

    
    $Tdistiingvar = base64_encode($Tdistiing);
    $Tcensuingvar = base64_encode($Tcensuing);

    $ckirck = "No";
    $sqlirck="SELECT * FROM inregion WHERE tid = $fsa";
    $resultirck=$conn->query($sqlirck);
    while($recordirck = mysqli_fetch_array($resultirck)){
      $ckirck = "Yes";
    }
    if($ckirck == "No"){
      $addirn="INSERT INTO inregion(tid,province,district,census)VALUES('$fsa','$Tproviing','$Tdistiingvar','$Tcensuingvar')";
    }elseif($ckirck == "Yes"){
    ?>
  
    <Script>
      alert("Already Requested!");
      location='transferReq.php';
    </Script>    
    <?php
    }
    if($conn-> query($addirn)==TRUE){
?>
<Script>
  alert("In the Region National School Request Added Successfully!");
  location='transferReq.php';
</Script>

<?php
    exit();
    }
    }
?>
<!-- 2 part end -->

<!-- Inter-provincial -->
<!-- 3 part start -->
<?php
  if(isset($_POST['submitipo'])){
    $Tprovipvc=$_POST['provipvc'];
    $Tdistriipy=$_POST['distriipy'];
    $Tcennumipy=$_POST['cennumipy'];


    
    $Tdistriipyvar = base64_encode($Tdistriipy);
    $Tcennumipyvar = base64_encode($Tcennumipy);

    $ckinck = "No";
    $sqlinck="SELECT * FROM ipronation WHERE tid = $fsa";
    $resultinck=$conn->query($sqlinck);
    while($recordinck = mysqli_fetch_array($resultinck)){
      $ckinck = "Yes";
    }

    if($ckinck == "No"){
    $addpiod="INSERT INTO ipronation(tid,province,district,census)VALUES('$fsa','$Tprovipvc','$Tdistriipyvar','$Tcennumipyvar')";
    }elseif($ckinck == "Yes"){
    ?>
    
    <Script>
      alert("Already Requested!");
      location='transferReq.php';
    </Script>
          
    <?php
    }
    if($conn-> query($addpiod)==TRUE){
?>
<Script>
  alert("Inter Provincial National School Request Added Successfully!");
  location='transferReq.php';
</Script>
<?php
    exit();
    }
    }
?>
<!-- 3 part end -->

<!-- Inter zones -->
<!-- next table start -->
<?php
if(isset($_POST['submittpo'])){
    $Tscl1int=$_POST['scl1int'];
    $Tscl2int=$_POST['scl2int'];
    $Tscl3int=$_POST['scl3int'];
    $Tanscl=$_POST['anscl'];


    
    $Tscl1intvar = base64_encode($Tscl1int);
    $Tscl2intvar = base64_encode($Tscl2int);
    $Tscl3intvar = base64_encode($Tscl3int);
    $Tansclvar = base64_encode($Tanscl);

    $ckizpc = "No";
    $sqlizpc="SELECT * FROM interzoneprovi WHERE tid = $fsa";
    $resultizpc=$conn->query($sqlizpc);
    while($recordizpc = mysqli_fetch_array($resultizpc)){
      $ckizpc = "Yes";
    }
    if($ckizpc == "No"){
    $addinztpo="INSERT INTO interzoneprovi(tid,sclone,scltwo,sclthree,likeness)VALUES('$fsa','$Tscl1intvar','$Tscl2intvar','$Tscl3intvar','$Tansclvar')";
    }elseif($ckizpc == "Yes"){
    ?>
      
        <Script>
            alert("Already Requested!");
            location='transferReq.php';
        </Script>
            
    <?php
    }
    if($conn-> query($addinztpo)==TRUE){

?>

<Script>
    alert("Inter Zone Provincial School Request Added Successfully!");
    location='transferReq.php';

</Script>

<?php
    exit();
    }
?>

<?php
}
?>
<!-- next table end -->

<!-- In the region -->
<!-- 2part second start -->
<?php
if(isset($_POST['submitinrtpo'])){
    $Tscl1zin=$_POST['scl1zin'];
    $Tscl2zin=$_POST['scl2zin'];
    $Tscl3zin=$_POST['scl3zin'];
    $Tansclzin=$_POST['ansclzin'];

    // scl1zin,scl2zin,scl3zin,ansclzin
    
    $Tscl1zinvar = base64_encode($Tscl1zin);
    $Tscl2zinvar = base64_encode($Tscl2zin);
    $Tscl3zinvar = base64_encode($Tscl3zin);
    $Tansclzinvar = base64_encode($Tansclzin);

    $ckirck = "No";
    $sqlirck="SELECT * FROM inregionprovi WHERE tid = $fsa";
    $resultirck=$conn->query($sqlirck);
    while($recordirck = mysqli_fetch_array($resultirck)){
      $ckirck = "Yes";
    }
    if($ckirck == "No"){
      $addinro="INSERT INTO inregionprovi(tid,sclone,scltwo,sclthree,likeness)VALUES('$fsa','$Tscl1zin','$Tscl2zin','$Tscl3zin','$Tansclzinvar')";
    }elseif($ckirck == "Yes"){
    ?>

      <Script>
          alert("Already Requested!");
          location='transferReq.php';
      </Script>
              
    <?php
    }

    if($conn-> query($addinro)==TRUE){

?>

<Script>
    alert("In the region Provincial School Request Added Successfully!");
    location='transferReq.php';
</Script>

<?php
    exit();
    }
}
?>
<!-- 2part second end -->

<!-- Inter-provincial -->
<!-- 3part second start -->
<?php
    if(isset($_POST['submitipotpr'])){
        $Tscl1ipo=$_POST['scl1ipo'];
        $Tscl2ipo=$_POST['scl2ipo'];
        $Tscl3ipo=$_POST['scl3ipo'];
        $Tanitp=$_POST['anitp'];


        
        $Tscl1ipovar = base64_encode($Tscl1ipo);
        $Tscl2ipovar = base64_encode($Tscl2ipo);
        $Tscl3ipovar = base64_encode($Tscl3ipo);
        $Tanitpvar = base64_encode($Tanitp);

        $ckprsc = "No";
        $sqlprsc="SELECT * FROM ipoprscl WHERE tid = $fsa";
        $resultprsc=$conn->query($sqlprsc);
        while($recordprsc = mysqli_fetch_array($resultprsc)){
        $ckprsc = "Yes";
        }

        if($ckprsc == "No"){
        $addipom="INSERT INTO ipoprscl(tid,sclone,scltwo,sclthree,likeness)VALUES('$fsa','$Tscl1ipovar','$Tscl2ipovar','$Tscl3ipovar','$Tanitpvar')";
        }elseif($ckprsc == "Yes"){
        ?>
    
        <Script>
            alert("Already Requested!");
            location='transferReq.php';
        </Script>

        <?php
        }

        if($conn-> query($addipom)==TRUE){

?>

<Script>
    alert("Inter Provincial, Provincial School Request Added Successfully!");
    location='transferReq.php';
</Script>

<?php
    exit();
    }
}
?>
<!-- 3part second end -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../images/logoGvmnt.png">
    <title>Teacher</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="../jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- ===== Animation CSS ===== -->
    <link href="../jthemes.org/demo-admin/cubic/cubic-html/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="../jthemes.org/demo-admin/cubic/cubic-html/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="../jthemes.org/demo-admin/cubic/cubic-html/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        /* popup form start */
        .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
        }

        /* The popup form - hidden by default */
        .form-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text], .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
        background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
        opacity: 1;
        }
        /* popup form end */
    </style>
</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- ===== Top-Navigation ===== -->
        <?php
            require_once '../menu/topNavigation/Teacher/dashboardTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../menu/Teacher/transferReqMenu.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
            <!-- <div style="float:right;color:#000000;margin-right:15px;"><b> -->
                <?php
                //  echo $desclnams;
                ?>
                <!-- </b></div> -->
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Transfer Requests</em></strong></h1><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div style="background-color:#d6ddff;" class="white-box">
                            <h3 class="m-b-0 box-title">National School Transfers </h3><br>
                            <div class="row">

                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <button class="btn btn-block btn-primary" onclick="openForm()">Inter zones</button>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <button class="btn btn-block btn-primary" onclick="openForminr()">Intra zone</button>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <button class="btn btn-block btn-primary" onclick="openFormipo()">Inter-provincial</button>
                                </div>

                            </div>
                            <h3 class="m-b-0 m-t-30 box-title">Provincial School Transfers </h3><br>
                            <div class="row">
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <button class="btn btn-block btn-primary" onclick="openFormPro()">Inter zones</button>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <button class="btn btn-block btn-primary" onclick="openForminrPro()">Intra zone</button>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <button class="btn btn-block btn-primary" onclick="openFormipoPro()">Inter-provincial</button>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-popup" id="myForm">
                                    <form action="transferReq.php" class="form-container" id="text" method="post">
                                        <h3 style="color:#000000;text-align:center;">INTER ZONE</h3>
                                        <em><h4 style="color:#1a088a;text-align:center;"><u>Requested School Details</u></h4></em><br>
                                        <label for="proviintr" style="color:black;"><strong>School Province</strong></label>
                                        <!-- province start -->
                                                <?php
                                                $sqlpin="SELECT * FROM provincet ";
                                                $resultpin=$conn->query($sqlpin);
                                                ?> 
                                                <div align="left">
                                                <select class="form-control" id = "proviintr1" name="proviintr" required>
                                                <option value="0" selected>-Select Province-</option>
                                                <?php
                                                    while($recordpin = mysqli_fetch_array($resultpin)){  
                                                        $pina=$recordpin['proid'];
                                                        $pinanam=$recordpin['name'];
                                                        $depinanam = base64_decode($pinanam);
                                                ?>
                                                    <option value="<?php echo $pina; ?>" ><?php echo $depinanam; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                                </div>
                                        <!-- Province end -->

                                        <label for="distinter" style="color:black;"><strong>Disrtrict</strong></label>
                                        <input type="text" placeholder="Requesting School District" id="dist1" name="distinter" required>

                                        <label for="censuinter" style="color:black;"><strong>School Cencus Number</strong></label>
                                        <input type="text" placeholder="Requesting School cencus Number" id="censuinter1" name="censuinter" required>

                                        <button type="submit" class="btn" id = "submit" name = "submit">Submit</button>
                                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                    </form>
                                </div>
                                <div class="form-popup" id="myFormPro">
                                    <form action="transferReq.php" class="form-container" id="textproce" method="post">

                                        <label for="curzone" style="color:black;"><strong>School 1</strong></label>
                                        <input type="text" placeholder="Enter School 1" id="scl1int1" name="scl1int" required>

                                        <label for="reqzone" style="color:black;"><strong>School 2</strong></label>
                                        <input type="text" placeholder="Enter School 2" id="scl2int1" name="scl2int" required>

                                        <label for="reqzone" style="color:black;"><strong>School 3</strong></label>
                                        <input type="text" placeholder="Enter School 3" id="scl3int1" name="scl3int" required>

                                        <label for="reqzone" style="color:black;"><strong>Do you like another school from same zone</strong></label>
                                        <label for="ansclid" style="color:black;">Yes:</label> 
                                        <input type="radio" id="ansclid" name="anscl" value="Yes">
                                        <label for="ansclno" style="color:black;">No:</label> 
                                        <input type="radio" id="ansclno" name="anscl" value="No">

                                        <button type="submit" class="btn" id = "submittpo" name = "submittpo">Submit</button>
                                        <button type="button" class="btn cancel" onclick="closeFormPro()">Close</button>
                                    </form>
                                </div>
                                <div class="form-popup" id="myForminr">
                                    <form action="transferReq.php" class="form-container" id="textinr" method="post">
                                        <h3 style="color:#000000;text-align:center;">INTRA ZONE</h3>
                                        <em><h4 style="color:#1a088a;text-align:center;"><u>Requested School Details</u></h4></em><br>

                                        <label for="provi" style="color:black;"><strong>Province</strong></label>

                                        <!-- province start -->
                                                <?php
                                                $sqlmst="SELECT * FROM provincet ";
                                                $resultmst=$conn->query($sqlmst);
                                                ?> 
                                                <div align="left">
                                                <select class="form-control" id = "provi1" name="provi" required>
                                                <option value="0" selected>-Select Province-</option>
                                                <?php
                                                    while($recordmst = mysqli_fetch_array($resultmst)){  
                                                        $msta=$recordmst['proid'];
                                                        $mstanam=$recordmst['name'];
                                                        $demstanam = base64_decode($mstanam);
                                                ?>
                                                    <option value="<?php echo $msta; ?>" ><?php echo $demstanam; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                                </div>
                                        <!-- Province end -->
                                        
                                        <label for="distripro" style="color:black;"><strong>District</strong></label>
                                        <input type="text" placeholder="Enter District" name="distripro" required>

                                        <label for="scsel" style="color:black;"><strong>School Name</strong></label>
                                        
                                        
                                                    <!-- School Selection start -->
                                                <?php
                                                    $polu = "Pool";
                                                    $enpolu = base64_encode($polu);
                                                    $sqlscd="SELECT * FROM school where census!='$enpolu'";
                                                    $resultscd=$conn->query($sqlscd);

                                                ?> 
                                                <div align="left">
                                                <select class="form-control" id = "scsel1" name="scsel" required>
                                                <option value="0" selected>-Select School-</option>
                                                <?php
                                                    while($recordscd = mysqli_fetch_array($resultscd)){  
                                                        $pvca=$recordscd['scid'];
                                                        $scdanam=$recordscd['name'];
                                                        $descdanam = base64_decode($scdanam);
                                                ?>
                                                    <option value="<?php echo $pvca; ?>" ><?php echo $descdanam; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                                </div><br>
                                        <!-- school selection end -->


                                        <button type="submit" class="btn" id = "submitinr" name = "submitinr">Submit</button>
                                        <button type="button" class="btn cancel" onclick="closeForminr()">Close</button>
                                    </form>
                                </div>
                                <div class="form-popup" id="myForminrPro">
                                    <form action="transferReq.php" class="form-container" id="textproceinr" method="post">
                                        <em><h4 style="color:#1a088a;"><u>Requested School Details</u></h4></em>
                                        <br>
                                        <?php
                                        $sqlgbo="SELECT * FROM school where census!='$enpolu'";
                                        $resultgbo=$conn->query($sqlgbo);
                                        ?> 
                                        <label for="scl1zin" style="color:black;"><strong>School 1</strong></label>
                                        <div align="left">
                                                <select class="form-control" id = "scl1zin1" name="scl1zin" required>
                                                <option value="0" selected>-Select School 1-</option>
                                                <?php
                                                    while($recordgbo = mysqli_fetch_array($resultgbo)){  
                                                        $gboa=$recordgbo['scid'];
                                                        $gboanam=$recordgbo['name'];
                                                        $degboanam = base64_decode($gboanam);
                                                ?>
                                                    <option value="<?php echo $gboa; ?>" ><?php echo $degboanam; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                        </div>

                                        <?php
                                            $sqlkmo="SELECT * FROM school where census!='$enpolu'";
                                            $resultkmo=$conn->query($sqlkmo);
                                        ?>
                                        <label for="scl2zin" style="color:black;"><strong>School 2</strong></label>
                                        <div align="left">
                                                <select class="form-control" id = "scl2zin1" name="scl2zin" required>
                                                <option value="0" selected>-Select School 2-</option>
                                                <?php
                                                    while($recordkmo = mysqli_fetch_array($resultkmo)){  
                                                        $kmoa=$recordkmo['scid'];
                                                        $kmoanam=$recordkmo['name'];
                                                        $dekmoanam = base64_decode($kmoanam);
                                                ?>
                                                    <option value="<?php echo $kmoa; ?>" ><?php echo $dekmoanam; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                        </div>

                                        <?php
                                            $sqldop="SELECT * FROM school where census!='$enpolu'";
                                            $resultdop=$conn->query($sqldop);
                                        ?>
                                        <label for="scl3zin" style="color:black;"><strong>School 3</strong></label>
                                        <div align="left">
                                                <select class="form-control" id = "scl3zin1" name="scl3zin" required>
                                                <option value="0" selected>-Select School 3-</option>
                                                <?php
                                                    while($recorddop = mysqli_fetch_array($resultdop)){  
                                                        $dopa=$recorddop['scid'];
                                                        $dopanam=$recorddop['name'];
                                                        $dedopanam = base64_decode($dopanam);
                                                ?>
                                                    <option value="<?php echo $dopa; ?>" ><?php echo $dedopanam; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                        </div>
                                        <br>

                                        <label for="anscl" style="color:black;"><strong>Do you like another school from same zone</strong></label>
                                        <label for="ansclid" style="color:black;">Yes:</label> 
                                        <input type="radio" id="ansclidzin" name="ansclzin" value="Yes">
                                        <label for="ansclno" style="color:black;">No:</label> 
                                        <input type="radio" id="ansclnozin" name="ansclzin" value="No">

                                        <button type="submit" class="btn" id = "submitinrtpo" name = "submitinrtpo">Submit</button>
                                        <button type="button" class="btn cancel" onclick="closeForminrPro()">Close</button>
                                    </form>
                                </div>
                                <div class="form-popup" id="myFormipo">
                                    <form action="transferReq.php" class="form-container" id="textipo" method="post">
                                        <h3 style="color:#000000;text-align:center;">INTER PROVINCIAL</h3>
                                        <em><h4 style="color:#1a088a;text-align:center;"><u>Requested School Details</u></h4></em>

                                        <label for="provipvc" style="color:black;"><strong>Province</strong></label>

                                                <!-- province start -->
                                                <?php
                                                $sqlpvc="SELECT * FROM provincet ";
                                                $resultpvc=$conn->query($sqlpvc);
                                                ?> 
                                                <div align="left">
                                                <select class="form-control" id = "provipvc1" name="provipvc" required>
                                                <option value="0" selected>-Select Province-</option>
                                                <?php
                                                    while($recordpvc = mysqli_fetch_array($resultpvc)){  
                                                        $pvca=$recordpvc['proid'];
                                                        $pvcanam=$recordpvc['name'];
                                                        $depvcanam = base64_decode($pvcanam);
                                                ?>
                                                    <option value="<?php echo $pvca; ?>" ><?php echo $depvcanam; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                                </div>
                                        <!-- Province end -->
                                        
                                        <label for="distriipy" style="color:black;"><strong>District</strong></label>
                                        <input type="text" placeholder="Enter District" name="distriipy" required>

                                        <label for="cennumipy" style="color:black;"><strong>School Census Number</strong></label>
                                        <input type="text" placeholder="Enter census Number" name="cennumipy" required>

                                        <button type="submit" class="btn" id = "submitipo" name = "submitipo">Submit</button>
                                        <button type="button" class="btn cancel" onclick="closeFormipo()">Close</button>
                                    </form>
                                </div>
                                <div class="form-popup" id="myFormipoPro">
                                    <form action="transferReq.php" class="form-container" id="textproceipo" method="post">
                                    
                                    <label for="scl1ipo" style="color:black;"><strong>School 1</strong></label>
                                    <input type="text" placeholder="Enter School 1" id="scl1ipo1" name="scl1ipo" required>

                                    <label for="scl2ipo" style="color:black;"><strong>School 2</strong></label>
                                    <input type="text" placeholder="Enter School 2" id="scl2ipo1" name="scl2ipo" required>

                                    <label for="scl3ipo" style="color:black;"><strong>School 3</strong></label>
                                    <input type="text" placeholder="Enter School 3" id="scl3ipo1" name="scl3ipo" required>

                                    <label for="anitp" style="color:black;"><strong>Do you like another school from same zone</strong></label>
                                        <label for="anitpid" style="color:black;">Yes:</label> 
                                        <input type="radio" id="anitpid" name="anitp" value="Yes">
                                        <label for="anitpno" style="color:black;">No:</label> 
                                        <input type="radio" id="anitpno" name="anitp" value="No">

                                        <button type="submit" class="btn" id = "submitipotpr" name = "submitipotpr">Submit</button>
                                        <button type="button" class="btn cancel" onclick="closeFormipoPro()">Close</button>
                                    </form>
                                </div>
                                <script>
                                    function openForm() {
                                        document.getElementById("myForm").style.display = "block";
                                    }

                                    function openFormPro() {
                                        document.getElementById("myFormPro").style.display = "block";
                                    }

                                    function closeForm() {
                                        document.getElementById("myForm").style.display = "none";
                                    }

                                    function closeFormPro() {
                                        document.getElementById("myFormPro").style.display = "none";
                                    }

                                    function openForminr() {
                                        document.getElementById("myForminr").style.display = "block";
                                    }

                                    function openForminrPro() {
                                        document.getElementById("myForminrPro").style.display = "block";
                                    }

                                    function closeForminr() {
                                        document.getElementById("myForminr").style.display = "none";
                                    }

                                    function closeForminrPro() {
                                        document.getElementById("myForminrPro").style.display = "none";
                                    }



                                    function openFormipo() {
                                        document.getElementById("myFormipo").style.display = "block";
                                    }

                                    function openFormipoPro() {
                                        document.getElementById("myFormipoPro").style.display = "block";
                                    }

                                    function closeFormipo() {
                                        document.getElementById("myFormipo").style.display = "none";
                                    }

                                    function closeFormipoPro() {
                                        document.getElementById("myFormipoPro").style.display = "none";
                                    }
                                </script>
                                <script>
                                    function openNav() {
                                        document.getElementById("mySidenav").style.width = "250px";
                                        document.getElementById("main").style.marginLeft = "250px";
                                        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                                    }

                                    function closeNav() {
                                        document.getElementById("mySidenav").style.width = "0";
                                        document.getElementById("main").style.marginLeft= "0";
                                        document.body.style.backgroundColor = "#679aa8";
                                    }
                                </script>
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
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../jthemes.org/demo-admin/cubic/cubic-html/js/custom.js"></script>
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="../cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="../cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="../cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="../cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
    <script src="../jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
}else{
  echo "Please Login!";
}
?>