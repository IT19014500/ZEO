<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from certifyreq where tid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Service Certificate Request Removed!");
location= '../../htmlPages/AdminPannel/certificate/certifiAccessList.php';
</script>

<?php
    }
?>