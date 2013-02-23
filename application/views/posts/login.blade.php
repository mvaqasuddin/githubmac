<html>
<head>
	<title>{{ $title }}</title>
	{{ Asset::container('bootstrapper')->styles(); }}
	{{ Asset::container('bootstrapper')->scripts(); }}
	<style>
	.row {
		background: grey;
	}
	.row {margin-top:150px; text-align: center;}
	</style>
</head>
<body>
	<div class="row">
			<div class="span12">
				
			{{ Form::open() }}
				@if( Session::has('login_error') )
					    {{ Alert::error("<strong>Oh no!</strong> Problem With Login Contact Admin");}}
				@endif
				<p>{{ Form::label('username' , 'Enter Username')}} 
				{{ Form::text('username') }} 

				<p>{{ Form::label('password' , 'Enter Password')}}
				{{ Form::password('password') }}
				<p> {{ Form::submit('Login') }} </p>
			{{ Form::close() }}
				
			</div><!--End Span Class-->
		
	</div><!-- End Row Class-->

</body>
</html>