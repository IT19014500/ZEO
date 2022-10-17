<?php
  include('../../connection.php');
  session_start();
?>

<!-- Table report start -->
<script src="../bootstrap/js/jquery-3.5.1.js"></script>
<script src="../bootstrap/js/jquery.dataTables.min.js"></script>
<script src="../bootstrap/js/vfs_fonts.js"></script>
<script src="../bootstrap/js/dataTables.buttons.min.js"></script>
<script src="../bootstrap/js/jszip.min.js"></script>
<script src="../bootstrap/js/pdfmake.min.js"></script>
<script src="../bootstrap/js/buttons.html5.min.js"></script>
<script src="../bootstrap/js/buttons.print.min.js"></script>
<!-- Table report end -->

<?php

$sqlmz = "SELECT * FROM activetrans";
$resultmz=$conn->query($sqlmz);
while($recordmz = mysqli_fetch_array($resultmz)){
    $muk = $recordmz['zid'];
    $mukne = $recordmz['zidne'];
    $sub = $recordmz['suID'];
    $lan = $recordmz['lid'];

    $sqlmub = "SELECT * FROM activetrans WHERE zid = $mukne && zidne = $muk && suID = $sub && lid = $lan";
    $resultmub=$conn->query($sqlmub);
    while($recordmub = mysqli_fetch_array($resultmub)){
        
        $mubtrid = $recordmub['trid'];

        $mubname = $recordmub['name'];

        $mubtpn = $recordmub['tpn'];

        $mubnic = $recordmub['nic'];

        $mubsuID = $recordmub['suID'];

        $mublid = $recordmub['lid'];

        $mubplid = $recordmub['plid'];

        // $mubproid = $recordmub['proid'];

        $mubsgid = $recordmub['sgid'];

        $mubzid = $recordmub['zid'];

        $mubzidne = $recordmub['zidne'];

        $actyl = "No";
        $sqlyln="SELECT * FROM permatch WHERE nic = '$mubnic' ";
        $resultyln=$conn->query($sqlyln);
        while($recordyln = mysqli_fetch_array($resultyln)){
          $actyl = "Yes";
        }
        if($actyl == "No"){
          $mubadd = "INSERT INTO permatch(trid,name,tpn,nic,suID,lid,plid,sgid,zid,zidne)VALUES('$mubtrid','$mubname','$mubtpn','$mubnic','$mubsuID','$mublid','$mubplid','$mubsgid','$mubzid','$mubzidne')";
          $conn-> query($mubadd);
        }

        // new Part start
        $mztrid = $recordmz['trid'];

        $mzname = $recordmz['name'];

        $mztpn = $recordmz['tpn'];

        $mznic = $recordmz['nic'];

        $mzsuID = $recordmz['suID'];

        $mzlid = $recordmz['lid'];

        $mzplid = $recordmz['plid'];

        // $mzproid = $recordmz['proid'];

        $mzsgid = $recordmz['sgid'];

        $mzzid = $recordmz['zid'];

        $mzzidne = $recordmz['zidne'];

        $actcm = "No";
        $sqlcmn="SELECT * FROM permatch WHERE nic = '$mubnic' ";
        $resultcmn=$conn->query($sqlcmn);
        while($recordcmn = mysqli_fetch_array($resultcmn)){
          $actcm = "Yes";
        }
        if($actcm == "No"){
        $mzadd = "INSERT INTO permatch(trid,name,tpn,nic,suID,lid,plid,sgid,zid,zidne)VALUES('$mztrid','$mzname','$mztpn','$mznic','$mzsuID','$mzlid','$mzplid','$mzsgid','$mzzid','$mzzidne')";
        $conn-> query($mzadd);
        }
        // $hlk = $mubname." ".$mzname;
        // if($mzadd==true){
        // $hdmadd = "INSERT INTO permatch(trid,name,tpn,nic,suID,lid,plid,proid,sgid,zid,zidne)VALUES('0','$hlk','0','0','0','0','0','0','0','0','0')";
        // $conn-> query($hdmadd);
        // }
        // new part end
        // Delete Query Start

$sqlactv="SELECT * FROM permatch";
$resultactv=$conn->query($sqlactv);

while($recordactv = mysqli_fetch_array($resultactv)){
    $acde = $recordactv['trid'];

    $sqlbty="SELECT * FROM activetrans WHERE trid = $acde";
    $resultbty=$conn->query($sqlbty);

    

    while($recordbty = mysqli_fetch_array($resultbty)){
        $ytv = $recordbty['trid'];

        $deletemt="delete FROM activetrans WHERE trid = $ytv";
        $resultmt=$conn->query($deletemt);

    }
}

// Delete Query End
    }
}



?>


