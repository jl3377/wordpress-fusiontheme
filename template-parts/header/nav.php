 <?php
 // Configuration Primary Menú
 $conf = [
    'theme_location'  => 'primary',
    'container_class' => 'navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2',
    'container_id'    => 'navbarCollapse',
    'menu_class'      => 'navbar-nav mr-auto',
    'fallback_cb'     => '',
    'menu_id'         => 'main-menu',
    'depth'           => 2, // numero de niveles que serán mostrados        
    'item_spacing' => 'preserve', // preserve / discard        
    'fallback_cb' => 'wp_page_menu', // en caso de que el menu no exista cargar wp_page_menu
    'before' => '', // texto antes del texto del enlace.
    'after' => '', // texto despues del texto del enlace.
    'link_before' => '<span>', // <a href=""><span> ....
    'link_after' => '</span>', // </span></a>
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
    //'walker'          => new Understrap_WP_Bootstrap_Navwalker()
]; ?>
 
<!-- Bootstrap 4 Navigation Bar -->
<div class="navbar navbar-expand-md navbar-dark " role="navigation">
    <div class="container">
    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
        <div class="title">
            <img src="<?php echo get_template_directory_uri().'/assets/img/favicon512.png'; ?>" width="30" height="30" class="d-inline-block align-top" alt="<?php bloginfo('name'); ?>">
            <span><?php bloginfo('name'); ?></span>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> 
        
    <?php 
    // primary nav menu
    wp_nav_menu($conf); ?>  
    
    <div class="collapse navbar-collapse w-100 order-2 dual-collapse2 social" id="navbarCollapse">
        <ul id="social" class="navbar-nav ml-auto">
            <li class="nav-item sozialize">
                Let's Sozialize!
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://www.linkedin.com/in/jlrojo" target="_blank" title="Linkedin"><i class="fab fa-linkedin"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.twitter.com/centinela" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://github.com/jl3377" target="_blank" title="Github"><i class="fab fa-github"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/joseluis.rojo.7399" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://jsfiddle.net/user/dashboard/fiddles/" target="_blank" title="Facebook"><i class="fab fa-jsfiddle"></i></a>
            </li>            
            
        </ul>
    </div>
        </div>
</div><!-- End Bootstrap 4 Navigation Bar -->