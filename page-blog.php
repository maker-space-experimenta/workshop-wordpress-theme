
<?php get_header(); ?>

<div class="pt-5 pb-5">
    <div class="container">
        <div class="row pb-3">
            <div class="col d-flex justify-content-between">
                <h2>Neuigkeiten aus dem Maker Space</h2>

                <a href="/feed" title="Veranstaltungen als RSS" class="mr-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/rss_24px.svg">
                </a>
            </div>
        </div>
        <div class="row">

            <?php

            $posts = get_posts(array(
                'post_type'         => 'post',
                'posts_per_page'    =>  -1
            ));
            ?>


            <?php foreach ($posts as $post) : ?>


                <div class="col-12 col-md-6 col-xl-4 mb-5 d-flex flex-column" onclick="window.location.href = '<?php echo get_permalink(); ?>'" style="cursor: pointer;">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="" style="height: 250px; background-color: rgb(0,0,0,0.3); background-image: url(<?php the_post_thumbnail_url('medium'); ?>); background-size: cover; background-position: center;"></div>
                    <?php else : ?>
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
            <?php endforeach; ?>

        </div>
    </div>
</div>




<?php get_footer(); ?>
