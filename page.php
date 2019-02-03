<?php

get_header(); ?>

        <div class="row contenedor-pagina">
            <div class="col-12 col-md-8 content-left index">
			
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

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
