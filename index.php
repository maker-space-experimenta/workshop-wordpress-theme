
<?php get_header(); ?>

<div class="ms-header">
    <div style="background-image: url(<?php header_image(); ?>);" class="ms-header-title-image"></div>
    <div class="ms-header-prism"></div>
    <div class="ms-header-blog-info d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col text-light">
                    <span>Selbst Projekte umsetzen, statt immer nur konsumieren.</span>
                    <h2>Jugendliche arbeiten an einem Testaufbau.</h2>
                    <span>Um für ein Projekt die Schaltpläne zu testen werden alle Aufbauten einmal auf einem Breadboard getestet.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1>Die High-Tech-Werkstatt für alle</h1>
            <p>
                Willkommen beim Maker Space der Experimenta Heilbronn. Der Maker Space ist eine offene Werkstatt im
                Erdgeschoss der Experimenta. Hier treffen sich Menschen zum basteln, diskutieren, austauschen und
                lernen. Neben regelmäßigen Workshops zu versschiedenen Themen wird hier an eigenen Projekten
                gearbeitet. Dazu stehen viele versschiedene Maschinen zur freien Nutzung zur Verfügung.
            </p>
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/buildings.png" class="rounded mx-auto mg-fluid img-thumbnail float-right" />
            <p>
                Der Maker Space befindet sich im Hagenbucher, dem Altbau der Experimenta, im Erdgeschoss und ist über
                den Haupteingang zu erreichen.
            </p>
            <p>
                <a href="/open" class="btn btn-link">Öffnungszeiten</a>
            </p>

        </div>
    </div>
</div>

<div style="background: rgba(0,0,0,0.1)">
    <div class="container mt-5">
        <div class="row mt-5 pb-5 pt-5">
            <div class="col p-0 d-flex flex-column" style="background: rgb(161, 198, 57);">
                <div class=" p-4 d-flex flex-column">
                    <h2 style="z-index: 20;">Workshops</h2>
                    <p style="z-index: 20;">
                        Mit regelmäßigen Workshops fällt es leicht in ein neues Thema einzusteigen. Deswegen finden
                        regelmäßig Workshops zu unterschiedlichen Themen statt. Ob arbeiten mit Textilien oder Technik
                        oder beidem. Auch der Umgang mit den Geräten wir in kleinen Workshops erlernt.
                    </p>
                    <a href="/events" class="btn btn-link text-light mt-auto" style="z-index: 20;">Workshops ansehen und buchen</a>
                    <div style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(161, 198, 57); width: 50px; height: 50px;"></div>
                </div>

                <img src="<?php echo get_template_directory_uri() ?>/assets/images/workshop.jpg" class="mt-auto w-100" style="z-index: 5;" />
            </div>
            <div class="col p-0 d-flex flex-column" style="background: rgb(0, 176, 160);">
                <div class=" p-4 d-flex flex-column">
                    <h2 style="z-index: 20;">Projekte</h2>
                    <p style="z-index: 20;">
                        Im Maker Space dreht sich alles um die Projekte. Jeder kann seine eigenen Projekte mitbringen
                        und bearbeiten. Gruppen können gemeinsam an Projekten arbeiten. Jedes Thema und jede Idee ist
                        willkommen.
                    </p>
                    <button style="z-index: 20;" class="btn btn-link text-light mt-auto">Abgeschlossene Projekte
                        ansehen</button>
                    <div style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(0, 176, 160); width: 50px; height: 50px;"></div>
                </div>

                <img src="<?php echo get_template_directory_uri() ?>/assets/images/matelight_header.jpg" class="mt-auto w-100" style="z-index: 5;" />
            </div>
            <div class="col p-0 d-flex flex-column" style="background: rgb(161, 198, 57);">
                <div class=" p-4 d-flex flex-column">
                    <h2 style="z-index: 20;">Führerscheine</h2>
                    <p style="z-index: 20;">
                    Selbst ausprobieren und eigenständig arbeiten können. Das ist es, was den Maker Space ausmacht.
                        Um das zu tun muss aber ein Grundset aus Fähigkeiten vorhanden sein. Mit den Führerscheinen für
                        Geräte und Maschinen stellen wir sicher, dass alle im Maker Space ohne Gefahr arbeiten können.
                    </p>
                    <a href="/events/kategorie/fuehrerscheine/list/" class="btn btn-link text-light mt-auto" style="z-index: 20;">Termine für Führerscheine</a>
                    <div style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(161, 198, 57); width: 50px; height: 50px;"></div>
                </div>

                <img src="<?php echo get_template_directory_uri() ?>/assets/images/matelight_header.jpg" class="mt-auto w-100" style="z-index: 5;" />
            </div>

        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col">

            <div class="list-group">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
                    <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?php the_title() ?></h5>
                            <small><?php the_date(); ?> von <?php the_author(); ?></small>
                        </div>
                        <p class="mb-1"><?php the_excerpt(); ?></p>
                        <small>weiter lesen ...</small>
                    </a>

                <?php endwhile; endif; ?>
            </div>

        </div>
    </div>
</div>


<?php get_footer(); ?>
