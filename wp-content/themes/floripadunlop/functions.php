<?php

function remove_menus(){

    global $post;

    remove_menu_page( 'index.php' );                  //Dashboard

    //remove_menu_page( 'jetpack' );                    //Jetpack*

    // remove_menu_page( 'edit.php' );                   //Posts

    // remove_menu_page( 'upload.php' );                 //Media

    // remove_menu_page( 'edit.php?post_type=page' );    //Pages

    remove_menu_page( 'edit-comments.php' );          //Comments

    //remove_menu_page( 'themes.php' );                 //Appearance

    // remove_menu_page( 'plugins.php' );                //Plugins

    // remove_menu_page( 'users.php' );                  //Users

    // remove_menu_page( 'tools.php' );                  //Tools

    // remove_menu_page( 'options-general.php' );        //Settings

}   

function wp_before_admin_bar_render() {

    echo '

        <style type="text/css">

            #menu-appearance ul.wp-submenu.wp-submenu-wrap li:not(.wp-submenu-head):not(.hide-if-no-customize),

            #wp-admin-bar-comments,

            #wp-admin-bar-new-content,

            #wp-admin-bar-updates,

            .wp_welcome_panel-hide,

            #wp-admin-bar-wp-logo,

            #wpfooter,

            #footer-upgrade,

            #welcome-panel{

                display: none !important;

            }

        </style>

    ';

}

function prefix_add_footer_styles() {

};

function regScripts() {
    wp_deregister_script('jquery');
    
    wp_enqueue_script('vendors', get_template_directory_uri()."/js/jquery.js",'', '', false);
    
    wp_enqueue_script('commons', get_template_directory_uri()."/js/main.js", array(), filemtime( get_template_directory().'/js/main.js' ), true);
    
    wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', array(), filemtime( get_template_directory().'/style.css' ) );
    
    wp_enqueue_style( 'overwrites', get_template_directory_uri().'/overwrites.css', array(), filemtime( get_template_directory().'/overwrites.css' ) );
}

function disable_default_dashboard_widgets() {
    remove_meta_box('dashboard_right_now', 'dashboard', 'core');

    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');

    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');

    remove_meta_box('dashboard_plugins', 'dashboard', 'core');

    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');

    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');

    remove_meta_box('dashboard_primary', 'dashboard', 'core');

    remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));
    
}

function wpb_custom_new_menu() {
    register_nav_menu('main',__( 'Main' ));
    register_nav_menu('mobile',__( 'Mobile' ));
    register_nav_menu('footer',__( 'Footer' ));
}

function atg_menu_classes($classes, $item, $args) {
    // if($args->theme_location == 'main') {
    //     $classes[] = 'nav-item p-0 ps-5';
    // } elseif($args->theme_location == 'footer') {
    //     $classes[] = 'nav-item nav-col col-6 mb-5 mb-lg-0 pe-5';
    // }
    $classes[] = 'nav-item';
    return $classes;
}

function add_menu_link_class($atts, $item, $args)
{
    $atts['class'] = 'nav-link';
    return $atts;
}

function custom_navigation($menu_name) {
    $locations = get_nav_menu_locations();
    $menu_id = $locations[ $menu_name ] ;
    $menuObject = wp_get_nav_menu_object($menu_id);
    $array_menu = wp_get_nav_menu_items($menuObject->slug);
    $menu = [];

    foreach ($array_menu as $key => $item) {
        $menu[$item->ID] = [];
    }

    foreach ($menu as $key => $item) {
        $menu[$key]['data'] = [];

        foreach ( $array_menu as $menu_item ) {
            if($menu_item->object_id == $key) {
                $menu[$key]['key'] = $menu_item->post_title;
                $menu[$key]['show_level_1'] = get_field('show_level_1', $menu_item->ID);
                $menu[$key]['item_media'] = get_field('item_media', $menu_item->ID);
            }
        }        

        foreach ($array_menu as $item) {
            $o = new \stdClass;

            if($key == $item->menu_item_parent) {
                $o->id = $item->ID;
                $o->title = $item->post_title ? $item->post_title : $item->title;
                $o->url = $item->url;
                $o->data = [];

                foreach ($array_menu as $item) {
                    $_o = new \stdClass;

                    if($o->id == $item->menu_item_parent) {
                        $_o->id = $item->ID;
                        $_o->title = $item->post_title ? $item->post_title : $item->title;
                        $_o->url = $item->url;

                        array_push($o->data, $_o);
                    }
                }

                array_push($menu[$key]['data'], $o);
            }
        }        
    }    

	return $menu;
}

