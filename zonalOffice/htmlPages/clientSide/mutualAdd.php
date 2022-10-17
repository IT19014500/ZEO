<?php
  include('../../connection.php');
  session_start();
?>

<?php
  
  $sql3="SELECT * FROM mutualtrans";
  $result3=$conn->query($sql3);

?>


<?php
if(isset($_POST['submit'])){
    $Tname=mysqli_real_escape_string($conn,$_POST['Oname']);
    $Ttpn=mysqli_real_escape_string($conn,$_POST['Otpn']);
    $Tonic=mysqli_real_escape_string($conn,$_POST['Onic']);
    $Tnic=strtoupper($Tonic);
    $TsuID=$_POST['OsuID'];
    $Tlid=$_POST['Olid'];
    $Tplid=$_POST['Oplid'];
    // $Tproid=$_POST['Oproid'];
    $Tsgid=$_POST['Osgid'];
    $Tzid=$_POST['Ozid'];
    $Tzidne=$_POST['Ozidne'];

    $Tnamevar = base64_encode($Tname);
    $Ttpnvar = base64_encode($Ttpn);
    $Tnicvar = base64_encode($Tnic);

    $alab = "No";
    $sqlaac="SELECT * FROM mutualtrans where nic='$Tnicvar'";
    $resultaac=$conn->query($sqlaac);
    while($recordaac = mysqli_fetch_array($resultaac)){
      $alab = "Yes";
    }
    if($alab == "No"){
      $add="INSERT INTO mutualtrans(name,tpn,nic,suID,lid,plid,sgid,zid,zidne)VALUES('$Tnamevar','$Ttpnvar','$Tnicvar','$TsuID','$Tlid','$Tplid','$Tsgid','$Tzid','$Tzidne')";
    }else{
    ?>
      <Script>
        alert("Your NIC already available!");
        location='mutualAdd.php';
      </Script>
    <?php
    }

    if($conn-> query($add)==TRUE){

?>

<Script>
    alert("Transfer Request Added!");
    location='mutualAdd.php';
</Script>

<?php
    exit();
    }
?>

<?php
    }
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>ZEO | Mutual Transfer</title>
<link rel="stylesheet" href="../stylesheets/login.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../../css/edua-icons.css">
<link rel="stylesheet" type="text/css" href="../../css/animate.min.css">
<link rel="stylesheet" type="text/css" href="../../css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../../css/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="../../css/settings.css">
<link rel="stylesheet" type="text/css" href="../../css/bootsnav.css">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/loader.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<link rel="icon" href="../../images/logoGvmnt.png">

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
.alkser{
    background-color: dodgerblue;
    color: white;
    border-radius: 16px;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
    border: none;
    width:150px;
    outline: 0;
    font-size:18px;
}

.tlistbtn{
    float:right;
    background-color:dodgerblue;
    border-radius:16px;
    width:200px;
    padding:5px;
    color:#ffffff;
    border:none;
}

.tlistbtn:hover{
    
    background-color:green;
}

.tlistnext{
    float:right;
    background-color:#8000ff;
    border-radius:16px;
    width:200px;
    padding:5px;
    color:#ffffff;
    border:none;
}

</style>
</head>

<body style = "background-color:#ced7e0;">
<a style="margin-left:70px;" onclick="document.getElementById('id01').style.display='block'" class="scrollToTop"><em class="fa fa-power-off"></em></a>
<!--Loader-->
<div class="loader">
  <div class="bouncybox">
      <div class="bouncy"></div>
    </div>
</div>

<?php
  require_once('loginform/topNavLogin/commHead.php');
?>

<!--Header-->
<header>
<?php
  require_once('IndexMenu/branchMenu.php');
?>
</header>


<!--Search-->
<div id="search">
  <button type="button" class="close">×</button>
  <form>
    <input type="search" value="" placeholder="Search here...."  required/>
    <button type="submit" class="btn btn_common blue">Search</button>
  </form>
</div>

<?php
require_once('loginform/branchLogin.php');
?>

<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <h1>Request for Mutual Transfer</h1>
        <p>Add your data</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="index.html">Home</a> <span><em class="fa fa-angle-double-right"></em>Mutual Transfer Data center</span>
      </div>
      </div>
    </div>
  </div>
