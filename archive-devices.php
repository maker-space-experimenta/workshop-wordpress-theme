<?php get_header(); ?>



<?php

$post = array();

if ( isset($_GET["lab"]) ) {

} else {
    $posts = get_posts(array(
        'post_type'         => 'devices',
        'posts_per_page'    =>  -1,
        'orderby'           => 'title',
        'order'              => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'ms_devices_workshop',
                'field' => 'term_id',
                'terms' => $_GET["lab"],
            )
        )
    ));
}

?>




<div class="container mt-5  pt-5 pt-md-0">

    <div class="row mt-5 ms-device-list">
        <?php foreach ($posts as $post) : ?>
            <?php $rooms = get_the_terms($post->ID, 'locations')  ?>
            <?php $device_categories = get_the_terms($post->ID, 'device_categories')  ?>

            <div class="col col-xl-3 col-md-6" onclick="window.location.href = '<?php echo get_permalink(); ?>'">

                <div class="device-card mb-5 d-flex flex-column" data-rooms="<?php foreach ($rooms as $room) {
                                                                                    echo $room->term_id . ',';
                                                                                    if ($room->parent) {
                                                                                        echo $room->parent . ',';
                                                                                    }
                                                                                } ?>" data-categories="<?php foreach ($device_categories as $cat) {
                                                                                                            echo $cat->term_id . ',';
                                                                                                            if ($cat->parent) {
                                                                                                                echo $cat->parent . ',';
                                                                                                            }
                                                                                                        } ?>" style="cursor: pointer;">

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="device-card-thumbnail" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);">
                        </div>
                    <?php else : ?>
                        <div class="" style="height: 250px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/image-missing.png); background-size: cover; background-position: center;">
                        </div>
                    <?php endif; ?>

                    <div class="bg-white flex-fill p-2 overflow-hidden text-nowrap">
                        <h5 class="" title="<?php the_title() ?>">
                            <?php the_title() ?>
                        </h5>
                    </div>
                    <div class="p-0 pt-auto">
                        <div class="p-1 pl-2 pr-2 bg-white text-secondary">
                            <?php echo get_the_term_list($post->ID, 'ms_devices_workshop', 'Werkstatt ', '')  ?>
                        </div>
                        <div class="p-1 pl-2 pr-2 bg-white text-secondary">
                            <?php
                            if (has_excerpt()) :
                                the_excerpt();
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>





<?php get_footer(); ?>