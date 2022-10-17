<?php
  include('../../../connection.php');
  session_start();
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){
?>

<?php
    $fcntTot=0;
    $acntaTot=0;
    $apcntaTot=0;
    $ofcntTot=0;
    $oacntaTot=0;
    $oapcntaTot=0;
    $capcntTot=0;
    $cmlvlseTot=0;
    $cmlvlhunTot=0;
    $cmlvlcuoTot=0;
    $cflcntTot=0;

    $addtechcv="No";
    $prboid = "Normal";
    if(isset($_GET['prbuid'])){
        $prboid = $_GET['prbuid'];
    }


  $rth = $_SESSION['uname'];
  $derth = base64_encode($rth);

  $sqlli="SELECT * FROM school WHERE census = '$derth'";
  $resultli=$conn->query($sqlli);
  while($recordli = mysqli_fetch_array($resultli)){
    $vht = $recordli['scid'];

  }
?>

<?php
    
    $sqlcdr="SELECT * FROM alresult where scid = $vht";
    $resultcdr=$conn->query($sqlcdr);

    $sqlorl="SELECT * FROM olresult where scid = $vht";
    $resultorl=$conn->query($sqlorl);

    $sqlscp="SELECT * FROM sclrship where scid = $vht";
    $resultscp=$conn->query($sqlscp);
?>

<?php
 if(isset($_POST['submit'])){
    
     $Tscid=$_POST['Oscid'];
     $TYID=$_POST['OYID'];
     $Tssid=$_POST['Ossid'];
     $Tacnt=$_POST['Oacnt'];
     $Tapcnt=$_POST['Oapcnt'];
     $arcl=0;

     $sqlnck="SELECT * FROM alresult where scid = $vht and ssid =$Tssid";
     $resultnck=$conn->query($sqlnck);
     while($recordnck = mysqli_fetch_array($resultnck)){
        $arcl=1;
     }
     
    if($arcl==0){
        if($Tapcnt<=$Tacnt){
        $add="INSERT INTO alresult(scid,YID,ssid,acnt,apcnt)VALUES('$Tscid','$TYID','$Tssid','$Tacnt','$Tapcnt')";
        }else{
        ?>
            <script>
                alert("Incorrect data!");
                location='resAnalysis.php';
            </script>
        <?php
        }
    }else{
    ?>
        <script>
            alert("Already Added!");
            location='resAnalysis.php';
        </script>
    <?php
    }

     if($conn-> query($add)==TRUE){
?>
        <script>
            alert("A/L Result Added!");
            location='resAnalysis.php';
        </script>
<?php
     exit();
     }
   }
?>

<?php
 if(isset($_POST['submitpr'])){
    
     $TOlscid=$_POST['Olscid'];
     $TOoyr=$_POST['Ooyr'];
     $TOlscnt=$_POST['Olscnt'];
     $TOolpcnt=$_POST['Oolpcnt'];
     $orcl=0;

     $sqlock="SELECT * FROM olresult where scid = $vht and YID = $TOoyr";
     $resultock=$conn->query($sqlock);
     while($recordock = mysqli_fetch_array($resultock)){
        $orcl=1;
     }

     if($orcl==0){
        if($TOolpcnt<=$TOlscnt){
            $addol="INSERT INTO olresult(scid,YID,acnt,apcnt)VALUES('$TOlscid','$TOoyr','$TOlscnt','$TOolpcnt')";
        }else{
        ?>
            <script>
                alert("Incorrect data!");
                location='resAnalysis.php';
            </script>
        <?php
        }
     }else{
    ?>
        <script>
            alert("Already Added!");
            location='resAnalysis.php';
        </script>
    <?php
     }

     if($conn-> query($addol)==TRUE){
?>
        <script>
            alert("O/L Result Added!");
            location='resAnalysis.php';
        </script>
<?php
     exit();
     }
   }
?>

<?php
 if(isset($_POST['submitscl'])){
    
     $TOpscid=$_POST['Opscid'];
     $TOoys=$_POST['Ooys'];
     $TOrpsuID=$_POST['OrpsuID'];
     $Tmlvlhun=$_POST['Omlvlhun'];
     $Tmlvlcuo=$_POST['Omlvlcuo'];
     $TOpkcnt=$_POST['Opkcnt'];
     $smcl=0;

     $sqlszl="SELECT * FROM sclrship where scid = $vht and YID = $TOoys";
     $resultszl=$conn->query($sqlszl);
     while($recordszl = mysqli_fetch_array($resultszl)){
        $smcl=1;
     }

    if($smcl==0){
        if(($TOrpsuID+$Tmlvlhun+$Tmlvlcuo)<=$TOpkcnt){
            $addol="INSERT INTO sclrship(scid,YID,mlvlse,mlvlhun,mlvlcuo,apcnt)VALUES('$TOpscid','$TOoys','$TOrpsuID','$Tmlvlhun','$Tmlvlcuo','$TOpkcnt')";
        }else{
        ?>
            <script>
                alert("Incorrect data!");
                location='resAnalysis.php';
            </script>
        <?php
        }
    }else{
    ?>
        <script>
            alert("Already Added!");
            location='resAnalysis.php';
        </script>
    <?php
    }

     if($conn-> query($addol)==TRUE){
?>
        <script>
            alert("Scholarship Result Added!");
            location='resAnalysis.php';
        </script>
<?php
     exit();
     }
   }
?>



<!-- priciple cardre end -->

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
            require_once '../menu/Principal/cardre.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <a href="resAnalysis.php?prbuid=<?php echo "print"; ?>"><button style="background-color:#0C4574;float:right;margin-right:50px;border-radius:18px;width:120px;height:50px;color:#ffffff;border:none;">Print Mode</button></a>
                <a href="resAnalysis.php?prbuid=<?php echo "Normal"; ?>"><button style="background-color:#0C4574;float:right;margin-right:30px;border-radius:18px;width:130px;height:50px;color:#ffffff;border:none;">Normal Mode</button></a>
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Result</em></strong></h1><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div style="background-color:#d6ddff;" class="white-box">
                            <h3 class="m-b-0 box-title">Result Analysis</h3><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">A/L</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <form action="" method="post">
                                                    <?php
                                                        $sqlchg="SELECT * FROM school where scid = $vht";
                                                        $resultchg=$conn->query($sqlchg);
                                                    ?> 
                                                    <div style ="float:left;width:200px;">
                                                    <select class="form-control" id = "Oscid1" name="Oscid" required>
                                                    <?php
                                                        while($recordchg = mysqli_fetch_array($resultchg)){
                                                        $chgna=$recordchg['census'];
                                                        $dechgna = base64_decode($chgna); 
                                                    ?>
                                                    <option value="<?php echo $vht; ?>" selected><?php echo $dechgna; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                    </select>
                                                    </div><br><br><br>
                                                    <?php
                                                        $sqlsuj="SELECT * FROM yeart";
                                                        $resultsuj=$conn->query($sqlsuj);
                                                    ?> 
                                                    <div style ="float:left;width:200px;">
                                                        <select class="form-control" id = "OYID1" name="OYID" required>
                                                        <option value="0" selected>-Select Year-</option>
                                                        <?php
                                                        while($recordsuj = mysqli_fetch_array($resultsuj)){
                                                            

                                                            $shid=$recordsuj['YID'];
                                                            $suyer=$recordsuj['yer'];
                    
                                                        ?>
                                                            <option value="<?php echo $shid; ?>" ><?php echo $suyer; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div><br><br><br>
                                                    <?php
                                                        $sqlstm="SELECT * FROM substream";
                                                        $resultstm=$conn->query($sqlstm);
                                                    ?> 
                                                    <div style ="float:left;width:200px;">
                                                        <select class="form-control" id = "Ossid1" name="Ossid" required>
                                                        <option value="0" selected>-Select Stream-</option>
                                                        <?php
                                                        while($recordstm = mysqli_fetch_array($resultstm)){
                                                            
                                                            $stmid=$recordstm['ssid'];
                                                            $stmna=$recordstm['name'];
                                                            $destmna = base64_decode($stmna);
                    
                                                        ?>
                                                            <option value="<?php echo $stmid; ?>" ><?php echo $destmna; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div><br><br><br>
                                                    <div style ="float:left">
                                                        <input type="text" class="form-control" id = "Oacnt1"  name="Oacnt" placeholder="SAT COUNT" required>
                                                    </div><br><br><br>
                                                    <div style ="float:left">
                                                        <input type="text" class="form-control" id = "Oapcnt1"  name="Oapcnt" placeholder="PASS COUNT" required>
                                                    </div><br><br><br>
                                                    <div style ="float:right">
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
                                        <h3 class="box-title m-b-0">O/L</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <form action="" method="post">
                                                    <?php
                                                        $sqlpchg="SELECT * FROM school where scid = $vht";
                                                        $resultpchg=$conn->query($sqlpchg);
                                                    ?>
                                                    <div style ="float:left;width:200px;">
                                                        <select class="form-control" id = "Olscid1" name="Olscid" required>
                                                        <?php
                                                            while($recordpchg = mysqli_fetch_array($resultpchg)){
                                                                $pchgna=$recordpchg['census'];
                                                                $depchgna = base64_decode($pchgna);
                                                        ?>
                                                            <option value="<?php echo $vht; ?>" selected><?php echo $depchgna; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div><br><br><br>
                                                    <?php
                                                        $sqlrpsuj="SELECT * FROM yeart";
                                                        $resultrpsuj=$conn->query($sqlrpsuj);
                                                    ?>
                                                    <div style ="float:left;width:200px;">
                                                        <select class="form-control" id = "Ooyr1" name="Ooyr" required>
                                                        <option value="0" selected>-Select Year-</option>
                                                        <?php
                                                            while($recordrpsuj = mysqli_fetch_array($resultrpsuj)){
                                                                $psuji=$recordrpsuj['YID'];
                                                                $psujyr=$recordrpsuj['yer'];
                                                        ?>
                                                            <option value="<?php echo $psuji; ?>" ><?php echo $psujyr; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div><br><br><br>
                                                    <div style ="float:left;">
                                                        <input type="text" class="form-control" id = "Olscnt1"  name="Olscnt" placeholder="ENTER SAT COUNT" required>
                                                    </div><br><br><br>
                                                    <div style ="float:left;">
                                                        <input type="text" class="form-control" id = "Oolpcnt1"  name="Oolpcnt" placeholder="ENTER PASSED COUNT" required>
                                                    </div><br><br><br>
                                                    <div style ="float:right;">
                                                        <input type="submit" id = "submitpr" name = "submitpr" class="btn btn-info" value="SUBMIT">
                                                        <input type="reset" class="btn btn-warning" id = "reset2" value="RESET">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">Scholarship</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <form action="" method="post">
                                                    <?php
                                                        $sqlschg="SELECT * FROM school where scid = $vht";
                                                        $resultschg=$conn->query($sqlschg);
                                                    ?>
                                                    <div style ="float:left;width:210px;">
                                                        <select class="form-control" id = "Opscid1" name="Opscid" required>
                                                        <?php
                                                            while($recordschg = mysqli_fetch_array($resultschg)){
                                                                $schgna=$recordschg['census'];
                                                                $deschgna = base64_decode($schgna);
                                                        ?>
                                                            <option value="<?php echo $vht; ?>" selected><?php echo $deschgna; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div><br><br><br>
                                                    <?php
                                                        $sqloyr="SELECT * FROM yeart";
                                                        $resultoyr=$conn->query($sqloyr);
                                                    ?>
                                                    <div style ="float:left;width:210px;">
                                                        <select class="form-control" id = "Ooys1" name="Ooys" required>
                                                        <option value="0" selected>-Select Year-</option>
                                                        <?php
                                                            while($recordoyr = mysqli_fetch_array($resultoyr)){
                                                                $yoi=$recordoyr['YID'];
                                                                $yoyr=$recordoyr['yer'];
                                                        ?>
                                                            <option value="<?php echo $yoi; ?>" ><?php echo $yoyr; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div><br><br><br>
                                                    <div style ="float:left;width:210px;">
                                                        <input type="text" class="form-control" id = "Opkcnt1"  name="Opkcnt" placeholder="ENTER SAT COUNT" required>
                                                    </div><br><br><br>
                                                    <div style ="float:left;width:210px;">
                                                        <input type="text" class="form-control" id = "OrpsuID1"  name="OrpsuID" placeholder="70+ OR EQUAL COUNT" required>
                                                    </div><br><br><br>
                                                    <div style ="float:left;width:210px;">
                                                        <input type="text" class="form-control" id = "Omlvlhun1"  name="Omlvlhun" placeholder="100+ OR EQUAL COUNT" required>
                                                    </div><br><br><br>
                                                    <div style ="float:left;width:210px;">
                                                        <input type="text" class="form-control" id = "Omlvlcuo1"  name="Omlvlcuo" placeholder="CUTOFF+ OR EQUAL COUNT" required>
                                                    </div><br><br><br>
                                                    <div style ="float:right;">
                                                        <input type="submit" id = "submitscl" name = "submitscl" class="btn btn-info" value="SUBMIT">
                                                        <input type="reset" class="btn btn-warning" id = "reset3" value="RESET">
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
                                        <h3 class="box-title m-b-0">A/L Analysis</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Pass Rate Evaluation</caption>
                                                        <thead id="tbl23thd">
                                                            <tr>
                                                                <th id="tbl23c1">Year</th>
                                                                <th id="tbl23c2">Stream</th>
                                                                <th id="tbl23c3">Sat</th>
                                                                <th id="tbl23c4">Passed</th>
                                                                <th id="tbl23c5">Failed</th>
                                                                <?php
                                                                if($prboid=="Normal"){
                                                                    ?>
                                                                <th id="tbl23c6">Action</th>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            while($recordcdr = mysqli_fetch_array($resultcdr)){
                                                                $fcnt=0;
                                                                $aida=$recordcdr['aid'];
                                                                // $scida=$recordoyr['scid'];
                                                                $YIDa=$recordcdr['YID'];
                                                                $ssida=$recordcdr['ssid'];
                                                                $acnta=$recordcdr['acnt'];
                                                                $apcnta=$recordcdr['apcnt'];
                                                                $fcnt=$acnta-$apcnta;
                                                                $fcntTot+=$fcnt;
                                                                $acntaTot+=$acnta;
                                                                $apcntaTot+=$apcnta;

                                                                $sqlyrs="SELECT * FROM yeart where YID=$YIDa";
                                                                $resultyrs=$conn->query($sqlyrs);
                                                                while($recordyrs = mysqli_fetch_array($resultyrs)){
                                                                    $yernm=$recordyrs['yer'];
                                                                }
                                                                $sqlsbs="SELECT * FROM substream where ssid=$ssida";
                                                                $resultsbs=$conn->query($sqlsbs);
                                                                while($recordsbs = mysqli_fetch_array($resultsbs)){
                                                                    $sbsnm=$recordsbs['name'];
                                                                    $desbsnm = base64_decode($sbsnm);
                                                                }
                                                                // $sqlskl="SELECT * FROM school where scid=$scida";
                                                                // $resultskl=$conn->query($sqlskl);
                                                                // while($recordskl = mysqli_fetch_array($resultskl)){
                                                                //     $scnm=$recordskl['name'];
                                                                //     $descnm = base64_decode($scnm);
                                                                // }

                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $yernm; ?></td>
                                                                <td><?php echo $desbsnm; ?></td>
                                                                <td><?php echo $acnta; ?></td>
                                                                <td><?php echo $apcnta; ?></td>
                                                                <td><?php echo $fcnt; ?></td>
                                                                <?php
                                                                    if($prboid=="Normal"){
                                                                ?>
                                                                <td><a href="../../../Action/result/alresEdit.php?id=<?php echo $aida; ?>"><button class="btn btn-primary"> EDIT </button></a><br><br>
                                                                <a href="../../../Action/result/alresDelete.php?id=<?php echo $aida; ?>"><button class="btn btn-danger"> DELETE </button></a></td>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr> 
                                                        <?php
                                                            }
                                                        ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th id="tbl23f1">Total</th>
                                                                <th id="tbl23f2"><?php echo '';?></th>
                                                                <th id="tbl23f3"><?php echo $acntaTot;?></th>
                                                                <th id="tbl23f4"><?php echo $apcntaTot;?></th>
                                                                <th id="tbl23f5"><?php echo $fcntTot;?></th>
                                                                <?php
                                                                    if($prboid=="Normal"){
                                                                ?>
                                                                <th id="tbl23f5"><?php echo '';?></th>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr> 
                                                        </tfoot>
                                                    </table><br>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">O/L Analysis</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="example26" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Pass Rate Evaluation</caption>
                                                        <thead>
                                                            <tr>
                                                                <th id="tbl26c1">Year</th>
                                                                <th id="tbl26c2">Sat</th>
                                                                <th id="tbl26c3">Passed</th>
                                                                <th id="tbl26c4">Failed</th>
                                                                <?php
                                                                if($prboid=="Normal"){
                                                                ?>
                                                                <th id="tbl26c6">Action</th>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                while($recordorl = mysqli_fetch_array($resultorl)){
                                                                    $ofcnt=0;
                                                                    $rolid=$recordorl['olid'];
                                                                    $oYIDa=$recordorl['YID'];
                                                                    $oacnta=$recordorl['acnt'];
                                                                    $oapcnta=$recordorl['apcnt'];
                                                                    $ofcnt=$oacnta-$oapcnta;
                                                                    $ofcntTot+=$ofcnt;
                                                                    $oacntaTot+=$oacnta;
                                                                    $oapcntaTot+=$oapcnta;
                                                                    $sqloyl="SELECT * FROM yeart where YID=$oYIDa";
                                                                    $resultoyl=$conn->query($sqloyl);
                                                                    while($recordoyl = mysqli_fetch_array($resultoyl)){
                                                                        $oyernm=$recordoyl['yer'];
                                                                    }            
                                                            ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $oyernm; ?></td>
                                                                <td><?php echo $oacnta; ?></td>
                                                                <td><?php echo $oapcnta; ?></td>
                                                                <td><?php echo $ofcnt; ?></td>
                                                                <?php
                                                                if($prboid=="Normal"){
                                                                ?>
                                                                <td><a href="../../../Action/result/olresUpdate.php?oid=<?php echo $rolid; ?>"><button class="btn btn-primary"> EDIT </button></a><br><br>
                                                                <a href="../../../Action/result/olresDelete.php?oid=<?php echo $rolid; ?>"><button class="btn btn-danger"> DELETE </button></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                            </tr> 
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th id="tbl26f1">Total</th>
                                                                <th id="tbl26f2"><?php echo $oacntaTot;?></th>
                                                                <th id="tbl26f3"><?php echo $oapcntaTot;?></th>
                                                                <th id="tbl26f4"><?php echo $ofcntTot;?></th>
                                                                <?php
                                                                    if($prboid=="Normal"){
                                                                ?>
                                                                <th id="tbl26f5"><?php echo '';?></th>
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
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0">Scholarship</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="example27" class="display nowrap" cellspacing="0" width="100%">
                                                        <caption style="color:#000000;">Pass Rate Evaluation</caption>
                                                        <thead>
                                                            <tr>
                                                                <th id="tbl27c1">Year</th>
                                                                <th id="tbl27c2">Sat</th>
                                                                <th id="tbl27c3">Fail</th>
                                                                <th id="tbl27c4">70+ or equal</th>
                                                                <th id="tbl27c5">100+ or equal</th>
                                                                <th id="tbl27c6">Cut off+ or equal</th>
                                                                <?php
                                                                if($prboid=="Normal"){
                                                                ?>
                                                                <th id="tbl27c7">Action</th>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                while($recordscp = mysqli_fetch_array($resultscp)){
                                                                    $cflcnt=0;
                                                                    $csclid=$recordscp['sclid'];
                                                                    $cYID=$recordscp['YID'];
                                                                    $cmlvlse=$recordscp['mlvlse'];
                                                                    $cmlvlhun=$recordscp['mlvlhun'];
                                                                    $cmlvlcuo=$recordscp['mlvlcuo'];
                                                                    $capcnt=$recordscp['apcnt'];
                                                                    $cflcnt=$capcnt-($cmlvlse+$cmlvlhun+$cmlvlcuo);
                                                                    $cflcntTot+=$cflcnt;
                                                                    $capcntTot+=$capcnt;
                                                                    $cmlvlseTot+=$cmlvlse;
                                                                    $cmlvlhunTot+=$cmlvlhun;
                                                                    $cmlvlcuoTot+=$cmlvlcuo;
                                                                    
                                                                    $sqlsyr="SELECT * FROM yeart where YID=$cYID";
                                                                    $resultsyr=$conn->query($sqlsyr);
                                                                    while($recordsyr = mysqli_fetch_array($resultsyr)){
                                                                        $cyernm=$recordsyr['yer'];
                                                                    }
                                                            ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $cyernm; ?></td>
                                                                <td><?php echo $capcnt; ?></td>
                                                                <td><?php echo $cflcnt; ?></td>
                                                                <td><?php echo $cmlvlse; ?></td>
                                                                <td><?php echo $cmlvlhun; ?></td>
                                                                <td><?php echo $cmlvlcuo; ?></td>
                                                                <?php
                                                                    if($prboid=="Normal"){
                                                                ?>
                                                                <td><a href="../../../Action/result/srUpdate.php?srid=<?php echo $csclid; ?>"><button class="btn btn-primary"> EDIT </button></a><br><br>
                                                                <a href="../../../Action/result/srDelete.php?srid=<?php echo $csclid; ?>"><button class="btn btn-danger"> DELETE </button></a></td>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                            
                                                            
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th id="tbl27f1">Total</th>
                                                                <th id="tbl27f2"><?php echo $capcntTot;?></th>
                                                                <th id="tbl27f2"><?php echo $cflcntTot;?></th>
                                                                <th id="tbl27f3"><?php echo $cmlvlseTot;?></th>
                                                                <th id="tbl27f4"><?php echo $cmlvlhunTot;?></th>
                                                                <th id="tbl27f5"><?php echo $cmlvlcuoTot;?></th>
                                                                <?php
                                                                    if($prboid=="Normal"){
                                                                ?>
                                                                <th id="tbl27f6"><?php echo '';?></th>
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

    $('#example27').DataTable({
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