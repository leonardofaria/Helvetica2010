<?php get_header(); ?>

<div id="content"> 				
		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="post">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Link para <?php the_title(); ?>"><?php the_title(); ?></a><?php edit_post_link(' <small>(editar)</small>'); ?></h1>
				
				<div class="meta">
					<?php the_time('j \d\e F \d\e Y') ?> ~ 
					<?php the_tags(); ?>
				</div>
				<div class="triangle"></div>
				<div class="text clearfix">	
					<?php the_content('Continue lendo &#8594;'); ?>
				</div>
			</div>
			
			<div id="comments">
				<h3><?php comments_number('Sem comentários ainda', '1 Comentário', '% comentários' );?></h3> 
			
				<?php comments_template(); ?>
			</div>
</div>

	<?php endwhile; else: ?>
		<h1>Erro</h1>
		<p>Nada encontrado.</p>
<?php endif; ?>
<?php get_footer(); ?>