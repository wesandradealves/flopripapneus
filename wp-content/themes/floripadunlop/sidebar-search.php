<aside class="col-12 col-lg-3 sidebar d-flex flex-wrap align-items-center align-items-lg-start flex-row flex-lg-column">
    <?php get_search_form(); ?>

    <h2 class="title mt-lg-5 mb-lg-4 d-lg-block me-4 me-lg-0">Marca</h2>
    <div class="taxonomies mt-5 mt-lg-0">
        <div class="list d-none d-lg-flex flex-wrap justify-content-between align-items-stretch">
            <?php
                $terms = get_terms( 'marcas', array(
                    // 'orderby'  => 'id',
                    // 'order' => 'ASC',
                    'hide_empty' => true, // default: true
                ) );

                if ( empty( $terms ) || is_wp_error( $terms ) ) {
                    return;
                }

                foreach( $terms as $term ) {
                    ?>
                    <div class="list-item ps-3 pe-3 pb-5 col-6 d-flex flex-wrap justify-content-center align-items-center flex-column">
                        <a href="<?php echo get_term_link( $term ); ?>"><img class="img-fluid" src="<?php echo get_field('thumbnail', $term->taxonomy . '_' . $term->term_id) ? get_field('thumbnail', $term->taxonomy . '_' . $term->term_id) : 'https://olafgrawertviolinstudio.com/wp-content/uploads/2018/03/attachment-no-image-available-600x600-1.png'; ?>"></a>
                    </div>                       
                    <?php 
                }
            ?>
        </div>
        <div class="list d-flex d-lg-none owl-carousel owl-theme">
        <?php
                $terms = get_terms( array(
                    'taxonomy' => 'marcas', // set your taxonomy here
                    'hide_empty' => false, // default: true
                ) );

                if ( empty( $terms ) || is_wp_error( $terms ) ) {
                    return;
                }

                foreach( $terms as $term ) {
                    ?>
                    <div class="list-item d-flex flex-wrap justify-content-center align-items-center flex-column">
                        <a href="<?php echo get_term_link( $term ); ?>"><img class="img-fluid" src="<?php echo get_field('thumbnail', $term->taxonomy . '_' . $term->term_id) ? get_field('thumbnail', $term->taxonomy . '_' . $term->term_id) : 'https://olafgrawertviolinstudio.com/wp-content/uploads/2018/03/attachment-no-image-available-600x600-1.png'; ?>" alt="<?php echo $term->name; ?>"></a>
                    </div>                       
                    <?php 
                }
            ?>            
        </div>                        
    </div>
    <?php if ( is_active_sidebar( 'search' ) ) : ?>
        <?php dynamic_sidebar( 'search' ); ?>
    <?php endif; ?>
</aside>