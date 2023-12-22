<?php

function add_templates_from_subfolder( $post_templates, $wp_theme, $post, $post_type ) {

    foreach(scan_php_files(TEMPLATE_DIR) as $item) {

        $templateName = get_file_data($item, array(
            'Template Name' => 'Template Name'
        ))["Template Name"];
        
        $post_templates[substr($item, strlen(THEME_DIR) + 1)] = $templateName;
    }

    return $post_templates;
}

add_filter( 'theme_page_templates', 'add_templates_from_subfolder', 10, 4 );