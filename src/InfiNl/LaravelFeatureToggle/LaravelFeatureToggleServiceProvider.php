<?php namespace InfiNl\LaravelFeatureToggle;

use Illuminate\Support\ServiceProvider;
use InfiNl\LaravelFeatureToggle\Repository\ConfigRepository;
use JoshuaEstes\Component\FeatureToggle\FeatureContainer;

class LaravelFeatureToggleServiceProvider extends ServiceProvider
{

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
        $this->package('infi-nl/laravel-feature-toggle');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['laravel-feature-container'] = $this->app->share(function($app)
        {
            $configRepository = new ConfigRepository($app["config"]["feature"]);

            $features         = array();
            foreach( $configRepository->all() as $f ) {
                $features[] = $f;
            }

            return new FeatureContainer($features);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        var_dump("WERWER"); die;
        return array('laravel-feature-container');
    }

}
