<?php

if (!function_exists("GUID")) {
    function GUID()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}

if (!function_exists("makerfaire_save_registration")) {
    function makerfaire_save_registration($registration)
    {
        global $wpdb;


        $args = [
            $registration->mmsr_guid,
            $registration->mmsr_reg_projektname,
            $registration->mmsr_reg_kurzbeschreibung,
            $registration->mmsr_reg_beschreibung,
            $registration->mmsr_reg_besuchereinbindung,

            $registration->mmsr_reg_standtyp_makerspace,
            $registration->mmsr_reg_standtyp_opensource,
            $registration->mmsr_reg_standtyp_openhardware,
            $registration->mmsr_reg_standtyp_schule,
            $registration->mmsr_reg_standtyp_ccc,
            $registration->mmsr_reg_standtyp_verein,
            $registration->mmsr_reg_standtyp_cosplay,
            $registration->mmsr_reg_standtyp_handwerk,
            $registration->mmsr_reg_standtyp_jugendarbeit,
            $registration->mmsr_reg_standtyp_other,

            $registration->mmsr_reg_website,
            $registration->mmsr_reg_twitter,
            $registration->mmsr_reg_historie,

            $registration->mmsr_reg_tische,
            $registration->mmsr_reg_personen,
            $registration->mmsr_reg_stromanschluss,
            $registration->mmsr_reg_watt,

            $registration->mmsr_reg_email,
            $registration->mmsr_reg_ansprechpartner,

            $registration->mmsr_reg_essen_vegetarisch,
            $registration->mmsr_reg_essen_vegan,

            $registration->mmsr_reg_anmerkung
        ];

        $entry_exists = $wpdb->get_var($wpdb->prepare("SELECT count(mmsr_guid) FROM `makerspace_makerfaire_stand_registrations` WHERE mmsr_guid = %s", $registration->mmsr_guid));

        if ($entry_exists == 0) {
            // CREATE

            $sql  = "INSERT INTO makerspace_makerfaire_stand_registrations ( mmsr_guid, mmsr_reg_projektname, mmsr_reg_kurzbeschreibung, mmsr_reg_beschreibung, mmsr_reg_besuchereinbindung, mmsr_reg_standtyp_makerspace,  mmsr_reg_standtyp_opensource,  mmsr_reg_standtyp_openhardware,  mmsr_reg_standtyp_schule, mmsr_reg_standtyp_ccc, mmsr_reg_standtyp_verein, mmsr_reg_standtyp_cosplay, mmsr_reg_standtyp_handwerk, mmsr_reg_standtyp_jugendarbeit, mmsr_reg_standtyp_other, mmsr_reg_website, mmsr_reg_twitter, mmsr_reg_historie, mmsr_reg_tische, mmsr_reg_personen, mmsr_reg_stromanschluss, mmsr_reg_watt, mmsr_reg_email, mmsr_reg_ansprechpartner, mmsr_reg_essen_vegetarisch, mmsr_reg_essen_vegan, mmsr_reg_anmerkung  ) VALUES( %s, %s, %s, %s, %s, %d, %d, %d, %d, %d, %d, %d, %d, %d, %s, %s, %s, %d, %d, %d, %d, %d, %s, %s, %d, %d, %s ) ";
        } else {
            // UPDATE

            $sql  = "UPDATE makerspace_makerfaire_stand_registrations SET mmsr_guid = %s, mmsr_reg_projektname = %s, mmsr_reg_kurzbeschreibung = %s, mmsr_reg_beschreibung = %s, mmsr_reg_besuchereinbindung = %s, mmsr_reg_standtyp_makerspace = %d, mmsr_reg_standtyp_opensource = %d, mmsr_reg_standtyp_openhardware = %d, mmsr_reg_standtyp_schule = %d, mmsr_reg_standtyp_ccc = %d, mmsr_reg_standtyp_verein = %d, mmsr_reg_standtyp_cosplay = %d, mmsr_reg_standtyp_handwerk = %d, mmsr_reg_standtyp_jugendarbeit = %d, mmsr_reg_standtyp_other = %s, mmsr_reg_website = %s, mmsr_reg_twitter = %s, mmsr_reg_historie = %d, mmsr_reg_tische = %d, mmsr_reg_personen = %d, mmsr_reg_stromanschluss = %d, mmsr_reg_watt = %d, mmsr_reg_email = %s, mmsr_reg_ansprechpartner = %s, mmsr_reg_essen_vegetarisch = %d, mmsr_reg_essen_vegan = %d, mmsr_reg_anmerkung = %s WHERE mmsr_guid = %s";

            array_push($args, $registration->mmsr_guid);
        }

        $query = $wpdb->prepare($sql, $args);
        $result = $wpdb->query($query);

        return $result;
    }
}

