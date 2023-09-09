<?php
    echo '<h1 class="'.$args['classes'].'">';
        echo '<a href="'.site_url().'" title="'.get_bloginfo('title').'"><img class="img-fluid" alt="'.get_bloginfo('title').'" src="'.get_field('logo', 'option').'"/></a>';
    echo '</h1>';
?>