<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 */

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/StarterSite.php';

Timber\Timber::init();

// Sets the directories (inside your theme) to find .twig files.
Timber::$dirname = [ 'templates', 'views' ];

new StarterSite();

function my_acf_form_head() {
    if (is_page_template('page-book-your-travel.php')) {
        acf_form_head();
    }
}
add_action('wp_head', 'my_acf_form_head');

acf_enqueue_uploader(); // Ensures file upload fields are initialized, including date pickers





//testimonials block

// functions to handle inline allocation of driver and vehicle
add_action('init', 'handle_driver_allocation');
function handle_driver_allocation() {
    if (isset($_POST['assign_driver'])) {

        $driver_id = intval($_POST['driver_id']);

        $post_id = intval($_POST['post_id']);

        update_field('assigned_driver', $driver_id, $post_id);


        wp_redirect(home_url('/recieved-bookings'));
        exit;
    }
} 


add_action('init', 'handle_return_driver_allocation');
function handle_return_driver_allocation() {
    if (isset($_POST['assign_return_driver'])) {

        $driver_id = intval($_POST['return_driver_id']);

        $post_id = intval($_POST['post_id']);

        update_field('assigned_driver_return', $driver_id, $post_id);


        wp_redirect(home_url('/recieved-bookings'));
        exit;
    }
} 

add_action('init', 'handle_return_vehicle_allocation');
function handle_return_vehicle_allocation() {
    if (isset($_POST['assign_return_vehicle'])) {

        $vehicle_id = intval($_POST['return_vehicle_id']);
        $post_id = intval($_POST['post_id']);

        update_field('assigned_vehicle_return', $vehicle_id, $post_id);


        wp_redirect(home_url('/recieved-bookings'));
        exit;
    }
} 

add_action('init', 'handle_vehicle_allocation');
function handle_vehicle_allocation() {
    if (isset($_POST['assign_vehicle'])) {

        $vehicle_id = intval($_POST['vehicle_id']);
        $post_id = intval($_POST['post_id']);

        update_field('assigned_vehicle', $vehicle_id, $post_id);


        wp_redirect(home_url('/recieved-bookings'));
        exit;
    }
} 

add_action('init', 'handle_custom_registration');
function handle_custom_registration() {
    if (isset($_POST['custom_registration'])) {

        $username = sanitize_user($_POST['username']);
        $email = sanitize_email($_POST['email']);
        $password = esc_attr($_POST['password']);
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);
        $house_number = (int) $_POST['house_number'];
        $house_name = sanitize_text_field($_POST['house_name']);
        $street_name = sanitize_text_field($_POST['street_name']);
        $town_city = sanitize_text_field($_POST['town_city']);
        $county = sanitize_text_field($_POST['county']);
        $postcode = sanitize_text_field($_POST['postcode']);

        $errors = [];

        // Check for existing username or email
        if (username_exists($username) || email_exists($email)) {
            $errors[] = 'Username or email already exists.';
        }

        // Additional validation can be added here

        if (empty($errors)) {
            $user_id = wp_create_user($username, $password, $email);

            if (!is_wp_error($user_id)) {
                // Save custom ACF fields
                update_field('first_name', $first_name, 'user_' . $user_id);
                update_field('last_name', $last_name, 'user_' . $user_id);
                update_field('house_number', $house_number, 'user_' . $user_id);
                update_field('house_name', $house_name, 'user_' . $user_id);
                update_field('street_name', $street_name, 'user_' . $user_id);
                update_field('town_city', $town_city, 'user_' . $user_id);
                update_field('county', $county, 'user_' . $user_id);
                update_field('postcode', $postcode, 'user_' . $user_id);

                // Optional: Auto-login the user
                wp_set_current_user($user_id);
                wp_set_auth_cookie($user_id);
                wp_redirect(home_url()); // Redirect after successful registration
                exit;
            } else {
                $errors[] = $user_id->get_error_message();
            }
        }

        // Handle errors (you can pass them back to the Twig template via context)
        if (!empty($errors)) {
            // Handle errors accordingly
        }
    }
}

function disable_wp_registration_page() {
    if ($_SERVER['REQUEST_URI'] == '/wp-login.php?action=register') {
        wp_redirect(home_url('/custom-registration'));
        exit;
    }
}
add_action('init', 'disable_wp_registration_page');


