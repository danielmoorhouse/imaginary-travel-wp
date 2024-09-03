<?php

use Timber\Timber;

$context = Timber::context();

//get all posts from the booking post_type
$context['posts'] = Timber::get_posts([
    'post_type' => 'booking',
    'posts_per_page' => -1,
    'orderby' => 'pickup_date',
    'order' => 'ASC'
]);
$context['drivers'] = Timber::get_posts([
    'post_type' => 'driver',
    'posts_per_page' => -1,
    'orderby' => 'post_title',
    'order' => 'ASC'
]);

$context['vehicles'] = Timber::get_posts([
    'post_type' => 'vehicle',
    'posts_per_page' => -1,
    'orderby' => 'post_title',
    'order' => 'ASC'
]);


// $field_group_id = 25;
// $context['custom_fields'] = acf_get_fields($field_group_id);
 Timber::render('page-recieved-bookings.twig', $context);