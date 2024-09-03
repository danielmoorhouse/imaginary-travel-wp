<?php
/**
 * Template Name: Book your travel form
 */

use Timber\Timber;

$context = Timber::context();

// If the form is submitted, process the submission
if (isset($_POST['acf'])) {
    acf_form_head(); // Prepare ACF for form submission

    // Extract the submitted ACF data
    $acf_data = $_POST['acf'];

    // Create a new post in the 'booking' post type
    $new_booking = array(
        'post_title'    => sanitize_text_field($acf_data['field_66c6423dcf0f5']), // Assuming 'fullname' as the post title
        'post_status'   => 'publish',
        'post_type'     => 'booking', 
    );

    // Insert the post into the database
    $post_id = wp_insert_post($new_booking);

    if (!is_wp_error($post_id)) {
        // Successfully created the post, now save the ACF fields
        update_field('field_66c6423dcf0f5', sanitize_text_field($acf_data['field_66c6423dcf0f5']), $post_id);
        update_field('field_66c6429ecf0f6', sanitize_email($acf_data['field_66c6429ecf0f6']), $post_id);
        update_field('field_66c642cacf0f7', sanitize_text_field($acf_data['field_66c642cacf0f7']), $post_id);
        update_field('field_66c6430b856ae', sanitize_text_field($acf_data['field_66c6430b856ae']), $post_id);
        update_field('field_66c644b2856af', sanitize_text_field($acf_data['field_66c644b2856af']), $post_id);
        update_field('field_66c64511856b0', sanitize_text_field($acf_data['field_66c64511856b0']), $post_id);
        update_field('field_66c64582856b1', sanitize_text_field($acf_data['field_66c64582856b1']), $post_id);
        update_field('field_66c64592856b2', sanitize_text_field($acf_data['field_66c64592856b2']), $post_id);
        update_field('field_66c648bf11d3b', sanitize_text_field($acf_data['field_66c648bf11d3b']), $post_id);
        update_field('field_66c6493211d3d', sanitize_text_field($acf_data['field_66c6493211d3d']), $post_id);
        update_field('field_66c649cf11d3e', sanitize_text_field($acf_data['field_66c649cf11d3e']), $post_id);
        update_field('field_66c64a3f11d3f', sanitize_text_field($acf_data['field_66c64a3f11d3f']), $post_id);
        update_field('field_66c64ab411d40', sanitize_text_field($acf_data['field_66c64ab411d40']), $post_id);
        update_field('field_66c738ea664bf', sanitize_text_field($acf_data['field_66c738ea664bf']), $post_id);
        update_field('field_66c74e4c22c30', intval($acf_data['field_66c74e4c22c30']), $post_id);
        update_field('field_66c76831a80ab', intval($acf_data['field_66c76831a80ab']), $post_id);
        
        //property number fields
        update_field('field_66ca5342feabb', intval($acf_data['field_66ca5342feabb']), $post_id);
        update_field('field_66ca5be3d461a', intval($acf_data['field_66ca5be3d461a']), $post_id);
        update_field('field_66ca55255868e', intval($acf_data['field_66ca55255868e']), $post_id);
        update_field('field_66ca5b4d45ffd', intval($acf_data['field_66ca5b4d45ffd']), $post_id);

        //user id
        update_field('field_66cf2ae7f7fc7', intval($acf_data['field_66cf2ae7f7fc7']), $post_id);
        //postcode fields
        update_field('field_66c8a13b9b1a3', sanitize_text_field($acf_data['field_66c8a13b9b1a3']), $post_id);
        update_field('field_66c8a1bd9b1a4', sanitize_text_field($acf_data['field_66c8a1bd9b1a4']), $post_id);
        update_field('field_66c8a2479b1a5', sanitize_text_field($acf_data['field_66c8a2479b1a5']), $post_id);
        update_field('field_66c8a2619b1a6', sanitize_text_field($acf_data['field_66c8a2619b1a6']), $post_id);

        update_field('field_66d33a6e57af8', sanitize_text_field($acf_data['field_66d33a6e57af8']), $post_id);
        // Optional: Redirect or display a success message
        wp_redirect(home_url('/customer-profile')); // Replace with your desired URL
        exit;
    } else {
        // Handle the error appropriately
        $context['error'] = 'There was an issue creating your booking. Please try again.';
    }
}

// Retrieve individual fields by their names or keys
$context['fullname'] = get_field_object('field_66c6423dcf0f5');
$context['email'] = get_field_object('field_66c6429ecf0f6');
$context['phone_number'] = get_field_object('field_66c642cacf0f7');
$context['pickup_house_number'] = get_field_object('field_66ca5342feabb');
$context['pickup_location'] = get_field_object('field_66c6430b856ae');
$context['pickup_postcode'] = get_field_object('field_66c8a13b9b1a3');
$context['map_test'] = get_field('field_66d33a6e57af8');
$context['pickup_date'] = get_field_object('field_66c644b2856af');
$context['pickup_time'] = get_field_object('field_66c64511856b0');
$context['drop_off_property_number'] = get_field_object('field_66ca5be3d461a');
$context['drop_off'] = get_field_object('field_66c64582856b1');
$context['drop_off_postcode'] = get_field_object('field_66c8a1bd9b1a4');
$context['travel_type'] = get_field_object('field_66c64592856b2');
$context['flight_number'] = get_field_object('field_66c648bf11d3b');
$context['return_flight_number'] = get_field_object('field_66c6493211d3d');
$context['return_pickup_house_number'] = get_field_object('field_66ca55255868e');
$context['return_pickup'] = get_field_object('field_66c649cf11d3e');
$context['return_pickup_postcode'] = get_field_object('field_66c8a2479b1a5');
$context['return_pickup_date'] = get_field_object('field_66c64a3f11d3f');
$context['return_pickup_time'] = get_field_object('field_66c64ab411d40');
$context['return_dropoff_property_number'] = get_field_object('field_66ca5b4d45ffd');
$context['return_drop_off'] = get_field_object('field_66c738ea664bf');
$context['return_drop_off_postcode'] = get_field_object('field_66c8a2619b1a6');
$context['passenger_number'] = get_field_object('field_66c74e4c22c30');
$context['large_bags_cases'] = get_field_object('field_66c76831a80ab');


// Render the Twig template with the context
Timber::render('page-book-your-travel.twig', $context);