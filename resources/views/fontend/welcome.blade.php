@extends('layouts/master')

@section('content')
<!-- Begin page -->
<div id="wrapper">

    @php
    use App\Models\PersonalInfo;
    use App\Models\ProfessionalTitle;
    use App\Models\About;
    use App\Models\Languese;
    use App\Models\ProffessionalSkills;
    use App\Models\ProficiencySkills;
    use App\Models\PersonalSkills;
    use App\Models\Education;
    use App\Models\Experience;
    use App\Models\Gallery;
    use App\Models\ProfileLinkes;

    $perInfo = PersonalInfo::select('*')->first();
    $prtTitle = ProfessionalTitle::select('*')->first();
    $about = About::select('*')->first();
    $lang = Languese::select('*')->get();
    $profSkill = ProffessionalSkills::select('*')->get();
    $proficSkill = ProficiencySkills::select('*')->get();
    $perSkill = PersonalSkills::select('*')->get();
    $education = Education::select('*')->get();
    $experiences = Experience::select('*')->get();
    $gallery = Gallery::select('*')->get();
    $prLinks = ProfileLinkes::select('*')->get();
    @endphp

    <?php
    $progressBarCoulour=array("progress-bar-success","progress-bar-primary","progress-bar-danger", "progress-bar-purple", "progress-bar-warning", "progress-bar-secondary");

    ?>

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="{{ route('portfolio') }}" class="logo"> <span>Portfolio </span></a>
            </div>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="container navbar navbar-default" role="navigation">


            <ul class="nav navbar-nav navbar-right pull-right">
                <li class="dropdown hidden-xs">
                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-paper-plane-o"></i> <span class="badge badge-xs badge-danger">4</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg">
                        <li class="text-center notifi-title">Profile Linkes</li>
                        <li class="list-group">
                         <!-- list item-->
                         <a href="https://www.facebook.com/biprojoy/" target="_blank" class="list-group-item">
                          <div class="media">
                           <div class="pull-left">
                            <em class="fa fa-facebook-square fa-2x text-info"></em>
                        </div>
                        <div class="media-body clearfix">
                            <div class="media-heading">Facebook</div>
                            <p class="m-0">
                             <small>Please knock me for any query</small>
                         </p>
                     </div>
                 </div>
             </a>
             <!-- list item-->
             <a href="https://github.com/BiproBhowmik/" target="_blank" class="list-group-item">
              <div class="media">
               <div class="pull-left">
                <em class="fa fa-github-square fa-2x text-primary"></em>
            </div>
            <div class="media-body clearfix">
                <div class="media-heading">Github</div>
                <p class="m-0">
                 <small>All Project Will Be Uploaded Here</small>
             </p>
         </div>
     </div>
 </a>
 <!-- list item-->
 <a href="https://www.stopstalk.com/user/profile/Bipro_Bhowmik/" target="_blank" class="list-group-item">
  <div class="media">
   <div class="pull-left">
    <em class="fa fa-angellist fa-2x text-danger"></em>
</div>
<div class="media-body clearfix">
    <div class="media-heading">StopStack</div>
    <p class="m-0">
     <small>ACM Problem Solving Reports</small>
 </p>
</div>
</a>
<!-- list item-->
<a href="https://www.linkedin.com/in/bipro-bhowmik-023304209/" target="_blank" class="list-group-item">
  <div class="media">
   <div class="pull-left">
    <em class="fa fa-bell-o fa-2x text-primary"></em>
</div>
<div class="media-body clearfix">
    <div class="media-heading">LinkedIn</div>
    <p class="m-0">
     <small>LinkedIn Profile</small>
 </p>
</div>
</div>
</a>

</li>
</ul>
<li class="hidden-xs">
    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
</li>
</ul>

</div>
</div>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->

<div class="side-menu">

