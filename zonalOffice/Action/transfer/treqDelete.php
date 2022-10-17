<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<?php
     $pgid=$_GET['intridb'];
     $idtbl=$_GET['tclct3'];
     $id=$_GET['bnid'];
    if($idtbl==1){
        $delete="delete from interzone where tid= $id";
        $result=$conn->query($delete);
    }elseif($idtbl==2){
        $delete="delete from interzoneprovi where tid= $id";
        $result=$conn->query($delete);
    }elseif($idtbl==3){
        $delete="delete from inregion where tid= $id";
        $result=$conn->query($delete);
    }elseif($idtbl==4){
        $delete="delete from inregionprovi where tid= $id";
        $result=$conn->query($delete);
    }elseif($idtbl==5){
        $delete="delete from ipronation where tid= $id";
        $result=$conn->query($delete);
    }elseif($idtbl==6){
        $delete="delete from ipoprscl where tid= $id";
        $result=$conn->query($delete);
    }
if($result == true){
    
?>

<script>
alert("Transfer Request Removed!");
location= '../../htmlPages/AdminPannel/requests/traReqInterDetail.php?intrid=<?php echo $pgid; ?>';
</script>

<?php
    }else{
        alert("Something went wrong!");
    }
}else{
    echo "Please Login!";
}
?>