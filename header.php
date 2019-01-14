<html style="margin: 0 !important;"> 
    <head>
        <meta charset="utf-8">

        

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

        <link href="<?php echo get_template_directory_uri() ?>/assets/styles/main.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


    <?php wp_head(); ?>
</head>
<body>

<?php
    $margin_top = 0;
    if(is_user_logged_in()):
        $margin_top = 32;
    endif;
?>

<div class="position-sticky d-flex align-items-center" style="background: #000; z-index: 1000; top: <?php echo $margin_top; ?>px;">
    <div class="container" >

        <nav class="ms-navigation ms-nav-dark-color pl-0 navbar navbar-expand-lg navbar-dark bg-none ">

            <a style="width: 400px;" class="navbar-brand text-light" href="/">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/maker-space.svg" style="max-height: 50px;" alt="<?php echo get_bloginfo( 'name' ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <?php
                        $menu_name = 'header-menu';
                        $locations = get_nav_menu_locations();
                        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                        $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

                        foreach( $menuitems as $item):
                            $title = $item->title;
                            $link = $item->url;
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $link; ?>"><?php echo $title; ?></a>
                    </li>

                    <?php endforeach; ?>

                </ul>
            </div>
        </nav>

    </div>
</div>