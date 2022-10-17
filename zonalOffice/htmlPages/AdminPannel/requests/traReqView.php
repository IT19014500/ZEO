<?php
    try{
        include('../../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>
<?php
    try{
        if(isset($_GET['bnid'])){
            $vtid = $_GET['bnid'];
            $intridr = $_GET['intridb'];
        }else{
            $vtid = 0;
        }
    }catch(Exception $e) {
        echo "Authentication Failed!";
    }
?>
<?php
    try{
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

        $sqlipp="SELECT * FROM interzoneprovi";
        $resultipp=$conn->query($sqlipp);
    }catch(Exception $e) {
        echo "Data Reading Failed!";
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
    <link rel="icon" type="image/png" sizes="16x16" href="../../../images/logoGvmnt.png">
    <title>ZEO BIO</title>
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
                require_once '../menu/topNavigation/headteEditTPN.php';
            }catch(Exception $e){
                echo "Top Navigation Loading Failed!";
            }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            try{
                require_once '../menu/adminSecondIntreq.php';
            }catch(Exception $e){
                echo "Navigation Bar Loading Failed!";
            }
        ?>
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href="traReqInterDetail.php?intrid=<?php echo $intridr;?>"><button class="btn btn-block btn-primary">Back</button></a>
                </div><br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>BIO</em></strong></h1><br>
                <div class="row">
                        <div class="col-md-8">
                            <div style="background-color:#d6ddff;" class="white-box">
                            
                                <!-- <p class="text-muted m-b-30 font-13"></p> -->
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <h3 class="box-title m-b-0">Personal Information</h3><br>
                                        <!-- <p class="text-muted m-b-30 font-13"> Use Bootstrap's predefined grid classes for horizontal form </p> -->
                                           
                                        <form action="traReqInterDetail.php" class="form-horizontal" id="text" method="post">
                                            <?php
                                                try{
                                                    $sqlrdta="SELECT * FROM teacher where tid = $vtid ";
                                                    $resultrdta=$conn->query($sqlrdta);
                                                }catch(Exception $e){
                                                    echo "Data Reading Failed!";
                                                }
                                                try{
                                                    while($recordrdta = mysqli_fetch_array($resultrdta)){
                                                        $fullnamend = $recordrdta['fullname'];
                                                        $addressTnd = $recordrdta['addressT'];
                                                        $nicnd = $recordrdta['nic'];
                                                        $dobnd = $recordrdta['dob'];
                                                        $tpnd = $recordrdta['tp'];
                                                        $wtpnd = $recordrdta['wtp'];
                                                        $sexnd = $recordrdta['sex'];
                                                        $mstatusnd = $recordrdta['mstatus'];
                                                        $salschoolnd = $recordrdta['salschool'];
                                                        $placementnd = $recordrdta['placement'];
                                                        $scidnd = $recordrdta['scid'];
                                                        $pllangnd = $recordrdta['pllang'];
                                                        $pldatend = $recordrdta['pldate'];

                                                        $gdate=date('Y-m-d');

                                                        $dastri = (int)$gdate - (int)$pldatend;

                                                        $suIDnd = $recordrdta['suID'];
                                                        $cprond = $recordrdta['cpro'];

                                                        $defullnamend = base64_decode($fullnamend);
                                                        $deaddressTnd = base64_decode($addressTnd);
                                                        $denicnd = base64_decode($nicnd);
                                                        
                                                        $detpnd = base64_decode($tpnd);
                                                        $dewtpnd = base64_decode($wtpnd);
                                                        $desexnd = base64_decode($sexnd);
                                                        $demstatusnd = base64_decode($mstatusnd);
                                                        $desalschoolnd = base64_decode($salschoolnd);
                                                        $deplacementnd = base64_decode($placementnd);

                                                    }
                                                }catch(Exception $e){
                                                    echo "Data Processing Failed!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                            ?>
                                                    <div class="form-group">
                                                        <label for="nme" style="color:#000000;" class="col-sm-3 control-label">Name in Full</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="nme1" name="nme" value="<?php if(isset($defullnamend)){ echo $defullnamend; } ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pma" style="color:#000000;" class="col-sm-3 control-label">DOB</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="pma1" name="pma" value="<?php if(isset($dobnd)){echo $dobnd; } ?>"> </div>
                                                        </div>
                                                    </div><div class="form-group">
                                                        <label for="nic" style="color:#000000;" class="col-sm-3 control-label">Telephone</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="nic1" name="nic" value="<?php if(isset($detpnd)){ echo $detpnd; }?>"> </div>
                                                        </div>
                                                    </div><div class="form-group">
                                                        <label for="tpn" style="color:#000000;" class="col-sm-3 control-label">WhatsApp</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="tpn1" name="tpn" value="<?php if(isset($dewtpnd)){ echo $dewtpnd; } ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="wtp" style="color:#000000;" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="wtp1" name="wtp" value="<?php if(isset($deaddressTnd)){ echo $deaddressTnd; } ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gdr" style="color:#000000;" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="gdr1" name="gdr" value="<?php if(isset($desexnd)){ echo $desexnd; } ?>"> </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }catch(Exception $e){
                                                    echo "Navigation Bar Loading Failed!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                                    $sqlcst="SELECT * FROM mstatus where mrid = $mstatusnd";
                                                    $resultcst=$conn->query($sqlcst);
                                                    while($recordcst = mysqli_fetch_array($resultcst)){
                                                        $mstatusndnme = $recordcst['status'];
                                                        $demstatusndnme = base64_decode($mstatusndnme);
                                                    }
                                                }catch(Exception $e){
                                                    echo "Marital Status Loading Failed!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                            ?>
                                                    <div class="form-group">
                                                        <label for="mts" style="color:#000000;" class="col-sm-3 control-label">Civil Status</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="mts1" name="mts" value="<?php if(isset($demstatusndnme)){ echo $demstatusndnme; } ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fbn" style="color:#000000;" class="col-sm-3 control-label">First App Date</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="fbn1" name="fbn" value="<?php if(isset($pldatend)){ echo $pldatend; } ?>"> </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }catch(Exception $e){
                                                    echo "Application Loading Failed!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                                    $sqlsuh="SELECT * FROM subject where suID = $suIDnd";
                                                    $resultsuh=$conn->query($sqlsuh);
                                                    while($recordsuh = mysqli_fetch_array($resultsuh)){
                                                        $suIDndnm = $recordsuh['name'];
                                                        $desuIDndnm = base64_decode($suIDndnm);
                                                    }
                                                }catch(Exception $e){
                                                    echo "Suject List Loading Failed!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                            ?>
                                                    <div class="form-group">
                                                        <label for="ema" style="color:#000000;" class="col-sm-3 control-label">Subject Appointed</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="ema1" name="ema" value="<?php if(isset($desuIDndnm)){ echo $desuIDndnm; } ?>"> </div>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label for="csdp" style="color:#000000;" class="col-sm-3 control-label">Essestial Service Period-Years</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="csdp1" name="csdp" value="<?php if(isset($dastri)){ echo $dastri; } ?>"> </div>
                                                        </div>
                                                    </div><br>
                                            <?php
                                                }catch(Exception $e){
                                                    echo "Application Loading Failed!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                                    $sqlgrd="SELECT * FROM nonprinciple where tid = $vtid";
                                                    $resultgrd=$conn->query($sqlgrd);
                                                    while($recordgrd = mysqli_fetch_array($resultgrd)){
                                                        $nprgrd = $recordgrd['owgrade'];
                                                        $msubjectgrd = $recordgrd['msubject'];
                                                        
                                                        $sqlbl="SELECT * FROM subject where suID = $msubjectgrd";
                                                        $resultbl=$conn->query($sqlbl);
                                                        while($recordbl = mysqli_fetch_array($resultbl)){
                                                            $blca = $recordbl['caid'];
                                                            $blstr = $recordbl['ssid'];
                                                            $blbv = $recordbl['name'];
                                                            

                                                            $deblbv = base64_decode($blbv);

                                                            $sqlstjo="SELECT * FROM substream where ssid = $blstr";
                                                            $resultstjo=$conn->query($sqlstjo);
                                                            while($recordstjo = mysqli_fetch_array($resultstjo)){
                                                                $blstjo = $recordstjo['name'];
                                                                $deblstjo = base64_decode($blstjo);
                                                            }

                                                            $sqljtoc="SELECT * FROM subcategory where caid = $blca";
                                                            $resultjtoc=$conn->query($sqljtoc);
                                                            while($recordjtoc = mysqli_fetch_array($resultjtoc)){
                                                                $bljtoc = $recordjtoc['name'];
                                                                $debljtoc = base64_decode($bljtoc);
                                                            }

                                                            
                                                            $sqlsgor="SELECT * FROM serandgrade where sgid = $nprgrd";
                                                            $resultsgor=$conn->query($sqlsgor);
                                                            while($recordsgor = mysqli_fetch_array($resultsgor)){
                                                                $nprsgnamg = $recordsgor['grade'];
                                                                $denprsgnamg = base64_decode($nprsgnamg);
                                                            }
                                                        }
                                                    }
                                                }catch(Exception $e){
                                                    echo "Non Principal Details Loading Failed!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                            ?>
                                                    <div class="form-group">
                                                        <label for="csdpn" style="color:#000000;" class="col-sm-3 control-label">Subject Teaching</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="csdpn1" name="csdpn" value="<?php if(isset($deblbv)){ echo $deblbv." (".$deblstjo."-".$debljtoc.")"; } ?>"> </div>
                                                        </div>
                                                    </div><br>
                                            <?php
                                                }catch(Exception $e){
                                                    echo "Application Loading Failed!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                                    $sqlrns="SELECT * FROM school where scid = $scidnd";
                                                    $resultrns=$conn->query($sqlrns);
                                                    while($recordrns = mysqli_fetch_array($resultrns)){
                                                        $scidndnm = $recordrns['name'];
                                                        $descidndnm = base64_decode($scidndnm);
                                                    }
                                                }catch(Exception $e){
                                                    echo "School List Loading Failed!";
                                                }
                                            ?>
                                            <?php
                                                try{
                                            ?>
                                                    <div class="form-group">
                                                        <label for="csdpr" style="color:#000000;" class="col-sm-3 control-label">Name of School</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="csdpr1" name="csdpr" value="<?php if(isset($descidndnm)){echo $descidndnm;} ?>"> </div>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label for="csdpy" style="color:#000000;" class="col-sm-3 control-label">Service Grade</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                                <input style="color:#000000;" type="text" class="form-control" id="csdpy1" name="csdpy" value="<?php if(isset($denprsgnamg)){echo $denprsgnamg; } ?>"> </div>
                                                        </div>
                                                    </div><br>
                                            <?php
                                                }catch(Exception $e){
                                                    echo "Application Loading Failed!";
                                                }
                                            ?>
                                            <h6 style="color:#000000;" class="m-b-30 font-13">Extra Activities</h6>
                                            <?php
                                                try{
                                                    $sqlextr="SELECT * FROM extractvi where tid = $vtid";
                                                    $resultextr=$conn->query($sqlextr);
                                                }catch(Exception $e){
                                                    echo "Extra Activity List Loading Failed!";
                                                }
                                            ?>
                                            <div class="table-responsive">
                                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                                    <caption style="color:#000000;">Activity List</caption>
                                                    <thead>
                                                        <tr>
                                                            <th>EID</th>
                                                            <th>Activity</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <!-- <th>EID</th>
                                                            <th>Activity</th> -->
                                                        </tr> 
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                            try{
                                                                while($recordextr = mysqli_fetch_array($resultextr)){
                                                                    $extActndnm = $recordextr['extAct'];
                                                                    $deextActndnm = base64_decode($extActndnm);
                                                                    $eidndnm = $recordextr['eid'];
                                                                    $tidndnm = $recordextr['tid'];
                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $eidndnm; ?></td>
                                                                <td><?php echo $deextActndnm; ?></td>
                                                            </tr>
                                                        <?php
                                                                }
                                                            }catch(Exception $e){
                                                                echo "Data Processing Failed!";
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <br><br>
                                            <h6 style="color:#000000;" class="m-b-30 font-13">Former Service Information</h6>
                                            <?php
                                                $sqlerlo="SELECT * FROM erservice where tid = $vtid";
                                                $resulterlo=$conn->query($sqlerlo);
                                            ?>
                                            <div class="table-responsive">
                                                <table id="example26" class="display nowrap" cellspacing="0" width="100%">
                                                    <caption style="color:#000000;">Early Service Schools</caption>
                                                    <thead>
                                                        <tr>
                                                            <th>Province</th>
                                                            <th>Zone</th>
                                                            <th>School</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <!-- <th>Province</th>
                                                            <th>Zone</th>
                                                            <th>School</th>
                                                            <th>From</th>
                                                            <th>To</th> -->
                                                        </tr> 
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                            try{
                                                                while($recorderlo = mysqli_fetch_array($resulterlo)){
                                                                    $proidnds = $recorderlo['proid'];
                                                                    $zidnds = $recorderlo['zid'];
                                                                    $schoolnds = $recorderlo['school'];
                                                                    $deschoolnds = base64_decode($schoolnds);
                                                                    $sdatends = $recorderlo['sdate'];
                                                                    $endatends = $recorderlo['endate']; 
                                                        ?>
                                                            <tr style="color:#000000;background-color:#ffffff;">
                                                                <td><?php echo $proidnds; ?></td>
                                                                <td><?php echo $zidnds; ?></td>
                                                                <td><?php echo $deschoolnds; ?></td>
                                                                <td><?php echo $sdatends; ?></td>
                                                                <td><?php echo $endatends; ?></td>
                                                            </tr>
                                                        <?php
                                                                }
                                                            }catch(Exception $e){
                                                                echo "Data Processing Failed!";
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div><br>
                                        </form>
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
    }catch(Exception $e) {
        echo "Connection Failed!";
    }
?>