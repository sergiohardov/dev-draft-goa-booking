<?php

class Goa_Booking_Database_Helper
{
    public static function run_setup()
    {
        self::install_database();
    }

    public static function install_database()
    {
        $sqls = self::get_initial_table_queries();

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        foreach ($sqls as $sql) {
            error_log(print_r(dbDelta($sql), true));
        }
    }

    public static function get_initial_table_queries()
    {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        $sqls = [];

        $sqls[] = "CREATE TABLE " . GOA_BOOKING_TABLE_AGENTS . " (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            first_name varchar(255) NOT NULL,
            last_name varchar(255),
            email varchar(110) NOT NULL,
            phone varchar(255),
            avatar_image_id int(11),
            login varchar(255),
            password varchar(255),
            bio text,
            created_at datetime,
            updated_at datetime,
            PRIMARY KEY  (id)
          ) $charset_collate;";


        $sqls[] = "CREATE TABLE " . GOA_BOOKING_TABLE_CUSTOMERS . " (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            first_name varchar(255),
            last_name varchar(255),
            email varchar(110) NOT NULL,
            phone varchar(255),
            avatar_image_id int(11),
            status varchar(50) NOT NULL,
            login varchar(255),
            password varchar(255),
            activation_key varchar(255),
            account_nonse varchar(255),
            created_at datetime,
            updated_at datetime,
            PRIMARY KEY  (id)
          ) $charset_collate;";

        return $sqls;
    }
}
