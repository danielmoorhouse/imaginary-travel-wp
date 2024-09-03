<?php

$context = Timber::context();
$argsHero = array(
    'post_type' => 'front-page-hero',
    'posts_per_page' => 1,
    'order' => 'ASC',
    'orderby' => 'title',
);
$context['hero'] = Timber::get_posts($argsHero);

$argsWhyUs = array(
    'post_type' => 'why-choose-us',
    'posts_per_page' => 3,
    'order' => 'ASC',
    'orderby' => 'title',
);

$context['why_us'] = Timber::get_posts($argsWhyUs);

$args = array(
    'post_type' => 'service',
    'posts_per_page' => 4,
    'order' => 'ASC',
    'orderby' => 'title',
);

$context['services'] = Timber::get_posts($args);
Timber::render('front-page.twig', $context);