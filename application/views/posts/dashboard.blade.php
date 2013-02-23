<html>
<head>
	<title>Dashboard</title>
	{{ Asset::container('bootstrapper')->styles(); }}
	{{ Asset::container('bootstrapper')->scripts(); }}
	<style>
	#main { margin:0 auto; float:none;}
	</style>
</head>
<body>
	<div class="row">
		<div id="main" class="span8">
			@if (	Auth::guest() )
		{{ HTML::link('admin', 'login') }}
	@else
		<ul class="nav nav-tabs nav-stacked">
			{{ Alert::success("<strong>Well done!</strong> You Have Successfully Login date.")}}
			<li>{{ HTML::link('logout','Logout') }}</li>
			<li>{{ HTML::link('admin','Add New Post') }}</li>
		</ul>
	@endif
			<div class="page-header">
  				<h1>Blog <small>Admin Panel</small></h1>
			</div>
				@foreach($post_dashboard as $title_dashboard)
					<p>	{{ HTML::link('view/'.$title_dashboard->id, $title_dashboard->title) }} |
						{{ HTML::link('edit/'.$title_dashboard->id,'Edit') }} |
						{{ HTML::link('delete/'.$title_dashboard->id,'Delete') }} | 
						{{ HTML::link('admin','Add New') }} |
						<span class="label label-important">{{ $title_dashboard->created_at }}</span>
					</p>
			  @endforeach
		</div>
	</div>
</body>
</html>