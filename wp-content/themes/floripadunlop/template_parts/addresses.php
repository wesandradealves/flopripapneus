<?php if( have_rows('addresses', 'option') ): ?>
    <?php if(!$args['cards']) : ?>
        <ul class="addresses <?php echo $args['classes']; ?>">
            <?php $i = 0; while( have_rows('addresses', 'option') ) : $i++; the_row(); ?>
                <li class="d-flex flex-wrap mb-4">
                    <span class="me-4"><i class="fa-solid fa-location-dot"></i></span>
                    <span>
                        <a href="<?php echo get_sub_field('google_maps'); ?>" target="_blank"><?php echo get_sub_field('endereco'); ?></a>
                        <p class="d-block mt-2">
                            <i class="fa-solid fa-phone me-2"></i>  <a href="tel:+55<?php echo str_replace([':', '\\', '/', '*', '-', ' ', '.'], '', get_sub_field('telefone')); ?>"><?php echo get_sub_field('telefone'); ?></a>
                        </p>
                    </span>
                </li>
            <?php endwhile; ?>                                   
        </ul>    
    <?php else : ?>
        <?php $i = 0; while( have_rows('addresses', 'option') ) : $i++; the_row(); ?>
            <div class="card --thumbnail p-2">
                <div class="card-inner d-flex flex-column">
                    <?php if(!isset($args['template'])) : ?>
                        <img src="<?php echo get_sub_field('image'); ?>" alt="<?php echo get_sub_field('local'); ?>" class="img-fluid mb-4 ms-auto me-auto">
                    <?php endif; ?>
                    <h3 class="title mb-2"><small class="d-block mb-1"><?php echo get_sub_field('matriz') ? 'Matriz' : 'Filial'; ?></small><?php echo get_sub_field('local'); ?></h3>
                    <p class="text <?php if(isset($args['template']) && $args['template'] === 'about') : ?> col-lg-9 <?php endif; ?>">
                        <a href="<?php echo get_sub_field('google_maps'); ?>" target="_blank"><?php echo strip_tags(get_sub_field('endereco')); ?></a></p>
                    <p class="text">
                        <i class="fas fa-phone"></i> <a href="tel:+55<?php echo str_replace([':', '\\', '/', '*', '-', ' ','.'], '', get_sub_field('telefone')); ?>"><?php echo get_sub_field('telefone'); ?></a>
                    </p>
                    <?php if(isset($args['template']) && $args['template'] === 'about') : ?>
                        <img src="<?php echo get_sub_field('image'); ?>" alt="<?php echo get_sub_field('local'); ?>" class="img-fluid mb-4 ms-auto me-auto">
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php endif; ?>