<?php get_header(); ?>

<div class="ms-header d-none d-lg-block">
    <div style="background-image: url(<?php header_image(); ?>);" class="ms-header-title-image"></div>
    <div class="ms-header-prism"></div>
    <div class="ms-header-blog-info d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-6 text-light text-uppercase">
                    <span style="font-size: 25px; ">Der Maker Space <br />in der Experimenta Heilbronn</span>
                    <h1>
                        <?php bloginfo( 'description' ); ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white pt-5">
    <div class="container">
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
                    Der Maker Space befindet sich im Hagenbucher, dem Altbau der Experimenta, im Erdgeschoss und ist
                    über
                    den Haupteingang zu erreichen.
                    Jeder ist eingeladen zu kommen und an seinen Projekten zu arbeiten, sich mit anderen Auszutauschen
                    und wohl zu fühlen.
                </p>
                <p>
                    Die Öffnungszeiten erlauben es auch in den Abendstunden zusammen an Projekten zu tüfteln und sich
                    nach der Arbeit zu treffen
                    und kreativ tätig zu werden.
                </p>
                <p>
                    <h4>Öffnungszeiten</h4>
                    <table>
                        <tr>
                            <td>Montag</td>
                            <td>geschlossen</td>
                        </tr>
                        <tr>
                            <td class="pr-2">Dienstag bis Freitag</td>
                            <td>15:00 - 22:00 geöffnet</td>
                        </tr>
                        <tr>
                            <td>Samstag</td>
                            <td>15:00 - 22:00 geöffnet (Abweichend bei Workshop)</td>
                        </tr>
                        <tr>
                            <td>Sonntag</td>
                            <td>geschlossen</td>
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
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/b1.jpg" class="d-block w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                                <h5>löten lernen</h5>
                                <p>In kleinen Workshops können alle den Umgang mit dem Lötkolben lernen.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/b2.jpg" class="d-block w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                                <h5>kleine Projekte</h5>
                                <p>Für den Einstieg haben wir verschiedene Kleinstprojekte in der Schublade.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/b3.jpg" class="d-block w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                                <h5>eigene Projekte</h5>
                                <p>Ein fliegender Getränkekasten? Kein Problem.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/b4.jpg" class="d-block w-100"
                                alt="...">
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

<div class="pt-5">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12 col-xl-4 p-0 d-flex flex-column" style="background: rgb(161, 198, 57);">
                <div class=" p-4 d-flex flex-column">
                    <h2 style="z-index: 20;">Workshops</h2>
                    <p style="z-index: 20;">
                        Mit regelmäßigen Workshops fällt es leicht in ein neues Thema einzusteigen. Deswegen finden
                        regelmäßig Workshops zu unterschiedlichen Themen statt. Ob arbeiten mit Textilien oder Technik
                        oder beidem. Auch der Umgang mit den Geräten wir in kleinen Workshops erlernt.
                    </p>
                    <a href="/events" class="btn btn-link text-light mt-auto" style="z-index: 20;">Workshops ansehen
                        und buchen</a>
                    <div class="d-none d-xl-block" style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(161, 198, 57); width: 50px; height: 50px;"></div>
                </div>

                <img src="<?php echo get_template_directory_uri() ?>/assets/images/workshop.jpg" class="mt-auto w-100"
                    style="z-index: 5;" />
            </div>
            <div class="col-12 col-xl-4 p-0 d-flex flex-column" style="background: rgb(0, 176, 160);">
                <div class=" p-4 d-flex flex-column">
                    <h2 style="z-index: 20;">Projekte</h2>
                    <p style="z-index: 20;">
                        Im Maker Space dreht sich alles um die Projekte. Jeder kann seine eigenen Projekte mitbringen
                        und bearbeiten. Gruppen können gemeinsam an Projekten arbeiten. Jedes Thema und jede Idee ist
                        willkommen.
                    </p>
                    <a href="http://localhost:8080/category/projekte/" style="z-index: 20;" class="btn btn-link text-light mt-auto">
                        Abgeschlossene Projekte ansehen
                    </a>
                    <div class="d-none d-xl-block" style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(0, 176, 160); width: 50px; height: 50px;"></div>
                </div>

                <img src="<?php echo get_template_directory_uri() ?>/assets/images/matelight_header.jpg" class="mt-auto w-100"
                    style="z-index: 5;" />
            </div>
            <div class="col-12 col-xl-4 p-0 d-flex flex-column" style="background: rgb(161, 198, 57);">
                <div class=" p-4 d-flex flex-column">
                    <h2 style="z-index: 20;">Ausstattung</h2>
                    <p style="z-index: 20;">
                        Selbst ausprobieren und eigenständig arbeiten können. Das ist es, was den Maker Space ausmacht.
                        Um das zu tun haben wir viele Geräte, Maschinen sowie Material vor Ort. Mit den Führerscheinen
                        für
                        Geräte und Maschinen stellen wir sicher, dass alle im Maker Space ohne Gefahr arbeiten können.
                    </p>
                    <a href="/devices/" class="btn btn-link text-light mt-auto" style="z-index: 20;">Geräteliste
                        ansehen</a>
                    <div class="d-none d-xl-block" style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(161, 198, 57); width: 50px; height: 50px;"></div>
                </div>

                <img src="<?php echo get_template_directory_uri() ?>/assets/images/3D_printing.jpg" class="mt-auto w-100"
                    style="z-index: 5;" />
            </div>

        </div>
    </div>
