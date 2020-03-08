<?php get_header(); ?>


<div class="container mt-5 pb-5">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">

                <h2>Absage Mini Maker Faire</h2>

                <p>
                    Die Mini Maker Faire ist aufgrund der aktuellen Lage vorerst abgesagt.
                </p>

                <p>
                    Aufgrund der aktuellen Lage bleibt die experimenta bis auf Weiteres geschlossen.
                    Weitere Informationen erhalten sie auf unserer Hauptseite <a href="https://www.experimenta.science">https://www.experimenta.science</a>. Vielen Dank für Ihr Verständnis.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 pb-5">
    <div class="row">
        <div class="col-12">
            <h1>Mini Maker Faire 2020 - 07.03. von 10:00 bis 18:00 Uhr</h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col col-lg-6 text-justify">
            <p>
                „Dein Space, deine Projekte“ ist das Motto des Maker Space der experimenta. Nun, knapp ein Jahr nach der Eröffnung,
                können die entstandenen Projekte auf der ersten „Mini Maker Faire Heilbronn“ bewundert werden. Hier dreht sich alles um Technologie, Kunst und Kreativität.
            </p>
            <p>
                Die ganze Familie ist eingeladen. Lernt unsere Werkstätten kennen, nehmt an den vielen Aktivitäten teil und kommt mit erfahrenen Makern ins Gespräch.
                Ergänzt wird das Angebot durch informative Vorträge. Inspiration ist garantiert.
            </p>
        </div>
        <div class="col col-md-6 d-flex justify-content-center">
            <img style="max-height: 250px" src="<?php echo get_template_directory_uri(); ?>/assets/images/MMF_2020_rundesIcon.png" />
        </div>
    </div>
</div>

<div style="background: rgba(0, 0, 0, 0.08);">
    <div class="container mt-5 pb-5">

        <div class="row pt-3 pb-3">
            <div class="col col-lg-8">
                <h2>Unsere Aussteller</h2>
            </div>
        </div>


        <?php
        global $wpdb;

        function getUrl($wsId, $filter)
        {
            $url = "/wp-admin/admin.php?page=Mini+Maker+Faire";

            if ($wsId != null) {
                $url .= "&registration_id=" . $wsId . "&";
            }

            return $url;
        }

        $sql = "SELECT * FROM makerspace_makerfaire_stand_registrations ORDER BY mmsr_reg_projektname";

        $entries = $wpdb->get_results($sql);

        ?>

        <?php foreach ($entries as $entry) : ?>

            <div class="row pb-3">
                <div class="col col-lg-6" style="background-image:url(<?php echo $entry->mmsr_reg_image; ?>); background-size: contain; background-position: center; background-repeat: no-repeat;"></div>
                <div class="col col-lg-6">
                    <h4><?php echo $entry->mmsr_reg_projektname; ?></h4>
                    <p><?php echo $entry->mmsr_reg_kurzbeschreibung; ?></p>
                    <p><a href="<?php echo $entry->mmsr_reg_website; ?>" style="color: rgb(0, 102, 83);"><?php echo $entry->mmsr_reg_website; ?></a></p>
                    <p><a href="<?php echo $entry->mmsr_reg_twitter; ?>" style="color: rgb(0, 102, 83);"><?php echo $entry->mmsr_reg_twitter; ?></a></p>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>

<div class="container mt-5 pb-5">

    <div class="row pt-3 pb-3">
        <div class="col col-lg-12">
            <h2>Vorträge und Workshops</h2>
            <p>
                Auf der Mini Maker Faire Heilbronn wird es verschiedene Vorträgen und Workshops geben.
                Die Anmeldung zu den Workshops erfolgt direkt vor Ort bei der Veranstaltung.
                Für die Vorträge ist keine Anmeldung notwendig.
            </p>
            <p>
                Den aktuellen Workshop-Plan und die Vorträge findet ihr hier - Änderungen bis zur Veranstaltung vorbehalten.
            </p>
            <p>

                <a href="https://talks.makerfaire-heilbronn.de/mini-maker-faire-heilbronn-2020/schedule/" target="window">
                    <button type="button" class="btn btn-outline-secondary w-100">
                        zur Programmvorschau
                    </button>
                </a>
            </p>
        </div>
    </div>
</div>


