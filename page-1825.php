<?php

function GUID()
{
    if (function_exists('com_create_guid') === true) {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

$guid = $_GET["id"];
if (!isset($guid)) {
    $guid = $_POST["reg_guid"];
}


if (isset($_POST["reg_submit"])) {
    if (! isset($_POST["reg_guid"])) {
        $guid = GUID();

        $sql  = "INSERT INTO makerspace_makerfaire_stand_registrations (";

        $sql .= "mmsr_guid, ";

        $sql .= "mmsr_reg_projektname, ";
        $sql .= "mmsr_reg_kurzbeschreibung, ";
        $sql .= "mmsr_reg_beschreibung, ";
        $sql .= "mmsr_reg_besuchereinbindung, ";

        $sql .= "mmsr_reg_standtyp_makerspace, ";
        $sql .= "mmsr_reg_standtyp_opensource, ";
        $sql .= "mmsr_reg_standtyp_openhardware, ";
        $sql .= "mmsr_reg_standtyp_schule, ";
        $sql .= "mmsr_reg_standtyp_ccc, ";
        $sql .= "mmsr_reg_standtyp_verein, ";
        $sql .= "mmsr_reg_standtyp_cosplay, ";
        $sql .= "mmsr_reg_standtyp_handwerk, ";
        $sql .= "mmsr_reg_standtyp_jugendarbeit, ";
        $sql .= "mmsr_reg_standtyp_other, ";

        $sql .= "mmsr_reg_website, ";
        $sql .= "mmsr_reg_twitter, ";
        $sql .= "mmsr_reg_historie, ";

        $sql .= "mmsr_reg_tische, ";
        $sql .= "mmsr_reg_personen, ";
        $sql .= "mmsr_reg_stromanschluss, ";
        $sql .= "mmsr_reg_watt, ";

        $sql .= "mmsr_reg_email, ";
        $sql .= "mmsr_reg_ansprechpartner, ";

        $sql .= "mmsr_reg_essen_vegetarisch, ";
        $sql .= "mmsr_reg_essen_vegan, ";

        $sql .= "mmsr_reg_anmerkung ";

        $sql .= " )";

        $sql .= "VALUES( %s, %s, %s, %s, %s, %d, %d, %d, %d, %d, %d, %d, %d, %d, %s, %s, %s, %d, %d, %d, %d, %d, %s, %s, %d, %d, %s ) ";

        $query_add_registration = $wpdb->prepare(
            $sql,
            $guid,
            $_POST["reg_projektname"],
            $_POST["reg_kurzbeschreibung"],
            $_POST["reg_beschreibung"],
            $_POST["reg_besuchereinbindung"],

            isset($_POST["reg_standtyp_makerspace"]),
            isset($_POST["reg_standtyp_opensource"]),
            isset($_POST["reg_standtyp_openhardware"]),
            isset($_POST["reg_standtyp_schule"]),
            isset($_POST["reg_standtyp_ccc"]),
            isset($_POST["reg_standtyp_verein"]),
            isset($_POST["reg_standtyp_cosplay"]),
            isset($_POST["reg_standtyp_handwerk"]),
            isset($_POST["reg_standtyp_jugendarbeit"]),
            $_POST["reg_standtyp_other"],

            $_POST["reg_website"],
            $_POST["reg_twitter"],
            isset($_POST["reg_historie"]),

            $_POST["reg_tische"],
            $_POST["reg_personen"],
            $_POST["reg_stromanschluss"],
            $_POST["reg_watt"],

            $_POST["reg_email"],
            $_POST["reg_ansprechpartner"],

            isset($_POST["reg_essen_vegetarisch"]),
            isset($_POST["reg_essen_vegan"]),

            $_POST["reg_anmerkung"]
        );


        $result_add_registration = $wpdb->query($query_add_registration);

        if ($result_add_registration) :
            $url = get_permalink() . "?id=" . $guid;
            wp_redirect($url);
            exit();
        endif;
    }
}

get_header();

if (isset($_POST["reg_submit"])) {
    if (isset($_POST["reg_guid"])) {

        $sql  = "UPDATE makerspace_makerfaire_stand_registrations SET ";

        $sql .= "mmsr_guid = %s, ";

        $sql .= "mmsr_reg_projektname = %s, ";
        $sql .= "mmsr_reg_kurzbeschreibung = %s, ";
        $sql .= "mmsr_reg_beschreibung = %s, ";
        $sql .= "mmsr_reg_besuchereinbindung = %s, ";

        $sql .= "mmsr_reg_standtyp_makerspace = %d, ";
        $sql .= "mmsr_reg_standtyp_opensource = %d, ";
        $sql .= "mmsr_reg_standtyp_openhardware = %d, ";
        $sql .= "mmsr_reg_standtyp_schule = %d, ";
        $sql .= "mmsr_reg_standtyp_ccc = %d, ";
        $sql .= "mmsr_reg_standtyp_verein = %d, ";
        $sql .= "mmsr_reg_standtyp_cosplay = %d, ";
        $sql .= "mmsr_reg_standtyp_handwerk = %d, ";
        $sql .= "mmsr_reg_standtyp_jugendarbeit = %d, ";
        $sql .= "mmsr_reg_standtyp_other = %s, ";

        $sql .= "mmsr_reg_website = %s, ";
        $sql .= "mmsr_reg_twitter = %s, ";
        $sql .= "mmsr_reg_historie = %d, ";

        $sql .= "mmsr_reg_tische = %d, ";
        $sql .= "mmsr_reg_personen = %d, ";
        $sql .= "mmsr_reg_stromanschluss = %d, ";
        $sql .= "mmsr_reg_watt = %d, ";

        $sql .= "mmsr_reg_email = %s, ";
        $sql .= "mmsr_reg_ansprechpartner = %s, ";

        $sql .= "mmsr_reg_essen_vegetarisch = %d, ";
        $sql .= "mmsr_reg_essen_vegan = %d, ";

        $sql .= "mmsr_reg_anmerkung = %s ";

        $sql .= "WHERE mmsr_guid = %s";


        $query = $wpdb->prepare(
            $sql,
            $guid,
            $_POST["reg_projektname"],
            $_POST["reg_kurzbeschreibung"],
            $_POST["reg_beschreibung"],
            $_POST["reg_besuchereinbindung"],

            isset($_POST["reg_standtyp_makerspace"]),
            isset($_POST["reg_standtyp_opensource"]),
            isset($_POST["reg_standtyp_openhardware"]),
            isset($_POST["reg_standtyp_schule"]),
            isset($_POST["reg_standtyp_ccc"]),
            isset($_POST["reg_standtyp_verein"]),
            isset($_POST["reg_standtyp_cosplay"]),
            isset($_POST["reg_standtyp_handwerk"]),
            isset($_POST["reg_standtyp_jugendarbeit"]),
            $_POST["reg_standtyp_other"],

            $_POST["reg_website"],
            $_POST["reg_twitter"],
            isset($_POST["reg_historie"]),

            $_POST["reg_tische"],
            $_POST["reg_personen"],
            $_POST["reg_stromanschluss"],
            $_POST["reg_watt"],

            $_POST["reg_email"],
            $_POST["reg_ansprechpartner"],

            isset($_POST["reg_essen_vegetarisch"]),
            isset($_POST["reg_essen_vegan"]),

            $_POST["reg_anmerkung"],

            $guid
        );

        $update_result = $wpdb->query($query);

        if ($update_result) : ?>
            <div class="alert alert-success mt-3" role="alert">
                <div class="container">
                    <div class="row">
                        <div class="col font-weight-bold">Die Anmeldung wurde gespeichert.</div>
                    </div>
                </div>
            </div>
        <?php endif;
    }
}


$query = $wpdb->prepare(
    "SELECT * FROM makerspace_makerfaire_stand_registrations WHERE mmsr_guid = %s",
    $guid
);

$entry = $wpdb->get_row($query);

print_r($entry);

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
                    <input type="hidden" name="reg_guid" value="<?php echo $guid; ?>">
                <?php else : ?>
                    <form method="post" action="<?php echo get_permalink(); ?>">
                    <?php endif; ?>


                    <h3 class="mt-5">Euer Projekt</h3>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reg_projektname">Wie heist dein Projekt?</label>
                            <input type="text" class="form-control" id="reg_projektname" name="reg_projektname" placeholder="Projektname" value="<?php echo $entry->mmsr_reg_projektname; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg_kurzbeschreibung"> Beschreibt eurer Projekt/euren Stand in einem Satz. </label>
                        <input type="text" class="form-control" id="reg_kurzbeschreibung" name="reg_kurzbeschreibung" placeholder="Kurze Projektbeschreibung" value="<?php echo $entry->mmsr_reg_kurzbeschreibung; ?>">
                    </div>
                    <div class="form-group">
                        <label for="reg_beschreibung"> Beschreibt euer Projekt/euren Stand etwas ausführlicher. </label>
                        <textarea class="form-control" row="3" id="reg_beschreibung" name="reg_beschreibung"><?php echo $entry->mmsr_reg_beschreibung; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="reg_besuchereinbindung"> Welche Mitmach-Aktionen/Workshops finden an eurem Stand statt, wie bindet ihr die Besucher ein? </label>
                        <textarea class="form-control" row="3" id="reg_besuchereinbindung" name="reg_besuchereinbindung"><?php echo $entry->mmsr_reg_besuchereinbindung; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="reg_standtyp"> Welcher Haupt-Themenbereich passt zu dem Projekt? </label>

                        <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="reg_standtyp_makerspace" name="reg_standtyp_makerspace" <?php if ($entry->mmsr_reg_standtyp_makerspace): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="reg_standtyp_makerspace">Maker Space</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="reg_standtyp_opensource" name="reg_standtyp_opensource" <?php if ($entry->mmsr_reg_standtyp_opensource): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="reg_standtyp_opensource">Open Source</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="reg_standtyp_openhardware" name="reg_standtyp_openhardware" <?php if ($entry->mmsr_reg_standtyp_openhardware): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="reg_standtyp_openhardware">Open Hardware</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="reg_standtyp_schule" name="reg_standtyp_schule" <?php if ($entry->mmsr_reg_standtyp_schule): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="reg_standtyp_schule">Schule/ Schüler AG</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="reg_standtyp_ccc" name="reg_standtyp_ccc" <?php if ($entry->mmsr_reg_standtyp_ccc): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="reg_standtyp_ccc">Chaos Computer Club</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="reg_standtyp_verein" name="reg_standtyp_verein" <?php if ($entry->mmsr_reg_standtyp_verein): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="reg_standtyp_verein">Lokaler Verein</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="reg_standtyp_cosplay" name="reg_standtyp_cosplay" <?php if ($entry->mmsr_reg_standtyp_cosplay): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="reg_standtyp_cosplay">Cosplay</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="reg_standtyp_handwerk" name="reg_standtyp_handwerk" <?php if ($entry->mmsr_reg_standtyp_handwerk): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="reg_standtyp_handwerk">Handwerk / Kunsthandwerk</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="reg_standtyp_jugendarbeit" name="reg_standtyp_jugendarbeit" <?php if ($entry->mmsr_reg_standtyp_jugendarbeit): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="reg_standtyp_jugendarbeit">Jugendarbeit</label>
                        </div>
                        <div class="form-group">
                            <label for="reg_standtyp_other">Etwas anderes</label>
                            <input type="text" class="form-control" id="reg_standtyp_other" name="reg_standtyp_other" placeholder="sonstiges" value="<?php echo $entry->mmsr_reg_standtyp_other ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group w-100">
                            <label for="reg_website">Link zu eurer Website</label>
                            <input type="url" class="form-control w-100" id="reg_website" name="reg_website" placeholder="website" value="<?php echo $entry->mmsr_reg_website ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group w-100">
                            <label for="reg_twitter"> Euer Twitter-Account </label>
                            <input type="url" class="form-control" id="reg_twitter" name="reg_twitter" placeholder="Twitter" value="<?php echo $entry->mmsr_reg_twitter ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg_historie">Warst du/dein Team bereits Aussteller auf einer (Mini) Maker Faire? </label>
                        <select class="form-control" id="reg_historie" name="reg_historie">
                            <option value="1" <?php if ($entry->mmsr_reg_historie == 1): ?>selected<?php endif; ?> >Ja</option>
                            <option value="0" <?php if ($entry->mmsr_reg_historie == 0): ?>selected<?php endif; ?> >Nein</option>
                        </select>
                    </div>

                    <h3 class="mt-5">Euer Stand</h3>
                    <div class="form-group">
                        <label for="reg_tische"> Gewünschte Standgröße (Tischmaß ca 180x80cm)</label>
                        <select class="form-control" id="reg_tische" name="reg_tische">
                            <option value="1" <?php if ($entry->mmsr_reg_tische == 1): ?>selected<?php endif; ?>>1 Tisch</option>
                            <option value="2" <?php if ($entry->mmsr_reg_tische == 2): ?>selected<?php endif; ?>>2 Tische</option>
                            <option value="3" <?php if ($entry->mmsr_reg_tische == 3): ?>selected<?php endif; ?>>3 Tische</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group w-100">
                            <label for="reg_personen"> Wie viele Personen sind am Stand? </label>
                            <input type="number" class="form-control" id="reg_personen" name="reg_personen" placeholder="Anzahl Personen" value="<?php echo $entry->mmsr_reg_personen ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg_stromanschluss"> Braucht ihr einen Stromanschluss? </label>
                        <select class="form-control" id="reg_stromanschluss" name="reg_stromanschluss">
                            <option value="1" <?php if ($entry->mmsr_reg_stromanschluss == 1): ?>selected<?php endif; ?>>Ja</option>
                            <option value="0" <?php if ($entry->mmsr_reg_stromanschluss == 0): ?>selected<?php endif; ?>>Nein</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group w-100">
                            <label for="reg_watt">Wenn ja, wie viel Watt benötigt ihr?</label>
                            <input type="number" class="form-control" id="reg_watt" name="reg_watt" placeholder="Watt" value="<?php echo $entry->mmsr_reg_watt ?>">
                        </div>
                    </div>

                    <h3 class="mt-5">Wie erreichen wir euch?</h3>
                    <p>
                        Die anmeldende Person muss Volljährig sein. Die Kontaktdaten werden für die Kommunikation vor und nach dem Event genutzt.
                        Die Daten werden nicht an Dritte weitergegeben. Alle Daten werden elektronisch verarbeitet und gespeichert. Zugriff haben die Mitarbeitenden der
                        experimenta gGmbH. Die Daten werden spätestens 2 Monate nach dem Event gelöscht sofern nicht mehr zu Absprachen und Klärung zur Nachbereitung notwendig.
                    </p>

                    <div class="form-row">
                        <div class="form-group w-100">
                            <label for="reg_email">E-Mail Adresse</label>
                            <input type="email" class="form-control" id="reg_email" name="reg_email" placeholder="E-Mail" value="<?php echo $entry->mmsr_reg_email ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group w-100">
                            <label for="reg_ansprechpartner">Ansprechpartner*in</label>
                            <input type="text" class="form-control" id="reg_ansprechpartner" name="reg_ansprechpartner" placeholder="" value="<?php echo $entry->mmsr_reg_ansprechpartner ?>">
                        </div>
                    </div>

                    <h3 class="mt-5">Essen</h3>
                    <div class="form-group">
                        <label for="reg_essen">Wir werden kleine Snacks bereit stellen. Um uns beim Planen zu helfen kannst du deine Präferenzen angeben.</label>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="reg_essen_vegetarisch" name="reg_essen_vegetarisch" <?php if ($entry->mmsr_reg_essen_vegetarisch): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="reg_essen_vegetarisch">vegetarisch</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="reg_essen_vegan" name="reg_essen_vegan" <?php if ($entry->mmsr_reg_essen_vegan): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="reg_essen_vegan">vegan</label>
                        </div>
                    </div>

                    <h3 class="mt-5">Möchtest du uns sonst noch etwas mitteilen?</h3>
                    <div class="form-group">
                        <label for="reg_anmerkung">Anmerkungen</label>
                        <textarea class="form-control" row="3" id="reg_anmerkung" name="reg_anmerkung"><?php echo $entry->mmsr_reg_anmerkung ?></textarea>
                    </div>



                    <button type="submit" class="btn btn-primary" id="reg_submit" name="reg_submit">Anmeldung speichern</button>
                    </form>
        </div>
    </div>
</div>



<?php get_footer(); ?>