<!-- Display Table Start -->

      
<?php
  
  $sqltd="SELECT * FROM permatch";
  $resulttd=$conn->query($sqltd);

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>ZEO | Mutual Transfer</title>
<!-- Table report start -->
<link rel="stylesheet" href="../bootstrap/css/dataTables.min.css">
<link rel="stylesheet" href="../bootstrap/css/buttons.dataTables.min.css">
<!-- Table report end -->

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
<link rel="stylesheet" href="../bootstrap/css/tealist.css">
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
    margin-right:15px;
    background-color:dodgerblue;
    border-radius:16px;
    width:150px;
    padding:5px;
    color:#ffffff;
    border:none;
}

.tlistbtn:hover{
    
    background-color:green;
}

.mbtn{
  margin-left:10px;
  color:#ffffff;
  padding:6px 30px;
  border-radius:16px;
  border:none;
  background-color:#6BAF75;
  width:auto;
  
}

</style>
</head>

<body style = "background-color:#ced7e0;">
<script>

$(document).ready(function() {
  
  // var rty = "Yes";
    $('#mutbl').DataTable( {
        dom: 'Bfrtip',
        
        
        // db eken size eka denna
        "pageLength": 50,
        buttons: [
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            
        ]
    } );
} );

</script>

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
        <h1>Perfectly Matching Mutual Transfers</h1>
        <p>Congratulations!</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="../../index.php">Home</a> <span><em class="fa fa-angle-double-right"></em>Perfectly Match</span>
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

      
<a href="generalMutual.php" ><button class = "mbtn"><em class="fas fa-caret-left"></em></button></a>
<a href="msucessAdd.php?mutratl=<?php echo 3; ?>"><button class="tlistbtn">SUCESS LIST</button></a>
<br><br>
<h1 style="color:#000000;text-align:center;">IMPORTANT NOTICE</h1><br><br>
<ul><li><p style="margin-left:50px;color:black;text-align:borderbox;">*&nbsp&nbsp&nbspIf you found your partner from this website please fill this form given as "SUCCESS LIST". If you fill It you can use this system again! If not, system will reject your &nbsp&nbsp&nbsp&nbsp&nbsprequest in your next attempt for possible and matching dataset.</p>
</li>
<li><p style="margin-left:50px;color:black;text-align:borderbox;">*&nbsp&nbsp&nbsp After first matching opportunity please wait for a week to add your next request.</p>
</li>
<li><p style="margin-left:50px;color:black;text-align:borderbox;">*&nbsp&nbsp&nbsp If you want to add another request immediately(Before a week), You need to contact our Admin.</p></li>
</ul>
<div class="libody">
<div class="header_fixed">
    <table id="mutbl">
      <caption style="color:#000000;">Matching Details</caption>
        <thead>
            <tr>
               <th>NAME</th>
               <th>TP</th>
               <th>NIC</th>
               <th>SUBJECT</th>
               <th>PLACEMENT LANGUAGE</th>
               <th>PLACEMENT CATEGORY</th>
               <!-- <th>PROFESSION</th> -->
               <th>SERVICE & GRADE</th>
               <th>ZONE</th>
               <th>REQUEST ZONE</th>
               <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
