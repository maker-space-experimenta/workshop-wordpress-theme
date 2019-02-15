<?php get_header(); ?>


<form class="form-inline ml-auto" method="GET">
    <div class="container mt-5 d-none">
        <div class="row">
            <div class="col">
                <!-- <div class="btn-group" role="group" aria-label="Basic example">
                <button onclick="window.location.href = '/devices'" type="button"
                    class="btn btn-outline-secondary active" style="border-color: #ced4da;">Alle</button>
                <button onclick="window.location.href = '/locations/makerspace'" type="button"
                    class="btn btn-outline-secondary <?php if(get_queried_object()->term_id == 38) { echo 'active'; } ?>"
                    style="border-color: #ced4da;">Maker Space</button>
                <button onclick="window.location.href = '/locations/sfz'" type="button"
                    class="btn btn-outline-secondary <?php if(get_queried_object()->term_id == 39) { echo 'active'; } ?>"
                    style="border-color: #ced4da;">Schüler Forschungszentrum</button>
            </div> -->
            </div>
            <div class="col p-1">

                <div class="input-group ml-auto">
                    <input type="text" class="form-control" name="s" placeholder="" aria-label="suchen"
                        aria-describedby="basic-addon2">

                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"
                            style="border-color: #ced4da;">suchen</button>

                        <button id="filter-view-button" type="button" class="btn btn-outline-light"
                            style="border-color: #ced4da;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/filter-variant-24px.svg" />
                        </button>

                        <!-- <button id="devices-list-view-button" type="button" class="btn btn-outline-light" style="border-color: #ced4da;">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/baseline-view_list-24px.svg" />
                    </button>
                    <button id="devices-gallery-view-button" type="button" class="btn btn-outline-light" style="border-color: #ced4da;">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/baseline-view_module-24px.svg" />
                    </button> -->
                    </div>
                </div>

            </div>
        </div>

        <div class="ms-filter row"><div class="col">Räume</div></div>
        <div class="ms-filter row">
                <?php
                $terms = get_terms( array(
                    'taxonomy' => 'locations',
                    'hide_empty' => true,
                    ) );
                
                foreach ($terms as $term):
            ?>
            <?php if ( !$term->parent ): ?>
            <div class="col">
                <div class="container-fluid">
                    <div class="row">
                        <div class="btn_ms_filter col bg-light text-center p-2 m-1 text-nowrap c-pointer font-weight-bold"><?php echo $term->name ?></div>
                    </div>
                    <div class="row">

                        <?php
                                $child_terms = get_terms( array(
                                'taxonomy' => 'locations',
                                'hide_empty' => true,
                                'child_of' => $term->term_id
                                ) );
                            
                            foreach ($child_terms as $child_term):
                        ?>

                        <div class="btn_ms_filter col-4 bg-light text-center p-2 m-1 text-nowrap c-pointer "><?php echo $child_term->name ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            
            <!-- <div class="col bg-light text-center p-2 m-1 text-nowrap c-pointer">Schüler Forschungszentrum</div> -->
        </div>

        <div class="ms-filter row mt-4"><div class="col">Kategorien</div></div>
        <div class="ms-filter row" id="filter_term_device_categories">
            <?php
                $terms = get_terms( array(
                    'taxonomy' => 'device_categories',
                    'hide_empty' => false,
                    ) );
                
                foreach ($terms as $term):
            ?>
            <div class="col">
                <div class="container-fluid">
                    <div class="row">
                        <div class="btn_ms_filter col bg-light text-center p-2 m-1 text-nowrap c-pointer"><?php echo $term->name ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>

    <input type="hidden" name="category_name" id="input_category_name" />
    <input type="hidden" name="category_name" id="input_locations" />

</form>

