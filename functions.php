<?php

add_theme_support( 'custom-logo' );


add_action( 'wp_enqueue_scripts', 'gc_emp_theme_styles' );
add_action( 'wp_enqueue_scripts', 'gc_emp_theme_scripts' );

function gc_emp_theme_styles() {
  wp_enqueue_style( 'boostrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
  wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Oxygen' );
  wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fa/css/font-awesome.min.css');
  wp_enqueue_style( 'main_styles', get_template_directory_uri() . '/style.css' );
}

function gc_emp_theme_scripts() {
  wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', '', '', false );
  wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery', 'popper' ), '', true );
  wp_enqueue_script( 'gc_js', get_template_directory_uri() . '/assets/js/gc.js', array( 'jquery' ), '', true );
}

function gc_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'gc_excerpt_length', 999 );


if (function_exists( 'acf_add_options_page' )) {

  acf_add_options_page( array(
    'page_title' => 'Employees',
    'menu_title' => 'Employees',
    'menu_slug' => 'employees',
    'compatibility' => 'edit_posts',
    'redirect' => 'false'
  ));

  acf_add_options_sub_page( array(
    'page_title' => 'Schedule',
    'menu_title' => 'Schedule',
    'parent_slug' => 'employees'
  ));
}

// add_filter('acf/settings/path', 'my_acf_settings_path');
//
// function my_acf_settings_path( $path ) {
//     $path = get_stylesheet_directory() . '/inc/acf/';
//     return $path;
// }
//
// add_filter('acf/settings/dir', 'my_acf_settings_dir');
//
// function my_acf_settings_dir( $dir ) {
//     $dir = get_stylesheet_directory_uri() . '/inc/acf/';
//     return $dir;
// }

//add_filter('acf/settings/show_admin', '__return_false');
// include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );
// include_once( get_stylesheet_directory() . '/inc/fields.php' );


require get_parent_theme_file_path( '/inc/employees.php' );



 ?>
