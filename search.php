<?php

get_header(); ?>

	<div class="row contenedor">
            <div class="col-12 col-md-8 content-left">	
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'fusion' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
                        $i=0;
			while ( have_posts() ) : the_post();

                            // 2 columnas
                            if ($i%2 ==0) { ?><div class="row"><?php } ?>                            
                                <div class="col-12 col-md-6"><?php
                                  
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', '' );
                                
                               ?></div><?php    
                            if ($i%2 !=0 || $wp_query->post_count == 1) { ?></div><?php }                             
                            $i++;

			endwhile;

			/**
             * fusion_post_navigation hook
             * @since fusion 1.0.0
             *
             * @hooked fusion_posts_navigation -  10
             */
            do_action( 'fusion_action_navigation');

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div><!-- #main -->
	

<?php
get_sidebar();
get_footer();
