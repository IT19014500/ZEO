<?php
    include('../../connection.php');
?>

<?php
  $id=$_GET['id'];
  $sqltq="SELECT * FROM tremove where trdid = $id ";
  $resulttq=$conn->query($sqltq);
?> 

<?php
if(isset($_POST['submit'])){

    $Ttrdate=$_POST['Otrdate'];

    $update="UPDATE tremove SET trdate='$Ttrdate' where trdid=$id ";


    if($conn-> query($update)==TRUE){

?>

<Script>
    alert("Deadline Updated!");
    location= '../../htmlPages/AdminPannel/trmdfile.php';

</Script>

<?php
    exit();
    }
?>

<?php
    }
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../htmlPages/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../htmlPages/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title>Teacher Update</title>
    </head>
    <body>
        <h1>Update Deadline <?php echo "$id"; ?></h1>
        
        <div class="row">
                    
            <div class="col-sm-4">
                <form action="#" method="post">   
                    <?php
                        while($recordtq = mysqli_fetch_array($resulttq)){            
                    ?>
                            <div align="left">
                                <input type="text" class="form-control" id = "Otrdate1"  name="Otrdate" value="<?php echo $recordtq['trdate']; ?>" placeholder="ENTER DEADLINE(yyyy-mm-dd hh:mm:ss)" required>
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
                            <p><a href = "../../htmlPages/AdminPannel/trmdfile.php">Click to Back</a></p>
                        </div>
                </form>
            </div>         
        </div>
    </body>
</html>
