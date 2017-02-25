<?php
function criar_custom_post_cursos(){

	$args_cursos_post_type = array(
		'labels' => array('name' => 'Cursos'),
		'public' => true,
		'supports' => array('title','editor','excerpt','thumbnail','comments'),
		'register_meta_box_cb' => 'cursos_meta_box'  );

	register_post_type( 'cursos' , $args_cursos_post_type );
}
add_action( 'init' , 'criar_custom_post_cursos');

function cursos_meta_box(){
	add_meta_box( 'campos_cursos', __('Informações'), 'campos_cursos', 'cursos', 'side', 'high' );
}

function campos_cursos(){
	global $post;
	$curso_horario = get_post_meta( $post->ID, 'curso_horario', true );
	?>
	<br>
	<label for="curso_horario">Horário: </label>
	<input type="text" name="curso_horario" id="curso_horario" value="<?php echo $curso_horario; ?>">
	<br>
	<?php
}

function salvar_campos_curso(){
	global $post;
	update_post_meta( $post->ID, 'curso_horario', $_POST['curso_horario'] );
}
add_action( 'save_post' , 'salvar_campos_curso' );