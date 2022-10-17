<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<?php
  $id=$_GET['id'];
  if($_SESSION['ref']==5){
  $sqltq="SELECT * FROM extractvi where eid = $id ";
  $resulttq=$conn->query($sqltq);
  while($recordtq = mysqli_fetch_array($resulttq)){

    $TextAct=$recordtq['extAct'];
    $Ttid=$recordtq['tid'];
    

  }
  $delete="INSERT INTO extractvitmdel(eid,extAct,tid)VALUES('$id','$TextAct','$Ttid')";
  $result=$conn-> query($delete);


}
?> 


<?php

if($_SESSION['ref']==1){
     $delete="delete from extractvi where eid= $id";
     $result=$conn->query($delete);
}

if($result == true){
    
?>

<script>
<?php if($_SESSION['ref']==1){ ?>
    alert("Extra Activity Removed!");
<?php }elseif($_SESSION['ref']==5){ ?>
    alert("Extra Activity will be Removed After Approval!");
<?php } ?>
    location= '../../htmlPages/clientSide/extraActivityList.php';
</script>

<?php
    }
?>

<?php
    }else{
        echo "Please Login!";
    }
?>