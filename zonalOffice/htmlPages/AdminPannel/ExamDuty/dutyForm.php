<?php
    include('../../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5 ){
?>

<?php
    $twni = $_SESSION['uname'];
    $detwni = base64_encode($twni);

    $exdaply = false;
    $nicsc = 0;
    $sclnams = "";
    $sqlnicr="SELECT * FROM teacher WHERE nic = '$detwni'";
    $resultnicr=$conn->query($sqlnicr); 
    while($recordnicr = mysqli_fetch_array($resultnicr)){  
    $nicsc=$recordnicr['scid'];
    $fsa=$recordnicr['tid'];
    $sqlavbl="SELECT * FROM exdapply WHERE tid = $fsa";
    $resultavbl=$conn->query($sqlavbl);
    while($recordavbl = mysqli_fetch_array($resultavbl)){  
        $exdaply = true;
    }           
    }

    $sqlsc="SELECT * FROM school WHERE scid = $nicsc ";
    $resultsc=$conn->query($sqlsc);
    while($recordsc = mysqli_fetch_array($resultsc)){
    $sclnams = $recordsc['name'];
    $desclnams = base64_decode($sclnams);
    } 
    ?>

    <!-- Duty Insert Part Start -->
    <?php
    if(isset($_POST['submit'])){  
    $cboxch = true;
    if(isset($_POST['Oal'])){
        $Tal=$_POST['Oal'];
    }else{
        $Tal="No";
    }
    if(isset($_POST['Og5'])){
        $Tg5=$_POST['Og5'];
    }else{
        $Tg5="No";
    }
    if(isset($_POST['Ool'])){
        $Tol=$_POST['Ool'];
    }else{
        $Tol="No";
    }
    if(isset($_POST['Ogit'])){
        $Tgit=$_POST['Ogit'];
    }else{
        $Tgit="No";
    }
    if(isset($_POST['OsitStatus'])){
        $TsitStatus=$_POST['OsitStatus'];
    }else{
        $TsitStatus="No";
    }

    // now start
    if(isset($_POST['Ostal'])){
      $Tstal=$_POST['Ostal'];
    }else{
      $Tstal="No";
    }
    
    if(isset($_POST['Ostg5'])){
      $Tstg5=$_POST['Ostg5'];
    }else{
      $Tstg5="No";
    }
    
    if(isset($_POST['Ostol'])){
      $Tstol=$_POST['Ostol'];
    }else{
      $Tstol="No";
    }
    
    if(isset($_POST['Ostgit'])){
      $Tstgit=$_POST['Ostgit'];
    }else{
      $Tstgit="No";
    }

    $Tstalvar = base64_encode($Tstal);
    $Tstg5var = base64_encode($Tstg5);
    $Tstolvar = base64_encode($Tstol);
    $Tstgitvar = base64_encode($Tstgit);
    // now end

    // profession start
    if(isset($_POST['Ocofi'])){
      $Tcofi=$_POST['Ocofi'];
    }else{
      $Tcofi="No";
    }
    
    if(isset($_POST['Oaco'])){
      $Taco=$_POST['Oaco'];
    }else{
      $Taco="No";
    }
    
    if(isset($_POST['Ohoh'])){
      $Thoh=$_POST['Ohoh'];
    }else{
      $Thoh="No";
    }
    
    if(isset($_POST['Oaho'])){
      $Taho=$_POST['Oaho'];
    }else{
      $Taho="No";
    }

    if(isset($_POST['Oeho'])){
      $Teho=$_POST['Oeho'];
    }else{
      $Teho="No";
    }
    // profession end

    
    // cheking start
    if(isset($_POST['Oal']) && isset($_POST['Ostal'])){
      $cboxch = false;
    }elseif(isset($_POST['Og5']) && isset($_POST['Ostg5'])){
      $cboxch = false;
    }elseif(isset($_POST['Ool']) && isset($_POST['Ostol'])){
      $cboxch = false;
    }elseif(isset($_POST['Ogit']) && isset($_POST['Ostgit'])){
      $cboxch = false;
    }elseif($TsitStatus=="Yes"){
      $cboxch = false;
    }
    // checkin end
    

    $Talvar = base64_encode($Tal);
    $Tg5var = base64_encode($Tg5);
    $Tolvar = base64_encode($Tol);
    $Tgitvar = base64_encode($Tgit);
    $TsitStatusvar = base64_encode($TsitStatus);
    // $TstcAppearvar = base64_encode($TstcAppear);
    
    $Tcofivar = base64_encode($Tcofi);
    $Tacovar = base64_encode($Taco);
    $Thohvar = base64_encode($Thoh);
    $Tahovar = base64_encode($Taho);
    $Tehovar = base64_encode($Teho);

    if($cboxch == true && $exdaply == false){
    $add="INSERT INTO exdapply(tid,al,g5,ol,git,sitStatus)VALUES('$fsa','$Talvar','$Tg5var','$Tolvar','$Tgitvar','$TsitStatusvar')";
    $addecface="INSERT INTO exdchface(tid,al,g5,ol,git)VALUES('$fsa','$Tstalvar','$Tstg5var','$Tstolvar','$Tstgitvar')";
    $addexprf="INSERT INTO exdproftbl(tid,pr1,pr2,pr3,pr4,pr5)VALUES('$fsa','$Tcofivar','$Tacovar','$Thohvar','$Tahovar','$Tehovar')";
    }else{
    ?>

    <script>
        <?php
        if($exdaply == true){
        ?>
        alert("You already Applied! Try again in next Year.");
        <?php
        }if($cboxch == false){
        ?>
          alert("Application Rejected!");
        <?php
        }
        ?>
        location='dutyForm.php';
    </script>
    <?php
    }
    if($conn-> query($add)==TRUE && $conn-> query($addecface)==TRUE && $conn-> query($addexprf)==TRUE){
?>
<Script>
    alert("Exam Duty Added!");
    location='dutyForm.php';

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
    <link rel="icon" type="image/png" sizes="16x16" href="../../../images/logoGvmnt.png">
    <title>School</title>
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
            require_once '../menu/topNavigation/Teacher/dashboardTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../menu/Teacher/examDutyMenu.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#729ca6;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                    <!-- <div class="col-lg-2 col-sm-4 col-xs-12">
                        <a href=""><button style="width:150px;" class="btn btn-block btn-primary"></button></a>
                    </div> -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Apply for Exam Duty</em></strong></h1><br>
                <div class="row">
                    <div class="col-md-6">
                        <div style="background-color:#d6ddff;" class="white-box">
                        <h3 class="box-title m-b-0">Exam Duty Application</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"></p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">  
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <h3 class="box-title m-b-0">Profession</h3>
                                            <!-- <p class="text-muted font-13 m-b-30">  </p> -->
                                            <div style="width:200px;" class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Ocofi1"  name="Ocofi" value="Coordinating Officer">
                                                <label style="color:#000000;" for="Ocofi1">&nbspCoordinating Officer </label>
                                            </div>

                                            <div style="width:250px;" class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Oaco1"  name="Oaco" value="Assistant Coordinating Officer">
                                                <label style="color:#000000;" for="Oaco1">&nbspAssistant Coordinating Officer </label>
                                            </div>
                                            <div style="width:200px;" class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Ohoh1"  name="Ohoh" value="Head of Hall">
                                                <label style="color:#000000;" for="Ohoh1">&nbspHead of Hall </label>
                                            </div>
                                            <div style="width:200px;" class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Oaho1"  name="Oaho" value="Assistant Head of Hall">
                                                <label style="color:#000000;" for="Oaho1">&nbspAssistant Head of Hall </label>
                                            </div>
                                            <div style="width:200px;" class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Oeho1"  name="Oeho" value="Extra Head of Hall">
                                                <label style="color:#000000;" for="Oeho1">&nbspExtra Head of Hall </label>
                                            </div>
                                        </div>
                                        <div align="left" >
                                            <input style="border:none;background-color:#d6ddff;color:#000000;" type="text" class="form-control" value="Note :- You can apply more than one profession." >
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <h3 style="width:250px;" class="box-title m-b-0" >Exams</h3>
                                            <!-- <p class="text-muted font-13 m-b-30">  </p> -->
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Oal1"  name="Oal" value="A/L">
                                                <label style="color:#000000;" for="Oal1">&nbspA/L </label>
                                            </div>

                                            <div style="width:100px;" class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Og51"  name="Og5" value="Grade 5">
                                                <label style="color:#000000;" for="Og51">&nbspGrade 5 </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Ool1"  name="Ool" value="O/L">
                                                <label style="color:#000000;" for="Ool1">&nbspO/L </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Ogit1"  name="Ogit" value="GIT">
                                                <label style="color:#000000;" for="Ogit1">&nbspGIT </label>
                                            </div>
                                        </div>
                                        <div style="width:450px;" class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <div align="left" style="color:black;">
                                                <select class="form-control" id = "Otid1" name="Otid" required>
                                                <option  value="<?php echo $detwni; ?>" selected><?php echo $twni; ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div style="width:450px;" class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <div align="left" style="color:black;">
                                            <h3 class="box-title m-b-0">Do you intend to sit for any subject in the O/L or A/L examinations this time?</h3>
                                            <br>
                                                <select class="form-control" id = "OsitStatus1" name="OsitStatus" required>
                                                    <option  value="0" selected>- Select Answer -</option>
                                                    <option  value="Yes" >Yes</option>
                                                    <option  value="No" >No</option>
                                                </select>
                                            </div><br>
                                        </div>
                                        <div style="width:450px;" class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <h3 class="box-title m-b-0" >If your children are appearing for the below examinations (in one subject) in this year,Please tick it.</h3>
                                            <!-- <p class="text-muted font-13 m-b-30">  </p> -->
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Ostal1"  name="Ostal" value="A/L">
                                                <label style="color:#000000;" for="Ostal1">&nbspA/L </label>
                                            </div>

                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Ostg51"  name="Ostg5" value="Grade 5">
                                                <label style="color:#000000;" for="Ostg51">&nbspGrade 5 </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Ostol1"  name="Ostol" value="O/L">
                                                <label style="color:#000000;" for="Ostol1">&nbspO/L </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id = "Ostgit1"  name="Ostgit" value="GIT">
                                                <label style="color:#000000;" for="Ostgit1">&nbspGIT </label>
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
                    <div class="col-md-6">
                        <div style="background-color:#d6ddff;" class="white-box">
                        <h3 class="box-title m-b-0" style="color:#fc3b26;">Important</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"></p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <ul>
                                        <li style="color:#000000;">Do not apply for the examination duties if your spouse, your child, your siblings or their children, your wife/husband's siblings, or any of &nbsp&nbsp&nbsptheir children are appearing for the examination for which you are requesting duties.</li><br>
                                        <li style="color:#000000;">Do not apply for examination duties if you have to engage in other duties during the examination period.</li>
                                    </ul>
                                    <!-- <p style="color:#000000;">* Do not apply for the examination duties if your spouse, your child, your siblings or their children, your wife/husband's siblings, or any of &nbsp&nbsp&nbsptheir children are appearing for the examination for which you are requesting duties.</p><br>
                                    <p style="color:#000000;">* Do not apply for examination duties if you have to engage in other duties during the examination period.</p> -->
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