<?php
get_header();
?>
<div class="container">
	<?php 
	echo do_shortcode( '[slides]' ); 
	?>
	<div class="listagem">
	<h2>Cursos</h2>
		<?php

		$args_post = array(
			'post_type' => 'cursos'
		);

		$the_query_post = new WP_Query( $args_post );

		if ( $the_query_post->have_posts() ) {

			while ( $the_query_post->have_posts() ) {
				$the_query_post->the_post();
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
		<br>
		<br>
		<h2>Cidades com cursos</h2>
		<?php
		$terms = get_terms( array(
		    'taxonomy' => 'cidades',
		    'hide_empty' => false,
		) );

		foreach ( $terms as $term ) {
		   echo '<li><a href='.get_term_link($term->term_id, "cidades").' >' . $term->name . '</a></li>';
		 }
		?>
	</div>
	<div class="listagem">
	<h2>Notícias</h2>
		<?php

		$args_post = array(
			'post_type' => 'post'
		);

		$the_query_post = new WP_Query( $args_post );

		if ( $the_query_post->have_posts() ) {

			while ( $the_query_post->have_posts() ) {
				$the_query_post->the_post();
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
	<div class="listagem">
	<h2>Páginas</h2>
		<?php

		$args_page = array(
			'post_type' => 'page'
		);

		$the_query_page = new WP_Query( $args_page );

		if ( $the_query_page->have_posts() ) {

			while ( $the_query_page->have_posts() ) {
				$the_query_page->the_post();
				?>
				<div id="post-<?php echo get_the_ID(); ?>" class="page">
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