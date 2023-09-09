<?php /* Template Name: Galeria */ ?>
<?php 
    get_header(); 
    global $template; 
?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>
<?php get_template_part('template_parts/featured-cars', null, array('classes' => '', 'template' => str_replace('.php', '', basename($template)))); ?>
<section class="section" data-section="search">
    <div class="container  d-flex flex-wrap align-items-stretch justify-content-between">
        
        <?php get_sidebar('search'); ?>

        <div class="col-12 col-lg-9 ps-lg-5 mt-5 mt-lg-0">
            <ul class="search-results d-flex flex-wrap align-items-stretch">
                <?php 
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;    

                    $query = new WP_Query(array(
                        'post_type' => 'carros',
                        'order' => 'DESC',
                        'posts_per_page'      => '12', //how many posts you need
                        'paged'          => $paged //add the 'paged' parameter                        
                    ));    

         
                    if ($query->have_posts()) : $index = 0;
                        while ( $query->have_posts() ) : $query->the_post();
                            $index++;
                            $terms = get_the_terms( $post->ID, 'modelos' );                        
                ?>
                    <li onclick="location.href = '<?php echo get_the_permalink(); ?>';" data-id="<?php echo $post->ID; ?>" class="ps-2 pe-2 mb-3 col-6 col-lg-4 model-wrapper">
                        <img class="logo" src="<?php echo get_field('logo', 'option'); ?>" alt="<?php echo get_the_title(); ?>">
                        <p class="text d-flex flex-column justify-content-center"><?php echo get_the_title(); ?></p>
                        <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url($post->ID, 'medium') : 'https://images.macrumors.com/t/ezR0wr-hGF9Q3DCsHSWNMVJDtDw=/800x0/smart/article-new/2015/02/carsilhouette.jpg?lossy'; ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid gallery-img"></a>
                    </li>  
                    <?php 
                        endwhile;                     
                        ?>
                        <?php 
                            $total_pages = $query->max_num_pages;
                            if ($total_pages > 1) : $current_page = max(1, get_query_var('paged'));  
                        ?>
                        <li class="pagination d-block col-12 mt-5">
                            <div class="d-flex align-items-center justify-content-center">
                                <?php 
                                    echo paginate_links(array(
                                        'base' => get_pagenum_link(1).
                                        '%_%',
                                        //'format' => '/page/%#%',
                                        'current' => $current_page,
                                        'total' => $total_pages,
                                        'prev_text' => __('<i class="fas fa-chevron-left page-prev"></i>'),
                                        'next_text' => __('<i class="fas fa-chevron-right page-next"></i>'),
                                    ));   
                                ?>
                            </div>
                        </li>    
                        <?php endif; ?>                      
                        <?php 
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