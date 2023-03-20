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
    }

    public function includes()
    {
        // HELPERS
        include_once(GOA_BOOKING_PLUGIN_PATH . 'inc/helpers/database_helper.php');
    }

    public function init_hooks()
    {
        register_activation_hook(__FILE__, [$this, 'on_activate']);
        register_deactivation_hook(__FILE__, [$this, 'on_deactivate']);
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
}


// Instanse of main class
$Goa_Booking = new Goa_Booking();
