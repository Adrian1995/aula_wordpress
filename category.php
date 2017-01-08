<?php
get_header();
?>
<div class="container">
	<div class="listagem">
	<h2><?php echo single_cat_title(); ?></h2>
		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
				?>
				<div id="post-<?php echo get_the_ID(); ?>" class="post">
					<?php echo get_the_post_thumbnail(); ?>
					<div class="info">
						<a href="<?php echo get_the_permalink(); ?>">
							<h3> <?php echo get_the_title(); ?></h3>
							<p> <?php echo get_the_excerpt(); ?></p>
						</a>
					</div>
				</div>
				<?php
			}
		}
		?>
	</div>
</div>
<?php
get_footer();
?>