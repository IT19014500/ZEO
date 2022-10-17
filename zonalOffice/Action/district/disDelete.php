<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from district where distcode= '$id'";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
    alert("District Removed!");
    location= '../../htmlPages/AdminPannel/district.php';
</script>

<?php
    }
?>