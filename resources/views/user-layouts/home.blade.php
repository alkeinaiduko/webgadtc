@extends('user-layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in <strong>User</strong>!
                </div>
            </div>
        </div>
    </div>
</div> --}}



<header id="portal-header">
         @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        <ul class="uk-breadcrumb">
            <li><a href="#">Portal</a></li> 
        </ul>
        <nav class="student-top-nav">
            <button class="uk-button uk-button-default" type="button"><i class="material-icons">mail_outline</i></button>
            <div uk-dropdown="mode: click">
                <ul>
                    <li>Message 1</li>
                    <li>Message 1</li>
                    <li>Message 1</li>
                    <li>Message 1</li>
                </ul>
            </div>
            <a href="#"><i class="material-icons">notification_important</i></a>
        </nav>
    </header>

    <section id="student-main-container">
        <aside class="student-side-nav">
            <div class="logo-container">
                <span>LOGO</span>
            </div>
            
            <div id="student-panel">
                <div class="panel-bg"></div>
                <div class="avatar uk-text-center">
                    <img src="{{asset('/images/user-avatar.png')}}">
                    <h4>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h4>
                </div>
                <ul>
                    <li><i class="material-icons" uk-tooltip="Settings">settings</i></li>
                    <li><i class="material-icons" uk-tooltip="Profile">person</i></li>
                    <li><a href="/users/logout"><i class="material-icons" uk-tooltip="Logout">power_settings_new</i></a></li>
                </ul>
            </div>
            
            <ul class="student-nav-links">
                <a href="/home"><li class="active">Home</li></a>
                <a href="{{route('student.department')}}"><li>My Department <span class="uk-badge" style="float: right;" uk-tooltip="title: Online; pos: right">100</span></li></a>
                <a href="#"><li>Campus Map</li></a>
                <a href="#"><li>Events</li></a>
                <a href="#"><li>Announcements</li></a>
                <a href="#"><li>Bulletins</li></a>
                <a href="#"><li>Library & Downloads</li></a>
                <a href="#"><li>Student Forum</li></a>
            </ul>
        </aside>
        
        <section id="student-portal-container">
            <div class="student-portal-content">
                <h6>Student Profile</h6>
                <hr>
                <ul class="name-info">
                    <li><img class="profile-pic" src="{{asset('/images/user-avatar.png')}}"></li>
                    <li>
                        <div class="student-name">{{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}}</div>
                        <div class="student-id-number">#41924</div>
                        <div class="student-id-number">{{Auth::user()->department}}</div>
                    </li>
                </ul>
                
                <h6>Academic Load (2018 - 2019)</h6>
                <hr>
                <div class="academic-load">
                    <div>Operating Systems</div>
                    <div>Multimedia Systems</div>
                    <div>Algorithm Design and Analysis</div>
                    <div>Discrete Mathematics</div>
                    <div>Data Structures</div>
                    <div>Artificial Intelligence</div>
                    <div>Machine Learning</div>
                    <div>Quantum Computing</div>
                </div>
                
                <h6>Finances</h6>
                <hr>
                <div class="student-finances-container">
                    <ul class="student-finances-header">
                        <li>Tuition Fees</li>
                        <li>Other</li>
                        <li>&nbsp;</li>
                        <li>Current Balance</li>
                        <li>Previous Balance</li>
                    </ul>

                    <ul class="student-finances-details">
                        <li>P15,000</li>
                        <li>P5,000</li>
                        <li>&nbsp;</li>
                        <li>P20,000</li>
                        <li>0</li>
                    </ul>
                </div>
                
                <h6>Campus News</h6>
                <hr>
                
                <ul class="campus-news">
                    <li>
                        <div class="news-cover">
                            <img src="{{asset('/images/article.jpg')}}" width="150px">
                        </div>
                        <div class="news-title">
                            <a href="#">Congratulations 2017 Graduates</a>
                        </div>
                    </li>
                    
                    <li>
                        <div class="news-cover">
                            <img src="{{asset('/images/article.jpg')}}" width="150px">
                        </div>
                        <div class="news-title">
                            <a href="#">Congratulations 2017 Graduates</a>
                        </div>
                    </li>
                    
                    <li>
                        <div class="news-cover">
                            <img src="{{asset('/images/article.jpg')}}" width="150px">
                        </div>
                        <div class="news-title">
                            <a href="#">Congratulations 2017 Graduates</a>
                        </div>
                    </li>
                    
                    <li>
                        <div class="news-cover">
                            <img src="{{asset('/images/article.jpg')}}" width="150px">
                        </div>
                        <div class="news-title">
                            <a href="#">Congratulations 2017 Graduates</a>
                        </div>
                    </li>
                    
                    <li>
                        <div class="news-cover">
                            <img src="{{asset('/images/article.jpg')}}" width="150px">
                        </div>
                        <div class="news-title">
                            <a href="#">Congratulations 2017 Graduates</a>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </section>
@endsection
