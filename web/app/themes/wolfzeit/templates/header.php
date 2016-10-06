<?php use Roots\Sage\Nav; ?>

<header class="banner navbar navbar-inverse navbar-fixed-bottom primary_navigation" role="banner">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img alt="W O L F Z E I T Logo" onerror="this.onerror=null; this.src='<?php echo content_url(); ?>/uploads/logo.svg'" style="max-width:100px; margin: -4px -10px auto auto;" src="<?php echo get_home_url(); ?>/app/uploads/logo.svg"></a><!-- <a class="navbar-brand" href="<?php echo get_home_url(); ?>">W O L F Z E I T ⇢ Dein Fotograf, Designer & Tonmeister in Berlin und München</a> -->
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
      <?php
        if (has_nav_menu('primary_navigation_right')) :
          wp_nav_menu(['theme_location' => 'primary_navigation_right', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav navbar-right']);
        endif;
      ?>
    </nav>
  </div>
</header>

<div class="secondary_navigation">
  <div class="breadcrumbs pull-left" xmlns:v="http://rdf.data-vocabulary.org/#">
      <?php if(function_exists('bcn_display'))
      {
          bcn_display();
      }?>
  </div>
  <div class="pull-right">
    <form role="search" method="get" class="search-form form-inline" action="<?= esc_url(home_url('/')); ?>">
         <div class="input-group search-top hidden-xs">
           <input type="search" value="" name="s" class="transition-0-2-ease form-control search-top-field">
           <span class="input-group-btn">
             <button class="btn btn-default search-top-button" type="submit"><span class="glyphicon glyphicon-search" style="color: #fff;"></span></button>
           </span>
         </div><!-- /input-group -->
       </div>
    </form>
  </div>
</div>