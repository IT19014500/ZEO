<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5 ){
?>

<!-- Add 7 day deletion here -->
<?php 
    $adedtcnt = 0;

    $date1=date('Y-m-d');
    $date=date_create($date1);

    $ghti = 7;
    $sqlbyta="SELECT * FROM nonprincipletmdel";
    $resultbyta=$conn->query($sqlbyta);

    while($recordbyta = mysqli_fetch_array($resultbyta)){

        $bytaid = $recordbyta['nprid'];
        $bytanicr = $recordbyta['rdate'];

        $bytanicr2=date_create($bytanicr);

        $astri=date_diff($date,$bytanicr2);

        // Add deleting date here
        if($astri->format("%a") > $ghti){

            $deletebyd="delete from nonprincipletmdel where nprid= $bytaid";
            $resultbyd=$conn->query($deletebyd);
        
        }
    }
?>
<!-- End 7 day deletion here -->

<!-- Add 7 day 2 table deletion here -->
<?php

    $sqlbytane="SELECT * FROM nonprincipletemp";
    $resultbytane=$conn->query($sqlbytane);


    while($recordbytane = mysqli_fetch_array($resultbytane)){

        $bytaidne = $recordbytane['nprid'];
        $bytanicrne = $recordbytane['rdate'];

        $bytanicrne2=date_create($bytanicrne);


        $astrine=date_diff($date,$bytanicrne2);


        // Add deleting date here
        if($astrine->format("%a") > $ghti){

            $deletebydne="delete from nonprincipletemp where nprid= $bytaidne";
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
    <title>Principal</title>
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
                <div class="col-lg-2 col-sm-4 col-xs-12">
                        <a href="vaccationAdd.php"><button class="btn btn-block btn-primary">Add</button></a>
                </div>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Vacation Report</em></strong></h1> <br><br>
                <div class="row">
                <div class="col-sm-12">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Teacher List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <!-- <th>VID</th> -->
                                            <th>ACTION</th>
                                            <th>PHOTO</th>
                                            <th>TEACHER NIC</th>
                                            <th>LEAVE CATEGORY</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>VID</th>
                                            <th>ACTION</th>
                                            <th>PHOTO</th>
                                            <th>TEACHER NIC</th>
                                            <th>LEAVE CATEGORY</th>
                                             -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $sqlbmn="SELECT * FROM teacher WHERE scid = $vht";
                                        $resultbmn=$conn->query($sqlbmn);
                                        while($recordbmn = mysqli_fetch_array($resultbmn)){
                                            $fhg=$recordbmn['tid'];
                                            $sql3="SELECT * FROM tvaccationtbl WHERE tid = $fhg ";
                                            $result3=$conn->query($sql3);
                                        ?>

                                        <?php
                                        while($record3 = mysqli_fetch_array($result3)){
                                            $adedtcnt += 1;
                                            $tbit= $record3['tid'];
                                            $vaccid= $record3['vid'];
                                    ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <!-- <td> -->
                                                <?php
                                                //  echo $vaccid; 
                                                 ?>
                                            <!-- </td> -->
                                            <td><a href="../../Action/vaccation/tvaccUpdate.php?id=<?php echo $record3['tid']; ?>"><button class = "btn btn-primary">EDIT</button></a>
                                            &nbsp
                                            <a href="../../Action/vaccation/tvaccDelete.php?id=<?php echo $record3['tid']; ?>"><button class = "btn btn-danger">DELETE</button></a></td>
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
                                                // echo "<td><a href=addTeacherPhoto.php?id= $record3[tid];><img src=../../images/teacherPro/$tpro; alt=No></a></td>";
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
                                                $sqlteg="SELECT * FROM teacher WHERE tid = $tbit";
                                                $resultteg=$conn->query($sqlteg);
                                                while($recordteg = mysqli_fetch_array($resultteg)){
                                                    $enmyrn = $recordteg['nic'];
                                                    $deenmyrn = base64_decode($enmyrn);
                                                }
                                            ?> 
                                            <td><?php echo $deenmyrn; ?></td>
                                            <?php
                                                $sqlvcv="SELECT * FROM tvaccation WHERE vid = $vaccid";
                                                $resultvcv=$conn->query($sqlvcv);
                                                while($recordvcv = mysqli_fetch_array($resultvcv)){
                                                    $envcvn = $recordvcv['vcategory'];
                                                    $deenvcvn = base64_decode($envcvn);
                                                }
                                            ?> 
                                            <td><?php echo $deenvcvn; ?></td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <h4><strong>Total : </strong><?php echo $adedtcnt; ?></h4>
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