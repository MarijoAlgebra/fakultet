<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('m', 'mathController@index');

// Osnovne matematičke operacije
Route::get('m/{br1}/{br2}/{op}', 'mathController@rezultat');

Route::get('/fakultet', function () {
    return view('fakultet.index');
});
Route::get('/mjesto-zupanija', function(){
    //$comments = App\Post::find(1)->comments;
/*
    foreach ($comments as $comment) {
//
}
 * */
 
    $lista_mjesta=Fakultet\Zupanija::all();
   dd($lista_mjesta);
});

Route::get('/show-key', function(){
    var_dump( $_ENV['APP_KEY']);
    echo "<br>";
    $_ENV['proba']="neki text";
    echo $_ENV['DB_USERNAME'];
    dd($_ENV);
});

// Ovako isprintamo composer.json
Route::get('/get-composer-json', function(){
    $string = file_get_contents(base_path()."/composer.json");
    $json_a = json_decode($string, true);
   

    // This will dump and die, can also print_r($json_a);
    // CTRL-CLICK za expand all
    dd($json_a);
});
    

Route::get('/', function () {
    return view('welcome');
});
Route::get('/123', function () {
    return "xxx";
});


//Fakultet aplikacija
Route::get('/mjesto-ajax', function () {
    return view('fakultet.mjesto.index');
});

Route::resource('mjesto',   'MjestoController');
Route::resource('zupanija', 'ZupanijaController');
Route::resource('studenti', 'StudController');


Route::get('/laravel-version', function()
{
$laravel = app();
return "Your Laravel version is ".$laravel::VERSION;
});
