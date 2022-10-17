<?php

include('../../../connection.php');

  session_start();
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<?php

$totavbl = 0;
$totapprbl = 0;
$totexcebl = 0;
$totdefctbl = 0;
$totcntpr = 0;
$totexcdf = 0;
$totdefcf = 0;


$princvcnt=0;
$deprivcnt=0;
$asstprivcnt=0;
$texhcnt=0;
$avblcpr=0;

$addtechcv="No";
$prboid = "Normal";
if(isset($_GET['prbuid'])){
  $prboid = $_GET['prbuid'];
}

    $sqlnmsl="SELECT * FROM msucesslist";
    $resultnmsl=$conn->query($sqlnmsl);
    
    while($recordnmsl = mysqli_fetch_array($resultnmsl)){

     $mslids = $recordnmsl['nic'];

     $deletemsuli="delete from activetrans where nic= '$mslids'";
     $resulttyu=$conn->query($deletemsuli);

     $deletemsulimut="delete from permatch where nic= '$mslids'";
     $resultdre=$conn->query($deletemsulimut);

    }

    
?>



<?php
  
  $sqlcdr="SELECT * FROM cardret ";
  $resultcdr=$conn->query($sqlcdr);

?>



<?php
$sqlslpa="SELECT * FROM prcardret";
$resultslpa=$conn->query($sqlslpa);
?>



<?php
if(isset($_POST['submit'])){
    
    $Tscid=$_POST['Oscid'];
    $TsuID=$_POST['OsuID'];
    $Tcnt=$_POST['Ocnt'];


    $add="INSERT INTO cardret(scid,suID,cnt)VALUES('$Tscid','$TsuID','$Tcnt')";

    if($conn-> query($add)==TRUE){

?>

<Script>
    alert("Teacher Count Added!");
    location='addTeacherNeed.php';

</Script>

<?php
    exit();
    }
?>

<?php
}
?>


