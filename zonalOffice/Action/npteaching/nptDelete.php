<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<?php
  $id=$_GET['id'];
  if($_SESSION['ref']==5){
  $sqltq="SELECT * FROM nptteach where nptid = $id ";
  $resulttq=$conn->query($sqltq);
  while($recordtq = mysqli_fetch_array($resulttq)){
    // $ennprid = $recordtq['nprid'];
    $ensuID = $recordtq['suID'];
    $enowgrade = $recordtq['owgrade'];
    $enperiod = $recordtq['period'];
    $entid = $recordtq['tid'];

  }

  $delete="INSERT INTO nptteachtmdel(nptid,suID,owgrade,period,tid)VALUES('$id','$ensuID','$enowgrade','$enperiod','$entid') ";
  $result=$conn-> query($delete);


}
?> 

<?php

if($_SESSION['ref']==1){
     $delete="delete from nptteach where nptid= $id";
     $result=$conn->query($delete);
}

if($result == true){
    
?>

<script>
<?php if($_SESSION['ref']==1){ ?>
alert("Non Principle Teaching Details Removed!");
<?php }elseif($_SESSION['ref']==5){ ?>
alert("Details will be Removed After Approval!");
<?php } ?>
location= '../../htmlPages/clientSide/abtechingListcp.php';
</script>

<?php
    }
?>

<?php
    }else{
        echo "Please Login!";
    }
?>