<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>

<?php
$my_query = new WP_Query( array(
	'post_type' => array( 'shooting', 'webdesign' ),
	'posts_per_page' => -1
) );

?>
<div class="table-infinite">
	<div>
		<?php
		while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
		<div>
			<div>
				<div>
					<a href="<?php the_permalink(); ?>">
						<?php
						echo the_post_thumbnail( 'post-thumbnail' );
						?>
					</a>
				</div>
				<div>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<h4 class="untertitel"><?php echo the_field('untertitel'); ?></h4>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</div>