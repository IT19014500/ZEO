<?php
try{
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<!-- Add 7 day deletion here -->
<?php 
try{
    $date1=date('Y-m-d');
    $date=date_create($date1);

    $ghti = 7;
    $sqlbyta="SELECT * FROM qualificationtmdel";
    $resultbyta=$conn->query($sqlbyta);

    while($recordbyta = mysqli_fetch_array($resultbyta)){
        $bytaid = $recordbyta['tid'];
        $bytanicr = $recordbyta['rdate'];

        $bytanicr2=date_create($bytanicr);

        $astri=date_diff($date,$bytanicr2);

        // Add deleting date here
        if($astri->format("%a") > $ghti){

            $deletebyd="delete from qualificationtmdel where tid= $bytaid";
            $resultbyd=$conn->query($deletebyd);
        
        }
        
        }
?>
<!-- End 7 day deletion here -->



<!-- Add 7 day 2 table deletion here -->
<?php 
    $sqlbytane="SELECT * FROM qualificationtmp";
    $resultbytane=$conn->query($sqlbytane);

    while($recordbytane = mysqli_fetch_array($resultbytane)){

    $bytaidne = $recordbytane['tid'];
    $bytanicrne = $recordbytane['rdate'];

    $bytanicrne2=date_create($bytanicrne);


    $astrine=date_diff($date,$bytanicrne2);


    // Add deleting date here
    if($astrine->format("%a") > $ghti){

        $deletebydne="delete from qualificationtmp where tid= $bytaidne";
        $resultbydne=$conn->query($deletebydne);
        
        }
        
    }
?>
<!-- End 7 day 2 table deletion here -->

<?php
  if($_SESSION['ref']==1){
  $rth = $_SESSION['uname'];
  $derth = base64_encode($rth);

  $sqlli="SELECT * FROM school WHERE census = '$derth'";
  $resultli=$conn->query($sqlli);
  while($recordli = mysqli_fetch_array($resultli)){
    $vht = $recordli['scid'];
    $vhtnprt = $recordli['name'];
    $devhtnprt = base64_decode($vhtnprt);

  }
  }elseif($_SESSION['ref']==5){
    $rth = $_SESSION['uname'];
    $derth = base64_encode($rth);

    $sqlnu="SELECT * FROM teacher WHERE nic = '$derth' ";
    $resultnu=$conn->query($sqlnu);
    while($recordnu = mysqli_fetch_array($resultnu)){
      $fhg = $recordnu['tid'];
    }
  }
}catch(Exception $e) {
    echo "Essential Operation Failed!";
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
            require_once '../AdminPannel/menu/topNavigation/Teacher/TeacherlistPrinTPN.php';
        }catch(Exception $e) {
            echo "Top Naigation Loading Failed!";
        }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            try{

                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){

                    require_once '../AdminPannel/menu/Principal/teacherlistPrinMenu.php';

                }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){

                    require_once '../AdminPannel/menu/Teacher/teacherlistMenu.php';
                }

            }catch(Exception $e) {
                echo "Naigation Bar Loading Failed!";
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href="tqualifics.php"><button class="btn btn-block btn-primary">Add</button></a>
                </div>
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage Qualification Details</em></strong></h1> <br><br>
                <div class="row">
                <div class="col-sm-12">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Qualifications</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
                                            <th>Teacher ID</th>
                                            <th>PHOTO</th>
                                            <th>BA</th>
                                            <th>BSc(Mgt)</th>
                                            <th>BSc(Science)</th>
                                            <th>BCom</th>
                                            <th>BEd</th>
                                            <th>BBA</th>
                                            <th>Other Degree</th>
                                            <th>PGDE</th>
                                            <th>PGDEM</th>
                                            <th>PGDEA</th>
                                            <th>Other</th>
                                            <th>MA</th>
                                            <th>MSc</th>
                                            <th>MEd</th>
                                            <th>MPhil</th>
                                            <th>phd</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
                                            <th>Teacher ID</th>
                                            <th>PHOTO</th>
                                            <th>BA</th>
                                            <th>BSc(Mgt)</th>
                                            <th>BSc(Science)</th>
                                            <th>BCom</th>
                                            <th>BEd</th>
                                            <th>BBA</th>
                                            <th>Other Degree</th>
                                            <th>PGDE</th>
                                            <th>PGDEM</th>
                                            <th>PGDEA</th>
                                            <th>Other</th>
                                            <th>MA</th>
                                            <th>MSc</th>
                                            <th>MEd</th>
                                            <th>MPhil</th>
                                            <th>phd</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        try{
                                            if($_SESSION['ref']==1){
                                                $sqlbmn="SELECT * FROM teacher WHERE scid = $vht";
                                            }elseif($_SESSION['ref']==5){
                                                $sqlbmn="SELECT * FROM teacher WHERE tid = $fhg";
                                            }
                                            $resultbmn=$conn->query($sqlbmn);
                                            while($recordbmn = mysqli_fetch_array($resultbmn)){
                                                $fhg=$recordbmn['tid'];
                                                $sql3="SELECT * FROM qualification WHERE tid = $fhg";
                                                $result3=$conn->query($sql3);
                                            ?>

                                            <?php
                                                while($record3 = mysqli_fetch_array($result3)){
                                                    $tbit= $record3['tid'];
                                                    
                                                    $balka = "Yes";
                                                    if($_SESSION['ref']==5){
                                                        $balka = "No";
                                                    }

                                                    $sqljao="SELECT * FROM qualification where tid = $tbit && tid NOT IN (SELECT tid FROM ofisign);";
                                                    $resultjao=$conn->query($sqljao);
                                                    while($recordjao = mysqli_fetch_array($resultjao)){
                                                        $balka = "No";
                                                    }
                                                    $sqlbno="SELECT * FROM qualification where tid = $tbit && tid IN (SELECT tid FROM qualificationtmp);";
                                                    $resultbno=$conn->query($sqlbno);
                                                    while($recordbno = mysqli_fetch_array($resultbno)){
                                                        $balka = "ReqEdit";
                                                    }

                                                    $sqljpo="SELECT * FROM qualification where tid = $tbit && tid IN (SELECT tid FROM qualificationtmdel);";
                                                    $resultjpo=$conn->query($sqljpo);
                                                    while($recordjpo = mysqli_fetch_array($resultjpo)){
                                                        $balka = "ReqDelete";
                                                    }
                                            ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <?php
                                                if($balka=="No"){
                                            ?>
                                            <td><a href="../../Action/qualify/tqfUpdate.php?id=<?php echo $record3['tid']; ?>">&nbsp&nbsp<button class = "btn btn-primary">EDIT</button></a>
                                            <a href="../../Action/qualify/tqfDelete.php?id=<?php echo $record3['tid']; ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button class = "btn btn-danger">DELETE</button></a></td>
                                            <?php
                                                }elseif($balka == "ReqEdit"){
                                                    echo "<td><div style='color:blue;'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEdit Req</div></td>";
                                                }elseif($balka == "ReqDelete"){
                                                    echo "<td><div style='color:red;'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDel. Req</div></td>";
                                                }
                                                else{
                                                    echo "<td><div style='color:blue;'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspApproved</div></td>";
                                                }
                                            ?>
                                            <?php
                                                $wqo = $record3['tid'];
                                                $sqldao="SELECT * FROM teacher where tid = $wqo";
                                                $resultdao=$conn->query($sqldao);

                                                while($recorddao = mysqli_fetch_array($resultdao)){
                                                    $enwqo = $recorddao['nic'];
                                                    $deenwqo = base64_decode($enwqo);
                                                }
                                            ?>
                                            <td><?php echo $deenwqo; ?></td>
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
                                            <?php
                                                $enba = $record3['ba'];
                                                $enbsc = $record3['bsc'];
                                                $enbscs = $record3['bscs'];
                                                $enbcom = $record3['bcom'];
                                                $enbed = $record3['bed'];
                                                $enbba = $record3['bba'];
                                                $enother = $record3['other'];
                                                $enpgde = $record3['pgde'];
                                                $enpgdem = $record3['pgdem'];
                                                $enpgdea = $record3['pgdea'];
                                                $enoPther = $record3['oPther'];
                                                $enma = $record3['ma'];
                                                $enmsc = $record3['msc'];
                                                $enmed = $record3['med'];
                                                $enmphil = $record3['mphil'];
                                                $enphd = $record3['phd'];

                                                $deenba = base64_decode($enba);
                                                $deenbsc = base64_decode($enbsc);
                                                $deenbscs = base64_decode($enbscs);
                                                $deenbcom = base64_decode($enbcom);
                                                $deenbed = base64_decode($enbed);
                                                $deenbba = base64_decode($enbba);
                                                $deenother = base64_decode($enother);
                                                $deenpgde = base64_decode($enpgde);
                                                $deenpgdem = base64_decode($enpgdem);
                                                $deenpgdea = base64_decode($enpgdea);
                                                $deenoPther = base64_decode($enoPther);
                                                $deenma = base64_decode($enma);
                                                $deenmsc = base64_decode($enmsc);
                                                $deenmed = base64_decode($enmed);
                                                $deenmphil = base64_decode($enmphil);
                                                $deenphd = base64_decode($enphd);
                                            ?>
                                            <td><?php echo $deenba; ?></td>
                                            <td><?php echo $deenbsc; ?></td>
                                            <td><?php echo $deenbscs; ?></td>
                                            <td><?php echo $deenbcom; ?></td>
                                            <td><?php echo $deenbed; ?></td>
                                            <td><?php echo $deenbba; ?></td>
                                            <td><?php echo $deenother; ?></td>
                                            <td><?php echo $deenpgde; ?></td>
                                            <td><?php echo $deenpgdem; ?></td>
                                            <td><?php echo $deenpgdea; ?></td>
                                            <td><?php echo $deenoPther; ?></td>
                                            <td><?php echo $deenma; ?></td>
                                            <td><?php echo $deenmsc; ?></td>
                                            <td><?php echo $deenmed; ?></td>
                                            <td><?php echo $deenmphil; ?></td>
                                            <td><?php echo $deenphd; ?></td>  
                                        </tr>
                                        <?php
                                                }
                                            }
                                            }catch(Exception $e) {
                                                echo "Data Reading Failed!";
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
    }catch(Exception $e) {
        echo "Connection Failed!";
    }
?>