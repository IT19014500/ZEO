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
                        <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"><?php echo $_SESSION['uname']; ?></a></p>
                    </div>
                </div>
                <nav style="background-color:#ecffec;" class="sidebar-nav">
                    <ul id="side-menu">
                        <li>
                            <a href="../AdminPannel/DashBoard/principle.php" class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Dashboard </span></a>
                        </li>
                        <!-- <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu">Teacher<i style="margin-left:100px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../signCollection/principlesign.php">Teacher Approve</a></li>
                                <li><a href="../../clientSide/teacherlist.php">Teacher Add</a></li>
                                <li><a href="../../clientSide/poolpg.php">Pool</a></li>
                            </ul>
                        </li> -->
                        <li>
                            <a class="active waves-effect" href="../AdminPannel/signCollection/principlesign.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Approve </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="../AdminPannel/cardre/priCardre.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Cadre </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="teacherlist.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Teacher Add </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="vaccationAdd.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Vaccation </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="monthRepList.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Salary Report </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="poolpg.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Pool </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="../AdminPannel/cardre/resAnalysis.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Result Analysis </span></a>
                        </li>
                    </ul>
                </nav>
            </div>
</aside>