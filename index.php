<?php
get_header(); ?>

	<div class="row contenedor">
            <div class="col-12 col-md-8 content-left">


		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;
                        $i=0;
			/* Start the Loop */
			while ( have_posts() ) : the_post();

                            // 2 columnas
                            /*if ($i%2 ==0) { ?><div class="row"><?php } ?>                            
                                <div class="col-12 col-md-6"><?php*/
                                
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
			
				/*?></div><?php    
                if ($i%2 !=0) { ?></div><?php }
                $i++;*/
                            
                /*if ($i==10) { ?>
                <div class="col-12" style="margin:10px 0 35px ">
                <?php get_template_part( 'template-parts/adsense/inarticle', 'none' ); ?>
                </div><?php }*/
                            
			endwhile;

	
                    do_action( 'fusion_action_navigation');

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		
            
        </div>
	

<?php
get_sidebar();
get_footer();
