<?php
  try{
    include('connection.php');
    session_start();
  }catch(Exception $e) {
    echo "Connection Fail!";
  }
?>

<?php
  try{
    $i = 0;
    $sqlmsl="SELECT * FROM msltbl ";
    $resultmsl=$conn->query($sqlmsl);

    $countmsl = mysqli_num_rows($resultmsl);
  }catch(Exception $e) {
        echo "Main Slider Reading Fail!";
  }
?>


<?php
  try{
    $sqlk="SELECT * FROM frnttbl ";
    $resultk=$conn->query($sqlk);
  }catch(Exception $e) {
    echo "Down Slider Reading Fail!";
  }
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>ZEO Galewela</title>
<link rel="stylesheet" href="htmlPages/stylesheets/login.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/edua-icons.css">
<link rel="stylesheet" type="text/css" href="css/animate.min.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">
<link rel="stylesheet" type="text/css" href="css/settings.css">
<link rel="stylesheet" type="text/css" href="css/bootsnav.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/loader.css">
<link rel="stylesheet" href="htmlPages/bootstrap/css/slickCard.css">
<link rel="stylesheet" href="htmlPages/bootstrap/css/slick.css">
<link rel="stylesheet" href="htmlPages/bootstrap/css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- new2 -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


<link rel="icon" href="images/logoGvmnt.png">

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style = "background-color:#ced7e0;">
<!-- <a href="#" class="scrollToTop"><em class="fa fa-angle-up"></em></a> -->
<a style="margin-left:70px;" onclick="document.getElementById('id01').style.display='block'" class="scrollToTop"><em class="fa fa-power-off"></em></a>
<!-- <li><span style="margin-left:70px;" onclick="document.getElementById('id01').style.display='block'"><em class="fa fa-power-off"></em> Login</span></li> -->
<!--Loader-->
<div class="loader">
  <div class="bouncybox">
      <div class="bouncy"></div>
    </div>
</div>


<?php
  try{
    require_once('htmlPages/clientSide/loginform/topNavLogin/commHead.php');
  }
  catch(Exception $e) {
      echo "Top navingation Loading Fail!";
  }
?>
<!--Header-->
<header>
<?php
try{
  require_once('htmlPages/clientSide/IndexMenu/firstMenu.php');
}catch(Exception $e) {
  echo "Navigation Bar Loading Fail!";
}
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
try{
  require_once('htmlPages/AdminPannel/loginForm.php');
}catch(Exception $e) {
  echo "Login page Reading Fail!";
}
?>

<!--Slider-->
<section class="rev_slider_wrapper text-center">			
<!-- START REVOLUTION SLIDER 5.0 auto mode -->
  <div id="rev_slider" class="rev_slider"  data-version="5.0">
    <ul>
      <?php
      try{
        while($recordmsl=mysqli_fetch_assoc($resultmsl))
        {
          $Mainimg_name = $recordmsl['photo'];
          $phid = $recordmsl['mslid'];

          
          if($i==$countmsl){
            $i = 0;
          }
      ?>
    <!-- SLIDE  -->
      <li data-transition="fade">
        <!-- MAIN IMAGE -->
        <img src="<?php echo "images/index/Main/$Mainimg_name"; ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg">							
        <!-- LAYER NR. 1 -->
        <div class="tp-caption tp-resizeme" 							
        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
        data-y="['326','270','270','150']" data-voffset="['0','0','0','0']"						
        data-responsive_offset="on"
        data-visibility="['on','on','on','on']"
        data-transform_idle="o:1;"
        data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" 
        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
        data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"							 
        data-start="800"><h1>Best Mutual Transfer Service</h1>
        </div>
        <div class="tp-caption tp-resizeme" 							
        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
        data-y="['380','340','300','350']" data-voffset="['0','0','0','0']"
        data-responsive_offset="on"
        data-visibility="['on','on','off','off']"
        data-transform_idle="o:1;"
        data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;" 
        data-transform_out="opacity:0;s:1000;s:1000;"
        data-start="1500"><p> Are you seeking a mutual transfer?<br/> This is the best solution for you</p>
        <!-- Your chance to Transfer. -->
        </div>
        <div class="tp-caption  tp-resizeme" 							
        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
        data-y="['450','390','350','250']" data-voffset="['0','0','0','0']"							
        data-responsive_offset="on"
        data-visibility="['on','on','on','on']"
        data-transform_idle="o:1;"
        data-transform_in="y:[-200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
        data-mask_out="x:0;y:0;s:inherit;e:inherit;" 							 
        data-start="2000">
        <?php
        if($i==0){
        ?>
        <a href="htmlPages/clientSide/branches.php" class="border_radius btn_common white_border">our services</a>
        <?php
        }
        ?>
        <a href="htmlPages/clientSide/mutualAdd.php" class="border_radius btn_common blue">Get a quote</a>
        </div>
      </li>
    <?php
      $i += 1;
        }
      }catch(Exception $e) {
        // echo 'Message: ' .$e->getMessage();
        echo "Main Slider Content Loading Fail!";
      }
    ?>

    </ul>				
  </div><!-- END REVOLUTION SLIDER -->
