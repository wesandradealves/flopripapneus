<?php 
    $arr = [
        'galeria',
        'search',
        'taxonomy',
        'single'
    ];

    $query = new WP_Query( array(
        'numberposts'   => -1,
        'post_type'     => 'carros',
        'meta_key'      => 'featured',
        'meta_value'    => TRUE
    ) );
    if ( $query->have_posts() ) :
        ?>
        <section class="section <?php if(isset($args['template']) && in_array($args['template'], $arr, true)) : ?> --variation <?php endif; ?>" data-section="home-galeria">
            <div class="container d-flex flex-wrap align-items-stretch justify-content-between">
                <div class="section-header pe-md-5 col-lg-4">
                    <h2 class="title">Veja quem já está rodando com estilo.</h2>
                    <p class="text mt-3">Na Floripa Pneus cuidamos de cada carro como seu fosse o nosso. E fazemos questão de mostrar o resultado.</p>
                    <?php if(get_page_by_title( 'Galeria' ) && (get_page_by_title( 'Galeria' ) && get_the_title() !== get_page_by_title( 'Galeria' )->post_title)) : ?>
                        <a href="<?php echo get_permalink( get_page_by_title( 'Galeria' ) ); ?>" class="btn d-inline-flex default --variation m-auto mt-4">Ver nossa Galeria</a>
                    <?php elseif((get_page_by_title( 'Galeria' ) && get_the_title() === get_page_by_title( 'Galeria' )->post_title) && get_page_by_title( 'Contato' )) : ?>
                        <a href="<?php echo get_permalink( get_page_by_title( 'Contato' ) ); ?>" class="btn d-inline-flex default --variation m-auto mt-4">QUERO UM ORÇAMENTO</a>
                    <?php endif; ?>   
                </div> 
                <div class="col-12 col-lg-7 mt-5 mt-md-0">
                    <div class="single-carousel ps-lg-5 pe-lg-5">
                        <div class="owl-carousel owl-theme">
                            <?php 
                                while ( $query->have_posts() ) : $query->the_post();
                                    ?>
                                    <div class="item">
                                        <a href="<?php echo get_the_permalink(); ?>"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>"></a>
                                    </div>                                    
                                    <?php 
                                endwhile;
                                wp_reset_query();
                                wp_reset_postdata(); 
                            ?>                                                                                  
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php     
    endif;  
?>