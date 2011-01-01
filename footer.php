<a name="tagcloud"><!-- --></a>
<div id="extra" class="clearfix">
	<div id="sideA">
		<h3>Últimos textos do blog</h3>
		<ul>
			<?php query_posts('showposts=7'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a><br /><?php the_time('d/m') ?> | <? comments_popup_link('Sem comentários', '1 comentário', '% comentários'); ?></li>
			<?php endwhile; endif; ?>			 
		</ul>
	</div>
	<div id="sideB">
		<h3>Tagcloud</h3>
		<?php wp_tag_cloud('smallest=8&largest=35&number=0'); ?>
		
		<br /><br /><a href="/arquivos">Veja todos os textos &#8594;</a>
	</div>
</div>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-157386-6";
urchinTracker();
</script>
<script type="text/javascript">
_uacct = "UA-157386-1";
urchinTracker();
</script>
</body>
</html>