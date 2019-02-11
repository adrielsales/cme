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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Overriting Registration Routes...
Route::get('register', 'HomeController@index')->name('register');
Route::post('register', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

/*páginas públicas do site*/
Route::get('/', 'SiteController@index');
Route::get('contato', 'SiteController@contactForm');
Route::post('message', 'SiteController@storeMessage');
Route::get('listaDeEscolas', 'SiteController@listarEscolas');
Route::get('listaDeNoticias', 'SiteController@listarDeNoticias');
Route::get('{idEscola}/membros-da-escola', 'SiteController@membrosDaEscola')->name('sites.membros-da-escola');
Route::get('{idMembro}/detalhes-do-membro', 'SiteController@detalhesDoMembro')->name('sites.detalhes-do-membro');
Route::get('equipe', 'SiteController@equipe')->name('sites.equipe');
Route::get('sobre', 'SiteController@sobre')->name('sites.sobre');
Route::get('{idNoticia}/noticia', 'SiteController@noticia')->name('sites.show-noticia');



//MembroController
Route::group(['middleware' => 'auth'], function(){
	Route::resource('membros', 'MembroController');
	Route::get('membros/{idMembro}/mudaEstado', 'MembroController@mudaEstadoAtivo');
	Route::get('membros/{idMembro}/apagarDocumento', 'MembroController@apagarDocumento');
	/**
	 * ----ACOMPANHANTES DE UM MEMBRO
	 * */
	// Route::get('membros/{idMembro}/acompanhante', 'MembroController@createAcompanhante')->name('membros.create-acompanhante');
	// Route::post('membros/acompanhante', 'MembroController@storeAcompanhante')->name('membros.store-acompanhante');
	// Route::get('membros/{idAcompanhante}/editAcompanhante', 'MembroController@editAcompanhante')->name('membros.edit-acompanhante');
	// Route::put('membros/{idAcompanhante}/updateAcompanhante', 'MembroController@updateAcompanhante')->name('membros.update-acompanhante');
	// Route::delete('membros/{idAcompanhante}/deletaAcompanhante', 'MembroController@destroyAcompanhante')->name('membros.destroy-acompanhante');
	// Route::get('membros/{idAcompanhante}/mudaEstadoAcompanhante', 'MembroController@mudaEstadoAtivoAcompanhante');
	/**
	 * ----PATROCÍNIOS DE UM MEMBRO
	 * */
	Route::get('membros/{idMembro}/patrocinio', 'MembroController@createPatrocinio')->name('membros.create-patrocinio');
	Route::post('membros/patrocinio', 'MembroController@storePatrocinio')->name('membros.store-patrocinio');
	Route::get('membros/{idPatrocinio}/editPatrocinio', 'MembroController@editPatrocinio')->name('membros.edit-patrocinio');
	Route::put('membros/{idPatrocinio}/updatePatrocinio', 'MembroController@updatePatrocinio')->name('membros.update-patrocinio');
	Route::delete('membros/{idPatrocinio}/deletaPatrocinio', 'MembroController@destroyPatrocinio')->name('membros.destroy-patrocinio');
	Route::get('membros/{idPatrocinio}/mudaEstadoPatrocinio', 'MembroController@mudaEstadoAtivoPatrocinio');

	/**
	 * ----BAIRROS DE UM MEMBRO
	 * */
	Route::get('membros/{idMembro}/bairro', 'MembroController@createBairro')->name('membros.create-bairro');
	Route::post('membros/bairro', 'MembroController@storeBairro')->name('membros.store-bairro');
	Route::delete('membros/{idMembro}/{idBairro}/desvinculaBairro', 'MembroController@desvincularBairro')->name('membros.destroy-bairro');
	/**
	 * ----ESCOLAS DE UM MEMBRO
	 * */
	Route::get('membros/{idMembro}/escola', 'MembroController@createEscola')->name('membros.create-escola');
	Route::post('membros/escola', 'MembroController@storeEscola')->name('membros.store-escola');
	Route::get('membros/{idMembro}/{idEscola}/desvinculaEscola', 'MembroController@desvincularEscola');
});

//CarrosController
Route::group(['middleware' => 'auth'], function(){
	Route::resource('carros', 'CarroController');
	Route::get('carros/{idCarro}/mudaEstadoCarro', 'CarroController@mudaEstadoAtivo');
});

	/**
	 * ----IMAGENS DE UM CARRO
	 * */
//ImageController
Route::group(['middleware' => 'auth'], function(){
	Route::resource('images', 'ImageController');
	Route::resource('images', 'ImageController', ['except' => 'show']);
	Route::resource('images', 'ImageController', ['except' => 'create']);
	Route::resource('images', 'ImageController', ['except' => 'edit']);
	Route::resource('images', 'ImageController', ['except' => 'update']);
	Route::get('images/{idCarro}/imagem', 'ImageController@form')->name('images.form');
	Route::get('images/{idImagem}/deletarImagem', 'ImageController@deletarImagem');
});

//AcompanhanteController
Route::group(['middleware' => 'auth'], function(){
	Route::resource('acompanhantes', 'AcompanhanteController');
	Route::resource('acompanhantes', 'AcompanhanteController', ['except' => 'show']);
	Route::get('acompanhantes/{idMembro}/acompanhante', 'AcompanhanteController@novo')->name('acompanhantes.novo');
	Route::get('acompanhantes/{idAcompanhante}/mudaEstadoAcompanhante', 'AcompanhanteController@mudaEstadoAtivoAcompanhante');
});

//IconController
Route::group(['middleware' => 'auth'], function(){
Route::resource('icons', 'IconController', ['except' => 'show']);
});

//EscolaController
Route::group(['middleware' => 'auth'], function(){
	Route::resource('escolas', 'EscolaController', ['except' => 'show']);
	Route::get('escolas/{idEscola}/mudaEstado', 'EscolaController@mudaEstadoAtivo');
});

//BairroController
Route::group(['middleware' => 'auth'], function(){
	Route::resource('bairros', 'BairroController', ['except' => 'show']);
});

//ContatoController
Route::group(['middleware' => 'auth'], function(){
	Route::resource('contatos', 'ContatoController', ['except' => 'show']);
	Route::get('contatos/{idMembro}/contato', 'ContatoController@novo')->name('contatos.novo');
	// Route::get('contatos/{idContato}/mudaEstado', 'ContatoController@mudaEstadoAtivo');

	Route::get('contatos/{idContato}/mudaEstadoAtivoContato', 'ContatoController@mudaEstadoContato');
	Route::get('contatos/{idContato}/mudaVisibilidadeContato', 'ContatoController@mudaVisibilidadeContato');
	// Route::get('membros/{idMembro}/contato', 'MembroController@createContato')->name('membros.create-contato');
	// Route::post('membros/contato', 'MembroController@storeContato')->name('membros.store-contato');
	// Route::delete('membros/{idContato}/deletaContato', 'MembroController@destroyContato')->name('membros.destroy-contato');


});

//BannerController
Route::group(['middleware' => 'auth'], function(){
	Route::resource('banners', 'BannerController');
	Route::resource('banners', 'BannerController', ['except' => 'show']);
	Route::get('banners/{idBanner}/mudaEstadoBanner', 'BannerController@mudaEstadoAtivo');
});

//MessageController
Route::group(['middleware' => 'auth'], function(){
	Route::resource('messages', 'MessageController');
	Route::resource('messages', 'MessageController', ['except' => 'show']);
	Route::resource('messages', 'MessageController', ['except' => 'edit']);
	Route::resource('messages', 'MessageController', ['except' => 'update']);
	Route::get('messages/{idMessage}/mudaEstadoMessage', 'MessageController@mudaEstadoAtivo');
});

//NoticiaController ********************************************************************* AQUI
Route::group(['middleware' => 'auth'], function(){
	// Route::resource('noticias', 'NoticiaController', ['except' => 'show']);
	Route::resource('noticias', 'NoticiaController');
	Route::get('noticias/{idnoticia}/mudaEstadoNoticia', 'NoticiaController@mudaEstadoAtivo');
	Route::get('noticias/{idnoticia}/mudaEstadoDestaque', 'NoticiaController@mudaEstadoDestaque');
});
