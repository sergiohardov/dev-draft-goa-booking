<?php

class Goa_Booking_Ajax_Admin_Add_Agent
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_script']);
        add_action('wp_ajax_admin_add_agent', [$this, 'admin_add_agent']);
    }

    public function enqueue_script()
    {
        wp_enqueue_script('goa-booking-ajax-admin-add-agent', GOA_BOOKING_PLUGIN_URL . 'admin/js/add_agent.js', '', '', true);

        wp_localize_script('goa-booking-ajax-admin-add-agent', 'goa_booking_admin_add_agent_obj', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('_wpnonce'),
        ]);
    }

    public function admin_add_agent()
    {
        $response = [
            'status' => false,
            'error_fields' => [],
            'error_message' => '',
            'html' => ''
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

        // Check empty fields
        foreach ($_POST as $key => $item) {
            if (empty($item)) {
                $response['error_fields'][] = $key;
            }
        }

        if (!empty($response['error_fields'])) {
            $response['error_message'] = 'Empty fields...';
            echo json_encode($response);
            wp_die();
        }

        // Check passwords
        if ($_POST['password'] !== $_POST['re_password']) {
            $response['error_fields'] = ['password', 're_password'];
            $response['error_message'] = 'Error password...';
            echo json_encode($response);
            wp_die();
        }

        // Check for user&email in database

        // Success create agent
        if (empty($response['error_fields'])) {
            unset($_POST['re_password']);

            $agent_id = Goa_Booking_Agents_Model::create_agent($_POST);

            if ($agent_id) {
                $response['status'] = true;
                $response['error_message'] = '';
                $_POST['id'] = $agent_id;
                $response['html'] = goa_booking_get_template_part('admin/agent-table-item', $_POST);
                echo json_encode($response);
            } else {
                $response['status'] = false;
                $response['error_message'] = 'Server error...';
                echo json_encode($response);
            }
        }

        wp_die();
    }

}

$Goa_Booking_Ajax_Admin_Add_Agent = new Goa_Booking_Ajax_Admin_Add_Agent();
