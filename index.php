<?php get_header(); ?>

<div class="ms-header d-none d-lg-block">
    <div style="background-image: url(<?php echo header_image() ?>); background-position: center;" class="ms-header-title-image"></div>
    <div class="ms-header-prism"></div>
    <div class="ms-header-blog-info d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-6 text-light text-uppercase">
                    <span style="font-size: 30px; ">Der Maker Space <br />in der Experimenta Heilbronn</span>
                    <h1 style="font-size: 55px;">
                        <?php bloginfo('description'); ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

$announcements = get_posts(array(
    'post_type'         => 'announcement',
    'posts_per_page'    =>  -1
));
?>

<?php foreach ($announcements as $announcement) : ?>
    <?php if (!get_post_meta($announcement->ID, 'announcement_option_show_global', true)) : ?>
        <div class="" style="background-color: #ea5b0c;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning border-0" role="alert" style="background-color: #ea5b0c; color: #fff;">
                            <h3><?php echo get_the_title($announcement); ?></h3>
                            <p>
                                <?php echo $announcement->post_content; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>


<div class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <img style="max-height: 250px" src="<?php echo get_template_directory_uri(); ?>/assets/images/MMF_2020_rundesIcon.png" />
            </div>
            <div class="col">
                <h2>Mini Maker Faire Heilbronn</h2>
                <p>
                    „Dein Space, deine Projekte“ ist das Motto des Maker Space der experimenta. Nun, knapp ein Jahr nach der Eröffnung,
                    können die entstandenen Projekte auf der ersten „Mini Maker Faire Heilbronn“ bewundert werden. Hier dreht sich alles um Technologie, Kunst und Kreativität.
                </p>
                <p>
                    <a href="/mini-maker-faire-2020/">
                        <button type="button" class="btn btn-outline-secondary">Mehr erfahren</button>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

<hr class="" />

