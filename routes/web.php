<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/{foo?}', function ($foo='bar') {
//     return $foo;
// })->where('foo','[0-9a-zA-Z]{3}');
//
// Route::get('/',[
//   'as'=>'home',
//   function(){
//     return 'my name is "home"';
//   }
// ]);
//
// Route::get('/home',function(){
//   return redirect(route('home'));
// });
//
// Route::get('/',function(){
//   return view('errors.503');
// });

// Route::get('/',function(){
//   return view('welcome')->with('name','hejoyy');
// });

// Route::get('/',function(){
//   return view('welcome',[
//     'name'=>'Foo',
//     'greeting'=>'hig',
//   ]);
// });
//
// Route::get('/', function(){
//   $items = ['apple','banana','tomato'];
//   return view('welcome',[
//     'items'=>$items
//   ]);
// });

// Route::get('/', function(){
//   return view('welcome');
// });

Route::get('/','WelcomeController@index');

Route::resource('articles','ArticlesController');

Route::get('auth/login', function(){
  $credentials =[
    'email'=>'john@example.com',
    'password'=>'secret'
  ];

  if(! auth()->attempt($credentials)){
    return '로그인 정보가 정확하지 않습니다w.';
  }

  return redirect('protected');
});

Route::get('protected',['middleware'=>'auth', function(){
  dump(session()->all());
  // if(!auth()->check()){
  //   return '누구세요.';
  // }

  return '어서오세요' . auth()->user()->name;
}]);

Route::get('auth/logout', function(){
  auth()->logout();

  return '또 봐요~';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
