<?php 
    get_header(); 
    global $template; 
    $query = new WP_Query( array(
        'numberposts'   => -1,
        'post_type'     => 'carros',
        's'    => $_GET['s']
    ) ); 
?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post, 'template' =>  str_replace('.php', '', basename($template)))); ?>
<!-- <?php get_template_part('template_parts/featured-cars', null, array('classes' => '', 'template' => str_replace('.php', '', basename($template)))); ?> -->
<section class="section mt-5" data-section="search">
    <div class="container  d-flex flex-wrap align-items-stretch justify-content-between">
        
        <?php get_sidebar('search'); ?>

        <div class="col-12 col-lg-9 ps-lg-5 mt-5 mt-lg-0">
            <div class="section-header pb-5">
                <h2 class="title"><?php if($query->post_count <= 1) : ?> Foi encontrado <?php else : ?> Foram encontrados <?php endif; ?> "<?php echo $query->post_count; ?>" <?php if($query->post_count <= 1) : ?> resultado <?php else : ?> resultados <?php endif; ?>.</h2>
            </div>
            <ul class="search-results d-flex flex-wrap align-items-stretch">
                <?php 


                    if ( $query->have_posts() ) :
                ?>
                <?php 
                    while ( $query->have_posts() ) : $query->the_post();
                        $terms = get_the_terms( $post->ID, 'modelos' );
                        ?>
                            <!-- onclick="location.href = '<?php echo get_the_permalink(); ?>';" -->
                            <li onclick="location.href = '<?php echo get_the_permalink(); ?>';" class="ps-2 pe-2 mb-3 col-6 col-lg-4 model-wrapper">
                                <img class="logo" src="<?php echo get_field('logo', 'option'); ?>" alt="<?php echo get_the_title(); ?>">
                                <p class="text d-flex flex-column justify-content-center"><?php echo get_the_title(); ?></p>
                                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : 'https://images.macrumors.com/t/ezR0wr-hGF9Q3DCsHSWNMVJDtDw=/800x0/smart/article-new/2015/02/carsilhouette.jpg?lossy'; ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid gallery-img"></a>
                            </li>                           
                            <!-- <li class="d-block col-12 mb-4">
                                <div class="product-information">
                                    <h3 class="title mb-3"><?php the_title(); ?></h3>
                                    <div class="text">
                                        <?php the_content(); ?>
                                    </div>

                                    <?php if( have_rows('galeria') ): ?>
                                        <div class="items owl-carousel owl-theme mt-5 ps-lg-5 pe-lg-5">
                                            <?php $i = 0; while( have_rows('galeria') ) : $i++; the_row(); ?>
                                                <div class="item" data-hash="slide_<?php echo $i; ?>">
                                                    <img class="img-fluid" src="<?php echo get_sub_field('image'); ?>" />
                                                </div>       
                                            <?php endwhile; ?>                                                                                                                                                                                                
                                        </div>   
                                        <ul class="hash-nav d-none d-md-flex flex-wrap align-items-stretch ps-lg-5 pe-lg-5">
                                            <?php $i = 0; while( have_rows('galeria') ) : $i++; the_row(); ?>
                                                <li class="nav-item ps-md-1 pe-md-1 mb-md-2 col-md-4">
                                                    <a href="#slide_<?php echo $i; ?>"><img class="img-fluid" src="<?php echo get_sub_field('image'); ?>" /></a>
                                                </li>                                      
                                            <?php endwhile; ?>                                                                                      
                                        </ul>  
                                        <ul class="hash-nav mt-3 d-block d-md-none owl-carousel owl-theme">
                                            <?php $i = 0; while( have_rows('galeria') ) : $i++; the_row(); ?>
                                                <li class="nav-item">
                                                    <a href="#slide_<?php echo $i; ?>"><img class="img-fluid" src="<?php echo get_sub_field('image'); ?>" /></a>
                                                </li>                                      
                                            <?php endwhile; ?>                                                                                     
                                        </ul>                              
                                    <?php endif; ?>  
                                    <ul class="shortcuts mt-5 d-flex align-items-stretch justify-content-between">
                                        <?php if(get_page_by_title( 'Contato' )) : ?>
                                            <li class="col-6 ps-1 pe-1"><a href="<?php echo get_permalink( get_page_by_title( 'Contato' ) ); ?>" class="btn w-100 h-100 default d-flex align-items-center justify-content-center --variation">Quero um orçamento</a></li>
                                        <?php endif; ?>
                                        <li class="col-6 ps-1 pe-1"><a href="<?php echo get_term_link($terms[0]->term_id); ?>" class="btn w-100 h-100 default d-flex align-items-center justify-content-center --variation-2">Ver todos os carros</a></li>
                                    </ul>                          
                                </div> 
                            </li> -->
                        <?php 
                    endwhile;
                    wp_reset_query();
                    wp_reset_postdata(); 
                ?>
                <?php else : ?>
                    <li class="col-12 d-flex flex-column justify-content-center align-items-center"><p class="d-block m-auto">Nenhum resultado encontrado</p></li>
                <?php endif; ?>   
            </ul>
        </div>
    </div>
</section>
<?php get_template_part('template_parts/contacts', null, array('classes' => '', 'template' => str_replace('.php', '', basename($template)))); ?>
<?php get_footer(); ?>