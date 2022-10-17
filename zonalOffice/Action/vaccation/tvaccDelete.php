<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from tvaccationtbl where tid= '$id'";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Vaccation Details Removed!");
location= '../../htmlPages/clientSide/vaccList.php';
</script>

<?php
    }
?>