<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<?php
  $id=$_GET['id'];
  if($_SESSION['ref']==5){
  $sqltq="SELECT * FROM erservice where erlid = $id ";
  $resulttq=$conn->query($sqltq);
  while($recordtq = mysqli_fetch_array($resulttq)){
    // $ennprid = $recordtq['nprid'];
    $enschool = $recordtq['school'];
    $enproid = $recordtq['proid'];
    $enzid = $recordtq['zid'];
    $ensdate = $recordtq['sdate'];
    $enendate = $recordtq['endate'];
    $entid = $recordtq['tid'];
    

  }
  $delete="INSERT INTO erservicetmdel(erlid,school,proid,zid,sdate,endate,tid)VALUES('$id','$enschool','$enproid','$enzid','$ensdate','$enendate','$entid')";
  $result=$conn-> query($delete);


}
?> 


<?php

if($_SESSION['ref']==1){
     $delete="delete from erservice where erlid= $id";
     $result=$conn->query($delete);
}

if($result == true){
    
?>

<script>
<?php if($_SESSION['ref']==1){ ?>
    alert("Early Service Removed!");
<?php }elseif($_SESSION['ref']==5){ ?>
    alert("Service will be Removed After Approval!");
<?php } ?>
    location= '../../htmlPages/clientSide/earlysvcsList.php';
</script>

<?php
    }
?>

<?php
    }else{
        echo "Please Login!";
    }
?>