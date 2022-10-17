<?php
    include('../../connection.php');
    session_start();
?>

<?php

     $id=$_GET['id'];
     if($_SESSION['ref']==1){
        $sqltq="SELECT * FROM cardret where crid = $id ";
        $resulttq=$conn->query($sqltq);
        while($recordtq = mysqli_fetch_array($resulttq)){
      
          $Tscid=$recordtq['scid'];
          $TsuID=$recordtq['suID'];
          $Tcnt=$recordtq['cnt'];
          
      
        }
        $delete="INSERT INTO cardrettmdel(crid,scid,suID,cnt)VALUES('$id','$Tscid','$TsuID','$Tcnt')";
        $result=$conn-> query($delete);
      
      
      }


      
    if($_SESSION['ref']==2){
      
        $delete="delete from cardret where crid= $id";
        $result=$conn->query($delete);
    }

if($result == true){
    
?>

<script>

<?php 
if($_SESSION['ref']==1){
?>
    alert("Cardre Details will Remove After Zonal Head Approval!");
    location= '../../htmlPages/AdminPannel/cardre/priCardre.php';
<?php
}elseif($_SESSION['ref']==2){
?>
    alert("Cardre Details Removed!");
    location= '../../htmlPages/AdminPannel/cardre/addTeacherNeed.php';
<?php
}
?>
</script>

<?php
    }
?>