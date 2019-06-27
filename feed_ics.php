<?php
$posts = get_posts( array(
    'post_type'         => 'workshop',
    'posts_per_page'    =>  -1
));

usort($posts, function($a, $b) {

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
header("Content-Disposition: attachment; filename=calender-makerspace.ics");
header('Content-type: text/calendar; charset=utf-8');
header("Pragma: 0");
header("Expires: 0");

// print_r($posts);

const DT_FORMAT = 'Ymd\THis';

?>



BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//bobbin v0.1//NONSGML iCal Writer//EN
CALSCALE:GREGORIAN
METHOD:PUBLISH

<?php 
// var_dump( $posts); 
?>

<?php foreach ( $posts as $post) : ?>

BEGIN:VEVENT
DTSTART:<?php echo get_post_meta($post->ID, 'workshop_start', true)->format(DT_FORMAT);  ?>

DTEND:<?php echo get_post_meta($post->ID, 'workshop_end', true)->format(DT_FORMAT);  ?>

UID:<?php echo get_the_date('YmdHis', $post->ID)  ?>@makerspace.experimenta.science
CREATED:<?php echo get_the_date(DT_FORMAT, $post->ID)  ?>

DESCRIPTION:<?php echo htmlspecialchars_decode ( get_the_excerpt($post->ID) ) ?>

SUMMARY:<?php echo htmlspecialchars_decode ( get_the_title($post->ID) ) ?>

LAST-MODIFIED:<?php echo get_the_date(DT_FORMAT, $post->ID)  ?>

SEQUENCE:0
STATUS:CONFIRMED

TRANSP:OPAQUE
LOCATION: Maker Space Experimenta
END:VEVENT

<?php endforeach; ?>

END:VCALENDAR
