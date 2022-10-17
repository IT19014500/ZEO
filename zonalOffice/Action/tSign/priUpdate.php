<?php
$remove=0;
if($remove!=0){
    include('../../connection.php');
?>

<?php
    $id = $_GET['id'];
    $tea_ID =$_GET['tea_ID'];
?>

<?php
  $sqltq="SELECT * FROM prisign where prisid = $id AND tid = $tea_ID ";
  $resulttq=$conn->query($sqltq);
?> 

<?php
    if(isset($_POST['submit'])){

        $Tsidate=$_POST['Osidate'];

        $update="UPDATE prisign SET sidate='$Tsidate' where prisid = $id AND tid = $tea_ID ";


        if($conn-> query($update)==TRUE){
?>
<Script>
    alert("Principle Sign Details Updated!");
    location= '../../htmlPages/AdminPannel/signCollection/principlesign.php';
</Script>
<?php
        exit();
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../htmlPages/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../htmlPages/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title>Office Sign Update</title>
    </head>
    <body>
        <h1>Update Office Sign <?php echo "$id"; ?></h1>
        <div class="row">
                    
            <div class="col-sm-4">
                <form action="#" method="post">
                    <?php
                        while($recordtq = mysqli_fetch_array($resulttq)){            
                    ?>

                        <div align="left">
                            <input type="text" class="form-control" id = "Osidate1"  name="Osidate" value="<?php echo $recordtq['sidate']; ?>" placeholder="Enter Signed Date" required>
                        </div><br>
                    <?php
                        }
                    ?>
                        <br>
                        <div align="left">
                            <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="UPDATE">
                            <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
                        </div>
                        <div align="right">
                            <p><a href = "../../htmlPages/AdminPannel/signCollection/principlesign.php">Click to Back</a></p>
                        </div>
                </form>
            </div>         
        </div>
    </body>
</html>
<?php
}else{
    echo "Page Removed!";
}
?>