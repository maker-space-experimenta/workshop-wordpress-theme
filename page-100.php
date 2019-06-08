<!-- template: code of conduct -->

<?php get_header(); ?>

<div class="" style="height: 450px; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/header-06.jpg); background-size: cover; background-position: center;"></div>

<div class="container mt-5 pb-5" style="min-height: 100vh">
    <div class="row">
        <div class="col">
            <?php while ( have_posts() ) : the_post(); ?>

                <h1><?php the_title() ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>

            <?php endwhile; ?>

        </div>
    </div>
</div>



<?php get_footer(); ?>
