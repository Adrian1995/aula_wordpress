<?php

function registra_widget(){
	register_widget( 'Widget_Ultimos_Posts' );
}
add_action( 'widgets_init' , 'registra_widget' );


class Widget_Ultimos_Posts extends WP_Widget {

	function __construct() {
		parent:: __construct(
			'Widget_Ultimos_Posts',
			'Últimos posts',
			array( 'description' => 'Widget para exibir os Últimos posts' )
		);
	}


	public function widget( $args, $instance ){
		$titulo = $instance["titulo"];
		$quantidade = $instance["quantidade"];
		
		echo "<div class='widget-ultimos-posts'>";
		echo "<h3>".$titulo."</h3>";

		$args = array(
			'posts_per_page' => $quantidade,
			'orderby' => 'date', 
			'order' => 'DESC');

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {
			echo '<ul>';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				echo '<li><a href='. get_permalink() .'>' . get_the_title() . '</a></li>';
			}
			echo '</ul>';
		}
		echo "</div>";
	}

	public function form( $instance ){
		$titulo = $instance["titulo"];
		$quantidade = $instance["quantidade"];
		echo "Título: <input type='text' id='".$this->get_field_id('titulo')."' name='".$this->get_field_name('titulo')."' value='".$titulo."'>";
		echo "Quantidade: <input type='text' id='".$this->get_field_id('quantidade')."' name='".$this->get_field_name('quantidade')."' value='".$quantidade."'>";
	}

	public function update( $new_instance, $old_instance ){
		$instance = array();
		$instance["titulo"] = $new_instance["titulo"];
		$instance["quantidade"] = $new_instance["quantidade"];
		return $instance;
	}





}