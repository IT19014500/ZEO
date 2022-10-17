<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from users where email= '$id'";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("User Removed!");
location= '../../htmlPages/AdminPannel/userAccountCr.php';
</script>

<?php
    }
?>