<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from division where divcode= '$id' ";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Division Removed!");
location= '../../htmlPages/AdminPannel/division.php';
</script>

<?php
    }
?>