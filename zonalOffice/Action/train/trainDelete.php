<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<?php

     $id=$_GET['id'];

     if($_SESSION['ref']==5){
        $sqltq="SELECT * FROM tstbl where tid = $id ";
        $resulttq=$conn->query($sqltq);
        while($recordtq = mysqli_fetch_array($resulttq)){
          $entid = $recordtq['tid'];
          $entsts = $recordtq['tsts'];
      
        }
        $delete="INSERT INTO tstbltmdel(tid,tsts)VALUES('$entid','$entsts') ";
        $result=$conn-> query($delete);
      
      
      }
      
    if($_SESSION['ref']==1){
        $delete="delete from tstbl where tid= $id";
        $result=$conn->query($delete);
    }

if($result == true){
    
?>

<script>
    <?php if($_SESSION['ref']==1){ ?>
        alert("Training Status Removed!");
    <?php }elseif($_SESSION['ref']==5){ ?>
        alert("Details will be Removed after Approval!");
    <?php } ?>
    location= '../../htmlPages/clientSide/trastsView.php';
</script>

<?php
    }
?>

<?php
    }else{
        echo "Please Login!";
    }
?>