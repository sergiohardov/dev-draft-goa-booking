<?php

class Goa_Booking_Agents_Model
{
    static function get_agents()
    {
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM " . GOA_BOOKING_TABLE_AGENTS);
        return $result;
    }

    static function create_agent($data)
    {
        global $wpdb;
        $result = $wpdb->insert(GOA_BOOKING_TABLE_AGENTS, $data, '%s');
        return $result;
    }
}
