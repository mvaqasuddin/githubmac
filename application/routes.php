<?php

Route::get('/', function(){
	$posts = Post::order_by('id', 'desc')->paginate(5);
	//$posts = Post::where('id', '>', 0)->order_by('title', 'asc')->paginate(3);
	//$posts = Post::all()->order_by('title')->paginate(5);
	//$posts = DB::table('posts')->order_by('title')->get()->pageinate(5);
	//$posts = Post::with('author')->all();
	return View::make('posts.index')
		->with('title', 'Blog Home')
		->with('posts',$posts);
});
Route::get('view/(:any)',function($id){
	$single = Post::find($id);
	return View::make('posts.single')
		->with('title' , 'Single Blog')
		->with('single', $single);
});
Route::get('login', function(){
	return view::make('posts.login')
		->with('title', 'Admin Login Page');
});
Route::post('login',function(){
	$creds = array(
		'username' => Input::get('username'),
		'password' => Input::get('password')
	);
	if ( Auth::attempt($creds) )
	{
		return Redirect::to('admin');
	}
	else
	{
		return Redirect::to('login')
			->with('login_error', true);
	}
});
Route::get('dashboard', array('before' => 'auth', 'do' => function(){
	$post_dashboard = Post::order_by('id', 'desc')->get();
	//$post_dashboard = DB::table('posts')->get();
	return View::make('posts.dashboard')->with('post_dashboard', $post_dashboard);
}));
Route::get('edit/(:any)', array('before' => 'auth', 'do' => function($id)
{
	$edit_post = DB::table('posts')->find($id);
    return View::make('posts.edit')
    	->with('edit', $edit_post);
}));
Route::get('admin',array('before' => 'auth', 'do' => function(){
	$user = Auth::user();
	return View::make('posts.admin')
		->with('title', "Enter Your New Post")
		->with('user', $user);
}));
Route::post('admin',array('before' => 'auth', 'do' => function(){
	$new_post = array(
		'title' => Input::get('title'),
		'body' => Input::get('body'),
		'author_id' => Input::get('author_id') 
	);
	$rules = array(
		'title' => 'required|min:3|max:128',
		'body' => 'required'
	);
	$v = Validator::make($new_post,$rules);

	if( $v->fails() )
	{
		return Redirect::to('admin')
			->with('user',Auth::user() )
			->with_errors($v)
			->with_input();
	}
	$post = new Post($new_post);
	$post->save();

	return Redirect::to('view/'.$post->id)->with('message', 'You Have Successfully Add The Post');
}));

Route::get('logout',function(){
	Auth::logout();
	return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});