<div class="container mt-5 pb-5">

    <!-- <div class="row mt-0">
        <div class="col col-md-6" style="height: 450px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/workshop.jpg); background-size: cover; background-position: center;">

        </div>
        <div class="col text-justify">
            <div class="row mt-3">
                <div class="col">
                    <h2>Call for Makers</h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <p>
                        Natürlich geht eine Mini Maker Faire nicht ohne euch. Daher suchen wir nach kreativen Köpfen, Bastler*innen und allen anderen,
                        die Projekte vorstellen und sich vernetzen wollen. Kurz: Wir suchen Ausstellende. Meldet euch an, um einen Standplatz im Kubus in der Experimenta zu bekommen.
                    </p>
                    <p>
                        Egal ob Schul-Technik-AG oder Jugendverein – jeder DIY-Beitrag ist willkommen. Hauptsache selbst gemacht und kreativ,
                        technisch interessant oder handwerklich geschickt.
                    </p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <a href="/mini-maker-faire-2020/standanmeldung/">
                        <button type="button" class="btn btn-outline-secondary w-100">
                            Ich möchte einen eigenen Stand anmelden.
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col text-justify">
            <div class="row mt-3">
                <div class="col">
                    <h2>Call for Participation</h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <p>
                        Du hast ein besonders spannendes Thema oder möchtest anderen Menschen direkt etwas beibringen? Super!
                        Dann bist du mit deinem Workshop oder deinem Vortrag perfekt für die Mini Maker Faire geeignet.
                    </p>
                    <p>
                        Die Workshops werden in den Laboren stattfinden. Diese sind ausgerüstet um naturwissenschaftliche Kurse für
                        Schulgruppen durchzuführen und bieten damit den perfekten Ort für dich und deinen Workshop.
                    </p>
                    <p>
                        Vorträge werden im Forum, direkt vor den Toren des Maker Space durchgeführt. Die Aufmerksamkeit der Menge ist dir dort gewiss.
                        Zusätzlich zu den Sitzplätzen wird dort viel Laufpublikum vorbei kommen und dir zuhören.
                    </p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">

                    <a href="https://talks.makerfaire-heilbronn.de/mini-maker-faire-heilbronn-2020/cfp">
                        <button type="button" class="btn btn-outline-secondary w-100">Ich möchte einen Vortrag oder Workshop einreichen.</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col col-md-6" style="height: 450px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/image6.jpeg); background-size: cover; background-position: center;">
        </div>
    </div> -->


    <div class="row">
        <div class="col text-justify">
            <div class="row mt-3">
                <div class="col">
                    <h2>Als Besucher zur Mini Maker Faire</h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <p>
                        Besuchende können die Maker Faire kostenfrei und ohne Anmeldung besuchen.
                    </p>
                    <!-- <P>
                        Das Rahmenprogramm sowie die Liste der ausstellenden Maker und Makerinnen wird spätestens einen Monat vor dem Event hier veröffentlicht.
                        Bis dahin bitten wir um Geduld.
                    </P> -->
                </div>
            </div>

            <div class="row mt-3">

                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h3>Anfahrt</h3>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <p>
                                Mit dem Auto kann im Parkhaus der experimenta geparkt werden. Das Parkticket kann an der Kasse der experimenta auf 5€ reduziert werden.
                            </p>
                            <P>
                                Mit dem Zug könnt ihr direkt bis zum Heilbronner Hauptbahnhof fahren. Von da aus ist es noch eine Haltestelle mit der S-Bahn bis zum Neckarturm
                                oder 5 Minuten zu Fuß bis zu uns.
                            </P>
                            <p>
                                Für Besuche die mit dem Fahrrad anreisen, gibt es vor dem Haus Möglichkeiten zum Anschließen der Räder.
                            </p>

                            <p>
                                Die Mini Maker Faire Heilbronn findet im Hagenbucher, dem älteren der beiden experimenta-Gebäude, statt.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1362.771173803105!2d9.215423442853309!3d49.14384667780922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47982f54bbd7668b%3A0xa73b93c0ac25b007!2sMaker%20Space%20experimenta%20Heilbronn!5e0!3m2!1sen!2sde!4v1575636848573!5m2!1sen!2sde" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            Heilbronn Mini Maker Faire ist eine unabhängig organisierte Veranstaltung unter der Lizenz von Maker Media und wird präsentiert vom deutschsprachigen Make Magazin.
        </div>
    </div>
</div>



<?php get_footer(); ?>