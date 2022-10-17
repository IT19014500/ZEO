<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

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
            require_once '../AdminPannel/menu/topNavigation/Teacher/TeacherlistPrinTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){

                require_once '../AdminPannel/menu/Principal/teacherlistPrinMenu.php';

            }elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){

                require_once '../AdminPannel/menu/Teacher/teacherlistMenu.php';

            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href="capableSub.php"><button class="btn btn-block btn-primary">Add</button></a>
                </div>
                <h1 style="color:#000000;text-align:center;"><strong><em>Capable Subject Details</em></strong></h1><br>
                <div class="row">
                <div class="col-sm-12">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Subject List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>PHOTO</th>
                                            <th>SUBJECT</th>
                                            <th>TEACHER ID</th>
                                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>PHOTO</th>
                                            <th>SUBJECT</th>
                                            <th>TEACHER ID</th>
                                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        if($_SESSION['ref']==1){
                                            $sqlbmn="SELECT * FROM teacher WHERE scid = $vht";
                                        }elseif($_SESSION['ref']==5){
                                            $sqlbmn="SELECT * FROM teacher WHERE tid = $fhg";
                                        }
                                        $resultbmn=$conn->query($sqlbmn);
                                        while($recordbmn = mysqli_fetch_array($resultbmn)){
                                            $fhg=$recordbmn['tid'];
                                            
                                            $sql3="SELECT * FROM cpblesub WHERE tid = $fhg";
                                            $result3=$conn->query($sql3);
                                        ?>

                                        <?php
                                        while($record3 = mysqli_fetch_array($result3)){
                                            $tbit= $record3['tid'];
                                            $subjid= $record3['suID'];
                                            $cbidpt= $record3['cbid'];
                                            
                                            
                                            $balka = "Yes";

                                            if($_SESSION['ref']==5){
                                            $balka = "No";
                                            }

                                            $sqljao="SELECT * FROM cpblesub where tid = $tbit && tid NOT IN (SELECT tid FROM ofisign);";
                                            $resultjao=$conn->query($sqljao);
                                            while($recordjao = mysqli_fetch_array($resultjao)){
                                            $balka = "No";
                                            }
                                            $sqlbno="SELECT * FROM cpblesub where tid = $tbit && tid IN (SELECT tid FROM cpblesubtemp);";
                                            $resultbno=$conn->query($sqlbno);
                                            while($recordbno = mysqli_fetch_array($resultbno)){
                                            $balka = "ReqEdit";
                                            }

                                            $sqljpo="SELECT * FROM cpblesub where tid = $tbit && tid IN (SELECT tid FROM cpblesubtmdel);";
                                            $resultjpo=$conn->query($sqljpo);
                                            while($recordjpo = mysqli_fetch_array($resultjpo)){
                                            $balka = "ReqDelete";
                                            }
                                            
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
                                                $sqlsu="SELECT * FROM subject where suID = $subjid";
                                                $resultsu=$conn->query($sqlsu);

                                                    while($recordsu = mysqli_fetch_array($resultsu)){
                                                    $subjname = $recordsu['name'];
                                                    $desubjname = base64_decode($subjname);

                                                    $sbsdtvn= $recordsu['ssid'];
                                                    $cafh= $recordsu['caid'];
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
                                            ?>
                                            <td><?php echo $desubjname." ( ".$decafhnme." - ".$destranmvn." )"; ?></td>
                                            <?php
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
                                                if($balka=="No"){
                                            ?>
                                            <td><a href="../../Action/subject/cpblsbUpdate.php?id=<?php echo $cbidpt; ?>"><button class = "btn btn-primary">EDIT</button></a>
                                            <br><br> <a href="../../Action/subject/cpblsbDelete.php?id=<?php echo $cbidpt; ?>"><button class = "btn btn-danger">DELETE</button></a></td>
                                            <?php
                                                }elseif($balka == "ReqEdit"){
                                                echo "<td><div style='color:blue;'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRequested to Edit</div></td>";
                                                }elseif($balka == "ReqDelete"){
                                                echo "<td><div style='color:red;'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRequested to Delete</div></td>";
                                                }
                                                else{
                                                echo "<td><div style='color:blue;'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspApproved</div></td>";
                                                }
                                            ?>
                                        </tr>
                                        <?php
                                            }
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