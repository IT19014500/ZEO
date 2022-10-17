<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from subcategory where caid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Subject Category Removed!");
location= '../../htmlPages/AdminPannel/scategory.php';
</script>

<?php
    }
?>