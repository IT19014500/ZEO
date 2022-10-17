<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from classt where clid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Class Number Removed!");
location= '../../htmlPages/AdminPannel/class.php';
</script>

<?php
    }
?>