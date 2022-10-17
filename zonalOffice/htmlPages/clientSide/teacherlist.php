<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<!-- Add 7 day deletion here -->
<?php
    $abtsts = "No";
    $derts = date("d");

    $date1=date('Y-m-d');
    $date=date_create($date1);


    if($derts=="25"){
        $abtsts = "Yes";
    }elseif($derts=="26"){
        $abtsts = "Yes";
    }elseif($derts=="27"){
        $abtsts = "Yes";
    }elseif($derts=="28"){
        $abtsts = "Yes";
    }elseif($derts=="29"){
        $abtsts = "Yes";
    }elseif($derts=="30"){
        $abtsts = "Yes";
    }elseif($derts=="31"){
        $abtsts = "Yes";
    }

    $ghtiyer = 1825;
    $ghti = 31;
    $sqlbyta="SELECT * FROM monthlysalreptbl";
    $resultbyta=$conn->query($sqlbyta);


    while($recordbyta = mysqli_fetch_array($resultbyta)){


        $bytaid = $recordbyta['tid'];
        $bytanicr = $recordbyta['cdate'];



        $bytanicr2=date_create($bytanicr);


        $astri=date_diff($date,$bytanicr2);


        // Add deleting date here
        if($astri->format("%a") >= $ghti){

            // insert part
            $addmre="INSERT INTO yearlySalRepTbl(tid,cdate)VALUES('$bytaid','$bytanicr')";

            if($conn-> query($addmre)==TRUE){
            $deletebyd="delete from monthlysalreptbl where tid= $bytaid";
            $resultbyd=$conn->query($deletebyd);
            }
        
        }
    
    }

?>
<!-- End 7 day deletion here -->

<!-- Add 7 day 2 table deletion here -->
<?php

    $sqlbytane="SELECT * FROM yearlysalreptbl";
    $resultbytane=$conn->query($sqlbytane);


    while($recordbytane = mysqli_fetch_array($resultbytane)){


        $bytaidne = $recordbytane['tid'];
        $bytanicrne = $recordbytane['cdate'];

        $bytanicrne2=date_create($bytanicrne);


        $astrine=date_diff($date,$bytanicrne2);


        // Add deleting date here
        if($astrine->format("%a") > $ghtiyer){
            $deletebydne="delete from yearlysalreptbl where tid= $bytaidne";
            $resultbydne=$conn->query($deletebydne);
        }  
    }

?>
<!-- End 7 day 2 table deletion here -->

<?php
    $adedtcnt = 0;
    $rth = $_SESSION['uname'];
    $derth = base64_encode($rth);

    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){

        $sqlli="SELECT * FROM school WHERE census = '$derth'";
        $resultli=$conn->query($sqlli);
        while($recordli = mysqli_fetch_array($resultli)){
        $vht = $recordli['scid'];
    }
?>

<?php
  $sql3="SELECT * FROM teacher where scid = $vht";
  $result3=$conn->query($sql3);
  }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){
    $sql3="SELECT * FROM teacher where nic = '$derth'";
    $result3=$conn->query($sql3);
  }
  $adedtcnt = mysqli_num_rows($result3);
?>

