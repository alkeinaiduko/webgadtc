<header id="admin-header">
	<h3>Admin Page</h3>
	<ul>
		<li>
			@if(Auth::guard('admin')->check())
				{{ Auth::guard('admin')->user()->name}}
			@endif
		</li>
		<li class="profile-pic">
			{{-- <img src="{{asset('images/admin/prof.jpg')}}"> --}}
			<div class="uk-inline">
			    <img src="{{asset('images/admin/prof.jpg')}}">
			    <div uk-dropdown="mode: click"><a href="{{route('admin.logout')}}"><button class="uk-button uk-button-danger">Logout</button></a></div>
			</div>
		</li>
	</ul>
</header>