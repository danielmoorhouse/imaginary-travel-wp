<?php
/**
 * Template Name: Customer Profile
 */

$current_user_id = get_current_user_id();


$args = array(
    'post_type'  => 'booking', // Replace with your actual booking post type
    'meta_query' => array(
        array(
            'key'     => 'user_id',
            'value'   => $current_user_id,
            'compare' => '='
        )
    )
);

// Fetch the bookings
$bookings = Timber::get_posts($args);

$context = Timber::context();

$context['bookings'] = $bookings;


Timber::render('page-customer-profile.twig', $context);
