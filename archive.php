<?php

get_header(); ?>

        <div class="row contenedor">
            <div class="col-12 col-md-8 content-left index">
		
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
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() ); 
			
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
