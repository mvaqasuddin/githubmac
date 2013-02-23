<html>
<head>
	<title>{{ $title }}</title>
	{{ Asset::container('bootstrapper')->styles(); }}
	{{ Asset::container('bootstrapper')->scripts(); }}
	<style>
	#main { margin:0 auto; float:none; background-color: white;}
	</style>
</head>
<body>
	<div class="row">
			<div id="main" class="span9">
				@foreach($posts -> results as $post)
					<h3>{{ HTML::link('view/'.$post->id, $post->title) }}</h3>
					<p>{{ substr($post->body,0, 300).' [..]'  }}</p>
					<p><small>{{ $post->created_at }}</small></p>
				@endforeach
				{{ $posts->links() }}

			</div><!--End Span Class-->
	</div><!-- End Row Class-->
</body>
</html>