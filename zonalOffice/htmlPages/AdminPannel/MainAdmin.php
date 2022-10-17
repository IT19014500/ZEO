<?php
    include('../../connection.php');
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/logoGvmnt.png">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <title>Main Admin</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/plugins/components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="jthemes.org/demo-admin/cubic/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- ===== Animation CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="jthemes.org/demo-admin/cubic/cubic-html/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="mini-sidebar">
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ===== Top-Navigation ===== -->
        <?php
            require_once 'menu/topNavigation/mainAdminTPN.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
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
            $toteande = 0;
            $scvna = 'Pool';
            $scvnavar = base64_encode($scvna);

            $sqlcsl="SELECT * FROM school WHERE name != '$scvnavar'";
            $resultcsl=$conn->query($sqlcsl);

            $countcsl = mysqli_num_rows($resultcsl);

            $sqlprl="SELECT * FROM principle";
            $resultprl=$conn->query($sqlprl);

            $countprl = mysqli_num_rows($resultprl);


            $sqltel="SELECT * FROM ofisign";
            $resulttel=$conn->query($sqltel);

            $counttel = mysqli_num_rows($resulttel);

            $sqltrnl="SELECT * FROM msucessalttble";
            $resulttrnl=$conn->query($sqltrnl);

            $counttrnl = mysqli_num_rows($resulttrnl);

            $sqlusl="SELECT * FROM users";
            $resultusl=$conn->query($sqlusl);

            $countusl = mysqli_num_rows($resultusl);

            // PRINCIPLE
            $sqlpcp="SELECT * FROM teacher WHERE cpro = 1 && tid IN(SELECT tid FROM ofisign);";
            $resultpcp=$conn->query($sqlpcp);

            $countpcp = mysqli_num_rows($resultpcp);

            // Deputy Principle
            $sqldpp="SELECT * FROM teacher WHERE cpro = 3 && tid IN(SELECT tid FROM ofisign);";
            $resultdpp=$conn->query($sqldpp);

            $countdpp = mysqli_num_rows($resultdpp);

            // Assistant Principle
            $sqlasp="SELECT * FROM teacher WHERE cpro = 4 && tid IN(SELECT tid FROM ofisign);";
            $resultasp=$conn->query($sqlasp);

            $countasp = mysqli_num_rows($resultasp);

            // Teacher 3241432414
            $sqltcr="SELECT * FROM teacher WHERE cpro = 5 && tid IN(SELECT tid FROM ofisign);";
            $resulttcr=$conn->query($sqltcr);

            $counttcr = mysqli_num_rows($resulttcr);

            $sqlpol="SELECT * FROM teacher WHERE scid=110";
            $resultpol=$conn->query($sqlpol);

            $countpol = mysqli_num_rows($resultpol);

        ?>
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require_once 'menu/mainAdmin.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        <div style="background-color:#d3eeff;" class="page-wrapper">
            <div class="row m-0">
                <div  style="background-color:#d6ddff;" class="col-md-3 col-sm-6 info-box">
                    <div class="media">
                        <div class="media-left">
                            <span class="icoleaf bg-primary text-white"><em class="mdi mdi-checkbox-marked-circle-outline"></em></span>
                        </div>
                        <div class="media-body">
                            <h3 class="info-count text-blue"><?php echo $countcsl; ?></h3>
                            <p style="color:#000000;" class="info-text font-12">School</p>
                            <span class="hr-line"></span>
                            <p style="color:#000000;" class="info-ot font-15">Related<span class="label label-rounded label-success">109</span></p>
                        </div>
                    </div>
                </div>
                <div style="background-color:#d6ddff;" class="col-md-3 col-sm-6 info-box">
                    <div class="media">
                        <div class="media-left">
                            <span class="icoleaf bg-primary text-white"><em class="mdi mdi-comment-text-outline"></em></span>
                        </div>
                        <div class="media-body">
                            <h3 class="info-count text-blue"><?php echo $countprl; ?></h3>
                            <p style="color:#000000;" class="info-text font-12">Principal</p>
                            <span class="hr-line"></span>
                            <p style="color:#000000;" class="info-ot font-15">Total Pending<span class="label label-rounded label-danger"><?php echo 109-$countprl; ?></span></p>
                        </div>
                    </div>
                </div>
                <div style="background-color:#d6ddff;" class="col-md-3 col-sm-6 info-box">
                    <div class="media">
                        <div class="media-left">
                            <span class="icoleaf bg-primary text-white"><em class="mdi mdi-coin"></em></span>
                        </div>
                        <div class="media-body">
                            <h3 class="info-count text-blue"><?php echo $counttel; ?></h3>
                            <p style="color:#000000;" class="info-text font-12">Teacher</p>
                            <span class="hr-line"></span>
                            <p style="color:#000000;" class="info-ot font-15">Currently added</span></p>
                        </div>
                    </div>
                </div>
                <div style="background-color:#d6ddff;" class="col-md-3 col-sm-6 info-box b-r-0">
                    <div class="media">
                        <div class="media-left p-r-5">
                            <div id="earning" class="e" data-percent="60">
                                <div id="pending" class="p" data-percent="55"></div>
                                <div id="booking" class="b" data-percent="50"></div>
                            </div>
                        </div>
                        <div class="media-body">
                            <h2 class="text-blue font-22 m-t-0">Report</h2>
                            <ul class="p-0 m-b-20">
                                <li><em class="fa fa-circle m-r-5 text-primary"></em><?php echo sprintf('%0.1f', round(($countpcp/109)*100, 2)); ?>% Principal</li>
                                <li><em class="fa fa-circle m-r-5 text-primary"></em><?php echo sprintf('%0.1f', round(($countdpp/109)*100, 2)); ?>% Deputy</li>
                                <li><em class="fa fa-circle m-r-5 text-info"></em><?php echo sprintf('%0.1f', round(($countasp/109)*100, 2)); ?>% Assistant</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===== Page-Container ===== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="white-box stat-widget">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <h4 class="box-title">Statistics</h4>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <select class="custom-select">
                                        <option selected value="0">Maths</option>
                                        <option value="1">Science</option>
                                        <option value="2">English</option>
                                        <option value="3">Music</option>
                                    </select>
                                    <ul class="list-inline">
                                        <li>
                                            <h6 class="font-15"><em class="fa fa-circle m-r-5 text-success"></em>Less than 45</h6>
                                        </li>
                                        <li>
                                            <h6 class="font-15"><em class="fa fa-circle m-r-5 text-primary"></em>Grater than 75</h6>
                                        </li>
                                    </ul>
                                </div>
                                <div class="stat chart-pos"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="white-box">
                            <h4 class="box-title">Task Progress</h4>
                            <div class="task-widget t-a-c">
                                <div class="task-chart" id="sparklinedashdb"></div>
                                <div class="task-content font-16 t-a-c">
                                    <div class="col-sm-6 b-r">
                                        Urgent Tasks
                                        <h1 class="text-primary">05 <span class="font-16 text-muted">Tasks</span></h1>
                                    </div>
                                    <div class="col-sm-6">
                                        Normal Tasks
                                        <h1 class="text-primary">03 <span class="font-16 text-muted">Tasks</span></h1>
                                    </div>
                                </div>
                                <div class="task-assign font-16">
                                    Assigned To
                                    <ul class="list-inline">
                                        <li class="p-l-0">
                                            <img src="jthemes.org/demo-admin/cubic/plugins/images/users/#1.png" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave">
                                        </li>
                                        <li>
                                            <img src="jthemes.org/demo-admin/cubic/plugins/images/users/#2.png" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave">
                                        </li>
                                        <li>
                                            <img src="jthemes.org/demo-admin/cubic/plugins/images/users/#3.png" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave">
                                        </li>
                                        <li class="p-r-0">
                                            <a href="javascript:void(0);" class="btn btn-success font-16">3+</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="white-box bg-primary color-box">
                            <h1 class="text-white font-light"><?php echo $counttrnl;?> <span class="font-14">Transfer</span></h1>
                            <div class="ct-revenue chart-pos"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="white-box bg-success color-box">
                            <h1 class="text-white font-light m-b-0"><?php echo $countusl; ?></h1>
                            <span class="hr-line"></span>
                            <p class="cb-text">Users</p>
                            <h6 class="text-white font-semibold">+75% <span class="font-light">Normal Users</span></h6>
                            <div class="chart">
                                <div class="ct-visit chart-pos"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="white-box bg-danger color-box">
                            <h1 class="text-white font-light m-b-0"><?php echo $countpol; ?></h1>
                            <span class="hr-line"></span>
                            <p class="cb-text">Pool</p>
                            <h6 class="text-white font-semibold"><?php echo sprintf('%0.2f', round(($countpol/$counttel)*100, 2)); ?>%<span class="font-light">Last Week</span></h6>
                            <div class="chart">
                                <input class="knob" data-min="0" data-max="100" data-bgColor="#f86b4a" data-fgColor="#ffffff" data-displayInput=false data-width="96" data-height="96" data-thickness=".1" value="25" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="white-box user-table">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="box-title">Table Format/User Data</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="javascript:void(0);" class="btn btn-default btn-outline font-16"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="btn btn-default btn-outline font-16"><i class="fa fa-commenting" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                    <select class="custom-select">
                                        <option selected>Sort by</option>
                                        <option value="1">Name</option>
                                        <option value="2">Location</option>
                                        <option value="3">Type</option>
                                        <option value="4">Role</option>
                                        <option value="5">Action</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="checkbox checkbox-info">
                                                    <input id="c1" type="checkbox">
                                                    <label for="c1"></label>
                                                </div>
                                            </th>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="checkbox checkbox-info">
                                                    <input id="c2" type="checkbox">
                                                    <label for="c2"></label>
                                                </div>
                                            </td>
                                            <td><a href="javascript:void(0);" class="text-link">Daniel Kristeen</a></td>
                                            <td>Texas, US</td>
                                            <td>Posts 564</td>
                                            <td><span class="label label-success">Admin</span></td>
                                            <td>
                                                <select class="custom-select">
                                                    <option value="1">Modulator</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Staff</option>
                                                    <option value="4">User</option>
                                                    <option value="5">General</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox checkbox-info">
                                                    <input id="c3" type="checkbox">
                                                    <label for="c3"></label>
                                                </div>
                                            </td>
                                            <td><a href="javascript:void(0);" class="text-link">Hanna Gover</a></td>
                                            <td>Los Angeles, US</td>
                                            <td>Posts 451</td>
                                            <td><span class="label label-info">Staff</span> </td>
                                            <td>
                                                <select class="custom-select">
                                                    <option value="1">Modulator</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Staff</option>
                                                    <option value="4">User</option>
                                                    <option value="5">General</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox checkbox-info">
                                                    <input id="c4" type="checkbox">
                                                    <label for="c4"></label>
                                                </div>
                                            </td>
                                            <td><a href="javascript:void(0);" class="text-link">Jeffery Brown</a></td>
                                            <td>Houston, US</td>
                                            <td>Posts 978</td>
                                            <td><span class="label label-danger">User</span> </td>
                                            <td>
                                                <select class="custom-select">
                                                    <option value="1">Modulator</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Staff</option>
                                                    <option value="4">User</option>
                                                    <option value="5">General</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox checkbox-info">
                                                    <input id="c5" type="checkbox">
                                                    <label for="c5"></label>
                                                </div>
                                            </td>
                                            <td><a href="javascript:void(0);" class="text-link">Elliot Dugteren</a></td>
                                            <td>San Antonio, US</td>
                                            <td>Posts 34</td>
                                            <td><span class="label label-warning">General</span> </td>
                                            <td>
                                                <select class="custom-select">
                                                    <option value="1">Modulator</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Staff</option>
                                                    <option value="4">User</option>
                                                    <option value="5">General</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox checkbox-info">
                                                    <input id="c6" type="checkbox">
                                                    <label for="c6"></label>
                                                </div>
                                            </td>
                                            <td><a href="javascript:void(0);" class="text-link">Sergio Milardovich</a></td>
                                            <td>Jacksonville, US</td>
                                            <td>Posts 31</td>
                                            <td><span class="label label-primary">Partial</span> </td>
                                            <td>
                                                <select class="custom-select">
                                                    <option value="1">Modulator</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Staff</option>
                                                    <option value="4">User</option>
                                                    <option value="5">General</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <ul class="pagination">
                                <li class="disabled"> <a href="#">1</a> </li>
                                <li class="active"> <a href="#">2</a> </li>
                                <li> <a href="#">3</a> </li>
                                <li> <a href="#">4</a> </li>
                                <li> <a href="#">5</a> </li>
                            </ul>
                            <a href="javascript:void(0);" class="btn btn-success pull-right m-t-10 font-20">+</a>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-md-8">
                        <div class="white-box">
                            <div class="task-widget2">
                                <div class="task-image">
                                    <img src="jthemes.org/demo-admin/cubic/plugins/images/task.jpg" alt="task" class="img-responsive">
                                    <div class="task-image-overlay"></div>
                                    <div class="task-detail">
                                        <h2 class="font-light text-white m-b-0">07 April</h2>
                                        <h4 class="font-normal text-white m-t-5">Your tasks for today</h4>
                                    </div>
                                    <div class="task-add-btn">
                                        <a href="javascript:void(0);" class="btn btn-success">+</a>
                                    </div>
                                </div>
                                <div class="task-total">
                                    <p class="font-16 m-b-0"><strong>5</strong> Tasks for <a href="javascript:void(0);" class="text-link">Jon Doe</a></p>
                                </div>
                                <div class="task-list">
                                    <ul class="list-group">
                                        <li class="list-group-item bl-info">
                                            <div class="checkbox checkbox-success">
                                                <input id="c7" type="checkbox">
                                                <label for="c7">
                                                    <span class="font-16">Create invoice for customers and email each customers.</span>
                                                </label>
                                                <h6 class="p-l-30 font-bold">05:00 PM</h6>
                                            </div>
                                        </li>
                                        <li class="list-group-item bl-warning">
                                            <div class="checkbox checkbox-success">
                                                <input id="c8" type="checkbox" checked>
                                                <label for="c8">
                                                    <span class="font-16">Send payment of <strong>&#36;500 invoised</strong> on 23 May to <a href="javascript:void(0);" class="text-link">Daniel Kristeen</a> via paypal.</span>
                                                </label>
                                                <h6 class="p-l-30 font-bold">03:00 PM</h6>
                                            </div>
                                        </li>
                                        <li class="list-group-item bl-danger">
                                            <div class="checkbox checkbox-success">
                                                <input id="c9" type="checkbox">
                                                <label for="c9">
                                                    <span class="font-16">It is a long established fact that a reader will be distracted by the readable.</span>
                                                </label>
                                                <h6 class="p-l-30 font-bold">04:45 PM</h6>
                                            </div>
                                        </li>
                                        <li class="list-group-item bl-success">
                                            <div class="checkbox checkbox-success">
                                                <input id="c10" type="checkbox">
                                                <label for="c10">
                                                    <span class="font-16">It is a long established fact that a reader will be distracted by the readable.</span>
                                                </label>
                                                <h6 class="p-l-30 font-bold">05:30 PM</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="task-loadmore">
                                    <a href="javascript:void(0);" class="btn btn-default btn-outline btn-rounded">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="white-box chat-widget">
                            <a href="javascript:void(0);" class="pull-right"><i class="icon-settings"></i></a>
                            <h4 class="box-title">Chat</h4>
                            <ul class="chat-list slimscroll" style="overflow: hidden;" tabindex="5005">
                                <li>
                                    <div class="chat-image"> <img alt="male" src="jthemes.org/demo-admin/cubic/plugins/images/users/hanna.jpg"> </div>
                                    <div class="chat-body">
                                        <div class="chat-text">
                                            <p><span class="font-semibold">Hanna Gover</span> Hey Daniel, This is just a sample chat. </p>
                                        </div>
                                        <span>2 Min ago</span>
                                    </div>
                                </li>
                                <li class="odd">
                                    <div class="chat-body">
                                        <div class="chat-text">
                                            <p> buddy </p>
                                        </div>
                                        <span>2 Min ago</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="chat-image"> <img alt="male" src="jthemes.org/demo-admin/cubic/plugins/images/users/hanna.jpg"> </div>
                                    <div class="chat-body">
                                        <div class="chat-text">
                                            <p><span class="font-semibold">Hanna Gover</span> Bye now. </p>
                                        </div>
                                        <span>1 Min ago</span>
                                    </div>
                                </li>
                                <li class="odd">
                                    <div class="chat-body">
                                        <div class="chat-text">
                                            <p> We have been busy all the day to make your website proposal and finally came with the super excited offer. </p>
                                        </div>
                                        <span>5 Sec ago</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="chat-send">
                                <input type="text" class="form-control" placeholder="Write your message">
                                <i class="fa fa-camera"></i>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- ===== Right-Sidebar ===== -->
                <!-- ===== Right-Sidebar-End ===== -->
            </div>
            <!-- ===== Page-Container-End ===== -->
            <footer style="color:#000000;" class="footer t-a-c">
                © 2022 Zonal Office Galewela. All rights reserved. <a style="color:#000000;" href = "https://www.facebook.com/AJCJ123"> Designed & Developed by Ayubowan JCJ</a>
            </footer>
        </div>
        <!-- ===== Page-Content-End ===== -->
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <!-- ===== jQuery ===== -->
    <script src="jthemes.org/demo-admin/cubic/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- ===== Bootstrap JavaScript ===== -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ===== Slimscroll JavaScript ===== -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/jquery.slimscroll.js"></script>
    <!-- ===== Wave Effects JavaScript ===== -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/waves.js"></script>
    <!-- ===== Menu Plugin JavaScript ===== -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/sidebarmenu.js"></script>
    <!-- ===== Custom JavaScript ===== -->
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/custom.js"></script>
    <!-- ===== Plugin JS ===== -->
    <script src="jthemes.org/demo-admin/cubic/plugins/components/chartist-js/dist/chartist.min.js"></script>
    <script src="jthemes.org/demo-admin/cubic/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="jthemes.org/demo-admin/cubic/plugins/components/sparkline/jquery.sparkline.min.js"></script>
    <script src="jthemes.org/demo-admin/cubic/plugins/components/sparkline/jquery.charts-sparkline.js"></script>
    <script src="jthemes.org/demo-admin/cubic/plugins/components/knob/jquery.knob.js"></script>
    <script src="jthemes.org/demo-admin/cubic/plugins/components/easypiechart/dist/jquery.easypiechart.min.js"></script>
    <script src="jthemes.org/demo-admin/cubic/cubic-html/js/db1.js"></script>
    <!-- ===== Style Switcher JS ===== -->
    <script src="jthemes.org/demo-admin/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
}else{
  echo "Please Login!";
}
?>