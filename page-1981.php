<html style="margin: 0 !important;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="google-site-verification" content="xGu-GJN36MCN0-9aTYEr38Ttyvaidkk0ZnRYACsdTTU" />
    <meta name="google" value="notranslate">

    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.png">
    <!-- <link href="<?php echo get_template_directory_uri() ?>/assets/styles/bootstrap.css" rel="stylesheet"> -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/styles/main.css" rel="stylesheet">

    <style>
        body {
            background: #000000;
            padding: 5rem;
            margin: 0;
            color: #fff;

            height: 100vh;

            overflow: hidden;
        }

        * {
            border: none !important;
        }

        .reveal section {
            display: inline-block;
            font-size: 0.6em;
            line-height: 1.2em;
            vertical-align: top;
        }

        .text-image-container {
            display: flex;
        }

        .text-image-container .text-image-content {

            font-size: 2rem;
        }

        .text-image-container img {
            max-width: 50%;
            min-width: 50%;
        }

        .header {
            display: flex;
            align-content: space-between;
            align-items: space-between;
            justify-content: space-between;

            font-size: 2rem;
            padding: 2rem;
        }

        section {
            position: relative !important;
            top: 0 !important;
        }


        .card-list .card-list-header {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .card-list .card-list-sub-header {
            font-size: 2rem;
            margin-bottom: 2rem;
        }



        .cards {
            display: flex;
            justify-content: space-between;
        }

        .cards .card {
            width: 25%;
            background: rgba(255, 255, 255, 0.3);
        }

        .cards .card img {
            width: 100%;
        }

        .cards .card .card-body {
            padding: 1rem;
            margin-bottom: 1rem;
        }
    </style>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/revealjs/css/reset.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/revealjs/css/reveal.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/revealjs/css/theme/black.css">

    <script src="<?php echo get_template_directory_uri() ?>/assets/scripts/jquery.slim.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/scripts/popper.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/scripts/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/scripts/svg.min.js"></script>

    <?php wp_head(); ?>

</head>

<body class="text-left">

    <div class="header">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/maker-space.svg" />
    </div>





    <div class="reveal">
        <div class="slides">

            <!-- <section data-autoslide="30000"> -->
            <section class="text-left">

                <div class="card-list-header mb-3">Dein Space, deine Projekte</div>

                <div class="row">
                    <div class="col">
                        <p> Wir sind eine offene Werkstatt, mit vielfältiger Ausstattung. Bei uns treffen sich Menschen ab 14 Jahre zum Werken, Austauschen und Lernen. Neben regelmäßigen Workshops zu verschiedenen Themen, wird hier an eigenen Projekten gearbeitet. </p>
                        <p> Selbst ausprobieren und die Befähigung zum eigenständigen Arbeiten, - das ist, was den Maker Space ausmacht. Um dies zu erreichen, haben wir zahlreiche Geräte, Maschinen und Werkzeuge, sowie eine solide Grundausstattung an Materialien vorrätig. Durch die Geräteführerscheine stellen wir sicher, dass in den Werkräumen fachkundig und ohne Gefahr gearbeitet werden kann. </p>
                    </div>
                    <div class="col" style="height: 75vh; background-image: url('<?php echo header_image() ?>'); background-repeat: no-repeat; background-position: center; background-size: cover; "></div>
                </div>

            </section>
            <section class="text-left">

                <?php
                $posts = get_posts(array(
                    'post_type'         => 'workshop',
                    'posts_per_page'    =>  -1
                ));

                usort($posts, function ($a, $b) {

                    $start_date_a = get_post_meta($a->ID, 'workshop_start', true);
                    $start_date_b = get_post_meta($b->ID, 'workshop_start', true);

                    if ($start_date_a->format('Y-m-d') > $start_date_b->format('Y-m-d')) {
                        return 1;
                    }

                    if ($start_date_a->format('Y-m-d') < $start_date_b->format('Y-m-d')) {
                        return -1;
                    }

                    return 0;
                });

                print_r($posts);
                ?>

                <div class="row">
                    <div class="col">Workshops</div>
                </div>
                <div class="row">
                    <div class="col">
                        Workshops sind angeleitete Kurse mit einer Dauer von ca. 4-6 Stunden. In diesen Workshops werden neben Grundlagenwissen auch tiefergehende
                        Fertigkeiten im Umgang mit Material und Werkzeug vermittelt.
                    </div>
                </div>
                <div class="col">
                    <div class="card-list">

                        <div class="cards">

                            <?php foreach  ($posts as $post ): ?>
                            <div class="card">
                                <img [src]="card.image" />
                                <div class="card-body">
                                    <h2><?php echo $post->post_title ?></h2>
                                    <h3 class="card-sub">{{ card.subtitle }}</h3>
                                    <div class="card-content">{{ card.text }}</div>
                                </div>
                            </div>

                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>




    <script src="<?php echo get_template_directory_uri() ?>/revealjs/js/reveal.min.js"></script>
    <script>
        // More info about config & dependencies:
        // - https://github.com/hakimel/reveal.js#configuration
        // - https://github.com/hakimel/reveal.js#dependencies
        Reveal.initialize({
            width: '100%',
            height: '100%',
            hash: true,
            dependencies: [{
                    src: 'plugin/markdown/marked.js'
                },
                {
                    src: 'plugin/markdown/markdown.js'
                },
                {
                    src: 'plugin/highlight/highlight.js'
                },
                {
                    src: 'plugin/notes/notes.js',
                    async: true
                }
            ]
        });
    </script>

</body>

</html>