<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $pgslc=$_GET['pgi'];
     $delete="delete from duties where duid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Duty Removed!");
<?php
    if($pgslc=="bme"){
    ?>
        location= '../../htmlPages/AdminPannel/dutyAdd.php';
    <?php
    }elseif($pgslc=="hdp"){
    ?>
        location= '../../htmlPages/AdminPannel/hobDutyAdd.php';
    <?php
    }
    ?>
</script>

<?php
    }
?>