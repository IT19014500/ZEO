<?php
  include('../../connection.php');
  session_start();
?>

<?php

  $bbmid = $_GET['id'];
  
	$sqlk="SELECT * FROM hobtbl where bid= $bbmid";
	$resultk=$conn->query($sqlk);
?>

<?php
  $col=0;
	$sqlmm="SELECT * FROM bmemtbl where bid= $bbmid";
	$resultmm=$conn->query($sqlmm);
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
        <h1>Branch Details</h1>
        <p>Details of officers</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="../../index.php">Home</a> <span><em class="fa fa-angle-double-right"></em>Branch Details</span>
      </div>
      </div>
    </div>
  </div>
</section>
<!--Page Header-->


<!--Shopping-->
<section id="shop" class="padding">
  <div class="container">
  <h2 style="color:#000000;text-align:center;">Head of the Branch</h2>
  <br>
 
  <?php
					while($recordk=mysqli_fetch_assoc($resultk))
					{
						$id = $recordk['hoid'];
						$name =$recordk['hname'];
						$subt =$recordk['hprof'];
                        $fbt =$recordk['fb'];
                        $twittert =$recordk['twitter'];
                        $instat =$recordk['insta'];
                        $linkdint =$recordk['linkdin'];
                        $nicn =$recordk['iden'];
						$image_name = $recordk['hphoto'];

						$dename = base64_decode($name);
                        $desubt = base64_decode($subt);
                        $defbt = base64_decode($fbt);
                        $detwittert = base64_decode($twittert);
                        $deinstat = base64_decode($instat);
                        $delinkdint = base64_decode($linkdint);
                        
        ?>
        
        <div class="row">
        <div class="col-md-3 col-sm-6 margin10 bottom15 wow fadeIn" data-wow-delay="300ms">
        <div class="shopping_box">
          <div class="image">
          <?php
        //Check whether image name is available or not
        if($image_name!="")
        {
        //Dislpay the image
        ?>

        <img src="<?php echo "../../images/hobProfile/$image_name"; ?>" alt="Avatar" class="img-responsive border-radius" style="border-radius:16px;" >
        <?php 
        }
        else
        {
            //Display the Message
            echo "<div class='error'>Image not Added.</div>"; 
        }
    ?>

            <!-- <img src="images/shop1.jpg" alt="Edua" class="img-responsive border-radius"> -->
            <div class="overlay border_radius">
              <a class="btn_common yellow border_radius btn-cart" href="<?php echo "dutyPage.php?nic="?><?php echo $nicn; ?>">View Duties</a>
            </div>
          </div>
          <div class="shop_content text-center">
            <h4><?php echo $dename; ?></h4>
            <p><?php echo $desubt; ?></p>
            <a href="<?php echo $defbt; ?>" class="text-white"><em class="fab fa-facebook p-2"></em>
                        </a>
            <a href="<?php echo $detwittert; ?>" class="text-white"><em class="fab fa-twitter p-2"></em>
                        </a>
            <a href="<?php echo $deinstat; ?>" class="text-white"><em class="fab fa-instagram p-2"></em>
                        </a>
            <a href="<?php echo $delinkdint; ?>" class="text-white"><em class="fab fa-linkedin-in p-2"></em>
                        </a>
          </div>
        </div>
    </div>
</div>

<?php
}
?>

</div>
</section>
<!--Shoping-->


<!--Shopping-->
<section id="shop" class="padding">
  <div class="container">
  <h2 style="color:#000000;text-align:center;">Team Members</h2>
    <div class="row">

      
    <?php
			while($recordmm=mysqli_fetch_assoc($resultmm))
			{
			$id1 = $recordmm['bmemid'];
			$name1 =$recordmm['hname'];
			$subt1 =$recordmm['hprof'];
      $fbt1 =$recordmm['fb'];
      $twittert1 =$recordmm['twitter'];
      $instat1 =$recordmm['insta'];
      $linkdint1 =$recordmm['linkdin'];
      $iden1 =$recordmm['iden'];
			$image_name1 = $recordmm['hphoto'];

      $dename1 = base64_decode($name1);
      $desubt1 = base64_decode($subt1);
      $defbt1 = base64_decode($fbt1);
      $detwittert1 = base64_decode($twittert1);
      $deinstat1 = base64_decode($instat1);
      $delinkdint1 = base64_decode($linkdint1);


			$col++;
                        
        ?>
        <div class="col-md-3 col-sm-6 margin10 bottom15 wow fadeIn" data-wow-delay="300ms">
        <div class="shopping_box">
          <div class="image">
          <?php
        //Check whether image name is available or not
        if($image_name1!="")
        {
        //Dislpay the image
        ?>
        <img src="<?php echo "../../images/bmemProfile/$image_name1"; ?>" alt="img 1" class="img-responsive border-radius">
        <?php 
        }
        else
        {
            //Display the Message
            echo "<div class='error'>Image not Added.</div>"; 
        }
    ?>

            <!-- <img src="images/shop1.jpg" alt="Edua" class="img-responsive border-radius"> -->
            <div class="overlay border_radius">
              <a class="btn_common yellow border_radius btn-cart" href="<?php echo "dutyPage.php?nic="?><?php echo $iden1; ?>">View Duties</a>
            </div>
          </div>
          <div class="shop_content text-center">
            <h4><?php echo $dename1; ?></h4>
            <p><?php echo $desubt1; ?></p>
            <a href="<?php echo $defbt1; ?>" class="text-white"><em class="fab fa-facebook p-2"></em>
                        </a>
            <a href="<?php echo $detwittert1; ?>" class="text-white"><em class="fab fa-twitter p-2"></em>
                        </a>
            <a href="<?php echo $deinstat1; ?>" class="text-white"><em class="fab fa-instagram p-2"></em>
                        </a>
            <a href="<?php echo $delinkdint1; ?>" class="text-white"><em class="fab fa-linkedin-in p-2"></em>
                        </a>
          </div>
        </div>
</div>
      <?php
if($col==4){
	echo "</div><div class='row'>";
	}
}
?>      
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
