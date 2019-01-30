<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div style="min-height: 100vh">
    <div class="container mt-5">
        <div class="row">
            <div class="col">

                <h1>
                    <?php the_title() ?>
                </h1>
                <p>
                    <?php the_content(); ?>
                </p>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Beispielprojekte</h3>
            </div>
        </div>

        <div class="row">
            <div class="col">Tags:
                <?php 
                    
                ?>
            </div>
        </div>
        <div class="row">

            <?php
                $posttags = get_the_tags();
                $posts_str = '';
                
                foreach($posttags as $tag) {
                    $posts_str = $tag->name . ','; 
                }

                $posts_str = rtrim($posts_str, ',');
                $posts_by_tags = posts_by_tag($posts_str, array( 'number' => 4 ));

                foreach($posts_by_tags as $pbt):
            ?>

            <div class="col-3 mb-5 d-flex flex-column" onclick="window.location.href = '<?php echo get_permalink($pbt); ?>'"
                style="cursor: pointer;">
                <?php if ( has_post_thumbnail($pbt) ): ?>
                <div class="" style="height: 150px; background-image: url(<?php echo get_the_post_thumbnail_url($pbt); ?>); background-size: cover; background-position: center;"></div>
                <?php else: ?>
                <div class="" style="height: 150px; background-image: url(<?php echo get_template_directory_uri($pbt); ?>/assets/images/image-missing.png); background-size: cover; background-position: center;"></div>
                <?php endif; ?>

                <div class="bg-white flex-fill p-2">
                    <h5 class="">
                        <?php the_title($pbt) ?>
                    </h5>
                </div>
                <div class="bg-white p-0 pl-3 pr-3 text-truncate text-wrap text-justify" style="max-height: 150px;">
                    <?php
                                    if(has_excerpt($pbt)):
                                        the_excerpt($pbt);
                                    else:
                                        the_content($pbt);
                                    endif;
                                ?>
                </div>
                <div class="bg-white p-3 pt-auto" style="font-size: 0.72rem;">
                    <div class="text-secondary">von
                        <?php echo get_the_author($pbt) ?>
                    </div>
                    <div class="text-secondary">veröffentlicht am
                        <?php echo get_the_date($pbt) ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Dokumente</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-3">Betriebsanweisung</div>
            <div class="col">
                <a href="<?php echo get_post_meta($post->ID, 'betriebsanweisung_url')[0] ?>">
                    <?php echo get_post_meta($post->ID, 'betriebsanweisung_url')[0] ?>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-3">Herstellerwebsite</div>
            <div class="col">
                <a href="<?php echo get_post_meta($post->ID, 'hersteller_url')[0] ?>">
                    <?php echo get_post_meta($post->ID, 'hersteller_url')[0] ?>
                </a>
            </div>
        </div>
    </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>