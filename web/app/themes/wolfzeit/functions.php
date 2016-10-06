<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/wp-bootstrap-navwalker.php', // Bootstrap Navwalker
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

// Show posts of 'post', 'page' and 'movie' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
  // if ( is_home() && $query->is_main_query() )
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'shooting') );
  return $query;
}


// Kategorien für Shootings aktivieren
function add_custom_types_to_tax( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

    // Get all your post types
    $post_types = get_post_types();

    $query->set( 'post_type', $post_types );
    return $query;
  }
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );



function SearchFilter($query) {
  if ($query->is_search) {
    $query->set('post_type', array( 'post', 'shooting') );
  }
  return $query;
}
add_filter('pre_get_posts','SearchFilter');


// Auszug auch für Seiten aktivieren
add_post_type_support('page', 'excerpt');

remove_action( 'wp_head', 'wp_no_robots' );

// Language Switcher ohne CSS
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
