@extends('admin-layouts.app')

@section('content')
	<header id="admin-header">
		<h3>Admin Page</h3>
		<ul>
			<li>Alkein Villajos</li>
			<li class="profile-pic">
				<img src="{{asset('/images/admin/prof.jpg')}}">
			</li>
		</ul>
	</header>
	<div id="admin-holder">
		<section id="admin-side-nav">
			<div class="side-navbars">
				<ul>
					<li><i class="material-icons">dashboard</i><a href="#">Dashboard</a></li>
					<li id="add-new"><i class="material-icons">create</i>Add New</li>
					<div class="add-new-component is-open">
						<ul>
							<li class="active"><i class="material-icons">add</i><a href="{{route('announcement.page')}}">Announcement</a></li>
							<li><i class="material-icons">add</i><a href="{{route('bulletin.page')}}">Bulletin</a></li>
							<li><i class="material-icons">perm_identity</i><a href="{{route('user.page')}}">User</a></li>
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
					<form method="POST" action="{{route('post.announcement')}}">
						@csrf
						<fieldset class="uk-fieldset">

							<legend class="uk-legend">Add New Announcement</legend>

							<div class="uk-margin announcement-title">
								<input class="uk-input" type="text" placeholder="Announcement Title" name="title" value="{{old('title')}}">
							</div>

							<div class="uk-margin">
								<textarea class="uk-textarea" rows="5" placeholder="Announcement description" name="description" value="{{old('title')}}"></textarea>
							</div>

							<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
								<label><button class="uk-button uk-button-primary">Post</button></label>
							</div>
						</fieldset>
					</form>
					@include('admin-layouts.partials.messages')
				</div>
			</div>
		</section>
	</div>
@endsection