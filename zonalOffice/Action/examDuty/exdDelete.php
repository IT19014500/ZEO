<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<?php
  $id=$_GET['id'];
  if($_SESSION['ref']==5){
  $sqltq="SELECT * FROM exmduty where id = $id ";
  $resulttq=$conn->query($sqltq);
  while($recordtq = mysqli_fetch_array($resulttq)){

    $Tedyear=$recordtq['edyear'];
    $Texname=$recordtq['exname'];
    $Tprofession=$recordtq['profession'];
    $Texcenter=$recordtq['excenter'];
    $Ttid=$recordtq['tid'];
    

  }
  $delete="INSERT INTO exmdutytmdel(id,edyear,exname,profession,excenter,tid)VALUES('$id','$Tedyear','$Texname','$Tprofession','$Texcenter','$Ttid')";
  $result=$conn-> query($delete);


}
?> 


<?php

if($_SESSION['ref']==1){
     $delete="delete from exmduty where id= $id";
     $result=$conn->query($delete);
}

if($result == true){
    
?>

<script>
<?php if($_SESSION['ref']==1){ ?>
    alert("Exam Duty Removed!");
<?php }elseif($_SESSION['ref']==5){ ?>
    alert("Exam Duty will be Removed After Approval!");
<?php } ?>
    location= '../../htmlPages/clientSide/exDutyExplist.php';
</script>

<?php
    }
?>

<?php
    }else{
        echo "Please Login!";
    }
?>