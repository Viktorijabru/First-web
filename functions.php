<?php
define('ASSETS_URL' , get_template_directory_uri() . '/assets/' );

add_action( 'wp_enqueue_scripts', 'vcs_theme_styles' );
function vcs_theme_styles() {
  if( !is_admin() ){

    wp_register_style('reset_css', ASSETS_URL . 'reset.css', array(), false, 'all');
    wp_register_style('bootstrap_css', ASSETS_URL . 'bootstrap/css/bootstrap.min.css', array(), false, 'all');
    wp_register_style('main_site_styles', ASSETS_URL . 'css/style.css', array(), false, 'all');
    wp_register_style('font_awesome', ASSETS_URL . 'fonts/stylesheet.css', array(), false, 'all');
    wp_register_style('icon_style', ASSETS_URL . 'icons/style.css', array(), false, 'all');

    wp_enqueue_style('icon_style');
    wp_enqueue_style('font_awesome');
    wp_enqueue_style('reset_css');
    wp_enqueue_style('bootstrap_css');
    wp_enqueue_style('main_site_styles');



    wp_register_script( 'main_js', ASSETS_URL . 'JS/app.js', array( 'jquery'), false, true );
    wp_register_script( 'bootstrap_js', ASSETS_URL . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), false, true );

    wp_enqueue_script( 'main_js' );
    wp_enqueue_script( 'bootstrap_js' );
  }

}

// adding menus

add_action( 'init', 'vcs_adding_theme_supports' );
function vcs_adding_theme_supports() {
  add_theme_support( 'menus' );

add_theme_support( 'post-thumbnails' );
//hide admin bar
show_admin_bar( false );
}
// define nav

function vcs_registering_menus() {

  register_nav_menus( array(
    'top-menu'              => __('Meniu'),
  ) );

}

add_action('init', 'vcs_image_sizes');
function vcs_image_sizes() {

  add_image_size( 'logo', 98 , 24, true );
  add_image_size( 'design_image', 1000, 300, true );
  add_image_size( 'web_image', 1000, 400, false );
  add_image_size( 'adress_image', 1600, 200, true );
  add_image_size( 'portfolio', 339, 211, true );



}
