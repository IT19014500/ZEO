<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){

?>

<?php
  $id=$_GET['id'];
  $sqltq="SELECT * FROM cpblesub where cbid = $id ";
  $resulttq=$conn->query($sqltq);
?> 

<?php
    if(isset($_POST['submit'])){

        $TsuID=$_POST['OsuID'];
        $Ttid=$_POST['Otid'];

        if($_SESSION['ref']==1){
            $update="UPDATE cpblesub SET suID='$TsuID',tid='$Ttid' where cbid=$id ";
        }elseif($_SESSION['ref']==5){
            $update="INSERT INTO cpblesubtemp(cbid,suID,tid)VALUES('$id','$TsuID','$Ttid') ";
        }


        if($conn-> query($update)==TRUE){
?>

<Script>
    <?php if($_SESSION['ref']==1){ ?>
    alert("Capable Subject Details Updated!");
    <?php }elseif($_SESSION['ref']==5){ ?>
    alert("Your Details will be Updated After Zonal Head Approval!");
    <?php 
        }    
    ?>
    location= '../../htmlPages/clientSide/capableView.php';
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
                    <a href = "../../htmlPages/clientSide/capableView.php"><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update Capable Subject</em></strong></h1><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Modify</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"> comment </p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post">
                                        <?php
                                            while($recordtq = mysqli_fetch_array($resulttq)){
                                        ?>
                                        <div class="form-group">
                                            <?php
                                                $zzc="";
                                                $bood="";
                                                $bocenna="";
                                                $debocenna="";
                                                $sqlpct="SELECT * FROM subject ";
                                                $resultpct=$conn->query($sqlpct);
                                            ?>
                                            <label style="color:#000000;" for="Ocaid">Capable Subject</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "OsuID1" name="OsuID" required>
                                                    <?php
                                                    while($recordpct = mysqli_fetch_array($resultpct)){  
                                                        $boc=$recordpct['suID'];
                                                        $booh=$recordtq['suID'];
                                                        $bocenna=$recordpct['name'];
                                                        $debocenna = base64_decode($bocenna);

                                                        $sbsdtvn= $recordpct['ssid'];
                                                        $cafh= $recordpct['caid'];
                                                        $sqlckl="SELECT * FROM subcategory where caid = $cafh";
                                                        $resultckl=$conn->query($sqlckl);
                                                        while($recordckl = mysqli_fetch_array($resultckl)){
                                                        $cafhnme = $recordckl['name'];
                                                        $decafhnme = base64_decode($cafhnme);
                                                        }


                                                        $sqlstrvn="SELECT * FROM substream where ssid = $sbsdtvn";
                                                        $resultstrvn=$conn->query($sqlstrvn);
                                                        while($recordstrvn = mysqli_fetch_array($resultstrvn)){
                                                        $stranmvn = $recordstrvn['name'];
                                                        $destranmvn = base64_decode($stranmvn);
                                                        }

                                                        if($boc==$booh){
                                                            $zzc='selected';
                                                            $bood=$boc;

                                                        }
                                                    ?>
                                                        <option value="<?php echo $boc; ?>" <?php if($bood==$boc){echo $zzc;}?>><?php echo $debocenna." ( ".$decafhnme." - ".$destranmvn." )"; ?></option>
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
                                                $sqlbn="SELECT * FROM teacher ";
                                                $resultbn=$conn->query($sqlbn);
                                            ?>
                                            <label style="color:#000000;" for="Ossid">NIC</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <select class="form-control" id = "Otid1" name="Otid" required>
                                                    <?php
                                                        while($recordbn = mysqli_fetch_array($resultbn)){  
                                                            $scc=$recordbn['tid'];
                                                            $scch=$recordtq['tid'];
                                                            $strenna=$recordbn['nic'];
                                                            $destrenna = base64_decode($strenna);
                                                            if($scc==$scch){
                                                                $bbc='selected';
                                                                $bbcd=$scc;
                                                            }
                                                    ?>
                                                    <option value="<?php echo $scc; ?>" <?php if($bbcd==$scc){echo $bbc;}?>><?php echo $destrenna; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
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