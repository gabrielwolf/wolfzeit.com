<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
  <div class="page-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
  </div>
    <?php the_content(); ?>
<?php endwhile; ?>