<?php
get_header();
?>
<div <?php echo body_class("container"); ?> >
	<div class="row">
		<div class="col-md-8">
			<?php
			while( have_posts() ) {
				the_post();

				?>
				<img class="img-responsive" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" >
				<h1><?php echo get_the_title(); ?></h1>
				<p><?php echo get_the_excerpt(); ?></p>
				<br>
				<br>
				<p><?php echo get_the_content(); ?></p>
				<?php
			}
			?>
		</div>
		<div class="col-md-4">
			<?php
			dynamic_sidebar( 'barra-lateral' );
			?>
		</div>
	</div>
</div>
<?php
get_footer();
?>