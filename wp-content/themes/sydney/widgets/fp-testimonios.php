<?php

class Sydney_Testimonios extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'sydney_testimonios_widget', 'description' => __( 'Muestra los testimonios registrados en un slider.', 'sydney') );
        parent::__construct(false, $name = __('Sydney FP: Testimonios', 'sydney'), $widget_ops);
		$this->alt_option_name = 'sydney_testimonios_widget';
    }
	
	function form($instance) {
		$title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    		= isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$see_all   		= isset( $instance['see_all'] ) ? esc_url_raw( $instance['see_all'] ) : '';
		$see_all_text  	= isset( $instance['see_all_text'] ) ? esc_html( $instance['see_all_text'] ) : '';	
		$autoplay    	= isset( $instance['autoplay'] ) ? intval( $instance['autoplay'] ) : 5000;	
	?>

	<p><?php _e('Para mostrar este widget, primero debes añadir algunos testimonios de tu área de administración.', 'sydney'); ?></p>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Número de testimonios a mostrar (-1 muestra todos ellos):', 'sydney' ); ?></label>
	<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <p><label for="<?php echo $this->get_field_id('see_all'); ?>"><?php _e('La dirección URL de su botón [En caso de que desee un botón debajo de su bloque de testimonios]', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'see_all' ); ?>" name="<?php echo $this->get_field_name( 'see_all' ); ?>" type="text" value="<?php echo $see_all; ?>" size="3" /></p>	
    <p><label for="<?php echo $this->get_field_id('see_all_text'); ?>"><?php _e('El texto del botón [Predeterminado para <em>"Ver todos nuestros testimonios"</ em> si se deja vacío]', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'see_all_text' ); ?>" name="<?php echo $this->get_field_name( 'see_all_text' ); ?>" type="text" value="<?php echo $see_all_text; ?>" size="3" /></p>		
	<p><label for="<?php echo $this->get_field_id( 'autoplay' ); ?>"><?php _e( 'Autoplay time [ms]', 'sydney' ); ?></label>
	<input id="<?php echo $this->get_field_id( 'autoplay' ); ?>" name="<?php echo $this->get_field_name( 'autoplay' ); ?>" type="text" value="<?php echo $autoplay; ?>" size="3" /></p>
    		
	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['number'] 		= strip_tags($new_instance['number']);
		$instance['see_all'] 		= esc_url_raw( $new_instance['see_all'] );	
		$instance['see_all_text'] 	= strip_tags($new_instance['see_all_text']);
		$instance['autoplay'] 		= absint($new_instance['autoplay']);

		return $instance;
	}

	// display widget
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		extract($args);

		$title 			= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$see_all 		= isset( $instance['see_all'] ) ? esc_url($instance['see_all']) : '';
		$see_all_text 	= isset( $instance['see_all_text'] ) ? esc_html($instance['see_all_text']) : '';
		$number 		= ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : -1;
		if ( ! $number ) {
			$number = -1;
		}			
		$autoplay 		= ( ! empty( $instance['autoplay'] ) ) ? intval( $instance['autoplay'] ) : 5000;

		$testimonials = new WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type' 		  => 'testimonios',
			'posts_per_page'	  => $number
		) );
		
		echo $args['before_widget'];

		if ($testimonials->have_posts()) :
?>
			<?php if ( $title ) echo $before_title . $title . $after_title; ?>
			<div class="col-md-12">
				<div class="roll-testimonials" data-autoplay="<?php echo intval($autoplay); ?>">
					<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
						<?php $function = get_post_meta( get_the_ID(), 'wpcf-client-function', true ); ?>
                        <div class="customer">
                            <blockquote class="whisper"><?php the_content(); ?></blockquote>                               
                            <?php if ( has_post_thumbnail() ) : ?>
                            <div class="avatar">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <?php endif; ?>                                
                            <div class="name">
                            	<?php the_title(); ?>
                            	<span><?php echo esc_html($function); ?></span>
                            </div>
                        </div>
					<?php endwhile; ?>
				</div>
			</div>	

			<?php if ($see_all != '') : ?>
				<a href="<?php echo esc_url($see_all); ?>" class="roll-button more-button">
					<?php if ($see_all_text) : ?>
						<?php echo $see_all_text; ?>
					<?php else : ?>
						<?php echo __('Ver todos nuestros testimonios', 'sydney'); ?>
					<?php endif; ?>
				</a>
			<?php endif; ?>	

	<?php
		echo $args['after_widget'];
		wp_reset_postdata();
		endif;
	}
	
}