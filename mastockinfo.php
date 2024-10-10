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

class StockInformation
{
    public function __construct()
    {
        // Hook to register Elementor widgets
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }

    public function register_widgets()
    {
        // Ensure Elementor is active
        if (!did_action('elementor/loaded')) {
            return;
        }

        // Include widget file
        require_once MASTOCKINFO_PLUGIN_PATH . 'includes/widgets/stock-widget.php';

        // Register the widget with Elementor
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \MSSTOCKINFO\Includes\Widgets\Stock_Widget());
    }
}

// Initialize the plugin
function mastockinfo_run_plugin()
{
    new StockInformation();
}
add_action('plugins_loaded', 'MSSTOCKINFO\\mastockinfo_run_plugin');