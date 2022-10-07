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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','App\Http\Controllers\ClientController@home');
Route::get('/select_by_cat/{name}','App\Http\Controllers\ClientController@select_by_cat');

// Route::get('/cart','App\Http\Controllers\ClientController@cart');
// Route::get('/contact','App\Http\Controllers\ClientController@contact');
// //Route::post('/sendEmail','App\Http\Controllers\ClientController@sendEmail');
 Route::get('/menu','App\Http\Controllers\ClientController@menu');
// Route::get('/checkout','App\Http\Controllers\ClientController@checkout');
// Route::get('/loogin','App\Http\Controllers\ClientController@loogin');
// Route::get('/signup','App\Http\Controllers\ClientController@signup');
// Route::post('/creer_compte','App\Http\Controllers\ClientController@creer_compte');
// Route::post('/acceder_compte','App\Http\Controllers\ClientController@acceder_compte');
// Route::get('/select_by_cat/{name}','App\Http\Controllers\ClientController@select_by_cat');
// Route::get('/retirer_du_panier/{id}','App\Http\Controllers\ClientController@retirer_produit');
// Route::get('/ajouter_au_panier/{id}','App\Http\Controllers\ClientController@ajouter_au_panier');
// Route::post('/modifier_qty/{id}','App\Http\Controllers\ClientController@modifier_panier');
// Route::post('/modifier_qty/{id}','App\Http\Controllers\ClientController@modifier_panier');
// Route::post('/payer','App\Http\Controllers\ClientController@payer');
// Route::get('/logout','App\Http\Controllers\ClientController@logout');

Route::get('/voir_pdf/{id}','App\Http\Controllers\PdfController@voir_pdf');

//admin controller
Route::get('/admin','App\Http\Controllers\AdminController@dashboard');
Route::get('/commandes','App\Http\Controllers\AdminController@commandes');

//categorie de prroduits
Route::get('/ajoutercategorie','App\Http\Controllers\CategoryController@ajoutercategorie');
Route::post('/sauvercategorie','App\Http\Controllers\CategoryController@sauvercategorie');
Route::get('/categories','App\Http\Controllers\CategoryController@categories');

//une route dynamique//
Route::get('/edit_categorie/{id}','App\Http\Controllers\CategoryController@edit_categorie');
Route::post('/modifiercategorie','App\Http\Controllers\CategoryController@modifiercategorie');
Route::get('/deletecategorie/{id}','App\Http\Controllers\CategoryController@deletecategorie');
//products
Route::get('/products','App\Http\Controllers\PoductController@products');
Route::get('/ajouterproduit','App\Http\Controllers\PoductController@ajouterproduit');
Route::post('/sauverproduit','App\Http\Controllers\PoductController@sauverproduit');
Route::get('/editproduit/{id}','App\Http\Controllers\PoductController@editproduit');
Route::post('/modifierproduit','App\Http\Controllers\PoductController@modifierproduit');
Route::get('/deleteproduit/{id}','App\Http\Controllers\PoductController@deleteproduit');
Route::get('/desactiver_produit/{id}','App\Http\Controllers\PoductController@desactiver_produit');
Route::get('/activer_produit/{id}','App\Http\Controllers\PoductController@activer_produit');
//slider
Route::get('/ajouterslider','App\Http\Controllers\SliderController@ajouterslider');
Route::post('/sauverslider','App\Http\Controllers\SliderController@sauverslider');
Route::get('/sliders','App\Http\Controllers\SliderController@slider');
Route::get('/editslider/{id}','App\Http\Controllers\SliderController@editslider');
Route::post('/modifierslider','App\Http\Controllers\SliderController@modifierslider');
Route::get('/activer_slider/{id}','App\Http\Controllers\SliderController@activer_slider');
Route::get('/desactiver_slider/{id}','App\Http\Controllers\SliderController@desactiver_slider');
Route::get('/deleteslider/{id}','App\Http\Controllers\SliderController@deleteslider');

//home controllers
Route::get('/ajouterabout','App\Http\Controllers\HomeController@ajouterabout');
Route::post('/sauverabout','App\Http\Controllers\HomeController@sauverabout');
Route::get('/ajouterevent','App\Http\Controllers\HomeController@ajouterevent');
Route::post('/sauverevent','App\Http\Controllers\HomeController@sauverevent');
Route::get('/ajouterspecial','App\Http\Controllers\HomeController@ajouterspecial');
Route::post('/sauverspecial','App\Http\Controllers\HomeController@sauverspecial');
Route::get('/ajouterchef','App\Http\Controllers\HomeController@ajouterchef');
Route::post('/sauverchef','App\Http\Controllers\HomeController@sauverchef');
Route::get('/abouts','App\Http\Controllers\HomeController@abouts');
Route::get('/specials','App\Http\Controllers\HomeController@specials');
Route::get('/events','App\Http\Controllers\HomeController@events');
Route::get('/chefs','App\Http\Controllers\HomeController@chefs');

Route::get('/ajoutergallerie','App\Http\Controllers\HomeController@ajoutergallerie');
Route::post('/sauvergallerie','App\Http\Controllers\HomeController@sauvergallerie');
Route::get('/galleries','App\Http\Controllers\HomeController@galleries');
Route::get('/deletegallerie/{id}','App\Http\Controllers\HomeController@deletegallerie');
Route::get('/desactiver_gallerie/{id}','App\Http\Controllers\HomeController@desactiver_gallerie');
Route::get('/activer_gallerie/{id}','App\Http\Controllers\HomeController@activer_gallerie');
//Route::get('/admin', 'App\Http\Controllers\HomeController@index');
