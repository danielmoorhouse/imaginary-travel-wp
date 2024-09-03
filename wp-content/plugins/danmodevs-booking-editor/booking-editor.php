<?php
/**
 * Plugin Name: Booking Editor
 * Description: Allows editing of driver and vehicle fields in bookings.
 * Version: 1.0
 * Author: Dan Moorhouse
 */

if (!defined('ABSPATH')) {
    exit;
}

// Enqueue the scripts and styles
function booking_editor_enqueue_scripts() {
    wp_enqueue_script('booking-edit-script', plugin_dir_url(__FILE__) . 'js/booking-edit.js', array(), null, true);
    wp_localize_script('booking-edit-script', 'ajaxurl', admin_url('admin-ajax.php'));

    // Optional: Enqueue custom CSS
    wp_enqueue_style('booking-edit-style', plugin_dir_url(__FILE__) . 'css/booking-edit.css');
}

add_action('wp_enqueue_scripts', 'booking_editor_enqueue_scripts');

// AJAX Handlers
add_action('wp_ajax_get_booking_details', 'get_booking_details');
add_action('wp_ajax_update_booking_details', 'update_booking_details');

function get_booking_details() {
    $booking_id = intval($_POST['booking_id']);
    $response = array(
        'assigned_driver' => get_post_meta($booking_id, 'assigned_driver', true),
        'assigned_vehicle' => get_post_meta($booking_id, 'assigned_vehicle', true),
        'assigned_driver_return' => get_post_meta($booking_id, 'assigned_driver_return', true),
        'assigned_vehicle_return' => get_post_meta($booking_id, 'assigned_vehicle_return', true),
    );

    wp_send_json_success($response);
}

function update_booking_details() {
    $booking_id = intval($_POST['booking_id']);
    $fields = array('assigned_driver', 'assigned_vehicle', 'assigned_driver_return', 'assigned_vehicle_return');

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($booking_id, $field, sanitize_text_field($_POST[$field]));
        }
    }

    wp_send_json_success();
}
