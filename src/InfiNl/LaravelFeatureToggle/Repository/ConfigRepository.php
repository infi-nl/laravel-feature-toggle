<?php
namespace InfiNl\LaravelFeatureToggle\Repository;

use JoshuaEstes\Component\FeatureToggle\FeatureBuilder;
use JoshuaEstes\Component\FeatureToggle\FeatureContainer;
use JoshuaEstes\Component\FeatureToggle\FeatureInterface;
use JoshuaEstes\Component\FeatureToggle\Repository\RepositoryInterface;

class ConfigRepository implements RepositoryInterface {

    private $_features = array();

    public function __construct(array $features) {
        $this->_initializeFeatures($features);
    }

    /**
     * @param string $key
     *
     * @return FeatureInterface
     */
    public function get($key)
    {
        $isFeatureAvailable = !empty($this->_features[$key]);
        if (!$isFeatureAvailable) {
            throw new \Exception(sprintf("No such feature '%s'", $key));
        }

        return $this->_features[$key];
    }

    /**
     * @param FeatureInterface $feature
     *
     * @return FeatureInterface
     */
    public function add(FeatureInterface $feature)
    {
        throw new \Exception("Not implemented");
    }

    /**
     * @param FeatureInterface $feature
     *
     * @return FeatureInterface
     */
    public function update(FeatureInterface $feature)
    {
        throw new \Exception("Not implemented");
    }

    /**
     * @param string $key
     */
    public function delete($key)
    {
        throw new \Exception("Not implemented");
    }

    /**
     * @return FeatureContainer
     */
    public function all()
    {
        return $this->_features;
    }

    private function _initializeFeatures(array $features) {
        $this->_features = array();
        foreach( $features as $name => $settings ) {
            $feature = FeatureBuilder::create($name)->getFeature();

            $this->_applySettings($feature, $settings);

            $this->_features[] = $feature;
        }
    }

    private function _applySettings(FeatureInterface $feature, array $settings) {
        foreach( $settings as $setting => $value ) {
            $feature->getToggle()->setOption($setting, $value);
        }
    }
}