<html style="margin: 0 !important;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="google-site-verification" content="xGu-GJN36MCN0-9aTYEr38Ttyvaidkk0ZnRYACsdTTU" />
    <meta name="google" value="notranslate">


    <!--CLARITY ICONS STYLE-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/node_modules/@clr/icons/clr-icons.min.css">

    <!--CLARITY ICONS DEPENDENCY: CUSTOM ELEMENTS POLYFILL-->
    <script src="<?php echo get_template_directory_uri() ?>/node_modules/@webcomponents/custom-elements/custom-elements.min.js"></script>

    <!--CLARITY ICONS API & ALL ICON SETS-->
    <script src="<?php echo get_template_directory_uri() ?>/node_modules/@clr/icons/clr-icons.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/scripts/main.js"></script>

    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/images/favicon.png">

    <link href="<?php echo get_template_directory_uri() ?>/styles/main.css" rel="stylesheet">

    <script src="<?php echo get_template_directory_uri() ?>/node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/scripts/svg.min.js"></script>

    <?php wp_head(); ?>

</head>

<body>

<?php while (have_posts()) : the_post(); ?>


    <div class="container mt-5 pb-5">
        <div class="row">
            <div class="col wp-post">

                <h1><?php the_title() ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>


            </div>
        </div>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>