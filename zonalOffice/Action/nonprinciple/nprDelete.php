<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<?php
  $id=$_GET['id'];
  if($_SESSION['ref']==5){
  $sqltq="SELECT * FROM nonprinciple where nprid = $id ";
  $resulttq=$conn->query($sqltq);
  while($recordtq = mysqli_fetch_array($resulttq)){
    // $ennprid = $recordtq['nprid'];
    $ensgid = $recordtq['sgid'];
    $enscwsdate = $recordtq['scwsdate'];
    $enmsubject = $recordtq['msubject'];
    $enowgrade = $recordtq['owgrade'];
    $entid = $recordtq['tid'];

  }
  $delete="INSERT INTO nonprincipletmdel(nprid,sgid,scwsdate,msubject,owgrade,tid)VALUES('$id','$ensgid','$enscwsdate','$enmsubject','$enowgrade','$entid') ";
  $result=$conn-> query($delete);


}
?> 

<?php

    if($_SESSION['ref']==1){
     $delete="delete from nonprinciple where nprid= $id";
     $result=$conn->query($delete);
    }

if($result == true){
    
?>

<script>
<?php if($_SESSION['ref']==1){ ?>
alert("Non Principle Removed!");
<?php }elseif($_SESSION['ref']==5){ ?>
alert("Details will be Removed after Approval!");
<?php } ?>
location= '../../htmlPages/clientSide/nprList.php';
</script>

<?php
    }
?>

<?php
    }else{
        echo "Please Login!";
    }
?>