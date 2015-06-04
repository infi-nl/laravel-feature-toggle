<?php namespace InfiNl\LaravelFeatureToggle;

use Illuminate\Support\ServiceProvider;
use JoshuaEstes\Component\FeatureToggle\FeatureContainer;

class LaravelFeatureToggleServiceProvider extends ServiceProvider
{

    private $_packageName = "laravel-feature-toggle";

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
        //$this->package(sprintf('infi-nl/%s', $this->_packageName));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['laravel-feature-container'] = $this->app->share(function($app) {
            $configPath     = sprintf("packages.infi-nl.%s.feature", $this->_packageName);
            $featureConfigs = $app["config"]->get($configPath) ?: array();

            $features       = LaravelFeatureBuilder::fromFeatureConfigs($featureConfigs);

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
        return array('laravel-feature-container');
    }
}