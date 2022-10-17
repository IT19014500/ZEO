<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from serandgrade where sgid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Grade Removed!");
location= '../../htmlPages/AdminPannel/Grade.php';
</script>

<?php
    }
?>