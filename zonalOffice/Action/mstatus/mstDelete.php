<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from mstatus where mrid= '$id'";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Marital Status Removed!");
location= '../../htmlPages/AdminPannel/maritaldAdd.php';
</script>

<?php
    }
?>