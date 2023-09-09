<?php 
    get_header(); 
    $banner = get_field('banner');
?>

<?php if($banner) : ?>
    <section class="banner d-flex flex-column justify-content-center overflow-hidden">
        <div class="container d-flex col-md-9 col-xl-8 flex-column flex-md-row flex-wrap ps-5 pe-5 ps-md-0 pe-md-0">
            <div class="flex-fill dunlop-logo">
                <img class="img-fluid d-block ms-md-auto mb-4 mb-md-0" src="<?php echo get_template_directory_uri().'/img/'; ?>32c9d13b614dec36f76d.png" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <h2 class="title"><?php echo strip_tags($banner['title']); ?></h2>
                <p class="text mt-3"><?php echo strip_tags($banner['text']); ?></p>
                <?php if($banner['cta']['label'] && $banner['cta']['link']) : ?>
                    <a href="<?php echo $banner['cta']['link']; ?>" class="btn mt-4 default d-inline-flex"><?php echo $banner['cta']['label']; ?></a>
                <?php endif; ?>
            </div>
        </div>
        <picture>
            <source srcset="<?php echo $banner['image']['image']; ?>" media="(min-width: 768px)" >
            <img class="img-fluid" src="<?php echo $banner['image']['image_mobile']; ?>" alt="<?php echo $banner['title']; ?>">
        </picture>             
    </section>
<?php endif; ?>

<?php 
    $query = new WP_Query( array(
        'numberposts'   => -1,
        'post_type'     => 'servicos',
        'meta_key'      => 'featured',
        'meta_value'    => TRUE
    ) );
    if ( $query->have_posts() ) :
        ?>
        <section class="section" data-section="home-produtos">
            <div class="container">
                <div class="section-header d-flex flex-column justify-content-center col-lg-7 m-auto">
                    <h2 class="title">Rode com estilo.<br/>
                        Venha para a Floripa Pneus.</h2>
                    <p class="text mt-3">Na Floripa Pneus você encontra a linha completa de pneus Dunlop e serviços de qualidade com o melhor custo x benefício. Tudo com a agilidade que você espera e o cuidado que o seu automóvel merece.</p>
                </div>
                <div class="default-carousel col-lg-9 m-auto">
                    <div class="owl-carousel owl-theme">
                        <?php 
                            while ( $query->have_posts() ) : $query->the_post();
                                ?>
                                <div <?php if(get_page_by_title( 'Produtos e Serviços' )) : ?> onclick="location.href = '<?php echo get_permalink( get_page_by_title( 'Produtos e Serviços' ) ); ?>';" <?php endif; ?> class="card p-2">
                                    <div class="card-inner d-flex flex-column">
                                        <img src="<?php echo get_field('image'); ?>" alt="" class="img-fluid mb-4 ms-auto me-auto">
                                        <h3 class="title mb-2"><?php echo get_the_title(); ?></h3>
                                        <p class="text"><?php echo get_the_excerpt(); ?></p>
                                    </div>
                                </div>   
                                <?php 
                            endwhile;
                            wp_reset_query();
                            wp_reset_postdata(); 
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php     
    endif;  
?>

<?php if( have_rows('addresses', 'option') ): ?>
    <section class="section --pattern" data-section="unidades" style="background-image: url(<?php echo get_template_directory_uri().'/img/'; ?>dfb25d2cd270cfec1b27.jpg)">
        <div class="container">
            <div class="section-header d-flex flex-column justify-content-center col-lg-7 m-auto">
                <h2 class="title">Floripa Pneus.<br/>
                    3 unidades, o mesmo serviço de qualidade.</h2>
                <p class="text mt-3">Para você não precisar rodar muito para ser bem atendido, temos lojas no Continente, Ilha de Florianópolis e Palhoça. É só chegar.</p>
                <?php if(get_page_by_title( 'Produtos e Serviços' )) : ?>
                    <a href="<?php echo get_permalink( get_page_by_title( 'Produtos e Serviços' ) ); ?>" class="btn default --variation m-auto mt-4">Conheça nossos serviços</a>
                <?php endif; ?>   
            </div> 
            <div class="default-carousel col-lg-9 m-auto">
                <div class="owl-carousel owl-theme">
                    <?php get_template_part('template_parts/addresses', null, array('classes' => '', 'cards' => true)); ?>
                </div>
            </div>                
        </div>
    </section>
<?php endif; ?>

<section class="section" data-section="floripa-pneus" style="background-image: url(<?php echo get_template_directory_uri().'/img/'; ?>cd858b2cc1abf309d3c5.jpg)">
    <div class="container d-flex flex-wrap align-items-end justify-content-between">
        <div class="section-header col-md-6 col-lg-4">
            <h2 class="title">Na Floripa Pneus você encontra a tecnologia 
                da marca que inventou o pneu.</h2>
            <p class="text mt-3">Desde 1995, Floripa Pneus é parceira da Dunlop, a mais tradicional marca de pneus do mundo. Com fábrica no Brasil, os pneus Dunlop oferecem uma série de benefícios:</p>
        </div> 
        <ul class="ps-0 ps-md-5 ps-lg-0 col-md-6 col-lg-5 list mt-5 mt-md-0">
            <li class="list-item">Pneus fabricados sem emenda na estrutura.</li>
            <li class="list-item">30% mais uniforme e 50% mais simétrico.</li>
            <li class="list-item">Menor nível de ruído.</li>
            <li class="list-item">Mais conforto e economia.</li>
            <li class="list-item">Pneu já vem pré-balanceado.</li>
            <li class="list-item">Maior vida útil.</li>
        </ul>
    </div>
</section>

<?php get_template_part('template_parts/featured-cars', null, array('classes' => '')); ?>

<?php get_template_part('template_parts/contacts', null, array('classes' => '')); ?>

<?php get_template_part('template_parts/testimonials', null, array('classes' => '')); ?>

<?php get_footer(); ?>