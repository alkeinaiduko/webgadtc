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
					<li><i class="material-icons">dashboard</i><a href="#">Dashboard</a></li>
					<li id="add-new"><i class="material-icons">create</i>Add New</li>
					<div class="add-new-component is-open">
						<ul>
							<li><i class="material-icons">add</i><a href="{{route('announcement.page')}}">Announcement</a></li>
							<li><i class="material-icons">add</i><a href="{{route('bulletin.page')}}">Bulletin</a></li>
							<li class="active"><i class="material-icons">perm_identity</i><a href="{{route('user.page')}}">User</a></li>
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
					<h3>Add Student</h3>
					<form>
						<h4>Login Details</h4>
						<div class="uk-grid-small" uk-grid>
							<div class="uk-width-1-3">
								<input class="uk-input" type="text" placeholder="Username">
							</div>
							<div class="uk-width-1-3">
								<input class="uk-input" type="text" placeholder="Password">
							</div>
						</div>
						<h4>Student's Information</h4>
						<div class="uk-grid-small" uk-grid>
							<div class="uk-width-1-3">
								<input class="uk-input" type="text" placeholder="First Name">
							</div>
							<div class="uk-width-1-3">
								<input class="uk-input" type="text" placeholder="Middle Name">
							</div>
							<div class="uk-width-1-3">
								<input class="uk-input" type="text" placeholder="Last Name">
							</div>
							<div class="uk-width-1-3">
								<input class="uk-input" type="text" placeholder="Date of Birth">
							</div>
							<div class="uk-width-1-3">
								<input class="uk-input" type="text" placeholder="Sex">
							</div>
							<div class="uk-width-1-3">
								<input class="uk-input" type="text" placeholder="Address">
							</div>
							<div class="uk-width-1-3">
								<div class="uk-form-controls">
									<select class="uk-select" id="form-stacked-select">
										<option>Select Department</option>
										<option>Department of Computer Studies</option>
										<option>Department of Teachers Education</option>
										<option>Department of Arts and Sciences</option>
										<option>Department of Criminology</option>
										<option>Department of Midwifery</option>
										<option>Department of Business</option>
										<option>Department of Office Administration</option>
									</select>
								</div>
							</div>

							<div class="uk-width-1-2"></div>

								<datepicker placeholder="Select Date"></datepicker>

							<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
								<label><button class="uk-button uk-button-primary">Post to Bulletin</button></label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>


@endsection