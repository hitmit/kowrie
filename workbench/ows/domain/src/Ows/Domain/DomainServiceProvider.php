<?php namespace Ows\Domain;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ows/domain');
		$this->loadIncludes();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

	private function loadIncludes()
	{
		// Add file names without the `php` extension to this list as needed.
		$filesToLoad = array(
			'routes',
		);
		// Run through $filesToLoad array.
		foreach ($filesToLoad as $file)
		{
			// Add needed database structure and file extension.
			$file = __DIR__ . '/../../' . $file . '.php';
			// If file exists, include.
			if (is_file($file))
			{
				include $file;
			}
		}
	}

}
