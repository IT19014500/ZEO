<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['srid'];
     $delete="delete from sclrship where sclid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Scholership Result Removed!");
location='../../htmlPages/AdminPannel/cardre/resAnalysis.php';
</script>

<?php
    }
?>