<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1 || $_SESSION['ref']==5){
?>

<?php
  $id=$_GET['id'];
  if($_SESSION['ref']==5){
  $sqltq="SELECT * FROM chldserv where cid = $id ";
  $resulttq=$conn->query($sqltq);
  while($recordtq = mysqli_fetch_array($resulttq)){

    $TcNam=$recordtq['chName'];
    $Tcpny=$recordtq['coname'];
    $Tprof=$recordtq['profession'];
    $Ttid=$recordtq['tid'];

    

    

  }
  $delete="INSERT INTO chldservtmdel(cid,chName,coname,profession,tid)VALUES('$id','$TcNam','$Tcpny','$Tprof','$Ttid')";
  $result=$conn-> query($delete);


}
?> 


<?php

if($_SESSION['ref']==1){
     $delete="delete from chldserv where cid= $id";
     $result=$conn->query($delete);
}

if($result == true){
    
?>

<script>
<?php if($_SESSION['ref']==1){ ?>
    alert("Child Removed!");
<?php }elseif($_SESSION['ref']==5){ ?>
    alert("Child will be Removed After Approval!");
<?php } ?>
    location= '../../htmlPages/clientSide/childList.php';
</script>

<?php
    }
?>

<?php
    }else{
        echo "Please Login!";
    }
?>