<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from zonet where zid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Zone Removed!");
location= '../../htmlPages/AdminPannel/zone.php';
</script>

<?php
    }
?>