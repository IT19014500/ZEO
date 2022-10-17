<?php
    include('../../connection.php');
?>

<?php

    $tea_ID =$_GET['tea_ID'];

?>

<?php

     $delete="delete from prisign where tid = $tea_ID ";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Principle Approve Removed!");
location= '../../htmlPages/AdminPannel/signCollection/principlesign.php';
</script>

<?php
    }
?>