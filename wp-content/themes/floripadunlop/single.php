<?php 
    get_header(); 
    global $template; 
    $terms = get_the_terms( $post->ID, 'modelos' );
    $mid = $terms[0]->term_id;
?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>
<!-- <?php get_template_part('template_parts/featured-cars', null, array('classes' => '', 'template' => str_replace('.php', '', basename($template)))); ?> -->
<section class="section mt-5" data-section="search">
    <div class="container  d-flex flex-wrap align-items-stretch justify-content-between">
        
        <?php get_sidebar('search'); ?>

        <div class="col-12 col-lg-9 ps-lg-5 mt-5 mt-lg-0">
            <?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
                    <div class="product-information pt-0">
                        <h3 class="title mb-3"><?php the_title(); ?></h3>
                        <div class="text">
                            <?php the_content(); ?>
                        </div>
                        <?php get_sidebar('share'); ?>
                        <!-- <?php echo do_shortcode('[addtoany url="' . get_the_permalink() . '" title="' . get_the_title() . '"]') ?> -->
                        <?php if( have_rows('galeria') ): ?>
                            <div class="items galeria owl-carousel owl-theme ps-lg-5 pe-lg-5">
                                <?php $i = 0; while( have_rows('galeria') ) : $i++; the_row(); ?>
                                    <div class="item" data-hash="slide_<?php echo $i; ?>">
                                        <img class="img-fluid" src="<?php echo get_sub_field('image'); ?>" />
                                    </div>       
                                <?php endwhile; ?>                                                                                                                                                                                                
                            </div>   

                            <ul class="hash-nav d-none d-md-flex flex-wrap align-items-stretch ps-lg-5 pe-lg-5">
                                <?php $i = 0; while( have_rows('galeria') ) : $i++; the_row(); ?>
                                    <li class="nav-item ps-md-1 pe-md-1 mb-md-2 col-md-2">
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
                            <li class="col-6 ps-1 pe-1"><a href="<?php echo get_permalink( get_page_by_title( 'Galeria' ) ); ?>" class="btn w-100 h-100 default d-flex align-items-center justify-content-center --variation-2">Ver todos os carros</a></li>
                        </ul>                          
                    </div>                 
            <?php endwhile;
            endif; ?>

            <div class="section-header mt-5 pb-5">
                <h2 class="title">Veja também</h2>
            </div>

            <ul class="search-results d-flex flex-wrap align-items-stretch">
                <?php 
                    $query = new WP_Query(array(
                        'post_type' => 'carros',
                        'order' => 'DESC',
                        'post__not_in' => [$post->ID],
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'modelos',
                                'terms' => $mid,
                                'field' => 'id',
                                'include_children' => true,
                                'operator' => 'IN'
                            )
                        )
                    ));    

                    if ($query->have_posts()) : $index = 0;
                        while ( $query->have_posts() ) : $query->the_post();
                            $index++;
                            $terms = get_the_terms( $post->ID, 'modelos' );                        
                ?>
                    <li onclick="location.href = '<?php echo get_the_permalink(); ?>';" data-id="<?php echo $post->ID; ?>" class="ps-2 pe-2 mb-3 col-6 col-lg-4 model-wrapper">
                        <img class="logo" src="<?php echo get_field('logo', 'option'); ?>" alt="<?php echo get_the_title(); ?>">
                        <p class="text d-flex flex-column justify-content-center"><?php echo get_the_title(); ?></p>
                        <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid gallery-img"></a>
                    </li>  
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