</div>


<div class="bg-white pt-5 pb-5">
    <div class="container">
        <div class="row pb-3">
            <div class="col">
                <h2>Wo ist was</h2>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-xl-3 d-flex flex-column justify-content-between p-0">
                            <a href="/locations/digitallabor/" class="no-textdecoration">
                                <div class="text-dark pr-2" style="border-right: solid 5px rgb(0,0,255);">
                                    <h5 class="mb-1">Digitallabor</h5>
                                    <div class="text-right">
                                        Mit 3D-Drucker und CNC-Technologie gibt es hier Möglichekeiten zur digitalen Fertigung.
                                    </div>
                                </div>
                            </a>

                            <a href="/locations/elektroniklabor/" class="no-textdecoration">
                                <div class="text-dark pr-2" style="border-right: solid 5px rgb(255, 0, 0);">
                                    <h5 class="mb-1">Elektroniklabor</h5>
                                    <div class="text-right">
                                        Hier gibt es Lötplätze und Material um Schaltungen aufzubauen und zu testen.
                                    </div>
                                </div>
                            </a>
                            
                            <a href="/locations/werkstatt/" class="no-textdecoration">
                                <div class="text-dark pr-2" style="border-right: solid 5px rgb(0, 255, 0);">
                                    <h5 class="mb-1">Werkstatt</h5>
                                    <div class="text-right">
                                        In der Werkstatt wird es Möglichekeiten zur Holzbearbeitung geben.

                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class=" col-12 col-xl-6"><object data="<?php echo get_template_directory_uri(); ?>/assets/images/Lageplan.svg"></object></div>
                        
                        <div class="col-12 col-xl-3 d-flex flex-column justify-content-between p-0">
                                <a href="/locations/tonstudio/" class="no-textdecoration">
                                    <div class="text-dark pl-2" style="border-left: solid 5px rgb(255, 99, 0);">
                                        <h5 class="mb-1">Tonstudio</h5>
                                        <div>
                                            Eigene Aufnahmen einspielen und bearbeiten ist in der Tonstudio möglich.
                                        </div>
                                    </div>
                                </a>
    
                                <a href="/locations/medienlabor/" class="no-textdecoration">
                                    <div class="text-dark pl-2" style="border-left: solid 5px rgb(255, 141, 0);">
                                        <h5 class="mb-1">Medienlabor</h5>
                                        <div>
                                            Filme vor dem GreenScreen und professionell Fotos aufnehmen geht im Medienlabor.
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="/locations/textillabor/" class="no-textdecoration">
                                    <div class="text-dark pl-2" style="border-left: solid 5px rgb(255, 255, 0);">
                                        <h5 class="mb-1">Textillabor</h5>
                                        <div>
                                            Textildruck sowie Näh- und Stickarbeiten können im Textillabor erledigt werden.
                                        </div>
                                    </div>
                                </a>
    
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pt-5 pb-5">
    <div class="container">
        <div class="row pb-3">
            <div class="col">
                <h2>Neuigkeiten aus dem Maker Space</h2>
            </div>
        </div>
        <div class="row">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-12 col-md-6 col-xl-4 mb-5 d-flex flex-column" onclick="window.location.href = '<?php echo get_permalink(); ?>'"
                style="cursor: pointer;">
                <?php if ( has_post_thumbnail() ): ?>
                <div class="" style="height: 250px; background-color: rgb(0,0,0,0.3); background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"></div>
                <?php else: ?>
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
                            if(has_excerpt()):
                                the_excerpt();
                            else:
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
            <?php endwhile; endif; ?>

        </div>
    </div>
</div>


<?php get_footer(); ?>