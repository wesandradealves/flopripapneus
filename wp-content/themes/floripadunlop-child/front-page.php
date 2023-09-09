<?php 
    get_header(); 
    $banner = get_field('banner');
?>

<?php if($banner) : ?>
    <section class="banner d-flex flex-column justify-content-center overflow-hidden">
        <div class="container d-flex col-md-9 col-xl-8 flex-column flex-md-row flex-wrap ps-5 pe-5 ps-md-0 pe-md-0">
            <?php if($banner['title'] && $banner['text']) : ?>
                <div class="col-md-6 col-lg-5">
                    <h2 class="title"><?php echo strip_tags($banner['title']); ?></h2>
                    <div class="text mt-5">
                        <?php printf($banner['text']); ?>
                    </div>
                    <?php if($banner['cta']['label'] && $banner['cta']['link']) : ?>
                        <a href="<?php echo $banner['cta']['link']; ?>" class="btn mt-4 default d-inline-flex"><?php echo $banner['cta']['label']; ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <picture>
            <source srcset="<?php echo $banner['image']['image']; ?>" media="(min-width: 768px)" >
            <img class="img-fluid" src="<?php echo $banner['image']['image_mobile'] ? $banner['image']['image_mobile'] : $banner['image']['image']; ?>" alt="<?php echo $banner['title']; ?>" loading="lazy">
        </picture>  
        <a href="javascript:void(0)" class="scrolldown">
            <i class="fas fa-solid fa-angle-down"></i>
        </a>         
    </section>
<?php endif; ?>

<?php 
    $query = new WP_Query( array(
        'numberposts'   => -1,
        'order' => 'ASC',
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
                    <p class="text mt-3">Na Floripa Pneus você encontra a linha completa de pneus Continental e serviços de qualidade com o melhor custo x benefício. Tudo com a agilidade que você espera e o cuidado que o seu automóvel merece.</p>
                </div>
                <div class="default-carousel col-lg-9 m-auto">
                    <div class="owl-carousel owl-theme">
                        <?php 
                            while ( $query->have_posts() ) : $query->the_post();
                                ?>
                                <div class="card p-2">
                                    <div class="card-inner d-flex flex-column">
                                        <img src="<?php echo get_field('image'); ?>" alt="" class="img-fluid me-auto" loading="lazy">
                                        <h3 class="title mb-2"><?php echo get_the_title(); ?></h3>
                                        <!-- <p class="text"><?php echo get_the_excerpt(); ?></p> -->
                                    </div>
                                </div>   
                                <?php 
                            endwhile;
                            wp_reset_query();
                            wp_reset_postdata(); 
                        ?>
                    </div>
                </div>
                <?php if(get_page_by_title( 'Produtos e Serviços' )) : ?>
                    <div class="d-flex flex-column justify-content-center align-items-center mt-4 mb-5">
                        <a href="<?php echo get_permalink( get_page_by_title( 'Produtos e Serviços' ) ); ?>" class="btn default m-auto">Conheça nossos serviços</a>
                    </div>
                <?php endif; ?>    
            </div>
        </section>
        <?php     
    endif;  
?>

<?php if( have_rows('addresses', 'option') ): ?>
    <section class="section" data-section="unidades">
        <div class="container">
            <div class="section-header d-flex flex-column justify-content-center col-lg-7 m-auto">
                <h2 class="title"><strong>Floripa Pneus.</strong> A maior variedade de pneus Continental de Floripa.</h2>
                <p class="text mt-3">Especializada em pneus, rodas, suspensão e freios, a Floripa Pneus oferece toda a linha Continental com o mais qualificado atendimento.</p>
                <!-- <?php if(get_page_by_title( 'Produtos e Serviços' )) : ?>
                    <a href="<?php echo get_permalink( get_page_by_title( 'Produtos e Serviços' ) ); ?>" class="btn default --variation m-auto mt-4">Conheça nossos serviços</a>
                <?php endif; ?>    -->
            </div> 
            <div class="single-carousel col-lg-9 m-auto">
                <div class="owl-carousel owl-theme">
                    <?php get_template_part('template_parts/addresses', null, array('classes' => '', 'cards' => true)); ?>
                </div>
            </div>      
            <div class="section-header mt-5 pt-5 mb-5 pb-5 d-flex flex-column justify-content-center col-lg-7 m-auto">
                <h2 class="title">Confira outros serviços que você<br>encontra na Floripa.</h2>
            </div>                   
            <?php 
                $query = new WP_Query( array(
                    'numberposts'   => -1,
                    'order' => 'ASC',
                    'post_type'     => 'servicos'
                ) );
                if ( $query->have_posts() ) : 
            ?>     
                <ul class="produtos d-flex flex-wrap  justify-content-center align-items-stretch mb-5">
                    <?php 
                        while ( $query->have_posts() ) : $query->the_post();
                            ?>
                            <li class="item col-12 col-md-4 ps-2 pe-2 mb-4">
                                <div class="card --thumbnail" <?php if(get_page_by_title( 'Produtos e Serviços' )) : ?> onclick="location.href = '<?php echo get_permalink( get_page_by_title( 'Produtos e Serviços' ) ); ?>';" <?php endif; ?> >
                                    <div class="card-inner d-flex flex-column">
                                        <div class="thumbnail d-block" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) center 0 / cover no-repeat"></div>
                                        <h3 class="title p-3 pt-5"><?php echo get_the_title(); ?></h3>
                                    </div>
                                </div>                        
                            </li>                        
                            <?php 
                        endwhile;
                        wp_reset_query();
                        wp_reset_postdata(); 
                    ?>                                                                                                                                                                
                </ul>
                <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                    <a href="<?php echo get_permalink( get_page_by_title( 'Produtos e Serviços' ) ); ?>" class="btn default --variation m-auto">Conheça nossos serviços</a>
                </div>
            <?php
                endif;  
            ?>                              
        </div>
    </section>
<?php endif; ?>

<section class="section" data-section="floripa-pneus" style="background-image: url(<?php echo get_stylesheet_directory_uri().'/img/'; ?>car.png)">
    <div class="container d-flex flex-wrap align-items-center justify-content-between">
        <div class="section-header col-12 col-lg-5">
            <h2 class="title">Paixão pelo desempenho,<br/>qualidade pela mobilidade.</h2>
            <p class="text mt-3">
                A Floripa Pneus é parceira da Continental, a mais tradicional marca de pneus da Alemanha. 
                <br/><br/>
                Sinônimo de sustentabilidade, a Continental tem uma das mais modernas fábricas de pneus do mundo aqui no Brasil, em Camaçari, na Bahia.
                <br/><br/>
                O resultado de tanto investimento é sentido por motoristas nas ruas e estradas, tanto pelo desempenho, quanto pela segurança.
            </p>
        </div> 
        <div class="ps-0 ps-lg-5 ps-lg-0 col-12 col-lg-6 mt-5 mt-lg-0">
            <img class="m-auto d-block img-fluid" width="430" src="<?php echo get_stylesheet_directory_uri().'/img/'; ?>continental-w.png" loading="lazy" />
        </div>
    </div>
</section>

<?php get_template_part('template_parts/testimonials', null, array('classes' => '')); ?>

<?php get_template_part('template_parts/contacts', null, array('classes' => '')); ?>

<?php get_footer(); ?>