<?php

global $fusion_theme_options;

?>


<div class="box">
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
            
            /*if ( ( !is_single() ) && ( $fusion_theme_options['fusion-blog-excerpt-options'] == 'excerpt' ) ) {
                if(!empty( $fusion_theme_options['fusion-blog-read-more-text'] )){                ?>
                <a href="<?php the_permalink(); ?>" class="entry-read">
                    <?php echo esc_html( $fusion_theme_options['fusion-blog-read-more-text'] ); ?> &raquo;                    
                </a>
                <?php
                }
            }*/
            
            fusion_entry_footer();
            ?>
        </footer>
        <!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
</div>
