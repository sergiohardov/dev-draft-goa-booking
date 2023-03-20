<?php

function goa_booking_get_agents()
{
    $agents = Goa_Booking_Agents_Model::get_agents();

    if (empty($agents)) return __('Agents not found', 'goa-booking');

    return $agents;
}

function goa_booking_get_template_part($template, $data)
{
    return Goa_Booking_Template_Helper::render($template, $data);
}