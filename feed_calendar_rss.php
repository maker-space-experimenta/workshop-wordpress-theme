<?php
$posts = get_posts(array(
    'post_type'         => 'workshop',
    'posts_per_page'    =>  -1
));

$last_pub = (new DateTime('now'))->format('Y-m-d H:i:s');

foreach ( $posts as $post) {
    $pmd = get_the_modified_date('Y-m-d H:i:s', $post);
    if ($pmd < $last_pub) {
        $last_pub = $pmd;
    }
}



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

header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=calender-makerspace.xml");
header('Content-type: application/rss+xml; charset=utf-8');
header("Pragma: 0");
header("Expires: 0");

// print_r($posts);

const DT_FORMAT = 'Ymd\THis';




echo '<? xml version ="1.0" encoding="UTF-8" ?>';
echo '<rss version="2.0">';
echo '    <channel>';
echo '        <title>Maker Space Veranstaltungen</title>';
echo '        <description>Alle Veranstaltungen des Maker Space der Experimenta Heilbronn</description>';
echo '        <link>https://makerspace.experimenta.science</link>';
echo '        <lastBuildDate>'. $last_pub .'</lastBuildDate>';
echo '        <pubDate>Sun, 06 Sep 2009 16:20:00 +0000</pubDate>';
echo '        <ttl>1800</ttl>';

        foreach ($posts as $post) :

echo '            <item>';
echo '                <title><?php echo htmlspecialchars_decode(get_the_title($post->ID)) ?></title>';
echo '                <description>';
echo '                    Start:'. get_post_meta($post->ID, 'workshop_start', true)->format('Y-m-d H:i:s');
echo '                    Ende:'. get_post_meta($post->ID, 'workshop_end', true)->format('Y-m-d H:i:s');

echo htmlspecialchars_decode(get_the_excerpt($post->ID));
echo '                </description>';
echo '                <link>'. get_permalink($post->ID) .'</link>';
echo '                <guid isPermaLink="true">'. get_permalink($post->ID) .'</guid>';
echo '                <pubDate>'. get_post_meta($post->ID, 'workshop_start', true)->format('D, d M Y H:i:s') .'</pubDate>';
echo '            </item>';

        endforeach;

echo '    </channel>';
echo '</rss>';