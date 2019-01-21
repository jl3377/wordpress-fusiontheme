<?php

global $fusion_theme_options;
?>

<div class="box">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
            <?php
            if (('post' === get_post_type()) && ( $fusion_theme_options['fusion-blog-meta-options'] == 1)) : ?>
                <div class="entry-meta">
                    <?php fusion_posted_on(); ?>
                </div><!-- .entry-meta -->
            <?php
            endif;
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;

            if (('post' === get_post_type()) && ( $fusion_theme_options['fusion-blog-meta-options'] == 1)) : ?>
                <div class="entry-meta entry-category">
                    <?php fusion_entry_category(); ?>
                </div><!-- .entry-meta -->
            <?php
            endif;
            ?>
        </header>
        <!-- .entry-header -->

        <div class="entry-summary">
            <?php fusion_post_thumbnail(); ?>
            <?php the_excerpt(); ?>
        </div>
        <!-- .entry-summary -->

        <footer class="entry-footer">
            <?php fusion_entry_footer(); ?>
        </footer>
        <!-- .entry-footer -->

    <!-- .p-15 -->
</article><!-- #post-<?php the_ID(); ?> -->
</div>