$guid = GUID();

if (isset($_GET["id"])) {
    $guid = $_GET["id"];
}

if (isset($_POST["mmsr_reg_submit"])) {

    // SAVE REGISTRATION

    $result = makerfaire_save_registration((object) array(
        "mmsr_guid" => $guid,
        "mmsr_reg_projektname" => isset($_POST["mmsr_reg_projektname"]) ? $_POST["mmsr_reg_projektname"] : "",
        "mmsr_reg_kurzbeschreibung" => isset($_POST["mmsr_reg_kurzbeschreibung"]) ? $_POST["mmsr_reg_kurzbeschreibung"] : "",
        "mmsr_reg_beschreibung" => isset($_POST["mmsr_reg_beschreibung"]) ? $_POST["mmsr_reg_beschreibung"] : "",
        "mmsr_reg_besuchereinbindung" => isset($_POST["mmsr_reg_besuchereinbindung"]) ? $_POST["mmsr_reg_besuchereinbindung"] : "",
        "mmsr_reg_standtyp_makerspace" => isset($_POST["mmsr_reg_standtyp_makerspace"]),
        "mmsr_reg_standtyp_opensource" => isset($_POST["mmsr_reg_standtyp_opensource"]),
        "mmsr_reg_standtyp_openhardware" => isset($_POST["mmsr_reg_standtyp_openhardware"]),
        "mmsr_reg_standtyp_schule" => isset($_POST["mmsr_reg_standtyp_schule"]),
        "mmsr_reg_standtyp_ccc" => isset($_POST["mmsr_reg_standtyp_ccc"]),
        "mmsr_reg_standtyp_verein" => isset($_POST["mmsr_reg_standtyp_verein"]),
        "mmsr_reg_standtyp_cosplay" => isset($_POST["mmsr_reg_standtyp_cosplay"]),
        "mmsr_reg_standtyp_handwerk" => isset($_POST["mmsr_reg_standtyp_handwerk"]),
        "mmsr_reg_standtyp_jugendarbeit" => isset($_POST["mmsr_reg_standtyp_jugendarbeit"]),
        "mmsr_reg_standtyp_other" => isset($_POST["mmsr_reg_standtyp_other"]) ? $_POST["mmsr_reg_standtyp_other"] : "",
        "mmsr_reg_website" => isset($_POST["mmsr_reg_website"]) ? $_POST["mmsr_reg_website"] : "",
        "mmsr_reg_twitter" => isset($_POST["mmsr_reg_twitter"]) ? $_POST["mmsr_reg_twitter"] : "",
        "mmsr_reg_historie" => isset($_POST["mmsr_reg_historie"]) ? $_POST["mmsr_reg_historie"] : 0,
        "mmsr_reg_tische" => isset($_POST["mmsr_reg_tische"]) ? $_POST["mmsr_reg_tische"] : 0,
        "mmsr_reg_personen" => isset($_POST["mmsr_reg_personen"]) ? $_POST["mmsr_reg_personen"] : 0,
        "mmsr_reg_stromanschluss" => isset($_POST["mmsr_reg_stromanschluss"]) ? $_POST["mmsr_reg_stromanschluss"] : 0,
        "mmsr_reg_watt" => isset($_POST["mmsr_reg_watt"]) ? $_POST["mmsr_reg_watt"] : 0,
        "mmsr_reg_email" => isset($_POST["mmsr_reg_email"]) ? $_POST["mmsr_reg_email"] : "",
        "mmsr_reg_ansprechpartner" => isset($_POST["mmsr_reg_ansprechpartner"]) ? $_POST["mmsr_reg_ansprechpartner"] : "",
        "mmsr_reg_essen_vegetarisch" => isset($_POST["mmsr_reg_essen_vegetarisch"]) ? $_POST["mmsr_reg_essen_vegetarisch"] : 0,
        "mmsr_reg_essen_vegan" => isset($_POST["mmsr_reg_essen_vegan"]) ? $_POST["mmsr_reg_essen_vegan"] : 0,
        "mmsr_reg_anmerkung" => isset($_POST["mmsr_reg_anmerkung"]) ? $_POST["mmsr_reg_anmerkung"] : ""
    ));



    if ($result) :
        $url = get_permalink() . "?id=" . $guid;
        wp_redirect($url);
        exit();
    endif;
}

