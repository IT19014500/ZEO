<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['tids'];
     $delete="delete from teachertmp where tid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Update Declined!");
location= '../../htmlPages/AdminPannel/signCollection/principlesign.php';
</script>

<?php
    }
?>