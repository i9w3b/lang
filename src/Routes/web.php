<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

if (config('lang.route_locale_show') !== false && config('lang.route_locale_show') === true) {

    Route::get('lang/{locale}', 'LangController@index')->name('locale.index');

}

if (config('lang.routes_show') !== false && config('lang.routes_show') === true) {

    if (config('lang.route_manage_language_show') !== false && config('lang.route_manage_language_show') === true) {
        Route::get('manage-language/{lang?}', 'LangController@manageLanguage')->name('manage.language');
    }

    Route::get('create-language', 'LangController@createLanguage')->name('create.language');
    Route::post('store-language-data/{lang}', 'LangController@storeLanguageData')->name('store.language.data');
    Route::post('store-language', 'LangController@storeLanguage')->name('store.language');

}


