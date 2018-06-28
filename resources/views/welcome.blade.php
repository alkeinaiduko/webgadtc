@extends('user-layouts.app')

@section('content')
    <div class="border">
        <div class="b-links-container">
            <ul class="b-links">
                <li>Faculty</li>
                <li>Staff</li>
                <li>Gallery</li>
                <li>Students</li>
                <li>Alumni</li>
            </ul>
        </div>
    </div>



    <header id="site-header">
        <div class="wrapper">
            <div class="site-logo">
                <h3>Gov. Alfonso D. Tan College</h3>
            </div>
            <nav>
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Scholarships</a>
                <a href="#">Academic Programs</a>
                <a href="#">Admission</a>
                <a href="#">External Affairs</a>
                <a href="#">Contact</a>
            </nav>
        </div>
    </header>



    <section id="showcase">
        <div class="showcase-container">
            <div class="showcase-content">
                <span>Gov. Alfonso D. Tan College</span>
                <p>Your Access To Success!</p>
                <button class="uk-button uk-button-primary">Learn More</button>
            </div>
        </div>
    </section>

    <div class="wrapper">
        <div class="uk-child-width-expand@m site-contents" uk-grid>
            <div>
                <div>
                    <div class="announcement-container">
                        <div class="announcement-header">
                            <i class="material-icons">bookmark</i>
                            <span>General Announcements</span>
                        </div>
                        <div class="announcement-posted">
                            {{-- GET 3 LATEST ANNOUNCEMENT --}}

                            @foreach($announcements as $announcement)
                            <div class="post-container">
                                <div class="block">
                                    <img src="images/img-post.jpg" alt="">
                                    <div>
                                        <div class="post-title"><a href="#">{{$announcement->title}}</a> <span class="post-date">On {{$announcement->created_at->format('F d, Y')}}</span></div>
                                        <p>{{$announcement->description}}</p>
                                        <a href="#" class="readmore">Read more</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <!--- CENTER GRID  -->
            <div>
                <div id="center-panel">
                    <div class="school-dept ">
                        <h3 class="uk-text-center">Departments</h3>
                        <div class="uk-position-relative uk-visible-toggle uk-light" uk-slider>

                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                                <li>
                                    <img src="images/departments/trojans.jpg" alt="">
                                    <div class="uk-position-center uk-panel">
                                        <h1></h1>
                                    </div>
                                </li>
                                <li>
                                    <img src="images/departments/athenians.jpg" alt="">
                                    <div class="uk-position-center uk-panel">
                                        <h1></h1>
                                    </div>
                                </li>
                                <li>
                                    <img src="images/departments/amazons.jpg" alt="">
                                    <div class="uk-position-center uk-panel">
                                        <h1></h1>
                                    </div>
                                </li>
                                <li>
                                    <img src="images/departments/wizards.jpg" alt="">
                                    <div class="uk-position-center uk-panel">
                                        <h1></h1>
                                    </div>
                                </li>
                                <li>
                                    <img src="images/departments/praetorians.jpg" alt="">
                                    <div class="uk-position-center uk-panel">
                                        <h1></h1>
                                    </div>
                                </li>
                                <li>
                                    <img src="images/departments/knights.jpg" alt="">
                                    <div class="uk-position-center uk-panel">
                                        <h1></h1>
                                    </div>
                                </li>
                            </ul>

                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

                        </div>
                    </div>

                    <div class="login-panel">
                        <div class="login-container">
                            <h3>Student Login</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="uk-margin">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon" :uk-icon="'icon: user'"></span>
                                        <input id="email" type="text" class="uk-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Username">
                                    </div>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon" :uk-icon="'icon: lock'"></span>
                                        <input id="password" type="password" class="uk-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                                    </div>
                                    <br>

                                    @if ($errors->has('password'))
                                        <strong>{{ $errors->first('password') }}</strong>
                                    @endif
                                </div>
                                <label><input class="uk-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}</label><br>
                                <button class="uk-button uk-button-primary btn-login">Login</button>
                            </form>
                        </div>
                    </div>
                    <div class="uk-alert-success" uk-alert>
                        <p>Don't have an account? You may ask your account at the Student Affairs Office.</p>
                    </div>
                </div>
            </div>

            <div>
                <div id="right-panel">
                    <div class="school-ad">
                        <img src="images/school-ad.jpg">
                    </div>

                    <div id="bulletin">
                        <div class="bulletin-container">
                            <h3>Bulletin</h3>
                            <ul class="bulletin-post-list">
                                @foreach($bulletins as $bulletin)
                                    <li class="slide-right-bg"><a href="#">{{$bulletin->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="uk-alert-warning" uk-alert>
                        <p>Make sure to read the bulletin before doing anything else.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <hr class="uk-divider-icon">
    </div>

    <!-- MISSON & VISION -->

    <div class="wrapper mission-vision-panel">
        <div class="uk-child-width-expand@s uk-text-center" uk-grid>
            <div>
                <div id="vision-panel">
                    <div class="vision-content">
                        <h2>Vision</h2>
                        <p>GADTC is the leading institution in Northwestern Mindanao providing affordable quality education for all through a research-based instruction imbued with the values of integrity, competence, commitment, compassion and excellence as agents of transformation for the service of God and the community.</p>
                    </div>
                </div>
            </div>
            <div>
                <div id="mission-panel">
                    <div class="mission-content">
                        <h2>Mission</h2>
                        <ul>
                            <li>To provide and facilitate opportunities for continuing education to further improve the teaching skills and knowledge of the faculty and staff to strengthen the quality of instruction and services.</li>
                            <li>To provide necessary facilities to intensify the teaching and learning experiences of all stakeholders.</li>
                            <li>To create an environment conducive to the emergence of a research culture in the College.</li>
                            <li>To take concrete steps to ensure the delivery of transformative education.</li>
                            <li>To produce holistically developed individuals able to respond to the challenges of life.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END OF MISSION & VISION -->

    <div class="wrapper">
        <hr class="uk-divider-icon">
    </div>


    <!--- EVENTS SECTION -->
    <div class="events-container-title uk-text-center">
        <h2>Events</h2>
    </div>
    <div class="uk-child-width-expand@m" uk-grid>
        <div id="events-container">
            <div>
                <div uk-slider="center: true">

                    <div class="uk-position-relative uk-visible-toggle uk-light">

                        <ul class="uk-slider-items uk-child-width-1-2@s uk-grid">
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img src="images/event-1.jpg" alt="">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Headline</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img src="images/events.jpg" alt="">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Headline</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img src="images/events.jpg" alt="">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Headline</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img src="images/events.jpg" alt="">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Headline</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img src="images/events.jpg" alt="">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Headline</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

                    </div>

                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

                </div>
            </div>
        </div>
    </div>

    <footer>
        <ul>
            <li>&nbsp;</li>
            <li>
                <img src="images/my-logo-white-thick-01.svg">
                <br>
                <span>This website is made with ❤️ by Alkein Villajos</span>
            </li>
            <li>&nbsp;</li>
        </ul>
    </footer>
@endsection