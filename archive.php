<?php

get_header(); ?>

        <div class="row contenedor">
            <div class="col-12 col-md-8 content-left">
		
		<?php
                 
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
                        $i=0;
                        
			while ( have_posts() ) : the_post();

                             // 2 columnas
                            if ($i%2 ==0) { ?><div class="row"><?php } ?>                            
                                <div class="col-12 col-md-6"><?php
                        
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
                                
                                ?></div><?php    
                            if ($i%2 !=0 || $wp_query->post_count == 1) { ?></div><?php }                             
                            $i++;

			endwhile;

			/**
             * fusion_post_navigation hook
             * @since Fusion 1.0.0
             *
             * @hooked fusion_posts_navigation -  10
             */
            do_action( 'fusion_action_navigation');

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
