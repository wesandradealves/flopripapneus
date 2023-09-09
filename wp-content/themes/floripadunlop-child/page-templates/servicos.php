<?php /* Template Name: Produtos e Serviços */ ?>
<?php 
    get_header(); 
    global $template; 
?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>
<section class="section" data-section="sobre">
    <div class="container d-flex flex-wrap flex-column flex-md-row align-items-stretch justify-content-between">
        <div class="section-header pe-md-5 col-lg-5">
            <?php the_content(); ?>
        </div> 
    </div>
</section>

<?php 
    $query = new WP_Query( array(
        'numberposts'   => -1,
        'order' => 'ASC',
        'post_type'     => 'servicos'
    ) );
    if ( $query->have_posts() ) :
        ?>
    <section class="section" data-section="produtos-e-servicos">
        <div class="container">
            <ul class="produtos d-flex flex-wrap flex-column flex-md-row-reverse align-items-center justify-content-between">
                <?php 
                    while ( $query->have_posts() ) : $query->the_post();
                        ?>
                        <li class="item col-12 col-lg-6 d-flex flex-column justify-content-center align-items-center">
                            <div class="card --thumbnail">
                                <div class="card-inner d-flex flex-column">
                                    <div class="thumbnail d-block" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) center 0 / cover no-repeat"></div>
                                    <h3 class="title mb-2 mt-5"><?php echo get_the_title(); ?></h3>
                                    <p class="text">
                                        <?php echo strip_tags(get_the_content()); ?>
                                    </p>
                                    <?php if(get_page_by_title( 'Contato' )) : ?>
                                        <a href="<?php echo get_permalink( get_page_by_title( 'Contato' ) ); ?>?servico=<?php echo get_the_id(); ?>" class="btn default d-inline-flex --variation me-auto mt-5">Quero um Orçamento</a>
                                    <?php endif; ?>                                       
                                </div>
                            </div>                        
                        </li>                        
                        <?php 
                    endwhile;
                    wp_reset_query();
                    wp_reset_postdata(); 
                ?>                                                                                                                                                                
            </ul>
        </div>
    </section>  
<?php     
    endif;  
?>
<?php get_template_part('template_parts/contacts', null, array('classes' => '', 'template' => str_replace('.php', '', basename($template)))); ?>
<?php get_footer(); ?>