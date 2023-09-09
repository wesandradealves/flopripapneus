<?php /* Template Name: Obrigado */ ?>
<?php 
    get_header(); 
    global $template; 
?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post, 'template' => str_replace('.php', '', basename($template)))); ?>
<section class="section" data-section="obrigado">
    <div class="container d-flex align-items-stretch justify-content-between flex-column flex-md-row">
        <div class="section-header d-flex flex-column justify-content-center col-12 <?php if(get_the_post_thumbnail_url()) : ?> col-md-6 pe-md-5 <?php endif; ?> mb-5 mb-md-0">
            <?php the_content(); ?>
            <a href="<?php echo site_url(); ?>" class="btn d-inline-flex me-auto default mt-5">VOLTAR A PÁGINA INICIAL</a>
        </div> 
        <?php if(get_the_post_thumbnail_url()) : ?>
            <div class="col-12 col-md-6 img-panel">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="404" />
            </div>
        <?php endif; ?>
    </div>
</section> 
<?php get_footer(); ?>