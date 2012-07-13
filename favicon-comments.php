<?php
/*
Plugin Name: Favicon comments notifier
Plugin URI:
Description: This plugin notifies admin (in Gmail-style) via favicon how many comments are awaiting moderation. The number of comments awaiting moderation will show in blog`s favicon.
Version: 1.0
Author: Azim Hikmatov
Author URI:
*/
?>
<?php function favicon_link_display() { ?>
	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link href="/favicon.ico" rel="icon" type="image/vnd.microsoft.icon" />
<?php }
add_action('wp_head', 'favicon_link_display');
?>
<?php function favicon_comments_notify() { ?>
	<?php if ( current_user_can('manage_options') ) { ?>
	<script type="text/javascript" src="<?php echo plugins_url('favicon-comments'); ?>/notificon.js"></script>
	<?php $comments_count = wp_count_comments();
	echo
		"<script type='text/javascript'>
			Notificon('". $comments_count->moderated ."');
		</script>"
	?>
<?php }
}
add_action('wp_head', 'favicon_comments_notify');
?>