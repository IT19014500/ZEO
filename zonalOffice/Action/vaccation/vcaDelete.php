<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from tvaccation where vid= '$id'";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Vaccation Category Removed!");
location= '../../htmlPages/AdminPannel/Tvaccation.php';
</script>

<?php
    }
?>