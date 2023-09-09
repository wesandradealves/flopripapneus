<?php /* Template Name: Sobre Nós */ ?>
<?php 
    get_header(); 
    global $template; 
?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>
<section class="section" data-section="sobre">
    <div class="container d-flex flex-wrap flex-column flex-md-row align-items-stretch justify-content-between">
        <div class="section-header pe-md-5 <?php if(get_the_post_thumbnail_url()) : ?> col-lg-5 <?php endif; ?>">
            <?php the_content(); ?>
        </div> 
        <?php if(get_the_post_thumbnail_url()) : ?>
            <div class="col-12 col-lg-5 mt-5 mt-lg-0 d-flex flex-column justify-content-end">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid">
            </div>
        <?php endif; ?>
    </div>
</section>
<section class="section --pattern" data-section="unidades-interna" style="background-image: url(<?php echo get_template_directory_uri().'/img/'; ?>dfb25d2cd270cfec1b27.jpg)">
    <div class="container d-flex flex-wrap flex-column flex-md-row align-items-stretch justify-content-between ps-lg-5 pe-lg-5">
        <div class="section-header pe-md-5 col-12 col-lg-4">
            <h2 class="title">Floripa Pneus.<br/>
                3 unidades, o mesmo serviço de qualidade.</h2>
            <p class="text mt-3">Para você não precisar rodar muito para ser bem atendido, temos lojas no Continente, Ilha de Florianópolis e Palhoça. É só chegar.</p>
            <?php if(get_page_by_title( 'Produtos e Serviços' )) : ?>
                <a href="<?php echo get_permalink( get_page_by_title( 'Produtos e Serviços' ) ); ?>" class="btn d-inline-flex default --variation m-auto mt-5">Conheça nossos serviços</a>
            <?php endif; ?>   
        </div> 
        <div class="col-12 col-lg-5 mt-s mt-md-0">
            <div class="single-carousel">
                <div class="owl-carousel owl-theme">
                    <?php get_template_part('template_parts/addresses', null, array('classes' => '', 'cards' => true, 'template' => str_replace('.php', '', basename($template)))); ?>
                </div>
            </div>
        </div>                
    </div>
</section>       
<?php get_template_part('template_parts/testimonials', null, array('classes' => '', 'template' => str_replace('.php', '', basename($template)))); ?>
<?php get_template_part('template_parts/contacts', null, array('classes' => '', 'template' => str_replace('.php', '', basename($template)))); ?>
<?php get_footer(); ?>