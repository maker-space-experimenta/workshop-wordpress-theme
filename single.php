
<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

<?php if ( has_post_thumbnail() ): ?>
<div class="" style="height: 450px; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"></div>
<?php endif; ?>    

<div class="container mt-5 pb-5">
    <div class="row">
        <div class="col text-dark">
            verfasst, am 
            <?php the_date() ?>
            von
            <?php the_author_meta('display_name') ?>
        </div>
    </div>

    <div class="row">   
        <div class="col wp-post">

                <h1><?php the_title() ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>
                
                
        </div>
    </div>

    <div class="row mt-5 border border-bottom-0 bg-white">
        <div class="col-1 p-3 ms-author-avatar">
            <?php echo get_avatar(get_the_author_meta('ID'), 512)  ?>
        </div>
        <div class="col p-3 text-dark">
            <h5 class="text-uppercase" style="font-size: 16px;">Über den Autor</h5>
            <h4 class=""><?php the_author_meta('display_name') ?></h4>
        </div>
    </div>
    <div class="row  border border-top-0 bg-white">
        <div class="col-1 p-0 ms-author-avatar"></div>
        <div class="col p-3 text-dark">
            <p><?php the_author_meta('description') ?></p>
        </div>
    </div>
</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://google.com/article"
  },
  "headline": "<?php the_title() ?>",
  <?php if ( has_post_thumbnail() ): ?>
  "image": [
    "<?php echo get_the_post_thumbnail_url(); ?>"
   ],

   <?php endif; ?>
  "datePublished": "<?php echo get_the_date("Y-m-dTH:i:00+02:00", $post); ?>",
  "dateModified": "<?php echo get_the_date("Y-m-dTH:i:00+02:00", $post); ?>",
  "author": {
    "@type": "Person",
    "name": "<?php the_author_meta('display_name') ?>"
  },
   "publisher": {
    "@type": "Organization",
    "name": "Maker Space Experimenta",
    "logo": {
      "@type": "ImageObject",
      "url": "https://makerspace.experimenta.science/wp-content/themes/makerspace-wordpress-theme/assets/images/favicon.png"
    }
  },
  "description": "<?php echo get_the_excerpt() ?>"
}
</script>

<?php endwhile; ?>

<?php get_footer(); ?>
