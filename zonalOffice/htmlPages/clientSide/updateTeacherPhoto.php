<?php
try{
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && ($_SESSION['ref']==1 || $_SESSION['ref']==5)){
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
            $sql = "SELECT * FROM tpropic WHERE tpid= $id ";

            //Execute Query
            $res = mysqli_query($conn,$sql);

            //Count the Roes to Check whether id valid or not
            $count = mysqli_num_rows($res);
            
            if($count==1)
            {
                //Get all the data
                $row = mysqli_fetch_assoc($res);
                $current_image = $row['photo'];
            }
            else
            {
                //Redirect to manage category with session message
                // $_SESSION['no-category-found']= "<div class='error'>category not found.</div>";
                // header('location:'.SITEURL.'admin/manage-category.php');
                echo "<div class='error'>Photo not found.</div>";
            }
        }
        else
        {
            
        }
    }catch(Exception $e) {
        echo "Data Reading Failed!";
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
    <title>Main Admin</title>
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
                echo "Top Navigation Load Failed!";
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
                echo "Navigation Bar Load Failed!";
            }
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div style="background-color:#acb0bd;" class="page-wrapper">
            <div class="container-fluid">
                <?php
                    try{
                ?>
                        <div class="col-lg-2 col-sm-4 col-xs-12">
                            <a href="teacherlist.php"><button class="btn btn-block btn-primary">Done</button></a>
                        </div>
                <?php
                    }catch(Exception $e) {
                        echo "Button Load Failed!";
                    }
                ?>
                <!-- /row -->
                <h1 style="color:#000000;text-align:center;"><strong><em>Add Profile Photo</em></strong></h1><br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="white-box">
                            <h3 class="m-b-0 box-title">Upload Photo</h3>
                            <br>
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php
                                    try{
                                        if($current_image != ""){
                                        //Display the image
                                ?>
                                            <img src="<?php echo "../../images/teacherPro/$current_image"; ?>" alt="No Image" width="150px">
                                <?php
                                        }
                                        else{
                                        //Display Message
                                            echo "<div class='error'>Image Not Added.</div>";                    
                                        }
                                    }catch(Exception $e) {
                                        echo "Image Loading Failed!";
                                    }
                                ?>
                                <br><br>
                                <input type="file" name="image" required>
                                <br>
                                <div style="float:right;">
                                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="UPDATE">
                                    <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                                </div>
                            </form>
                            <?php
                                try{
                            ?>
                                <a href="<?php echo "deleteTeacherPhoto.php?id="?><?php echo $id; ?>&image_name=<?php echo $current_image; ?>" ><button class="btn btn-danger">Remove</button></a>
                            <?php
                                }catch(Exception $e) {
                                    echo "Image Deleting Process Failed!";
                                }
                            ?>
                        </div>
                        <br><br>
                    </div>
                </div>
                <?php
                    try{
                        if(isset($_POST['submit'])){
                                $id = $_POST['id'];
                                $current_im = $_FILES['image']['name'];
                                // 2. Updating New Image if Selected
                                if($current_im != "")
                                    {
                                        //Auto Rename our Image
                                        //Get the Extension of our image(jpg, png, gif, etc) e.g. "specialfood1.jpg"
                                        $ext = end(explode('.', $current_im));

                                        //Rename the image 
                                        $current_im = "UT_PRO_Photo_".rand(000,999).'.'.$ext;

                                        $source_path = $_FILES['image']['tmp_name'];

                                        $destination_path = "../../images/teacherPro/".$current_im;

                                        //Finally upload the Image
                                        $upload = move_uploaded_file($source_path, $destination_path);
                                        //Image is Availabe. So remove it
                                        $path = "../../images/teacherPro/".$current_image;
                                        //Remove the Image
                                        $remove = unlink($path);
                                        
                                        //check whether the image is uploaded or not 
                                        //And if the image is uploaded then will stop the process and redirect with error measssage
                                        if($upload==false)
                                        {
                                            //Set message $_SESSION['upload'] =
                                            echo "<div class='error'>Failed to Upload Image. </div>";
                                            //Redirect to Add Category Page
                                            die();
                                        }
                                    }
                                
                                else
                                {
                                    //Don't upload Image and set the image_name valued as blank
                                    $current_im='';
                                }
                                
                                // 3. Update the Database
                                $sql2 = "UPDATE tpropic SET
                                    photo = '$current_im'
                                    WHERE tpid='$id'
                                    ";

                                //Execute the Query
                                $res2 = mysqli_query($conn, $sql2);

                                // 4. Redirect to Manage Category with Message
                                // Check whether executed or not
                                if($res2==true)
                                {
                                    //category Updated
                                    // $_SESSION['update'] = "<div class='success'> Category Updated Successfully.</div>";
                                    // header('location:'.SITEURL.'admin/manage-category.php');

                                    echo "<div class='success'> Photo Updated Successfully.</div>";
                                    ?>

                                        <Script>
                                            alert("Photo Updated!");
                                            location= 'teacherlist.php';
                                        </Script>
                                    
                                    <?php
                                }
                                else
                                {
                                    //Failed to update category
                                    echo "<div class ='error'> Failed to Updated Photo.</div>";
                                }
                            }
                    }catch(Exception $e) {
                        echo "Update Failed!";
                    }
                ?>
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
        echo "Connection Fail!";
    }
?>