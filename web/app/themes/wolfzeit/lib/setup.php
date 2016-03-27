<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');
  // add_theme_support('soil-google-analytics', 'UA-38973782-4');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage'),
    'primary_navigation_right' => __('Primary Navigation Right', 'sage'),
    'secondary_navigation' => __('Secondary Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size( 300, 300, false );

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

// Sidebar generell ausgeschaltet!
// original: isset($display) || $display = !in_array(true, [
  isset($display) || $display = in_array(true, [

    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);


/**
 * Custom Post Types
 */

add_filter('init', function() {
    $labels = [
      'name'                => _x( 'Shootings', 'Post Type General Name', 'text_domain' ),
      'singular_name'       => _x( 'Shooting', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'           => __( 'Shootings', 'text_domain' ),
      'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
      'all_items'           => __( 'Alle Shootings', 'text_domain' ),
      'view_item'           => __( 'Shooting ansehen', 'text_domain' ),
      'add_new_item'        => __( 'Neues Shooting anlegen', 'text_domain' ),
      'add_new'             => __( 'Shooting hinzufügen', 'text_domain' ),
      'edit_item'           => __( 'Shooting editieren', 'text_domain' ),
      'update_item'         => __( 'Shooting updaten', 'text_domain' ),
      'search_items'        => __( 'Shooting suchen', 'text_domain' ),
      'not_found'           => __( 'Shooting nicht gefunden', 'text_domain' ),
      'not_found_in_trash'  => __( 'Shooting nicht im Papierkorb gefunden', 'text_domain' )
      ];
      $args = [
        'label'               => __( 'shooting', 'text_domain' ),
        'description'         => __( 'Shooting oder Bilderstrecke.', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ],
        'taxonomies'          => [ 'category', 'post_tag' ],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 6,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post'
      ];
      register_post_type( 'shooting', $args );
  return true;
});

