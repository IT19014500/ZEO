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

    $sqlnmsl="SELECT * FROM msucesslist";
    $resultnmsl=$conn->query($sqlnmsl);
    
    while($recordnmsl = mysqli_fetch_array($resultnmsl)){

     $mslids = $recordnmsl['nic'];

     $deletemsuli="delete from activetrans where nic= '$mslids'";
     $resulttyu=$conn->query($deletemsuli);

     $deletemsulimut="delete from permatch where nic= '$mslids'";
     $resultdre=$conn->query($deletemsulimut);

    }

    
?>


<?php
    
    $sqlmt="SELECT * FROM mutualtrans";
    $resultmt=$conn->query($sqlmt);
?>

<?php
    while($recordmt = mysqli_fetch_array($resultmt)){

        $zon = $recordmt['zid'];
        $sub = $recordmt['suID'];
        $lan = $recordmt['lid'];


    $sql3="SELECT * FROM mutualtrans WHERE zidne = $zon && suID = $sub && lid = $lan";
    $result3=$conn->query($sql3);

    // Add insert part here

    while($record3 = mysqli_fetch_array($result3)){
        
        // Add insert part 2 here
        

        $TMtrid = $recordmt['trid'];

        $TMname = $recordmt['name'];

        $TMtpn = $recordmt['tpn'];

        $TMnic = $recordmt['nic'];

        $TMsuID = $recordmt['suID'];

        $TMlid = $recordmt['lid'];

        $TMplid = $recordmt['plid'];

        // $TMproid = $recordmt['proid'];

        $TMsgid = $recordmt['sgid'];

        $TMzid = $recordmt['zid'];

        $TMzidne = $recordmt['zidne'];

        $actcp = "No";
        $sqlacck="SELECT * FROM activetrans WHERE nic = '$TMnic' ";
        $resultacck=$conn->query($sqlacck);
        while($recordacck = mysqli_fetch_array($resultacck)){
          $actcp = "Yes";
        }


        if($actcp == "No"){
          $beadd = "INSERT INTO activetrans(trid,name,tpn,nic,suID,lid,plid,sgid,zid,zidne)VALUES('$TMtrid','$TMname','$TMtpn','$TMnic','$TMsuID','$TMlid','$TMplid','$TMsgid','$TMzid','$TMzidne')";
          $conn-> query($beadd);
        }
        
        
        
        $TBtrid = $record3['trid'];

        $TBname = $record3['name'];

        $TBtpn = $record3['tpn'];

        $TBnic = $record3['nic'];

        $TBsuID = $record3['suID'];

        $TBlid = $record3['lid'];

        $TBplid = $record3['plid'];

        // $TBproid = $record3['proid'];

        $TBsgid = $record3['sgid'];

        $TBzid = $record3['zid'];

        $TBzidne = $record3['zidne'];


        $actbp = "No";
        $sqlacdl="SELECT * FROM activetrans WHERE nic = '$TBnic' ";
        $resultacdl=$conn->query($sqlacdl);
        while($recordacdl = mysqli_fetch_array($resultacdl)){
          $actbp = "Yes";
        }

        if($actbp == "No"){
          $betadd = "INSERT INTO activetrans(trid,name,tpn,nic,suID,lid,plid,sgid,zid,zidne)VALUES('$TBtrid','$TBname','$TBtpn','$TBnic','$TBsuID','$TBlid','$TBplid','$TBsgid','$TBzid','$TBzidne')";
          $conn-> query($betadd);
        }
        $jol = "-";
        // $enjol = base64_encode($jol);

        $deTBname = base64_decode($TBname);
        $deTMname = base64_decode($TMname);

        $gtx = $deTBname.$jol.$deTMname;
        $engtx = base64_encode($gtx);

        $jbs = $TBtrid.$TMtrid;

        if($betadd==true){
            // $catadd = "INSERT INTO activetrans(trid,name,tpn,nic,suID,lid,plid,proid,sgid,zid,zidne)VALUES('0','$engtx','0','0','0','0','0','0','0','0','0')";
            // $conn-> query($catadd);
        }

    }
               

}


