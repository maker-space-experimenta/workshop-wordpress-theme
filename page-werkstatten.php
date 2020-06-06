<?php get_header(); ?>



<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <?php while (have_posts()) : the_post(); ?>

                <h1><?php the_title() ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>
            <?php endwhile; ?>
        </div>
    </div>
</div>



<?php

$labs_main = get_terms(array(
    'taxonomy' => 'ms_devices_workshop',
    'hide_empty' => false,
    'parent' => 0,
    'orderby' => 'name',
    'order' => 'ASC'
));
?>
<?php foreach ($labs_main as $lab_main) : ?>

    <div class="container mt-5 mb-5">

        <div class="row mb-3">
            <div class="col d-flex justify-content-end">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col text-justify">
                <?php while (have_posts()) : the_post(); ?>

                    <h2><?php echo $lab_main->name; ?></h2>
                    <p>
                        <?php echo $lab_main->description; ?>
                    </p>
                <?php endwhile; ?>
            </div>
        </div>

    </div>

    <div class="container mt-5 mb-5">
        <div class="row mt-5 ms-device-list">

            <?php

            $labs = get_terms(array(
                'taxonomy' => 'ms_devices_workshop',
                'hide_empty' => false,
                'parent' => $lab_main->term_id,
                'orderby' => 'name',
                'order' => 'ASC'
            ));
            ?>

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

        <div class="row">
            <div class="col">
                <a href="<?php echo get_term_link($lab_main, 'ms_devices_workshop'); ?>">
                    <button class="btn btn-primary w-100">Alle Geräte anzeigen</button>
                </a>
            </div>
        </div>
    </div>

<?php endforeach; ?>


<?php get_footer(); ?>