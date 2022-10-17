<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from teacher where tid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Teacher Removed!");
location= '../../htmlPages/AdminPannel/teacher.php';
</script>

<?php
    }
?>