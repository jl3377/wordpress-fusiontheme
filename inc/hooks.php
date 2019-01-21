<?php

/**
 * Goto Top functions
 *
 * @since Fusion 1.0.0
 *
 */

if (!function_exists('fusion_go_to_top')) :
    function fusion_go_to_top()
    {
        ?>
        <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'fusion'); ?>">
            <i class="fa fa-angle-double-up"></i>
        </a>
    <?php
    } endif;

/**
 * Post Thumbnail
 *
 *  @since Fusion 1.0.0
 */
if (!function_exists('fusion_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function fusion_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'fusion-large-thumb' ); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>
            <?php
            $image_size = 'fusion-small-thumb';
            global $fusion_theme_options;
            $image_location = $fusion_theme_options['fusion-blog-featured-image'];
            if( $image_location == 'full-image' ){
                $image_size = 'fusion-large-thumb';
            }
            if ($image_location != 'hide-image'):
                ?>
                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php

                    the_post_thumbnail( $image_size, array(
                        'class' => $image_location,
                        'alt' => the_title_attribute(array(
                                'echo' => false,
                            )
                        )
                    ));
                    ?>
                </a>
            <?php
            endif;
            ?>

        <?php endif; // End is_singular().
    }
endif;

/**
 * Remove ... From Excerpt
 *
 * @since 1.0.0
 */
if ( !function_exists('fusion_excerpt_more') ) :
function fusion_excerpt_more( $more ) {
    if(!is_admin() ){
        return '';
    }
}
endif;
add_filter('excerpt_more', 'fusion_excerpt_more');

/**
 * Filter to change excerpt lenght size
 *
 * @since 1.0.0
 */
if ( !function_exists('fusion_alter_excerpt') ) :
    function fusion_alter_excerpt( $length ){
        if(is_admin() ){
            return $length;
        }
        global $fusion_theme_options;
        $excerpt_length = $fusion_theme_options['fusion-blog-excerpt-length'];
        if( !empty( $excerpt_length ) ){
            return $excerpt_length;
        }
        return 50;
    }
endif;
add_filter('excerpt_length', 'fusion_alter_excerpt');


/**
 * Display related posts from same category
 *
 * @since Fusion 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('fusion_related_post') ) :

    function fusion_related_post( $post_id ) {

        global $fusion_theme_options;
        if( 0 == $fusion_theme_options['fusion-related-post'] ){
            return;
        }
        $categories = get_the_category( $post_id );
        if ($categories) {
            $category_ids = array();
             $category = get_category($category_ids);
             $categories  = get_the_category( $post_id );
                foreach ( $categories as $category ){
                    $category_ids[]  = $category->term_id;                        
                }
            $count = $category->category_count;
            if($count > 1 ){ ?>
            <div class="related-pots-block">
                <h2 class="widget-title">
                    <?php _e( 'Related Posts', 'fusion' ) ?>
                </h2>
                <div class="row related-post-entries">
                    <?php
                    $fusion_cat_post_args = array(
                        'category__in'       => $category_ids,
                        'post__not_in'       => array($post_id),
                        'post_type'          => 'post',
                        'posts_per_page'     => 4,
                        'post_status'        => 'publish',
                        'ignore_sticky_posts'=> true
                    );
                    $fusion_featured_query = new WP_Query( $fusion_cat_post_args );

                    while ( $fusion_featured_query->have_posts() ) : $fusion_featured_query->the_post();
                        ?>
                        <div class="col-12 col-md-3">
                            <?php
                            if ( has_post_thumbnail() ):
                                ?>
                                <figure class="widget-image">
                                    <a href="<?php the_permalink()?>">
                                        <?php the_post_thumbnail('fusion-small-thumb'); ?>
                                    </a>
                                </figure>
                            <?php
                            endif;
                            ?>
                            <div class="featured-desc">
                                <a href="<?php the_permalink()?>">
                                    <h2 class="title">
                                       <?php the_title(); ?>
                                    </h2>
                                </a>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </ul>
            </div> <!-- .related-post-block -->
            </div>
        <?php
    }
        }
    }
endif;
add_action( 'fusion_related_posts', 'fusion_related_post', 10, 1 );


/**
 * Displays the custom header image below the navigation menu
*/
if (!function_exists('fusion_header_image')) :
    function fusion_header_image(){
        $has_header_image = has_header_image();
        if (!empty( $has_header_image )) {
            ?>
            <div id="headimg" class="header-image">
                <img src="<?php header_image(); ?>"
                     srcset="<?php echo esc_attr(wp_get_attachment_image_srcset(get_custom_header()->attachment_id, 'full')); ?>"
                     width="<?php echo esc_attr(get_custom_header()->width); ?>"
                     height="<?php echo esc_attr(get_custom_header()->height); ?>"
                     alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
            </div>
        <?php
        }
    }
endif;

/**
 * Post Navigation Function
 *
 * @since Fusion 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('fusion_posts_navigation') ) :
    function fusion_posts_navigation() {
        global $fusion_theme_options;
               
        if( 'default' == $fusion_theme_options['fusion-blog-pagination-type-options'] ){
            the_posts_navigation();
        }
        else{
            echo"<div class='candid-pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('&laquo; Prev', 'fusion'),
                'next_text' => __('Next &raquo;', 'fusion'),
            ));
            echo "<div>";
        }
    }
endif;
add_action( 'fusion_action_navigation', 'fusion_posts_navigation', 10 );
