<?php
  include('../../connection.php');
  session_start();
?>

<?php
  $nicid = $_GET['nic'];
	$sqlk="SELECT * FROM duties WHERE iden = '$nicid' ";
	$resultk=$conn->query($sqlk);
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>ZEO | Branches</title>
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
        <h1>Officer Duties</h1>
        <p>See Duties</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="../../index.php">Home</a> <span><em class="fa fa-angle-double-right"></em>Duties</span>
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

      
    
    <h1 style="color:#343d85;text-align:center;">DUTIES</h1>
    <span style="text-align:center;">
<?php
while($recordk = mysqli_fetch_array($resultk)){  
    $dut=$recordk['duty'];
    $dedut = base64_decode($dut);
    ?>
    <div style="margin-left:50px;color:#000000;"><h3><?php echo "<br>".$dedut; ?></h3></div>
    
<?php
}
?>
</span>

      
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
