<?php

if ( !function_exists('fusion_default_theme_options') ) {
    function fusion_default_theme_options() {

        $default_theme_options = [
            //'fusion_primary_color' => '#4ea371',            
            //'fusion-footer-gototop' => 1,
            //'fusion-sticky-sidebar'=> 1,
            //'fusiont-sidebar-options'=>'right-sidebar',
            //'fusion-font-url'=> '',
            //'fusion-font-family' => '',
            //'fusion-font-size'=> 16,
            //'fusion-font-line-height'=> 2,
            //'fusion-letter-spacing'=> 0,
            'fusion-blog-excerpt-options'=> 'excerpt', // descripcion corta en post
            'fusion-blog-excerpt-length'=> 50, // numero de palabras 
            'fusion-blog-featured-image'=> 'full-image',
            'fusion-blog-meta-options'=> 1, // activacion de metas en post (categorias, fechas, ...) 
            'fusion-blog-read-more-text' => esc_html__('Read More','fusion'),
            'fusion-blog-pagination-type-options'=>'default',
            'fusion-related-post'=> 1,
            'fusion-single-featured'=> 0 // featured image en los single post
            //'fusion-footer-social' => 0,
            //'fusion-extra-breadcrumb' => 1,
            //'fusion-breadcrumb-text' => esc_html__('You Are Here','fusion')
        ];
        return apply_filters( 'fusion_default_theme_options', $default_theme_options );
    }
}

/**
 *  Get theme options
 *
 * @since Fusion 1.0.0
 *
 * @param null
 * @return array fusion_get_theme_options
 *
 */
if ( !function_exists('fusion_get_theme_options') ) {
    function fusion_get_theme_options() {

        $fusion_default_theme_options = fusion_default_theme_options();        
    
        $fusion_get_theme_options = get_theme_mod( 'fusion_theme_options');
        if( is_array( $fusion_get_theme_options )){
            return array_merge( $fusion_default_theme_options, $fusion_get_theme_options );
        }
        else{
            return $fusion_default_theme_options;
        }

    }
}