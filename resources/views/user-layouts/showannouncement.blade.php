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

	<div class="blog-header">
      <div class="container">
        
      </div>
    </div>

    <div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
          	<img src="/storage/announcement_images/{{$ann->announcement_image}}" class="view-announcement-cover-image">
            <h2 class="blog-post-title">{{$ann->title}}</h2>
            <p class="blog-post-meta">{{$ann->created_at}}</p>

            <p>{{$ann->description}}</p>
          </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
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
@endsection