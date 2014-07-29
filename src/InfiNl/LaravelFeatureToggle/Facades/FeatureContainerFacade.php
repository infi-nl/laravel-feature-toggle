<?php
namespace InfiNl\LaravelFeatureToggle\Facades;

use Illuminate\Support\Facades\Facade;

class FeatureContainerFacade extends Facade
{

    /**
     * Get the registered name of the component
     *
     * @return string
     * @codeCoverageIgnore
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-feature-container';
    }
}
