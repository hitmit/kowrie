<?php

namespace Ows\Domain\Services\Repo;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	 public function register()
	 {
			$this->app->bind(
        	'Ows\Domain\Services\Repo\DomainRepositoryInterface', 'Ows\Domain\Services\Repo\DbDomainRepository'
        );
	 }
}
