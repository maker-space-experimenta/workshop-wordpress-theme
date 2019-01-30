
<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

<?php if ( has_post_thumbnail() ): ?>
<div class="" style="height: 450px; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"></div>
<?php endif; ?>    

<div class="container mt-5 pb-5">
    <div class="row">   
        <div class="col">

                <h1><?php the_title() ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>
                
                
        </div>
    </div>
</div>
<?php endwhile; ?>



<?php get_footer(); ?>
