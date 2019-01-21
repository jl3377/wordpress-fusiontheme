<?php
$GLOBALS['fusion_theme_options'] = fusion_get_theme_options();
global $fusion_theme_options; ?>

<!DOCTYPE html>
<html <?php language_attributes($doctype); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>    
    
</head>

<body <?php body_class(); ?>>

    <div id="page" class="site container-main">
    
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'fusion'); ?></a>
    
        <!-- nav menu -->
        <?php get_template_part( 'template-parts/header/nav', ''); ?>

        <!-- content page -->
        <div id="content" class="container">