<?php
if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', function () {
    // broadcast(new WebsocketDemoEvent('some data'));
    return view('dashboards.dashboardawal');
});

Route::get('/chats', 'ChatsController@index')->name('chats')->middleware('cekstatus');;

Route::get('/messages', 'ChatsController@fetchMessages')->middleware('cekstatus');;
Route::post('/messages', 'ChatsController@sendMessage')->middleware('cekstatus');;

// Auth::routes();

//--Route Login Baru
Route::get('login', 'AuthController@login')->name('login');
Route::post('login2', 'AuthController@postlogin')->name('login2');
Route::post('logout', 'AuthController@logout')->name('logout');

//--Route Home/Dashboard--
Route::get('home', 'HomeController@index')->name('home')->middleware('cekstatus');
Route::get('dashboardawal', 'LandingController@dashboardawal')->name('dashboardawal');
Route::post('dashboardawal/store','LandingController@store')->name('dashboardawal.store');




//--Route Inputan Master Akun/User--
Route::post('akun/list','AkunController@list')->name('akun.list');
Route::get('akun/index','AkunController@index')->name('akun.index');
Route::post('akun/store','AkunController@store')->name('akun.store');


Route::post('testinput/list','TestInputController@list')->name('testinput.list');
Route::get('testinput/index','TestInputController@index')->name('testinput.index');
Route::post('testinput/store','TestInputController@store')->name('testinput.store');



//Register
Route::get('register', 'RegisterController@index')->name('register.index')->middleware('cekstatus');
  
Route::get('register/create-step-one', 'RegisterController@createStepOne')->name('register.create.step.one')->middleware('cekstatus');

Route::post('register/create-step-one', 'RegisterController@postCreateStepOne')->name('register.create.step.one.post')->middleware('cekstatus');
  
Route::get('register/create-step-two', 'RegisterController@createStepTwo')->name('register.create.step.two')->middleware('cekstatus');
Route::post('register/create-step-two', 'RegisterController@postCreateStepTwo')->name('register.create.step.two.post')->middleware('cekstatus');
  
Route::get('register/create-step-three', 'RegisterController@createStepThree')->name('register.create.step.three')->middleware('cekstatus');
Route::post('register/create-step-three', 'RegisterController@postCreateStepThree')->name('register.create.step.three.post')->middleware('cekstatus');

Route::get('register/create-step-four', 'RegisterController@createStepFour')->name('register.create.step.four')->middleware('cekstatus');

Route::post('register/create-step-four', 'RegisterController@postCreateStepFour')->name('register.create.step.four.post')->middleware('cekstatus');

//Referensi Register
Route::post('register/provinsi/{provinsi}/{namaprovinsi}', 'RegisterController@provinsi')->middleware('cekstatus');
Route::post('register/kecamatan/{kecamatan}/{namakabupaten}', 'RegisterController@kecamatan')->middleware('cekstatus');
Route::post('register/kelurahan/{kelurahan}/{namakecamatan}', 'RegisterController@kelurahan')->middleware('cekstatus');
Route::post('register/kprk/{kprk}/{namakelurahan}', 'RegisterController@kprk')->middleware('cekstatus');
Route::post('register/namakelurahan/{namakelurahan}', 'RegisterController@namakelurahan')->middleware('cekstatus');
Route::post('register/namajenisrekening/{namajenisrekening}', 'RegisterController@namajenisrekening')->middleware('cekstatus');
Route::post('register/validasirekening/{norek}', 'RegisterController@validasirekening')->middleware('cekstatus');

Route::post('register/scopenasional', 'RegisterController@scopenasional')->name('register.scopenasional')->middleware('cekstatus');
Route::post('register/namarek/{existing}', 'RegisterController@namarek')->middleware('cekstatus');
Route::post('register/header', 'RegisterController@header')->middleware('cekstatus');
Route::post('register/kodekomunitas/{kode}/{namakomunitas}', 'RegisterController@kodekomunitas')->middleware('cekstatus');
Route::post('register/tablerekening/{result}', 'RegisterController@tablerekening')->middleware('cekstatus');




//--Content
Route::get('content/index', 'ContentController@index')->name('content.index')->middleware('cekstatus');
Route::get('content/manajemen', 'ContentController@manajemen')->name('content.manajemen')->middleware('cekstatus');
Route::post('content/create', 'ContentController@create')->name('content.create')->middleware('cekstatus');
Route::post('content/edit/{id}', 'ContentController@edit')->middleware('cekstatus');
Route::post('content/editstore', 'ContentController@editstore')->name('content.editstore')->middleware('cekstatus');
Route::get('content/hapus/{id}', 'ContentController@hapus')->middleware('cekstatus');


//--Landing
Route::get('landing/syarat', 'LandingController@syarat')->name('landing.syarat');
Route::get('landing/syaratmuhammadiyah', 'LandingController@syaratmuhammadiyah')->name('landing.syaratmuhammadiyah');
Route::get('landing/userprivacy', 'LandingController@userprivacy')->name('landing.userprivacy');
Route::get('landing/userprivacymuhammadiyah', 'LandingController@userprivacymuhammadiyah')->name('landing.userprivacymuhammadiyah');
Route::get('landing/produk', 'LandingController@produk')->name('landing.produk');
Route::get('landing/tentang', 'LandingController@tentang')->name('landing.tentang');
Route::get('landing/hubungi', 'LandingController@hubungi')->name('landing.hubungi');
