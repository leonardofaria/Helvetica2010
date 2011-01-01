<?php error_reporting(0); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">	
	<title><?php bloginfo('name'); ?> <?php wp_title('&#8594;'); ?></title>	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<!--[if IE 6]>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/ie6.css" media="screen" />
	<![endif]-->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	<?php if (is_single()) { ?> 
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".message_list li:gt(4)").hide();
		
			$(".show_all_message").click(function(){
				$(this).hide()
				$(".show_recent_only").show()
				$(".message_list li:gt(4)").slideDown()
				return false;
			});
		
			$(".show_recent_only").click(function(){
				$(this).hide()
				$(".show_all_message").show()
				$(".message_list li:gt(4)").slideUp()
				return false;
			});
		
			if($('.trackback').length > 0) {
				$('#comments h3:first').after('<a href="#" id="toggleTrackbacks">Trackbacks</a>');
				$('#toggleTrackbacks').click(function() {
					$('.trackback').slideToggle('slow');
					return false;
				});
			}
		});
	</script>
	<?php } ?>
</head>
<body>
<div id="header">
	<h1><a href="/">Leonardo Faria</a></h1>
	
	<form id="search" action="/" method="get">
		<input name="s" id="search_box" onclick="this.value == 'Busca' ? this.value = '' : true" size="30" style="font-size: 8pt;" type="text" value="<?php if(isset($s)) { echo $s; } else { echo "Busca"; } ?>" />
	</form>
</div>

<div id="menu" class="clearfix">
	<ul>
		<li><a href="/portfolio">portfolio</a></li>
		<li><a href="/arquivos">arquivos</a></li>
		<?php if (is_single()) { echo "<li><a href=\"#tagcloud\">tagcloud</a></li>"; } ?>
		<li><a href="/live">live stream</a></li>
		<li><a href="http://leozera.tumblr.com/">tumblelog</a></li>
		<li><a href="http://www.leonardofaria.net/feed">rss</a></li>
		<li><a href="mailto:leonardofaria@gmail.com">contato</a></li>
	</ul>
</div>