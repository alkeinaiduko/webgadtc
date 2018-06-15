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
							<a href="{{route('announcement.page')}}"><li><i class="material-icons">add</i>Announcement</li></a>
							<a href="{{route('bulletin.page')}}"><li><i class="material-icons">add</i>Bulletin</li></a>
							<a href="{{route('user.page')}}"><li class="active"><i class="material-icons">perm_identity</i>User</li></a>
						</ul>
					</div>
					<a href="#"><li><i class="material-icons">web_asset</i>Announcements</li></a>
					<a href="#"><li><i class="material-icons">list</i>Bulletin</li></a>
				</ul>
			</div>
		</section>

		<section id="main-content">
			<div class="admin-main-content-container">
				<div class="admin-main-content">
					<h3>Add New Student</h3>
					<form method="POST" action="{{route('add.student')}}">
						@csrf
						<div class="uk-margin">
							<h5>Login Details</h5>
							<div class="uk-grid-small" uk-grid>
								<div class="uk-width-1-3">
									<input class="uk-input" type="text" name="username" placeholder="Username" required>
								</div>
								<div class="uk-width-1-3">
									<input class="uk-input" type="password" name="password" placeholder="Password" required>
								</div>
							</div>
						</div>
						<div class="uk-margin">
							<h5>Student's Information</h5>
							<div class="uk-grid-small" uk-grid>
								<div class="uk-width-1-3">
									<input class="uk-input" type="text" name="firstname" placeholder="First Name" required>
								</div>
								<div class="uk-width-1-3">
									<input class="uk-input" type="text" name="middlename" placeholder="Middle Name" required>
								</div>
								<div class="uk-width-1-3">
									<input class="uk-input" type="text" name="lastname" placeholder="Last Name" required>
								</div>
								<div class="uk-width-1-3">
									<birthdate-component></birthdate-component>
								</div>
								<div class="uk-width-1-3">
									<input class="uk-input" type="text" name="sex" placeholder="Sex" required>
								</div>
								<div class="uk-width-1-3">
									<input class="uk-input" type="text" name="address" placeholder="Address" required>
								</div>
								<div class="uk-width-1-3">
									<div class="uk-form-controls">
										<select class="uk-select" id="form-stacked-select" name="department">
											<option>Select Department</option>
											@foreach($depts as $dept)
												<option>{{$dept->dept_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="uk-width-1-2"></div>
								</div>
								<div class="uk-width-1-2"></div>
								<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
									<label><button class="uk-button uk-button-primary">ADD NEW USER</button></label>
								</div>
							</div>
						</div>
					</form>

					@include('admin-layouts.partials.messages')
				</div>
			</div>
		</section>
	</div>


@endsection