// delete query start


    $sqlhac="SELECT * FROM activetrans";
        $resulthac=$conn->query($sqlhac);
           
        while($recordhac = mysqli_fetch_array($resulthac)){
    
            $buzzt = $recordhac['zid'];
               $bmo = $recordhac['trid'];
               $bmovar = base64_encode($bmo);

               $txtrla = "Compare with trid = ";
               $txtrlavar = base64_encode($txtrla);

               $hlk = $txtrlavar.$bmovar;
              $sqlfhn="SELECT * FROM mutualtrans WHERE zidne = $buzzt";
              $resultfhn=$conn->query($sqlfhn);

        while($recordfhn = mysqli_fetch_array($resultfhn)){
            if($sqlfhn==true){

        // Start Second Part Start
        $FNtrid = $recordfhn['trid'];
        
        $FNname = $recordfhn['name'];
        
        $FNtpn = $recordfhn['tpn'];

        $FNnic = $recordfhn['nic'];
        
        $FNsuID = $recordfhn['suID'];
        
        $FNlid = $recordfhn['lid'];
        
        $FNplid = $recordfhn['plid'];
        
        // $FNproid = $recordfhn['proid'];
        
        $FNsgid = $recordfhn['sgid'];
        
        $FNzid = $recordfhn['zid'];
        
        $FNzidne = $recordfhn['zidne'];

        $actbf = "No";
        $sqlmvn="SELECT * FROM activetrans WHERE nic = '$FNnic' ";
        $resultmvn=$conn->query($sqlmvn);
        while($recordmvn = mysqli_fetch_array($resultmvn)){
          $actbf = "Yes";
        }

        if($actbf == "No"){
            $FNhdmadd = "INSERT INTO activetrans(trid,name,tpn,nic,suID,lid,plid,sgid,zid,zidne)VALUES('$FNtrid','$FNname','$FNtpn','$FNnic','$FNsuID','$FNlid','$FNplid','$FNsgid','$FNzid','$FNzidne')";
            $conn-> query($FNhdmadd);
        }
              // Start Second Part End
                // $hdmadd = "INSERT INTO activetrans(trid,name,tpn,nic,suID,lid,plid,proid,sgid,zid,zidne)VALUES('0','$hlk','0','0','0','0','0','0','0','0','0')";
                // $conn-> query($hdmadd);


            }
          }

          
        }

                    // NEW START

                    $sqlactv="SELECT * FROM activetrans";
                    $resultactv=$conn->query($sqlactv);
                    
                    while($recordactv = mysqli_fetch_array($resultactv)){
                        $acde = $recordactv['trid'];
                    
                        $sqlbty="SELECT * FROM mutualtrans WHERE trid = $acde";
                        $resultbty=$conn->query($sqlbty);
                    
                        
                    
                        while($recordbty = mysqli_fetch_array($resultbty)){
                            $ytv = $recordbty['trid'];
  
                            $deletemt="delete FROM mutualtrans WHERE trid = $ytv";
                            $resultmt=$conn->query($deletemt);
  
                        }
                    }
                      
    // NEW START END

?>

<!-- Display Table Start -->
      
<?php
  
  $sqltd="SELECT * FROM activetrans";
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
        <h1>Possible Mutual Transfers</h1>
        <p>Talk with your partners</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="../../index.php">Home</a> <span><em class="fa fa-angle-double-right"></em>Possible Transfers</span>
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
<a href="msucessAdd.php?mutratl=<?php echo 2; ?>"><button class="tlistbtn">SUCESS LIST</button></a>



<h1 style="color:#000000;text-align:center;">IMPORTANT NOTICE</h1><br><br>
<ul><li><p style="margin-left:50px;color:black;text-align:borderbox;">*&nbsp&nbsp&nbspIf you found your partner from this website please fill this form given as "SUCCESS LIST". If you fill It you can use this system again! If not, system will reject your &nbsp&nbsp&nbsp&nbsp&nbsprequest in your next attempt for possible and matching dataset.</p>
</li>
<li><p style="margin-left:50px;color:black;text-align:borderbox;">*&nbsp&nbsp&nbsp After first matching opportunity please wait for a week to add your next request.</p></li>
<li><p style="margin-left:50px;color:black;text-align:borderbox;">*&nbsp&nbsp&nbsp If you want to add another request immediately(Before a week), You need to contact our Admin.</p></li>
</ul>
<div class="libody">
<div class="header_fixed">
    <table id="mutbl">
      <caption style="color:#000000;">Details</caption>
        <thead>
            <tr>
               <!-- <th>TRID</th> -->
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
                  
                  $sqllan="SELECT * FROM languages where 	lid = $lanid";
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
                  
                  $sqlpc="SELECT * FROM plcategory where 	plid = $plcaid";
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
                  //     if($traci!=0){
                  //       echo "<td>";
                  //       echo $deprofname;
                  //       echo "</td>";
                
                  //     }
                  
                  //  elseif($traci==0){
                  //    echo "<td>I</td>";
                  //  }
                  //  ?>

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
               <td><a href=""><button style="background-color:#4A5F6A;width:100px;">Talk with your partners</button></a></td>
              <?php
               }
               elseif($traci==0){
                echo "<td>N  G</td>";
              } 
              ?>
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
