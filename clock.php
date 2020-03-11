<?php
/*
Plugin Name: Clock
Description: Simple Vue.js Clock.
Version: 0.1
Author: Lester Moore Lambac
Author URI: https://lesterlambac.com
*/

if (!class_exists('Clock')) {
    class Clock
    {
        private $shortcode_name = 'clock';

        public function register()
        {
            add_shortcode($this->shortcode_name, [$this, 'shortcode']);
            add_action('wp_enqueue_scripts', [$this, 'scripts'], 200);
        }

        public function shortcode($atts)
        {
            return '<div id="app"></div>';
        }

        public function scripts()
        {
            global $post;
            if (has_shortcode($post->post_content, $this->shortcode_name)) {

                if ($this->is_develop_serve()) {

                    wp_enqueue_script('clock', 'http://localhost:8080/js/app.js', array(), '', '');
                    wp_enqueue_script('clock'.'_chunks', 'http://localhost:8080/js/chunk-vendors.js', [], '', '');
                    wp_enqueue_style('clock', 'http://localhost:8080/css/app.css', [], '', '');

                } else {

                    wp_enqueue_script('clock_prod', plugin_dir_url(__FILE__).'dist/js/app.js', array(), '', '');
                    wp_enqueue_script('clock'.'_chunks', plugin_dir_url(__FILE__).'dist/js/chunk-vendors.js', [], '', '');
                    wp_enqueue_style('clock', plugin_dir_url(__FILE__).'dist/css/app.css', [], '', '');

                }
            }
        }

        private function is_develop_serve()
        {
            $connection = @fsockopen('localhost', '8080');
            if ($connection) {
                return true;
            }
            return false;
        }
    }
    (new Clock())->register();
}