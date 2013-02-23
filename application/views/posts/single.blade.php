<html>
<head>
	<title>{{ $title }} </title>
	{{ Asset::container('bootstrapper')->styles(); }}
	{{ Asset::container('bootstrapper')->scripts(); }}
	<style>
	#main { margin:0 auto; float:none;}
	</style>
</head>
<body>
	<div  class="row">
			<div id="main" class="span9">
				@if (Session::has('message') )
					<p style="color:green;">{{ Session::get('message') }}</p>
				@endif 
				<h3>{{ $single->title }}</h3>

				<p>{{ Typography::success($single->body) }}</p>
				<p><small>Created at {{ $single->created_at }}</small></p>
				{{ Label::success($single->created_at) }} 
				<p><br><br>
					{{ HTML::link('/', '&larr; Back to index.') }}
				</p>
			</div><!--End Span Class-->
	</div><!-- End Row Class-->
</body>
</html>