<div class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col pt-5 pt-md-0">
                <h1>Die Werkstatt für alle Maker und Kreativen</h1>
                <p>
                    Willkommen beim Maker Space der experimenta Heilbronn. Wir sind eine offene Werkstatt, mit vielfältiger Ausstattung.
                    Bei uns treffen sich Menschen ab 14 Jahre zum Werken, Austauschen und Lernen. Neben regelmäßigen Workshops zu verschiedenen Themen,
                    wird hier an eigenen Projekten gearbeitet. Der Maker Space bietet hierfür eine Vielzahl an Geräten, Werkzeugen und Materialien.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col order-2 order-lg-1">
                <p>
                    Der Maker Space, mit einer Fläche von 450 m², befindet sich im Erdgeschoss des historischen Gebäudes „Hagenbucher“ am Experimenta-Platz.
                    Hier ist jeder eingeladen mitzumachen oder einfach mal vorbei zu schauen, um sich zu informieren und die Möglichkeiten auszukundschaften.
                </p>
                <p>
                    Unsere Öffnungszeiten erlauben es auch in den Abendstunden aktiv und kreativ zu sein.
                </p>
                <p>
                    <h4>Öffnungszeiten</h4>
                    <table>
                        <tr>
                            <td class="pr-2 align-text-top">Dienstag bis Samstag</td>
                            <td class="align-text-top">15:00 - 22:00 geöffnet <br />(auch an Feiertagen und Ferien)</td>
                        </tr>
                        <tr>
                            <td class="align-text-top">Sonntag und Montag</td>
                            <td class="align-text-top">geschlossen</td>
                        </tr>
                    </table>
                </p>

            </div>
            <div class="col-12 col-lg-6 order-1 order-lg-2 mb-5">
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php use_image("Löten lernen", "Leon Hellmich", "cc-by-nc") ?>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/b1.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                                <h5>löten lernen</h5>
                                <p>In kleinen Workshops können alle den Umgang mit dem Lötkolben lernen.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <?php use_image('LED-Wolf', 'Leon Hellmich', 'cc-by-nc') ?>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/b2.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                                <h5>kleine Projekte</h5>
                                <p>Für den Einstieg haben wir verschiedene Kleinstprojekte in der Schublade.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <?php use_image('Mate-Hovercraft', 'Leon Hellmich', 'cc-by-nc') ?>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/b3.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                                <h5>eigene Projekte</h5>
                                <p>Ein fliegender Getränkekasten? Kein Problem.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <?php use_image('WLAN-RSSI-Visualizer', 'Franz Imschweiler', 'cc-by-nc') ?>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/b4.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                                <h5>kreativ sein</h5>
                                <p>Ein Gerät, dass WLAN-Stärke auf farbigen LEDs anzeigt.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pt-5 bg-white">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12 col-xl-4 p-0 d-flex flex-column" style="background: rgb(161, 198, 57);">
                <div class=" p-4 d-flex flex-column flex-fill">
                    <h2 class="text-white" style="z-index: 20;">Workshops</h2>
                    <p class="text-white flex-fill" style="z-index: 20;">
                        Mit angeleiteten Workshops fällt es leichter in ein neues Thema einzusteigen.
                        Deswegen finden regelmäßig Einführungen in unterschiedliche Inhalte statt.
                        Auch der Umgang mit unseren Geräten und Werkzeugen kann in kompakten Einheiten erlernt werden.
                    </p>
                    <a href="/workshop" class="btn btn-link text-light mt-auto" style="z-index: 20;">Workshops ansehen
                        und buchen</a>
                    <!-- <div class="d-none d-xl-block" style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(15, 182, 204); width: 50px; height: 50px;"></div> -->
                </div>

                <!-- <?php use_image('Workshop auf der Maker Faire 2018', 'Jonathan Günz', 'cc-by-nc') ?>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/workshop.jpg" class="mt-auto w-100"
                    style="z-index: 5;" /> -->
            </div>
            <div class="col-12 col-xl-4 p-0 d-flex flex-column" style="background: rgb(0, 176, 160);">
                <div class=" p-4 d-flex flex-column flex-fill">
                    <div class="text-white" style="z-index: 20;">
                        <h2>Projekte</h2>
                    </div>
                    <div class="text-white flex-fill" style="z-index: 20;">
                        Im Maker Space dreht sich alles um Projekte. Jeder kann sich verwirklichen und seine Ideen nach eigenen Vorstellungen voranbringen.
                        Es wird eigenverantwortlich gearbeitet, und dennoch wird gegenseitige Unterstützung innerhalb der Community großgeschrieben.
                        Alle Themen und Ideen sind willkommen.
                    </div>
                    <div class="mt-auto" style="z-index: 20;">
                        <a href="/category/projekte/" class="btn btn-link text-light mt-auto">
                            Abgeschlossene Projekte ansehen
                        </a>
                    </div>
                    <!-- <div class="d-none d-xl-block" style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(0, 102, 83); width: 50px; height: 50px;"></div> -->
                </div>

                <!-- <?php use_image('Matelight', 'Jonathan Günz', 'cc-by-nc') ?>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/matelight_header.jpg" class="mt-auto w-100"
                    style="z-index: 5;" /> -->
            </div>
            <div class="col-12 col-xl-4 p-0 d-flex flex-column" style="background: rgb(161, 198, 57);">
                <div class=" p-4 d-flex flex-column">
                    <h2 class="text-white" style="z-index: 20;">Ausstattung</h2>
                    <p class="text-white" style="z-index: 20;">
                        Selbst ausprobieren und die Befähigung zum eigenständigen Arbeiten, - das ist, was den Maker Space ausmacht.
                        Um dies zu erreichen, haben wir zahlreiche Geräte, Maschinen und Werkzeuge, sowie eine solide Grundausstattung an Materialien vorrätig.
                        Durch die Geräteführerscheine stellen wir sicher, dass in den Werkräumen fachkundig und ohne Gefahr gearbeitet werden kann.
                    </p>
                    <a href="/devices/" class="btn btn-link text-light mt-auto" style="z-index: 20;">Geräteliste
                        ansehen</a>
                    <!-- <div class="d-none d-xl-block" style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(188, 207, 0); width: 50px; height: 50px;"></div> -->
                </div>

                <!-- <?php use_image('3D Drucker', 'Franz Imschweiler', 'cc-by-nc') ?>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/3D_printing.jpg" class="mt-auto w-100"
                    style="z-index: 5;" /> -->
            </div>

        </div>
    </div>
</div>

