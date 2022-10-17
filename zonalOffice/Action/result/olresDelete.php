<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['oid'];
     $delete="delete from olresult where olid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("O/L Result Removed!");
location='../../htmlPages/AdminPannel/cardre/resAnalysis.php';
</script>

<?php
    }
?>