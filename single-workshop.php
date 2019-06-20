<?php get_header(); ?>

<?php try { ?>


<?php while (have_posts()) : the_post(); ?>

    <?php $free_seats = get_post_meta($post->ID, 'workshop_option_free_seats', true)  ?>
    <?php $register_successfull = false; ?>

    <?php

    if (isset($_POST["mse-event-register"])) {

        $sql  = "INSERT INTO makerspace_calendar_workshop_registrations (";
        $sql .= "mse_cal_workshop_post_id, ";
        $sql .= "mse_cal_workshop_registration_email,  ";
        $sql .= "mse_cal_workshop_registration_firstname,  ";
        $sql .= "mse_cal_workshop_registration_lastname,  ";
        $sql .= "mse_cal_workshop_registration_count ) ";

        $sql .= "VALUES( %d, %s, %s, %s, %d ) ";

        $query = $wpdb->prepare(
            $sql,
            get_the_ID(),
            $_POST["mse-event-email"],
            $_POST["mse-event-firstname"],
            $_POST["mse-event-lastname"],
            $_POST["mse-event-count"],
        );

        if ($wpdb->query($query)) {
        ?>      
            <div class="alert alert-success mt-3" role="alert">
                <div class="container"><div class="row"><div class="col font-weight-bold">Die Anmeldung wurde erfolgreich gespeichert!</div></div></div>
            </div>
        <?php
        }
    }

    
    $sql_registrations = "SELECT SUM(mse_cal_workshop_registration_count) as mse_cal_reg_count FROM makerspace_calendar_workshop_registrations WHERE mse_cal_workshop_post_id = %d";
    $count = $wpdb->get_var( $wpdb->prepare($sql_registrations, get_the_ID()) );
    if (!is_null($count)) {
        $free_seats = $free_seats - $count;
    }
    ?>



    <?php if (has_post_thumbnail()) : ?>
        <div class="" style="height: 450px; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"></div>
    <?php endif; ?>

    <div class="container mt-5 pb-5">
        <div class="row">
            <div class="col">
                <h1><?php the_title() ?></h1>
            </div>
        </div>


        <div class="row border border-bottom-0 bg-white mt-3">

            <div class="col-6 p-3">
                <?php $start_date = get_post_meta($post->ID, 'workshop_start', true) ?>
                <?php $end_date = get_post_meta($post->ID, 'workshop_end', true) ?>

                <?php if ($start_date) : ?>

                    <table>
                        <tr>
                            <td class="pr-3 font-weight-bold">Beginn:</td>
                            <td>
                                <span class=""><?php echo $start_date->format('d.m.Y'); ?></span>
                                <span><?php echo $start_date->format('H:i') ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="pr-3 font-weight-bold">Ende:</td>
                            <td>
                                <span class=""><?php echo $end_date->format('d.m.Y'); ?></span>
                                <span><?php echo $end_date->format('H:i') ?></span>
                            </td>
                        </tr>
                    </table>

                <?php endif; ?>
            </div>




            <div class="col-6 p-3">
                <?php $start_date = get_post_meta($post->ID, 'workshop_start', true) ?>
                <?php $end_date = get_post_meta($post->ID, 'workshop_end', true) ?>

                <?php if ($start_date) : ?>

                    <table>
                        <tr>
                            <td class="pr-3 font-weight-bold">Freie Plätze:</td>
                            <td>
                                <span class="">
                                    <?php 
                                        if ($free_seats > 0) { echo $free_seats . ' freie Plätze'; } 
                                        else { echo "Workshop ausgebucht"; }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="pr-3 font-weight-bold"></td>
                            <td>
                            </td>
                        </tr>
                    </table>

                <?php endif; ?>
            </div>
        </div>

        <div class="row border border-top-0 border-bottom-0 bg-white">
            <div class="col-1 p-3 ms-author-avatar">
                <?php echo get_avatar(get_the_author_meta('ID'), 512)  ?>
            </div>
            <div class="col p-3 text-dark">
                <h5 class="text-uppercase" style="font-size: 16px;">Wer führt den Workshop durch?</h5>
                <h4 class=""><?php the_author_meta('display_name') ?></h4>
            </div>
        </div>
        <div class="row  border border-top-0 bg-white">
            <div class="col-1 p-0 ms-author-avatar"></div>
            <div class="col p-3 text-dark">
                <p><?php the_author_meta('description') ?></p>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <p>
                    <?php the_content(); ?>
                </p>
            </div>
        </div>


        <?php if ($free_seats > 0) : ?>
        <form method="post" action="<?php echo get_permalink(); ?>">
            <div class="row mt-5">
                <div class="12">
                    <h3>Anmeldung zum Workshop</h3>
                </div>

                <div class="col-12 mt-3">
                    <div class="form-group row">
                        <label for="mse-event-email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="mse-event-email" name="mse-event-email" placeholder="" required>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="mse-event-firstname" class="col-sm-2 col-form-label">Vorname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mse-event-firstname" name="mse-event-firstname" placeholder="" required>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="mse-event-lastname" class="col-sm-2 col-form-label">Nachname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mse-event-lastname" name="mse-event-lastname" placeholder="" required>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="mse-event-count" class="col-sm-2 col-form-label">Anzahl</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="mse-event-count" name="mse-event-count" placeholder="" required min="1" max="<?php echo $free_seats ?>">
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex  justify-content-end align-items-center">
                    <input type="submit" name="mse-event-register" class="btn btn-primary pr-5 pl-5" value="Verbindlich anmelden" />
                </div>
            </div>
        </form>
        <?php endif; ?>
    </div>

<?php endwhile; ?>


<?php } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
} ?>



<?php get_footer(); ?>