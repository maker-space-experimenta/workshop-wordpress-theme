<?php get_header(); ?>


<div class="container mt-5">
    <div class="row">
        <div class="col">

            <nav class="navbar navbar-expand-lg navbar-light bg-none">

                <form class="form-inline ml-auto" method="GET">
                    <div class="input-group ">
                        <input type="text" class="form-control" name="s" placeholder="" aria-label="suchen" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" style="border-color: #ced4da;">suchen</button>

                            <button id="devices-list-view-button" type="button" class="btn btn-outline-light" style="border-color: #ced4da;">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/baseline-view_list-24px.svg" />
                            </button>
                            <button id="devices-gallery-view-button" type="button" class="btn btn-outline-light" style="border-color: #ced4da;">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/baseline-view_module-24px.svg" />
                            </button>
                        </div>
                    </div>

                </form>

            </nav>

        </div>
    </div>
</div>


<div class="container mt-5">

    <div class="row" id="devices-gallery-view">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-4 mb-5 d-flex flex-column" onclick="window.location.href = '<?php echo get_permalink(); ?>'"
                style="cursor: pointer;">
                <?php if ( has_post_thumbnail() ): ?>
                <div class="" style="height: 250px; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"></div>
                <?php else: ?>
                <div class="" style="height: 250px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/image-missing.png); background-size: cover; background-position: center;"></div>
                <?php endif; ?>

                <div class="bg-white flex-fill p-2">
                    <h5 class="">
                        <?php the_title() ?>
                    </h5>
                </div>
                <div class="bg-white p-2 text-truncate text-wrap" style="max-height: 250px;">
                    <p>
                        <?php
                            if(has_excerpt()):
                                the_excerpt();
                            else:
                                the_content();
                            endif;
                        ?>
                    </p>
                </div>
            </div>
            <?php endwhile; endif; ?>
    </div>

    <div class="row d-none" id="devices-list-view">
        <div class="col">
            <div class="ms-devices-list">

                <?php while ( have_posts() ) : the_post(); ?>

                <a href="<?php echo get_permalink(); ?>" class="text-dark" style="text-decoration:none;">
                    <div class="d-flex border border-1 mb-2 bg-white">

                        <?php if ( has_post_thumbnail() ): ?>
                        <div class="" style="min-width: 100px; min-height: 100px; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"></div>
                        <?php else: ?>
                        <div class="" style="min-width: 100px; min-height: 100px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/image-missing.png); background-size: cover; background-position: center;"></div>
                        <?php endif; ?>

                        <div class="w-100 d-flex flex-column">
                            <div class="m-3 d-flex flex-column w-100">

                                <div class="d-flex text-nowrap text-truncate">
                                    <h4 class="">
                                        <?php the_title() ?>
                                    </h4>
                                </div>
                                <div class="mt-auto ms-devices-list-footer text-secondary">
                                    <span class="mr-2">geschrieben von <?php the_author(); ?></span>
                                    <span class="mr-2">|</span>
                                    <span class="mr-2">Standort: Digitallabor</span>
                                    <span class="mr-2">|</span>
                                    <span>Führerschein [01-005] notwendig</span>
                                </div>
                            </div>

                            <div class="d-flex mt-auto">
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);" title="00 - 01 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);" title="01 - 02 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);" title="02 - 03 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);" title="03 - 04 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);" title="04 - 05 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);" title="05 - 06 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);" title="06 - 07 Uhr geschlossen"></div>
                                <div class="bg-danger" style="height: 5px; width: calc(100% / 24);" title="07 - 08 Uhr reserviert"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);" title="08 - 09 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);" title="09 - 10 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);" title="10 - 11 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);" title="11 - 12 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);" title="12 - 13 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);" title="13 - 14 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);" title="14 - 15 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);" title="15 - 16 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);" title="16 - 17 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);" title="17 - 18 Uhr frei"></div>
                                <div class="bg-success" style="height: 5px; width: calc(100% / 24);" title="18 - 19 Uhr frei"></div>
                                <div class="bg-danger" style="height: 5px; width: calc(100% / 24);" title="19 - 20 Uhr reserviert"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);" title="20 - 21 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);" title="21 - 22 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);" title="22 - 23 Uhr geschlossen"></div>
                                <div class="bg-info" style="height: 5px; width: calc(100% / 24);" title="23 - 00 Uhr geschlossen"></div>
                            </div>
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

        window.addEventListener('load', function () {
            console.log('load');

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