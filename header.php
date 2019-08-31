<html style="margin: 0 !important;"> 
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="google-site-verification" content="xGu-GJN36MCN0-9aTYEr38Ttyvaidkk0ZnRYACsdTTU" />
        <meta name="google" value="notranslate">

        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.png">
        <!-- <link href="<?php echo get_template_directory_uri() ?>/assets/styles/bootstrap.css" rel="stylesheet"> -->
        <link href="<?php echo get_template_directory_uri() ?>/assets/styles/main.css" rel="stylesheet">

        <script src="<?php echo get_template_directory_uri() ?>/assets/scripts/jquery.slim.min.js"></script>
        <script src="<?php echo get_template_directory_uri() ?>/assets/scripts/popper.min.js"></script>
        <script src="<?php echo get_template_directory_uri() ?>/assets/scripts/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri() ?>/assets/scripts/svg.min.js"></script>

    <?php wp_head(); ?>

</head>
<body>

<?php global $used_images; ?>
<?php $used_images = array(); ?>

<?php require 'navigation.php' ?>