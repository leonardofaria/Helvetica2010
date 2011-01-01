<?php get_header(); ?>   	
   	<div id="content">

		<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

		<? $post_counter = 1;  ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post clearfix">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Link para <?php the_title(); ?>"><?php the_title(); ?></a><?php edit_post_link(' <small>(editar)</small>'); ?></h1>
				
				<div class="meta">
					<?php the_time('j \d\e F \d\e Y') ?> ~ 
					<?php comments_popup_link(__('Comente!'), __('1 comentário'), __('% comentários')); ?> ~ 
					<?php the_tags(); ?>
				</div>
				<div class="triangle"></div>
				<div class="text">	
					<?php the_content('Continue lendo &#8594;'); ?><br/>
				</div>
			</div>

		<?php endwhile; ?>	

	</div>
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	
	<?php endif; ?>

<?php get_footer(); ?>