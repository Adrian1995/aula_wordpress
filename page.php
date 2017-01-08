<?php
get_header();
?>
<div <?php echo body_class("container"); ?> >
	<?php
	while( have_posts() ) {
		the_post();

		?>
		<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" >
		<h1><?php echo get_the_title(); ?></h1>
		<br>
		<br>
		<p><?php the_content(); ?></p>
		<?php
	}
	?>
</div>
<?php
get_footer();
?>