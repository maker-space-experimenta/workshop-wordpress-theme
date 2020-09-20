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



<div class="container mt-5 mb-5 d-none">
    <div class="row mb-2">
        <div class="col text-justify">
            <h2>Verfügbarkeit</h2>
        </div>
    </div>



    <?php
    $offset = isset($_GET["offset_days"]) ? $_GET["offset_days"] : 0;

    ?>

    <div class="row mb-3">
        <div class="col">
            <a href="?offset_days=<?php echo $offset - 1 ?>">
                <button type="button" class="btn btn-outline-primary">rückwärts</button>
            </a>
        </div>
        <div class="col">
            <a href="?offset_days=0">
                <button type="button" class="btn btn-outline-primary">heute</button>
            </a>
        </div>
        <div class="col">
            <a href="?offset_days=<?php echo $offset + 1 ?>">
                <button type="button" class="btn btn-outline-primary">vorwärts</button>
            </a>
        </div>
    </div>

    <div class=" row mb-3">
        <?php for ($i = 0; $i < 7; $i++) : ?>

            <?php
            $today = time() + (($i + $offset) * 24 * 60 * 60);


            $day_start = new DateTime();
            $day_start->setTimestamp($today);
            $day_start->setTime(0, 0, 1);

            $day_end = new DateTime();
            $day_end->setTimestamp($today);
            $day_end->setTime(23, 59, 59);

            $sql_reservations = "SELECT * FROM makerspace_ms_devices_workshop_reservations WHERE mse_device_from > %d AND mse_device_to < %d AND mse_device_workshop_taxonomie_id = %d";
            $reservations = $wpdb->get_results($wpdb->prepare(
                $sql_reservations,
                $day_start->getTimestamp(),
                $day_end->getTimestamp(),
                get_queried_object_id()
            ));

            ?>

            <div class="col-12 d-flex">

                <div class="col-2">
                    <?php echo dayToString(strftime("%w", $today)) ?>,
                    <?php echo strftime("%d.%m.%y", $today) ?>

                    <?php if (strftime("%w", $today) < 2) : ?>
                        <clr-icon shape="warning-standard" title="Bitte beachte, dass wir an diesem Tag geschlossen haben und Buchungen nur in Ausnahmefällen angenommen werden."></clr-icon>
                    <?php endif; ?>
                </div>

                <div class="col d-flex">
                    <?php for ($j = 0; $j < 24; $j++) : ?>
                        <?php
                        $styles = "width: 20px; height: 20px; border: solid 1px #444; margin-left: 2px;";
                        $styles .= $j < 15 || $j > 21 ? "background: #ccc;" : "";
                        $styles .= strftime("%w", $today) < 2 ? "background: #ccc;" : "";


                        $hour = new DateTime();
                        $hour->setTimestamp($today);
                        $hour->setTime($j, 0, 0);
                        $nextHour = new DateTime();
                        $nextHour->setTimestamp($today);
                        $nextHour->setTime($j + 1, 0, 0);

                        $hasReservation = false;

                        foreach ($reservations as $r) {
                            if ($r->mse_device_from <= $hour->getTimestamp() && $r->mse_device_to >= $nextHour->getTimestamp()) {
                                if (is_null($r->mse_device_approved)) {
                                    $styles .= strftime("%w", $today) < 2 ? "background: rgba(255, 255, 0, 0.5);" : "";
                                } else {
                                    $styles .= strftime("%w", $today) < 2 ? "background: rgba(255, 50, 0, 0.5);" : "";
                                }
                            }
                        }

                        ?>

                        <div style="<?php echo $styles; ?>" title=" <?php echo $j . ' bis ' . ($j + 1) . ' Uhr'; ?>">
                        </div>
                    <?php endfor; ?>
                </div>

            </div>
        <?php endfor; ?>

    </div>

    <div class="row mb-3">
        <div class="col-6 d-flex">
            <div style="width: 20px; height: 20px; border: solid 1px #444; margin-left: 2px;"></div>
            <div class="ml-2">Anfrage möglich</div>
        </div>
        <div class="col-6 d-flex">
            <div style="width: 20px; height: 20px; border: solid 1px #444; margin-left: 2px; background: #ccc;"></div>
            <div class="ml-2">Außerhalb der regulären Öffnungszeit</div>
        </div>
        <div class="col-6 d-flex">
            <div style="width: 20px; height: 20px; border: solid 1px #444; margin-left: 2px; background: rgba(255, 255, 0, 0.5);"></div>
            <div class="ml-2">Es liegt bereits eine unbestätigte Anfrage vor</div>
        </div>
        <div class="col-6 d-flex">
            <div style="width: 20px; height: 20px; border: solid 1px #444; margin-left: 2px; background: rgba(255, 50, 0, 0.5);"></div>
            <div class="ml-2">Es ist bereits belegt</div>
        </div>
    </div>

</div>




<?php if ($labs) : ?>

    <div class="container mt-5 mb-5">
        <div class="row mb-2">
            <div class="col text-justify">
                <h2>Untergeordnete Werkstätten</h2>
            </div>
        </div>
    </div>


    <div class="container mt-5 mb-5">
        <div class="row mt-5 ms-device-list">

            <?php foreach ($labs as $lab) : ?>


                <?php $link = get_term_link($lab, 'ms_devices_workshop'); ?>

                <a href="<?php echo $link; ?>" class="col-12 col-xl-4 col-md-6 text-dark" style="text-decoration: none;">

                    <div class="device-card mb-5 d-flex flex-column" style="cursor: pointer;">

                        <?php if ($lab->name == "Digitalwerkstatt") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/03/Digitalwerkstatt-scaled.jpg);"></div>
                      
                        <?php elseif ($lab->name == "Elektronikwerkstatt") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/03/Elektrotechnik-scaled.jpg);"></div>
                        <?php elseif ($lab->slug == "02-003") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/09/20200920_215642-scaled.jpg);"></div>
                        
                        <?php elseif ($lab->name == "Holzwerkstatt") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/03/Holzwerkstatt-scaled.jpg);"></div>
                      
                        <?php elseif ($lab->name == "Medienwerkstatt") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/03/Medienwerkstatt-scaled.jpg);"></div>
                      
                        <?php elseif ($lab->name == "Textilwerkstatt") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/03/Medienwerkstatt-scaled.jpg);"></div>
                      
                        <?php elseif ($lab->name == "Fotostudio") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/05/GreenScreenSuperWoman-scaled.jpg);"></div>
                      
                        <?php elseif ($lab->name == "Tonstudio") : ?>
                            <div class="device-card-thumbnail" style="background-image: url(https://makerspace.experimenta.science/wp-content/uploads/2020/03/Medienwerkstatt-scaled.jpg);"></div>

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
                </a>

            <?php endforeach; ?>
        </div>
    </div>

<?php endif; ?>



<div class="container mt-5 mb-5">

    <div class="row mb-2">
        <div class="col text-justify">
            <h2>Ausstattung</h2>
        </div>
    </div>

</div>

<div class="container mt-5  pt-5 pt-md-0">

    <div class="row mt-5 ms-device-list">
        <?php foreach ($posts as $post) : ?>
            <?php $rooms = get_the_terms($post->ID, 'locations')  ?>
            <?php $device_categories = get_the_terms($post->ID, 'device_categories')  ?>

            <a href="<?php echo get_permalink(); ?>" class="col-12 col-xl-4 col-md-6 text-dark" style="text-decoration: none;">


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
            </a>
        <?php endforeach; ?>
    </div>
</div>









<?php get_footer(); ?>