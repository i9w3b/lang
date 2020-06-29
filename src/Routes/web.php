<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('lang/{locale}', 'LangController@index')->name('locale.index');

if (config('lang.routes_show') != false && config('lang.routes_show') == true) {
    Route::get('manage-language/{lang?}', 'LangController@manageLanguage')->name('manage.language');
    Route::get('create-language', 'LangController@createLanguage')->name('create.language');
    Route::post('store-language-data/{lang}', 'LangController@storeLanguageData')->name('store.language.data');
    Route::post('store-language', 'LangController@storeLanguage')->name('store.language');
}
