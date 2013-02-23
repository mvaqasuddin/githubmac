<html>
<head>
	<title>{{ $title }}</title>
	{{ Asset::container('bootstrapper')->styles(); }}
	{{ Asset::container('bootstrapper')->scripts(); }}
	<style>
	.row{text-align: center;}
	</style>
</head>
<body>
	@if (	Auth::guest() )
		{{ HTML::link('admin', 'login') }}
	@else
		{{ HTML::link('logout','Logout') }} |
		{{ HTML::link('dashboard','All Post Section') }}
	@endif
	<div class="row">
			<div class="span12">
				<h1>Enter New Post Here</h1>
				{{ Form::open('admin') }}
				{{ Form::hidden('author_id', $user->id) }}

					<!-- Title For Field -->
					<p>
						{{ Form::label('title', 'Title') }}
						{{ $errors->first('title', '<div class="alert alert-error">:message</div>') }}
						{{ Form::text('title', Input::old('title')) }}
					</p>
					<!-- Title For Field -->
					<p>
						{{ Form::label('body', 'Body') }}
						{{ $errors->first('body', '<div class="alert alert-error">:message</div>') }}
						{{ Form::textarea('body', Input::old('body')) }}
					</p>
					{{ Form::actions(array(Button::primary_submit('Save Changes'), Form::button('Cancel'))) }} 
				{{ Form::close() }}

			</div><!--End Span Class-->
	</div><!-- End Row Class-->
</body>
</html>