</section>
<!--Page Header-->



<!--Shopping-->
<section id="shop" class="padding">
  <div class="container">
    <div class="row">

    <a href="mutual.php"><button class="tlistbtn">View Request List</button></a>
    <?php
      // if(!empty($_GET['msg'])){ 
        ?>
      <!-- <div class="alert alert-success md" role="alert"> -->
        <?php
            // $_GET['msg'];
        ?>
      <!-- </div> -->
    <?php
      // }
    ?>
<br><br>
<h2 style="color:#000000;text-align:center;"><strong>Mutual Transfer Request Form</strong></h2>

<br>

<div class="row" style="margin-left:5px;">
            <div class="col-sm-4">
                <form action="#" method="post">

            <div align="left">
                <input type="text" class="form-control" id = "Oname1" name="Oname" placeholder="ENTER NAME" required>
            </div><br>

            <div align="left">
                <input type="text" class="form-control" id = "Otpn1" name="Otpn" placeholder="ENTER TP NUMBER" required>
            </div><br>
            <div align="left">
                <input type="text" style="text-transform:uppercase;" class="form-control" id = "Onic1" name="Onic" placeholder="ENTER NIC NUMBER" required>
            </div><br>


<?php
  $sqlbn="SELECT * FROM subject ";
  $resultbn=$conn->query($sqlbn);
//   option name eka ok krnna
?> 
            <div align="left">
            <select class="form-control" id = "OsuID1" name="OsuID" required>
            <option value="0" selected>-Select Subject-</option>
            <?php
                while($recordbn = mysqli_fetch_array($resultbn)){  
                    $scc=$recordbn['suID'];
                    $sccnam=$recordbn['name'];
                    $desccnam = base64_decode($sccnam);

                    $fca = $recordbn['caid'];
                    $fssid = $recordbn['ssid'];

                    $sqlcx="SELECT * FROM subcategory WHERE caid = $fca";
                    $resultcx=$conn->query($sqlcx);
                    while($recordcx = mysqli_fetch_array($resultcx)){
                      $cxna = $recordcx['name'];
                      $decxna = base64_decode($cxna);
                    }
            
                    $sqlstq="SELECT * FROM substream WHERE ssid = $fssid";
                    $resultstq=$conn->query($sqlstq);
                    while($recordstq = mysqli_fetch_array($resultstq)){
                      $stqna = $recordstq['name'];
                      $destqna = base64_decode($stqna);
                    }
            ?>
                <option value="<?php echo $scc; ?>" ><?php echo $desccnam." ( ".$destqna." - ".$decxna." ) "; ?></option>
            <?php
                }
            ?>
            </select>
            </div><br>

<?php
  $sqllan="SELECT * FROM languages ";
  $resultlan=$conn->query($sqllan);
?> 
            <div align="left">
            <select class="form-control" id = "Olid1" name="Olid" required>
            <option value="0" selected>-Appointment Language-</option>
            <?php
                while($recordlan = mysqli_fetch_array($resultlan)){  
                    $lj=$recordlan['lid'];
                    $ljna=$recordlan['name'];
                    $deljna = base64_decode($ljna);
            ?>
                <option value="<?php echo $lj; ?>"><?php echo $deljna; ?></option>
            <?php
                }
            ?>
            </select>
            </div><br>
     
<!-- change -->
<?php
  $sqlbn="SELECT * FROM plcategory ";
  $resultbn=$conn->query($sqlbn);
?> 
            <div align="left">
            <select class="form-control" id = "Oplid1" name="Oplid" required>
                <option value="Placement" selected>-Appointment Category-</option>
                <?php
                while($recordbn = mysqli_fetch_array($resultbn)){  
                    $pcc=$recordbn['plid'];
                    $pccnam=$recordbn['name'];
                    $depccnam = base64_decode($pccnam);
                ?>
                <option value="<?php echo $pcc; ?>" ><?php echo $depccnam; ?></option>
            <?php
                }
            ?>

            </select>
            </div><br>

            <?php
  // $sqlpr="SELECT * FROM profession ";
  // $resultpr=$conn->query($sqlpr);
