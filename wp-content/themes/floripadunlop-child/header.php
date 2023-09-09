<!DOCTYPE html>
<html <?php language_attributes(); $lang = explode("lang=",get_language_attributes()); ?>>
<head>
    <title><?php echo get_bloginfo('title').(!is_front_page() ? ' - '.get_the_title() : ' - '.get_option('blogdescription')); ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="content-language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta name="language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:locale" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/screenshot.png" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true">

    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <?php 
        wp_meta(); 
        wp_head();
    ?>
</head>
<body <?php body_class(); ?> style="display: none">
    <div id="wrap">
        <header class="header">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-end stretch">
                    <?php get_template_part('template_parts/logo', null, array('classes' => 'logo me-auto d-flex flex-wrap flex-column align-items-center col-4 col-sm-6 col-lg-2')); ?>
<img class="ms-3 d-block img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/continental.png" alt="<?php echo get_bloginfo('title'); ?>">
                    <nav class="nav flex-fill pe-4 d-none d-xl-block">
                        <?php 
                            wp_nav_menu( 
                                array( 
                                    'theme_location' => 'main', 
                                    'menu_class' => 'd-flex flex-wrap justify-content-end align-items-center',   
                                    'container' => false
                                ) 
                            ); 
                        ?>                          
                    </nav>
                    <?php if( have_rows('social_networks', 'option') ): ?>
                        <nav class="nav social-networks d-none d-xl-flex pe-4">
                            <ul class="d-flex flex-wrap justify-content-end align-items-center">
                                <?php $i = 0; while( have_rows('social_networks', 'option') ) : $i++; the_row(); ?>
                                    <li class="nav-item">
                                        <a target="_blank" class="nav-link" href="<?php echo get_sub_field('url'); ?>">
                                            <i class="fa-brands <?php echo get_sub_field('icon'); ?>"></i>
                                        </a>
                                    </li>                                
                                <?php endwhile; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>     
                    <nav class="nav shortcuts">
                        <ul class="d-flex flex-wrap justify-content-end align-items-center">
                            <?php if(get_field('whatsapp_form_id', 'option')) : ?>    
                                <li class="nav-item d-none d-lg-block">
                                    <a href="javascript:void(0)" class="nav-link btn whatsapp whatsapp-btn"> <i class="fa-brands fa-whatsapp"></i></a>
                                </li>
                            <?php endif; ?>
                            <?php if(get_field('phone', 'option')) : ?> 
                                <li class="nav-item d-none d-lg-block">
                                    <a href="tel:+55<?php echo str_replace([':', '\\', '/', '*', '-', ' ', '.'], '', get_field('phone', 'option')); ?>" class="nav-link d-flex align-items-center btn phone">
                                        <i class="fa-solid fa-phone"></i> 
                                        <span class="d-none d-xl-block ms-2"><?php echo get_field('phone', 'option'); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(get_page_by_title( 'Contato' )) : ?>
                                <li class="nav-item d-none d-xl-block">
                                    <a href="<?php echo get_permalink( get_page_by_title( 'Contato' ) ); ?>" class="nav-link d-flex align-items-center btn orcamento">
                                        <span class="d-none d-xl-block ms-2">Orçamento</span>
                                    </a>
                                </li>   
                            <?php endif; ?>                     
                        </ul>
                    </nav>
                    <button class="m-0 p-0 ms-2 hamburger hamburger--collapse d-block d-xl-none" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <nav class="nav --mobile">
                <?php 
                    wp_nav_menu( 
                        array( 
                            'theme_location' => 'mobile', 
                            'menu_class' => 'd-flex flex-column',   
                            'container' => false
                        ) 
                    ); 
                ?>         
                <div class="nav-footer d-flex align-items-center p-3 d-lg-none">
                            <?php if(get_field('whatsapp_form_id', 'option')) : ?>    

                                    <a href="javascript:void(0)" class="nav-link btn whatsapp whatsapp-btn"> <i class="fa-brands fa-whatsapp"></i></a>

                            <?php endif; ?>
                            
                            <?php if(get_field('phone', 'option')) : ?> 

                                    <a href="tel:+55<?php echo str_replace([':', '\\', '/', '*', '-', ' ', '.'], '', get_field('phone', 'option')); ?>" class="nav-link d-flex align-items-center btn phone">
                                        <i class="fa-solid fa-phone"></i> 
                                        <span class="d-block ms-2"><?php echo get_field('phone', 'option'); ?></span>
                                    </a>

                            <?php endif; ?>  
                            
                    <?php if( have_rows('social_networks', 'option') ): ?>
                        <nav class="nav social-networks d-inline-flex">
                            <ul class="d-flex flex-wrap justify-content-end align-items-center">
                                <?php $i = 0; while( have_rows('social_networks', 'option') ) : $i++; the_row(); ?>
                                    <li class="nav-item">
                                        <a target="_blank" class="nav-link" href="<?php echo get_sub_field('url'); ?>">
                                            <i class="fa-brands <?php echo get_sub_field('icon'); ?>"></i>
                                        </a>
                                    </li>                                
                                <?php endwhile; ?>
                            </ul>
                        </nav>
                    <?php endif; ?> 
                </div>
            </nav>                
        </header>
        <main class="main">