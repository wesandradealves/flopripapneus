<?php get_header(); ?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>
<section class="section">
    <div class="container">
        <div class="section-header">
            <?php the_content(); ?>
        </div> 
    </div>
</section>
<?php get_footer(); ?>