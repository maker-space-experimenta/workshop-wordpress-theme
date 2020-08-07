
<?php while (have_posts()) : the_post(); ?>


    <div class="container mt-5 pb-5">
        <div class="row">
            <div class="col wp-post">

                <h1><?php the_title() ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>


            </div>
        </div>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>