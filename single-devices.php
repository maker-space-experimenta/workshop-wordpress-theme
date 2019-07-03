<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <?php if (has_post_thumbnail()) : ?>
        <div class="" style="height: 450px; background-image: url(<?php the_post_thumbnail_url('large'); ?>); background-size: cover; background-position: center;"></div>
    <?php endif; ?>


    <div style="min-height: 100vh">

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h1><?php the_title() ?></h1>

                    <?php the_content(); ?>
                </div>

                <div class="col-12 col-xl-4 col-md-6">
                    <div class="card p-3">
                        <h4 class="mb-3"> Technische Daten </h4>

                        <?php $cfields = get_post_custom() ?>

                        <table>
                            <tbody>
                                <?php foreach ($cfields as $key => $value) :

                                    preg_match('/table_(.*)/', $key, $matches);

                                    if (count($matches) > 0) :

                                        $key = str_replace("table_", "", $key);
                                        $key = str_replace("_", " ", $key);
                                        ?>

                                        <tr>
                                            <td class="pr-5 pb-3"><?php echo $key ?></td>
                                            <?php if (is_array($value)) : ?><td class="pb-3"><?php echo join(', ', $value) ?></td>
                                            <?php else : ?><td class="pb-3"><?php echo $value ?></td><?php endif; ?>
                                        </tr>

                                    <?php endif;
                                endforeach; ?>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Dokumente</h3>
                </div>
            </div>

            <!-- Betriebsanweisung -->
            <?php
            $betriebsanweisung_id = get_post_meta($post->ID, 'betriebsanweisung_attachment_id', true);
            if (!empty($betriebsanweisung_id)) :
                ?>
                <div class="row">
                    <div class="col-3">Betriebsanweisung</div>
                    <div class="col">
                        <a target="_blank" href="<?php echo wp_get_attachment_url($betriebsanweisung_id) ?>"><?php echo get_the_title($betriebsanweisung_id) ?></a>
                    </div>
                </div>
            <? endif; ?>

            <!-- Datenblatt -->
            <?php
            $datenblatt_id = get_post_meta($post->ID, 'datenblatt_attachment_id', true);
            if (!empty($datenblatt_id)) :
                ?>
                <div class="row">
                    <div class="col-3">Datenblatt</div>
                    <div class="col">
                        <a target="_blank" href="<?php echo wp_get_attachment_url($datenblatt_id) ?>"><?php echo get_the_title($datenblatt_id) ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Bedienungsanleitung -->
            <?php
            $bedienungsanleitung_id = get_post_meta($post->ID, 'bedienungsanleitung_attachment_id', true);
            if (!empty($bedienungsanleitung_id)) :
                ?>
                <div class="row">
                    <div class="col-3">Bedienungsanleitung</div>
                    <div class="col">
                        <a target="_blank" href="<?php echo wp_get_attachment_url($bedienungsanleitung_id) ?>"><?php echo get_the_title($bedienungsanleitung_id) ?></a>
                    </div>
                </div>
            <?php endif; ?>

        </div>


        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h3>Projekte mit diesem Gerät</h3>
                </div>
            </div>
            <div class="row">

                <?php
                $tags = get_the_tags($post->ID);

                $tags_string = "";

                foreach ($tags as $tag) :
                    $tags_string .= $tag->slug . ",";
                endforeach;

                $args = array( 'tag' => $tags_string );
                $wp_query_posts = new WP_Query($args);
                
                ?>

                <?php while ($wp_query_posts->have_posts()) : $wp_query_posts->the_post(); ?>

                    <div class="col-4 mb-5 d-flex flex-column" onclick="window.location.href = '<?php echo get_permalink(); ?>'" style="cursor: pointer;">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="" style="height: 250px; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"></div>
                        <?php else : ?>
                            <div class="" style="height: 250px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/image-missing.png); background-size: cover; background-position: center;"></div>
                        <?php endif; ?>

                        <div class="bg-white flex-fill p-2">
                            <h5 class="">
                                <?php the_title() ?>
                            </h5>
                        </div>
                        <div class="bg-white p-3 text-truncate text-wrap text-justify" style="max-height: 250px;">
                            <p>
                                <?php
                                if (has_excerpt()) :
                                    the_excerpt();
                                else :
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

                <?php endwhile; ?>
            </div>
        </div>
    </div>


<?php endwhile; ?>

<?php get_footer(); ?>