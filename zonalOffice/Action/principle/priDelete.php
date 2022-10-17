<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from principle where priid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Principle Removed!");
location= '../../htmlPages/AdminPannel/principleAdd.php';
</script>

<?php
    }
?>