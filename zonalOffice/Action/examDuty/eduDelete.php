<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from examdutyprof where eid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Proffession Removed!");
location= '../../htmlPages/AdminPannel/ExamDuty/dutyProfession.php';
</script>

<?php
    }
?>