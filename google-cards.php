<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "<?php echo get_permalink(); ?>"
            },
            "headline": "<?php the_title() ?>",

<?php if ( has_post_thumbnail() ): ?>
            "image": [
                "<?php echo get_the_post_thumbnail_url(); ?>"
            ],
<?php endif; ?>
            "datePublished": "<?php echo get_the_date() ?>",
            "dateModified": "<?php echo get_the_date() // 2015-02-05T09:20:00+08:00 ?>",
            "author": {
                "@type": "Person",
                "name": "<?php echo get_the_author() ?>"
            },
            "publisher": {
                "@type": "Organization",
                "name": "Experimenta gGmbH",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://google.com/logo.jpg"
                }
            },
            "description": "<?php if(has_excerpt()){  the_excerpt(); } else { the_content(); } ?>"
        }
    </script>

<?php endwhile; endif; ?>
