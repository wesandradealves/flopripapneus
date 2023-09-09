<?php 
    $query = new WP_Query( array(
        'numberposts'   => -1,
        'post_type'     => 'testimonials'
    ) );
    if ( $query->have_posts() ) :
?>
    <section class="section" data-section="depoimentos">
        <div class="container">
            <div class="section-header d-flex flex-column justify-content-center col-lg-7 m-auto">
                <h2 class="title">A única coisa que a gente 
                    <br/>não troca: <strong>a sua confiança.</strong></h2>
                <p class="text mt-3">Veja o que nossos clientes falam dos nossos produtos e serviços.</p>
            </div>
            <div class="d-block ms-auto me-auto col-12 col-lg-8 testimonials">
                <div class="owl-carousel owl-theme">

                
                    <?php 
                        while ( $query->have_posts() ) : $query->the_post();
                            ?>
                            <div class="item ps-2">
                                <div class="avatar mb-4"><img src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri().'/img/'.'blank-profile-picture-973460_1280.jpg'; ?>" alt="<?php echo get_the_title(); ?>"></div>
                                <h3 class="title"><?php echo get_the_title(); ?></h3>
                                <p class="text">“<?php echo get_the_content(); ?>”</p>
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