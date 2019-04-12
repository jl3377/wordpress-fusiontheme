<?php

if ( ! function_exists( 'fusion_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function fusion_entry_footer() {
        global $fusion_theme_options;
        
		// Hide category and tag text for pages.
		if ( is_single() &&  ( 'post' === get_post_type() )  && ( $fusion_theme_options['fusion-blog-meta-options'] == 1 ) )  {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'fusion' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Etiquetado %1$s', 'fusion' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

                edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( '<br />Edit <span class="screen-reader-text">%s</span>', 'fusion' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'fusion_entry_category' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function fusion_entry_category() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( '', 'fusion' ) );
            if ( $categories_list ) {
                /* translators: 1: list of categories. */
                printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'fusion' ) . '</span>', $categories_list ); // WPCS: XSS OK.
            }

        }
    }
endif;





if ( ! function_exists( 'fusion_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function fusion_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
			$update_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

        /*$posted_on = sprintf(
            '%s',
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="fas fa-calendar-alt"></i>' . $time_string . '</a>'
        );*/
        $posted_on = sprintf(
            '%s',
            '' . $time_string
        );

		$updated_on = sprintf(
            '%s',
            '' . $update_string
        );
        /*$byline = sprintf(
            '%s',
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a></span>'
        );*/
        $byline = sprintf(
            '%s',
            '<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
        );

		echo '<span class="byline"> ' . $byline . '</span> - '; 
		echo '<span class="posted-on">' . $posted_on . '</span>';

	
		
        

	}
endif;