?> 
            <!-- <div align="left">
            <select class="form-control" id = "Oproid1" name="Oproid" placeholder="ENTER PROFESSION" required>
            <option value="0" selected>-Select Profession-</option> -->
            <?php
                // while($recordpr = mysqli_fetch_array($resultpr)){  
                //     $ss=$recordpr['proid'];
                //     $ssnam=$recordpr['name'];
                //     $dessnam = base64_decode($ssnam);
            ?>
                
                <!-- <option value=" -->
                <?php
                //  echo $ss; 
                 ?>
                 <!-- "> -->
                 <?php
                  // echo $dessnam;
                   ?>
                   <!-- </option> -->
            <?php
                // }
            ?>
            <!-- </select>
            </div><br> -->

<?php
  $sqlsip="SELECT * FROM serandgrade";
  $resultsip=$conn->query($sqlsip);
?> 
            <div align="left">
            <select class="form-control" id = "Osgid1" name="Osgid" placeholder="ENTER SERVICE AND GRADE ID" required>
            <option value="0" selected>-Service and Grade-</option>
            <?php
                while($recordsip = mysqli_fetch_array($resultsip)){  
                    $kj=$recordsip['sgid'];
                    $kjna=$recordsip['grade'];
                    $dekjna = base64_decode($kjna);
            ?>
                <option value="<?php echo $kj; ?>"><?php echo $dekjna; ?></option>
            <?php
                }
            ?>
            </select>
            </div><br>

<!-- new -->

<?php
  $sqlzid="SELECT * FROM zonet";
  $resultzid=$conn->query($sqlzid);
?> 
            <div align="left">
            <select class="form-control" id = "Ozid1" name="Ozid" placeholder="ENTER ZONE" required>
            <option value="0" selected>-Select Zone-</option>
            <?php
                while($recordzid = mysqli_fetch_array($resultzid)){  
                    $nkj=$recordzid['zid'];
                    $nkja=$recordzid['zone'];
                    $denkja = base64_decode($nkja);
            ?>
                <option value="<?php echo $nkj; ?>"><?php echo $denkja; ?></option>
            <?php
                }
            ?>
            </select>
            </div><br>

<!-- new end -->
<?php
  $sqlzid2="SELECT * FROM zonet";
  $resultzid2=$conn->query($sqlzid2);
?> 
            <div align="left">
            <select class="form-control" id = "Ozidne1" name="Ozidne" placeholder="ENTER REQUEST ZONE" required>
            <option value="0" selected>-Select Requset-</option>
            <?php
                while($recordzid2 = mysqli_fetch_array($resultzid2)){  
                    $nkjne=$recordzid2['zid'];
                    $nkjane=$recordzid2['zone'];
                    $denkjane = base64_decode($nkjane);
            ?>
                <option value="<?php echo $nkjne; ?>"><?php echo $denkjane; ?></option>
            <?php
                }
            ?>
            </select>
            </div><br>

            <div align="right">
                <input type="submit" id = "submit" name = "submit" class="btn btn-info" value="REQUEST">
                <input type="reset" class="btn btn-warning" id = "reset" value="RESET">
            </div>


</div>
</form><br><br>
</div>
</div>
      
    </div>
  </div>
</section>
<!--Shoping-->


<!--FOOTER-->
<?php
  require_once('footer/branchFooter.php');
?>
<!--FOOTER ends-->



<script src="../../js/jquery-2.2.3.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootsnav.js"></script>
<script src="../../js/jquery.appear.js"></script>
<script src="../../js/jquery-countTo.js"></script>
<script src="../../js/jquery.parallax-1.1.3.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/jquery.cubeportfolio.min.js"></script>
<script src="../../js/jquery.themepunch.tools.min.js"></script>
<script src="../../js/jquery.themepunch.revolution.min.js"></script>
<script src="../../js/revolution.extension.layeranimation.min.js"></script>
<script src="../../js/revolution.extension.navigation.min.js"></script>
<script src="../../js/revolution.extension.parallax.min.js"></script>
<script src="../../js/revolution.extension.slideanims.min.js"></script>
<script src="../../js/revolution.extension.video.min.js"></script>
<script src="../../js/wow.min.js"></script>
<script src="../../js/functions.js"></script>

</body>
</html>
