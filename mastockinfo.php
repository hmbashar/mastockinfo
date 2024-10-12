<?php
/**
 * Plugin Name: Stock Information
 * Plugin URI: https://github.com/hmbashar/mastockinfo
 * Description: A plugin to display stock information like company details, stock prices, and recommendations.
 * Version: 1.0
 * Author: Md Abul Bashar
 * Author URI: https://hmbashar.com
 * Text Domain: mastockinfo
 * Requires Plugins: elementor
 */

namespace MSSTOCKINFO;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

// Define constants for plugin paths
define('MASTOCKINFO_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('MASTOCKINFO_PLUGIN_URL', plugin_dir_url(__FILE__));

class Mastockinfo_Plugin
{
    public function __construct()
    {
        // Hook to register Elementor widgets
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);

        // Load CSS and JS files
        add_action('wp_enqueue_scripts', [$this, 'mastockinfo_enqueue_styles']);

        // Load text domain
        add_action('plugins_loaded', [$this, 'load_text_domain']);
    }

        // Register the text domain
    public function load_text_domain() {
        load_plugin_textdomain('mastockinfo', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    public function mastockinfo_enqueue_styles()
    {
        // Enqueue the CSS file
        wp_register_style('mastockinfo-stock-widget', MASTOCKINFO_PLUGIN_URL . 'assets/css/stock-widget.css');

        // Enqueue the JS file
        wp_register_script( 'mastockinfo-stock-widget', MASTOCKINFO_PLUGIN_URL . 'assets/js/stock-widget.js', [], '1.0', true );
    }



    public function register_widgets()
    {
        // Ensure Elementor is active
        if (!did_action('elementor/loaded')) {
            return;
        }

        // Include widget file
        require_once MASTOCKINFO_PLUGIN_PATH . 'includes/widgets/StockWidget/stock-widget.php';

        // Register the widget with Elementor
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \MSSTOCKINFO\Includes\Widgets\StockWidget\Stock_Widget());
    }
}

// Initialize the plugin
function run_mastockinfo_plugin() {
    new Mastockinfo_Plugin();
}
run_mastockinfo_plugin();