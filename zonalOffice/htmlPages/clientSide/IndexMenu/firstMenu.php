<nav class="navbar navbar-default navbar-fixed white no-background bootsnav">
    <div class="container"> 
       <div class="search_btn btn_common"><em class="icon-icons185"></em></div>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
          <em class="fa fa-bars"></em>
        </button>
        <a class="navbar-brand" href="index.html"><img style="height:70px;width:300px;" src="images/logo/ZEO logo.png" alt="logo" class="logo logo-display">
        <img style="height:70px;width:300px;" src="images/logo/ZEO logo.png" class="logo logo-scrolled" alt="">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOut">
          <li class="dropdown">
            <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" >Home</a>
            <ul class="dropdown-menu">
              <li><a href="index.php">Home</a></li>
              <li><a href="htmlPages/clientSide/branches.php">Branches</a></li>
              
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >courses</a>
            <ul class="dropdown-menu">
              <li><a href="#">Courses</a></li>
              <li><a href="course_detail.html">Courses Detail</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >events</a>
            <ul class="dropdown-menu">
              <li><a href="event.html">events</a></li>
              <li><a href="event_detail.html">Events Detail</a></li>
            </ul>
          </li>
          <li><a href="htmlPages/clientSide/generalMutual.php">Mutual Transfer</a></li>
          <li><a href="htmlPages/AdminPannel/contact/contactpg.php">Contact Us</a></li>
          <li>
<?php
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){
    
?>
    <a class="w3-bar-item w3-button w3-hover-black" style="text-decoration: none;" href="htmlPages/AdminPannel/DashBoard/principle.php"><strong><h4>Dashboard</h4></strong></a>
<?php
}
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
    
?>
    <a class="w3-bar-item w3-button w3-hover-black" style="text-decoration: none;" href="htmlPages/AdminPannel/MainAdmin.php"><strong><h4>Dashboard</h4></strong></a>
<?php
}
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==3){
    
?>
    <a class="w3-bar-item w3-button w3-hover-black" style="text-decoration: none;" href="htmlPages/AdminPannel/DashBoard/RowDataAdmin.php"><strong><h4>Dashboard</h4></strong></a>
<?php
}
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==4){
    
?>
    <a class="w3-bar-item w3-button w3-hover-black" style="text-decoration: none;" href="htmlPages/AdminPannel/DashBoard/BranchAdmin.php"><strong><h4>Dashboard</h4></strong></a>
<?php
}
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){
    
?>
    <a class="w3-bar-item w3-button w3-hover-black" style="text-decoration: none;" href="htmlPages/AdminPannel/DashBoard/teacherAdmin.php"><strong><h4>Dashboard</h4></strong></a>
<?php
}
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==6){
?>
    <a class="w3-bar-item w3-button w3-hover-black" style="text-decoration: none;" href="htmlPages/AdminPannel/DashBoard/markingAdmin.php"><strong><h4>Dashboard</h4></strong></a>
<?php
}
?>
<?php
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==7){
?>
<a class="w3-bar-item w3-button w3-hover-black" style="text-decoration: none;" href="htmlPages/AdminPannel/DashBoard/cOfficer.php"><strong><h4>Dashboard</h4></strong></a>
<?php
}
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==8){
?>
<a class="w3-bar-item w3-button w3-hover-black" style="text-decoration: none;" href="htmlPages/AdminPannel/DashBoard/developer.php"><strong><h4>Dashboard</h4></strong></a>
<?php
}
?>
          </li>
        </ul>
      </div>
    </div>   
  </nav>