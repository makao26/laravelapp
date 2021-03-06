<?php
use \App\Http\Middleware\HelloMiddleware;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('hello', 'HelloController@index')
//   ->middleware(HelloMiddleware::class); // ->middleware('auth');
// Route::get('hello', 'HelloController@index');
  //->middleware('hello');
Route::get('hello/{id}', 'HelloController@index');
Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');
Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');
Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');
Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');
Route::get('hello/show', 'HelloController@show');
Route::get('hello/rest', 'HelloController@rest');
Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');
Route::get('hello/auth', 'HelloController@getAuth');
Route::post('hello/auth', 'HelloController@postAuth');
Route::get('hello/json', 'HelloController@json');
Route::get('hello/json/{id}', 'HelloController@json');


Route::get('person','PersonController@index');
Route::get('person/find','PersonController@find');
Route::post('person/find','PersonController@search');
Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');
Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');
Route::get('person/del', 'PersonController@del');
Route::post('person/del', 'PersonController@remove');

Route::get('board','BoardController@index');
Route::get('board/add','BoardController@add');
Route::post('board/add','BoardController@create');

Route::resource('rest','RestappController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('csv/sample', 'CsvController@showImportCSV');
Route::post('csv/sample', 'CsvController@importCSV');

//sassテスト用
Route::get('/sass', function () {
    return view('sass.sass');
});

//mailテスト用
Route::get('mail', 'TransactionController@index');
Route::post('mail', 'TransactionController@postSendMail');