</section>	
<br><br>
<!-- Sec coursel Start -->
<div class = "container">
  <ul class="slidingg">

    <?php
      try{
					while($recordk=mysqli_fetch_assoc($resultk))
					{
						$id = $recordk['frid'];
						$name =$recordk['frName'];
						$subt =$recordk['frdes'];
						$image_name = $recordk['photo'];

            $deenname = base64_decode($name);
            $deensubt = base64_decode($subt);                 
    ?>
  
        <li class="slider_items">

          <div class="card">
          <img src="<?php echo "images/index/$image_name"; ?>" alt="Avatar" style="width:100%">
          <div class="containerca">
            <br>
            <h4><?php echo $deenname; ?></h4>
            <p><?php echo $deensubt; ?></p> 
          </div>

        </li>

    <?php
        }
      }catch(Exception $e) {
        // echo 'Message: ' .$e->getMessage();
        echo "Down Slider Content Loading Fail";
      }
    ?>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript" src="htmlPages/bootstrap/js/custom.js"></script>
        

  </ul>
</div>
<!-- Sec coursel End -->

<!--ABout US-->
<section id="about" class="padding">
  <!-- <div class="container">
    <div class="row">
    <div class="icon_wrap padding-bottom-half clearfix">
      <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="300ms">
         <i class="icon-icons9"></i>
         <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
         <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
      </div>
      <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="400ms">
         <i class="icon-icons9"></i>
         <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
         <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
      </div>
      <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="500ms">
         <i class="icon-icons20"></i>
         <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
         <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
      </div>
      <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="600ms">
         <i class="icon-globe"></i>
         <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
         <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
      </div>
      <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="400ms">
         <i class="icon-layers"></i>
         <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
         <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
      </div>
      <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="500ms">
         <i class="icon-laptop"></i>
         <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
         <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
      </div>
      </div>
    </div>
  </div>  -->
  <div class="container margin_top">
    <div class="row">
      <div class="col-md-7 col-sm-6 priorty wow fadeInLeft" data-wow-delay="300ms">
        <h2 class="heading bottom25">Welcome to ZEO Galewela <span class="divider-left"></span></h2>
        <p class="half_space">As a Director, I am happy to tell you about our Educational Support Officers. We would like to extend our fullest support to all our service seekers.</p>
        <div class="row">
          <div class="col-md-6">
            <div class="about-post">
            <a href="#." class="border_radius"><img src="images/hands.png" alt="hands"></a>
            <h4>Good Planning</h4>
            <p>Plan better</p>
            </div>
            <div class="about-post">
            <a href="#." class="border_radius"><img src="images/awesome.png" alt="hands"></a>
            <h4>Happy Students</h4>
            <p>Keep students happy</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="about-post">
            <a href="#." class="border_radius"><img src="images/maintenance.png" alt="hands"></a>
            <h4>Our Courses</h4>
            <p>Keep employees up to date</p>
            </div>
            <div class="about-post">
            <a href="#." class="border_radius"><img src="images/home.png" alt="hands"></a>
            <h4>Our Teachers</h4>
            <p>Miracle of the education</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 col-sm-6 wow fadeInRight" data-wow-delay="300ms">
         <img src="images/hobProfile/DirectorSec.jpeg" alt="our priorties" class="img-responsive" style="width:300px;height:300px;">
      </div>
    </div>
  </div>
</section>
<!--ABout US-->


