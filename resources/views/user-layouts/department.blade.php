@extends('user-layouts.app')


@section('content')
	<header id="portal-header">
		
		<ul class="uk-breadcrumb">
			<li><a href="#">Portal</a></li> 
			<li><a href="#">My Department</a></li> 
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
				<a href="/home"><li>Home</li></a>
				<a href="{{route('student.department')}}"><li class="active">My Department <span class="uk-badge" style="float: right;" uk-tooltip="title: Online; pos: right">100</span></li></a>
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
				<department-chat></department-chat>
			</div>
		</section>
	</section>
@endsection