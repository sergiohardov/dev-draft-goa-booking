<?php

class Goa_Booking_Ajax_Admin_Delete_Agent
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_script']);
        add_action('wp_ajax_admin_delete_agent', [$this, 'admin_delete_agent']);
    }

    public function enqueue_script()
    {
        wp_enqueue_script('goa-booking-ajax-admin-delete-agent', GOA_BOOKING_PLUGIN_URL . 'admin/js/delete_agent.js', '', '', true);

        wp_localize_script('goa-booking-ajax-admin-add-agent', 'goa_booking_admin_delete_agent_obj', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('_wpnonce'),
        ]);
    }

    public function admin_delete_agent()
    {

        $response = [
            'status' => false,
            'error_message' => '',
        ];

        // Check Nonce
        $nonce = check_ajax_referer('_wpnonce', 'nonce');

        if (!$nonce) {
            $response['error_message'] = 'Error nonces...';
            echo json_encode($response);
            wp_die();
        }

        // Clear $_POST
        unset($_POST['nonce']);
        unset($_POST['action']);
        unset($_POST['login']);

        if (empty($_POST['id'])) {
            $response['status'] = false;
            $response['error_message'] = 'No id...';
            echo json_encode($response);
        }

        $result = Goa_Booking_Agents_Model::delete_agent($_POST['id']);

        if ($result) {
            $response['status'] = true;
            $response['error_message'] = '';
            echo json_encode($response);
        } else {
            $response['status'] = false;
            $response['error_message'] = 'Server error...';
            echo json_encode($response);
        }
        wp_die();
    }
}

$Goa_Booking_Ajax_Admin_Delete_Agent = new Goa_Booking_Ajax_Admin_Delete_Agent();
