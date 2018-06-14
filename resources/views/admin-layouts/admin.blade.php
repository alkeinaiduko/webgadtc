

@extends('admin-layouts.app')

@section('content')
	<header id="admin-header">
		<div class="admin-header-container">
			<div class="admin-header-content">
				<h3>Admin Page</h3>
				<ul>
					<li>Name</li>
					<li>Picture</li>
				</ul>
			</div>
		</div>
	</header>

	<section id="admin-panel">
		<div class="admin-side-nav-container">
			<div class="admin-side-nav-bars">
				<h2>Admin Side Nav</h2>
			</div>
		</div>

		<div class="admin-main-container">
			<div class="admin-main-content">
				<h2>Admin Main Content</h2>
			</div>
		</div>
	</section>
@endsection
