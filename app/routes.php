<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::model('cat', 'Cat');

Route::get('/',function(){
	return Redirect::to('cats');
});

Route::get('cats',function(){
	$cats = Cat::all();
	return View::make('cats.index')
			->with('cats',$cats);
});

Route::get('cats/{id}',function($id){
	$cat = Cat::find($id);
	return View::make('cats.single')
			->with('cat',$cat);
});

Route::get('cats/breeds/{name}',function($name){
	$breed = Breed::whereName($name)->with('cats')->first();
	return View::make('cats.index')
			->with('breed',$breed)
			->with('cats',$breed->cats);
});

Route::get('about',function(){
	return View::make('about')->with('number_of_cats', 9000);
});

Route::get('cats/create', function() {
  $cat = new Cat;
  return View::make('cats.edit')
    ->with('cat', $cat)
    ->with('method', 'post');
});

Route::get('cats/{cat}/edit', function(Cat $cat) {
  return View::make('cats.edit')
    ->with('cat', $cat)
    ->with('method', 'put');
});

Route::get('cats/{cat}/delete', function(Cat $cat) {
  return View::make('cats.edit')
    ->with('cat', $cat)
    ->with('method', 'delete');
});

Route::post('cats', function(){
  $cat = Cat::create(Input::all());
  return Redirect::to('cats/' . $cat->id)
    ->with('message', 'Profil został utworzony!');
});

Route::put('cats/{cat}', function(Cat $cat) {
  $cat->update(Input::all());
  return Redirect::to('cats/' . $cat->id)
    ->with('message', 'Profil został uaktualniony!');
});

Route::delete('cats/{cat}', function(Cat $cat) {
  $cat->delete();
  return Redirect::to('cats')
    ->with('message', 'Profil został usunięty!');
});
