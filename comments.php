<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
			<?php
			return;
		}
	}
	$oddcomment = 'alt';
?>

<?php if ($comments) : ?>
	
	<ul class="message_list">
		<?php $comments = array_reverse($comments, true); ?>
		<?php $comment_counter = 0; ?>
		<?php foreach ($comments as $comment) : ?>
			<?php $comment_counter++; ?>
			<li class="<?php if(get_comment_type() != 'comment') { echo 'trackback'; } else if (1 == $comment->user_id) { echo 'author'; } ?><?php echo $oddcomment; ?>">
				<div class="meta">
					<?php echo get_avatar( $comment, 32 ); ?>
					<?php echo $comment_counter; ?>. 
					<?php comment_author_link() ?> ~ 
					<?php comment_date('d/m/Y') ?>
					<?php edit_comment_link('[editar] &nbsp;','',''); ?>
					<?php if ( $user_ID ) : ?>
						<? if (function_exists('pri_print_browser') and function_exists('wp_ozh_getCountryCode')) { ?><? echo "<img src=\"http://frenchfragfactory.net/images/flag_" . wp_ozh_getCountryCode() . ".gif\">"; ?> <? pri_print_browser("", "", false, '-'); } ?>
					<?php endif; ?>
				</div>
				<div class="triangle"></div>
				
				<div class="text clearfix">
					<?php if ($comment->comment_approved == '0') : ?>
						Seu comentário está aguardando moderação.
					<?php endif; ?>
				 
					<?php comment_text() ?> 
				</div>
			</li>
		<?php $oddcomment = ( empty( $oddcomment ) ) ? 'alt ' : ''; ?>

		<?php endforeach; /* end for each comment */ ?>
	</ul>
	
	<?php if ($comment_counter > 5) { ?>
	<div class="collapse_buttons">
		<a href="#" class="show_all_message">Todos (<?php echo ($comment_counter); ?>)</a> 
		<a href="#" class="show_recent_only">5 últimos</a>
	</div>
	<?php } ?>


<?php else : // this is displayed if there are no comments so far ?>
 
	<?php if ('open' == $post->comment_status) : ?>


	 <?php else : // comments are closed ?>
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<br/>
<h3 id="respond">Deixe uma resposta</h3>
<br/>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>


<label for="author">Nome</label>
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="input" size="40" tabindex="1" /> <br/>

<label for="email">E-mail</label>
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="input" size="40" tabindex="2" /><br/>

<label for="url">Site</label>
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" class="input" size="40" tabindex="3" /><br/>

<?php endif; ?>

<label for="comment">Mensagem</label><textarea name="comment" class="input" id="comment" cols="100%" rows="12" tabindex="4"></textarea>

<?php do_action('comment_form', $post->ID); ?>
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<input name="submit" type="submit" id="submit" class="clearfix" tabindex="5" value="Comentar" />
</form>

<br/>
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
