<?php get_header(); ?>





<?php 
    $posts = get_posts( array(
        'post_type'         => 'devices',
        'posts_per_page'    =>  -1,
        'orderby'           => 'title',
        'order'              => 'ASC'
    ));
?>


<div class="container-fluid mt-5">
    <div class="row">
    
        <div class="col-12 col-md-4 col-lg-2">
            <form class="" method="GET">
                <input type="hidden" name="category_name" id="input_category_name" />
                <input type="hidden" name="category_name" id="input_locations" />


                <div class="">
                    <div class="input-group ml-auto">
                        <input type="text" class="form-control" name="s" placeholder="" aria-label="suchen"
                            aria-describedby="basic-addon2">

                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"
                                style="border-color: #ced4da;">suchen</button>

                            <!-- <button id="filter-view-button" type="button" class="btn btn-outline-light"
                                style="border-color: #ced4da;">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/filter-variant-24px.svg" />
                            </button> -->

                            <!-- <button id="devices-list-view-button" type="button" class="btn btn-outline-light" style="border-color: #ced4da;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/baseline-view_list-24px.svg" />
                        </button>
                        <button id="devices-gallery-view-button" type="button" class="btn btn-outline-light" style="border-color: #ced4da;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/baseline-view_module-24px.svg" />
                        </button> -->
                        </div>
                    </div>
                </div>

                <h3 style="font-size: 16px; color: #666;">Räume</h3>

                <div>
                    <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'locations',
                            'hide_empty' => true,
                            ) );
                        
                        foreach ($terms as $term):
                    ?>
                    <?php if ( !$term->parent ): ?>
                    <div class="">
                        <div class="btn_ms_filter filter_room bg-light text-center p-2 m-1 mt-4 text-nowrap c-pointer font-weight-bold" data-room-id="<?php echo $term->term_id ?>">
                            <?php echo $term->name ?>
                        </div>
                        <div class="d-flex flex-wrap">

                            <?php
                                $args = array(
                                    'taxonomy' => 'locations',
                                    'hide_empty' => true,
                                    'child_of' => $term->term_id
                                );
                                $child_terms = get_terms( $args );
                                
                                foreach ($child_terms as $child_term):
                            ?>

                            <div  data-room-id="<?php echo $child_term->term_id ?>" class="btn_ms_filter filter_room flex-fill bg-light text-center p-2 m-1 text-nowrap c-pointer " style="font-size: 0.8rem;">
                                <?php echo $child_term->name ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <h3 class="mt-4" style="font-size: 16px; color: #666;">Kategorien</h3>

                <div class="d-flex flex-wrap">
                    <?php
                    $terms = get_terms( array(
                        'taxonomy' => 'device_categories',
                        'hide_empty' => false,
                        ) );
                    
                    foreach ($terms as $term):
                    ?>
                    <div  data-category-id="<?php echo $term->term_id ?>" class="btn_ms_filter filter_category flex-fill bg-light text-center p-2 m-1 text-nowrap c-pointer" style="font-size: 0.8rem;">
                        <?php echo $term->name ?>
                    </div>
                    <?php endforeach; ?>
                </div>

            </form>
        </div>

        <div class="col d-flex flex-wrap">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php $rooms = get_the_terms( $post->ID, 'locations')  ?>
        <?php $device_categories = get_the_terms( $post->ID, 'device_categories')  ?>
        <div class="device-card col-12 col-md-6 col-lg-4 col-xl-3 mb-5 d-flex flex-column" 
             onclick="window.location.href = '<?php echo get_permalink(); ?>'"
             data-rooms="<?php foreach($rooms as $room) { echo $room->term_id . ','; if ($room->parent) { echo $room->parent . ','; } } ?>"
             data-categories="<?php foreach($device_categories as $cat) { echo $cat->term_id . ','; if ($cat->parent) { echo $cat->parent . ','; } } ?>"
             style="cursor: pointer;">
            <?php if ( has_post_thumbnail() ): ?>
            <div class=""
                style="height: 250px; background-color: rgb(0,0,0,0.3); background-image: url(<?php the_post_thumbnail_url( 'medium' ); ?>); background-size: cover; background-position: center;">
            </div>
            <?php else: ?>
            <div class=""
                style="height: 250px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/image-missing.png); background-size: cover; background-position: center;">
            </div>
            <?php endif; ?>

            <div class="bg-white flex-fill p-2">
                <h5 class="">
                    <?php the_title() ?>
                </h5>
            </div>
            <div class="p-0 pt-auto" style="font-size: 0.72rem;">
                <!-- <div class="p-1 pl-2 pr-2 bg-white text-secondary">Führerschein 01-001</div> -->
                <div class="p-1 pl-2 pr-2 bg-white text-secondary">
                    <?php echo get_the_term_list( $post->ID, 'locations', 'Standort ', '')  ?>
                </div>
                <div class="d-none ">
                    <div class="bg-info" style="height: 10px; width: calc(100% / 24);" title="00 - 01 Uhr geschlossen">
                    </div>
                    <div class="bg-info" style="height: 10px; width: calc(100% / 24);" title="01 - 02 Uhr geschlossen">
                    </div>
                    <div class="bg-info" style="height: 10px; width: calc(100% / 24);" title="02 - 03 Uhr geschlossen">
                    </div>
                    <div class="bg-info" style="height: 10px; width: calc(100% / 24);" title="03 - 04 Uhr geschlossen">
                    </div>
                    <div class="bg-info" style="height: 10px; width: calc(100% / 24);" title="04 - 05 Uhr geschlossen">
                    </div>
                    <div class="bg-info" style="height: 10px; width: calc(100% / 24);" title="05 - 06 Uhr geschlossen">
                    </div>
                    <div class="bg-info" style="height: 10px; width: calc(100% / 24);" title="06 - 07 Uhr geschlossen">
                    </div>
                    <div class="bg-danger" style="height: 10px; width: calc(100% / 24);" title="07 - 08 Uhr reserviert">
                    </div>
                    <div class="bg-success" style="height: 10px; width: calc(100% / 24);" title="08 - 09 Uhr frei">
                    </div>
                    <div class="bg-success" style="height: 10px; width: calc(100% / 24);" title="09 - 10 Uhr frei">
                    </div>
                    <div class="bg-success" style="height: 10px; width: calc(100% / 24);" title="10 - 11 Uhr frei">
                    </div>
                    <div class="bg-success" style="height: 10px; width: calc(100% / 24);" title="11 - 12 Uhr frei">
                    </div>
                    <div class="bg-success" style="height: 10px; width: calc(100% / 24);" title="12 - 13 Uhr frei">
                    </div>
                    <div class="bg-success" style="height: 10px; width: calc(100% / 24);" title="13 - 14 Uhr frei">
                    </div>
                    <div class="bg-success" style="height: 10px; width: calc(100% / 24);" title="14 - 15 Uhr frei">
                    </div>
                    <div class="bg-success" style="height: 10px; width: calc(100% / 24);" title="15 - 16 Uhr frei">
                    </div>
                    <div class="bg-success" style="height: 10px; width: calc(100% / 24);" title="16 - 17 Uhr frei">
                    </div>
                    <div class="bg-success" style="height: 10px; width: calc(100% / 24);" title="17 - 18 Uhr frei">
                    </div>
                    <div class="bg-success" style="height: 10px; width: calc(100% / 24);" title="18 - 19 Uhr frei">
                    </div>
                    <div class="bg-danger" style="height: 10px; width: calc(100% / 24);" title="19 - 20 Uhr reserviert">
                    </div>
                    <div class="bg-info" style="height: 10px; width: calc(100% / 24);" title="20 - 21 Uhr geschlossen">
                    </div>
                    <div class="bg-info" style="height: 10px; width: calc(100% / 24);" title="21 - 22 Uhr geschlossen">
                    </div>
                    <div class="bg-info" style="height: 10px; width: calc(100% / 24);" title="22 - 23 Uhr geschlossen">
                    </div>
                    <div class="bg-info" style="height: 10px; width: calc(100% / 24);" title="23 - 00 Uhr geschlossen">
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        </div>

        <div class="col d-none">

        </div>

        <div class="col-2 d-none d-lg-block"></div>


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
            $('.device-card').each(function(index, elem) {
                var visible = false;
                
                filter_rooms.forEach(function(room_id) {
                    if ($(elem).attr('data-rooms').indexOf(room_id) > -1)
                        visible = true;
                });

                if (filter_rooms.length > 0) {
                    filter_categories.forEach(function(cat_id) {
                        if ($(elem).attr('data-categories').indexOf(cat_id) == -1)
                            visible = false;
                    });
                } else {
                    filter_categories.forEach(function(cat_id) {
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

            $('.filter_room').on('click', function(event) {
                var room_id = $(event.currentTarget).attr('data-room-id');
                toggleClasses(event.currentTarget);

                toggleId(filter_rooms, room_id);
                deployFilters();
            });

            

            $('.filter_category').on('click', function(event) {
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