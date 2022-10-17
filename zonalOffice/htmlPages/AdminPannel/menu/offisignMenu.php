<?php
    $sqlnptu="SELECT * FROM nonprincipletemp";
    $resultnptu=$conn->query($sqlnptu);

    $countnptu = mysqli_num_rows($resultnptu);

    $sqltude="SELECT * FROM nonprincipletmdel";
    $resulttude=$conn->query($sqltude);

    $counttude = mysqli_num_rows($resulttude);

    $sqlchmp="SELECT * FROM nptteachtemp";
    $resultchmp=$conn->query($sqlchmp);

    $countchmp = mysqli_num_rows($resultchmp);

    $sqlchde="SELECT * FROM nptteachtemp";
    $resultchde=$conn->query($sqlchde);

    $countchde = mysqli_num_rows($resultchde);

    $sqlqlmt="SELECT * FROM qualificationtmp";
    $resultqlmt=$conn->query($sqlqlmt);

    $countqlmt = mysqli_num_rows($resultqlmt);

    $sqlqlde="SELECT * FROM qualificationtmdel";
    $resultqlde=$conn->query($sqlqlde);

    $countqlde = mysqli_num_rows($resultqlde);

    $sqlerml="SELECT * FROM erservicetmp";
    $resulterml=$conn->query($sqlerml);

    $counterml = mysqli_num_rows($resulterml);

    $sqlerde="SELECT * FROM erservicetmdel";
    $resulterde=$conn->query($sqlerde);

    $counterde = mysqli_num_rows($resulterde);

    // add extra activity count and after that count

    $sqleatm="SELECT * FROM extractvitmp";
    $resulteatm=$conn->query($sqleatm);

    $counteatm = mysqli_num_rows($resulteatm);

    $sqleacde="SELECT * FROM extractvitmdel";
    $resulteacde=$conn->query($sqleacde);

    $counteacde = mysqli_num_rows($resulteacde);

    $sqledu="SELECT * FROM exmdutytmp";
    $resultedu=$conn->query($sqledu);

    $countedu = mysqli_num_rows($resultedu);

    $sqledude="SELECT * FROM exmdutytmdel";
    $resultedude=$conn->query($sqledude);

    $countedude = mysqli_num_rows($resultedude);

    $sqlchld="SELECT * FROM chldservtmp";
    $resultchld=$conn->query($sqlchld);

    $countchld = mysqli_num_rows($resultchld);

    $sqlchldde="SELECT * FROM chldservtmdel";
    $resultchldde=$conn->query($sqlchldde);

    $countchldde = mysqli_num_rows($resultchldde);

    $sqlspol="SELECT * FROM tspoucetmp";
    $resultspol=$conn->query($sqlspol);

    $countspol = mysqli_num_rows($resultspol);

    $sqlspolde="SELECT * FROM tspoucetmdel";
    $resultspolde=$conn->query($sqlspolde);

    $countspolde = mysqli_num_rows($resultspolde);

    $sqlcrdr="SELECT * FROM cardrettmp";
    $resultcrdr=$conn->query($sqlcrdr);

    $countcrdr = mysqli_num_rows($resultcrdr);

    $sqlcrdrde="SELECT * FROM cardrettmdel";
    $resultcrdrde=$conn->query($sqlcrdrde);

    $countcrdrde = mysqli_num_rows($resultcrdrde);

    $countedil = $countnptu+$countchmp+$countqlmt+$counterml+$counteatm+$countedu+$countchld+$countspol+$countcrdr;
    $countdell = $counttude+$countchde+$countqlde+$counterde+$counteacde+$countedude+$countchldde+$countspolde+$countcrdrde;

    $toteande = $countedil + $countdell;
?>
<aside style="background-color:#ecffec;" class="sidebar">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div class="profile-image">
                            <img src="jthemes.org/demo-admin/cubic/plugins/images/users/#hanna.jpg" alt="user-img" class="img-circle">
                            <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="badge badge-danger">
                                    <em class="fa fa-angle-down"></em>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li><a href="javascript:void(0);"><em class="fa fa-user"></em> Profile</a></li>
                                <li><a href="javascript:void(0);"><em class="fa fa-inbox"></em> Inbox</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="javascript:void(0);"><em class="fa fa-cog"></em> Account Settings</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../logout.php" onclick="document.getElementById('id01').style.display='block'"><em class="fa fa-power-off"></em> Logout</a></li>
                            </ul>
                        </div>
                        <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> Main Admin</a></p>
                    </div>
                </div>
                <nav style="background-color:#ecffec;" class="sidebar-nav">
                    <ul id="side-menu">
                        <li>
                        <!-- <span class="label label-rounded label-info pull-right">3</span> -->
                            <a href="../MainAdmin.php" class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Dashboard </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> School <i style="margin-left:100px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="../school.php">School List</a> </li>
                                <li> <a href="../teacher.php">Teachers</a> </li>
                                <li> <a href="../ediitDashboard/headteEdit.php">Edit Requests <span class="label label-rounded label-primary pull-right"><?php if($toteande>0){echo $toteande;}?></span></a> </li>
                                <li> <a href="../principleAdd.php">Principal</a> </li>
                                <li> <a href="officesign.php">Teacher Approval</a> </li>
                            </ul>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Office Details <i style="margin-left:53px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../signCollection/signpic/office.php">Office Sign</a></li>
                                <li><a href="../contact/contactDe.php">Contact E-Mail</a></li>
                                <li><a href="../userAccountCr.php">User Accounts</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Reports <i style="margin-left:90px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../tReport.php">Transfer Report</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Admins <i style="margin-left:92px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../DashBoard/BranchAdmin.php">Branch Admin</a></li>
                                <li><a href="../DashBoard/RowDataAdmin.php">Row Admin</a></li>
                                <li><a href="../certificate/cofSelect.php">Certificate Officer</a></li>
                                <li><a href="../markadmAd.php">Marking Admin</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active waves-effect" href="../cardre/addTeacherNeed.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Cardre </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Requests <i style="margin-left:80px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="../requests/transferReqMan.php">Transfer Requests</a> </li>
                                <li> <a href="../certifyApr.php">Certificate Requests</a> </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
</aside>