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
                            <a href="../DashBoard/teacherAdmin.php" class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Dashboard </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="../../clientSide/teacherlist.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Profile </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="transferReq.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Request </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="../../clientSide/generalMutual.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Mutual Transfer </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="../ExamDuty/dutyForm.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Exam Duty </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="../../clientSide/servCertify.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Service Certificate </span></a>
                        </li>
                    </ul>
                </nav>
            </div>
</aside>