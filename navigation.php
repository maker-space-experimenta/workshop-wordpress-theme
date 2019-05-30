

<div class="d-flex align-items-center ms-navbar w-100" >
    <div class="container w-100" >

        <nav class="ms-navigation ms-nav-dark-color pl-0 navbar navbar-expand-lg navbar-dark bg-none ">

    <a style="width: 400px; max-width: 50vw; font-weight: bold; font-size: 30px;" class="navbar-brand text-light" href="/">
        Maker Space
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav w-100">

        <?php
            $menu_name = 'header-menu';
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object($locations[$menu_name]);
            $menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));

            foreach ($menuitems as $item) :
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

    <div class="d-none d-md-block" style="position: absolute; right: 10px;">
        <?php if (!is_user_logged_in()) : ?>

                <a class="nav-link" href="/wp-admin">login</a>

        <?php else : ?>

                <div class="ml-auto dropdown dropleft">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="nav-img" src="<?php echo get_avatar_url(get_current_user_id())  ?>" />
                        <?php echo get_the_author_meta('display_name', get_current_user_id())  ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/wp-admin">Mein Dashboard</a>
                        <a class="dropdown-item" href="/wp-admin/profile.php">Mein Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/wp-login.php?action=logout">Logout</a>
                    </div>
                </div>
        <?php endif; ?>
    </div>


</div>

