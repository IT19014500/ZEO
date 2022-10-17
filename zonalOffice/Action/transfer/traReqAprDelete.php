<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<?php
     $pgid=$_GET['intridb'];
     $idtbl=$_GET['tclup3'];
     $id=$_GET['aprintz'];
    if($idtbl==1){
        $delete="delete from interzoneapr where tid= $id";
        $result=$conn->query($delete);
    }elseif($idtbl==2){
        $delete="delete from interzoneproviapr where tid= $id";
        $result=$conn->query($delete);
    }elseif($idtbl==3){
        $delete="delete from inregionapr where tid= $id";
        $result=$conn->query($delete);
    }elseif($idtbl==4){
        $delete="delete from inregionproviapr where tid= $id";
        $result=$conn->query($delete);
    }elseif($idtbl==5){
        $delete="delete from ipronationapr where tid= $id";
        $result=$conn->query($delete);
    }elseif($idtbl==6){
        $delete="delete from ipoprsclapr where tid= $id";
        $result=$conn->query($delete);
    }
if($result == true){
    
?>

<script>
alert("Transfer Approval Removed!");
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