<?php

Route::get('domains', array('as' => 'domains', 'uses' => 'Ows\Domain\Controllers\DomainsController@getIndex'));
Route::get('domains/create', 'Ows\Domain\Controllers\DomainsController@createDomain');
Route::post('domains/create', 'Ows\Domain\Controllers\DomainsController@create');
