<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==2 || $_SESSION['ref']==5){
?>

<?php
    if(isset($_POST['submit'])){
        $id=$_POST['Otid'];
    }else{
    $id=$_GET['id'];
    }
    $sqltq="SELECT * FROM teacher where tid = $id ";
    $resulttq=$conn->query($sqltq);
?>

<?php
    if(isset($_POST['submit'])){

        // $otid=$id;
        $id=$_POST['Otid'];
        $TfullName=$_POST['OfullName'];
        $TaddressT=$_POST['OaddressT'];
        $Tonic=$_POST['Onic'];
        $Tnic=strtoupper($Tonic);
        $Tdob=$_POST['Odob'];
        $Ttp=$_POST['Otp'];
        $Twtp=$_POST['Owtp'];
        $Tsex=$_POST['Osex'];
        $Tmstatus=$_POST['Omstatus'];
        $TfbName=$_POST['OfbName'];
        $TeMail=$_POST['OeMail'];
        $Tsalschool=$_POST['Osalschool'];
        $placement=$_POST['Oplacement'];
        $Tscid=$_POST['Oscid'];
        $Tpllang=$_POST['Opllang'];
        $Tpldate=$_POST['Opldate'];
        $TsuID=$_POST['OsuID'];
        $Tprofession=$_POST['Oprofession'];

        $TfullNamevar = base64_encode($TfullName);
        $TaddressTvar = base64_encode($TaddressT);
        $Tnicvar = base64_encode($Tnic);

        $Ttpvar = base64_encode($Ttp);
        $Twtpvar = base64_encode($Twtp);
        $Tsexvar = base64_encode($Tsex);
        
        $TfbNamevar = base64_encode($TfbName);
        $TeMailvar = base64_encode($TeMail);
        $Tsalschoolvar = base64_encode($Tsalschool);

        if($_SESSION['ref']==1 || $_SESSION['ref']==2){
            $update="UPDATE teacher SET fullname='$TfullNamevar',addressT='$TaddressTvar',nic='$Tnicvar',dob='$Tdob',tp='$Ttpvar',wtp='$Twtpvar',sex='$Tsexvar',mstatus='$Tmstatus',fbName='$TfbNamevar',eMail='$TeMailvar',salschool='$Tsalschoolvar',placement='$placement',scid='$Tscid',pllang='$Tpllang',pldate='$Tpldate',suID='$TsuID',cpro='$Tprofession' where tid=$id ";
        }elseif($_SESSION['ref']==5){
            $update="INSERT INTO teachertmp(tid,fullname,addressT,nic,dob,tp,wtp,sex,mstatus,fbName,eMail,salschool,placement,scid,pllang,pldate,suID,cpro)VALUES('$id','$TfullNamevar','$TaddressTvar','$Tnicvar','$Tdob','$Ttpvar','$Twtpvar','$Tsexvar','$Tmstatus','$TfbNamevar','$TeMailvar','$Tsalschoolvar','$placement','$Tscid','$Tpllang','$Tpldate','$TsuID','$Tprofession') ";
        }                                                                                                                                                                                                                                                                                                                                        

        if($conn-> query($update)==TRUE){
?>

<Script>
    
<?php
    if($_SESSION['ref']==2){
?>
    alert("Teacher Details Updated!");
    location= '../../htmlPages/AdminPannel/teacher.php';
<?php
    }elseif($_SESSION['ref']==1 || $_SESSION['ref']==2){
?>
        alert("Teacher Details Updated!");
        location= '../../htmlPages/clientSide/teacherlist.php';
<?php
    }elseif($_SESSION['ref']==5){
?>
        alert("Teacher Details will be Updated after Principal Approval!");
        location= '../../htmlPages/clientSide/teacherlist.php';

<?php
    }
?>

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
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
            require_once '../../htmlPages/AdminPannel/menu/actionFolderMenu.php';
        }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){
            require_once '../../htmlPages/AdminPannel/menu/actionFolder/actionPrincMenu.php';
        }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){
            require_once '../../htmlPages/AdminPannel/menu/actionFolder/actionTeachMenu.php';
        }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <?php 
                    if($_SESSION['ref']==2){
                ?>
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href = '../../htmlPages/AdminPannel/teacher.php'><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <?php
                    }elseif($_SESSION['ref']==1){
                ?>
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href = '../../htmlPages/clientSide/teacherlist.php'><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <?php
                    }
                ?>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update</em></strong></h1><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Update Teacher</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"> comment </p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                    <?php
                                        while($recordtq = mysqli_fetch_array($resulttq)){
                                            $enfullname = $recordtq['fullname'];
                                            $enaddressT = $recordtq['addressT'];
                                            $ennic = $recordtq['nic'];
                                            $entp = $recordtq['tp'];
                                            $enwtp = $recordtq['wtp'];
                                            $ensex = $recordtq['sex'];
                                            $eneMail = $recordtq['eMail'];
                                            $enfbName = $recordtq['fbName'];
                                            $ensalschool = $recordtq['salschool'];

                                            $deenfullname = base64_decode($enfullname);
                                            $deenaddressT = base64_decode($enaddressT);
                                            $deennic = base64_decode($ennic);
                                            $deentp = base64_decode($entp);
                                            $deenwtp = base64_decode($enwtp);
                                            $deensex = base64_decode($ensex);
                                            $deeneMail = base64_decode($eneMail);
                                            $deenfbName = base64_decode($enfbName);
                                            $deensalschool = base64_decode($ensalschool);            
                                    ?>
                                        <div class="form-group">
                                            <label for="OfullName" style="color:#000000;">Full Name</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                <input type="text" class="form-control" id = "OfullName1"  name="OfullName" value="<?php echo $deenfullname; ?>" placeholder="ENTER NAME WITH INITIALS" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="OaddressT" style="color:#000000;">Address</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "OaddressT1"  name="OaddressT" value="<?php echo $deenaddressT;?>" placeholder="ENTER ADDRESS" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Onic" style="color:#000000;">NIC</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" style="text-transform:uppercase;"  class="form-control" id = "Onic1"  name="Onic" value="<?php echo $deennic;?>" placeholder="ENTER NIC" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Odob" style="color:#000000;">DOB</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Odob1" name="Odob" value="<?php echo $recordtq['dob'];?>" placeholder="ENTER DATE OF BIRTH" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Otp" style="color:#000000;">Phone Number</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                <input type="text" class="form-control" id = "Otp1" name="Otp" value="<?php echo $deentp;?>" placeholder="ENTER TELEPHONE NUMBER" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Owtp" style="color:#000000;">WhatsApp Number</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Owtp1" name="Owtp" value="<?php echo $deenwtp;?>" placeholder="ENTER WHATSAPP NUMBER" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                                $sres=$deensex;
                                                $ssrr1="";
                                                $ssrr2="";
                                                $ssrr3="";

                                                $sml1="Male";
                                                $sml2="Female";
                                                $sml3="Other";

                                                if($sres==$sml1){
                                                    $ssrr1="selected";
                                                }elseif($sres==$sml2){
                                                    $ssrr2="selected";
                                                }elseif($sres==$sml3){
                                                    $ssrr3="selected";
                                                }
                                            ?>
                                            <label for="Osex" style="color:#000000;">Gender</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Osex1" name="Osex" placeholder="ENTER SEX" required>
                                                    <option value="Male" <?php echo $ssrr1 ?>>Male</option>
                                                    <option value="Female" <?php echo $ssrr2 ?>>Female</option>
                                                    <option value="Other" <?php echo $ssrr3 ?>>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                            $jjc="";
                                            $grood="";
                                            $sqlmst="SELECT * FROM mstatus ";
                                            $resultmst=$conn->query($sqlmst);
                                        ?>
                                        <div class="form-group">
                                            <label for="Omstatus" style="color:#000000;">Marital Status</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Omstatus1" name="Omstatus" placeholder="ENTER MARITAL STATUS ID" required>
                                                    <?php
                                                        while($recordmst = mysqli_fetch_array($resultmst)){  
                                                            $msta=$recordmst['mrid'];
                                                            $kklm=$recordtq['mstatus'];
                                                            $enkklmnams = $recordmst['status'];
                                                            $deenkklmnams = base64_decode($enkklmnams); 
                                                            if($msta==$kklm){
                                                                $jjc='selected';
                                                                $grood=$msta;
                                                            }

                                                    ?>
                                                        <option value="<?php echo $msta; ?>"  <?php if($grood==$msta){echo $jjc;}?>><?php echo $deenkklmnams; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="OfbName" style="color:#000000;">FB Name</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "OfbName1" name="OfbName" value="<?php echo $deenfbName;?>" placeholder="ENTER FACEBOOK NAME" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="OeMail" style="color:#000000;">E-mail</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "OeMail1" name="OeMail" value="<?php echo $deeneMail;?>" placeholder="ENTER E-MAIL ADDRESS" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Osalschool" style="color:#000000;">Salary Earning School</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Osalschool1" name="Osalschool" value="<?php echo $deensalschool;?>" placeholder="ENTER EARNING SCHOOL" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                                $zzc="";
                                                $bood="";
                                                $sqlpct="SELECT * FROM plcategory ";
                                                $resultpct=$conn->query($sqlpct);
                                            ?>
                                            <label for="Oplacement" style="color:#000000;">Placement Category</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Oplacement1" name="Oplacement" placeholder="ENTER PLACEMENT CATEGORY" required>
                                                    <?php
                                                        while($recordpct = mysqli_fetch_array($resultpct)){  
                                                            $boc=$recordpct['plid'];
                                                            $booh=$recordtq['placement'];
                                                            $ennameplcsa = $recordpct['name'];
                                                            $deennameplcsa = base64_decode($ennameplcsa);
                                                            if($boc==$booh){
                                                                $zzc='selected';
                                                                $bood=$boc;
                                                            }
                                                    ?>
                                                        <option value="<?php echo $boc; ?>" <?php if($bood==$boc){echo $zzc;}?>><?php echo $deennameplcsa; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                                $bbc="";
                                                $bbcd="";
                                                $sqlbn="SELECT * FROM school ";
                                                $resultbn=$conn->query($sqlbn);
                                            ?>
                                            <label for="Oscid" style="color:#000000;">School</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Oscid1" name="Oscid" placeholder="ENTER SCHOOL ID" required>
                                                    <?php
                                                        while($recordbn = mysqli_fetch_array($resultbn)){  
                                                            $scc=$recordbn['scid'];
                                                            $scch=$recordtq['scid'];
                                                            $enscchglu = $recordbn['name'];
                                                            $deenscchglu = base64_decode($enscchglu);
                                                            if($scc==$scch){
                                                                $bbc='selected';
                                                                $bbcd=$scc;
                                                            }
                                                    ?>
                                                        <option value="<?php echo $scc; ?>" <?php if($bbcd==$scc){echo $bbc;}?>><?php echo $deenscchglu; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <?php
                                            $dlc="";
                                            $llcd="";
                                            $sqllan="SELECT * FROM languages ";
                                            $resultlan=$conn->query($sqllan);
                                        ?>
                                        <label for="Opllang" style="color:#000000;">Placement Language</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Opllang1" name="Opllang" placeholder="ENTER PLACEMENT LANGUAGE ID" required>
                                                    <?php
                                                        while($recordlan = mysqli_fetch_array($resultlan)){  
                                                            $lj=$recordlan['lid'];
                                                            $llj=$recordtq['pllang'];
                                                            $ennamehl = $recordlan['name'];
                                                            $deennamehl = base64_decode($ennamehl);
                                                            if($lj==$llj){
                                                                $dlc='selected';
                                                                $llcd=$lj;
                                                            }
                                                    ?>
                                                        <option value="<?php echo $lj; ?>" <?php if($llcd==$lj){echo $dlc;}?>><?php echo $deennamehl; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Opldate" style="color:#000000;">Placement Date</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="text" class="form-control" id = "Opldate1" name="Opldate" value="<?php echo $recordtq['pldate'];?>" placeholder="ENTER DATE OF PLACEMENT" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <?php
                                            $kkc="";
                                            $kkcd="";
                                            $sqlsip="SELECT * FROM subject ";
                                            $resultsip=$conn->query($sqlsip);
                                        ?>
                                        <label for="OsuID" style="color:#000000;">Placement Subject</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "OsuID1" name="OsuID" placeholder="ENTER PLACEMENT SUBJECT ID" required>
                                                    <?php
                                                        while($recordsip = mysqli_fetch_array($resultsip)){  
                                                            $kj=$recordsip['suID'];
                                                            $caj=$recordsip['caid'];
                                                            $stj=$recordsip['ssid'];

                                                            $sqlsca="SELECT * FROM subcategory where caid = $caj";
                                                            $resultsca=$conn->query($sqlsca);
                                                            while($recordsca = mysqli_fetch_array($resultsca)){
                                                                $cajnam = $recordsca['name'];
                                                                $decajnam = base64_decode($cajnam);
                                                            }

                                                            $sqlsst="SELECT * FROM substream where ssid = $stj";
                                                            $resultsst=$conn->query($sqlsst);
                                                            while($recordsst = mysqli_fetch_array($resultsst)){
                                                                $sstjnam = $recordsst['name'];
                                                                $desstjnam = base64_decode($sstjnam);
                                                            }

                                                            $kkj=$recordtq['suID'];
                                                            $ennamesubgs = $recordsip['name'];
                                                            $deennamesubgs = base64_decode($ennamesubgs);
                                                            if($kj==$kkj){
                                                                $kkc='selected';
                                                                $kkcd=$kj;
                                                            }
                                                    ?>
                                                        <option value="<?php echo $kj; ?>" <?php if($kkcd==$kj){echo $kkc;}?>><?php echo $deennamesubgs." ( ".$desstjnam." - ".$decajnam." )"; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <?php
                                            $pscpc="";
                                            $ssk="";
                                            $sqlpr="SELECT * FROM profession ";
                                            $resultpr=$conn->query($sqlpr);
                                        ?>
                                        <label for="Oprofession" style="color:#000000;">Proffession</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Oprofession1" name="Oprofession" placeholder="ENTER PROFESSION" required>
                                                    <?php
                                                        while($recordpr = mysqli_fetch_array($resultpr)){  
                                                            $ss=$recordpr['proid'];
                                                            $cpc=$recordtq['cpro'];
                                                            $ennamelsvn = $recordpr['name'];
                                                            $deennamelsvn = base64_decode($ennamelsvn);
                                                            if($ss==$cpc){
                                                                $pscpc='selected';
                                                                $ssk=$ss;
                                                            }

                                                    ?>
                                                        
                                                        <option value="<?php echo $ss; ?>" <?php if($ssk==$ss){echo $pscpc;}?>><?php echo $deennamelsvn; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group"> -->
                                        <input type="hidden" class="form-control" id = "Otid1" name="Otid" value="<?php echo $recordtq['tid'];?>" required>
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