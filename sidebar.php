<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-12 col-md-4 sidebar">
    <aside class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside><!-- #secondary -->
</div>


</div>