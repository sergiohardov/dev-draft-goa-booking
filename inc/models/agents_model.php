<?php

class Goa_Booking_Agents_Model
{
    static function get_agents()
    {
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM " . GOA_BOOKING_TABLE_AGENTS, 'ARRAY_A');
        return $result;
    }

    static function create_agent($data)
    {
        global $wpdb;
        $result = $wpdb->insert(GOA_BOOKING_TABLE_AGENTS, $data, '%s');
        if ($result > 0) {
            $insert_id = $wpdb->insert_id;
            return $insert_id;
        } else {
            return false;
        }
    }

    static function delete_agent($id)
    {
        global $wpdb;
        $result = $wpdb->delete(GOA_BOOKING_TABLE_AGENTS, ['ID' => $id]);

        if ($result > 0) {
            return true;
        } else {
            return false;
        }
    }
}
