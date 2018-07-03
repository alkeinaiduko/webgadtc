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
                <a href="/">Home</a>
                <a href="#">About</a>
                <a href="#">Scholarships</a>
                <a href="#">Academic Programs</a>
                <a href="#">Admission</a>
                <a href="#">External Affairs</a>
                <a href="#">Contact</a>
            </nav>
        </div>
    </header>
	<div class="container read-main-container">

      <div class="row">

        <div class="col-sm-8 blog-main">
          <div class="blog-post">
            <h2 class="blog-post-title">{{$bulletin->title}}</h2>

            <h5><strong>Who:</strong> {{$bulletin->who}}</h5>
            <h5><strong>What:</strong> {{$bulletin->what}}</h5>
            <h5><strong>Where:</strong> {{$bulletin->where}}</h5>
            <h5><strong>When:</strong> {{$bulletin->when}}</h5>
            
          </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer>
        <ul>
            <li>&nbsp;</li>
            <li>
                <img src="{{asset('/images/my-logo-white-thick-01.svg')}}">
                <br>
                <span>This website is made with ❤️ by Alkein Villajos</span>
            </li>
            <li>&nbsp;</li>
        </ul>
    </footer>
@endsection