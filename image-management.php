<?php

class ImageManager {

    protected static $instance;

    private $images = array();

    public static function instance() {
        if ( ! self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }


    function __construct() {


    }

    public function add_image($image) {
        array_push($this->images, $image);
    }

    public function get_images() {
        return $this->images;
    }

}