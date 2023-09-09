<?php 
    if(isset($args['node'])) {
        $title = isset($args['node']->name) ? $args['node']->name : $args['node']->post_title;
    }
?>

<section class="page-header">
    <div class="container d-flex flex-column flex-md-row flex-wrap align-items-start">
        <h2 class="title p-4 p-md-5"><span class="ms-auto"><?php echo isset($args['template']) && $args['template'] === 'search' ? 'Busca: "'.$_GET['s'].'"' : (isset($args['template']) && $args['template'] === '404' ? '404'  : (isset($args['node']->name) ? $args['node']->name : $args['node']->post_title)); ?></span></h2>
        <ul class="flex-fill breadcrumbs p-4 d-flex flex-wrap align-items-center justify-content-center justify-content-md-start">
            <li><a href="<?php echo site_url(); ?>"><?php echo get_the_title( get_option('page_on_front') ); ?></a></li>
            <?php if(is_single() || is_tax()) : ?>
                <li><a href="<?php echo get_permalink( get_page_by_title( 'Galeria' ) ); ?>">Galeria</a></li>
            <?php endif; ?>
            <li><a href="javascript:void(0)"><?php echo isset($args['template']) && $args['template'] === 'search' ? 'Busca' : (isset($args['template']) && $args['template'] === '404' ? '404'  : (isset($args['node']->name) ? $args['node']->name : $args['node']->post_title)); ?></a></li>
        </ul>
    </div>
</section>