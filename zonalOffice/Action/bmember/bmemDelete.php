
<?php
    include('../../connection.php');
?>

<!-- New Start -->

<?php

   //echo "delete page";
   //check whether the id and image_name value is set or not
   if(isset($_GET['id']) AND isset($_GET['image_name']))
   {
       //Get the value and Delete
       echo "Get Value and delete";
       $id = $_GET['id'];
       $image_name =$_GET['image_name'];

       //Remove the physical image file is availabe
       if($image_name !="")
       {
           //Image is Availabe. So remove it
           $path = "../../images/bmemProfile/".$image_name;
           //Remove the Image
           $remove = unlink($path);

           //If failed to remove image then an error message and stop the process
           if($remove==false)
           {
            //set the Session Message
            // $_SESSION['remove'] = "<div class='error'>Failed to remove category Image.</div>";

            // //Redirect to manage category page
            // header('location:'.SITEURL.'admin/manage-category.php');
            // //stop the process
            echo "<div class='error'>Failed to remove Photo.</div>";
            die();
           }
       
       }

       //Delete Data from database
       //SQl Query to Delete from Database
       $sql = "DELETE FROM bmemtbl WHERE bmemid=$id";

       //Execute the Query
       $res = mysqli_query($conn, $sql);

       //Check whether the data is delete from database or not
       if($res==true)
       {
        //    //Set success Message and Redirect
        //    $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
        //    //Redirect to manage category
        //    header('location:'.SITEURL.'admin/manage-category.php');
           echo "<div class='success'>Deleted Successfully.</div>";
           ?>

                <script>
                alert("Member Removed!");
                location= '../../htmlPages/AdminPannel/branchAdmin/branchpic/bmemDetail.php';
                </script>

            <?php
       }
       else
       {
           
           //Set Fail Message and Redirect
        //    $_SESSION['delete'] =  "<div class='error'>Failed to Deleted Category.</div>";
        //    //Redirect to manage category
        //    header('location:'.SITEURL.'admin/manage-category.php');
           echo "<div class='error'>Failed to Delete Photo.</div>";
       }

   }
   else
   {
       //redirect to manage category page
    //    header('location:'.SITEURL.'admin/manage-category.php');
   }

?>

<!-- New End -->