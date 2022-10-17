<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from profession where proid= '$id'";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Profession Removed!");
location= '../../htmlPages/AdminPannel/professions.php';
</script>

<?php
    }
?>