</div>
<!-- Left Sidebar End --> 



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
<div class="content-page">
    <!-- Start content -->
    <div class="content">



        <div class="wraper container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bg-picture text-center" style="background-image:url('{{ Storage::url($prtTitle->prtCovPic) }}')">
                        <div class="bg-picture-overlay"></div>
                        <div class="profile-info-name">
                            <img src="{{ Storage::url($prtTitle->prtProPic) }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                            <h4 class="text-white">{{ $prtTitle->prtName }}</h4>
                            <h2 class="text-white">{{ $prtTitle->prtTitle }}</h2>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>
            </div>
            <div class="row user-tabs">
                <div class="col-lg-6 col-md-9 col-sm-9">
                    <ul class="nav nav-tabs tabs">
                        <li class="active tab">
                            <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active"> 
                                <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                <span class="hidden-xs">About Me</span> 
                            </a> 
                        </li> 
                        <li class="tab"> 
                            <a href="#profile-2" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-graduation-cap"></i></span> 
                                <span class="hidden-xs">Education</span> 
                            </a> 
                        </li>
                        <li class="tab"> 
                            <a href="#profile-3" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-gears (alias)"></i></span> 
                                <span class="hidden-xs">Experience</span> 
                            </a> 
                        </li>

                        <li class="tab"> 
                            <a href="#profile-4" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-file-photo-o (alias)"></i></span> 
                                <span class="hidden-xs">Gallery</span> 
                            </a> 
                        </li>

                        
                        
                        <div class="indicator"></div></ul> 
                    </div>
                    <div class="col-lg-6 col-md-3 col-sm-3 hidden-xs">
                        <div class="pull-right">
                            <div class="dropdown">
                                <a class="dropdown-toggle btn-rounded btn btn-primary waves-effect waves-light" href="javascript:void(0);"> BBJ </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12"> 

                        <div class="tab-content profile-tab-content"> 
                            <div class="tab-pane active" id="home-2"> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Personal Information</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p">
                                                    <strong>Full Name</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $perInfo->fullName }}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Mobile</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $perInfo->mobile }}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $perInfo->email }}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Location</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $perInfo->location }}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Date Of Birth</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $perInfo->dob }}</p>
                                                </div>
                                                
                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->

                                        <!-- Languages -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Languages</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <ul>
                                                    @foreach ($lang as $item)
                                                    <li>{{ $item->lanName }}</li>
                                                    @endforeach
                                                </ul>
                                            </div> 
                                        </div>
                                        <!-- Languages -->

                                        <!-- Profile Linkes -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Profile Linkes</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <ul>
                                                    @foreach ($prLinks as $item)
                                                    <li> <a target="_blank" href="{{ $item->prlLink }}"> {{ $item->prlTitle }} </a> </li>
                                                    @endforeach
                                                </ul>
                                            </div> 
                                        </div>
                                        <!-- Profile Linkes -->

                                        

                                    </div>


                                    <div class="col-md-8">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">About Me</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                {!! $about->abtText !!}
                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->

                                        <div class="panel panel-default panel-fill">

                                            {{-- <div class="panel-heading"> 
                                                <h3 class="panel-title">Professional Skills</h3> 
                                            </div>  --}}
                                            <ul class="nav nav-tabs tabs">
                                                <li class="active tab">
                                                    <a href="#professional-skills" data-toggle="tab" aria-expanded="false" class="active"> 
                                                        <span class="visible-xs"><i class="fa fa-user-secret"></i></span> 
                                                        <span class="hidden-xs">Professional Skills</span> 
                                                    </a> 
                                                </li> 
                                                <li class="tab"> 
                                                    <a href="#proficiency-skills" data-toggle="tab" aria-expanded="false"> 
                                                        <span class="visible-xs"><i class="fa  fa-paint-brush"></i></span> 
                                                        <span class="hidden-xs">Proficiency Skills</span> 
                                                    </a> 
                                                </li> 
                                                <li class="tab"> 
                                                    <a href="#personal-skills" data-toggle="tab" aria-expanded="true"> 
                                                        <span class="visible-xs"><i class="fa fa-street-view"></i></span> 
                                                        <span class="hidden-xs">Personal Skills</span> 
                                                    </a> 
                                                </li> 
                                                <div class="indicator"></div></ul>
                                                <div class="panel-body" id="professional-skills"> 

                                                    @foreach ($profSkill as $item)
                                                    <div class="m-b-15">
                                                        <h5>{{ $item->profSName }}<span class="pull-right">{{ $item->profSper }}%</span></h5>
                                                        <div class="progress">
                                                            <div class="progress-bar {{ $progressBarCoulour[array_rand($progressBarCoulour,1)] }} wow animated progress-animated" role="progressbar" aria-valuenow="{{ $item->profSper }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $item->profSper }}%;">
                                                                <span class="sr-only">{{ $item->profSper }}% Complete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="panel-body" id="proficiency-skills"> 
                                                    @foreach ($proficSkill as $item)
                                                    <div class="m-b-15">
                                                        <h5>{{ $item->proficSName }}<span class="pull-right">{{ $item->proficSper }}%</span></h5>
                                                        <div class="progress">
                                                            <div class="progress-bar {{ $progressBarCoulour[array_rand($progressBarCoulour,1)] }} wow animated progress-animated" role="progressbar" aria-valuenow="{{ $item->proficSper }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $item->proficSper }}%;">
                                                                <span class="sr-only">{{ $item->proficSper }}% Complete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="panel-body" id="personal-skills"> 
                                                    @foreach ($perSkill as $item)
                                                    <div class="m-b-15">
                                                        <h5> {{ $item->perSName }} <span class="pull-right">{{ $item->perSper }}%</span></h5>
                                                        <div class="progress">
                                                            <div class="progress-bar {{ $progressBarCoulour[array_rand($progressBarCoulour,1)] }} wow animated progress-animated" role="progressbar" aria-valuenow="{{ $item->perSper }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $item->perSper }}%;">
                                                                <span class="sr-only">{{ $item->perSper }}% Complete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                

                                            </div>

                                        </div>

                                    </div>
                                </div> 


                                <div class="tab-pane" id="profile-2">

                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">

                                        <div class="panel-body container"> 
                                            <div class="timeline-2 container">
                                                @foreach ($education as $element)
                                                <div class="time-item container">
                                                    <div class="item-info">
                                                        <h4><strong>{{ $element->eduTitle }}</strong></h4>
                                                        <h5 class="text-muted" >Background: <strong>{{ $element->eduBacg }}</strong></h5>
                                                        <h5 class="text-muted" >GPA: <strong>{{ $element->eduGpa }}</strong></h5>
                                                        <h5 class="text-muted" >Institute: <strong>{{ $element->eduInsti }}</strong></h5>
                                                        <h5 class="text-muted" >Starting Date: <strong>{{ $element->eduStartingDate }}</strong></h5>
                                                        <h5 class="text-muted" >Ending Date: <strong>{{ $element->eduEndingDate }}</strong></h5>
                                                    </div>
                                                </div>

                                                @endforeach
                                                
                                            </div>

                                        </div> 
                                    </div>
                                    <!-- Personal-Information -->
                                </div> 

                                <div class="tab-pane" id="profile-3">

                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">

                                        <div class="panel-body container"> 
                                            <div class="timeline-2 container">
                                                @foreach ($experiences as $element)
                                                <div class="time-item container">
                                                    <div class="item-info">
                                                        <h4>Post: <strong>{{ $element->expPost }}</strong></h4>
                                                        <h5 class="text-muted" >Position: <strong>{{ $element->expPosition }}</strong></h5>
                                                        <h5 class="text-muted" >Company Name: <strong>{{ $element->expCopN }}</strong></h5>
                                                        <h5 class="text-muted" >Starting Date: <strong>{{ $element->expStartingDate }}</strong></h5>
                                                        <h5 class="text-muted" >Ending Date: <strong>{{ $element->expEndingDate }}</strong></h5>
                                                    </div>
                                                </div>

                                                @endforeach
                                                
                                            </div>

                                        </div> 
                                    </div>
                                    <!-- Personal-Information -->
                                </div>

                                <div class="tab-pane" id="profile-4">

                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill container">

                                        <div class="panel-body container"> 
                                            <div class="timeline-2 container">
                                                @foreach ($gallery as $element)
                                                {{-- <img src="{{ Storage::url($element->galPho) }}" alt=""> --}}

                                                <div class="col-sm-6 col-lg-3 col-md-4">
                                                    <div class="gal-detail thumb">
                                                        <a href="{{ Storage::url($element->galPho) }}" class="image-popup" title="{{ $element->galTitle }}" width="100%">
                                                            <img src="{{ Storage::url($element->galPho) }}" class="thumb-img" alt="work-thumbnail" width="100px" height="200px">
                                                        </a>
                                                        <h4>{{ $element->galTitle }}</h4>
                                                    </div>
                                                </div>


                                                @endforeach
                                                
                                            </div>

                                        </div> 
                                    </div>
                                    <!-- Personal-Information -->
                                </div>

                                
                                
                            </div> 
                        </div>
                    </div>
                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer text-right">
                © Bipro Bhowmik (Since 2021)
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


        <!-- /Right-bar -->


    </div>
    <!-- END wrapper -->
    
    @endsection