<?php
    while($recordtd = mysqli_fetch_array($resulttd)){
      $traci = $recordtd['trid'];
      $subjid = $recordtd['suID'];
      $lanid = $recordtd['lid'];
      $plcaid = $recordtd['plid'];
      // $profname = $recordtd['proid'];
      $sergraid = $recordtd['sgid'];
      $zoneid = $recordtd['zid'];
      $newzone = $recordtd['zidne'];

      $ennamem = $recordtd['name'];
      $entpnm = $recordtd['tpn'];
      $ennicm = $recordtd['nic'];

      $deennamem = base64_decode($ennamem);
      $deentpnm = base64_decode($entpnm);
      $deennicm = base64_decode($ennicm);

?>
            <tr>
               <td><?php echo $deennamem; ?></td>
               <td><?php echo $deentpnm; ?></td>
               <td><?php echo $deennicm; ?></td>
               

                <?php
                  
                  $sqlsu="SELECT * FROM subject where suID = $subjid";
                  $resultsu=$conn->query($sqlsu);

                    while($recordsu = mysqli_fetch_array($resultsu)){
                      $subjename = $recordsu['name'];
                      $desubjename = base64_decode($subjename);

                      $fca = $recordsu['caid'];
                      $fssid = $recordsu['ssid'];

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
                      
                  }
                  if($traci!=0){
                    echo "<td>";
                    echo $desubjename." ( ".$destqna." - ".$decxna." )";
                    echo "</td>";
            
                  }
              
               elseif($traci==0){
                 echo "<td>D</td>";
              
               }
               ?>

                <?php
                  
                  $sqllan="SELECT * FROM languages where lid = $lanid";
                  $resultlan=$conn->query($sqllan);

                    while($recordlan = mysqli_fetch_array($resultlan)){
                      $lanname = $recordlan['name'];
                      $delanname = base64_decode($lanname);
                    }
                
               

               if($traci!=0){
                    echo "<td>";
                    echo $delanname;
                    echo "</td>";
            
                  }
              
               elseif($traci==0){
                 echo "<td>E</td>";
              
               }
               ?>
              

                <?php
                  
                  $sqlpc="SELECT * FROM plcategory where plid = $plcaid";
                  $resultpc=$conn->query($sqlpc);

                    while($recordpc = mysqli_fetch_array($resultpc)){
                      $categname = $recordpc['name'];
                      $decategname = base64_decode($categname);
                    }
                
               

                    if($traci!=0){
                         echo "<td>";
                         echo $decategname;
                         echo "</td>";
                 
                       }
                   
                    elseif($traci==0){
                      echo "<td>V</td>";
                   
                    }
                    ?>

                <?php
                  
                  // $sqlpro="SELECT * FROM profession where	proid = $profname";
                  // $resultpro=$conn->query($sqlpro);

                  //   while($recordpro = mysqli_fetch_array($resultpro)){
                  //     $profname = $recordpro['name'];
                  //     $deprofname = base64_decode($profname);
                  //   }
                
               

                  //   if($traci!=0){
                  //        echo "<td>";
                  //        echo $deprofname;
                  //        echo "</td>";
                 
                  //      }
                   
                  //   elseif($traci==0){
                  //     echo "<td>I</td>";
                   
                  //   }
                    ?>

                <?php
                  
                  $sqlsgn="SELECT * FROM serandgrade where	sgid = $sergraid";
                  $resultsgn=$conn->query($sqlsgn);

                    while($recordsgn = mysqli_fetch_array($resultsgn)){
                      $sgnname = $recordsgn['grade'];
                      $desgnname = base64_decode($sgnname);
                    }
                
               

                    if($traci!=0){
                         echo "<td>";
                         echo $desgnname;
                         echo "</td>";
                 
                       }
                   
                    elseif($traci==0){
                      echo "<td>I</td>";
                   
                    }
                    ?>


                <?php
                  
                  $sqlzid="SELECT * FROM zonet where	zid = $zoneid";
                  $resultzid=$conn->query($sqlzid);

                    while($recordzid = mysqli_fetch_array($resultzid)){
                      $zidname = $recordzid['zone'];
                      $dezidname = base64_decode($zidname);
                    }
                
               

                    if($traci!=0){
                         echo "<td>";
                         echo $dezidname;
                         echo "</td>";
                 
                       }
                   
                    elseif($traci==0){
                      echo "<td>D</td>";
                   
                    }
                    ?>



                <?php
                  
                  $sqlzidne="SELECT * FROM zonet where	zid = $newzone";
                  $resultzidne=$conn->query($sqlzidne);

                    while($recordzidne = mysqli_fetch_array($resultzidne)){
                      $zidnamene = $recordzidne['zone'];
                      $dezidnamene = base64_decode($zidnamene);
                    }
                
               

                    if($traci!=0){
                         echo "<td>";
                         echo $dezidnamene;
                         echo "</td>";
                 
                       }
                   
                    elseif($traci==0){
                      echo "<td>I</td>";
                   
                    }
                    ?>

              <?php if($traci != 0){ ?>
               <td><a href=""><button style="background-color:#4A5F6A;width:170px;">CONGRATULATIONS!</button></a></td>
              <?php }else{ ?>
                <td>N G </td>
              <?php } ?>

            </tr>
<?php
    }
?>
        </tbody>
    </table>
</div>


<!-- libody div -->
</div>
  </div>
  </div>
</section>
<!--Shoping-->


<!--FOOTER-->
<?php
  require_once('footer/generalMutualFooter.php');
?>
<!--FOOTER ends-->



<!-- <script src="../../js/jquery-2.2.3.js"></script>
<script src="../../js/bootstrap.min.js"></script> -->
<script src="../../js/bootsnav.js"></script>
<script src="../../js/jquery.appear.js"></script>
<script src="../../js/jquery-countTo.js"></script>
<script src="../../js/jquery.parallax-1.1.3.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/jquery.cubeportfolio.min.js"></script>
<script src="../../js/jquery.themepunch.tools.min.js"></script>
<script src="../../js/jquery.themepunch.revolution.min.js"></script>
<!-- <script src="../../js/revolution.extension.layeranimation.min.js"></script> -->
<script src="../../js/revolution.extension.navigation.min.js"></script>
<script src="../../js/revolution.extension.parallax.min.js"></script>
<!-- <script src="../../js/revolution.extension.slideanims.min.js"></script>
<script src="../../js/revolution.extension.video.min.js"></script> -->
<script src="../../js/wow.min.js"></script>
<script src="../../js/functions.js"></script>

</body>
</html>
