<?php
    try{
        include('../../../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==4 || $_SESSION['ref']==2){
?>
      
<?php
    try{
        $sqltq="SELECT * FROM hobtbl ";
        $resulttq=$conn->query($sqltq);
        $count = mysqli_num_rows($resulttq);
    }catch(Exception $e) {
        echo "HOB List Reading Failed!";
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
    <link rel="icon" type="image/png" sizes="16x16" href="../../../../images/logoGvmnt.png">
    <title>Branch Admin</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="../../jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="../../jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../../cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- ===== Animation CSS ===== -->
    <link href="../../jthemes.org/demo-admin/cubic/cubic-html/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="../../jthemes.org/demo-admin/cubic/cubic-html/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="../../jthemes.org/demo-admin/cubic/cubic-html/css/colors/default.css" id="theme" rel="stylesheet">
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
                require_once '../../menu/topNavigation/BranchAdmin/branchPhotoTPN.php';
            }catch(Exception $e) {
                echo "Top Navigation Loading Failed!";
            }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            try{
                require_once '../../menu/branchAdminBpic.php';
            }catch(Exception $e) {
                echo "Navigation Bar Loading Failed!";
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Manage HOB Details</em></strong></h1><br>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php
                                try{
                                    $sqlmst="SELECT * FROM branches ";
                                    $resultmst=$conn->query($sqlmst);
                                }catch(Exception $e) {
                                    echo "Branch List Reading Failed!";
                                }
                            ?> 
                            <select class="form-control" id = "Obid1" name="Obid" required>
                                <option value="0" selected>-Select Branch-</option>
                                <?php
                                    try{
                                        while($recordmst = mysqli_fetch_array($resultmst)){  
                                            $msta=$recordmst['bid'];
                                            $mstana=$recordmst['bName'];
                                            $demstana = base64_decode($mstana);
                                ?>
                                            <option value="<?php echo $msta; ?>" ><?php echo $demstana; ?></option>
                                <?php
                                        }
                                    }catch(Exception $e) {
                                        echo "Branch List Loading Failed!";
                                    }
                                ?>
                            </select>
                            <br>
                            <input type="text" class="form-control" id = "Ohname1"  name="Ohname" placeholder="ENTER NAME" required>
                            <br>
                            <input type="text" class="form-control" id = "Ohprof1"  name="Ohprof" placeholder="ENTER PROFESSION" required>
                            <br>
                            <input type="text" class="form-control" id = "Ofb1"  name="Ofb" placeholder="ENTER FACEBOOK LINK" >
                            <br>
                            <input type="text" class="form-control" id = "Otwitter1"  name="Otwitter" placeholder="ENTER TWITTER LINK" >
                            <br>
                            <input type="text" class="form-control" id = "Oinsta1"  name="Oinsta" placeholder="ENTER INSTAGRAM LINK" >
                            <br>
                            <input type="text" class="form-control" id = "Olinkdin1"  name="Olinkdin" placeholder="ENTER LINKDIN LINK" >
                            <br>
                            <input type="text" class="form-control" id = "Oiden1"  name="Oiden" placeholder="ENTER NIC NUMBER" required>
                            <br>
                            <input type="text" class="form-control" id = "Otpen1"  name="Otpen" placeholder="ENTER TP NUMBER" >
                            <br>
                            <input type="file" class="form-control" id = "Osiimg1"  name="Osiimg" placeholder="SELECT IMAGE" required>
                            <br>
                            <div style="float:right;">
                                <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="SUBMIT">
                                <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                            </div>
                        </form>
                    </div>
                    <?php
                        try{
                            //Check whether the submit Button is Clicked or Not
                            if(isset($_POST['submit']))
                            {
                                //1. Get the value from category forom
                                $tbbid = $_POST['Obid'];
                                $tbName = $_POST['Ohname'];
                                $tbTitle = $_POST['Ohprof'];
                                $tbfb = $_POST['Ofb'];
                                $tbtwitter = $_POST['Otwitter'];
                                $tbinsta = $_POST['Oinsta'];
                                $tblinkdin = $_POST['Olinkdin'];
                                $tbiden = $_POST['Oiden'];
                                $tbtpen = $_POST['Otpen'];

                                // add encrypted part here
                                $tbNamevar = base64_encode($tbName);
                                $tbTitlevar = base64_encode($tbTitle);
                                $tbfbvar = base64_encode($tbfb);
                                $tbtwittervar = base64_encode($tbtwitter);
                                $tbinstavar = base64_encode($tbinsta);
                                $tblinkdinvar = base64_encode($tblinkdin);
                                $tbidenvar = base64_encode($tbiden);
                                $tbtpenvar = base64_encode($tbtpen);

                                if(isset($_FILES['Osiimg']['name']))
                                {
                                    //upload the image
                                    //To upload image we need image name,source path and destination path
                                    $image_name = $_FILES['Osiimg']['name'];

                                    //Upload the image only if image is selected
                                    if($image_name != "")
                                    {


                                        //Auto Rename our Image
                                        //Get the Extension of our image(jpg, png, gif, etc)
                                        $ext = end(explode('.', $image_name));

                                        //Rename the image 
                                        $image_name = "HOD_Photo_".rand(000,999).'.'.$ext; 

                                        $source_path = $_FILES['Osiimg']['tmp_name'];

                                        $destination_path = "../../../../images/hobProfile/".$image_name;

                                        //Finally upload the Image
                                        $upload = move_uploaded_file($source_path, $destination_path);

                                        //check whether the image is uploaded or not 
                                        //And if the image is uploaded then will stop the process and redirect with error measssage
                                        if($upload==false)
                                        {
                                            //Set message $_SESSION['upload'] =
                                            echo "<div class='error'>Failed to Upload Image. </div>";
                                            //Redirect to Add Category Page
                                            // header('location:'.SITEURL.'admin/add-category.php');
                                            //Stop the process
                                            die();
                                        }
                                    }
                                }
                                else
                                {
                                    //Don't upload Image and set the image_name valued as blank
                                    $image_name='';
                                }

                                //2. Craete SQL Query to Insert Category into Database
                                $sql = "INSERT INTO hobtbl SET
                                    bid = '$tbbid',
                                    hname = '$tbNamevar',
                                    hprof = '$tbTitlevar',
                                    fb = '$tbfbvar',
                                    twitter = '$tbtwittervar',
                                    insta = '$tbinstavar',
                                    linkdin = '$tblinkdinvar',
                                    iden = '$tbidenvar',
                                    tpn = '$tbtpenvar',
                                    hphoto ='$image_name'
                                    ";

                                //3.Execute the Query and save in Database
                                $res = mysqli_query($conn,$sql);

                                //4.Check whether the query executed or not and data added or not
                                if($res==true)
                                {
                                    //Query Executed and category Added ........$_SESSION['add'] =
                                    echo "<div class='success'>New Branch Added Successfully.</div>";
                                    
                                    ?>
                                    
                                    <Script>
                                        alert("HOB Added!");
                                        location='hobDetail.php';
                                    </Script>
                                    
                                    <?php


                                    // header('location:'.SITEURL.'admin/manage-category.php');
                                }
                                else
                                {
                                    //Failed to Add Category 
                                    echo "<div class='error'>Failed to Add Branch.</div>";
                                    
                                    //Redirect to manage category page
                                    // header('location:'.SITEURL.'admin/add-category.php');
                                }

                            }
                        }catch(Exception $e) {
                            echo "Data Insert Failed!";
                        }
                    ?>
                    <div class="col-sm-8">
                        <div style="background-color:#729ca6;" class="white-box">
                            <h3 class="box-title m-b-0">HOD List</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <caption style="color:#000000;">HOB Details</caption>
                                    <thead>
                                        <tr>
                                            <th>HOD ID</th>
                                            <th>Branch ID</th>
                                            <th>Name</th>
                                            <th>Profession</th>
                                            <th>FB</th>
                                            <th>Twitter</th>
                                            <th>Instagram</th>
                                            <th>Linkdin</th>
                                            <th>NIC NO</th>
                                            <th>TP NO</th>
                                            <th>Photo</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>HOD ID</th>
                                            <th>Branch ID</th>
                                            <th>Name</th>
                                            <th>Profession</th>
                                            <th>FB</th>
                                            <th>Twitter</th>
                                            <th>Instagram</th>
                                            <th>Linkdin</th>
                                            <th>NIC NO</th>
                                            <th>TP NO</th>
                                            <th>Photo</th>
                                            <th>Update</th>
                                            <th>Delete</th> -->
                                        </tr> 
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            try{
                                                //Check whether we have data in databse or not
                                                if($count>0)
                                                {
                                                    //we have data in database
                                                    //get the data and display
                                                    while($recordtq=mysqli_fetch_assoc($resulttq))
                                                    {
                                                        $id = $recordtq['hoid'];
                                                        $bbid = $recordtq['bid'];
                                                        $bname = $recordtq['hname'];
                                                        $bdes = $recordtq['hprof'];
                                                        $bfb = $recordtq['fb'];
                                                        $btwitter = $recordtq['twitter'];
                                                        $binsta = $recordtq['insta'];
                                                        $blinkdin = $recordtq['linkdin'];
                                                        $biden = $recordtq['iden'];
                                                        $btpn = $recordtq['tpn'];
                                                        $image_name = $recordtq['hphoto'];
                                                        
                                                        $deenbname = base64_decode($bname);
                                                        $deenbdes = base64_decode($bdes);
                                                        $deenbfb = base64_decode($bfb);
                                                        $deenbtwitter = base64_decode($btwitter);
                                                        $deenbinsta = base64_decode($binsta);
                                                        $deenblinkdin = base64_decode($blinkdin);
                                                        $deenbiden = base64_decode($biden);
                                                        $deenbtpn = base64_decode($btpn);

                                                        ?>

                                                        <tr>
                                                            <td><?php echo $id; ?></td>
                                                <?php
                                                $sqllambo="SELECT * FROM branches WHERE bid = $bbid";
                                                $resultlambo=$conn->query($sqllambo);
                                                while($recordlambo = mysqli_fetch_array($resultlambo)){
                                                $bbidnams = $recordlambo['bName'];
                                                $deenbbidnams = base64_decode($bbidnams);

                                                }
                                                ?>
                                                            <td><?php echo $deenbbidnams; ?></td>
                                                            <td><?php echo $deenbname; ?></td>
                                                            <td><?php echo $deenbdes; ?></td>
                                                            <td><?php echo $deenbfb; ?></td>
                                                            <td><?php echo $deenbtwitter; ?></td>
                                                            <td><?php echo $deenbinsta; ?></td>
                                                            <td><?php echo $deenblinkdin; ?></td>
                                                            <td><?php echo $deenbiden; ?></td>
                                                            <td><?php echo $deenbtpn; ?></td>

                                                            <td>
                                                                <?php
                                                                    //Check whether image name is available or not
                                                                    if($image_name!="")
                                                                    {
                                                                        //Dislpay the image
                                                                ?>
                                                                        <img src="<?php echo "../../../../images/hobProfile/$image_name"; ?>" alt="No Image" style="width:300px" >
                                                                <?php 
                                                                    }
                                                                    else
                                                                    {
                                                                        //Display the Message
                                                                        echo "<div class='error'>Image not Added.</div>"; 
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo "../../../../Action/HOD/hodUpdate.php?id="?><?php echo $id; ?>" ><button class="btn btn-primary">Update</button></a> 
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo "../../../../Action/HOD/hodDelete.php?id="?><?php echo $id; ?>&image_name=<?php echo $image_name; ?>" ><button class="btn btn-danger">Delete</button></a>   
                                                            </td>
                                                        </tr>

                                                        <?php

                                                        
                                                    }
                                                }

                                                else

                                                {
                                                    //we do not have data
                                                    //we will daisplay the message inside table

                                                    ?>
                                                    <tr>
                                                        <td colspan="6"><div class="error">No Head Person Added.</div></td>
                                                    </tr>

                                        <?php
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
    <script src="../../jthemes.org/demo-admin/cubic/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../../jthemes.org/demo-admin/cubic/cubic-html/js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../../jthemes.org/demo-admin/cubic/cubic-html/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../../jthemes.org/demo-admin/cubic/cubic-html/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../../jthemes.org/demo-admin/cubic/cubic-html/js/custom.js"></script>
    <script src="../../jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="../../cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../../cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="../../cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../../cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="../../cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="../../cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../../cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
    <script src="../../jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
        }else{
        echo "Please Login!";
        }
    }catch(Exception $e) {
        echo "Connection Fail!";
    }
?>