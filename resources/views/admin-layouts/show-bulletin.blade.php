@extends('admin-layouts.appnav')

@section('content')
	@include('admin-layouts.partials.admin-header')
	<div id="admin-holder">
		<section id="admin-side-nav">
			<div class="side-navbars">
				<ul>
					<a href="{{route('admin.dashboard')}}"><li><i class="material-icons">dashboard</i>Dashboard</li></a>
					<li id="add-new"><i class="material-icons">create</i>Add New</li>
					<div class="add-new-component">
						<ul>
							<a href="{{route('announcement.page')}}"><li><i class="material-icons">add</i>Announcement</li></a>
							<a href="{{route('bulletin.page')}}"><li><i class="material-icons">add</i>Bulletin</li></a>
							<a href="{{route('user.page')}}"><li><i class="material-icons">perm_identity</i>User</li></a>
						</ul>
					</div>
					<a href="{{route('show.announcements')}}"><li><i class="material-icons">web_asset</i>Announcements</li></a>
					<a href="{{route('show.bulletins')}}"><li class="active"><i class="material-icons">list</i>Bulletin</li></a>
				</ul>
			</div>
		</section>

		<section id="main-content">
			<div class="admin-main-content-container">
				<div class="admin-main-content">					
					<bulletin-component></bulletin-component>
				</div>
			</div>
		</section>
	</div>
@endsection

