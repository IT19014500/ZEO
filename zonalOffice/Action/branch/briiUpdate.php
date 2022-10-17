<?php
    try{
        include('../../connection.php');
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2 || $_SESSION['ref']==3){
?>
        <?php
            try{
                //Check whether thw id is set or not
                if(isset($_GET['id']))
                {
                    //Get the ID and all other details
                    //echo "Geting the Data";
                    $id = $_GET['id'];
                    //Create SQL Query to get all other details
                    $sql = "SELECT * FROM branches WHERE bid=$id";

                    //Execute Query
                    $res = mysqli_query($conn,$sql);

                    //Count the Roes to Check whether id valid or not
                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        //Get all the data
                        $row = mysqli_fetch_assoc($res);
                        $bname = $row['bName'];
                        $btitle = $row['bTitle'];
                        $current_image = $row['photo'];

                        $deenbname = base64_decode($bname);
                        $deenbtitle = base64_decode($btitle);

                    }
                    else
                    {
                        echo "<div class='error'>Branch not found.</div>";
                    }
                }
                else
                {
                    //Redirect to Mnanage Category
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
    <link href="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
            try{
                require_once '../../htmlPages/AdminPannel/menu/topNavigation/actionFolderTPN.php';
            }catch(Exception $e) {
                echo "Top Navigation Loading Failed!";
            }
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            try{
                require_once '../../htmlPages/AdminPannel/menu/actionFolder/branchAdmin.php';
            }catch(Exception $e) {
                echo "Navigation Bar Loading Failed!";
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href = "../../htmlPages/AdminPannel/branchAdmin/branchpic/branchPic.php"><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update Branch</em></strong></h1><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Branch Details</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"> comment </p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <?php
                                            try{
                                        ?>
                                            <div class="form-group">
                                                <label for="ObName" style="color:#000000;">Branch Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                    <input type="text" class="form-control" id = "ObName1"  name="ObName" value="<?php  echo $deenbname; ?>" placeholder="ENTER BRANCH NAME" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ObTitle" style="color:#000000;">Title</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <input type="text" class="form-control" id = "ObTitle1"  name="ObTitle" value="<?php  echo $deenbtitle; ?>" placeholder="ENTER TITLE" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    try{
                                                        if($current_image != "")
                                                        {
                                                            //Display the image
                                                    ?>
                                                            <img src="<?php echo "../../images/branch/$current_image"; ?>" alt="No Image" width="150px">
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                            //Display Message
                                                            echo "<div class='error'>Image Not Added.</div>";        
                                                        }
                                                    }catch(Exception $e) {
                                                        echo "Image Loading Failed!";
                                                    }
                                                ?>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <input type="file" name="image" required>
                                                </div>
                                            </div>
                                                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <?php
                                            }catch(Exception $e) {
                                                echo "Form Loading Failed!";
                                            }
                                        ?>
                                        <input style="height:50px;" type="submit" id = "submit" name = "submit" class="btn btn-success waves-effect waves-light m-r-10" value="UPDATE">
                                        <input style="height:50px;" type="reset" class="btn btn-inverse waves-effect waves-light" id = "reset" value="RESET">
                                    </form>
                                        <?php
                                            try{
                                                if(isset($_POST['submit']))
                                                {
                                                    //echo "Clicked";
                                                    //1.Get all the values from our form
                                                    $bname = $_POST['ObName'];
                                                    $btitle = $_POST['ObTitle'];
                                                    $current_im = $_FILES['image']['name'];

                                                    $bnamevar = base64_encode($bname);
                                                    $btitlevar = base64_encode($btitle);

                                                    // 2. Updating New Image if Selected
                                                    if($current_im != "")
                                                        {
                                                            //Auto Rename our Image
                                                            //Get the Extension of our image(jpg, png, gif, etc) e.g. "specialfood1.jpg"
                                                            $ext = end(explode('.', $current_im));

                                                            //Rename the image 
                                                            $current_im = "UBRI_Photo_".rand(000,999).'.'.$ext;

                                                            $source_path = $_FILES['image']['tmp_name'];

                                                            $destination_path = "../../images/branch/".$current_im;

                                                            //Finally upload the Image
                                                            $upload = move_uploaded_file($source_path, $destination_path);
                                                            //Image is Availabe. So remove it
                                                            $path = "../../images/branch/".$current_image;
                                                            //Remove the Image
                                                            $remove = unlink($path);
                                                            //check whether the image is uploaded or not 
                                                            //And if the image is uploaded then will stop the process and redirect with error measssage
                                                            if($upload==false)
                                                            {
                                                                echo "<div class='error'>Failed to Upload Image. </div>";
                                                                die();
                                                            }
                                                        }
                                                    else
                                                    {
                                                        //Don't upload Image and set the image_name valued as blank
                                                        $current_im='';
                                                    }
                                                    // 3. Update the Database
                                                    $sql2 = "UPDATE branches SET
                                                        bName = '$bnamevar',
                                                        bTitle = '$btitlevar',
                                                        photo = '$current_im'
                                                        WHERE bid='$id'
                                                        ";
                                                    //Execute the Query
                                                    $res2 = mysqli_query($conn, $sql2);
                                                    // 4. Redirect to Manage Category with Message
                                                    // Check whether executed or not
                                                    if($res2==true)
                                                    {
                                                        echo "<div class='success'> Photo Updated Successfully.</div>";
                                                    ?>
                                                        <Script>
                                                            alert("Branch Updated!");
                                                            location= '../../htmlPages/AdminPannel/branchAdmin/branchpic/branchPic.php';
                                                        </Script>
                                            <?php
                                                    }
                                                    else
                                                    {
                                                        echo "<div class ='error'> Failed to Updated Photo.</div>";
                                                    }
                                                }
                                            }catch(Exception $e) {
                                                echo "Update Failed!";
                                            }
                                        ?>
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
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/pdfmake.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.jsdelivr.net/gh/bpampuch/pdfmake%400.1.18/build/vfs_fonts.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../../htmlPages/AdminPannel/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
    <script src="../../htmlPages/AdminPannel/jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
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