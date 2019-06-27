<div class="text-light" style="background: black; min-height: 500px; font-size: 15px; line-height: 24px; padding-bottom: 70px;">

    <div class="container pt-5">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="p-0 mb-3">
                    <span style="color: white;">Gefördert durch:</span>
                </div>
                <div class="p-0 mb-5">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dss-logo-weiss-964d9da7.png" style="width: 150px;">
                </div>

                <div class="p-0 mb-3">
                    <span style="color: white;">Premiumpartner:</span>
                </div>
                <div class="p-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo_SchwarzGruppe-5b4538c1.png" style="width: 150px;">
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <hr style="border-top-color: #6c6d74;" />

                <h6 class="text-uppercase" style="color: #404040;">Die experimenta </h6>

                <?php $menu_items = wp_get_nav_menu_items('menu_die_experimenta') ?>

                <ul class="list-group">
                    <?php foreach ($menu_items as $menu_item) : ?>

                        <li class="list-group-item bg-transparent pl-0 text-light">
                            <a href="<?php echo get_post_meta($menu_item->ID, '_menu_item_url', true) ?>" class="text-white"><?php echo $menu_item->title ?></a>
                        </li>

                    <?php endforeach; ?>
                </ul>

                <!--
                    <li class="list-group-item bg-transparent pl-0 text-light"><a
                            href="http://www.experimenta.science/leitung" class="text-white">Leitung</a></li>
                    <li class="list-group-item bg-transparent pl-0 text-light"><a
                            href="http://www.experimenta.science/architektur" class="text-white">Architektur</a></li>
                    <li class="list-group-item bg-transparent pl-0 text-light"><a
                            href="http://www.experimenta.science/veranstaltungen" class="text-white">Veranstaltungen</a>
                    </li>
                    <li class="list-group-item bg-transparent pl-0 text-light"><a
                            href="http://www.experimenta.science/oeffnungszeiten-anfahrt"
                            class="text-white">Öffnungszeiten &amp; Anfahrt</a></li>

                 -->

            </div>
            <div class="col-12 col-lg-3">
                <hr style="border-top-color: #6c6d74;" />

                <h6 class="text-uppercase" style="color: #404040;">Quick Links </h6>

                <?php $menu_items = wp_get_nav_menu_items('menu_quick_links') ?>

                <ul class="list-group">
                    <?php foreach ($menu_items as $menu_item) : ?>

                        <li class="list-group-item bg-transparent pl-0 text-light">
                            <a href="<?php echo get_post_meta($menu_item->ID, '_menu_item_url', true) ?>" class="text-white"><?php echo $menu_item->title ?></a>
                        </li>

                    <?php endforeach; ?>
                </ul>

                <!-- <ul class="list-group">

                    <li class="list-group-item bg-transparent pl-0 text-light"><a href="http://www.experimenta.science/jobs"
                            class="text-white">Jobs</a></li>
                    <li class="list-group-item bg-transparent pl-0 text-light"><a href="http://www.experimenta.science/presse"
                            class="text-white">Presse</a></li>
                    <li class="list-group-item bg-transparent pl-0 text-light"><a href="http://www.experimenta.science/kontakt"
                            class="text-white">Kontakt</a></li>
                    <li class="list-group-item bg-transparent pl-0 text-light"><a href="http://www.experimenta.science/datenschutz"
                            class="text-white">Datenschutz</a></li>
                    <li class="list-group-item bg-transparent pl-0 text-light"><a href="http://www.experimenta.science/impressum"
                            class="text-white">Impressum</a></li>

                </ul> -->
            </div>

            <div class="col-12 col-lg-3">
                <hr style="border-top-color: #6c6d74;" />

                <h6 class="text-uppercase" style="color: #404040;">Feeds und News</h6>

                <ul class="list-group">

                    <li class="list-group-item bg-transparent pl-0 text-light">
                        <a href="/feed" class="text-white">Blog RSS</a>
                    </li>

                    <li class="list-group-item bg-transparent pl-0 text-light">
                        <a href="/workshop/feed" class="text-white">Veranstaltungen RSS</a>
                    </li>

                    <li class="list-group-item bg-transparent pl-0 text-light">
                        <a href="<?php echo get_feed_link('calendar'); ?>" class="text-white">Veranstaltungen Kalender</a>
                    </li>

                </ul>

            </div>

        </div>
    </div>

    <div class="container pt-5" style="color: #6c6d74 !important;">
        <div class="row mt-5">
            <div class="col-3">

            </div>
            <div class="col-6 text-center">
                <p>© experimenta gGmbH – Das Science Center. Alle Rechte vorbehalten.</p>
                <p>Experimenta-Platz, 74072 Heilbronn, Tel.: +49 (0) 7131 88795 - 0, <br />info@experimenta.science</p>
            </div>
        </div>

    </div>



    <div class="container p-5">

        <div class="row">
            <div class="col">
                <hr style="border-top-color: #6c6d74;" />
            </div>
        </div>

        <div class="row">
            <div class="col">

                <h6 class="text-uppercase" style="color: #404040;">Bildnachweise</h6>

            </div>
        </div>


        <?php $images_used = get_used_images(); ?>
        <?php if ($images_used) : ?>
            <?php foreach ($images_used as $image) : ?>
                <div class="row">
                    <div class="col">

                        <span>"<?php echo $image['name'] ?>"</span> by
                        <span><?php echo $image['creator'] ?><span>
                                (<span><?php echo $image['license'] ?><span>)

                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>

</div>

<?php wp_footer(); ?>

</body>

</html>