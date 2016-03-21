<?php

namespace Roots\Sage;

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>
<!--[if lt IE 9]>
  <div class="alert alert-warning text-center">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
    <br>
    Ein Update geht schnell, und dann funktioniert nicht nur diese Website.
  </div>
<![endif]-->
<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <div id="element" class="introLoading"></div>
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap container-fluid content-container nopadding" role="document">
      <div class="content row nopadding">
        <main class="main scroll-pane" role="main">
          <div class="div-table gradient-horizontal" style="width: 100%;">
            <div class="div-table-cell text-center vertical-middle">
                <?php include Wrapper\template_path(); ?>
            </div>
          </div>
        </main><!-- /.main -->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
