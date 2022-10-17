<?php
  include('../../connection.php');
  session_start();
?>

<?php
  $sql3="SELECT * FROM msucesslist";
  $result3=$conn->query($sql3);
?>


<?php
if(isset($_POST['submit'])){
    $Tname=mysqli_real_escape_string($conn,$_POST['Oname']);
    $Ttpn=mysqli_real_escape_string($conn,$_POST['Otpn']);
    $Tnic=mysqli_real_escape_string($conn,$_POST['Onic']);


    $Tnamevar = base64_encode($Tname);
    $Ttpnvar = base64_encode($Ttpn);
    $Tnicvar = base64_encode($Tnic);

    $add="INSERT INTO msucesslist(name,tpn,nic)VALUES('$Tnamevar','$Ttpnvar','$Tnicvar')";

    if($conn-> query($add)==TRUE){

?>

<Script>
    alert("You are Added to the list!");
    location='generalMutual.php';

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
    margin-right:15px;
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
        <h1>Successfull Mutual Transfers</h1>
        <p>Add your Details</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="index.html">Home</a> <span><em class="fa fa-angle-double-right"></em>Mutual Transfer Sucess Data center</span>
      </div>
      </div>
    </div>
  </div>
</section>
<!--Page Header-->
<br><br>

<?php
  $mutrat = $_GET['mutratl'];
?>
<?php
if($mutrat==1){
    echo "<a href='mutual.php'><button class='tlistbtn'>Back to Request List</button></a>";
}elseif($mutrat==2){
    echo "<a href='mutualReportDetail.php'><button class='tlistbtn'>Back to Request List</button></a>";
}elseif($mutrat==3){
    echo "<a href='perfectMatch.php'><button class='tlistbtn'>Back to Request List</button></a>";
}
?>

<!--Shopping-->
<section id="shop" class="padding">
  <div class="container">
    <div class="row">
      <h2 style="color:#000000;text-align:center;"><strong>Mutual Transfer Sucess List</strong></h2><br>
      <div class="row" style="margin-left:5px;" >
        <div class="col-sm-4">
          <form action="#" method="post">
            <div align="left">
                <input type="text" class="form-control" id = "Oname1" name="Oname" placeholder="ENTER NAME" required>
            </div><br>
            <div align="left">
                <input type="text" class="form-control" id = "Otpn1" name="Otpn" placeholder="ENTER TP NUMBER" required>
            </div><br>
            <div align="left">
                <input type="text" class="form-control" id = "Onic1" name="Onic" placeholder="ENTER NIC NUMBER" required>
            </div><br>
            <div align="right">
                <input type="submit" id = "submit" name = "submit" class="btn btn-info" style="background-color:dodgerblue;" value="SUBMIT">
                <input type="reset" class="btn btn-warning" style="background-color:orange;" id = "reset" value="RESET">
            </div>
          </form>
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
