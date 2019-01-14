
<?php get_header(); ?>

<?php


global $wpdb;

$tablename_devices = $wpdb->prefix . "ms_dm_devices";
$tablename_locations = $wpdb->prefix . "ms_dm_locations";
$tablename_images = $wpdb->prefix . "ms_dm_images";

$sql = 'SELECT * FROM ' . $tablename_devices . ' WHERE ms_dm_device_show_public > 0';
$devices = $wpdb->get_results($sql);

?>


<div  style="min-height: 100vh">
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <?php while ( have_posts() ) : the_post(); ?>

                <h1><?php the_title() ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>
                
            <?php endwhile; ?>

        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row mb-3">
        <div class="col"></div>
        <div class="col d-flex align-items-end">
            <div class="input-group mb-3 ml-auto">
            <input type="text" class="form-control" placeholder="" aria-label="Suchbegriff eingeben" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Suchen</button>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">

        <div class="ms-devices-list">

            <?php
                foreach( $devices as $device):
                    $image = $wpdb->get_row($wpdb->prepare('select * from ' . $tablename_images . ' where ms_dm_image_ms_dm_device_id=%d limit 1', $device->ms_dm_device_id)); 
            ?>
            
            <div class="d-flex border border-1 mb-2">
                <div class="" style="min-width: 250px; min-height: 250px; background-image: url(<?php echo wp_get_attachment_url($image->ms_dm_image_post_id); ?>); background-size: cover;"></div>
                <div class="m-3 d-flex flex-column">
                    <div class="d-flex">
                        <h5 class=""><?php echo $device->ms_dm_device_display_name; ?></h5>
                        <span class="ml-auto ms-devices-list-annotation">Aktuell nicht belegt</span>
                    </div>
                    <div><?php echo $device->ms_dm_device_description; ?></div>
                    <div class="mt-auto ms-devices-list-footer">
                        <span class="mr-2">Standort: Digitallabor</span>
                        <span class="mr-2">|</span>
                        <span>Führerschein [01-005] notwendig</span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>
</div>



<?php get_footer(); ?>
