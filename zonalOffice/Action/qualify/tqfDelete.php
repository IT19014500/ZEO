<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<?php
  $id=$_GET['id'];
  if($_SESSION['ref']==5){
  $sqltq="SELECT * FROM qualification where tid = $id ";
  $resulttq=$conn->query($sqltq);
  while($recordtq = mysqli_fetch_array($resulttq)){
    // $ennprid = $recordtq['nprid'];
    $enba = $recordtq['ba'];
    $enbsc = $recordtq['bsc'];
    $enbscs = $recordtq['bscs'];
    $enbed = $recordtq['bed'];
    $enbba = $recordtq['bba'];
    $enother = $recordtq['other'];
    $enpgde = $recordtq['pgde'];
    $enpgdem = $recordtq['pgdem'];
    $enpgdea = $recordtq['pgdea'];
    $enoPther = $recordtq['oPther'];
    $enma = $recordtq['ma'];
    $enmsc = $recordtq['msc'];
    $enmed = $recordtq['med'];
    $enmphil = $recordtq['mphil'];
    $enphd = $recordtq['phd'];

  }
  $delete="INSERT INTO qualificationtmdel(tid,ba,bsc,bscs,bed,bba,other,pgde,pgdem,pgdea,oPther,ma,msc,med,mphil,phd)VALUES('$id','$enba','$enbsc','$enbscs','$enbed','$enbba','$enother','$enpgde','$enpgdem','$enpgdea','$enoPther','$enma','$enmsc','$enmed','$enmphil','$enphd')";
  $result=$conn-> query($delete);


}
?> 


<?php

if($_SESSION['ref']==1){
     $delete="delete from qualification where tid= $id";
     $result=$conn->query($delete);
}
if($result == true){
    
?>

<script>
<?php if($_SESSION['ref']==1){ ?>
alert("Teacher Qualification Removed!");
<?php }elseif($_SESSION['ref']==5){ ?>
alert("Qualification will be Removed After Approval!");
<?php } ?>
location= '../../htmlPages/clientSide/qualifiList.php';
</script>

<?php
    }
?>

<?php
    }else{
        echo "Please Login!";
    }
?>