get_header();

$query = $wpdb->prepare(
    "SELECT * FROM makerspace_makerfaire_stand_registrations WHERE mmsr_guid = %s",
    $guid
);

$entry = $wpdb->get_row($query);

if ($entry == null) {
    $entry = (object) array(
        "mmsr_guid" => "",
        "mmsr_reg_projektname" => "",
        "mmsr_reg_kurzbeschreibung" => "",
        "mmsr_reg_beschreibung" => "",
        "mmsr_reg_besuchereinbindung" => "",
        "mmsr_reg_standtyp_makerspace" => 0,
        "mmsr_reg_standtyp_opensource" => 0,
        "mmsr_reg_standtyp_openhardware" => 0,
        "mmsr_reg_standtyp_schule" => 0,
        "mmsr_reg_standtyp_ccc" => 0,
        "mmsr_reg_standtyp_verein" => 0,
        "mmsr_reg_standtyp_cosplay" => 0,
        "mmsr_reg_standtyp_handwerk" => 0,
        "mmsr_reg_standtyp_jugendarbeit" => 0,
        "mmsr_reg_standtyp_other" => "",
        "mmsr_reg_website" => "",
        "mmsr_reg_twitter" => "",
        "mmsr_reg_historie" => 0,
        "mmsr_reg_tische" => 0,
        "mmsr_reg_personen" => 0,
        "mmsr_reg_stromanschluss" => 0,
        "mmsr_reg_watt" => 0,
        "mmsr_reg_email" => "",
        "mmsr_reg_ansprechpartner" => "",
        "mmsr_reg_essen_vegetarisch" => 0,
        "mmsr_reg_essen_vegan" => 0,
        "mmsr_reg_anmerkung" => ""
    );
}

?>


