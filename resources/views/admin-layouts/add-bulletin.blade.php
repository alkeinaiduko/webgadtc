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
					<li><i class="material-icons">dashboard</i><a href="/">Dashboard</a></li>
					<li id="add-new"><i class="material-icons">create</i>Add New</li>
					<div class="add-new-component is-open">
						<ul>
							<li><i class="material-icons">add</i><a href="{{route('announcement.page')}}">Announcement</a></li>
							<li class="active"><i class="material-icons">add</i><a href="{{route('bulletin.page')}}">Bulletin</a></li>
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
					<form method="POST" action="{{route('post.bulletin')}}">
						@csrf
						<fieldset class="uk-fieldset">
							<legend class="uk-legend">Add New Bulletin</legend>

							<div id="form-holder">

								<div class="uk-grid-small uk-child-width-expand@s" uk-grid>
							    <div>
							        <input class="uk-input" type="text" placeholder="Title" name="title" value="{{old('title')}}">
							    </div>
							    <div>
							        
							    </div>
								</div>

								<div class="uk-grid-small uk-child-width-expand@s" uk-grid>
							    <div>
							        <input class="uk-input" type="text" placeholder="Who" name="who" value="{{old('who')}}">
							    </div>
							    <div>
							        <input class="uk-input" type="text" placeholder="What" name="what" value="{{old('what')}}">
							    </div>
								</div>

							<div class="uk-grid-small uk-child-width-expand@s" uk-grid>
							    <div>
							        <input class="uk-input" type="text" placeholder="Where" name="where" value="{{old('where')}}">
							    </div>
							    <div>
							        <date-component></date-component>
							    </div>
							</div>
								
							</div>

							<div class="uk-margin">
								<textarea class="uk-textarea" name="description" rows="5" placeholder="Description (Optional)"></textarea>
							</div>



							<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
								<label><button class="uk-button uk-button-primary">Post to Bulletin</button></label>
							</div>

						</fieldset>

						@include('admin-layouts.partials.messages')
					</form>
				</div>
			</div>
		</section>
	</div>
@endsection