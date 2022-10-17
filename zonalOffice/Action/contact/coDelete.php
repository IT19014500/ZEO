<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from contact where coid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Contact Mail Removed!");
location= '../../htmlPages/AdminPannel/contact/contactDe.php';
</script>

<?php
    }
?>