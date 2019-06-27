<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );


 function themename_custom_header_setup() {
    $args = array(
        'default-image'      => get_template_directory_uri() . '/assets/images/default-header-image.jpg',
        'default-text-color' => '000',
        'width'              => 1000,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );
    
    add_theme_support( 'post-thumbnails', array ( 'post','work','devices', 'workshop' ));
}
add_action( 'after_setup_theme', 'themename_custom_header_setup' );


function render_feed_ics () {
  require( 'feed_ics.php' );
}

function render_feed_calendar_rss () {
  require( 'feed_calendar_rss.php');
}

function add_feeds(){
  add_feed('calendar', 'render_feed_ics');
  add_feed('calendar_rss', 'render_feed_calendar_rss');
  
  // add_feed('blog', 'feed_blog');

  flush_rewrite_rules();
}
add_action('init', 'add_feeds');


require_once(get_template_directory() . '/image-management.php');

function use_image($name, $creator, $license) {
  $manager = ImageManager::instance();
  $manager->add_image(array(
    "name"    => $name,
    "creator" => $creator,
    "license" => $license
  ));
}

function get_used_images() {
  $manager = ImageManager::instance();
  return $manager->get_images();
}

function get_timetable_devices($device_id, $date) {
    $timetable = array();

    for ($i = 0; $i < 14; $i++) {
        array_push($timetable, array(
            "hour" => $timetable->length,
            "closed" => 1,
            "booked" => 0
        ));
    }


    for ($i = 0; $i < 4; $i++) {
        array_push($timetable, array(
            "hour" => $timetable->length,
            "closed" => 0,
            "booked" => 0
        ));
    }
    for ($i = 0; $i < 4; $i++) {
        array_push($timetable, array(
            "hour" => $timetable->length,
            "closed" => 0,
            "booked" => 1
        ));
    }


    for ($i = 0; $i < 2; $i++) {
        array_push($timetable, array(
            "hour" => $timetable->length,
            "closed" => 1,
            "booked" => 0
        ));
    }

    return $timetable;
}

function make_href_root_relative($input) { 
  return preg_replace('!http(s)?://' . $_SERVER['SERVER_NAME'] . '/!', '/', $input); 
}
function root_relative_permalinks($input) {
  return make_href_root_relative($input);
}

add_filter( 'day_link', 'root_relative_permalinks');
add_filter( 'year_link', 'root_relative_permalinks');
add_filter( 'post_link', 'root_relative_permalinks');
add_filter( 'page_link', 'root_relative_permalinks');
add_filter( 'term_link', 'root_relative_permalinks');
add_filter( 'month_link', 'root_relative_permalinks');
add_filter( 'search_link', 'root_relative_permalinks');
add_filter( 'the_content', 'root_relative_permalinks');
add_filter( 'the_permalink', 'root_relative_permalinks');
add_filter( 'get_shortlink', 'root_relative_permalinks');
add_filter( 'post_type_link', 'root_relative_permalinks');
add_filter( 'attachment_link', 'root_relative_permalinks');
add_filter( 'get_pagenum_link', 'root_relative_permalinks');
add_filter( 'wp_get_attachment_url', 'root_relative_permalinks');
add_filter( 'post_type_archive_link', 'root_relative_permalinks');
add_filter( 'get_comments_pagenum_link', 'root_relative_permalinks');
add_filter( 'get_template_directory_uri', 'root_relative_permalinks');


show_admin_bar(false);
