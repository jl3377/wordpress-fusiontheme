<?php
get_header(); ?>

	<div class="row contenedor">
            <div class="col-12">
			
			<section class="error-404 not-found text-center">
				<!--<header class="page-header">
					<h1 class="page-title error"><?php esc_html_e( 'ERROR 404', 'fusion' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content error">
                                    
                                    <p><img src="<?php echo get_template_directory_uri().'/assets/img/errors/404.png'; ?>" alt="error" /></p>
                                    <p><?php esc_html_e(  'Oops! That page can&rsquo;t be found.' , 'fusion' ); ?></p>

                                    <?php
					get_search_form();
                                    ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
