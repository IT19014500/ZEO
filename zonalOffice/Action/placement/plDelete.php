<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from plcategory where plid= '$id'";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Placement Removed!");
location= '../../htmlPages/AdminPannel/placementc.php';
</script>

<?php
    }
?>