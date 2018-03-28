<?php

// ------------ GENERATED AUTHENTICATION ROUTES -------------------

Route::auth();
Route::get('auth/logout', 'Auth\AuthController@logout');

// ------------ END OF GENERATED AUTHENTICATION ROUTES -------------------



// ------------ FRONTEND ROUTES -------------------

Route::get('/', 'BerandaFrontController@index');

Route::get('biografi/{name}', 'BerandaFrontController@biografi');
Route::get('publikasi/{jenis}', 'BerandaFrontController@publikasi')->name('publikasi');
Route::get('publikasi/{jenis}/{slug}', 'BerandaFrontController@detail')->name('publikasi.detail');

Route::get('event-terdekat', 'BerandaFrontController@event')->name('event');
Route::get('testimonial', 'BerandaFrontController@testimoni')->name('testimoni');
Route::get('dokumentasi/{jenis}', 'BerandaFrontController@dokumentasi')->name('dokumentasi.video');
Route::get('program-unggulan', 'BerandaFrontController@program')->name('program.kerja');
Route::get('program-unggulan/{slug}', 'BerandaFrontController@programdetail')->name('program.detail');
// ------------ END OF FRONTEND ROUTES -------------------



// ------------ BACKEND ROUTES -------------------

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('cat-data/{id}', 'CatBeritaController@data')->name('cat_berita.data');
Route::get('cat-form/{id}', 'CatBeritaController@form')->name('cat_berita.form');
Route::resource('cat-berita','CatBeritaController');

Route::resource('berita','BeritaController');
Route::get('berita-data/{id}', 'BeritaController@data')->name('berita.data');
Route::get('berita-form/{id}', 'BeritaController@form')->name('berita.form');
Route::post('berita-status/{id}', 'BeritaController@beritastatus');

Route::resource('program','ProgramController');
Route::get('program-data/{id}', 'ProgramController@data')->name('program.data');
Route::get('program-form/{id}', 'ProgramController@form')->name('program.form');
Route::post('program-status/{id}', 'ProgramController@programstatus');

Route::resource('faq','FaqController');
Route::get('faq-data/{id}', 'FaqController@data')->name('faq.data');
Route::get('faq-form/{id}', 'FaqController@form')->name('faq.form');
Route::post('faq-status/{id}', 'FaqController@faqstatus');



Route::resource('event','EventController');
Route::get('event-data/{id}', 'EventController@data')->name('event.data');
Route::get('event-form/{id}', 'EventController@form')->name('event.form');
Route::post('event-status/{id}', 'EventController@eventstatus');

Route::resource('aliansi','AliansiController');
Route::get('aliansi-data/{id}', 'AliansiController@data')->name('aliansi.data');
Route::get('aliansi-form/{id}', 'AliansiController@form')->name('aliansi.form');


Route::resource('user','UserController');
Route::get('user-data/{id}', 'UserController@data')->name('user.data');
Route::get('user-form/{id}', 'UserController@form')->name('user.form');

Route::resource('beasiswa','BeasiswaController');
Route::get('beasiswa-data/{id}', 'BeasiswaController@data')->name('beasiswa.data');
Route::get('beasiswa-form/{id}', 'BeasiswaController@form')->name('beasiswa.form');


Route::resource('testimoni','TestimonyController');
Route::get('testimoni-data/{id}', 'TestimonyController@data')->name('testimoni.data');
Route::get('testimoni-form/{id}', 'TestimonyController@form')->name('testimoni.form');


Route::resource('hubungi-kami','ContactController');
Route::get('hubungi-kami-data/{id}', 'ContactController@data')->name('hubungi-kami.data');
Route::get('hubungi-kami-form/{id}', 'ContactController@form')->name('hubungi-kami.form');

Route::resource('dokumen','SupportingDocController');
Route::get('dokumen-data/{id}', 'SupportingDocController@data')->name('dokumen.data');
Route::get('dokumen-form/{id}', 'SupportingDocController@form')->name('dokumen.form');

Route::resource('video','VideoController');
Route::get('video-data/{id}', 'VideoController@data')->name('video.data');
Route::get('video-form/{id}', 'VideoController@form')->name('video.form');

Route::resource('galeri','GalleryController');
Route::get('galeri-data/{id}', 'GalleryController@data')->name('galeri.data');
Route::get('galeri-form/{id}', 'GalleryController@form')->name('galeri.form');
Route::post('galeri-status/{id}', 'GalleryController@galeristatus');

Route::resource('slider','SliderController');
Route::get('slider-data/{id}', 'SliderController@data')->name('slider.data');
Route::get('slider-form/{id}', 'SliderController@form')->name('slider.form');

Route::resource('kalender','KalenderController');
Route::get('kalender-data/{id}', 'KalenderController@data')->name('kalender.data');
Route::get('kalender-form/{id}', 'KalenderController@form')->name('kalender.form');

// Route::resource('kurikulum','ProfileCCITController');
Route::post('achmad-ruyat', 'ProfilController@store')->name('ruyat.store');
Route::post('achmad-ruyat/{id}', 'ProfilController@update')->name('ruyat.update');
Route::post('zaenul-mutaqin', 'ProfilController@store')->name('zaenul.store');
Route::post('zaenul-mutaqin/{id}', 'ProfilController@update')->name('zaenul.update');
Route::get('achmad-ruyat', 'ProfilController@ruyat')->name('profil.ruyat');
Route::get('zaenul-mutaqin', 'ProfilController@zaenul')->name('profil.zaenul');
Route::get('profil-form/{id}/{category}', 'ProfilController@form')->name('profil.form');
Route::get('profil-data/{category}', 'ProfilController@data')->name('profil.data');

// ------------ BACKEND ROUTES -------------------
