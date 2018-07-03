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
        	<img src="/storage/announcement_images/{{$announcement->announcement_image}}">
          <div class="blog-post">
            <h2 class="blog-post-title">{{$announcement->title}}</h2>
            <p class="blog-post-meta">{{$announcement->created_at->format('F d, Y')}} by <a href="#">Admin</a></p>

            <p>{{$announcement->description}}</p>
            
          </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module">
            <h4>Latest Announcement</h4>
            <ol class="list-unstyled">
            	@foreach($announcements as $ann)
	              <li><a href="/view-announcement/{{$ann->id}}">{{$ann->title}}</a></li>
              @endforeach
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer>
        <div class="footer text-center">
            <img src="{{asset('/images/my-logo-white-thick-01.svg')}}">
            <br>
            <span>This website is made with ❤️ by Alkein Villajos</span>
        </div>
    </footer>
@endsection