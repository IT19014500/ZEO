<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from marktbl where mid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Student Marks Details Removed!");
location= '../../htmlPages/AdminPannel/addMarks.php';
</script>

<?php
    }
?>