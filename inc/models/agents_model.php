<?php

class Goa_Booking_Agents_Model
{
    public function get_agents()
    {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM " . GOA_BOOKING_TABLE_AGENTS);
        return $results;
    }
}
