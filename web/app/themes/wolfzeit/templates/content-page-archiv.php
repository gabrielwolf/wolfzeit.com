<?php
$my_query = new WP_Query( array(
	'post_type' => array( 'shooting' ),
	'posts_per_page' => -1
) );

?>

<?php
while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
	<article>
		<div>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
		<div>
				<?php get_template_part('templates/entry-meta'); ?>
		</div>
	</article>
<?php endwhile; ?>

<?php get_template_part('templates/page', 'header'); ?>