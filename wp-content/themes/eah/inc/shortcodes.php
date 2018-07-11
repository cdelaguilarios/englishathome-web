<?php

function eah_lista_programas($parametros = []) {
  extract(shortcode_atts(["destacados" => "0"], $parametros));

  $programas = get_terms([
      'taxonomy' => 'programas',
      'hide_empty' => false,
  ]);

  foreach ($programas as $programa) {
    $programa->numero_de_orden = get_field('numero_de_orden', 'programas_' . $programa->term_id);
  }
  usort($programas, function($a, $b) {
    return strcmp($a->numero_de_orden, $b->numero_de_orden);
  });

  $programasSel = [];
  if ($destacados == "1") {
    foreach ($programas as $programa) {
      $esDestacado = get_field('destacado', 'programas_' . $programa->term_id);
      if ($esDestacado) {
        $programasSel[] = $programa;
      }
    }
  } else {
    $programasSel = $programas;
  }

  $auxCont = 0;
  $contenido = (($destacados == "1") ? '' : '[et_pb_row make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="15px|||" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" parallax_2="off" parallax_method_2="off" parallax_3="off" parallax_method_3="off"]');
  foreach ($programasSel as $programa) {
    $cursos = get_posts([
        'post_type' => 'cursos',
        'numberposts' => 1,
        'tax_query' => [
            ['taxonomy' => 'programas',
                'field' => 'id',
                'terms' => $programa->term_id,
                'include_c $programa->term_idhildren' => false]
    ]]);

    $imagen = get_field('imagen', 'programas_' . $programa->term_id);
    $contenido .= '[et_pb_column type="1_3"]
            [et_pb_blurb title="' . $programa->name . '" url="' . ($programa->count == 1 && count($cursos) > 0 ? get_post_permalink($cursos[0]) : get_term_link($programa)) . '" image="' . $imagen["url"] . '" animation="off" text_orientation="center" module_class="' . (($destacados == "1") ? 'elemento_programa_destacado' : 'elemento_programa') . '" header_font_size="20px" background_color="#ffffff" use_border_color="on" border_color="#d8d8d8" custom_padding="20px|20px|20px|20px" custom_css_main_element="border-radius: 5px;" custom_css_blurb_image="margin: -20px -20px 10px;"][/et_pb_blurb][/et_pb_column]';
    $auxCont++;
    if (($auxCont % 3) == 0) {
      $contenido .= (($destacados == "1") ? '' : '[/et_pb_row][et_pb_row make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="15px|||" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" parallax_2="off" parallax_method_2="off" parallax_3="off" parallax_method_3="off"]');
    }
  }

  $contenido .= (($destacados == "1") ? '' : '[/et_pb_row]');
  return do_shortcode($contenido);
}

add_shortcode('eah_lista_programas', 'eah_lista_programas');

function eah_testimonios($parametros = []) {
  extract(shortcode_atts(["destacados" => "0"], $parametros));
  extract(shortcode_atts(["id_curso" => "0"], $parametros));

  if ((string) $id_curso != "0") {
    $testimonios = get_field('testimonios', $id_curso);
  } else {
    $testimonios = get_posts([
        'post_type' => 'testimonios',
        'numberposts' => -1]);
  }
  
  if (count($testimonios) > 0) {
    $testimoniosSel = [];
    if ($destacados == "1") {
      foreach ($testimonios as $testimonio) {
        $esDestacado = get_field('destacado', $testimonio->ID);
        if ($esDestacado) {
          $testimoniosSel[] = $testimonio;
        }
      }
    } else {
      $testimoniosSel = $testimonios;
    }
  }
  ob_start();
  include_once __DIR__ . "/vistas/testimonios.php";
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

add_shortcode('eah_testimonios', 'eah_testimonios');

function eah_formulario_interesado($parametros = []) {
  extract(shortcode_atts(["id_curso" => "0"], $parametros));
  extract(shortcode_atts(["titulo" => "Solicita más información"], $parametros));
  
  return do_shortcode('<script>
    ' . ((string) $id_curso != "0" ? 'var esperarCargaElemento = function(selector, callback) {
      if (jQuery(selector).length) {
        callback();
      } else {
        setTimeout(function() {
          esperarCargaElemento(selector, callback);
        }, 100);
      }
    };' : '') . 
    'jQuery(document).ready(function(){
      jQuery("select[name=\'curso\']").prepend("<option value=\'\'' . (!is_single() ? 'selected=\'selected\'' : '') . '>Selecciona un curso</option>");
      jQuery("select[name=\'distrito\']").prepend("<option value=\'\' selected=\'selected\'>Selecciona un distrito</option>");   
      ' . ((string) $id_curso != "0" ? 
      'esperarCargaElemento("select[name=\'curso\']", function() {
          jQuery("select[name=\'curso\']").val(' . $id_curso . ');
        });' : '') . '
    });
    </script>
    <div class="contenedor-formulario-interesado">
      <h3 class="title-formulario">
        <span>' . $titulo . '</span><br/>
        <span class="formulario-subtitulo">Llena el formulario y obtén tu material ¡GRATIS!</span>
      </h3>
      [contact-form-7 id="395" title="Formulario interesados"]
    </div>');
}

add_shortcode('eah_formulario_interesado', 'eah_formulario_interesado');