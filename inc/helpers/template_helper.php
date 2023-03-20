<?php

class Goa_Booking_Template_Helper
{
    static function render($template, $data)
    {
        $template_file = GOA_BOOKING_PLUGIN_PATH . 'templates/' . $template . '.php';

        if (!file_exists($template_file)) {
            return __('Template not found', 'goa-booking');
        }

        $view = [];

        foreach ($data as $key => $value) {
            $view[$key] = $value;
        }

        ob_start();

        extract($view, EXTR_SKIP);
        include $template_file;

        return ob_get_clean();
    }
}
