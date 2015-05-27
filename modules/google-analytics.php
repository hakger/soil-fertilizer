<?php

namespace Hakger\SoilFertilizer\GoogleAnalytics;

/**
 * Google Analytics snippet from HTML5 Boilerplate supporting multiple tracking codes
 *
 * Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM
 * You can enable/disable this feature in functions.php (or lib/config.php if you're using Sage):
 * add_theme_support('sf-google-analytics', 'UA-XXXXX-Y', 'wp_footer');
 *
 * if You wish to track multiple, change above snippet to following:
 * add_theme_support(
 *   'sf-google-analytics',
 *   'UA-XXXXX-Y',
 *   'wp_footer',
 *   [
 *     'Tracker1' => 'UA-XXXXX-X',
 *     'Tracker2' => 'UA-XXXXX-Z',
 *     ...
 *   ]);
 */
function load_script() {
  $gaID = options('gaID');
  $trackers = options('gaTrackers');
  if (!$gaID) {
    return;
  }
  $loadGA = (!defined('WP_ENV') || \WP_ENV === 'production') && !current_user_can('manage_options');
  $loadGA = apply_filters('sf/loadGA', $loadGA);
  ?>
  <script>
  <?php if ($loadGA) : ?>
      window.ga = function () {
        ga.q.push(arguments)
      };
      ga.q = [];
      ga.l = +new Date;
  <?php else : ?>
      (function (s, o, i, l) {
        s.ga = function () {
          s.ga.q.push(arguments);
          if (o['log'])
            o.log(i + l.call(arguments))
        }
        s.ga.q = [];
        s.ga.l = +new Date;
      }(window, console, 'Google Analytics: ', [].slice))
  <?php endif; ?>
    ga('create', '<?= $gaID; ?>', 'auto');
    ga('send', 'pageview');
  <?php foreach ($trackers as $name => $tracker) : ?>
      ga('create',
              '<?= $tracker; ?>',
              'auto',
              { 'name': '<?= $name; ?>' }
      );
      ga('<?= $name ?>.send', 'pageview');
  <?php endforeach; ?>
  </script>
  <?php if ($loadGA) : ?>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  <?php endif; ?>
  <?php
}

function options($option = null) {
  static $options;
  if (!isset($options)) {
    $options = \Hakger\SoilFertilizer\Options::getByFile(__FILE__) + ['', 'wp_footer', []];
    $options['gaID'] = &$options[0];
    $options['hook'] = &$options[1];
    $options['gaTrackers'] = &$options[2];
  }
  return is_null($option) ? $options : $options[$option];
}

$hook = options('hook');

add_action($hook, __NAMESPACE__ . '\\load_script', 20);
