<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$fusion_includes = [
    'inc/settings.php',                  // Initialize theme default settings.
    'inc/loader.php',                    // Theme setup and custom theme supports.
    'inc/config.php',   // theme configuration
    'inc/widgets.php',                         // Register widget area.
    'inc/hooks.php',          // related post, posts_navigation, breadcrumbs             
    'inc/template-tags.php',                   // Custom template tags for this theme.
    'inc/customizer.php'   // Customizer additions.    
];
foreach ( $fusion_includes as $file ) {
    $filepath = locate_template( '' . $file );
    if ( ! $filepath ) {
        trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
    }
    require_once $filepath;
}