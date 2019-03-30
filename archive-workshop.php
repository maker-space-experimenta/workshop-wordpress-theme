<?php get_header(); ?>





<?php 
    $posts = get_posts( array(
        'post_type'         => 'workshop',
        'posts_per_page'    =>  -1,
        'orderby'           => 'meta_key',
        'meta_key'          => 'workshop_start',
        'order'             => 'DESC'
    ));
?>


<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">

            <div class="list-group">

                <?php while ( have_posts() ) : the_post(); ?>

                <?php $rooms = get_the_terms( $post->ID, 'locations')  ?>
                <?php $device_categories = get_the_terms( $post->ID, 'device_categories')  ?>
                <?php $highlight = get_post_meta( $post->ID, 'workshop_option_highlight', true)  ?>
                <?php $free_seats = get_post_meta( $post->ID, 'workshop_option_free_seats', true)  ?>

                <a href="<?php echo get_permalink(); ?>" class="list-group-item list-group-item-action mb-3 <?php if($highlight) { echo 'ms-highlight'; } ?> <?php if(!$free_seats) { echo 'ms-full'; } ?> ">
                    <div class="d-flex flex-column flex-xl-row">
                        <div class="col-12 col-xl-2 d-flex flex-row flex-xl-column w-100">
                            <?php $start_date = get_post_meta($post->ID, 'workshop_start', true) ?>
                            <?php $end_date = get_post_meta($post->ID, 'workshop_end', true) ?>

                            <?php if($start_date ): ?>

                                <div class="w-100"><?php echo $start_date->format('d.m.Y') ?></div>

                                <?php if ($end_date && $start_date->format('d.m.Y') != $end_date->format('d.m.Y')): ?>
                                    <div class="w-100"><?php echo $end_date->format('d.m.Y'); ?></div>
                                <?php endif; ?>

                            <?php endif; ?>
                        </div>

                        <div class="col-12 col-xl-2 d-flex flex-row flex-xl-column w-100">
                            <?php $start_date = get_post_meta($post->ID, 'workshop_start', true) ?>
                            <?php $end_date = get_post_meta($post->ID, 'workshop_end', true) ?>

                            <?php if($start_date ): ?>

                                <div class="w-100"><?php echo $start_date->format('H:i') ?> Uhr</div>

                                <?php if ($end_date): ?>
                                    <div class="w-100"><?php echo $end_date->format('H:i'); ?> Uhr</div>
                                <?php endif; ?>

                            <?php endif; ?>
                        </div>

                        <div class="col w-100 justify-content-between">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-1"><?php echo $post->post_title ?></h5>
                                <span>
                                    <?php if ($free_seats): echo $free_seats . ' freie Plätze'; endif; ?>
                                    <?php if (!$free_seats): ?> Workshop ausgebucht <?php endif; ?>
                                </span>
                            </div>
                            <p class="mb-1"><?php echo get_the_excerpt($post->ID) ?></small></p>
                        </div>
                    </div>


                </a>
                <?php endwhile; ?>
            </div>
        </div>

    </div>
</div>


<script>
    (function () {
        'use strict';

        var filter_rooms = [];
        var filter_categories = [];

        function toggleClasses(elem) {
            $(elem).toggleClass('bg-primary');
            $(elem).toggleClass('bg-light');
            $(elem).toggleClass('text-light');
        }

        function toggleId(arr, id) {
            var found = false;
            if (arr.indexOf(id) == -1) {
                arr.push(id);
            } else {
                arr.splice(arr.indexOf(id), 1);
            }

            return arr;
        }

        function deployFilters() {
            console.log('deploy filters');
            console.log('rooms: ', filter_rooms);
            console.log('categories:', filter_categories);


            $('.device-card').removeClass('d-none');
            $('.device-card').addClass('d-flex');

            if (filter_rooms.length == 0 && filter_categories.length == 0)
                return;

            console.log('filters found');
            $('.device-card').each(function (index, elem) {
                var visible = false;

                filter_rooms.forEach(function (room_id) {
                    if ($(elem).attr('data-rooms').indexOf(room_id) > -1)
                        visible = true;
                });

                if (filter_rooms.length > 0) {
                    filter_categories.forEach(function (cat_id) {
                        if ($(elem).attr('data-categories').indexOf(cat_id) == -1)
                            visible = false;
                    });
                } else {
                    filter_categories.forEach(function (cat_id) {
                        if ($(elem).attr('data-categories').indexOf(cat_id) > -1)
                            visible = true;
                    });
                }


                if (!visible) {
                    $(elem).addClass('d-none');
                    $(elem).removeClass('d-flex');
                    console.log("room not found", elem);
                }

            });

        }

        window.addEventListener('load', function () {
            console.log('load');

            $('.filter_room').on('click', function (event) {
                var room_id = $(event.currentTarget).attr('data-room-id');
                toggleClasses(event.currentTarget);

                toggleId(filter_rooms, room_id);
                deployFilters();
            });



            $('.filter_category').on('click', function (event) {
                var cat_id = $(event.currentTarget).attr('data-category-id');

                toggleClasses(event.currentTarget);
                toggleId(filter_categories, cat_id);
                deployFilters();
            });

            $('#filter_term_device_categories .btn-category').on('click', function (event) {
                let value = $(event.currentTarget).attr('data-value');
                value = value + ',' + $('#input_category_name').val();

                console.log("value", value);

                $(event.currentTarget).children('input').val(value);
                $(event.currentTarget).toggleClass('bg-primary');
                $(event.currentTarget).toggleClass('bg-light');
                $(event.currentTarget).toggleClass('text-light');
            });

            $('#devices-gallery-view-button').on('click', function (event) {
                console.log('gallery');

                event.stopPropagation();
                event.preventDefault();

                $('#devices-gallery-view').removeClass('d-none');
                $('#devices-list-view').addClass('d-none');
            });

            $('#devices-list-view-button').on('click', function (event) {
                event.stopPropagation();
                event.preventDefault();

                $('#devices-gallery-view').addClass('d-none');
                $('#devices-list-view').removeClass('d-none');
            });

        });
    })();
</script>



<?php get_footer(); ?>