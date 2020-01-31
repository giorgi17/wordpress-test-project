<?php
/**
 * @package TestPlugin123
 */
/*
 Plugin Name: Test Plugin123
 Plugin URI: http://test-plugin123.com/
 Description: This is a description.
 Version: 1.0.0
 Author: Giorgi Khachidze
 Author URI: http://giorgikhachidze.com/
 License: GPLv2 or later
 Text Domain: test-plugin123
 */

require 'brand-taxonomy.php';

 if (!defined('ABSPATH')) {
     die;
 }

class TestPlugin123
{
  private $car_labels;

  function __construct() {
    add_action('init', array($this, 'custom_post_type'));
    $this->car_labels = array(
     'name' => __( 'Cars', 'test-plugin123' ),
     'singular_name' => __( 'Car', 'test-plugin123' ),
     'add_new' => __( 'New Car', 'test-plugin123' ),
     'add_new_item' => __( 'Add New Car', 'test-plugin123' ),
     'edit_item' => __( 'Edit Car', 'test-plugin123' ),
     'new_item' => __( 'New Car', 'test-plugin123' ),
     'view_item' => __( 'View Cars', 'test-plugin123' ),
     'search_items' => __( 'Search Cars', 'test-plugin123' ),
     'not_found' =>  __( 'No Cars Found', 'test-plugin123'),
     'not_found_in_trash' => __( 'No Cars found in Trash', 'test-plugin123' ),
    );
  }

  function activate() {
    $this->custom_post_type();
    flush_rewrite_rules();
  }

  function deactivate() {
    flush_rewrite_rules();
  }


  function custom_post_type() {
    register_post_type('car', ['labels' => $this->car_labels, 'has_archive' => true, 'public' => true, 'label' => 'car']);
  }

}

if (class_exists('TestPlugin123')) {
  $testPlugin = new TestPlugin123();
}

register_activation_hook(__FILE__, array($testPlugin, 'activate'));
register_deactivation_hook(__FILE__, array($testPlugin, 'deactivate'));
