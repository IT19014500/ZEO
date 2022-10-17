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
                        <?php
                          if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
                        ?>
                          <li>
                              <a href="../MainAdmin.php" class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Main Admin </span></a>
                          </li>
                        <?php
                          }
                        ?>
                        <li>
                            <a href="BranchAdmin.php" class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Dashboard </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp&nbsp<span class="hide-menu">Branch<i style="margin-left:100px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../branchAdmin/branchpic/branchPic.php">Branch Photo</a></li>
                                <li><a href="../branchAdmin/branchpic/hobDetail.php">HOD Details</a></li>
                                <li><a href="../branchAdmin/branchpic/bmemDetail.php">Branch Member</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Slider &nbsp&nbsp&nbsp&nbsp<i style="margin-left:90px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../indexAdmin/mainSlider.php">Main Slider</a></li>
                                <li><a href="../indexAdmin/downslider.php">Down Slider</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Duty &nbsp&nbsp&nbsp&nbsp <i style="margin-left:92px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../dutyAdd.php">Member Duty</a></li>
                                <li><a href="../hobDutyAdd.php">Add HOB Duty</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
</aside>