<!-- Courses -->
<!-- <section id="courses" class="padding parallax">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="heading heading_space wow fadeInDown">Popular Courses<span class="divider-left"></span></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="slider_wrapper">
          <div id="course_slider" class="owl-carousel">
            <div class="item">
              <div class="image bottom20">
                <img src="images/course1.jpg" alt="Courses" class="img-responsive border_radius">
              </div>
              <h3 class="bottom15"><a href="course_detail.html">Introduction LearnPress</a></h3>
              <p class="bottom15">We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>
              <a href="course_detail.html" class="btn_common blue border_radius">Read More</a>
            </div>
            <div class="item">
              <div class="image bottom20">
                <img src="images/course2.jpg" alt="Courses" class="img-responsive border_radius">
              </div>
              <h3 class="bottom15"><a href="course_detail.html">Introduction LearnPress</a></h3>
              <p class="bottom15">We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>
              <a href="course_detail.html" class="btn_common blue border_radius">Read More</a>
            </div>
            <div class="item">
              <div class="image bottom20">
                <img src="images/course3.jpg" alt="Courses" class="img-responsive border_radius">
              </div>
              <h3 class="bottom15"><a href="course_detail.html">Introduction LearnPress</a></h3>
              <p class="bottom15">We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>
              <a href="course_detail.html" class="btn_common blue border_radius">Read More</a>
            </div>
            <div class="item">
              <div class="image bottom20">
                <img src="images/course1.jpg" alt="Courses" class="img-responsive border_radius">
              </div>
              <h3 class="bottom15"><a href="course_detail.html">Introduction LearnPress</a></h3>
              <p class="bottom15">We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>
              <a href="course_detail.html" class="btn_common blue border_radius">Read More</a>
            </div>
            <div class="item">
              <div class="image bottom20">
                <img src="images/course2.jpg" alt="Courses" class="img-responsive border_radius">
              </div>
              <h3 class="bottom15"><a href="course_detail.html">Introduction LearnPress</a></h3>
              <p class="bottom15">We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>
              <a href="course_detail.html" class="btn_common blue border_radius">Read More</a>
            </div>
            <div class="item">
              <div class="image bottom20">
                <img src="images/course3.jpg" alt="Courses" class="img-responsive border_radius">
              </div>
              <h3 class="bottom15"><a href="course_detail.html">Introduction LearnPress</a></h3>
              <p class="bottom15">We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>
              <a href="course_detail.html" class="btn_common blue border_radius">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- Courses -->




<!--Fun Facts-->
<!-- <section id="facts" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center wow fadeInDown">
       <h2 class="heading">Career<span class="divider-center"></span></h2>
       <p class="heading_space margin10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      </div>
    </div>
    <div class="row number-counters">
      <div class="col-md-2 col-sm-4">
        <div class="counters-item">
        <i class="icon-checkmark3"></i>
        <strong data-to="1235">0</strong> -->
        <!-- Set Your Number here. i,e. data-to="56" -->
        <!-- <p>Project Completed</p>
        </div>
        <div class="counters-item last">
        <i class="icon-trophy"></i>
        <strong data-to="78">0</strong>
        <p>Awards Won</p>
        </div>
      </div>
      <div class="col-md-7 col-sm-4">
        <div class="fact-image">
        <img src="images/fun-facts.png" alt=" some facts" class="img-responsive">
        </div>
      </div>
      <div class="col-md-3 col-sm-4">
       <div class="counters-item">
        <i class=" icon-icons20"></i>
        <strong data-to="186">0</strong>
        <p>Hours of Work / Month</p>
        </div>
        <div class="counters-item last">
        <i class="icon-happy"></i>
        <strong data-to="89">0</strong>
        <p>Satisfied Clients</p>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!--Customers Review-->
<!-- <section id="reviews" class="padding bg_light">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center wow fadeInDown">
      <h2 class="heading heading_space">What People say <span class="divider-center"></span></h2>
      <div id="review_slider" class="owl-carousel text-center">
        <div class="item">
          <h4>John Smith</h4>
          <p>Ditector Shangha</p>
          <img src="images/customer1.png" class="client_pic border_radius" alt="costomer">
          <p>Good Service</p>
        </div>
        <div class="item">
           <h4>John Smith</h4>
          <p>Ditector Shangha</p>
          <img src="images/customer1.png" class="client_pic border_radius" alt="costomer">
          <p>I've been happy with the services provided by ZEO Galewela.</p>
        </div>
        <div class="item">
           <h4>John Smith</h4>
          <p>Ditector Shangha</p>
          <img src="images/customer1.png" class="client_pic border_radius" alt="costomer">
          <p>I've been happy with the services provided by ZEO Galewela.</p>
        </div>
       </div>
      </div>
    </div>
  </div>
</section> -->




