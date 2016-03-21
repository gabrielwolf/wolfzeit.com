<?php get_template_part('templates/page', 'header'); ?>

<div class="table-infinite black-background">
	<div>
		<?php while (have_posts()) : the_post(); ?>
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
				</div>
				<div>
						<?php get_template_part('templates/entry-meta'); ?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</div>