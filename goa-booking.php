<?php

/**
 * Plugin Name: Games of Arts Booking
 * Description: Система бронирования, и учета клиентов для Games of Arts.
 * Author URI:  https://t.me/sergiohardov
 * Author:      Sergio Hardov
 * Version:     1.0
 * Text Domain: goa-booking
 * Domain Path: /lang
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) die;

// Main Class
class Goa_Booking
{
    public function __construct()
    {
        $this->defines();
        $this->includes();
        $this->init_hooks();
    }

    public function defines()
    {
        // Defines for abs path plugin
        define('GOA_BOOKING_PLUGIN_PATH', plugin_dir_path(__FILE__));

        // Defines for url path plugin
        define('GOA_BOOKING_PLUGIN_URL', plugin_dir_url(__FILE__));

        // Defines for roles
        define('GOA_BOOKING_WP_AGENT_ROLE', 'goa_booking_agent');
        define('GOA_BOOKING_WP_CUSTOMER_ROLE', 'goa_booking_customer');

        // Defines for tables in database
        global $wpdb;
        define('GOA_BOOKING_TABLE_AGENTS', $wpdb->prefix . 'goa_booking_agents');
        define('GOA_BOOKING_TABLE_CUSTOMERS', $wpdb->prefix . 'goa_booking_customers');

        // Defines for slug
        define('GOA_BOOKING_SLUG_WP_PLUGIN_SETTINGS', 'goa_booking_wp_settings');
    }

    public function includes()
    {
        // HELPERS
        include_once(GOA_BOOKING_PLUGIN_PATH . 'inc/helpers/database_helper.php');

        // MODELS
        include_once(GOA_BOOKING_PLUGIN_PATH . 'inc/models/agents_model.php');

        // CONTROLLERS
        include_once(GOA_BOOKING_PLUGIN_PATH . 'inc/controllers/agents_controller.php');
    }

    public function init_hooks()
    {
        register_activation_hook(__FILE__, [$this, 'on_activate']);
        register_deactivation_hook(__FILE__, [$this, 'on_deactivate']);

        add_action('admin_menu', [$this, 'plugin_settings_link']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
    }

    public function on_activate()
    {
        flush_rewrite_rules();

        // Setup Tables
        Goa_Booking_Database_Helper::run_setup();


        // Add roles
        add_role(GOA_BOOKING_WP_AGENT_ROLE, __('GoA Agent', 'goa-booking'));
        $agent_role = get_role(GOA_BOOKING_WP_AGENT_ROLE);

        $agent_role->add_cap('read');
        $agent_role->add_cap('upload_files');
        $agent_role->add_cap('edit_bookings');

        add_role(GOA_BOOKING_WP_CUSTOMER_ROLE, __('GoA Client'), 'goa-booking');
    }

    public function on_deactivate()
    {
        flush_rewrite_rules();
    }

    public function plugin_setting_page()
    {
        require_once GOA_BOOKING_PLUGIN_PATH . 'admin/settings.php';
    }

    public function plugin_settings_link()
    {
        add_menu_page(
            esc_html__('GoA Booking Settings', 'lookway-todo'),
            esc_html__('GoA Settings', 'lookway-todo'),
            'manage_options',
            GOA_BOOKING_SLUG_WP_PLUGIN_SETTINGS,
            [$this, 'plugin_setting_page'],
            'dashicons-admin-plugins',
            100
        );
    }

    public function enqueue_admin_assets()
    {
        $screen = get_current_screen();

        if ($screen->id === 'toplevel_page_' . GOA_BOOKING_SLUG_WP_PLUGIN_SETTINGS) {
            // Enqueue styles
            wp_enqueue_style('goa-booking-bootstrap', GOA_BOOKING_PLUGIN_URL . '/libs/bootstrap/bootstrap.min.css');

            // Enqueue scripts
            wp_enqueue_script('goa-booking-bootstrap', GOA_BOOKING_PLUGIN_URL . '/libs/bootstrap/bootstrap.min.js', '', '', true);
        }
    }
}


// Instanse of main class
$Goa_Booking = new Goa_Booking();
