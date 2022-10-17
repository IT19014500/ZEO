<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<!-- Add 7 day deletion here -->
<?php
    $deensgnms = "";
    $deennamesu = "";
    $deenclass = "Not added";
    $deenletter = "Not added";
    $dejdfnam = "Not added";
    $deblojnam = "Not added";

    $date1=date('Y-m-d');
    $date=date_create($date1);



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

    $sqlli="SELECT * FROM school WHERE census = '$derth'";
    $resultli=$conn->query($sqlli);
    while($recordli = mysqli_fetch_array($resultli)){
        $vht = $recordli['scid'];
    }
?>

<?php
  $sql3="SELECT * FROM teacher where scid = $vht AND tid IN (SELECT tid FROM monthlysalreptbl);";
  $result3=$conn->query($sql3);
  
  $adedtcnt = mysqli_num_rows($result3);
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
            require_once '../AdminPannel/menu/topNavigation/Principal/PrincipalTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once '../AdminPannel/menu/Principal/teacherlistPrinMenu.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Salary Report</em></strong></h1> <br><br>
                <div class="row">
                <div class="col-sm-12">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Eligible List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>PHOTO</th>
                                            <th>STATUS</th>
                                            <th>NAME</th>
                                            <th>NIC</th>
                                            <th>TP</th>
                                            <th>GENDER</th>
                                            <th>PLACEMENT SUBJECT</th>
                                            <th>SERVICE & GRADE</th>
                                            <th>MAIN TEACHING SUBJECT</th>
                                            <th>CLASS</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>PHOTO</th>
                                            <th>STATUS</th>
                                            <th>NAME</th>
                                            <th>NIC</th>
                                            <th>TP</th>
                                            <th>GENDER</th>
                                            <th>PLACEMENT SUBJECT</th>
                                            <th>SERVICE & GRADE</th>
                                            <th>MAIN TEACHING SUBJECT</th>
                                            <th>CLASS</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while($record3 = mysqli_fetch_array($result3)){
                                                $tbit= $record3['tid'];

                                                $srep = "No";

                                                $sqlrsal="SELECT * FROM monthlysalreptbl where tid = $tbit ";
                                                $resultrsal=$conn->query($sqlrsal);
                                                while($recordrsal = mysqli_fetch_array($resultrsal)){
                                                    $srep = "Yes";
                                                }

                                                $enfullname = $record3['fullname'];
                                                $ennic = $record3['nic'];
                                                $entp = $record3['tp'];
                                                $ensuID = $record3['suID'];
                                                $ensex = $record3['sex'];
                                                


                                                $deenfullname = base64_decode($enfullname);
                                                $deennic = base64_decode($ennic);
                                                $deentp = base64_decode($entp);
                                                $deensex = base64_decode($ensex);             
                                        ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <?php
                                                $sqlpic="SELECT * FROM tpropic where tpid = $tbit";
                                                $resultpic=$conn->query($sqlpic);

                                                $ctr = "";
                                                $tpro = " 0 ";
                                                while($recordpic = mysqli_fetch_array($resultpic)){
                                                    $tpro = $recordpic['photo'];
                                                    $ctr = $tpro;
                                            ?>
                                                <td><a href="addTeacherPhoto.php?id=<?php echo $record3['tid']; ?>"><img src=<?php echo "../../images/teacherPro/$tpro"; ?> alt="No"></a></td>
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


                                                <td><button class="<?php echo $bstyl; ?>"><?php echo $ststusv; ?></button></td>
                                                <td><?php echo $deenfullname; ?></td>
                                                <td><?php echo $deennic; ?></td>
                                                <td><?php echo $deentp; ?></td>
                                                <td><?php echo $deensex; ?></td>
                                            <?php
                                                $sqlmtsub="SELECT * FROM subject where suID = $ensuID";
                                                $resultmtsub=$conn->query($sqlmtsub);
                                                while($recordmtsub = mysqli_fetch_array($resultmtsub)){
                                                    $caj=$recordmtsub['caid'];
                                                    $stj=$recordmtsub['ssid']; 
                                                    $enmtsubnam = $recordmtsub['name'];
                                                    $deenmtsubnam = base64_decode($enmtsubnam);
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
                                                }
                                            ?>
                                                <td><?php echo $deenmtsubnam."( ".$decajnam." - ".$desstjnam." )"; ?></td>
                                            <?php
                                                $sqlgrp="SELECT * FROM nonprinciple where tid = $tbit";
                                                $resultgrp=$conn->query($sqlgrp);
                                                while($recordgrp = mysqli_fetch_array($resultgrp)){
                                                    $ensgid = $recordgrp['sgid'];
                                                    $enmsubjects = $recordgrp['msubject'];
                                                    $enowgrade = $recordgrp['owgrade'];
                                                    $sqlsegr="SELECT * FROM serandgrade where sgid = $ensgid";
                                                    $resultsegr=$conn->query($sqlsegr);
                                                    while($recordsegr = mysqli_fetch_array($resultsegr)){
                                                        $ensgnms = $recordsegr['grade'];
                                                        $deensgnms = base64_decode($ensgnms);
                                                    }

                                                    $sqlmsur="SELECT * FROM subject where suID = $enmsubjects";
                                                    $resultmsur=$conn->query($sqlmsur);
                                                    while($recordmsur = mysqli_fetch_array($resultmsur)){
                                                        $ennamesu = $recordmsur['name'];
                                                        $deennamesu = base64_decode($ennamesu);
                                                        $cajsn=$recordmsur['caid'];
                                                        $stjsn=$recordmsur['ssid'];
                                                        $sqljdf="SELECT * FROM subcategory where caid = $cajsn";
                                                        $resultjdf=$conn->query($sqljdf);
                                                        while($recordjdf = mysqli_fetch_array($resultjdf)){
                                                            $jdfnam = $recordjdf['name'];
                                                            $dejdfnam = base64_decode($jdfnam);
                                                        }
                                                        $sqlblo="SELECT * FROM substream where ssid = $stjsn";
                                                        $resultblo=$conn->query($sqlblo);
                                                        while($recordblo = mysqli_fetch_array($resultblo)){
                                                            $blojnam = $recordblo['name'];
                                                            $deblojnam = base64_decode($blojnam);
                                                        }

                                                    }

                                                    $sqlogr="SELECT * FROM classtbllet where cleid = $enowgrade";
                                                    $resultogr=$conn->query($sqlogr);
                                                    while($recordogr = mysqli_fetch_array($resultogr)){
                                                        $enclid = $recordogr['clid'];
                                                        $enletter = $recordogr['letter'];
                                                        $deenletter = base64_decode($enletter);

                                                        $sqlclnu="SELECT * FROM classt where clid = $enclid";
                                                        $resultclnu=$conn->query($sqlclnu);
                                                        while($recordclnu = mysqli_fetch_array($resultclnu)){
                                                            $enclass = $recordclnu['class'];
                                                            $deenclass = base64_decode($enclass);
                                                        }
                                                    }
                                                }
                                            ?>
                                                <td><?php echo $deensgnms; ?></td>
                                                <td><?php echo $deennamesu." (".$dejdfnam." - ".$deblojnam." )"; ?></td>
                                                <td><?php echo $deenclass." - ".$deenletter; ?></td>
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