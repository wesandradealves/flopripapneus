<?php if( have_rows('addresses', 'option') ): ?>
    <?php if(!$args['cards']) : ?>
        <ul class="addresses <?php echo $args['classes']; ?>">
            <?php $i = 0; while( have_rows('addresses', 'option') ) : $i++; the_row(); ?>
                <li class="d-flex flex-wrap mb-4">
                    <span class="me-2"><i class="fa-solid fa-location-dot"></i></span>
                    <span>
                        <a href="<?php echo get_sub_field('google_maps'); ?>" target="_blank"><?php echo get_sub_field('endereco'); ?></a>
                        <span class="d-block mt-2">
                            <a href="tel:+55<?php echo str_replace([':', '\\', '/', '*', '-', ' ', '.'], '', get_sub_field('telefone')); ?>"><i class="fa-solid fa-phone me-2"></i>  <?php echo get_sub_field('telefone'); ?></a>
                        </span>
                    </span>
                </li>
            <?php endwhile; ?>                                   
        </ul>    
    <?php else : ?>
        <?php $i = 0; while( have_rows('addresses', 'option') ) : $i++; the_row(); ?>
            <div class="card --thumbnail p-2">
                <div class="card-inner d-flex flex-column <?php if(isset($args['template']) && $args['template'] === 'about') : ?> align-items-start <?php else : ?> align-items-center <?php endif; ?>">
                    <?php if(!isset($args['template'])) : ?>
                        <img src="<?php echo get_sub_field('image'); ?>" alt="<?php echo get_sub_field('local'); ?>" class="img-fluid mb-4 ms-auto me-auto">
                    <?php endif; ?>
                    <p class="text ps-0">
                        <a href="<?php echo get_sub_field('google_maps'); ?>" target="_blank"><?php echo strip_tags(get_sub_field('endereco')); ?></a>
                    </p>
                    <p class="text">
                        <a href="tel:+55<?php echo str_replace([':', '\\', '/', '*', '-', ' ', '.'], '', get_sub_field('telefone')); ?>"><i class="fas fa-phone"></i> <?php echo get_sub_field('telefone'); ?></a>
                    </p>
                    <?php if(isset($args['template'])) : ?>
                        <img src="<?php echo get_sub_field('image'); ?>" alt="<?php echo get_sub_field('local'); ?>" class="img-fluid mb-4 ms-auto me-auto">
                    <?php endif; ?>                    
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php endif; ?>