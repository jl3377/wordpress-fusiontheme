<?php
function remove_styles() {
    // eliminamos el css por defecto del template
    wp_deregister_style('default');
}

function remove_scripts(){
     wp_deregister_script('jquery'); // remover jquery que incluye por defecto wordpress
}
/* incrustar los ficheros que deseemos */
function add_styles() {
    //wp_enqueue_style('jquerymobile', 'ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css' );    
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', '4.1', array(), null, false);
    wp_enqueue_style('fontawesome', '//use.fontawesome.com/releases/v5.4.2/css/all.css', array(), null, false);    
    //wp_enqueue_style('main',  get_template_directory_uri() . '/assets/css/dist/style.min.css' );   
    wp_enqueue_style('main',  get_template_directory_uri() . '/assets/css/style.css', array(), null, false );     
}
/*
 * funcion propia para incluir los scripts a nuestro layout
 */
function add_scripts() {    
    wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), null, false);
    wp_enqueue_script('jqueryui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array(), null, false);
    //wp_enqueue_script('jquerymobile', '//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js');
    //wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js');    
    wp_enqueue_script('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js', array(), null, false);  
    wp_enqueue_script('modalImages',  get_template_directory_uri() . '/assets/js/modalImages.js', array(), null, false );  
    //wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
    //wp_enqueue_script('validate', '//cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js');    
    //wp_enqueue_script('nav',  get_template_directory_uri() . '/assets/js/nav.js' );
    //wp_enqueue_script('carousel-swipe',  get_template_directory_uri() . '/assets/js/carousel-swipe.js' );
    //wp_enqueue_script('modernizr',  '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js' );
}

/* Hook / wp_enqueue_scripts  */
add_action('wp_enqueue_scripts', 'remove_styles');
add_action('wp_enqueue_scripts', 'remove_scripts');
add_action('wp_enqueue_scripts', 'add_styles' );
add_action('wp_enqueue_scripts', 'add_scripts' );



