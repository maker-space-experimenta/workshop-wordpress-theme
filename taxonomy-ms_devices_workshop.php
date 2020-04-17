<?php get_header(); ?>



<?php

$posts = get_posts(array(
    'post_type'         => 'devices',
    'posts_per_page'    =>  -1,
    'orderby'           => 'title',
    'order'              => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'ms_devices_workshop',
            'field'    => 'slug',
            'terms'    => get_queried_object()->slug,
        ),
    ),
));

$labs = get_terms(array(
    'taxonomy' => 'ms_devices_workshop',
    'hide_empty' => false,
    'parent' => get_queried_object()->term_id,
    'orderby' => 'name',
    'order' => 'ASC'
));

?>

<div class="container mt-5 mb-5">

    <div class="row mb-3">
        <div class="col d-flex justify-content-end">
        </div>
    </div>

    <div class="row mb-2">
        <div class="col text-justify">
            <h1><?php echo get_queried_object()->name; ?></h1>
            <p>
                <?php echo get_queried_object()->description; ?>
            </p>
        </div>
    </div>

</div>




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





<?php if ($labs) : ?>


    <div class="container mt-5 mb-5">

        <div class="row mb-3">
            <div class="col d-flex justify-content-end">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col text-justify">
                <h1>Untergeordnete Werkstätten</h1>
            </div>
        </div>

    </div>


    <div class="container mt-5 mb-5">
        <div class="row mt-5 ms-device-list">

            <?php foreach ($labs as $lab) : ?>


                <?php $link = get_term_link($lab, 'ms_devices_workshop'); ?>


                <div class="col col-xl-4 col-md-6" onclick="window.location.href = '<?php echo $link; ?>'">

                    <div class="device-card mb-5 d-flex flex-column" style="cursor: pointer;">

                        <?php if ($lab->name == "Digitalwerkstatt") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/03/Digitalwerkstatt-scaled.jpg);"></div>
                        <?php elseif ($lab->name == "Elektronikwerkstatt") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/03/Elektrotechnik-scaled.jpg);"></div>
                        <?php elseif ($lab->name == "Holzwerkstatt") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/03/Holzwerkstatt-scaled.jpg);"></div>
                        <?php elseif ($lab->name == "Medienwerkstatt") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/03/Medienwerkstatt-scaled.jpg);"></div>
                        <?php elseif ($lab->name == "Textilwerkstatt") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/03/Textilwerkstatt-scaled.jpg);"></div>
                        <?php else : ?>
                            <div class="device-card-thumbnail" style="background-image: url();"></div>
                        <?php endif; ?>

                        <div class="bg-white flex-fill p-2 overflow-hidden text-nowrap">
                            <h5 class="" title="<?php echo $lab->name; ?>">
                                <?php echo $lab->name; ?>
                            </h5>
                        </div>
                        <div class="p-0 pt-auto">
                            <div class="p-1 pl-2 pr-2 bg-white text-secondary">
                                <p>
                                    <?php echo $lab->description; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

<?php endif; ?>





<?php get_footer(); ?>