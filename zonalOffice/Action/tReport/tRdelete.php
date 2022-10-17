<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];

     $sqlbyta="SELECT * FROM msucesslist WHERE msid = $id";
     $resultbyta=$conn->query($sqlbyta);
     while($recordbyta = mysqli_fetch_array($resultbyta)){
        
        $Tnamemvar = $recordbyta['name'];
        $Ttpnmvar = $recordbyta['tpn'];
        $Tnicmvar = $recordbyta['nic'];
        $Trdatemvar = $recordbyta['rdate'];

        $addmsucessl="INSERT INTO msucessalttble(name,tpn,nic,rdate)VALUES('$Tnamemvar','$Ttpnmvar','$Tnicmvar','$Trdatemvar')";
        $conn-> query($addmsucessl);
     }

     $delete="delete from msucesslist where msid= $id";
     $result=$conn->query($delete);

if($result == true){
    
?>

<script>
alert("Person Removed!");
location= '../../htmlPages/AdminPannel/tReport.php';
</script>

<?php
    }
?>