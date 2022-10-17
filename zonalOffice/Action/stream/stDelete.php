<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from substream where ssid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Subject Stream Removed!");
location= '../../htmlPages/AdminPannel/substreams.php';
</script>

<?php
    }
?>