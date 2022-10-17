<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from markadmin where username= '$id'";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Marks Admin Removed!");
location= '../../htmlPages/AdminPannel/markadmAd.php';
</script>

<?php
    }
?>