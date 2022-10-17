<?php
    include('../../connection.php');
    session_start();
?>

<?php

     $id=$_GET['pid'];
     if($_SESSION['ref']==1){
        $sqltq="SELECT * FROM prcardret where pcrid = $id ";
        $resulttq=$conn->query($sqltq);
        while($recordtq = mysqli_fetch_array($resulttq)){
      
          $Tscid=$recordtq['scid'];
          $Tproid=$recordtq['proid'];
          $Tcnt=$recordtq['cnt'];
          
      
        }
        $delete="INSERT INTO prcardrettmdel(pcrid,scid,proid,cnt)VALUES('$id','$Tscid','$Tproid','$Tcnt')";
        $result=$conn-> query($delete);
      
      
      }


      
    if($_SESSION['ref']==2){
      
        $delete="delete from prcardret where pcrid= $id";
        $result=$conn->query($delete);
    }

if($result == true){
    
?>

<script>

<?php 
if($_SESSION['ref']==1){
?>
    alert("Administration Cardre Details will Remove After Zonal Head Approval!");
    location= '../../htmlPages/AdminPannel/cardre/priCardre.php';
<?php
}elseif($_SESSION['ref']==2){
?>
    alert("Administration Cardre Details Removed!");
    location= '../../htmlPages/AdminPannel/cardre/addTeacherNeed.php';
<?php
}
?>
</script>

<?php
    }
?>