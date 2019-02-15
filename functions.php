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
    
    add_theme_support( 'post-thumbnails', array ( 'post','work','devices' ));
}
add_action( 'after_setup_theme', 'themename_custom_header_setup' );



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



 ?>