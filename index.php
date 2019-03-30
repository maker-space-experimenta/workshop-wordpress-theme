<?php get_header(); ?>

<div class="ms-header d-none d-lg-block">
    <?php use_image("Jugendliche arbeiten an einem Steckbrett", "Leon Hellmich", "cc-by-nc") ?>
    <div style="background-image: url(<?php header_image(); ?>;" class="ms-header-title-image"></div>
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
                <h1>Die Werkstatt für alle Maker und Kreativen</h1>
                <p>
                    Willkommen beim Maker Space der experimenta Heilbronn.  Wir sind eine offene Werkstatt, mit vielfältiger Ausstattung. 
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
                            <td>Montag</td>
                            <td>geschlossen</td>
                        </tr>
                        <tr>
                            <td class="pr-2">Dienstag bis Samstag</td>
                            <td>15:00 - 22:00 geöffnet</td>
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
                            <?php use_image("Löten lernen", "Leon Hellmich", "cc-by-nc") ?>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/b1.jpg" class="d-block w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                                <h5>löten lernen</h5>
                                <p>In kleinen Workshops können alle den Umgang mit dem Lötkolben lernen.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <?php use_image('LED-Wolf', 'Leon Hellmich', 'cc-by-nc') ?>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/b2.jpg" class="d-block w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                                <h5>kleine Projekte</h5>
                                <p>Für den Einstieg haben wir verschiedene Kleinstprojekte in der Schublade.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <?php use_image('Mate-Hovercraft', 'Leon Hellmich', 'cc-by-nc') ?>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/b3.jpg" class="d-block w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block w-100" style="left: 0; right: 0; background: rgba(0,0,0,0.5)">
                                <h5>eigene Projekte</h5>
                                <p>Ein fliegender Getränkekasten? Kein Problem.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <?php use_image('WLAN-RSSI-Visualizer', 'Franz Imschweiler', 'cc-by-nc') ?>
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
            <div class="col-12 col-xl-4 p-0 d-flex flex-column" style="background: rgb(15, 182, 204);">
                <div class=" p-4 d-flex flex-column">
                    <h2 class="text-white" style="z-index: 20;">Workshops</h2>
                    <p class="text-white" style="z-index: 20;">
                        Mit angeleiteten Workshops fällt es leichter in ein neues Thema einzusteigen. 
                        Deswegen finden regelmäßig Einführungen in unterschiedliche Inhalte statt. 
                        Auch der Umgang mit unseren Geräten und Werkzeugen kann in kompakten Einheiten erlernt werden.
                    </p>
                    <a href="/events" class="btn btn-link text-light mt-auto" style="z-index: 20;">Workshops ansehen
                        und buchen</a>
                    <div class="d-none d-xl-block" 
                         style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(15, 182, 204); width: 50px; height: 50px;"></div>
                </div>

                <?php use_image('Workshop auf der Maker Faire 2018', 'Jonathan Günz', 'cc-by-nc') ?>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/workshop.jpg" class="mt-auto w-100"
                    style="z-index: 5;" />
            </div>
            <div class="col-12 col-xl-4 p-0 d-flex flex-column" style="background: rgb(0, 102, 83);">
                <div class=" p-4 d-flex flex-column flex-fill">
                    <div class="text-white" style="z-index: 20;"><h2>Projekte</h2></div>
                    <div class="text-white flex-fill" style="z-index: 20;">
                        Im Maker Space dreht sich alles um Projekte. Jeder kann sich verwirklichen und seine Ideen nach eigenen Vorstellungen voranbringen. 
                        Es wird eigenverantwortlich gearbeitet, und dennoch wird gegenseitige Unterstützung innerhalb der Community großgeschrieben. 
                        Alle Themen und Ideen sind willkommen.
                    </div>
                    <div class="mt-auto"  style="z-index: 20;">
                        <a href="http://localhost:8080/category/projekte/" class="btn btn-link text-light mt-auto">
                            Abgeschlossene Projekte ansehen
                        </a>
                    </div>
                    <div class="d-none d-xl-block" style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(0, 102, 83); width: 50px; height: 50px;"></div>
                </div>

                <?php use_image('Matelight', 'Jonathan Günz', 'cc-by-nc') ?>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/matelight_header.jpg" class="mt-auto w-100"
                    style="z-index: 5;" />
            </div>
            <div class="col-12 col-xl-4 p-0 d-flex flex-column" style="background: rgb(188, 207, 0);">
                <div class=" p-4 d-flex flex-column">
                    <h2 class="text-white" style="z-index: 20;">Ausstattung</h2>
                    <p class="text-white" style="z-index: 20;">
                        Selbst ausprobieren und die Befähigung zum eigenständigen Arbeiten, - das ist, was den Maker Space ausmacht. 
                        Um dies zu erreichen, haben wir zahlreiche Geräte, Maschinen und Werkzeuge, sowie eine solide Grundausstattung an Materialien vorrätig. 
                        Durch die Geräteführerscheine stellen wir sicher, dass in den Werkräumen fachkundig und ohne Gefahr gearbeitet werden kann.
                    </p>
                    <a href="/devices/" class="btn btn-link text-light mt-auto" style="z-index: 20;">Geräteliste
                        ansehen</a>
                    <div class="d-none d-xl-block" style="z-index: 10; position: absolute; bottom: 200px; left: calc(50% - 25px); transform: rotate(45deg); background: rgb(188, 207, 0); width: 50px; height: 50px;"></div>
                </div>

                <?php use_image('3D Drucker', 'Franz Imschweiler', 'cc-by-nc') ?>
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

                        <div class="col-12 col-xl-3 order-1 order-xl-1 d-flex flex-column justify-content-between p-0">
                            <a href="/locations/digitallabor/" class="no-textdecoration">
                                <div class="text-dark pr-2 border-right border-color-digital border-wo-ist-was">
                                    <h5 class="mb-1 text-right">Digitalwerkstatt</h5>
                                    <div class="text-right">
                                        Mit 3D-Drucker und CNC-Technologie gibt es hier Möglichekeiten zur digitalen Fertigung.
                                    </div>
                                </div>
                            </a>

                            <a href="/locations/elektroniklabor/" class="no-textdecoration">
                                <div class="text-dark pr-2" style="border-right: solid 7px rgb(239, 125, 0);">
                                    <h5 class="mb-1 text-right">Elektronikwerkstatt</h5>
                                    <div class="text-right">
                                        Hier gibt es Lötplätze und Material um Schaltungen aufzubauen und zu testen.
                                    </div>
                                </div>
                            </a>
                            
                            <a href="/locations/werkstatt/" class="no-textdecoration">
                                <div class="text-dark pr-2" style="border-right: solid 7px rgb(255, 237, 0);">
                                    <h5 class="mb-1 text-right">Holzwerkstatt</h5>
                                    <div class="text-right">
                                        In der Werkstatt wird es Möglichekeiten zur Holzbearbeitung geben.

                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class=" col-12 col-xl-6 order-3 order-xl-2">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Lageplan-3.svg"
                                 style="display: block; max-width: 100%; max-height: 100%; min-width: 100%; min-height: 100%; width: auto; height: auto;" />
                        </div>

                        
                        <div class="col-12 col-xl-3 order-2 order-xl-3 d-flex flex-column justify-content-between p-0">
                                <a href="/locations/tonstudio/" class="no-textdecoration">
                                    <div class="text-dark pl-2" style="border-left: solid 7px rgb(15, 3, 178);">
                                        <h5 class="mb-1">Medienwerkstatt</h5>
                                        <div>
                                            Eigene Aufnahmen einspielen und bearbeiten ist in der Tonstudio möglich.
                                            Filme vor dem GreenScreen und professionell Fotos aufnehmen geht im Medienlabor.
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="/locations/textillabor/" class="no-textdecoration">
                                    <div class="text-dark pl-2" style="border-left: solid 7px rgb(0, 102, 84);">
                                        <h5 class="mb-1">Textilwerkstatt</h5>
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
                <div class="" style="height: 250px; background-color: rgb(0,0,0,0.3); background-image: url(<?php echo get_the_post_thumbnail_url(); ?>; background-size: cover; background-position: center;"></div>
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