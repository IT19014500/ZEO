<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from provincet where proid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Province Removed!");
location= '../../htmlPages/AdminPannel/province.php';
</script>

<?php
    }
?>