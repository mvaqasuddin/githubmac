<html>
<head>
	<title></title>
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
		{{ HTML::link('logout','Logout') }}
	@endif
	<div class="row">
			<div class="span12">
				<h1>Edit Your Post From Here ! </h1>
			{{ Form::open() }}
				<p>{{ Form::text('title', $edit->title, array('class' => 'input-xlarge', 'placeholder' => '.input-xlarge')) }}</p>
				</p>{{ Form::textarea('body', $edit->body, array('class' => 'input-xlarge')) }}</p>

				{{ Form::actions(array(Button::primary_submit('Save Changes'))) }} 
			{{ Form::close() }}
							
			</div><!--End Span Class-->
	</div><!-- End Row Class-->
</body>
</html>