<!-- Priciple cardre insert start -->
<?php
if(isset($_POST['submitpr'])){
  
    $Tpscid=$_POST['Opscid'];
    $TrpsuID=$_POST['OrpsuID'];
    $Tpkcnt=$_POST['Opkcnt'];


    $addpr="INSERT INTO prcardret(scid,proid,cnt)VALUES('$Tpscid','$TrpsuID','$Tpkcnt')";

    if($conn-> query($addpr)==TRUE){

?>

<Script>
    alert("Head Person Count Added!");
    location='addTeacherNeed.php';

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
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <a href="addTeacherNeed.php?prbuid=<?php echo "print"; ?>"><button style="background-color:#0C4574;float:right;margin-right:50px;border-radius:18px;width:120px;height:50px;color:#ffffff;border:none;">Print Mode</button></a>
                <a href="addTeacherNeed.php?prbuid=<?php echo "Normal"; ?>"><button style="background-color:#0C4574;float:right;margin-right:30px;border-radius:18px;width:130px;height:50px;color:#ffffff;border:none;">Normal Mode</button></a>
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Cadre</em></strong></h1><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div style="background-color:#d6ddff;" class="white-box">
                            <h3 class="m-b-0 box-title">Subject and Principal Cardre</h3><br>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">subject cadre</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <form action="" method="post">
                                                    <?php
                                                        $censd = "Pool";
                                                        $censdvar = base64_encode($censd);
                                                        $sqlchg="SELECT * FROM school where census != '$censdvar'";
                                                        $resultchg=$conn->query($sqlchg);
                                                    ?> 
                                                    <div align="left">
                                                        <select class="form-control" id = "Oscid1" name="Oscid" required>
                                                        <option value="0" selected>-Select School Name-</option>
                                                        <?php
                                                            while($recordchg = mysqli_fetch_array($resultchg)){
                                                                $teni=$recordchg['scid'];
                                                                $mbmem=$recordchg['name'];
                                                                $dembmem = base64_decode($mbmem);
                                                                
                                                        ?>
                                                            <option value="<?php echo $teni; ?>" ><?php echo $dembmem; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div><br>
                                                    <?php
                                                        $sqlsuj="SELECT * FROM subject";
                                                        $resultsuj=$conn->query($sqlsuj);
                                                    ?> 
                                                    <div align="left">
                                                        <select class="form-control" id = "OsuID1" name="OsuID" required>
                                                        <option value="0" selected>-Select Subject-</option>
                                                        <?php
                                                            while($recordsuj = mysqli_fetch_array($resultsuj)){
                                                            $caprt=$recordsuj['caid'];
                                                            $strj=$recordsuj['ssid'];
                                                            $sqlcay="SELECT * FROM subcategory where caid = $caprt ";
                                                            $resultcay=$conn->query($sqlcay);
                                                            while($recordcay = mysqli_fetch_array($resultcay)){
                                                                $capnm=$recordcay['name'];
                                                                $decapnm = base64_decode($capnm);
                                                            }

                                                            $sqlsso="SELECT * FROM substream where ssid = $strj ";
                                                            $resultsso=$conn->query($sqlsso);
                                                            while($recordsso = mysqli_fetch_array($resultsso)){
                                                                $ssrm=$recordsso['name'];
                                                                $dessrm = base64_decode($ssrm);
                                                            }

                                                                $shid=$recordsuj['suID'];
                                                                $suna=$recordsuj['name'];
                                                                $desuna = base64_decode($suna);
                                                                
                                                        ?>
                                                            <option value="<?php echo $shid; ?>" ><?php echo $desuna." ( ".$decapnm." - ".$dessrm." )"; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div><br> 
                                                    <div align="left">
                                                        <input type="text" class="form-control" id = "Ocnt1"  name="Ocnt" placeholder="ENTER APPROVED COUNT" required>
                                                    </div><br>

                                                    <div align="right">
                                                        <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="SUBMIT">
                                                        <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">Administration cadre</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <form action="" method="post">
                                                    <?php
                                                    //   $censd = "Pool";
                                                    //   $censdvar = base64_encode($censd);
                                                    $sqlpchg="SELECT * FROM school ";
                                                    $resultpchg=$conn->query($sqlpchg);
                                                    ?>
                                                    <div align="left">
                                                        <select class="form-control" id = "Opscid1" name="Opscid" required>
                                                        <option value="0" selected>-Select School-</option>
                                                        <?php
                                                            while($recordpchg = mysqli_fetch_array($resultpchg)){
                                                                $pchgna=$recordpchg['name'];
                                                                $depchgna = base64_decode($pchgna);

                                                                $scdfhgna=$recordpchg['scid'];
                                                                
                                                        ?>
                                                            <option value="<?php echo $scdfhgna; ?>" ><?php echo $depchgna; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div><br>
                                                    <?php
                                                        $sqlrpsuj="SELECT * FROM profession";
                                                        $resultrpsuj=$conn->query($sqlrpsuj);
                                                    ?>
                                                    <div align="left">
                                                        <select class="form-control" id = "OrpsuID1" name="OrpsuID" required>
                                                        <option value="0" selected>-Select Profession-</option>
                                                        <?php
                                                            while($recordrpsuj = mysqli_fetch_array($resultrpsuj)){
                                                                $rpcaprt=$recordrpsuj['proid'];
                                                                $rpstrj=$recordrpsuj['name'];
                                                                $derpstrj = base64_decode($rpstrj);

                                                                
                                                        ?>
                                                            <option value="<?php echo $rpcaprt; ?>" ><?php echo $derpstrj; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div><br>
                                                    <div align="left">
                                                        <input type="text" class="form-control" id = "Opkcnt1"  name="Opkcnt" placeholder="ENTER APPROVED COUNT" required>
                                                    </div><br>

                                                    <div align="right">
                                                        <input type="submit" id = "submitpr" name = "submitpr" class="btn btn-info" value="SUBMIT">
                                                        <input type="reset" class="btn btn-warning" id = "reset2" value="RESET">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">Subject Cardre</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Subject Allocations</caption>
                                                        <thead id="tbl23thd">
                                                            <tr>
                                                                <th id="tbl23c1">School Name</th>
                                                                <th id="tbl23c2">Subject</th>
                                                                <th id="tbl23c3">Approved Count</th>
                                                                <th id="tbl23c4">Available Count</th>
                                                                <th id="tbl23c5">Excess</th>
                                                                <th id="tbl23c6">Defict</th>
                                                                <?php
                                                                if($prboid=="Normal"){
                                                                ?>
                                                                <th id="tbl23c7">EDIT</th>
                                                                <th id="tbl23c8">DELETE</th>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            while($recordcdr = mysqli_fetch_array($resultcdr)){
                                                            $tsubcr = $recordcdr['suID'];
                                                            $sqlsno="SELECT * FROM subject where suID = $tsubcr";
                                                            $resultsno=$conn->query($sqlsno);
                                                            while($recordsno = mysqli_fetch_array($resultsno)){
                                                                $snmo = $recordsno['name'];
                                                                $desnmo = base64_decode($snmo);

                                                                $tcaf = $recordsno['caid'];
                                                                $tsth = $recordsno['ssid'];

                                                                $sqljl="SELECT * FROM subcategory where caid = $tcaf ";
                                                                $resultjl=$conn->query($sqljl);
                                                                while($recordjl = mysqli_fetch_array($resultjl)){
                                                                $jlpnm=$recordjl['name'];
                                                                $dejlpnm = base64_decode($jlpnm);
                                                                }

                                                                $sqlwl="SELECT * FROM substream where ssid = $tsth ";
                                                                $resultwl=$conn->query($sqlwl);
                                                                while($recordwl = mysqli_fetch_array($resultwl)){
                                                                $ssrm=$recordwl['name'];
                                                                $dessrm = base64_decode($ssrm);
                                                                }

                                                            }
                                                            $addcnt = $recordcdr['cnt'];
                                                            $tlscl = $recordcdr['scid'];
                                                            $sqlschl="SELECT * FROM school where scid = $tlscl";
                                                            $resultschl=$conn->query($sqlschl);
                                                            while($recordschl = mysqli_fetch_array($resultschl)){
                                                                $schl = $recordschl['name'];
                                                                $deschl = base64_decode($schl);
                                                            }
                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $deschl; ?></td>
                                                                <td><?php echo $desnmo." ( ".$dejlpnm." - ".$dessrm." )"; ?></td>
                                                                <td><?php echo $addcnt; ?></td>
                                                                <?php
                                                                    $sqlcrd="SELECT * FROM nonprinciple where msubject = $tsubcr && tid IN (SELECT tid FROM teacher where scid = $tlscl);";
                                                                    $resultcrd=$conn->query($sqlcrd);

                                                                    $cdtsucnt = mysqli_num_rows($resultcrd);

                                                                    $acttitly = "Acting";
                                                                    $capacttitly = "acting";

                                                                    $deacttitly = base64_encode($acttitly);
                                                                    $decapacttitly = base64_encode($capacttitly);

                                                                    $sqlatuy="SELECT * FROM subject where name = '$deacttitly' OR name = '$decapacttitly' ";
                                                                    $resultatuy=$conn->query($sqlatuy);
                                                                    while($recordatuy = mysqli_fetch_array($resultatuy)){
                                                                        $subjact = $recordatuy['suID'];
                                                                    }

                                                                    $sqlactv="SELECT * FROM nonprinciple where msubject = $subjact && tid IN (SELECT tid FROM teacher where scid = $tlscl);";
                                                                    $resultactv=$conn->query($sqlactv);
                                                                    


                                                                    $actcvdn = mysqli_num_rows($resultactv);

                                                                    if($addcnt < $cdtsucnt){
                                                                        $comcdtexc = $cdtsucnt - $addcnt;
                                                                        $cdtexc = $comcdtexc;
                                                                        $cddef = 0;
                                                                        
                                                                    }elseif($addcnt >= $cdtsucnt){
                                                                        $comcdtexc = $addcnt - $cdtsucnt;
                                                                        $cdtexc = 0;
                                                                        $cddef = $comcdtexc;
                                                                    }

                                                                    $totavbl += $cdtsucnt;
                                                                    $totapprbl += $addcnt;
                                                                    $totexcebl += $cdtexc;
                                                                    $totdefctbl += $cddef;
                                                                    
                                                                    
                                                                    ?> 
                                                                <td><?php echo $cdtsucnt; ?></td>
                                                                <td><?php echo $cdtexc; ?></td>
                                                                <td><?php echo $cddef; ?></td>
                                                                <?php
                                                                    if($prboid=="Normal"){
                                                                ?>
                                                                <td><a href="../../../Action/cardre/crdlUpdate.php?id=<?php echo $recordcdr['crid']; ?>"><button class="btn btn-primary"> EDIT </button></a></td>
                                                                <td><a href="../../../Action/cardre/crdlDelete.php?id=<?php echo $recordcdr['crid']; ?>"><button class="btn btn-danger">DELETE </button></a></td>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                            <?php
                                                                }
                                                                $realtech = $totavbl - $actcvdn;
                                                                $sumbtl = $totapprbl - $totavbl;
                                                                $wiexcep = $totexcebl - $actcvdn;
                                                            ?>
                                                        </tbody>
                                                        <tfoot id="tbl23foot">
                                                            <tr>
                                                                <th id="tbl23f1">Total</th>
                                                                <th id="tbl23f2"></th>
                                                                <th id="tbl23f3"><?php echo $totapprbl;?></th>
                                                                <th id="tbl23f4"><?php echo $totavbl;?></th>
                                                                <th id="tbl23f5"><?php echo $totexcebl;?></th>
                                                                <th id="tbl23f6"><?php echo $totdefctbl;?></th>
                                                                <?php
                                                                if($prboid=="Normal"){
                                                                ?>
                                                                <th id="tbl23f7"></th>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr> 
                                                        </tfoot>
                                                    </table><br>
                                                    <table style="font-size:18px;">
                                                        <caption style="color:#193580;">Description</caption>
                                                        <tr>
                                                            <th style="color:#000000;"><strong>Details</strong></th>
                                                            <th style="color:#000000;"><strong>Count</strong></th>
                                                        </tr>
                                                        <tr style="color:#000000;">
                                                            <td>&nbsp</td><td>&nbsp</td>
                                                        </tr>
                                                        <tr style="color:#000000;">
                                                            <td>Real Teachers</td>
                                                            <td><?php echo $realtech;?></td>
                                                        </tr>
                                                        <tr style="color:#000000;">
                                                            <td>Approved and Available shortage&nbsp&nbsp&nbsp</td>
                                                            <td><?php echo $sumbtl;?> </td>
                                                        </tr>
                                                        <tr style="color:#000000;">
                                                            <td>Acting</td>
                                                            <td><?php echo $actcvdn;?> </td>
                                                        </tr>
                                                        <tr style="color:#000000;">
                                                            <td>Excess without Acting</td>
                                                            <td><?php echo $wiexcep;?> </td>
                                                        </tr>
                                                        <tr style="color:#000000;">
                                                            <td>Deficit</td>
                                                            <td><?php echo $totdefctbl;?> </td>
                                                        </tr>
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
                                        <h3 class="box-title m-b-0">Administration Cardre</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="example26" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Allocated Administrators</caption>
                                                        <thead>
                                                            <tr>
                                                                <th id="tbl26c1">School</th>
                                                                <th id="tbl26c2">Proffession</th>
                                                                <th id="tbl26c3">Approved Count</th>
                                                                <th id="tbl26c4">Available Count</th>
                                                                <th id="tbl26c5">Excess</th>
                                                                <th id="tbl26c6">Defict</th>
                                                                <?php
                                                                if($prboid=="Normal"){
                                                                    ?>
                                                                <th id="tbl26c7">Action</th>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            while($recordslpa = mysqli_fetch_array($resultslpa)){
                                                            
                                                            $sclcdr = $recordslpa['scid'];

                                                            // vht count start
                                                            $sqlpcrt="SELECT * FROM principle where sgid != 12 AND tid IN (SELECT tid FROM teacher WHERE scid = $sclcdr)";
                                                            $resultpcrt=$conn->query($sqlpcrt);

                                                            $princvcnt = mysqli_num_rows($resultpcrt);
                                                            // PRINCIPLE COUNT

                                                            $sqldeptb="SELECT * FROM teacher where cpro = 3 AND scid = $sclcdr";
                                                            $resultdeptb=$conn->query($sqldeptb);

                                                            $deprivcnt = mysqli_num_rows($resultdeptb);
                                                            //DEPUTY PRINCIPLE COUNT


                                                            $sqlasst="SELECT * FROM teacher where cpro = 4 AND scid = $sclcdr";
                                                            $resultasst=$conn->query($sqlasst);

                                                            $asstprivcnt = mysqli_num_rows($resultasst);
                                                            // vht count end

                                                            $sqlslkn="SELECT * FROM school where scid = $sclcdr ";
                                                            $resultslkn=$conn->query($sqlslkn);
                                                            while($recordslkn = mysqli_fetch_array($resultslkn)){
                                                                $ensclpn=$recordslkn['name'];
                                                                $deensclpn = base64_decode($ensclpn);
                                                            }

                                                            $prscdr = $recordslpa['proid'];
                                                            $sqlprkn="SELECT * FROM profession where proid = $prscdr ";
                                                            $resultprkn=$conn->query($sqlprkn);
                                                            while($recordprkn = mysqli_fetch_array($resultprkn)){
                                                                $enprpn=$recordprkn['name'];
                                                                $deenprpn = base64_decode($enprpn);
                                                            }

                                                            $cntpcdr = $recordslpa['cnt'];

                                                            $totcntpr += $cntpcdr;     
                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $deensclpn;?></td>
                                                                <td><?php echo $deenprpn; ?></td>
                                                                <td><?php echo $cntpcdr; ?></td>
                                                                <?php
                                                                if($prscdr==1){
                                                                ?>
                                                                <!-- Princeple -->
                                                                <td><?php echo $princvcnt; ?></td>
                                                                <?php
                                                                }elseif($prscdr==3){
                                                                ?>
                                                                <!-- Deputy princeple -->
                                                                <td><?php echo $deprivcnt; ?></td>
                                                                <?php
                                                                }elseif($prscdr==4){
                                                                    ?>
                                                                    <!-- Assistant princeple -->
                                                                <td><?php echo $asstprivcnt; ?></td>
                                                                    <?php
                                                                }elseif($prscdr==5){
                                                                    ?>
                                                                    <!-- Teacher -->
                                                                <td><?php echo ""; ?></td>
                                                                <?php
                                                                }else{
                                                                ?>
                                                                    <td><?php echo "Error"; ?></td>
                                                                <?php
                                                                    }
                                                                ?>
                                                                <?php
                                                                if($prscdr==1){
                                                                if($cntpcdr < $princvcnt){
                                                                    $prcomcdtexc = $princvcnt - $cntpcdr;
                                                                    $prcdtexc = $prcomcdtexc;
                                                                    $prcddef = 0;
                                                                }elseif($cntpcdr >= $princvcnt){
                                                                    $prcomcdtexc = $cntpcdr - $princvcnt;
                                                                    $prcdtexc = 0;
                                                                    $prcddef = $prcomcdtexc;
                                                                }
                                                                }elseif($prscdr==3){
                                                                // Deputy Principle
                                                                if($cntpcdr < $deprivcnt){
                                                                $dprcomcdtexc = $deprivcnt - $cntpcdr;
                                                                $prcdtexc = $dprcomcdtexc;
                                                                $prcddef = 0;
                                                                }elseif($cntpcdr >= $deprivcnt){
                                                                $dprcomcdtexc = $cntpcdr - $deprivcnt;
                                                                $prcdtexc = 0;
                                                                $prcddef = $dprcomcdtexc;
                                                                }
                                                                }elseif($prscdr==4){
                                                                // Assistant Principle
                                                                if($cntpcdr < $asstprivcnt){
                                                                $asstcomcdtexc = $asstprivcnt - $cntpcdr;
                                                                $prcdtexc = $asstcomcdtexc;
                                                                $prcddef = 0;
                                                                }elseif($cntpcdr >= $asstprivcnt){
                                                                $asstcomcdtexc = $cntpcdr - $asstprivcnt;
                                                                $prcdtexc = 0;
                                                                $prcddef = $asstcomcdtexc;
                                                                }
                                                                }
                                                                ?>

                                                                <td>
                                                                    <?php
                                                                    echo $prcdtexc;
                                                                    $totexcdf += $prcdtexc;
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                <?php
                                                                    echo $prcddef;
                                                                    $totdefcf += $prcddef;
                                                                ?>
                                                                </td>               
                                                                <?php
                                                                if($prboid=="Normal"){
                                                                    ?>
                                                                <td>
                                                                    <a href="../../../Action/cardre/pricUpdate.php?pid=<?php echo $recordslpa['pcrid']; ?>"><button class="btn btn-primary"> EDIT </button></a>
                                                                    <a href="../../../Action/cardre/pricDelete.php?pid=<?php echo $recordslpa['pcrid']; ?>"><button class="btn btn-danger"> DELETE </button></a>
                                                                </td>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                            <?php
                                                                }
                                                                $avblcpr = $princvcnt+$deprivcnt+$asstprivcnt;
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th id="tbl26f1">Total</th>  
                                                                <th id="tbl26f2"></th>
                                                                <th id="tbl26f3"><?php echo $totcntpr;?></th>
                                                                <th id="tbl26f4"><?php echo $avblcpr;?></th>
                                                                <th id="tbl26f5"><?php echo $totexcdf;?></th>
                                                                <th id="tbl26f6"><?php echo $totdefcf;?></th>
                                                                <?php
                                                                if($prboid=="Normal"){
                                                                ?>
                                                                <th id="tbl26f7"></th>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr> 
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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

    $('#example26').DataTable({
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