<script>
    (function () {
        'use strict';

        window.addEventListener('load', function () {
            console.log('load');

            $('#filter-view-button').on('click', function (event) {
                $('.ms-filter').toggleClass('d-none');
            });

            $('.btn_ms_filter').on('click', function (event) {
                
                $(event.currentTarget).toggleClass('bg-primary');
                $(event.currentTarget).toggleClass('bg-light');
                $(event.currentTarget).toggleClass('text-light');
            })


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

<hr />


<div class="container mt-5">

    <div class="row" id="devices-gallery-view">
        <?php 
            $posts = get_posts( array(
                'post_type'         => 'devices',
                'posts_per_page'    =>  -1,
                'orderby'           => 'title',
                'order'              => 'ASC'
            ));

            while ( have_posts() ) : the_post(); 
        ?>
        <div class="col-3 mb-5 d-flex flex-column" onclick="window.location.href = '<?php echo get_permalink(); ?>'"
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
                <div class="p-1 pl-2 pr-2 bg-white text-secondary">Führerschein 01-001</div>
                <div class="p-1 pl-2 pr-2 bg-white text-secondary">
                    <?php echo get_the_term_list( $post->ID, 'locations', 'Standort ', '')  ?>
                </div>
                <div class="d-flex">
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

    <div class="row d-none" id="devices-list-view">
        <div class="col">
            <div class="ms-devices-list">

                <?php $posts = query_posts( $query_string . '&orderby=title&order=asc' ); ?>
                <?php while ( have_posts() ) : the_post(); ?>

                <a href="<?php echo get_permalink(); ?>" class="text-dark" style="text-decoration:none;">
                    <div class="d-flex border border-1 mb-2 bg-white">

                        <?php if ( has_post_thumbnail() ): ?>
                        <div class=""
                            style="min-width: 100px; min-height: 100px; background-image: url(<?php the_post_thumbnail_url( 'medium' ); ?>); background-size: cover; background-position: center;">
                        </div>
                        <?php else: ?>
                        <div class=""
                            style="min-width: 100px; min-height: 100px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/image-missing.png); background-size: cover; background-position: center;">
                        </div>
                        <?php endif; ?>

                        <div class="w-100 d-flex flex-column">
                            <div class="m-3 d-flex flex-column w-100">

                                <div class="d-flex text-nowrap text-truncate">
                                    <h4 class="">
                                        <?php the_title() ?>
                                    </h4>
                                </div>
                                <div class="mt-auto ms-devices-list-footer text-secondary">
                                    <span class="mr-2">Aktuell nicht belegt</span>
                                    <span class="mr-2">|</span>
                                    <span class="mr-2">
                                        <?php echo get_the_term_list( $post->ID, 'locations', 'Standort ', '')  ?></span>
                                    <span class="mr-2">|</span>
                                    <span>Führerschein [01-005] notwendig</span>
                                </div>
                            </div>

                            <div class="d-flex mt-auto">
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);"
                                    title="00 - 01 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);"
                                    title="01 - 02 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);"
                                    title="02 - 03 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);"
                                    title="03 - 04 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);"
                                    title="04 - 05 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);"
                                    title="05 - 06 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);"
                                    title="06 - 07 Uhr geschlossen"></div>
                                <div class="bg-danger" style="height: 5px; width: calc(100% / 24);"
                                    title="07 - 08 Uhr reserviert"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);"
                                    title="08 - 09 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);"
                                    title="09 - 10 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);"
                                    title="10 - 11 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);"
                                    title="11 - 12 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);"
                                    title="12 - 13 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);"
                                    title="13 - 14 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);"
                                    title="14 - 15 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);"
                                    title="15 - 16 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);"
                                    title="16 - 17 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);"
                                    title="17 - 18 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);"
                                    title="18 - 19 Uhr frei"></div>
                                <div class="bg-danger" style="height: 5px; width: calc(100% / 24);"
                                    title="19 - 20 Uhr reserviert"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);"
                                    title="20 - 21 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);"
                                    title="21 - 22 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);"
                                    title="22 - 23 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);"
                                    title="23 - 00 Uhr geschlossen"></div>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endwhile; ?>

            </div>

        </div>
    </div>
</div>





<?php get_footer(); ?>