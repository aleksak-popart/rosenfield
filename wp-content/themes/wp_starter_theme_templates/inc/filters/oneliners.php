<?php

/* Remove p tags from category description */
remove_filter('term_description', 'wpautop');

/* Disable the interval for redirecting the user to the admin email confirmation screen. */
add_filter( 'admin_email_check_interval', '__return_false' );

/* Disable sitemap */
add_filter( 'wp_sitemaps_enabled', '__return_false'  );

/* Disable Yoast ld-json-schema */
// add_filter( 'wpseo_json_ld_output', '__return_false' );