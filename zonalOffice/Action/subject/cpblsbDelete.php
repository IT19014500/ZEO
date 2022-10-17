<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>
<?php
$id=$_GET['id'];
if($_SESSION['ref']==5){
  $sqltq="SELECT * FROM cpblesub where cbid = $id ";
  $resulttq=$conn->query($sqltq);
  while($recordtq = mysqli_fetch_array($resulttq)){
    $encbid = $recordtq['cbid'];
    $ensuID = $recordtq['suID'];
    $entid = $recordtq['tid'];

  }
  $delete="INSERT INTO cpblesubtmdel(cbid,suID,tid)VALUES('$encbid','$ensuID','$entid') ";
  $result=$conn-> query($delete);


}




    if($_SESSION['ref']==1){

     $delete="delete from cpblesub where cbid= $id";
     $result=$conn->query($delete);
    }

if($result == true){
    
?>

<script>
  <?php if($_SESSION['ref']==1){ ?>
  alert("Capable Subject Removed!");
  <?php }elseif($_SESSION['ref']==5){ ?>
  alert("Details will be Removed after Approval!");
  <?php } ?>
location= '../../htmlPages/clientSide/capableView.php';
</script>

<?php
    }
?>

<?php
    }else{
        echo "Please Login!";
    }
?>