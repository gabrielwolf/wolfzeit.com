<?php while (have_posts()) : the_post(); ?>
<div class="container-fluid">
    <article <?php post_class(); ?>>
        <div class="row">
            <div class="col-sm-3 post-webdesign-info">
              <div class="full-height" style="display: table;">
                <div style="display: table-row; text-align: center;">
                  <div style="display: table-cell; vertical-align: middle; padding-bottom: 5ex;">
                    <header class="post-header-webdesign">
                        <h2 class="entry-title"><a href="javascript:history.back()"><<</a> <?php the_title(); ?></h2>
                        <ul>
                          <li>
                            <dl>
                              <dt>Projekt</dt>
                              <dd><?php the_field('projekt'); ?></dd>
                            </dl>
                          </li>
                          <?php $url = get_field('url');
                          if ($url != false || $url != NULL) {
                            echo '<li><dl><dt>URL:</dt><dd><a href="' . $url . '" target="_blank" class="weisserlink">' . substr($url,7) . '</a></dd></dl></li>';
                          }
                          ?>
                          <li>
                            <dl>
                              <dt><?= __('My work', 'sage'); ?>
                              </dt>
                              <dd><?php the_field('leistungen_von_wolfzeit'); ?></dd>
                            </dl>
                          </li>
                          <li>
                            <dl>
                              <dt><?= __('Extent', 'sage'); ?></dt>
                              <dd><?php the_field('umfang'); ?></dd>
                            </dl>
                          </li>
                          <li>
                            <dl>
                              <dt><?= __('Technics', 'sage'); ?></dt>
                              <dd><?php the_field('technik'); ?></dd>
                            </dl>
                          </li>
                          <li>
                            <dl>
                              <dt><?= __('Year', 'sage'); ?></dt>
                              <dd><?php the_field('jahr'); ?></dd>
                            </dl>
                          </li>
                        </ul>
                      </header>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="entry-content full-height">
                  <div class="full-height" style="display: table; width: 100%;">
                    <div style="display: table-row; text-align: center;">
                      <div style="display: table-cell; vertical-align: middle;">
                        <?php the_content(); ?>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </article>
</div>
<?php endwhile; ?>
