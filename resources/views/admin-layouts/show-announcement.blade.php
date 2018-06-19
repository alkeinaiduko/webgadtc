@extends('admin-layouts.app')

@section('content')
	@include('admin-layouts.partials.admin-header')
	<div id="admin-holder">
		<section id="admin-side-nav">
			<div class="side-navbars">
				<ul>
					<li><i class="material-icons">dashboard</i><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
					<li id="add-new"><i class="material-icons">create</i>Add New</li>
					<div class="add-new-component is-open">
						<ul>
							<a href="{{route('announcement.page')}}"><li><i class="material-icons">add</i>Announcement</li></a>
							<a href="{{route('bulletin.page')}}"><li><i class="material-icons">add</i>Bulletin</li></a>
							<a href="{{route('user.page')}}"><li><i class="material-icons">perm_identity</i>User</li></a>
						</ul>
					</div>
					<a href="{{route('get.announcements')}}"><li class="active"><i class="material-icons">web_asset</i>Announcements</li></a>
					<li><i class="material-icons">list</i><a href="#">Bulletin</a></li>
				</ul>
			</div>
		</section>

		<section id="main-content">
			<div class="admin-main-content-container">
				<div class="admin-main-content">
					<table id="announcement-table" class="table table-striped">
						<thead>
							<th>Title</th>
							<th>Description</th>
							<th>Action</th>
						</thead>

						@foreach($announcements as $announcement)
							<tr>
								<td>{{$announcement->title}}</td>
								<td>
									{{substr($announcement->description, 0, 200)}}
									{{strlen($announcement->description) > 200 ? "..." : ""}}
								</td>
								<td>
									<button class="btn btn-warning"><i class="fa fa-eye"></i>View</button>
									<button class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
									<button class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</section>
	</div>
@endsection