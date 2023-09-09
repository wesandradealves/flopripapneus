<?php 
    if(isset($args['node'])) {
        $title = isset($args['node']->name) ? $args['node']->name : $args['node']->post_title;
    }
?>

<section class="page-header">
    <div class="container pt-4 pb-4 d-flex flex-column flex-md-row flex-wrap align-items-start">
        <ul class="breadcrumbs mb-2 d-flex flex-wrap align-items-center">
            <li><a href="<?php echo site_url(); ?>"><?php echo get_the_title( get_option('page_on_front') ); ?></a></li>
            <?php if(is_single() || is_tax()) : ?>
                <li><a href="<?php echo get_permalink( get_page_by_title( 'Galeria' ) ); ?>">Galeria</a></li>
            <?php endif; ?>
            <li><a href="javascript:void(0)"><?php echo isset($args['template']) && $args['template'] === 'search' ? 'Busca' : (isset($args['template']) && $args['template'] === '404' ? '404'  : (isset($args['node']->name) ? $args['node']->name : $args['node']->post_title)); ?></a></li>
        </ul>
        <h2 class="title">
            <span><?php echo isset($args['template']) && $args['template'] === 'search' ? 'Busca' : (isset($args['template']) && $args['template'] === '404' ? '404'  : (isset($args['node']->name) ? $args['node']->name : $args['node']->post_title)); ?></span>
        </h2>
    </div>
</section>