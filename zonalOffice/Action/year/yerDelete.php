<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from yeart where YID= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
    alert("Year Removed!");
    location= '../../htmlPages/AdminPannel/yearSet.php';
</script>

<?php
    }
?>