<div class="container mt-5 pb-5" style="min-height: 100vh">
    <div class="row">
        <div class="col">
            <h1>Standanmeldung für die Mini Maker Faire Heilbronn 2020</h1>
        </div>
    </div>
    <div class="row">

        <div class="col">
            <?php if (isset($guid)) : ?>
                <form method="post" action="<?php echo get_permalink(); ?>?id=<?php echo $guid ?>">
                    <input type="hidden" name="mmsr_reg_guid" value="<?php echo $guid; ?>">
                <?php else : ?>
                    <form method="post" action="<?php echo get_permalink(); ?>">
                    <?php endif; ?>


                    <h3 class="mt-5">Euer Projekt</h3>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="mmsr_reg_projektname">Wie heist dein Projekt?</label>
                            <input type="text" class="form-control" id="mmsr_reg_projektname" name="mmsr_reg_projektname" placeholder="Projektname" value="<?php echo $entry->mmsr_reg_projektname; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mmsr_reg_kurzbeschreibung"> Beschreibt eurer Projekt/euren Stand in einem Satz. </label>
                        <input type="text" class="form-control" id="mmsr_reg_kurzbeschreibung" name="mmsr_reg_kurzbeschreibung" placeholder="Kurze Projektbeschreibung" value="<?php echo $entry->mmsr_reg_kurzbeschreibung; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mmsr_reg_beschreibung"> Beschreibt euer Projekt/euren Stand etwas ausführlicher. </label>
                        <textarea class="form-control" row="3" id="mmsr_reg_beschreibung" name="mmsr_reg_beschreibung"><?php echo $entry->mmsr_reg_beschreibung; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="mmsr_reg_standtyp"> Welcher Haupt-Themenbereich passt zu dem Projekt? </label>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="mmsr_reg_standtyp_makerspace" name="mmsr_reg_standtyp_makerspace" <?php if ($entry->mmsr_reg_standtyp_makerspace) : ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="mmsr_reg_standtyp_makerspace">Maker Space</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="mmsr_reg_standtyp_opensource" name="mmsr_reg_standtyp_opensource" <?php if ($entry->mmsr_reg_standtyp_opensource) : ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="mmsr_reg_standtyp_opensource">Open Source</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="mmsr_reg_standtyp_openhardware" name="mmsr_reg_standtyp_openhardware" <?php if ($entry->mmsr_reg_standtyp_openhardware) : ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="mmsr_reg_standtyp_openhardware">Open Hardware</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="mmsr_reg_standtyp_schule" name="mmsr_reg_standtyp_schule" <?php if ($entry->mmsr_reg_standtyp_schule) : ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="mmsr_reg_standtyp_schule">Schule/ Schüler AG</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="mmsr_reg_standtyp_ccc" name="mmsr_reg_standtyp_ccc" <?php if ($entry->mmsr_reg_standtyp_ccc) : ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="mmsr_reg_standtyp_ccc">Chaos Computer Club</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="mmsr_reg_standtyp_verein" name="mmsr_reg_standtyp_verein" <?php if ($entry->mmsr_reg_standtyp_verein) : ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="mmsr_reg_standtyp_verein">Lokaler Verein</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="mmsr_reg_standtyp_cosplay" name="mmsr_reg_standtyp_cosplay" <?php if ($entry->mmsr_reg_standtyp_cosplay) : ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="mmsr_reg_standtyp_cosplay">Cosplay</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="mmsr_reg_standtyp_handwerk" name="mmsr_reg_standtyp_handwerk" <?php if ($entry->mmsr_reg_standtyp_handwerk) : ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="mmsr_reg_standtyp_handwerk">Handwerk / Kunsthandwerk</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="mmsr_reg_standtyp_jugendarbeit" name="mmsr_reg_standtyp_jugendarbeit" <?php if ($entry->mmsr_reg_standtyp_jugendarbeit) : ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="mmsr_reg_standtyp_jugendarbeit">Jugendarbeit</label>
                        </div>
                        <div class="form-group">
                            <label for="mmsr_reg_standtyp_other">Etwas anderes</label>
                            <input type="text" class="form-control" id="mmsr_reg_standtyp_other" name="mmsr_reg_standtyp_other" placeholder="sonstiges" value="<?php echo $entry->mmsr_reg_standtyp_other ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group w-100">
                            <label for="mmsr_reg_website">Link zu eurer Website</label>
                            <input type="text" class="form-control w-100" id="mmsr_reg_website" name="mmsr_reg_website" placeholder="website" value="<?php echo $entry->mmsr_reg_website ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group w-100">
                            <label for="mmsr_reg_twitter"> Euer Twitter-Account </label>
                            <input type="text" class="form-control" id="mmsr_reg_twitter" name="mmsr_reg_twitter" placeholder="Twitter" value="<?php echo $entry->mmsr_reg_twitter ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mmsr_reg_historie">Warst du/dein Team bereits Aussteller auf einer (Mini) Maker Faire? </label>
                        <select class="form-control" id="mmsr_reg_historie" name="mmsr_reg_historie">
                            <option value="1" <?php if ($entry->mmsr_reg_historie == 1) : ?>selected<?php endif; ?>>Ja</option>
                            <option value="0" <?php if ($entry->mmsr_reg_historie == 0) : ?>selected<?php endif; ?>>Nein</option>
                        </select>
                    </div>


                    <h3 class="mt-5">Wie erreichen wir euch?</h3>
                    <p>
                        Die anmeldende Person muss Volljährig sein. Die Kontaktdaten werden für die Kommunikation vor und nach dem Event genutzt.
                        Die Daten werden nicht an Dritte weitergegeben. Alle Daten werden elektronisch verarbeitet und gespeichert. Zugriff haben die Mitarbeitenden der
                        experimenta gGmbH. Die Daten werden spätestens 2 Monate nach dem Event gelöscht sofern nicht mehr zu Absprachen und Klärung zur Nachbereitung notwendig.
                    </p>

                    <div class="form-row">
                        <div class="form-group w-100">
                            <label for="mmsr_reg_email">E-Mail Adresse</label>
                            <input type="email" class="form-control" id="mmsr_reg_email" name="mmsr_reg_email" placeholder="E-Mail" value="<?php echo $entry->mmsr_reg_email ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group w-100">
                            <label for="mmsr_reg_ansprechpartner">Ansprechpartner*in</label>
                            <input type="text" class="form-control" id="mmsr_reg_ansprechpartner" name="mmsr_reg_ansprechpartner" placeholder="" value="<?php echo $entry->mmsr_reg_ansprechpartner ?>">
                        </div>
                    </div>


                    <h3 class="mt-5">Möchtest du uns sonst noch etwas mitteilen?</h3>
                    <div class="form-group">
                        <label for="mmsr_reg_anmerkung">Anmerkungen</label>
                        <textarea class="form-control" row="3" id="mmsr_reg_anmerkung" name="mmsr_reg_anmerkung"><?php echo $entry->mmsr_reg_anmerkung ?></textarea>
                    </div>



                    <button type="submit" class="btn btn-primary" id="mmsr_reg_submit" name="mmsr_reg_submit">Anmeldung speichern</button>
                    </form>
        </div>
    </div>
</div>



<?php get_footer(); ?>