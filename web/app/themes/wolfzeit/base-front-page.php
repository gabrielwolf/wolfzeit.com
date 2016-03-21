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
    <div class="wrap container-fluid content-container nopadding" style="overflow: hidden;" role="document">
      <div class="content row nopadding">
        <main class="main nopadding" role="main">
          <div style="display: table;">
            <div style="display: table-row; text-align: center;">
              <div style="display: table-cell; vertical-align: middle;">
                <div class="text-center">
                  <?php include Wrapper\template_path(); ?>
                </div>
              </div>
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