<div class="pt-5 pb-5">
    <div class="container">
        <div class="row pb-3">
            <div class="col-12">
                <h2>Wo ist was</h2>
            </div>

            <!-- <div class="container-fluid mt-3 mt-md-3">
                    <div class="row"> -->

            <div class="col-12 col-xl-3 order-2 order-xl-1">
                <div>
                    <a href="/locations/digitallabor/" class="no-textdecoration">
                        <div class="text-dark pl-2 pr-2 border-right border-wo-ist-was border-color-digital">
                            <h5 class="mb-1">Digitalwerkstatt</h5>
                            <div class="">
                                Mit 3D-Drucker und CNC-Technologie gibt es hier Möglichkeiten zur digitalen Fertigung.
                            </div>
                        </div>
                    </a>
                </div>

                <div>
                    <a href="/locations/elektroniklabor/" class="no-textdecoration">
                        <div class="text-dark pl-2 pr-2 border-right border-wo-ist-was border-color-elektronik">
                            <h5 class="mb-1">Elektronikwerkstatt</h5>
                            <div class="">
                                Hier gibt es Lötplätze und Material, um Schaltungen aufzubauen und zu testen.
                            </div>
                        </div>
                    </a>
                </div>

                <div>
                    <a href="/locations/werkstatt/" class="no-textdecoration">
                        <div class="text-dark  pl-2 pr-2 border-right border-wo-ist-was border-color-holz">
                            <h5 class="mb-1">Holzwerkstatt</h5>
                            <div class="">
                                In der Werkstatt gibt es Möglichkeiten zur Holzbearbeitung.
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-12 col-xl-6 order-1 order-xl-2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Lageplan-3.svg" />
            </div>


            <div class="col-12 col-xl-3 order-3 order-xl-3">
                <a href="/locations/tonstudio/" class="no-textdecoration">
                    <div class="text-dark pl-2" style="border-left: solid 7px rgb(15, 3, 178);">
                        <h5 class="mb-1">Medienwerkstatt</h5>
                        <div>
                            Eigene Aufnahmen einspielen und bearbeiten ist in der Tonkabine möglich.
                            Zum Aufnehmen von Filmen und Fotos steht ein Fotstudio bereit.
                        </div>
                    </div>
                </a>

                <a href="/locations/textillabor/" class="no-textdecoration">
                    <div class="text-dark pl-2" style="border-left: solid 7px rgb(0, 102, 84);">
                        <h5 class="mb-1">Textilwerkstatt</h5>
                        <div>
                            Näh- und Stickarbeiten sowie Textildruck können hier realisiert werden.
                        </div>
                    </div>
                </a>

            </div>
            <!-- </div>
                </div> -->
        </div>
    </div>
</div>

<div class="pt-5 pb-5 bg-white">
    <div class="container">
        <div class="row pb-3">
            <div class="col">
                <h2>Was kostet der Maker Space</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Die Nutzung des Maker Space ist kostenlos. Alle Geräte und Räume können innerhalb der Öffnungszeiten frei genutzt werden.</p>

                <p>Wir halten viele Materialien im Maker Space vorrätig. Diese
                    Materialien können kostenlos genutzt werden. Dennoch sollte Material für
                    größere, eigene Projekte selbst beschafft und mitgebracht werden.
                    Gerne können wir bei der Auswahl und Bestellung helfen und unsere
                    Erfahrung mit einbringen.</p>

                <p>Wir wollen gerne, dass Projekte umgesetzt werden können. Wenn ein
                    Projekt an Materialkosten scheitert, wende dich an uns. Eventuell können
                    wir gemeinsam eine Lösung finden, wie dein Projekt trotzdem umgesetzt
                    werden kann. </p>
            </div>
        </div>
    </div>
</div>

<div class="pt-5 pb-5">
    <div class="container">
        <div class="row pb-3">
            <div class="col d-flex justify-content-between">
                <h2>Neuigkeiten aus dem Maker Space</h2>

                <a href="/feed" title="Veranstaltungen als RSS" class="mr-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/rss_24px.svg">
                </a>
            </div>
        </div>
        <div class="row">

            <?php

            $posts = get_posts(array(
                'post_type'         => 'post',
                'posts_per_page'    =>  9
            ));
            ?>


            <?php foreach ($posts as $post) : ?>


                <div class="col-12 col-md-6 col-xl-4 mb-5 d-flex flex-column" onclick="window.location.href = '<?php echo get_permalink(); ?>'" style="cursor: pointer;">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="" style="height: 250px; background-color: rgb(0,0,0,0.3); background-image: url(<?php the_post_thumbnail_url('medium'); ?>); background-size: cover; background-position: center;"></div>
                    <?php else : ?>
                        <div class="" style="height: 250px; background-color: rgb(0,0,0,0.3); background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/image-missing.png); background-size: cover; background-position: center;"></div>
                    <?php endif; ?>

                    <div class="bg-white flex-fill p-2">
                        <h5 class="">
                            <?php the_title() ?>
                        </h5>
                    </div>
                    <div class="bg-white p-3 text-truncate text-wrap text-justify" style="max-height: 250px;">
                        <p>
                            <?php
                            if (has_excerpt()) :
                                the_excerpt();
                            else :
                                the_content();
                            endif;
                            ?>
                        </p>
                    </div>
                    <div class="bg-white p-3 pt-auto" style="font-size: 0.72rem;">
                        <div class="text-secondary">von
                            <?php echo get_the_author() ?>
                        </div>
                        <div class="text-secondary">veröffentlicht am
                            <?php echo get_the_date() ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary w-100">Für mehr Beiträge hier klicken ... </button>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>