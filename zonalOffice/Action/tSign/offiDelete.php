<?php
    include('../../connection.php');
?>

<?php


     $id = $_GET['id'];
       

     $delete="delete from ofisign where tid = $id ";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Office Sign Removed!");
location= '../../htmlPages/AdminPannel/signCollection/officesign.php';
</script>

<?php
    }
?>