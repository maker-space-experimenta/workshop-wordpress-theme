<?php get_header(); ?>


<?php if (has_post_thumbnail()) : ?>
    <div class="" style="height: 450px; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"></div>
<?php endif; ?>

<div class="container mt-5 pb-5" style="min-height: 100vh">
    <div class="row">
        <div class="col wp-post">
            <?php while (have_posts()) : the_post(); ?>

                <h1><?php the_title() ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>

            <?php endwhile; ?>

        </div>
    </div>
</div>



<?php get_footer(); ?>