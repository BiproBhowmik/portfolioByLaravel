            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{ asset('images/users/av1.jpg') }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Joy <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('logOut') }}"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('adminPage') }}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li>
                                <a href="{{ route('perInfoView') }}" class="waves-effect"><i class="md md-event"></i><span> Personal Info </span></a>
                            </li>

                            <li>
                                <a href="{{ route('prtTitle') }}" class="waves-effect"><i class="md md-event"></i><span> Proffessional Details </span></a>
                            </li>

                            <li>
                                <a href="{{ route('about') }}" class="waves-effect"><i class="md md-event"></i><span> About </span></a>
                            </li>

                            <li>
                                <a href="{{ route('language') }}" class="waves-effect"><i class="md md-event"></i><span> Language </span></a>
                            </li>

                            <li>
                                <a href="{{ route('proffSkills') }}" class="waves-effect"><i class="md md-event"></i><span> Proffessional Skills </span></a>
                            </li>

                            <li>
                                <a href="{{ route('proficSkills') }}" class="waves-effect"><i class="md md-event"></i><span> Proficiency Skills </span></a>
                            </li>

                            <li>
                                <a href="{{ route('perSkills') }}" class="waves-effect"><i class="md md-event"></i><span> Personal Skills </span></a>
                            </li>

                            <li>
                                <a href="{{ route('education') }}" class="waves-effect"><i class="md md-event"></i><span> Education </span></a>
                            </li>

                            <li>
                                <a href="{{ route('experance') }}" class="waves-effect"><i class="md md-event"></i><span> Experience </span></a>
                            </li>

                            <li>
                                <a href="{{ route('gallery') }}" class="waves-effect"><i class="md md-event"></i><span> Gallery </span></a>
                            </li>

                            <li>
                                <a href="{{ route('proLinks') }}" class="waves-effect"><i class="md md-event"></i><span> Profile Linkes </span></a>
                            </li>

                            
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 