@extends('admin-layouts.app')

@section('content')
	@include('admin-layouts.partials.admin-header')
	<div id="admin-holder">
		<section id="admin-side-nav">
			<div class="side-navbars">
				<ul>
					<a href="{{route('admin.dashboard')}}"><li><i class="material-icons">dashboard</i>Dashboard</li></a>
					<li id="add-new"><i class="material-icons">create</i>Add New</li>
					<div class="add-new-component is-open">
						<ul>
							<a href="{{route('announcement.page')}}"><li class="active"><i class="material-icons">add</i>Announcement</li></a>
							<a href="{{route('bulletin.page')}}"><li><i class="material-icons">add</i>Bulletin</li></a>
							<a href="{{route('user.page')}}"><li><i class="material-icons">perm_identity</i>User</li></a>
						</ul>
					</div>
					<a href="{{route('show.announcements')}}"><li><i class="material-icons">web_asset</i>Announcements</li></a>
					<a href="{{route('show.bulletins')}}"><li><i class="material-icons">list</i>Bulletin</li></a>
				</ul>
			</div>
		</section>

		<section id="main-content">
			<div class="admin-main-content-container">
				<div class="admin-main-content">
					<form method="POST" action="{{route('post.announcement')}}" enctype="multipart/form-data">
						@csrf
						<fieldset class="uk-fieldset">

							<legend class="uk-legend">Add New Announcement</legend>

							<div class="uk-margin announcement-title">
								<input class="uk-input" type="text" placeholder="Announcement Title" name="title" value="{{old('title')}}">
							</div>

							<div class="uk-margin">
								<textarea class="uk-textarea" rows="5" placeholder="Announcement description" name="description" value="{{old('description')}}"></textarea>
							</div>

							<div class="uk-margin" uk-margin>
						        <div uk-form-custom="target: true">
						            <input type="file" name="announcement_image" @change="onFileChange">
						            <input class="uk-input uk-form-width-medium" type="text" placeholder="Announcement Cover" disabled>
						            <div id="preview">
									<img v-if="url" :src="url" />
								</div>
						        </div>

						    </div>

							<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
								<label><button class="uk-button uk-button-primary">Post Announcement</button></label>
							</div>
						</fieldset>
					</form>
					@include('admin-layouts.partials.messages')
				</div>
			</div>
		</section>
	</div>
	
@endsection