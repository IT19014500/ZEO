<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from tremove where trdid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Subject Category Removed!");
location= '../../htmlPages/AdminPannel/trmdfile.php';
</script>

<?php
    }
?>