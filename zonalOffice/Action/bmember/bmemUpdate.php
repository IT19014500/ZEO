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
            $sql = "SELECT * FROM bmemtbl WHERE bmemid=$id";

            //Execute Query
            $res = mysqli_query($conn,$sql);

            //Count the Roes to Check whether id valid or not
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //Get all the data
                $row = mysqli_fetch_assoc($res);
                $btbid = $row['bid'];
                $bname = $row['hname'];
                $btitle = $row['hprof'];
                $btfb = $row['fb'];
                $bttwitter = $row['twitter'];
                $btinsta = $row['insta'];
                $btlinkdin = $row['linkdin'];
                $btiden = $row['iden'];
                $bttpn = $row['tpn'];
                $current_image = $row['hphoto'];

                // add decrpted part here
                $deenbname = base64_decode($bname);
                $deenbtitle = base64_decode($btitle);
                $deenbtfb = base64_decode($btfb);
                $deenbttwitter = base64_decode($bttwitter);
                $deenbtinsta = base64_decode($btinsta);
                $deenbtlinkdin = base64_decode($btlinkdin);
                $deenbtiden = base64_decode($btiden);
                $deenbttpn = base64_decode($bttpn);

            }
            else
            {
                //Redirect to manage category with session message
                echo "<div class='error'>Profile not found.</div>";
            }
        }
        else
        {
            //Redirect to Mnanage Category
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
    <title>ZEO Admin</title>
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
                    <a href = "../../htmlPages/AdminPannel/branchAdmin/branchpic/bmemDetail.php"><button class="btn btn-block btn-primary">Click to Back</button></a>
                </div>
                <br><br>
                <h1 style="color:#000000;text-align:center;"><strong><em>Update Branch</em></strong></h1><br>
                <div class="row">
                <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Member Details</h3><br>
                            <!-- <p class="text-muted m-b-30 font-13"> comment </p> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <?php
                                            try{
                                                $bbc="";
                                                $bbcd="";
                                                $sqlbn="SELECT * FROM branches ";
                                                $resultbn=$conn->query($sqlbn);
                                            }catch(Exception $e) {
                                                echo "Branch List Loading Failed!";
                                            }
                                        ?>
                                        <div class="form-group">
                                            <label for="Obid" style="color:#000000;">Branch</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></i></div>
                                                <select class="form-control" id = "Obid1" name="Obid" placeholder="ENTER BRANCH" required>
                                                    <?php
                                                        try{
                                                            while($recordbn = mysqli_fetch_array($resultbn)){  
                                                                $scc=$recordbn['bid'];
                                                                $sccna=$recordbn['bName'];
                                                                $desccna = base64_decode($sccna);
                                                                $scch=$btbid;
                                                                if($scc==$scch){
                                                                    $bbc='selected';
                                                                    $bbcd=$scc;
                                                                }
                                                    ?>
                                                            <option value="<?php echo $scc; ?>" <?php if($bbcd==$scc){echo $bbc;}?>><?php echo $desccna; ?></option>
                                                        <?php
                                                            }
                                                        }catch(Exception $e) {
                                                            echo "Branch List Processing Failed!";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                            try{
                                        ?>
                                            <div class="form-group">
                                                <label for="Ohname" style="color:#000000;">Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <input type="text" class="form-control" id = "Ohname1"  name="Ohname" value="<?php echo $deenbname; ?>" placeholder="ENTER NAME" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Ohprof" style="color:#000000;">Proffession</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <input type="text" class="form-control" id = "Ohprof1"  name="Ohprof" value="<?php  echo $deenbtitle; ?>" placeholder="ENTER PROFESSION" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Ofb" style="color:#000000;">Facebook URL</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <input type="text" class="form-control" id = "Ofb1"  name="Ofb" value="<?php  echo $deenbtfb; ?>" placeholder="ENTER FB LINK" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Otwitter" style="color:#000000;">Twitter URL</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <input type="text" class="form-control" id = "Otwitter1"  name="Otwitter" value="<?php  echo $deenbttwitter; ?>" placeholder="ENTER TWITTER LINK" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Oinsta" style="color:#000000;">Instergram URL</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <input type="text" class="form-control" id = "Oinsta1"  name="Oinsta" value="<?php  echo $deenbtinsta; ?>" placeholder="ENTER INSTAGRAM LINK" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Olinkdin" style="color:#000000;">Linkdin URL</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <input type="text" class="form-control" id = "Olinkdin1"  name="Olinkdin" value="<?php  echo $deenbtlinkdin; ?>" placeholder="ENTER LINKDIN LINK" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Oiden" style="color:#000000;">NIC Number</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <input type="text" class="form-control" id = "Oiden1"  name="Oiden" value="<?php  echo $deenbtiden; ?>" placeholder="ENTER ID NUMBER" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Otpen" style="color:#000000;">Telephone Number</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                    <input type="text" class="form-control" id = "Otpen1"  name="Otpen" value="<?php  echo $deenbttpn; ?>" placeholder="ENTER TP NUMBER">
                                                </div>
                                            </div>
                                        <?php
                                            }catch(Exception $e) {
                                                echo "Form Processing Failed!";
                                            }
                                        ?>
                                        <div class="form-group">
                                            <?php
                                                try{
                                                    if($current_image != "")
                                                    {
                                                        //Display the image
                                                        ?>
                                                        <img src="<?php echo "../../images/bmemProfile/$current_image"; ?>" alt="No Image" width="150px">
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        //Display Message
                                                        echo "<div class='error'>Image Not Added.</div>";
                                                        
                                                    }
                                                }catch(Exception $e) {
                                                    echo "Image Processing Failed!";
                                                }
                                            ?>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-square-o" aria-hidden="true"></i></div>
                                                <input type="file" name="image" required>
                                            </div>
                                        </div>
                                        <?php
                                            try{
                                        ?>
                                                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <input style="height:50px;" type="submit" id = "submit" name = "submit" class="btn btn-success waves-effect waves-light m-r-10" value="UPDATE">
                                                <input style="height:50px;" type="reset" class="btn btn-inverse waves-effect waves-light" id = "reset" value="RESET">
                                        <?php
                                            }catch(Exception $e) {
                                                echo "Data Identification Failed!";
                                            }
                                        ?>
                                    </form>
                                        <?php
                                            try{
                                                if(isset($_POST['submit']))
                                                {
                                                    //1.Get all the values from our form
                                                    $bbid = $_POST['Obid'];
                                                    $bname = $_POST['Ohname'];
                                                    $btitle = $_POST['Ohprof'];
                                                    $bfb = $_POST['Ofb'];
                                                    $btwitter = $_POST['Otwitter'];
                                                    $binsta = $_POST['Oinsta'];
                                                    $blinkdin = $_POST['Olinkdin'];
                                                    $biden = $_POST['Oiden'];
                                                    $btpen = $_POST['Otpen'];
                                                    $current_im = $_FILES['image']['name'];
                                                    
                                                    // add encrypted part here

                                                    $bnamevar = base64_encode($bname);
                                                    $btitlevar = base64_encode($btitle);
                                                    $bfbvar = base64_encode($bfb);
                                                    $btwittervar = base64_encode($btwitter);
                                                    $binstavar = base64_encode($binsta);
                                                    $blinkdinvar = base64_encode($blinkdin);
                                                    $bidenvar = base64_encode($biden);
                                                    $btpenvar = base64_encode($btpen);

                                                    // 2. Updating New Image if Selected
                                                    if($current_im != "")
                                                        {
                                                            //Auto Rename our Image
                                                            //Get the Extension of our image(jpg, png, gif, etc) e.g. "specialfood1.jpg"
                                                            $ext = end(explode('.', $current_im));

                                                            //Rename the image 
                                                            $current_im = "UBMEM_Photo_".rand(000,999).'.'.$ext;

                                                            $source_path = $_FILES['image']['tmp_name'];

                                                            $destination_path = "../../images/bmemProfile/".$current_im;

                                                            //Finally upload the Image
                                                            $upload = move_uploaded_file($source_path, $destination_path);
                                                            //Image is Availabe. So remove it
                                                            $path = "../../images/bmemProfile/".$current_image;
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
                                                    $sql2 = "UPDATE bmemtbl SET
                                                        bid = '$bbid',
                                                        hname = '$bnamevar',
                                                        hprof = '$btitlevar',
                                                        fb = '$bfbvar',
                                                        twitter = '$btwittervar',
                                                        insta = '$binstavar',
                                                        linkdin = '$blinkdinvar',
                                                        iden = '$bidenvar',
                                                        tpn = '$btpenvar',
                                                        hphoto = '$current_im'
                                                        WHERE bmemid='$id'
                                                        ";

                                                    //Execute the Query
                                                    $res2 = mysqli_query($conn, $sql2);

                                                    // 4. Redirect to Manage Category with Message
                                                    // Check whether executed or not
                                                    if($res2==true)
                                                    {
                                                        //category Updated
                                                        echo "<div class='success'> Photo Updated Successfully.</div>";
                                                        ?>
                                                            <Script>
                                                                alert("Member Updated!");
                                                                location= '../../htmlPages/AdminPannel/branchAdmin/branchpic/bmemDetail.php';
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
                                                echo "Insert Failed!";
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
    }catch(Exception $e) {
        echo "Connection Fail!";
    }
?>