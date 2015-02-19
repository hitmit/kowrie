<?php

Route::get('domains', array('as' => 'domains', 'uses' => 'Ows\Domain\Controllers\DomainsController@getIndex'));
Route::get('domains/create', 'Ows\Domain\Controllers\DomainsController@createDomain');
Route::post('domains/create', 'Ows\Domain\Controllers\DomainsController@create');
Route::get('domain/{domain_id}/edit', 'Ows\Domain\Controllers\DomainsController@editDomain');
Route::post('domains/update', 'Ows\Domain\Controllers\DomainsController@update');
Route::get('domain/{domain_id}/edit/theme', 'Ows\Domain\Controllers\DomainsThemeController@editDomainTheme');

