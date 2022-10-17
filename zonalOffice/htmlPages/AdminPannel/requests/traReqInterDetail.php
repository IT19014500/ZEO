<?php
    include('../../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<!-- 245 day deletion start -->
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
<!-- 245 day deletion end -->

<?php
if(isset($_GET['aprintz'])){
  $aprtz = $_GET['aprintz'];
  $idtbl = $_GET['tclup3'];
  $arabl1 = "No";
  $arabl2 = "No";
  $arabl3 = "No";
  $arabl4 = "No";
  $arabl5 = "No";
  $arabl6 = "No";
  if($idtbl==1){
    
    $sqliapr="SELECT * FROM interzoneapr where tid = $aprtz";
    $resultiapr=$conn->query($sqliapr);
    while($recordiapr = mysqli_fetch_array($resultiapr)){
      $arabl1 = "Yes";
    }
    if($arabl1 == "No"){
      $addtr="INSERT INTO interzoneapr(tid)VALUES('$aprtz')";
      $tchos = 1;
    }elseif($arabl1 == "Yes"){
      ?>

<Script>
    alert("Already Approved!");
    location='traReqInterDetail.php?intrid=<?php echo 1; ?>';

</Script>

<?php
    }
  }elseif($idtbl==2){
    $sqliapr="SELECT * FROM interzoneproviapr where tid = $aprtz";
    $resultiapr=$conn->query($sqliapr);
    while($recordiapr = mysqli_fetch_array($resultiapr)){
      $arabl2 = "Yes";
    }
    if($arabl2 == "No"){
      $addtr="INSERT INTO interzoneproviapr(tid)VALUES('$aprtz')";
      $tchos = 1;
    }elseif($arabl2 == "Yes"){
      ?>

<Script>
    alert("Already Approved!");
    location='traReqInterDetail.php?intrid=<?php echo 1; ?>';

</Script>

<?php
    }

  }elseif($idtbl==3){
    $sqliapr="SELECT * FROM inregionapr where tid = $aprtz";
    $resultiapr=$conn->query($sqliapr);
    while($recordiapr = mysqli_fetch_array($resultiapr)){
      $arabl3 = "Yes";
    }
    if($arabl3 == "No"){
      $addtr="INSERT INTO inregionapr(tid)VALUES('$aprtz')";
      $tchos = 2;
    }elseif($arabl3 == "Yes"){
      ?>

<Script>
    alert("Already Approved!");
    location='traReqInterDetail.php?intrid=<?php echo 2; ?>';

</Script>

<?php
    }
    
  }elseif($idtbl==4){
    $sqliapr="SELECT * FROM inregionproviapr where tid = $aprtz";
    $resultiapr=$conn->query($sqliapr);
    while($recordiapr = mysqli_fetch_array($resultiapr)){
      $arabl4 = "Yes";
    }
    if($arabl4 == "No"){
      $addtr="INSERT INTO inregionproviapr(tid)VALUES('$aprtz')";
      $tchos = 2;
    }elseif($arabl4 == "Yes"){
      ?>

<Script>
    alert("Already Approved!");
    location='traReqInterDetail.php?intrid=<?php echo 2; ?>';

</Script>

<?php
    }
    
  }elseif($idtbl==5){
    $sqliapr="SELECT * FROM ipronationapr where tid = $aprtz";
    $resultiapr=$conn->query($sqliapr);
    while($recordiapr = mysqli_fetch_array($resultiapr)){
      $arabl5 = "Yes";
    }
    if($arabl5 == "No"){
      $addtr="INSERT INTO ipronationapr(tid)VALUES('$aprtz')";
      $tchos = 3;
    }elseif($arabl5 == "Yes"){
      ?>

<Script>
    alert("Already Approved!");
    location='traReqInterDetail.php?intrid=<?php echo 3; ?>';

</Script>

<?php
    }
  
  }elseif($idtbl==6){
    $sqliapr="SELECT * FROM ipoprsclapr where tid = $aprtz";
    $resultiapr=$conn->query($sqliapr);
    while($recordiapr = mysqli_fetch_array($resultiapr)){
      $arabl6 = "Yes";
    }
    if($arabl6 == "No"){
      $addtr="INSERT INTO ipoprsclapr(tid)VALUES('$aprtz')";
      $tchos = 3;
    }elseif($arabl6 == "Yes"){
      ?>

<Script>
    alert("Already Approved!");
    location='traReqInterDetail.php?intrid=<?php echo 3; ?>';

</Script>

<?php
    }
    
  }

  if($conn-> query($addtr)==TRUE){
  ?>

<Script>
    alert("Transfer Request Approved!");
    location='traReqInterDetail.php?intrid=<?php echo $tchos; ?>';

</Script>

<?php
  exit();
    }
}
?>

<?php
  
  $sql3="SELECT * FROM interzone";
  $result3=$conn->query($sql3);

  $sqlintpr="SELECT * FROM interzoneprovi";
  $resultintpr=$conn->query($sqlintpr);

  $sqlintz="SELECT * FROM inregion";
  $resultintz=$conn->query($sqlintz);

  $sqlinrep="SELECT * FROM inregionprovi";
  $resultinrep=$conn->query($sqlinrep);

  $sqlipnr="SELECT * FROM ipronation";
  $resultipnr=$conn->query($sqlipnr);

  $sqlipp="SELECT * FROM ipoprscl";
  $resultipp=$conn->query($sqlipp);

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
    <link rel="icon" type="image/png" sizes="16x16" href="../../../images/logoGvmnt.png">
    <title>Main Admin</title>
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
</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- ===== Top-Navigation ===== -->
        <?php
            require_once '../menu/topNavigation/headteEditTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../menu/adminSecondIntreq.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <?php
            $jasgb = 0;
        ?>
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href="transferReqMan.php"><button class="btn btn-block btn-info">Back</button></a>
                </div>
                <h1 style="color:#000000;text-align:center;"><strong><em>Transfer Request</em></strong></h1><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div style="background-color:#d6ddff;" class="white-box">
                            <h3 class="m-b-0 box-title">Check your requests</h3><br>
                            <!-- 1st isset start -->
                            <?php if(isset($_GET['intrid'])){ 
                                $intridr = $_GET['intrid'];
                                if($intridr==1){
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <h3 class="box-title m-b-0">Inter zone National School Requests</h3>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="intrznatio" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Requestees</caption>
                                                        <thead>
                                                            <tr>
                                                                <th>tid</th>
                                                                <th>province</th>
                                                                <th>district</th>
                                                                <th>census</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            while($record3 = mysqli_fetch_array($result3)){
                                                                
                                                                $chkvid = $record3['tid'];
                                                                $endistrict = $record3['district'];
                                                                $encensus = $record3['census'];
                                                                $priod = $record3['province'];

                                                                $deendistrict = base64_decode($endistrict);
                                                                $deencensus = base64_decode($encensus);

                                                                $sqltrcn="SELECT * FROM teacher where tid = $chkvid";
                                                                $resulttrcn=$conn->query($sqltrcn);
                                                                while($recordtrcn = mysqli_fetch_array($resulttrcn)){
                                                                $ttnicr = $recordtrcn['nic'];
                                                                $dettnicr = base64_decode($ttnicr);

                                                                }

                                                                $arablse = "No";
                                                                $sqliase="SELECT * FROM interzoneapr where tid = $chkvid";
                                                                $resultiase=$conn->query($sqliase);
                                                                while($recordiase = mysqli_fetch_array($resultiase)){
                                                                $arablse = "Yes";
                                                                }
                                                                $sqlpovb="SELECT * FROM provincet where proid = $priod";
                                                                $resultpovb=$conn->query($sqlpovb);
                                                                while($recordpovb = mysqli_fetch_array($resultpovb)){
                                                                $povbnm = $recordpovb['name'];
                                                                $depovbnm = base64_decode($povbnm);
                                                                }
                                                                                
                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $dettnicr; ?></td>
                                                                <td><?php echo $depovbnm; ?></td>
                                                                <td><?php echo $deendistrict; ?></td>
                                                                <td><?php echo $deencensus; ?></td>
                                                                <td>
                                                                <a href="traReqView.php?bnid=<?php echo $record3['tid']; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-primary">Profile</button></a>
                                                                <?php
                                                                if($arablse=="No"){
                                                                ?>
                                                                <a href="traReqInterDetail.php?aprintz=<?php echo $record3['tid']; ?>&tclup3=<?php echo 1; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-success">Approve</button></a>
                                                                <?php
                                                                }elseif($arablse=="Yes"){
                                                                ?>
                                                                <a href="../../../Action/transfer/traReqAprDelete.php?aprintz=<?php echo $record3['tid']; ?>&tclup3=<?php echo 1; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-" style="background-color:#40ad9f;color:#ffffff;">Remove</button></a>
                                                                <?php
                                                                }
                                                                ?>
                                                                <a href="../../../Action/transfer/treqDelete.php?bnid=<?php echo $record3['tid']; ?>&tclct3=<?php echo 1; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-danger">Delete</button></a>
                                                                </td> 
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <!-- <th>tid</th>
                                                                <th>province</th>
                                                                <th>district</th>
                                                                <th>census</th>
                                                                <th>Action</th> -->
                                                            </tr> 
                                                        </tfoot>
                                                    </table><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>           
                            <?php
                                if(isset($_GET['bnid'])){
                                    $jasgb = $_GET['bnid'];
                                }else{
                                    $jasgb = 56;
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">Inter zone Provincial School Requests</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="intrzprovi" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Requestees</caption>
                                                        <thead>
                                                            <tr>
                                                                <th>tid</th>
                                                                <th>sclone</th>
                                                                <th>scltwo</th>
                                                                <th>sclthree</th>
                                                                <th>likeness</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            while($recordintpr = mysqli_fetch_array($resultintpr)){
                                                                $ensclone = $recordintpr['sclone'];
                                                                $enscltwo = $recordintpr['scltwo'];
                                                                $ensclthree = $recordintpr['sclthree'];
                                                                $enlikeness = $recordintpr['likeness'];
                                                                $tnicp = $recordintpr['tid'];

                                                                $deensclone = base64_decode($ensclone);
                                                                $deenscltwo = base64_decode($enscltwo);
                                                                $deensclthree = base64_decode($ensclthree);
                                                                $deenlikeness = base64_decode($enlikeness);

                                                                $sqlidcr="SELECT * FROM teacher where tid = $tnicp";
                                                                $resultidcr=$conn->query($sqlidcr);
                                                                while($recordidcr = mysqli_fetch_array($resultidcr)){
                                                                $idcrnic = $recordidcr['nic'];
                                                                $deidcrnic  = base64_decode($idcrnic );

                                                                }

                                                                $arablby = "No";
                                                                $sqliaby="SELECT * FROM interzoneproviapr where tid = $tnicp";
                                                                $resultiaby=$conn->query($sqliaby);
                                                                while($recordiaby = mysqli_fetch_array($resultiaby)){
                                                                $arablby = "Yes";
                                                                }
                                                                                
                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $deidcrnic; ?></td>
                                                                <td><?php echo $deensclone; ?></td>
                                                                <td><?php echo $deenscltwo; ?></td>
                                                                <td><?php echo $deensclthree; ?></td>
                                                                <td><?php echo $deenlikeness; ?></td>
                                                                <td>
                                                                <a href="traReqView.php?bnid=<?php echo $recordintpr['tid']; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-primary">Profile</button></a>
                                                                <?php
                                                                if($arablby=="No"){
                                                                ?>
                                                                <a href="traReqInterDetail.php?aprintz=<?php echo $recordintpr['tid']; ?>&tclup3=<?php echo 2; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-success">Approve</button></a>
                                                                <?php
                                                                }elseif($arablby=="Yes"){
                                                                ?>
                                                                <a href="../../../Action/transfer/traReqAprDelete.php?aprintz=<?php echo $recordintpr['tid']; ?>&tclup3=<?php echo 2; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-" style="background-color:#40ad9f;color:#ffffff;">Remove</button></a>
                                                                <?php
                                                                }
                                                                ?>
                                                                <a href="../../../Action/transfer/treqDelete.php?bnid=<?php echo $recordintpr['tid']; ?>&tclct3=<?php echo 2; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-danger">Delete</button></a>
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <!-- <th>tid</th>
                                                                <th>sclone</th>
                                                                <th>scltwo</th>
                                                                <th>sclthree</th>
                                                                <th>likeness</th>
                                                                <th>Action</th> -->
                                                            </tr> 
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }elseif($intridr==2){
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">Intra zone National School Requests</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="inznenatio" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Requestees</caption>
                                                        <thead>
                                                            <tr>
                                                                <th>tid</th>
                                                                <th>province</th>
                                                                <th>district</th>
                                                                <th>census</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            while($recordintz = mysqli_fetch_array($resultintz)){
                                                                $endistrict2 = $recordintz['district'];
                                                                $encensus4 = $recordintz['census'];
                                                                $tntzid= $recordintz['tid'];
                                                                $pocvid = $recordintz['province'];
                                                                
                                                                $deendistrict2 = base64_decode($endistrict2);
                                                                $deencensus4 = base64_decode($encensus4);

                                                                $sqltntz="SELECT * FROM teacher where tid = $tntzid";
                                                                $resulttntz=$conn->query($sqltntz);
                                                                while($recordtntz = mysqli_fetch_array($resulttntz)){
                                                                $tntznic = $recordtntz['nic'];
                                                                $detntznic  = base64_decode($tntznic);
                                                                }

                                                                $arabllh = "No";
                                                                $sqlialh="SELECT * FROM inregionapr where tid = $tntzid";
                                                                $resultialh=$conn->query($sqlialh);
                                                                while($recordialh = mysqli_fetch_array($resultialh)){
                                                                $arabllh = "Yes";
                                                                }
                                                                $sqlpocc="SELECT * FROM provincet where proid = $pocvid";
                                                                $resultpocc=$conn->query($sqlpocc);
                                                                while($recordpocc = mysqli_fetch_array($resultpocc)){
                                                                $pocvnm = $recordpocc['name'];
                                                                $depocvnm = base64_decode($pocvnm);
                                                                }
                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $detntznic; ?></td>
                                                                <td><?php echo $depocvnm; ?></td>
                                                                <td><?php echo $deendistrict2; ?></td>
                                                                <td><?php echo $deencensus4; ?></td>
                                                                <td>
                                                                    <a href="traReqView.php?bnid=<?php echo $recordintz['tid']; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-primary">Profile</button></a>
                                                                <?php
                                                                if($arabllh=="No"){
                                                                ?>
                                                                    <a href="traReqInterDetail.php?aprintz=<?php echo $recordintz['tid']; ?>&tclup3=<?php echo 3; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-success">Approve</button></a>
                                                                <?php
                                                                }elseif($arabllh=="Yes"){
                                                                ?>
                                                                <a href="../../../Action/transfer/traReqAprDelete.php?aprintz=<?php echo $recordintz['tid']; ?>&tclup3=<?php echo 3; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-" style="background-color:#40ad9f;color:#ffffff;">Remove</button></a>
                                                                <?php
                                                                }
                                                                ?>
                                                                    <a href="../../../Action/transfer/treqDelete.php?bnid=<?php echo $recordintz['tid']; ?>&tclct3=<?php echo 3; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-danger">Delete</button></a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <!-- <th>tid</th>
                                                                <th>province</th>
                                                                <th>district</th>
                                                                <th>census</th>
                                                                <th>Action</th> -->
                                                            </tr> 
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">Intra zone Provincial School Requests</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="inzneprovi" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Requestees</caption>
                                                        <thead>
                                                            <tr>
                                                                <th>tid</th>
                                                                <th>sclone</th>
                                                                <th>scltwo</th>
                                                                <th>sclthree</th>
                                                                <th>likeness</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            while($recordinrep = mysqli_fetch_array($resultinrep)){
                                                                $ensclone3 = $recordinrep['sclone'];
                                                                $enscltwo3 = $recordinrep['scltwo'];
                                                                $ensclthree3= $recordinrep['sclthree'];
                                                                $enlikeness3 = $recordinrep['likeness'];
                                                                $itrid = $recordinrep['tid'];

                                                                // $deensclone3 = base64_decode($ensclone3);
                                                                // $deenscltwo3 = base64_decode($enscltwo3);
                                                                // $deensclthree3 = base64_decode($ensclthree3);

                                                                $sqlscp="SELECT name FROM school where scid = $ensclone3";
                                                                $resultscp=$conn->query($sqlscp);
                                                                while($recordscp = mysqli_fetch_array($resultscp)){
                                                                    $enscpn = $recordscp['name'];
                                                                    $deensclone3 = base64_decode($enscpn);
                                                                }

                                                                $sqlput="SELECT name FROM school where scid = $enscltwo3";
                                                                $resultput=$conn->query($sqlput);
                                                                while($recordput = mysqli_fetch_array($resultput)){
                                                                    $enscpr = $recordput['name'];
                                                                    $deenscltwo3 = base64_decode($enscpr);
                                                                }

                                                                $sqlkop="SELECT name FROM school where scid = $ensclthree3";
                                                                $resultkop=$conn->query($sqlkop);
                                                                while($recordkop = mysqli_fetch_array($resultkop)){
                                                                    $enscpf = $recordkop['name'];
                                                                    $deensclthree3 = base64_decode($enscpf);
                                                                }
                                                                $deenlikeness3 = base64_decode($enlikeness3);
                                                                
                                                                $sqlitri="SELECT * FROM teacher where tid = $itrid";
                                                                $resultitri=$conn->query($sqlitri);
                                                                while($recorditri = mysqli_fetch_array($resultitri)){
                                                                $itrinic = $recorditri['nic'];
                                                                $deitrinic  = base64_decode($itrinic);

                                                                }
                                                                $arablpr = "No";
                                                                $sqliapr="SELECT * FROM inregionproviapr where tid = $itrid";
                                                                $resultiapr=$conn->query($sqliapr);
                                                                while($recordiapr = mysqli_fetch_array($resultiapr)){
                                                                $arablpr = "Yes";
                                                                }

                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $deitrinic; ?></td>
                                                                <td><?php echo $deensclone3; ?></td>
                                                                <td><?php echo $deenscltwo3; ?></td>
                                                                <td><?php echo $deensclthree3; ?></td>
                                                                <td><?php echo $deenlikeness3; ?></td>
                                                                <td>
                                                                    <a href="traReqView.php?bnid=<?php echo $recordinrep['tid']; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-primary">Profile</button></a>
                                                                <?php
                                                                if($arablpr=="No"){
                                                                ?>
                                                                    <a href="traReqInterDetail.php?aprintz=<?php echo $recordinrep['tid']; ?>&tclup3=<?php echo 4; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-success">Approve</button></a>
                                                                <?php
                                                                }elseif($arablpr=="Yes"){
                                                                ?>
                                                                <a href="../../../Action/transfer/traReqAprDelete.php?aprintz=<?php echo $recordinrep['tid']; ?>&tclup3=<?php echo 4; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-" style="background-color:#40ad9f;color:#ffffff;">Remove</button></a>
                                                                <?php
                                                                }
                                                                ?>
                                                                    <a href="../../../Action/transfer/treqDelete.php?bnid=<?php echo $recordinrep['tid']; ?>&tclct3=<?php echo 4; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-danger">Delete</button></a>
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <!-- <th>tid</th>
                                                                <th>sclone</th>
                                                                <th>scltwo</th>
                                                                <th>sclthree</th>
                                                                <th>likeness</th>
                                                                <th>Action</th> -->
                                                            </tr> 
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }elseif($intridr==3){
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">Intra zone National School Requests</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="inznenatioAlt" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Requestees</caption>
                                                        <thead>
                                                            <tr>
                                                                <th>tid</th>
                                                                <th>province</th>
                                                                <th>district</th>
                                                                <th>census</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            while($recordipnr = mysqli_fetch_array($resultipnr)){
                                                                $endistrictipnr = $recordipnr['district'];
                                                                $encensusipnr = $recordipnr['census'];
                                                                $ipnid = $recordipnr['tid'];
                                                                $glid = $recordipnr['province'];

                                                                $deendistrictipnr = base64_decode($endistrictipnr);
                                                                $deencensusipnr = base64_decode($encensusipnr);

                                                                $sqlipnn="SELECT * FROM teacher where tid = $ipnid";
                                                                $resultipnn=$conn->query($sqlipnn);
                                                                while($recordipnn = mysqli_fetch_array($resultipnn)){
                                                                $ipnnnic = $recordipnn['nic'];
                                                                $deipnnnic  = base64_decode($ipnnnic);
                                                                }
                                                                $arablhd="No";
                                                                $sqliahd="SELECT * FROM ipronationapr where tid = $ipnid";
                                                                $resultiahd=$conn->query($sqliahd);
                                                                while($recordiahd = mysqli_fetch_array($resultiahd)){
                                                                $arablhd="Yes";
                                                                }
                                                                $sqlgls="SELECT * FROM provincet where proid = $glid";
                                                                $resultgls=$conn->query($sqlgls);
                                                                while($recordgls = mysqli_fetch_array($resultgls)){
                                                                $glsnm = $recordgls['name'];
                                                                $deglsnm = base64_decode($glsnm);
                                                                }
                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $deipnnnic; ?></td>
                                                                <td><?php echo $deglsnm; ?></td>
                                                                <td><?php echo $deendistrictipnr; ?></td>
                                                                <td><?php echo $deencensusipnr; ?></td>
                                                                <td>
                                                                    <a href="traReqView.php?bnid=<?php echo $recordipnr['tid']; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-primary">Profile</button></a>
                                                                <?php
                                                                if($arablhd=="No"){
                                                                ?>
                                                                    <a href="traReqInterDetail.php?aprintz=<?php echo $recordipnr['tid']; ?>&tclup3=<?php echo 5; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-success">Approve</button></a>
                                                                <?php
                                                                }elseif($arablhd=="Yes"){
                                                                ?>
                                                                <a href="../../../Action/transfer/traReqAprDelete.php?aprintz=<?php echo $recordipnr['tid']; ?>&tclup3=<?php echo 5; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-" style="background-color:#40ad9f;color:#ffffff;">Remove</button></a>
                                                                <?php
                                                                }
                                                                ?>
                                                                <a href="../../../Action/transfer/treqDelete.php?bnid=<?php echo $recordipnr['tid']; ?>&tclct3=<?php echo 5; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-danger">Delete</button></a>
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <!-- <th>tid</th>
                                                                <th>province</th>
                                                                <th>district</th>
                                                                <th>census</th>
                                                                <th>Action</th> -->
                                                            </tr> 
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">Intra Provincial Provincial School Requests</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="inzneproviap" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Requestees</caption>
                                                        <thead>
                                                            <tr>
                                                                <th>tid</th>
                                                                <th>sclone</th>
                                                                <th>scltwo</th>
                                                                <th>sclthree</th>
                                                                <th>likeness</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            while($recordipp = mysqli_fetch_array($resultipp)){
                                                                $enscloneipp = $recordipp['sclone'];
                                                                $enscltwoipp = $recordipp['scltwo'];
                                                                $ensclthreeipp= $recordipp['sclthree'];
                                                                $enlikenessipp = $recordipp['likeness'];
                                                                $ispnnid = $recordipp['tid'];

                                                                $deenscloneipp = base64_decode($enscloneipp);
                                                                $deenscltwoipp = base64_decode($enscltwoipp);
                                                                $deensclthreeipp = base64_decode($ensclthreeipp);
                                                                $deenlikenessipp = base64_decode($enlikenessipp);

                                                                $sqlispn="SELECT * FROM teacher where tid = $ispnnid";
                                                                $resultispn=$conn->query($sqlispn);
                                                                while($recordispn = mysqli_fetch_array($resultispn)){
                                                                $ispnnic = $recordispn['nic'];
                                                                $deispnnic  = base64_decode($ispnnic);
                                                                }
                                                                $arablcv="No";
                                                                $sqliacv="SELECT * FROM ipoprsclapr where tid = $ispnnid";
                                                                $resultiacv=$conn->query($sqliacv);
                                                                while($recordiacv = mysqli_fetch_array($resultiacv)){
                                                                $arablcv="Yes";
                                                                }
                                                                                
                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $deispnnic; ?></td>
                                                                <td><?php echo $deenscloneipp; ?></td>
                                                                <td><?php echo $deenscltwoipp; ?></td>
                                                                <td><?php echo $deensclthreeipp; ?></td>
                                                                <td><?php echo $deenlikenessipp; ?></td>
                                                            <td>
                                                                    <a href="traReqView.php?bnid=<?php echo $recordipp['tid']; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-primary">Profile</button></a>
                                                                    <?php
                                                                if($arablcv=="No"){
                                                                ?>
                                                                    <a href="traReqInterDetail.php?aprintz=<?php echo $recordipp['tid']; ?>&tclup3=<?php echo 6; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-success">Approve</button></a>
                                                                <?php
                                                                }elseif($arablcv=="Yes"){
                                                                ?>
                                                                <a href="../../../Action/transfer/traReqAprDelete.php?aprintz=<?php echo $recordipp['tid']; ?>&tclup3=<?php echo 6; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-" style="background-color:#40ad9f;color:#ffffff;">Remove</button></a>
                                                                <?php
                                                                }
                                                                ?>
                                                                    <a href="../../../Action/transfer/treqDelete.php?bnid=<?php echo $recordipp['tid']; ?>&tclct3=<?php echo 6; ?>&intridb=<?php echo $intridr; ?>"><button class="btn btn-danger">Delete</button></a>
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <!-- <th>tid</th>
                                                                <th>sclone</th>
                                                                <th>scltwo</th>
                                                                <th>sclthree</th>
                                                                <th>likeness</th>
                                                                <th>Action</th> -->
                                                            </tr> 
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                    }
                            ?>
                            <?php
                                }
                            ?>
                            <br>
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
<?php if(isset($_GET['intrid'])){ 
    $intridr = $_GET['intrid'];
    if($intridr==1){
?>
    $('#intrznatio').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    <?php
        if(isset($_GET['bnid'])){
        $jasgb = $_GET['bnid'];
        }else{
        $jasgb = 56;
        }
    ?>

    $('#intrzprovi').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    <?php
        }elseif($intridr==2){
    ?>

    $('#inznenatio').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });



    $('#inzneprovi').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    <?php
        }elseif($intridr==3){
    ?>

    $('#inznenatioAlt').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('#inzneproviap').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    <?php
        }
    ?>
    <?php
        }
    ?>
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