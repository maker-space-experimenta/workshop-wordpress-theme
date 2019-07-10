<?php global $wpdb; ?>

<?php $error = 0; ?>
<?php $success = 0; ?>

<?php get_header(); ?>


<?php while (have_posts()) : the_post(); ?>

    <?php
    $free_seats = get_post_meta($post->ID, 'workshop_option_free_seats', true);
    $register_successfull = false;

    $id = get_the_ID();

    // check for existing registration for this event
    if (isset($_POST["mse-event-register"])) :
        $sql_check_email = "SELECT mse_cal_workshop_registration_email FROM makerspace_calendar_workshop_registrations WHERE mse_cal_workshop_registration_email='%s' AND mse_cal_workshop_post_id='%d'";
        $query_check_email = $wpdb->prepare(
            $sql_check_email, 
            $_POST["mse-event-email"],
            $id
        );
        $result_check_mail = $wpdb->query($query_check_email);
        $error = 1;

        if ($result_check_mail > 0) : ?>
            <div class="alert alert-danger mt-3" role="alert">
                <div class="container">
                    <div class="row">
                        <div class="col font-weight-bold">
                            Mit dieser E-Mail-Adresse wurde bereits eine Anmeldung für den Workshop durchgeführt.
                            Bei Problemen oder Fragen zur Anmeldung wenden Sie sich bitte an ExperimentaMakerspace (at) experimenta-heilbronn.de
                        </div>
                    </div>
                </div>
            </div>
        <?php
        else :

            // add registration for this event
            $sql  = "INSERT INTO makerspace_calendar_workshop_registrations (";
            $sql .= "mse_cal_workshop_post_id, ";
            $sql .= "mse_cal_workshop_registration_email,  ";
            $sql .= "mse_cal_workshop_registration_firstname,  ";
            $sql .= "mse_cal_workshop_registration_lastname,  ";
            $sql .= "mse_cal_workshop_registration_count ) ";

            $sql .= "VALUES( %d, %s, %s, %s, %d ) ";

            $query_add_registration = $wpdb->prepare(
                $sql,
                $id,
                $_POST["mse-event-email"],
                $_POST["mse-event-firstname"],
                $_POST["mse-event-lastname"],
                $_POST["mse-event-count"]
            );

            $result_add_registration = $wpdb->query($query_add_registration);
            if ($result_add_registration) :
                ?>
                <div class="alert alert-success mt-3" role="alert">
                    <div class="container">
                        <div class="row">
                            <div class="col font-weight-bold">Sie wurden erfolgreich für diesen Workshop angemeldet.</div>
                        </div>
                    </div>
                </div>
            <?php
            endif;
        endif;

    endif;

    ?>

    <?php
    $sql_registrations = "SELECT SUM(mse_cal_workshop_registration_count) as mse_cal_reg_count FROM makerspace_calendar_workshop_registrations WHERE mse_cal_workshop_post_id = %d";
    $count = $wpdb->get_var($wpdb->prepare($sql_registrations, get_the_ID()));
    if (!is_null($count)) {
        $free_seats = $free_seats - $count;
    }
    ?>

    <?php if (has_post_thumbnail()) : ?>
        <div class="" style="height: 450px; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"></div>
    <?php endif; ?>


    <div style="min-height: 100vh">

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="">
                        <h1><?php the_title() ?></h1>
                        <?php the_content(); ?>
                    </div>
                    <div>
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
                </div>

                <div class="col-12 col-xl-4 col-md-6">
                    <div class="card p-3">
                        <h4 class="mb-3"> Infos zum Workshop </h4>

                        <?php $cfields = get_post_custom() ?>

                        <table class="w-100">
                            <tbody>

                                <?php $start_date = get_post_meta($post->ID, 'workshop_start', true) ?>
                                <?php $end_date = get_post_meta($post->ID, 'workshop_end', true) ?>
                                <?php if ($start_date) : ?>
                                    <tr>
                                        <td class="pr-5 pb-3">Start:</td>
                                        <td class="pb-3">
                                            <span class=""><?php echo $start_date->format('d.m.Y'); ?></span>
                                            <span><?php echo $start_date->format('H:i') ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-5 pb-3">Ende:</td>
                                        <td class="pb-3">
                                            <span class=""><?php echo $end_date->format('d.m.Y'); ?></span>
                                            <span><?php echo $end_date->format('H:i') ?></span>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <tr>
                                    <td>Freie Plätze:</td>
                                    <td>
                                        <?php
                                        if ($free_seats > 0) {
                                            echo $free_seats . ' freie Plätze';
                                        } else {
                                            echo "Workshop ausgebucht";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <tbody>
                        </table>

                        <div class="mt-5">
                            <h5 class="text-uppercase" style="font-size: 16px;">Wer führt den Workshop durch?</h5>
                            <h5 class=""><?php the_author_meta('display_name') ?></h5>
                            <div class="p-3 text-dark">
                                <p><?php the_author_meta('description') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>