<?php

class Sydney_Programas_Cursos extends WP_Widget {

  public function __construct() {
    $widget_ops = array('classname' => 'sydney_services_widget', 'description' => __('Muestra la lista de programas-cursos.', 'sydney'));
    parent::__construct(false, $name = __('Sydney FP: Programas Cursos', 'sydney'), $widget_ops);
    $this->alt_option_name = 'sydney_programas_cursos_widget';
  }

  function form($instance) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
    $number = isset($instance['number']) ? intval($instance['number']) : -1;
    $see_all = isset($instance['see_all']) ? esc_url_raw($instance['see_all']) : '';
    $see_all_text = isset($instance['see_all_text']) ? esc_html($instance['see_all_text']) : '';
    $two_cols = isset($instance['two_cols']) ? (bool) $instance['two_cols'] : false;
    ?>

    <p><?php _e('Para mostrar este widget, primero debes añadir algunos programas de cursos de tu área de administración.', 'sydney'); ?></p>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'sydney'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Número de programas de cursos a mostrar (-1 muestra todos ellos):', 'sydney'); ?></label>
      <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <p><label for="<?php echo $this->get_field_id('see_all'); ?>"><?php _e('La dirección URL de su botón [En caso de que desee un botón debajo de su bloque de programas de cursos]', 'sydney'); ?></label>
      <input class="widefat custom_media_url" id="<?php echo $this->get_field_id('see_all'); ?>" name="<?php echo $this->get_field_name('see_all'); ?>" type="text" value="<?php echo $see_all; ?>" size="3" /></p>	
    <p><label for="<?php echo $this->get_field_id('see_all_text'); ?>"><?php _e('El texto del botón [Predeterminado para <em>"Ver todos nuestros programas"</ em> si se deja vacío]', 'sydney'); ?></label>
      <input class="widefat custom_media_url" id="<?php echo $this->get_field_id('see_all_text'); ?>" name="<?php echo $this->get_field_name('see_all_text'); ?>" type="text" value="<?php echo $see_all_text; ?>" size="3" /></p>
    <p><input class="checkbox" type="checkbox" <?php checked($two_cols); ?> id="<?php echo $this->get_field_id('two_cols'); ?>" name="<?php echo $this->get_field_name('two_cols'); ?>" />
      <label for="<?php echo $this->get_field_id('two_cols'); ?>"><?php _e('¿Mostrar programas en dos columnas en lugar de tres?', 'sydney'); ?></label></p> 	
    <?php
  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = strip_tags($new_instance['number']);
    $instance['see_all'] = esc_url_raw($new_instance['see_all']);
    $instance['see_all_text'] = strip_tags($new_instance['see_all_text']);
    $instance['two_cols'] = isset($new_instance['two_cols']) ? (bool) $new_instance['two_cols'] : false;

    return $instance;
  }

  function widget($args, $instance) {
    if (!isset($args['widget_id'])) {
      $args['widget_id'] = $this->id;
    }
    extract($args);

    $title = (!empty($instance['title']) ) ? $instance['title'] : '';
    $title = apply_filters('widget_title', $title, $instance, $this->id_base);
    $see_all = isset($instance['see_all']) ? esc_url($instance['see_all']) : '';
    $see_all_text = isset($instance['see_all_text']) ? esc_html($instance['see_all_text']) : '';
    $number = (!empty($instance['number']) ) ? intval($instance['number']) : -1;
    if (!$number)
      $number = -1;
    $two_cols = isset($instance['two_cols']) ? $instance['two_cols'] : false;

    $programas_cursos = get_terms(array(
        'taxonomy' => 'programas-cursos',
        'hide_empty' => false,
        'orderby' => 'id',
        'order' => 'ASC'
    ));
    $auxContador = 0;
    echo $args['before_widget'];
    echo (($title) ? $before_title . $title . $after_title : "");
    foreach ($programas_cursos as $programa_curso) {
      $icono_imagen = get_field("icono_imagen", 'programas-cursos' . "_" . $programa_curso->term_id);
      $icono_clase = get_field("icono_clase", 'programas-cursos' . "_" . $programa_curso->term_id);
      ?>
      <?php if (!$two_cols) : ?>
        <div class="service col-md-4">
        <?php else : ?>
          <div class="service col-md-6">
          <?php endif; ?>
          <div class="roll-icon-box">
            <?php if ($icono_imagen) : ?>
              <div class="service-thumb">                  
                <?php echo wp_get_attachment_image($icono_imagen["id"], 'thumbnail', true); ?>
              </div>
            <?php elseif (!empty($icono_clase)) : ?>			
              <div class="icon">
                <?php echo '<i class="fa ' . esc_html($icono_clase) . '"></i>'; ?>
              </div>
            <?php endif; ?>
            <div class="content">
              <h3>
                <?php echo $programa_curso->name; ?>
              </h3>
              <?php echo $programa_curso->description; ?>
            </div><!--.info-->	
          </div>
        </div>
        <?php
        $auxContador++;
        if ($auxContador == $number)
          break;
      }
      ?>
      <?php if ($see_all != '') :
        ?>
        <a href="<?php echo esc_url($see_all); ?>" class="roll-button more-button">
          <?php if ($see_all_text) : ?>
            <?php echo $see_all_text; ?>
          <?php else : ?>
            <?php echo __('Ver todos nuestros programas', 'sydney'); ?>
          <?php endif; ?>
        </a>
      <?php endif; ?>	
      <?php
      echo $args['after_widget'];
    }

  }
  