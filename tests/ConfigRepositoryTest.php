<?php namespace InfiNl\LaravelFeatureToggle\Tests;

use InfiNl\LaravelFeatureToggle\Repository\ConfigRepository;
use JoshuaEstes\Component\FeatureToggle\FeatureContainer;
use PHPUnit_Framework_TestCase;

class ConfigRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function testIsEnabled()
    {
        $config = array(
            "featureName1" => array(
                "enabled" => false
            ),
            "featureName2" => array(
                "enabled" => true
            )
        );

        $repository = new ConfigRepository($config);

        $feature1 = $repository->get("featureName1");
        $feature2 = $repository->get("featureName2");

        $this->assertFalse($feature1->isEnabled(), "Feature should not be enabled");
        $this->assertTrue($feature2->isEnabled(), "Feature should be enabled");
    }

    /**
     * @expectedException        \OutOfBoundsException
     */
    public function testGetNonexistingFeatureShouldThrowException()
    {
        $config = array();

        $repository = new ConfigRepository($config);

        $repository->get("featureName1");
    }
}
