<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<?php
  $id=$_GET['id'];
  if($_SESSION['ref']==5){
  $sqltq="SELECT * FROM tspouce where tid = $id";
  $resulttq=$conn->query($sqltq);
  while($recordtq = mysqli_fetch_array($resulttq)){

    $Tspname=$recordtq['spname'];
    $Tspscl=$recordtq['spscl'];
    $Ttid=$recordtq['tid'];
    

  }
  $delete="INSERT INTO tspoucetmdel(tid,spname,spscl)VALUES('$Ttid','$Tspname','$Tspscl')";
  $result=$conn-> query($delete);


}
?> 


<?php

if($_SESSION['ref']==1){
     $delete="delete from tspouce where tid= $id";
     $result=$conn->query($delete);
}

if($result == true){
    
?>

<script>
<?php if($_SESSION['ref']==1){ ?>
    alert("Spouce Removed!");
<?php }elseif($_SESSION['ref']==5){ ?>
    alert("Spouce will be Removed After Approval!");
<?php } ?>
    location= '../../htmlPages/clientSide/spouceList.php';
</script>

<?php
    }
?>

<?php
    }else{
        echo "Please Login!";
    }
?>