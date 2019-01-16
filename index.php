
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
                lernen. Neben regelmäßigen Workshops zu verschiedenen Themen wird hier an eigenen Projekten
                gearbeitet. Dazu stehen viele versschiedene Maschinen zur freien Nutzung zur Verfügung.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col order-2 order-lg-1">
            <p>
                Der Maker Space befindet sich im Hagenbucher, dem Altbau der Experimenta, im Erdgeschoss und ist über
                den Haupteingang zu erreichen. 
                Jeder ist eingeladen zu kommen und an seinen Projekten zu arbeiten, sich mit anderen Auszutauschen und wohl zu fühlen.
            </p>
            <p>
                Die Öffnungszeiten erlauben es auch in den Abendstunden zusammen an Projekten zu tüfteln und sich nach der Arbeit zu treffen
                und kreativ tätig zu werden. 
            </p>
            <p>
                <h4>Öffnungszeiten</h4>
                <table>
                    <tr><td>Montag</td><td>geschlossen</td></tr>
                    <tr><td class="pr-2">Dienstag bis Freitag</td><td>15:00 - 22:00 geöffnet</td></tr>
                    <tr><td>Samstag</td><td>15:00 - 22:00 geöffnet (Abweichend bei Workshop)</td></tr>
                    <tr><td>Sonntag</td><td>geschlossen</td></tr>
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
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/b1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                            <h5>löten lernen</h5>
                            <p>In kleinen Workshops können alle den Umgang mit dem Lötkolben lernen.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/b2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                            <h5>kleine Projekte</h5>
                            <p>Für den Einstieg haben wir verschiedene Kleinstprojekte in der Schublade.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/b3.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                            <h5>eigene Projekte</h5>
                            <p>Ein fliegender Getränkekasten? Kein Problem.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
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
