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
                            <a href="../DashBoard/RowDataAdmin.php" class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Dashboard </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu">Officer<i style="margin-left:100px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../professions.php">Profession</a></li>
                                <li><a href="../placementc.php">Placement Category</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Subject <i style="margin-left:90px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../scategory.php">Subject Category</a></li>
                                <li><a href="../substreams.php">Subject Stream</a></li>
                                <li><a href="../subject.php">Subject</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active waves-effect" href="../languageAdd.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Languages </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="../maritaldAdd.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Marital Status </span></a>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Class &nbsp <i style="margin-left:92px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../class.php">Add Class</a></li>
                                <li><a href="../classLetter.php">Class Letter</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp<span class="hide-menu"> School<i style="margin-left:92px;"  class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../Tvaccation.php">Vaccation</a></li>
                                <li><a href="../Grade.php">Grade</a></li>
                                <li><a href="../province.php">Province</a></li>
                                <li><a href="../zone.php">Zone</a></li>
                                <li><a href="../district.php">District</a></li>
                                <li><a href="../division.php">Division</a></li>
                                <li><a href="dutyProfession.php">Exam Profession</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active waves-effect" href="../yearSet.php" aria-expanded="false"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp&nbsp <span class="hide-menu"> Year </span></a>
                        </li>
                    </ul>
                </nav>
            </div>
</aside>