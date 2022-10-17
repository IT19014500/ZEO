<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from classtbllet where cleid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Class Removed!");
location= '../../htmlPages/AdminPannel/classLetter.php';
</script>

<?php
    }
?>