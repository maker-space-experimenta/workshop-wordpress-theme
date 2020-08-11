<!DOCTYPE html>
<html style="margin: 0 !important;" lang="de">

<head>
    <title>Maker Space</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="xGu-GJN36MCN0-9aTYEr38Ttyvaidkk0ZnRYACsdTTU" />
    <meta name="google" value="notranslate">

    <meta name="description" content="Der Maker Space der experimenta in Heilbronn">


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

    <script>
        function sendResetAction() {
            window.parent.postMessage({
                type: 'DVS_Tick'
            }, '*')
        }

        function startup() {
            const query = window.location.search
            const params = {}

            for (let param of query.substr(1).split('&')) {
                const split = param.split('=')

                params[split[0]] = split[1]
            }

            const lang = document.getElementById('language')

            lang.innerText = params.l

            window.addEventListener('mousedown', sendResetAction)
            window.addEventListener('mousewheel', sendResetAction)
            window.addEventListener('touchstart', sendResetAction)

        }
    </script>

    <?php wp_head(); ?>

</head>

<body onload="startup()">

    <?php global $used_images; ?>
    <?php $used_images = array(); ?>


    <?php require 'navigation.php' ?>