<!--Pricings-->
<!-- <section class="padding" id="pricing">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center wow fadeInDown">
        <h2 class="heading">Pricing Tables <span class="divider-center"></span></h2>
        <p class="heading_space margin10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      </div>
      <div class="col-md-12">
        <div class="pricing">
          <div class="pricing_item wow fadeInUp" data-wow-delay="300ms">
            <h3>Basic</h3>
            <div class="pricing_price"><span class="pricing_currency">$</span>9.90</div>
            <p class="pricing_sentence">Perfect for single freelancers who work by themselves</p>
            <ul class="pricing_list">
              <li class="pricing_feature">Support forum</li>
              <li class="pricing_feature">Free hosting</li>
              <li class="pricing_feature">40MB of storage space</li>
              <li>Social media integration</li>
              <li>1GB of storage space</li>
            </ul>
            <a class="btn_common text-center" href="#.">Choose plan</a>
          </div>
          <div class="pricing_item active wow fadeInUp" data-wow-delay="400ms">
            <h3>Popular</h3>
            <div class="pricing_price"><span class="pricing_currency">$</span>29,90</div>
            <p class="pricing_sentence">Suitable for small businesses with up to 5 employees</p>
            <ul class="pricing_list">
              <li class="pricing_feature">Unlimited calls</li>
              <li class="pricing_feature">Free hosting</li>
              <li class="pricing_feature">10 hours of support</li>
              <li class="pricing_feature">Social media integration</li>
              <li class="pricing_feature">1GB of storage space</li>
            </ul>
            <a class="btn_common text-center" href="#.">Choose plan</a>
          </div>
          <div class="pricing_item dark_gray wow fadeInUp" data-wow-delay="500ms">
            <h3>Premier</h3>
            <div class="pricing_price"><span class="pricing_currency">$</span>59,90</div>
            <p class="pricing_sentence">Great for large businesses with more than 5 employees</p>
            <ul class="pricing_list">
              <li class="pricing_feature">Unlimited calls</li>
              <li class="pricing_feature">Free hosting</li>
              <li class="pricing_feature">Unlimited hours of support</li>
              <li class="pricing_feature">Social media integration</li>
              <li class="pricing_feature">Unlimited storage space</li>
            </ul>
            <a class="btn_common text-center" href="#.">Choose plan</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!--Pricings-->


<!--Paralax -->
<!-- <section id="parallax" class="parallax">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center wow bounceIn">
       <h2>We Believe that Education for Everyone Since</h2>
       <h1 class="margin10">1942</h1>
       <a href="#." class="border_radius btn_common white_border margin10">Gaet a Quote</a>
      </div>
    </div>
  </div>
</section> -->
<!--Paralax -->


<!-- News-->
<!-- <section id="news" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 wow fadeInDown">
       <h2 class="heading heading_space">Latest News <span class="divider-left"></span></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="slider_wrapper">
          <div id="news_slider" class="owl-carousel">
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="images/news1.jpg" alt="Zeo" class="img-responsive border_radius">
                </div>
                <div class="news_box border_radius">
                  <h4><a href="blog_detail.html">4 Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="images/news2.jpg" alt="Zeo" class="img-responsive border_radius">
                </div>
                <div class="news_box border_radius">
                  <h4><a href="blog_detail.html"> Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="images/news3.jpg" alt="Zeo" class="img-responsive border_radius">
                </div>
                <div class="news_box border_radius">
                  <h4><a href="blog_detail.html">4 Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="images/news1.jpg" alt="Zeo" class="img-responsive border_radius">
                </div>
                <div class="news_box border_radius">
                  <h4><a href="blog_detail.html">4 Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="images/news2.jpg" alt="Zeo" class="img-responsive border_radius">
                </div>
                <div class="news_box border_radius">
                  <h4><a href="blog_detail.html">4 Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="images/news3.jpg" alt="Zeo" class="img-responsive border_radius">
                </div>
                <div class="news_box border_radius">
                  <h4><a href="blog_detail.html">4 Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->



<!--FOOTER-->
<?php
try{
  require_once('htmlPages/clientSide/footer/indexFooter.php');
}catch(Exception $e) {
  echo "Footer Loading Fail!";
}
?>
<!--FOOTER ends-->
    <script src="js/jquery-2.2.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootsnav.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/jquery-countTo.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.cubeportfolio.min.js"></script>
    <script src="js/jquery.themepunch.tools.min.js"></script>
    <script src="js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/revolution.extension.layeranimation.min.js"></script>
    <script src="js/revolution.extension.navigation.min.js"></script>
    <script src="js/revolution.extension.parallax.min.js"></script>
    <script src="js/revolution.extension.slideanims.min.js"></script>
    <script src="js/revolution.extension.video.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/functions.js"></script>
  </body>
</html>
