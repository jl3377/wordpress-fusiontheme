<?php

global $fusion_theme_options;

?>


<div class="row article">
    <div class="col-12">
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
            
            <?php if(! ( is_singular() ) ){ ?>
            <div class="col-md-2 fimage">

                <?php
                    if(! ( is_singular() ) ){
                        fusion_post_thumbnail();
                    }
                    else if( ( is_singular() ) && ( $fusion_theme_options['fusion-single-featured'] == 1 ) ) {
                        fusion_post_thumbnail();
                    }
                ?>
            
            </div>
            <div class="col-md-10 fpost">
            <?php } else {  ?>
            <div class="col-md-12 fpostsingle">
            <?php } ?>                
            
                <!-- show img mobile version -->
                <div class="col-md-2 fimageMobile" style="">
                <?php
                    if(! ( is_singular() ) ){
                        fusion_post_thumbnail();
                    }
                    else if( ( is_singular() ) && ( $fusion_theme_options['fusion-single-featured'] == 1 ) ) {
                        fusion_post_thumbnail();
                    } ?>
                </div><!-- end mobile image -->

                <header class="entry-header">
                <?php
                if (is_singular()) :
                    the_title('<h1 class="entry-title">', '</h1>');
                else :
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif; ?>
                </header>

                <!-- start entry meta -->
                <div class="entry-info">
                <?php
                //if (('post' === get_post_type()) && ( $fusion_theme_options['fusion-blog-meta-options'] == 1)) : ?>
                 <?php /* if (is_singular()) : ?>
                    <div class="entry-meta entry-category">
                        <?php fusion_entry_category(); ?>
                    </div><!-- .entry-meta -->
                <?php
                endif;       */     

                if (('post' === get_post_type()) && ( $fusion_theme_options['fusion-blog-meta-options'] == 1)) : ?>
                    <?php if (is_singular()) { ?>
                    <div class="entry-meta-single">
                     <?php } else { ?> 
                    <div class="entry-meta">
                    <?php } ?>    
                        <?php fusion_posted_on(); // comprobar template_tags.php ?>
                        <?php //fusion_entry_category(); ?>
                    </div><!-- .entry-meta -->
                <?php
                endif;            

                
                ?>
                </div> <!-- .entry-metas -->                      
                

                <div class="entry-content">               
                <?php
                if (is_singular()) :
                    the_content();
                else :
                    // muestra la descripcion corta si esta activada
                    if ( $fusion_theme_options['fusion-blog-excerpt-options'] == 'excerpt' ) {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                endif;

                fusion_entry_footer(); // edit links

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'fusion'),
                    'after' => '</div>',
                ));
                ?>
                </div> <!-- .entry-content -->

            

            </div>
        </article>
    </div> 
</div> <!-- end row -->


<?php /*

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
        <header class="entry-header">
            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif; ?>
        </header>
        <!-- .entry-header -->

        <div class="entry-content">
            <?php
                if(! ( is_singular() ) ){
                    fusion_post_thumbnail();
                }
                else if( ( is_singular() ) && ( $fusion_theme_options['fusion-single-featured'] == 1 ) ) {
                    fusion_post_thumbnail();
                }
            ?>
            <?php
            if (is_singular()) :
                the_content();
            else :
                // muestra la descripcion corta si esta activada
                if ( $fusion_theme_options['fusion-blog-excerpt-options'] == 'excerpt' ) {
                    the_excerpt();
                } else {
                    the_content();
                }
            endif;

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'fusion'),
                'after' => '</div>',
            ));
            ?>
        </div>
        <!-- .entry-content -->

        <footer class="entry-footer">

            <?php
            if (('post' === get_post_type()) && ( $fusion_theme_options['fusion-blog-meta-options'] == 1)) : ?>
                <div class="entry-meta entry-category">
                    <?php fusion_entry_category(); ?>
                </div><!-- .entry-meta -->
            <?php
            endif;            
            
            if (('post' === get_post_type()) && ( $fusion_theme_options['fusion-blog-meta-options'] == 1)) : ?>
                <div class="entry-meta">
                    <?php fusion_posted_on(); ?>
                </div><!-- .entry-meta -->
            <?php
            endif;            
            
            fusion_entry_footer();
            ?>
        </footer>
        <!-- .entry-footer -->
?>