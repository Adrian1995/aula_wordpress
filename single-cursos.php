<?php
get_header();
?>
<div <?php echo body_class("container"); ?> >
	<div class="row">
		<div class="col-md-8">
			<?php
			while( have_posts() ) {
				the_post();

				$curso_horario = get_post_meta( get_the_ID(), 'curso_horario', true );
				?>
				<img class="img-responsive" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" >
				<h1><?php echo get_the_title(); ?></h1>
				<p>Horário: <?php echo $curso_horario; ?></p>
				<p>Disponível nas seguintes cidades: 
				<?php
				$termsCidades = get_the_terms( get_the_ID() , 'cidades');

				if( is_array($termsCidades) ){
					foreach ($termsCidades as $cidade) {
						echo $cidade->name.", ";
					}
				}
				?>
				</p>
				<br>
				<p><?php echo get_the_content(); ?></p>
				<?php
				comments_template();
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