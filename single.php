<?php

get_header(); ?>

    <div class="row contenedor">
            <div class="col-12 col-md-8 content-left">		
                    
			
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

            /**
             * fusion_related_posts hook
             * @since fusion 1.0.0
             *
             * @hooked fusion_related_posts -  10
             */
            do_action( 'fusion_related_posts' ,get_the_ID() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
