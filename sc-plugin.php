<?php

/**
 * Plugin Name: SC PLUGIN
 * Author: SiteCrafting
 * Author URI: https://www.sitecrafting.com/
 * Description: SC PLUGIN DESCRIPTION
 * Version: 0.0.1
 * Requires PHP: 7.4
 */


// no script kiddiez
if (!defined('ABSPATH')) {
  return;
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
  require_once __DIR__ . '/vendor/autoload.php';
}

define('SC_PLUGIN_PLUGIN_WEB_PATH', plugin_dir_url(__FILE__));
define('SC_PLUGIN_PLUGIN_JS_ROOT', SC_PLUGIN_PLUGIN_WEB_PATH . 'js');
define('SC_PLUGIN_PLUGIN_VIEW_PATH', __DIR__ . '/views');


/*
 * Add REST Routes
 */
add_action('rest_api_init', function() {
  $controller = new ScPlugin\Rest\RestController();
  $controller->register_routes();
});


/*
 * Add WP-CLI tooling
 */
if (class_exists(WP_CLI::class)) {
  $command = new ScPlugin\WpCli\ScPluginCommand();
  WP_CLI::add_command('sc-plugin', $command);
}

add_action('wp_enqueue_scripts', function() {
  wp_enqueue_script(
    'sc-plugin',
    SC_PLUGIN_PLUGIN_WEB_PATH . 'js/sc-plugin.js',
    [], // deps
    false, // default to current WP version
    true // render in footer
  );
});

add_action('wp_enqueue_scripts', function() {
  wp_enqueue_script(
    'sc-plugin',
    SC_PLUGIN_PLUGIN_WEB_PATH . 'js/sc-plugin.js',
    [], // deps
    false, // default to current WP version
    true // render in footer
  );
});

/**
 * Example:
 *
 * apply_filters('sc_plugin/render', ['my_string' => 'Hello, World!']);
 */
add_filter('sc_plugin/render', function($tpl, $data = []) {
  // Allow for theme overrides
  $path = get_template_directory() . '/sc-plugin/' . $tpl;

  if (!file_exists($path)) {
    $path = SC_PLUGIN_PLUGIN_VIEW_PATH . $tpl;
  }

  if (file_exists($path)) {
    ob_start();
    require $path;
    return ob_get_clean();
  }
}, 10, 2);

