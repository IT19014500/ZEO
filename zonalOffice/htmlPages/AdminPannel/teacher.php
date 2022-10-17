<?php
try{
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>
<?php
    try{
        $reiduc = 5;
        $sql3="SELECT * FROM teacher";
        $result3=$conn->query($sql3);
    }catch(Exception $e) {
        echo "Teacher List Readging Failed!";
    }
?>
<?php
    try{
        if(isset($_POST['submit'])){
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
            $Tnicmd = md5($Tnic);

            $Ttpvar = base64_encode($Ttp);
            $Twtpvar = base64_encode($Twtp);
            $Tsexvar = base64_encode($Tsex);
            
            $TfbNamevar = base64_encode($TfbName);
            $TeMailvar = base64_encode($TeMail);
            $Tsalschoolvar = base64_encode($Tsalschool);
            
            $cknstn = "No";
            $sqltcon="SELECT * FROM teacher where nic= '$Tnicvar'";
            $resulttcon=$conn->query($sqltcon);
            while($recordtcon = mysqli_fetch_array($resulttcon)){
            $cknstn = "Yes";
            }
            if($cknstn == "No"){
            $add="INSERT INTO teacher(fullname,addressT,nic,dob,tp,wtp,sex,mstatus,fbName,eMail,salschool,placement,scid,pllang,pldate,suID,cpro)VALUES('$TfullNamevar','$TaddressTvar','$Tnicvar','$Tdob','$Ttpvar','$Twtpvar','$Tsexvar','$Tmstatus','$TfbNamevar','$TeMailvar','$Tsalschoolvar','$placement','$Tscid','$Tpllang','$Tpldate','$TsuID','$Tprofession')";

            $addusrby="INSERT INTO users(email,uname,pwd,reid)VALUES('$Tnicvar','$Tnicvar','$Tnicmd','$reiduc')";
            $conn-> query($addusrby);
            }elseif($cknstn == "Yes"){
            ?> 
            <Script>
                alert("Already added!");
                location='teacher.php';
            </Script>      
            <?php
            }
            if($conn-> query($add)==TRUE){
        ?>
        <Script>
            alert("Teacher Details Added!");
            location='teacher.php';
        </Script>
        <?php
            exit();
            }
        }
    }catch(Exception $e) {
        echo "Insert Failed!";
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
    <link href="jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- ===== Animation CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/css/colors/default.css" id="theme" rel="stylesheet">
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
                require_once 'menu/topNavigation/mainAdminTPN.php';
            }catch(Exception $e) {
                echo "Top Navigation Loading Failed!";
            }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            try{
                require_once 'menu/mainAdmin.php';
            }catch(Exception $e) {
                echo "Navigation Bar Loading Failed!";
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Teachers</em></strong></h1><br>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="" method="post">
                            <input type="text" class="form-control" id = "OfullName1"  name="OfullName" placeholder="ENTER NAME WITH INITIALS" required>
                            <br>
                            <input type="text" class="form-control" id = "OaddressT1"  name="OaddressT" placeholder="ENTER ADDRESS" required>
                            <br>
                            <input type="text"  class="form-control" style="text-transform:uppercase;" id = "Onic1"  name="Onic" placeholder="ENTER NIC" required>
                            <br>
                            <input type="text" class="form-control" id = "Odob1" name="Odob" placeholder="ENTER DATE OF BIRTH" required>
                            <br>
                            <input type="text" class="form-control" id = "Otp1" name="Otp" placeholder="ENTER TELEPHONE NUMBER" >
                            <br>
                            <input type="text" class="form-control" id = "Owtp1" name="Owtp" placeholder="ENTER WHATSAPP NUMBER" >
                            <br>
                            <select class="form-control" id = "Osex1" name="Osex" placeholder="ENTER SEX" required>
                                <option value="Not Selected" selected>-Select Gender-</option>
                                <option value="Male" >Male</option>
                                <option value="Female" >Female</option>
                                <option value="Other" >Other</option>
                            </select>
                            <br>   
                            <?php
                                try{
                                    $sqlmst="SELECT * FROM mstatus ";
                                    $resultmst=$conn->query($sqlmst);
                                }catch(Exception $e) {
                                    echo "Marital Status Reading Failed!";
                                }
                            ?> 
                            <select class="form-control" id = "Omstatus1" name="Omstatus" placeholder="ENTER MARITAL STATUS ID" required>
                                <option value="0" selected>-Select Marital Status-</option>
                                <?php
                                    try{
                                        while($recordmst = mysqli_fetch_array($resultmst)){  
                                            $msta=$recordmst['mrid'];
                                            $mstanam=$recordmst['status'];
                                            $demstanam = base64_decode($mstanam);
                                ?>
                                        <option value="<?php echo $msta; ?>" ><?php echo $demstanam; ?></option>
                                <?php
                                        }
                                    }catch(Exception $e) {
                                        echo "Marital Category Loading Failed!";
                                    }
                                ?>
                            </select>
                            <br>            
                            <input type="text" class="form-control" id = "OfbName1" name="OfbName" placeholder="ENTER FACEBOOK NAME" >
                            <br>
                            <input type="text" class="form-control" id = "OeMail1" name="OeMail" placeholder="ENTER E-MAIL ADDRESS" >
                            <br>
                            <?php
                                try{
                                    $sqlersc="SELECT * FROM school where scid != 110";
                                    $resultersc=$conn->query($sqlersc);
                                    echo "<div style='width:325px;'>";
                                    echo "<select id='Oscid1' name='Oscid' class='form-control' required>";
                                    echo "<option vaue='0' selected>-- Select School --</option>";
                                    while($recordersc = mysqli_fetch_array($resultersc)){  
                                        $ersi=$recordersc['scid'];
                                        $ersinam=$recordersc['name'];
                                        $deersinam = base64_decode($ersinam);
                                        echo "<option value='$ersi'>$deersinam</option>";
                                    }
                                    echo "</select>";
                                    echo "</div><br>";
                                    }catch(Exception $e) {
                                        echo "School list loading Fail!";
                                    }
                            ?>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
                                <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />
                                <script>
                                    $("#Oscid1").chosen();
                                </script>
                            <input type="text" class="form-control" id = "Osalschool1" name="Osalschool" placeholder="ENTER SALARY EARNING SCHOOL" >
                            <br>
                            <?php
                                try{
                                    $sqlbn="SELECT * FROM plcategory ";
                                    $resultbn=$conn->query($sqlbn);
                                }catch(Exception $e) {
                                    echo "Placement Category Reading Failed!";
                                }
                            ?> 
                            <select class="form-control" id = "Oplacement1" name="Oplacement" placeholder="ENTER PLACEMENT CATEGORY" required>
                                <option value="Placement" selected>-Select Placement Category-</option>
                                    <?php
                                    try{
                                        while($recordbn = mysqli_fetch_array($resultbn)){  
                                            $pcc=$recordbn['plid'];
                                            $pccnam=$recordbn['name'];
                                            $depccnam = base64_decode($pccnam);
                                    ?>
                                            <option value="<?php echo $pcc; ?>" ><?php echo $depccnam; ?></option>
                                <?php
                                        }
                                    }catch(Exception $e) {
                                        echo "Placement Category Loading Failed!";
                                    }
                                ?>
                                </select>
                            <br>
                            <?php
                                try{
                                    $sqllan="SELECT * FROM languages ";
                                    $resultlan=$conn->query($sqllan);
                                }catch(Exception $e) {
                                    echo "Language List Reading Failed!";
                                }
                            ?> 
                            <select class="form-control" id = "Opllang1" name="Opllang" placeholder="ENTER PLACEMENT LANGUAGE ID" required>
                                <option value="0" selected>-Select Placement Language-</option>
                                <?php
                                    try{
                                        while($recordlan = mysqli_fetch_array($resultlan)){  
                                            $lj=$recordlan['lid'];
                                            $ljnam=$recordlan['name'];
                                            $deljnam = base64_decode($ljnam);
                                ?>
                                            <option value="<?php echo $lj; ?>"><?php echo $deljnam; ?></option>
                                <?php
                                        }
                                    }catch(Exception $e) {
                                        echo "Language List Loading Failed!";
                                    }
                                ?>
                            </select>
                            <br>
                            <input type="text" class="form-control" id = "Opldate1" name="Opldate" placeholder="ENTER DATE OF PLACEMENT" required>
                            <br>
                            <?php
                                try{
                                    $sqlsip="SELECT * FROM subject";
                                    $resultsip=$conn->query($sqlsip);
                                }catch(Exception $e) {
                                    echo "Subject List Reading Failed!";
                                }
                            ?> 
                            <select class="form-control" id = "OsuID1" name="OsuID" placeholder="ENTER PLACEMENT SUBJECT ID" required>
                                <option value="0" selected>-Select Placement Subject-</option>
                                <?php
                                    try{
                                        while($recordsip = mysqli_fetch_array($resultsip)){  
                                            $caj=$recordsip['caid'];
                                            $stj=$recordsip['ssid'];
                                            $kj=$recordsip['suID'];
                                            $kjnam=$recordsip['name'];
                                            $dekjnam = base64_decode($kjnam);

                                            $sqlcas="SELECT * FROM subcategory where caid= $caj";
                                            $resultcas=$conn->query($sqlcas);
                                            while($recordcas = mysqli_fetch_array($resultcas)){
                                            $canna = $recordcas['name'];
                                            $decanna = base64_decode($canna);
                                            }

                                            $sqlstl="SELECT * FROM substream where ssid= $stj";
                                            $resultstl=$conn->query($sqlstl);
                                            while($recordstl = mysqli_fetch_array($resultstl)){
                                            $stanna = $recordstl['name'];
                                            $destanna = base64_decode($stanna);
                                            }

                                    ?>
                                        <option value="<?php echo $kj; ?>"><?php echo $dekjnam." (".$destanna." - ".$decanna.")"; ?></option>
                                <?php
                                        }
                                    }catch(Exception $e) {
                                        echo "Subject List Loading Failed!";
                                    }
                                ?>
                                </select>
                            <br>
                            <?php
                            try{
                                $sqlpr="SELECT * FROM profession ";
                                $resultpr=$conn->query($sqlpr);
                            }catch(Exception $e) {
                                echo "Profession List Reading Failed!";
                            }
                            ?> 
                            <select class="form-control" id = "Oprofession1" name="Oprofession" placeholder="ENTER PROFESSION" required>
                                <option value="0" selected>-Select Profession-</option>
                                <?php
                                    try{
                                        while($recordpr = mysqli_fetch_array($resultpr)){  
                                            $ss=$recordpr['proid'];
                                            $ssnam=$recordpr['name'];
                                            $dessnam = base64_decode($ssnam);
                                    ?>
                                        <option value="<?php echo $ss; ?>"><?php echo $dessnam; ?></option>
                                <?php
                                        }
                                    }catch(Exception $e) {
                                        echo "Profession List Loading Failed!";
                                    }
                                ?>
                            </select>
                            <br>
                            <div style="float:right;">
                                <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="SUBMIT">
                                <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Teacher List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                        <th>NAME</th>
                                        <th>ADDRESS</th>
                                        <th>NIC</th>
                                        <th>DOB</th>
                                        <th>TP</th>
                                        <th>WHATSAPP</th>
                                        <th>SEX</th>
                                        <th>MARITAL STATUS</th>
                                        <th>FB NAME</th>
                                        <th>E-MAIL</th>
                                        <th>EARNING SCHOOL</th>
                                        <th>PLACEMENT CATEGORY</th>
                                        <th>SCHOOL ID</th>
                                        <th>PLACEMENT LANGUAGE</th>
                                        <th>PLACEMENT DATE</th>
                                        <th>PLACEMENT SUBJECT ID</th>
                                        <th>PROFESSION</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <!-- <th>NAME</th>
                                        <th>ADDRESS</th>
                                        <th>NIC</th>
                                        <th>DOB</th>
                                        <th>TP</th>
                                        <th>WHATSAPP</th>
                                        <th>SEX</th>
                                        <th>MARITAL STATUS</th>
                                        <th>FB NAME</th>
                                        <th>E-MAIL</th>
                                        <th>EARNING SCHOOL</th>
                                        <th>PLACEMENT CATEGORY</th>
                                        <th>SCHOOL ID</th>
                                        <th>PLACEMENT LANGUAGE</th>
                                        <th>PLACEMENT DATE</th>
                                        <th>PLACEMENT SUBJECT ID</th>
                                        <th>PROFESSION</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>-->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            try{
                                                while($record3 = mysqli_fetch_array($result3)){
                                                    $enfullname = $record3['fullname'];
                                                    $enaddressT = $record3['addressT'];
                                                    $ennic = $record3['nic'];
                                                    $entp = $record3['tp'];
                                                    $enwtp = $record3['wtp'];
                                                    $ensex = $record3['sex'];
                                                    $eneMail = $record3['eMail'];
                                                    $enfbName = $record3['fbName'];
                                                    $ensalschool = $record3['salschool'];

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
                                                <tr style="color:#000000;background-color:#ffffff;">
                                                    <td><?php echo $deenfullname; ?></td>
                                                    <td><?php echo $deenaddressT; ?></td>
                                                    <td><?php echo $deennic; ?></td>
                                                    <td><?php echo $record3['dob']; ?></td>
                                                    <td><?php echo $deentp; ?></td>
                                                    <td><?php echo $deenwtp; ?></td>
                                                    <td><?php echo $deensex; ?></td>
                                                    <?php
                                                        $mstnid= $record3['mstatus'];
                                                        $sqlmsda="SELECT * FROM mstatus WHERE mrid = $mstnid";
                                                        $resultmsda=$conn->query($sqlmsda);
                                                        while($recordmsda = mysqli_fetch_array($resultmsda)){
                                                            $enmsdanam = $recordmsda['status'];
                                                            $deenmsdanam = base64_decode($enmsdanam);
                                                        }
                                                    ?> 
                                                    <td><?php echo $deenmsdanam; ?></td>
                                                    <td><?php echo $deenfbName; ?></td>
                                                    <td><?php echo $deeneMail; ?></td>
                                                    <td><?php echo $deensalschool; ?></td>
                                                    <?php
                                                        $placdid= $record3['placement'];
                                                        $sqlpla="SELECT * FROM plcategory WHERE plid = $placdid";
                                                        $resultpla=$conn->query($sqlpla);
                                                        while($recordpla = mysqli_fetch_array($resultpla)){
                                                            $enplanam = $recordpla['name'];
                                                            $deenplanam = base64_decode($enplanam);
                                                        }
                                                    ?> 
                                                    <td><?php echo $deenplanam; ?></td>
                                                <?php
                                                    $sciddid= $record3['scid'];
                                                    $sqlscls="SELECT * FROM school WHERE scid = $sciddid";
                                                    $resultscls=$conn->query($sqlscls);
                                                    while($recordscls = mysqli_fetch_array($resultscls)){
                                                        $ensclsnam = $recordscls['name'];
                                                        $deensclsnam = base64_decode($ensclsnam);
                                                    }
                                                ?> 
                                                    <td><?php echo $deensclsnam; ?></td>
                                                <?php
                                                    $pllangdid = $record3['pllang'];
                                                    $sqllans="SELECT * FROM languages WHERE lid = $pllangdid";
                                                    $resultlans=$conn->query($sqllans);
                                                    while($recordlans = mysqli_fetch_array($resultlans)){
                                                        $enlansnam = $recordlans['name'];
                                                        $deenlansnam = base64_decode($enlansnam);
                                                    }
                                                ?> 
                                                    <td><?php echo $deenlansnam; ?></td>
                                                    <td><?php echo $record3['pldate']; ?></td>
                                                <?php
                                                    $suIDdid = $record3['suID'];
                                                    $sqlsus="SELECT * FROM subject WHERE suID = $suIDdid";
                                                    $resultsus=$conn->query($sqlsus);
                                                    while($recordsus = mysqli_fetch_array($resultsus)){
                                                        
                                                        $ensussid = $recordsus['ssid'];
                                                        $ensusnam = $recordsus['name'];
                                                        $deensusnam = base64_decode($ensusnam);
                                                        $sqlstlse="SELECT * FROM substream where ssid= $ensussid";
                                                        $resultstlse=$conn->query($sqlstlse);
                                                        while($recordstlse = mysqli_fetch_array($resultstlse)){
                                                        $stannase = $recordstlse['name'];
                                                        $destannase = base64_decode($stannase);
                                                        }
                                                    }
                                                ?> 
                                                    <td><?php echo $deensusnam." (".$destannase." )"; ?></td>
                                                <?php
                                                    $cprodid = $record3['cpro'];
                                                    $sqlcps="SELECT * FROM profession WHERE proid = $cprodid";
                                                    $resultcps=$conn->query($sqlcps);
                                                    while($recordcps = mysqli_fetch_array($resultcps)){
                                                        $encpsnam = $recordcps['name'];
                                                        $deencpsnam = base64_decode($encpsnam);
                                                    }
                                                ?>
                                                    <td><?php echo $deencpsnam; ?></td>
                                                    <td><a href="../../Action/teacher/bUpdate.php?id=<?php echo $record3['tid']; ?>"><button class = "btn btn-primary">EDIT</button></a></td>
                                                    <td><a href="../../Action/teacher/tDelete.php?id=<?php echo $record3['tid']; ?>"><button class = "btn btn-danger">DELETE</button></a></td>
                                            </tr>
                                        <?php
                                                }
                                            }catch(Exception $e) {
                                                echo "Teacher List Processing Failed!";
                                            }
                                        ?>
                                    </tbody>
                                </table>
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
    <script src="jthemes.org/demo-admin/cubic/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/custom.js"></script>
    <script src="jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
    <script src="jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
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