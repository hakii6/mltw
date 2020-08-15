<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/{any}', 'SpaController@index')->where('any', '.*');




Route::get('/', function() {
    return view('homepage')
    ->with(
        'event' ,
        App\Event::orderBy('start_date' , 'DESC')
        ->where('start_date', '<=', date("Y/m/d"))
        ->firstOrFail()
    )
    ->with(
        'gacha' ,
        App\Gacha::orderBy('start_date' , 'DESC')
        ->where('start_date', '<=', date("Y/m/d"))
        ->firstOrFail()
    );;
})->name('homepage'); //just name the route

Route::get('about', function() {
    return view('about.index');
})->name('about.index'); 









Route::group(['prefix' => 'idols'] , function(){

    
    Route::resource('/' , 'IdolsController' , ['names' => [
        'index' => 'idols.index'
    ]]);

    Route::get('{idol_name_tw}' , 'IdolsController@idol_page');


});





Route::group(['prefix' => 'events'] , function(){

    Route::resource('/' , 'EventsController' , ['names' => [
        'index' => 'events.index'
    ]]);

});

Route::get('events_jp' , function() {
    return view('events.index')->with('events' , App\Event::orderBy('start_date' , 'ASC')->where('start_date', '>', date("Y/m/d"))->get())
    ->with('lang' , 'jp');
});





Route::group(['prefix' => 'gachas'] , function(){

    Route::resource('/' , 'GachasController', ['names' => [
        'index' => 'gachas.index'
    ]]);

});

Route::get('gachas_jp' , function() {
    return view('gachas.index')->with('gachas' , App\Gacha::orderBy('start_date' , 'ASC')->where('start_date', '>', date("Y/m/d"))->get())
    ->with('lang' , 'jp');
});



Route::group(['prefix' => 'datas'] , function(){

    Route::resource('/' , 'DatasController' , ['names' => [
        'index' => 'datas.index'
    ]]);

    Route::get('levels' , 'DatasController@levels');
    Route::get('skill_levelup' , function(){

        return view('datas.skill_levelup');

    });

    Route::view('rank' , 'datas.rank');
    Route::view('master' , 'datas.master');
    Route::view('love' , 'datas.love');
    Route::get('skills' , function(){

        return view('datas.skills')->with('cards' , App\Card::where('date' , '<=' , date("Y/m/d"))->where('rarity' , 'SSR')->
        whereIn('skill_type_id' , [1 , 3 , 7 ])->orderBy('skill_type_id')->get());

    });

});



Route::group(['prefix' => 'calculators'] , function(){

    Route::resource('/' , 'CalculatorsController' , ['names' => [
        'index' => 'calculators.index'
    ]]);
    Route::view('theater_points' , 'calculators.theater_points');
    Route::view('tour_points' , 'calculators.tour_points');


});

Route::post('fwefpwefpwepfoa' , 'Client_imagesController@save_images')->name('client_images.save');

Route::get('riegjiroighhklhrtwefjiewofjoiwjfoiewjfliwejglkeglswkcdlgshkghgosrghuseghiosegoi' , function(){

    $client_images = App\Client_image::where('validation' , 0)->get();

    return view('va')->with('client_images' , $client_images);

});

Route::post('qiowdiqwjdiqwjdqwdgrmglkmbklmf' , 'Client_imagesController@va')->name('client_images.va');
