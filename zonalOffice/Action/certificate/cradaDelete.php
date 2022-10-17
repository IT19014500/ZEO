<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from certifyreqck where tid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Service Certificate Request Removed!");
location= '../../htmlPages/AdminPannel/certifyApr.php';
</script>

<?php
    }
?>