<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from subject where suID= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Subject Removed!");
location= '../../htmlPages/AdminPannel/subject.php';
</script>

<?php
    }
?>