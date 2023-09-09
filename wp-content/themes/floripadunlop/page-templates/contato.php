<?php /* Template Name: Contato */ ?>
<?php 
    get_header(); 
    global $template; 
    $servico = isset($_GET['servico']) ? get_post($_GET['servico']) : null;
?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>

<section class="section" data-section="contato">
    <div class="container d-flex flex-column flex-lg-row flex-wrap">
        <aside class="col-12 <?php if(get_field('contact_form_id', 'option')) : ?> col-lg-5 <?php endif; ?> sidebar pe-lg-5">
            <div class="section-header d-block pb-4">
                <?php the_content(); ?>
            </div> 
            
            <?php get_template_part('template_parts/addresses', null, array('classes' => 'd-none d-lg-block', 'cards' => false)); ?>            
            
            <?php if(get_field('horario_de_atendimento', 'option')) : ?>  
                <p class="text d-none d-lg-flex mt-2 mb-2 align-items-center"><i class="fa-solid fa-calendar me-3"></i> <?php echo get_field('horario_de_atendimento', 'option'); ?></p>
            <?php endif; ?>
            
            <?php if( have_rows('social_networks', 'option') ): ?>
                <ul class="d-flex mt-4 nav follow-us flex-wrap align-items-center">
                    <li class="nav-item me-3">Siga-nos: </li>
                    <?php $i = 0; while( have_rows('social_networks', 'option') ) : $i++; the_row(); ?>
                        <li class="nav-item me-3">
                            <a  target="_blank" class="nav-link" href="<?php echo get_sub_field('url'); ?>">
                                <i class="fa-brands <?php echo get_sub_field('icon'); ?>"></i>
                            </a>
                        </li>                                
                    <?php endwhile; ?>                    
                </ul>
            <?php endif; ?>    
        </aside>
        <?php if(get_field('contact_form_id', 'option')) : ?>
            <div class="col-12 col-lg-7 mt-5 mt-lg-0 ps-lg-5 contact-form">
                <?php echo do_shortcode('[contact-form-7 id="'.get_field('contact_form_id', 'option').'" title="Contato"]'); ?>                
                <?php if($servico) : ?>
                    <script>
                        let el = document.getElementById('message');

                        if(el) {
                            el.value = `Olá, gostaria de saber mais sobre <?php echo $servico->post_title; ?>.`;
                        }
                    </script>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>   

<!-- <?php get_template_part('template_parts/contacts', null, array('classes' => '', 'template' => str_replace('.php', '', basename($template)))); ?> -->
<?php get_footer(); ?>