function breadcrumbs() {
    global $post;
    global $wpdb;
    $nid = $post->ID;

    $menu_items = wp_get_nav_menu_items( 'footer' );
    $item = current( wp_filter_object_list( $menu_items, array( 'object_id' => get_queried_object_id() ) ) );
    $parent = $item->menu_item_parent;

    $locations = get_nav_menu_locations();
    $menu_id = $locations['footer'] ;
    $menuObject = wp_get_nav_menu_object($menu_id);
    $array_menu = wp_get_nav_menu_items($menuObject->slug);  
    
    foreach ($array_menu as $key => $item) {
        if($item->ID == $parent) {
            $parent = $item;
        }
    }    

	return $parent;
}

if ( ! function_exists( 'the_widgets_init' ) ) {
    function the_widgets_init() {
        if ( ! function_exists( 'register_sidebars' ) )
        return;
        register_sidebar(              
            array(
                'id'            => 'search',
                'name'          => __( 'Sidebar' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '',
                'after_title'   => '',
        ));
        register_sidebar(              
            array(
                'id'            => 'share',
                'name'          => __( 'Share Sidebar' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '',
                'after_title'   => '',
        ));        
    } // End the_widgets_init()
}    

  
 function mycustom_wp_redirect() {
 ?>
 <script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
 
        //var phone = event.detail.inputs[4].value;
        console.log(event.detail.inputs);
        var text = event.detail.inputs[4].value;
        let contato = $("[name*='filial']").val();

       setTimeout(function() {             
            window.location.href = event.target.wpcf7.id === 246 ? `${window.location.origin}/obrigado` : `https://api.whatsapp.com/send/?phone=${document.getElementsByName('wp-redirect')[0].value}&text=${text}`; 
        }, 1000); 
   
    }, false );
 </script>
<?php
}

// register_post_type('produtos_e_servicos', array(

//     'labels' => array(

//         'name' => _x('Produtos e Serviços', 'post type general name'),

//         'singular_name' => _x('Produto ou Serviço', 'post type singular name'),

//         'add_new' => _x('Novo', 'Produto ou Serviço'),

//         'add_new_item' => __('Novo Produto ou Serviço'),

//         'edit_item' => __('Editar Produto ou Serviço'),

//         'new_item' => __('Novo Produto ou Serviço'),

//         'view_item' => __('Ver Produto ou Serviço'),

//         'search_items' => __('Buscar Produto ou Serviço'),

//         'not_found' =>  __('Nada encontrado'),

//         'not_found_in_trash' => __('Nada encontrado'),

//         'parent_item_colon' => ''

//     ),

//     'exclude_from_search' => false, // the important line here!

//     'public' => true,

//     'publicly_queryable' => true,

//     'show_ui' => true,

//     'query_var' => true,

//     'rewrite' => true,

//     'show_in_nav_menus' => true,

//     'capability_type' => 'post',

//     'hierarchical' => false,

//     'menu_position' => -1,

//     'supports' => array('title', 'editor', 'thumbnail', 'excerpt')

// ));  

// add_action( 'init', 'my_add_excerpts_to_pages' );
// function my_add_excerpts_to_pages() {
//  add_post_type_support( 'produtos_e_servicos', 'excerpt' ); 
// }

function webp_upload_mimes( $existing_mimes ) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}

function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );
        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
    return $result;
}

function custom_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="searchform searchbar d-flex align-items-center" action="' . home_url( '/' ) . '" >
    <input placeholder="Buscar" type="text" value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>    
  </form>';

  return $form;
}

add_theme_support( 'post-thumbnails' );
add_filter( 'get_search_form', 'custom_search_form', 100 );
add_action( 'wp_footer', 'mycustom_wp_redirect' );
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);
add_filter( 'mime_types', 'webp_upload_mimes' );
add_action( 'get_footer', 'prefix_add_footer_styles' );
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'taxonomy' ) );
add_action( 'init', 'the_widgets_init' );
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);
// add_action( 'after_setup_theme', 'wpse_228223_verify_caller_file' );
add_action( 'init', 'wpb_custom_new_menu' );
add_action( 'wp_enqueue_scripts', 'regScripts' );
// add_action( 'admin_menu', 'remove_menus' );
// add_action('wp_before_admin_bar_render', 'wp_before_admin_bar_render');
add_action('admin_menu', 'disable_default_dashboard_widgets');