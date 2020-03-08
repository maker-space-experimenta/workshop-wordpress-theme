<?php get_header(); ?>

<?php
$posts = get_posts(array(
    'post_type'         => 'workshop',
    'posts_per_page'    =>  -1
));

usort($posts, function ($a, $b) {

    $start_date_a = get_post_meta($a->ID, 'workshop_start', true);
    $start_date_b = get_post_meta($b->ID, 'workshop_start', true);

    if ($start_date_a->format('Y-m-d') > $start_date_b->format('Y-m-d')) {
        return 1;
    }

    if ($start_date_a->format('Y-m-d') < $start_date_b->format('Y-m-d')) {
        return -1;
    }

    return 0;
});
?>


<div class="container mt-5 mb-5">

    <div class="row mb-3">
        <div class="col d-flex justify-content-end">
            <a href="<?php echo get_feed_link('calendar_rss'); ?>" title="Veranstaltungen als RSS" class="mr-2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/rss_24px.svg">
            </a>

            <a href="<?php echo get_feed_link('calendar'); ?>" title="ICS herunter laden">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/calendar_24px.svg">
            </a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col text-justify">
            <p>
                Workshops sind angeleitete Kurse mit einer Dauer von ca. 4-6 Stunden. In diesen Workshops werden neben Grundlagenwissen auch tiefergehende
                Fertigkeiten im Umgang mit Material und Werkzeug vermittelt.
            </p>
            <p>
                Wie auch der Maker Space, sind die Workshops für Personen über 14 Jahre ausgelegt. Das begründet sich vor allem darin, dass innerhalb der Workshops
                eine gewisse Selbstständigkeit vorausgesetzt wird.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <div class="list-group">

                <?php while (have_posts()) : the_post(); ?>

                    <?php $rooms = get_the_terms($post->ID, 'locations')  ?>
                    <?php $device_categories = get_the_terms($post->ID, 'device_categories')  ?>
                    <?php $highlight = get_post_meta($post->ID, 'workshop_option_highlight', true)  ?>
                    <?php $free_seats = get_post_meta($post->ID, 'workshop_option_free_seats', true)  ?>

                    <a href="<?php echo get_permalink(); ?>" class="list-group-item list-group-item-action mb-3 <?php if ($highlight) {
                                                                                                                        echo 'ms-highlight';
                                                                                                                    } ?> <?php if (!$free_seats) {
                                                                                                                                    echo 'ms-full';
                                                                                                                                } ?> ">
                        <div class="d-flex flex-column flex-xl-row">

                            <div class="col-12 col-xl-2 d-flex flex-row flex-xl-column w-100">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="ms-thumbnail" style="height: 100%; width: 100%; background-image: url(<?php echo get_the_post_thumbnail_url($post, "medium"); ?>); background-size: cover; background-position: center;"></div>
                                <?php endif; ?>
                            </div>

                            <div class="col-12 col-xl-2 d-flex flex-row flex-xl-column w-100">
                                <?php $start_date = get_post_meta($post->ID, 'workshop_start', true) ?>
                                <?php $end_date = get_post_meta($post->ID, 'workshop_end', true) ?>

                                <?php if ($start_date) : ?>

                                    <div class="w-100"><?php echo $start_date->format('d.m.Y') ?></div>

                                    <?php if ($end_date && $start_date->format('d.m.Y') != $end_date->format('d.m.Y')) : ?>
                                        <div class="w-100"><?php echo $end_date->format('d.m.Y'); ?></div>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </div>

                            <div class="col-12 col-xl-2 d-flex flex-row flex-xl-column w-100">
                                <?php $start_date = get_post_meta($post->ID, 'workshop_start', true) ?>
                                <?php $end_date = get_post_meta($post->ID, 'workshop_end', true) ?>

                                <?php if ($start_date) : ?>

                                    <div class="w-100">[32m<?php echo $start_date->format('H:i') ?> Uhr</div>

                                    <?php if ($end_date) : ?>

                                        <div class="w-100"><?php echo $end_date->format('H:i'); ?> Uhr</div>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </div>

                            <div class="col w-100 justify-content-between">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-1"><?php echo $post->post_title ?></h5>
                                    <span>
                                        <?php if ($free_seats) : echo $free_seats . ' freie Plätze';
                                            endif; ?>
                                        <?php if (!$free_seats) : ?> Workshop ausgebucht <?php endif; ?>
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

<?php get_footer(); ?>