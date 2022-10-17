<?php
include ('../../../connection.php');
include ('sendEmail.php');
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>ZEO | Contact</title>
<link rel="stylesheet" href="../../stylesheets/login.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../../css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../../../css/edua-icons.css">
<link rel="stylesheet" type="text/css" href="../../../css/animate.min.css">
<link rel="stylesheet" type="text/css" href="../../../css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../../../css/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="../../../css/cubeportfolio.min.css">
<link rel="stylesheet" type="text/css" href="../../../css/settings.css">
<link rel="stylesheet" type="text/css" href="../../../css/bootsnav.css">
<link rel="stylesheet" type="text/css" href="../../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../../css/loader.css">
<link rel="stylesheet" href="../../bootstrap/css/style.css">
<link rel="icon" href="../../../images/logoGvmnt.png">
<script type="text/javascript" src="../../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../../bootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>

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
  require_once('../../clientSide/loginform/topNavLogin/commHead.php');
?>

<!--Header-->
<header>
<?php
  require_once('../../clientSide/IndexMenu/contactMenu.php');
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
  require_once('../../clientSide/loginform/contactLogin.php');
?>

<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">    
        <h1>Contact Us</h1>
        <p>We offer best educational services in the country</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="../../../index.php">Home</a> <span><em class="fa fa-angle-double-right"></em>Contact Us</span>
      </div>
      </div>
    </div>
  </div>
</section>


<!--Contact Deatils -->
<section id="contact" class="padding">
  <div class="container">
    <div class="row padding-bottom">
      <div class="col-md-4 contact_address heading_space wow fadeInLeft" data-wow-delay="300ms">
      <h3><?php echo $alert; ?></h3>
        <h2 class="heading heading_space">Get in Touch <span class="divider-left"></span></h2>
        <p>You can also contact us by phone 066 2 289 303 or email web.zeogalewela@gmail.com, or you can send us a message here:</p>
        <div class="address">
          <em class="icon icon-map-pin border_radius"></em>
          <h4>Visit Us</h4>
          <p>Zonal Office, A11 Road, Galewela.</p>
        </div>
        <div class="address">
          <em class="icon icon-mail border_radius"></em>
          <h4>Email Us</h4>
          <p><a href="zeogalewela@gmail.com">web.zeogalewela@gmail.com</a></p>
        </div>
        <div class="address">
          <em class="icon icon-phone4 border_radius"></em>
          <h4>Call Us</h4>
          <p>(+066) 2 289 303</p>
        </div>
      </div>
      <div class="col-md-8 wow fadeInRight" data-wow-delay="300ms">
        <h2 class="heading heading_space">Fill the Contact Form<span class="divider-left"></span></h2>
        <form action="contactpg.php" method="post" class="form-inline findus" id="contact-form">
          <div class="row">
            <div class="col-md-12">
              <div id="result"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name" required name="Your Name">
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Your E-mail" required name="Your E-mail">
              </div>
            </div>
            <!-- <div class="col-md-4 col-sm-4">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Website" name="website" id="website" required>
              </div>
            </div> -->
            <div class="col-md-12">
              <textarea name="message" placeholder="Your Message" required name="Your Message"></textarea>
              <input type = "submit" name="submit" class ="sendbtn" value="Send">
            </div>
          </div>
        </form>
        <script type="text/javascript">
			if(window.history.replaceState){
				window.history.replaceState(null, null, window.location.href);
			}
		</script>
        <ul class="social_icon black top30">
          <li><a href="#." class="facebook"><em class="fa fa-facebook"></em></a></li>
          <li><a href="#." class="twitter"><em class="icon-twitter4"></em></a></li>
          <li><a href="#." class="dribble"><em class="icon-dribbble5"></em></a></li>
          <li><a href="#." class="instagram"><em class="icon-instagram"></em></a></li>
        </ul>
      </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3217.15017888672!2d80.56965351409868!3d7.7649765096414685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afcb3d8d24e14cd%3A0x9692f98cba1fbafb!2sZonal%20Education%20Office%2C%20Galewela!5e1!3m2!1sen!2slk!4v1640275706218!5m2!1sen!2slk" width="100%" height="550" style="border:0;" title="ZEO Location" allowfullscreen="" loading="lazy"></iframe>
    <!-- <div class="row wow bounceIn" data-wow-delay="300ms"> -->
      <!-- <div class="col-md-12"> -->
        <!-- <div id="map"></div>
      </div> -->
    <!-- </div> -->
  <!-- </div> -->
</section>
<!--Contact Deatils -->


<!--Footer-->
<?php
  require_once('../../clientSide/footer/contactFooter.php');
?>
<!--FOOTER ends-->

<script src="../../../js/jquery-2.2.3.js"></script>
<!-- <script type="text/javascript" src="embed?pb=!1m18!1m12!1m3!1d3217.15017888672!2d80.56965351409868!3d7.7649765096414685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afcb3d8d24e14cd%3A0x9692f98cba1fbafb!2sZonal%20Education%20Office%2C%20Galewela!5e1!3m2!1sen!2slk!4v1640275706218!5m2!1sen!2slk"></script> -->
<script src="../../../js/gmaps.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/bootsnav.js"></script>
<script src="../../../js/jquery.appear.js"></script>
<script src="../../../js/jquery-countTo.js"></script>
<script src="../../../js/jquery.parallax-1.1.3.js"></script>
<script src="../../../js/owl.carousel.min.js"></script>
<script src="../../../js/jquery.cubeportfolio.min.js"></script>
<script src="../../../js/jquery.themepunch.tools.min.js"></script>
<script src="../../../js/jquery.themepunch.revolution.min.js"></script>
<script src="../../../js/revolution.extension.layeranimation.min.js"></script>
<script src="../../../js/revolution.extension.navigation.min.js"></script>
<script src="../../../js/revolution.extension.parallax.min.js"></script>
<script src="../../../js/revolution.extension.slideanims.min.js"></script>
<script src="../../../js/revolution.extension.video.min.js"></script>
<script src="../../../js/wow.min.js"></script>
<script src="../../../js/functions.js"></script>

</body>
</html>
