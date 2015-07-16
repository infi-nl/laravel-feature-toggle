Laravel Feature Toggle
======================

[![Travis CI](https://travis-ci.org/infi-nl/laravel-feature-toggle.svg)](https://travis-ci.org/infi-nl/laravel-feature-toggle)
[![Total Downloads](https://poser.pugx.org/infi-nl/laravel-feature-toggle/downloads.svg)](https://packagist.org/packages/infi-nl/laravel-feature-toggle)
[![License](https://poser.pugx.org/infi-nl/laravel-feature-toggle/license.svg)](https://packagist.org/packages/infi-nl/laravel-feature-toggle)

Laravel wrapper for [JoshuaEstes/FeatureToggle](https://github.com/JoshuaEstes/FeatureToggle), a library which allows you to easily add and modify various features to your code while in development.

## Installation

Add the following line to the `require` section of `composer.json`:

```json
{
    "require": {
        "infi-nl/laravel-feature-toggle": "4.0.*"
    }
}
```
## Setup

1. Add `'InfiNl\LaravelFeatureToggle\LaravelFeatureToggleServiceProvider',` to the service provider list in `app/config/app.php`.
2. Add ` 'FeatureContainer' => 'InfiNl\LaravelFeatureToggle\Facades\FeatureContainerFacade',` to the list of aliases in `app/config/app.php`.

## Configuration

In order to use the library publish its configuration first

```php
artisan config:publish infi-nl/laravel-feature-toggle
```

Afterwards edit the file app/config/packages/infi-nl/laravel-feature-toggle/feature.php to suit your needs.

The configuration file must be formatted like this:
```php
array(
	"featureName1" => array(
		"enabled"      => true
	),
	...
	"featureNameN" => array(
		"enabled"      => false
	)
)
```

## Usage

An instance of ```JoshuaEstes\Component\FeatureToggle\FeatureContainer``` initialized with features defined in the package config is available through the Facade ```FeatureContainerFacade```, the alias ```FeatureContainer``` or through the ```laravel-feature-toggle``` service in the IOC container.

### Testing feature availability

```php
FeatureContainer::hasFeature("featureName");
```

### Testing feature enabled

```php
$feature = FeatureContainer::getFeature("featureName");

$feature->isEnabled();
```

### More examples
The examples above display only very basic usage of the library, for more advanced examples and detailed information on the library check the [JoshuaEstes/FeatureToggle](https://github.com/JoshuaEstes/FeatureToggle) repository. 

