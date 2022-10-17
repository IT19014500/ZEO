<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from languages where lid= '$id'";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Language Removed!");
location= '../../htmlPages/AdminPannel/languageAdd.php';
</script>

<?php
    }
?>