<?php
    if(isset($_GET['mrid'])){
        $mrvrid=$_GET['mrid'];
        $chkprt="No";
        $sqlmre="SELECT * FROM teacher where tid = $mrvrid AND tid IN (SELECT tid FROM monthlysalreptbl);";
        $resultmre=$conn->query($sqlmre);
        while($recordmre = mysqli_fetch_array($resultmre)){
        $chkprt = "yes";
        }

        if($chkprt=="No"){
            $add="INSERT INTO monthlysalreptbl(tid)VALUES('$mrvrid')";
        }else{
        ?>
        <Script>
            alert("Sorry! This NIC is already available in the Salary Report.");
            location='teacherlist.php';
        </Script>
        <?php
        }

        if($conn-> query($add)==TRUE){

?>

<Script>
    alert("Teacher Added to the Monthly Salary Report!");
    location='teacherlist.php';
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .acbtnp{
            background-color:#11aba8;
            color:#ffffff;
            border-radius:16px;
            border:none;
            width:80px;
            height:35px;
            }

        .acbtnp:hover{
            background-color:red;
            }

        .acbtsec{
            background-color:#b81a1a;
            color:#ffffff;
            border-radius:16px;
            border:none;
            width:80px;
            height:35px;
            }

        .acbtsec:hover{
            background-color:red;
            }
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
            require_once '../AdminPannel/menu/topNavigation/Teacher/TeacherlistPrinTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
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
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <?php
                    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){
                    ?>
                    <div class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="qualificationCustomer.php"><button class="btn btn-block btn-primary">Add Teacher</button></a>
                    </div>
                    <?php
                    }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){
                    ?>
                    <div class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="nprList.php"><button class="btn btn-block btn-primary">Step 2</button></a>
                    </div>
                    <?php
                    }
                ?>
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage School Teachers</em></strong></h1> <br><br>
                <div class="row">
                <div class="col-sm-12">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Teacher List</h3>
                            <br>
                            <?php
                                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){
                            ?>
                                <p style="color:#000000;">* If you change nic, you must notify admin to change its owner password accordingly.</p>
                            <?php
                                }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){
                            ?>
                            <p style="color:#000000;" >* If you change nic, it will not affect your password.</p>
                            <?php
                                }
                            ?>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>ACTION</th>
                                            <th>STATUS</th>
                                            <th>REPORT</th>
                                            <th>PHOTO</th>
                                            <th>NAME</th>
                                            <!-- <th>ADDRESS</th> -->
                                            <th>NIC</th>
                                            <!-- <th>DOB</th>
                                            <th>TP</th> -->
                                            <th>BIO</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>ACTION</th>
                                            <th>STATUS</th>
                                            <th>REPORT</th>
                                            <th>PHOTO</th>
                                            <th>NAME</th>
                                            <th>ADDRESS</th>
                                            <th>NIC</th>
                                            <th>DOB</th>
                                            <th>TP</th>
                                            <th>BIO</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while($record3 = mysqli_fetch_array($result3)){
                                        $tbit= $record3['tid'];
                                        $mst= $record3['mstatus'];
                                        $pmnt= $record3['placement'];
                                        $scna= $record3['scid'];
                                        $lanid= $record3['pllang'];
                                        $subjid= $record3['suID'];
                                        $profid= $record3['cpro'];

                                        // New part start
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
                                        // New Part End

                                        // add update part here if variable passed
                                        if(isset($_GET['rleid'])){
                                            $rlid = $_GET['rleid'];

                                            $chsscna= 110;

                                            $updatescp ="UPDATE teacher SET scid='$chsscna' where tid=$rlid";


                                            if($conn-> query($updatescp)==TRUE){
                                            ?>
                                            <Script>
                                                alert("Teacher Relased to pool!");
                                                location= 'teacherlist.php';
                                            </Script>
                                            <?php
                                            }
                                            exit();

                                        }
                                        

                                        $balka = "Yes";

                                        $sqljao="SELECT * FROM teacher where tid = $tbit and tid NOT IN (SELECT tid FROM ofisign);";
                                        $resultjao=$conn->query($sqljao);
                                        while($recordjao = mysqli_fetch_array($resultjao)){
                                            $balka = "No";
                                        }

                                        $jabus = "No";

                                        $sqljpl="SELECT * FROM teacher where tid = $tbit and tid IN (SELECT tid FROM teachertmp);";
                                        $resultjpl=$conn->query($sqljpl);
                                        while($recordjpl = mysqli_fetch_array($resultjpl)){
                                            $jabus = "Yes";
                                        }
                                        $prinbi="No";
                                        $sqlprb="SELECT * FROM principle where tid = $tbit";
                                        $resultprb=$conn->query($sqlprb);
                                        while($recordprb = mysqli_fetch_array($resultprb)){
                                            $prinbi="Yes";
                                        }

                                        $srep = "No";

                                        $sqlrsal="SELECT * FROM monthlysalreptbl where tid = $tbit ";
                                        $resultrsal=$conn->query($sqlrsal);
                                        while($recordrsal = mysqli_fetch_array($resultrsal)){
                                            $srep = "Yes";
                                        }
                                                            
                                    ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <td>
                                            <?php
                                                if($balka=="No" || $_SESSION['ref']==5){
                                                    if($jabus == "No"){
                                            ?>
                                                
                                                    <a href="../../Action/teacher/bUpdate.php?id=<?php echo $record3['tid']; ?>"><button style="border-radius:16px;width:80px;" class = "btn btn-primary">Edit</button></a>
                                                <?php
                                                    }else{
                                                ?>
                                                    <span style="color:#fc0808;">Requested</span>
                                                <?php
                                                    }
                                                    if($_SESSION['ref']==1){
                                                ?>
                                                    <a href="teacherlist.php?rleid=<?php echo $record3['tid']; ?>"><button style="border-radius:16px;" class = "btn btn-danger" >Release</button></a>
                                                <?php
                                                    }
                                                ?>
                                                
                                                    <?php
                                                }elseif($prinbi=="Yes"){
                                                    echo "<div style='color:dodgerblue;'><b>Principal</b></div>";
                                                }else{
                                                    echo "<div style='color:blue;'>Approved</div>";
                                                }
                                                    ?>
                                                </td>
                                                    <?php
                                                    $bstyl = "acbtnp";
                                                    $ststusv = "Active";
                                                    $sqlasts="SELECT * FROM tvaccationtbl where tid = $tbit AND tid IN (SELECT tid FROM ofisign);";
                                                    $resultasts=$conn->query($sqlasts);
                                                    while($recordasts = mysqli_fetch_array($resultasts)){
                                                    $ststusv = $recordasts['vid'];
                                                    $sqlvcat="SELECT * FROM tvaccation where vid = $ststusv ";
                                                    $resultvcat=$conn->query($sqlvcat);
                                                    while($recordvcat = mysqli_fetch_array($resultvcat)){
                                                        $vacbhn = $recordvcat['vcategory'];
                                                        $ststusv = base64_decode($vacbhn);
                                                        $bstyl = "acbtsec";
                                                    }

                                                    }
                                                    ?>
                                                <td><button style="width:auto;" class="<?php echo $bstyl; ?>">&nbsp&nbsp<?php echo $ststusv; ?>&nbsp&nbsp</button></td>
                                                <?php
                                                    if($srep == "Yes"){
                                                ?>
                                                <td style = "color:red;">Added</td>
                                                <?php
                                                    }else{
                                                    if($abtsts == "Yes"){
                                                        if($balka == "Yes"){
                                                ?>
                                                <td><a href="teacherlist.php?mrid=<?php echo $record3['tid']; ?>"><button style="border-radius:16px;width:80px;" class = "btn btn-primary">Add</button></a></td>
                                                <?php
                                                    }else{
                                                ?>
                                                    <td style = "color:blue;">Need Approval</td>
                                                <?php
                                                    }  
                                                }else{
                                                ?>
                                                    <td style = "color:blue;"> Will be on from 25th to 31st</td>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <?php
                                
                                                $sqlpic="SELECT * FROM tpropic where tpid = $tbit";
                                                $resultpic=$conn->query($sqlpic);
                                                
                                                $ctr = "";
                                                $tpro = " 0 ";
                                                    while($recordpic = mysqli_fetch_array($resultpic)){
                                                    $tpro = $recordpic['photo'];
                                                    $ctr = $tpro;
                                                ?>
                
                                                <td><a href="addTeacherPhoto.php?id=<?php echo $record3['tid']; ?>"><img style="width:70px;height:70px;border-radius:40px;" src=<?php echo "../../images/teacherPro/$tpro"; ?> alt="No"></a></td>
               
                                                <?php
                                                        }
                                                ?>
              
                                                <?php
                                                    if($tpro != $ctr){
                                                    echo "<td>";
                                                    echo "<a href='";
                                                    echo "addTeacherPhoto.php?id=";
                                                    echo $record3['tid']; 
                                                    echo "'>";
                                                    echo "<img src=";
                                                    echo "../../images/teacherPro/$tpro"; 
                                                    echo "alt='No'></a></td>";
                                                    }
                                                ?>

                                            <td><?php echo $deenfullname; ?></td>
                                            <!-- <td> -->
                                            <?php
                                            //  echo $deenaddressT; 
                                            ?>
                                            <!-- </td> -->
                                            <td><?php echo $deennic; ?></td>
                                            <!-- <td> -->
                                            <?php 
                                                // echo $record3['dob'];
                                            ?>
                                            <!-- </td> -->
                                            <!-- <td> -->
                                            <?php
                                                //  echo $deentp; 
                                            ?>
                                            <!-- </td> -->
                                            <td>
                                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                                    <a href="biographyFile.php?proli=<?php echo $record3['tid']; ?>"><button style="width:80px;border-radius:16px;" class="btn btn-block btn-success">View</button></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
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
    </script>
    <!--Style Switcher -->
    <script src="../AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
}else{
  echo "Please Login!";
}
?>