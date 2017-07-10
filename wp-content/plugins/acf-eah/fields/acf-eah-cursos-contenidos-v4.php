<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_field_eah_cursos_contenidos') ) :


class acf_field_eah_cursos_contenidos extends acf_field {
	
	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options
		
		
	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function __construct( $settings )
	{
		// vars
		$this->name = 'Cursos contenidos';
		$this->label = __('Cursos contenidos');
		$this->category = __("Content",'acf'); // Basic, Content, Choice, etc
		$this->defaults = array(
			// add default here to merge into your field. 
			// This makes life easy when creating the field options as you don't need to use any if( isset('') ) logic. eg:
			//'preview_size' => 'thumbnail'
		);
		
		
		// do not delete!
    	parent::__construct();
    	
    	
    	// settings
		$this->settings = $settings;

	}
    
	
	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function create_field( $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/
		
		// perhaps use $field['preview_size'] to alter the markup?
		
		
		// create Field HTML
		$o = array( 'id', 'name', 'value');        
		$e = '<input type="hidden"';		
		foreach( $o as $k )
		{
			$e .= ' ' . $k . '="' . esc_attr( $field[ $k ] ) . '"';	
		}		
		$e .= ' />';
		?>
        <div class="eah-cursos-contenidos acf-input-wrap" style="display:none">
          <?php echo $e ?>
          <table>
            <tbody>
              <tr>
                <td>Imagen:</td>
                <td><input class="eah-cursos-contenidos-imagen" type="hidden"/><button class="selecionar-imagen-eah-cursos-contenidos" data-nro="0" type="button">Seleccionar imagen</button></td>
              </tr>
              <tr>
                <td>Título:</td>
                <td><input class="eah-cursos-contenidos-titulo" type="text" maxlength="100"/></td>
              </tr>
              <tr>
                <td>Descripción:</td>
                <td><input class="eah-cursos-contenidos-descripcion" type="text" maxlength="500"/></td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td>
                  <button class="agregar-eah-cursos-contenidos" type="button">+</button><button class="remover-eah-cursos-contenidos" type="button" style="display:none">-</button>
                </td>
              </tr>
            </tfoot>            
          </table>
		</div>
		<?php
	}
	
	
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your create_field() action.
	*
	*  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function input_admin_enqueue_scripts()
	{
		// Note: This function can be removed if not used
		
		
		// vars
		$url = $this->settings['url'];
		$version = $this->settings['version'];
		
		
		// register & include JS
		wp_register_script( 'acf-input-eah-cursos-contenidos', "{$url}assets/js/cursos-contenidos.js", array('acf-input'), $version );
		wp_enqueue_script('acf-input-eah-cursos-contenidos');
		
		
		// register & include CSS
		wp_register_style( 'acf-input-eah-cursos-contenidos', "{$url}assets/css/cursos-contenidos.css", array('acf-input'), $version );
		wp_enqueue_style('acf-input-eah-cursos-contenidos');
		
	}
    

}


// initialize
new acf_field_eah_cursos_contenidos( $this->settings );


// class_exists check
endif;

?>