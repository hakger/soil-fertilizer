<?php

/*
  Plugin Name:        Soil-Fertilizer
  Plugin URI:         https://github.com/hakger/soil-fertilizer
  Description:        Add nutrients to Soil. Bootstrap specifics, etc
  Version:            1.0.0
  Author:             HAKGERSoft
  Author URI:         https://hakgersoft.pl

  License:            MIT License
  License URI:        http://opensource.org/licenses/MIT
 */

namespace Hakger\SoilFertilizer;

class Options {

  protected static $modules = [];
  protected $options = [];

  public static function init($module, $options = []) {
    if (!isset(self::$modules[$module])) {
      self::$modules[$module] = new static((array) $options);
    }
    return self::$modules[$module];
  }

  public static function getByFile($file) {
    if (file_exists($file) || file_exists(__DIR__ . '/modules/' . $file)) {
      return self::get('sf-' . basename($file, '.php'));
    }
    return [];
  }

  public static function get($module) {
    if (isset(self::$modules[$module])) {
      return self::$modules[$module]->options;
    }
    if (substr($module, 0, 3) !== 'sf-') {
      return self::get('sf-' . $module);
    }
    return [];
  }

  protected function __construct($options) {
    $this->set($options);
  }

  public function set($options) {
    $this->options = $options;
  }
}

function load_modules() {
  global $_wp_theme_features;
  foreach (glob(__DIR__ . '/modules/*.php') as $file) {
    $feature = 'sf-' . basename($file, '.php');
    $se_feature = 'se-' . basename($file, '.php');
    $soil_feature = 'soil-' . basename($file, '.php');
    if (isset($_wp_theme_features[$feature]) || isset($_wp_theme_features[$se_feature])) {

      if (isset($_wp_theme_features[$soil_feature])) {
        unset($_wp_theme_features[$soil_feature]);
      }
      if (isset($_wp_theme_features[$se_feature]) && !isset($_wp_theme_features[$feature])) {
        $_wp_theme_features[$feature] = $_wp_theme_features[$se_feature];
        unset($_wp_theme_features[$se_feature]);
      }

      Options::init($feature, $_wp_theme_features[$feature]);
      require_once $file;
    }
  }
}

add_action('after_setup_theme', __NAMESPACE__ . '\\load_modules', 100);
