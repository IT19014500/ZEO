<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==2 ){
?>

<?php
    $rth = $_SESSION['uname'];
    $derth = base64_encode($rth);

    $sqlli="SELECT * FROM school WHERE census = '$derth'";
    $resultli=$conn->query($sqlli);
    while($recordli = mysqli_fetch_array($resultli)){
        $vht = $recordli['scid'];
    }
?>
      
<?php
  
  $sql3="SELECT * FROM teacher where scid = 110";
  $result3=$conn->query($sql3);

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
        .edit{
            background-color:dodgerblue;
            border:none;
            border-radius:18px;
            width:70px;
            color:#ffffff;
            height:35px;
        }

        .edit:hover{
            background-color:#56d173;
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
                <h1 style="color:#000000;text-align:center;"><strong><em>Pool Teachers</em></strong></h1> <br><br>
                <div class="row">
                <div class="col-sm-12">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">Pool List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">Details</caption>
                                    <thead>
                                        <tr>
                                            <th>ACTION</th>
                                            <th>PHOTO</th>
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
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>ACTION</th>
                                            <th>PHOTO</th>
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
                                            <th>PROFESSION</th> -->
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
                                            if(isset($_GET['tadid'])){
                                                $tadidad = $_GET['tadid'];

                                                $chsscna= $vht;
                                                
                                                $updatescp ="UPDATE teacher SET scid='$chsscna' where tid=$tadidad ";
                                                $conn-> query($updatescp);
                                                // Add insert part here
                                                if($conn-> query($updatescp)==TRUE){
                                                    ?>
                                                    <Script>
                                                    alert("Teacher Added to School!");
                                                    location= 'poolpg.php';
                                                    </Script>
                                                    <?php
                                                }
                                                exit();
                                            }
                                        

                                            $balka = "Yes";

                                            $sqljao="SELECT * FROM teacher where tid = $tbit && tid NOT IN (SELECT tid FROM ofisign);";
                                            $resultjao=$conn->query($sqljao);
                                            while($recordjao = mysqli_fetch_array($resultjao)){
                                                $balka = "No";
                                            }                    
                                        ?>
                                        <tr style="color:#000000;background-color:#ffffff;">
                                            <?php
                                                if($balka=="No"){
                                            ?>
                                                <td><a href="poolpg.php?tadid=<?php echo $record3['tid']; ?>"><button class = "edit">Add</button></a></td>
                                                <?php
                                                    }else{
                                                        echo "<td><div style='color:blue;'>Approved</div></td>";
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



                                                <td><?php echo $deenfullname; ?></td>
                                                <td><?php echo $deenaddressT; ?></td>
                                                <td><?php echo $deennic; ?></td>
                                                <td><?php echo $record3['dob']; ?></td>
                                                <td><?php echo $deentp; ?></td>
                                                <td><?php echo $deenwtp; ?></td>
                                                <td><?php echo $deensex; ?></td>
                                                <?php
                                    
                                                    $sqlms="SELECT * FROM mstatus where mrid = $mst";
                                                    $resultms=$conn->query($sqlms);
                                                    
                                                    
                                                        while($recordms = mysqli_fetch_array($resultms)){
                                                        $mstname = $recordms['status'];
                                                        $demstname = base64_decode($mstname);
                                                        
                                                    ?>
                                                <td><?php echo $demstname; ?></td>
                                                <?php
                                                    }
                                                ?>
                                                <td><?php echo $deenfbName; ?></td>
                                                <td><?php echo $deeneMail; ?></td>
                                                <td><?php echo $deensalschool; ?></td>
                                                <?php
                                    
                                                    $sqlpl="SELECT * FROM plcategory where plid = $pmnt";
                                                    $resultpl=$conn->query($sqlpl);
                                                    
                                                        while($recordpl = mysqli_fetch_array($resultpl)){
                                                        $planame = $recordpl['name'];
                                                        $deplaname = base64_decode($planame);
                                                        
                                                    ?>
                                                <td><?php echo $deplaname; ?></td>
                                                <?php
                                                    }
                                                ?>

                                                <?php
                                                    
                                                    $sqlsc="SELECT * FROM school where scid = $scna";
                                                    $resultsc=$conn->query($sqlsc);

                                                        while($recordsc = mysqli_fetch_array($resultsc)){
                                                        $schname = $recordsc['name'];
                                                        $deschname = base64_decode($schname);
                                                        
                                                ?>
                                                <td><?php echo $deschname; ?></td>
                                                <?php
                                                    }
                                                ?>

                                                <?php
                                                    
                                                    $sqllan="SELECT * FROM languages where lid = $lanid";
                                                    $resultlan=$conn->query($sqllan);

                                                        while($recordlan = mysqli_fetch_array($resultlan)){
                                                        $lanname = $recordlan['name'];
                                                        $delanname = base64_decode($lanname);
                                                        
                                                ?>
                                                <td><?php echo $delanname; ?></td>
                                                <?php
                                                    }
                                                ?>
                                                <td><?php echo $record3['pldate']; ?></td>

                                                <?php
                                                    
                                                    $sqlsu="SELECT * FROM subject where suID = $subjid";
                                                    $resultsu=$conn->query($sqlsu);

                                                        while($recordsu = mysqli_fetch_array($resultsu)){
                                                        $subjname = $recordsu['name'];
                                                        $desubjname = base64_decode($subjname);
                                                        
                                                    ?>
                                                <td><?php echo $desubjname; ?></td>
                                                <?php
                                                    }
                                                ?>

                                                <?php
                                                    
                                                    $sqlpr="SELECT * FROM profession where proid = $profid";
                                                    $resultpr=$conn->query($sqlpr);

                                                        while($recordpr = mysqli_fetch_array($resultpr)){
                                                        $profname = $recordpr['name'];
                                                        $deprofname = base64_decode($profname);
                                                ?>
                                                <td><?php echo $deprofname; ?></td>
                                            <?php
                                                }
                                            ?>
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