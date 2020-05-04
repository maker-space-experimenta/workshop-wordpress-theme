<?php

$posts = get_posts(array(
    'post_type'         => 'workshop',
    'posts_per_page'    =>  -1,
    'order'              => 'ASC',
    'orderby'   => 'order_clause'
));


usort($posts, function ($a, $b) {

    $start_date_a = get_post_meta($a->ID, 'workshop_start', true);
    $start_date_b = get_post_meta($b->ID, 'workshop_start', true);

    if ($start_date_a->format('Y-m-d') > $start_date_b->format('Y-m-d')) {
        return 1;
    }

    if ($start_date_a->format('Y-m-d') < $start_date_b->format('Y-m-d')) {
        return -1;
    }

    return 0;
});

?>


<?php foreach( $posts as $post ): ?>

    <?php $start_date = get_post_meta($post->ID, 'workshop_start', true) ?>
    <?php $end_date = get_post_meta($post->ID, 'workshop_end', true) ?>

    <h1 class="mb-1"><?php echo $post->post_title ?></h1>

    <img src="<?php echo get_the_post_thumbnail_url($post); ?>" style="max-width: 100vh;">

    <h2>start: <?php echo $start_date->format('Y-m-d') ?></h2>
    <h2>end: <?php echo $end_date->format('Y-m-d') ?></h2>

    <div>
        <?php echo get_the_content(null, null, $post); ?>
    </div>

<?php endforeach; ?>