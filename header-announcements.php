<?php

$announcements = get_posts(array(
    'post_type'         => 'announcement',
    'posts_per_page'    =>  -1
));

?>



<?php foreach ($announcements as $announcement) : ?>
    <?php if (get_post_meta($announcement->ID, 'announcement_option_show_global', true)) : ?>

        <a href="<?php echo get_permalink($announcement->ID); ?>">
            <div class="alert alert-danger border-0 m-0" role="alert" style="display: fixed; background-color: #e40033; color: #FFF;">
                <h4 class="mr-5 font-weight-bold"><?php echo get_the_title($announcement); ?></h4>
                <span class="">

                    <?php
                    if (has_excerpt($announcement->ID)) :
                        echo get_the_excerpt($announcement->ID);
                    else :
                        echo $announcement->post_content;
                    endif;
                    ?></span>
                <span class="">Mehr erfahren ...</span>
            </div>
        </a>

    <?php endif; ?>
<?php endforeach; ?>