<?php get_header(); ?>



<?php 

    $location = $_GET['location'];
    if (!$location) { $location = "makerspace"; }

    $posts = get_posts( array(
        'post_type'         => 'devices',
        'posts_per_page'    =>  -1,
        'orderby'           => 'title',
        'order'              => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'locations',
                'field'    => 'slug',
                'terms'    => $location,
            ),
        ),
    ));
?>




<div class="container mt-5">
    <div class="row">
        <div class="col">
            <a href="/?post_type=devices&location=makerspace" 
               id="tab-makerspace" 
               class="c-pointer p-3 justify-content-center align-items-center d-flex <?php if($location == 'makerspace') { echo "bg-primary text-light"; } else { echo "border border-secondary"; } ?>">Maker Space</a>
        </div>
        <div class="col">
            <a href="/?post_type=devices&location=sfz" 
               id="tab-sfz" 
               class="c-pointer p-3 justify-content-center align-items-center d-flex  <?php if($location == 'sfz') { echo "bg-primary text-light"; } else { echo "border border-secondary"; } ?>">Schüler Forschungszentrum</a>
        </div>
    </div>

    <div class="row mt-5 ms-device-list">
        <?php foreach($posts as $post): ?>
            <?php $rooms = get_the_terms( $post->ID, 'locations')  ?>
            <?php $device_categories = get_the_terms( $post->ID, 'device_categories')  ?>

            <div class="col col-xl-3 col-md-6"  onclick="window.location.href = '<?php echo get_permalink(); ?>'">

                    <div class="device-card mb-5 d-flex flex-column"
                         data-rooms="<?php foreach($rooms as $room) { echo $room->term_id . ','; if ($room->parent) { echo $room->parent . ','; } } ?>"
                         data-categories="<?php foreach($device_categories as $cat) { echo $cat->term_id . ','; if ($cat->parent) { echo $cat->parent . ','; } } ?>"
                         style="cursor: pointer;">

                        <?php if ( has_post_thumbnail() ): ?>
                            <div class="device-card-thumbnail"
                                 style="background-image: url(<?php the_post_thumbnail_url( 'medium' ); ?>);">
                            </div>
                        <?php else: ?>
                            <div class=""
                                 style="height: 250px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/image-missing.png); background-size: cover; background-position: center;">
                            </div>
                        <?php endif; ?>

                        <div class="bg-white flex-fill p-2 overflow-hidden text-nowrap">
                            <h5 class="" title="<?php the_title() ?>">
                                <?php the_title() ?>
                            </h5>
                        </div>
                        <div class="p-0 pt-auto" style="font-size: 0.72rem;">
                            <!-- <div class="p-1 pl-2 pr-2 bg-white text-secondary">Führerschein 01-001</div> -->
                            <div class="p-1 pl-2 pr-2 bg-white text-secondary">
                                <?php echo get_the_term_list( $post->ID, 'locations', 'Standort ', '')  ?>
                            </div>
                            <div class="d-none">
                                <?php $timetable = get_timetable_devices($post->ID, getdate()) ?>
                                <?php foreach ($timetable as $hour): ?>

                                    <?php if ($hour["closed"] == 1): ?>
                                        <div class="device-closed" title="<?php echo $hour->hour ?> - <?php echo $hour->hour ++ ?> Uhr geschlossen"></div>
                                    <?php elseif ($hour["booked"] == 1): ?>
                                        <div class="device-booked" title="<?php echo $hour ?> - <?php echo $hour ++ ?> Uhr gebucht"></div>
                                    <?php else: ?>
                                        <div class="device-free" title="<?php echo $hour ?> - <?php echo $hour ++ ?> Uhr frei"></div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>





<?php get_footer(); ?>