<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php //get_favicons(); ?>
    <?php if (preload_style()) {
        echo '<link rel="preload" href="' . preload_style() . '" as="style">';
    } ?>
    <?php wp_head(); ?>
    <?php // include( get_template_directory() . '/inc/ld-json-schema/index.php');
    ?>
</head>

<body <?php body_class(); ?> data-globals="<?php echo get_js_globals() ?>">
    <a class="skip-link" href="#main">Skip to content</a>

    <?php get_template_part('./template-parts/header/header'); ?>

    <main id="main" class="main">