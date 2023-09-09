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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link
    rel="preload"
    href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200;300;400;500;600;700&display=swap"
    as="font"
    crossOrigin="anonymous"
    />
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
                    <?php get_template_part('template_parts/logo', null, array('classes' => 'logo me-auto d-flex flex-wrap flex-column align-items-center col-4 col-sm-6 col-lg-2 pe-2')); ?>
                    
                       <picture>
                            <source srcset="<?php echo get_template_directory_uri().'/img/'; ?>dunlop-w.png" media="(min-width: 992px)">
                            <img class="brand d-block img-fluid flex-fill ps-4 pe-4"  src="<?php echo get_template_directory_uri().'/img/'; ?>32c9d13b614dec36f76d.png"
                                alt="<?php the_title(); ?>">
                        </picture>
                                            
                    <nav class="nav flex-fill pe-3 d-none d-xl-block">
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
                        <nav class="nav social-networks d-none d-xl-flex pe-3">
                            <ul class="d-flex flex-wrap justify-content-end align-items-center">
                                <?php $i = 0; while( have_rows('social_networks', 'option') ) : $i++; the_row(); ?>
                                    <li class="nav-item">
                                        <a  target="_blank" class="nav-link" href="<?php echo get_sub_field('url'); ?>">
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
                                <li class="nav-item d-none d-md-block">
                                    <a href="javascript:void(0)" class="nav-link btn whatsapp whatsapp-btn"> <i class="fa-brands fa-whatsapp"></i></a>
                                </li>
                            <?php endif; ?>
                            <?php if( have_rows('addresses', 'option') ): ?>
                             	<?php $i = 0; while( have_rows('addresses', 'option') ) : $i++; the_row(); ?>
                                	<?php if(get_sub_field('matriz')) : ?>
                            <li class="nav-item d-none d-md-block">
                            <a class="nav-link d-flex align-items-center btn phone" href="tel:+55<?php echo str_replace([':', '\\', '/', '*', '-', ' ','.'], '', get_sub_field('telefone')); ?>"> 
                              
                                    <i class="fa-solid fa-phone"></i> 
                                    <span class="d-none d-xl-block ms-2">
									<?php echo get_sub_field('telefone'); ?> </a>
                                            
                                    </span> 
                            </li>
                            		<?php endif; ?> 
                            	<?php endwhile; ?>
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
                <div class="nav-footer d-flex align-items-center p-3">
                            <?php if(get_field('whatsapp_form_id', 'option')) : ?>    
                                <a href="javascript:void(0)" class="nav-link btn whatsapp whatsapp-btn me-3"> <i class="fa-brands fa-whatsapp"></i></a>
                            <?php endif; ?> 
                            <?php if( have_rows('addresses', 'option') ): ?>
                                <?php $i = 0; while( have_rows('addresses', 'option') ) : $i++; the_row(); ?>
                                    <?php if(get_sub_field('matriz')) : ?>
                                        <a class="nav-link d-flex align-items-center btn phone" href="tel:+55<?php echo str_replace([':', '\\', '/', '*', '-', ' ','.'], '', get_sub_field('telefone')); ?>"> 
                                            <i class="fa-solid fa-phone"></i> 
                                            <span class="d-block ms-2">
                                                <?php echo get_sub_field('telefone'); ?>
                                            </span>                                    
                                        </a>
                                    <?php endif; ?> 
                                <?php endwhile; ?>
                            <?php endif; ?>  
                            <?php if( have_rows('social_networks', 'option') ): ?>
                                <nav class="nav social-networks d-inline-flex ps-3">
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