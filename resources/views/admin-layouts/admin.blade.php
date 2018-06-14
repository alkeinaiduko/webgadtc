

@extends('admin-layouts.app')

@section('content')
	<header id="admin-header">
		<h3>Admin Page</h3>
		<ul>
			<li>Alkein Villajos</li>
			<li class="profile-pic">
				<img src="images/admin/prof.jpg">
			</li>
		</ul>
	</header>
	<div id="admin-holder">
		<section id="admin-side-nav">
			<div class="side-navbars">
				<ul>
					<li class="active"><i class="material-icons">dashboard</i><a href="#">Dashboard</a></li>
					<li id="add-new"><i class="material-icons">create</i>Add New</li>
					<div class="add-new-component is-close">
						<ul>
							<li><i class="material-icons">add</i><a href="{{route('announcement.page')}}">Announcement</a></li>
							<li><i class="material-icons">add</i><a href="#">Bulletin</a></li>
							<li><i class="material-icons">perm_identity</i><a href="#">User</a></li>
						</ul>
					</div>
					<li><i class="material-icons">web_asset</i><a href="#">Announcements</a></li>
					<li><i class="material-icons">list</i><a href="#">Bulletin</a></li>
				</ul>
			</div>
		</section>

		<section id="main-content">
			<div class="admin-main-content-container">
				<div class="admin-main-content">
					<h1>DASHBOARD</h1>
					<h1>DASHBOARD</h1>
				</div>
			</div>
		</section>
	</div>
@endsection
