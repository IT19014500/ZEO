<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];

    

     $delete="delete from msucessalttble where msuid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Person Removed Permenently!");
location= '../../htmlPages/AdminPannel/tReport.php';
</script>

<?php
    }
?>