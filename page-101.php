<!-- template: über den maker space -->

<?php get_header(); ?>

<div class="" style="height: 450px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/header-04.jpg); background-size: cover; background-position: center;"></div>

<div class="container mt-5 pb-5">
    <div class="row">
        <div class="col">
            <?php while (have_posts()) : the_post(); ?>

                <h1><?php the_title() ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>

            <?php endwhile; ?>

        </div>
    </div>
</div>

<div class="" style="background: rgba(1,1,1,0.2);">

    <div class="container mt-5 pb-5" style="min-height: 100vh">
        <div class="row pt-4 pb-4">
            <div class="col">
                <h1>Das Maker Space Team</h1>
            </div>
        </div>

        <div class="row pb-5 text-justify">
            <div class="col">
                Unser Team ist immer während der Öffnungszeiten für euch da. Sprecht uns einfach an und wir versuchen euch nach kräften zu helfen.
                Egal ob fachliche Fragen zu bestimmten Projekten oder allgemeinen Fragen rund um den Maker Space.
            </div>
        </div>

        <div class="row pt-2 pb-2">
            <div class="col-4 d-flex justify-content-center">
                <div style="height: 250px; width: 250px; border-radius: 125px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/team-andreas.jpg); background-size: cover; background-position: center;"></div>
            </div>
            <div class="col">
                <h2>Andreas</h2>
                <p class="text-justify">
                    Andreas begeistert sich für Projekte mit liebe zum Detail. Neben der Elektronikwerkstatt kann er auch in der Holzwerkstatt und am Laser Cutter unterstützen.
                    Als Teamleiter im Maker Space ist er außerdem Ansprechpartner für die meisten organisatorischen Fragen.
                </p>
                <p class="text-justify">
                    Zu finden ist Andreas meistens am großen Tisch.
                </p>
            </div>
        </div>

        <div class="row pt-2 pb-2">
            <div class="col d-flex flex-column justify-content-center">
                <h2>Caro</h2>
                <p class="text-justify">
                    Caro ist studierte Produktdesignerin. Am liebsten hält sie sich in der Textilwerkstatt auf oder hilft beim entwickeln neuer Projekte.
                    Wichtig sind ihr Themen wie nachhaltiger Umgang mit Ressourcen und funktionale Designs.
                </p>
                <p>
                    Caro findet ihr meistens an der Theke oder in der Textilwerkstatt.
                </p>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div style="height: 250px; width: 250px; border-radius: 125px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/team-caro.jpg); background-size: cover; background-position: center;"></div>
            </div>
        </div>

        <div class="row pt-2 pb-2">

            <div class="col-4 d-flex justify-content-center">
                <div style="height: 250px; width: 250px; border-radius: 125px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/team-joni.jpg); background-size: cover; background-position: center;"></div>
            </div>
            <div class="col d-flex flex-column justify-content-center">
                <h2>Joni</h2>
                <p class="text-justify">
                    Joni ist als ausgebildeter Softwareentwickler unser Ansprechpartner für alle Fragen rund um Programmierung.
                    Außerdem hilft er gerne bei Problemen in der Elektronikwerkstatt. Außerdem kann er bei Fragen rund um die Medienwerkstatt und Tonkabine helfen.
                </p>
                <p class="text-justify">
                    Joni findet ihr meistens überall und nirgends im Space. Er läuft gerne herum und guckt sich die Projekte an und unterhält sich mit Besuchenden über Ideen.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <h2>Daniel</h2>
                <p>

                </p>
            </div>
        </div>

        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <h2>Julius</h2>
                <p>

                </p>
            </div>
        </div>


    </div>
</div>


<?php get_footer(); ?>