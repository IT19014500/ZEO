<?php
    include('../../connection.php');
?>

<?php

     $id=$_GET['id'];
     $delete="delete from school where scid= $id";
     $result=$conn->query($delete);

    // $sqlbn="SELECT * FROM school";
    // $resultbn=$conn->query($sqlbn);
    // while($recordbn = mysqli_fetch_array($resultbn)){
    //     $scc=$recordbn['scid'];
    //     if($scc>513)
    //     {
    //         continue;
    //     }
    //     if($scc>=202 && $scc<=513){
    //         $delete="delete from school where scid= $scc";
    //         $result=$conn->query($delete);
    //     }
    // }

if($result == true){
    
?>

<script>
alert("School Removed!");
location= '../../htmlPages/AdminPannel/school.php';
</script>

<?php
    }
?>