<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from alresult where aid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("A/L Result Removed!");
location='../../htmlPages/AdminPannel/cardre/resAnalysis.php';
</script>

<?php
    }
?>