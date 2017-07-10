<?php

function eah_lista_programas($parametros = []) {
  extract(shortcode_atts(["destacados" => "0"], $parametros));

  $programas = get_terms([
      'taxonomy' => 'programas',
      'hide_empty' => false,
  ]);

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
  $contenido = '[et_pb_row]';
  foreach ($programasSel as $programa) {
    $imagen = get_field('imagen', 'programas_' . $programa->term_id);
    $contenido .= '[et_pb_column type="1_3" parallax="off" parallax_method="on"]
                          [et_pb_blurb title="' . $programa->name . '" url="' . get_term_link($programa) . '" image="' . $imagen["url"] . '" text_orientation="center"]
                          <p style="text-align: justify;">' . $programa->description . '</p>
                          [/et_pb_blurb]
                        [/et_pb_column]';
    $auxCont++;
    if (($auxCont % 3) == 0) {
      $contenido .= '[/et_pb_row][et_pb_row]';
    }
  }
  $contenido .= '[/et_pb_row]';
  return do_shortcode($contenido);
}

add_shortcode('eah_lista_programas', 'eah_lista_programas');

function eah_testimonios($parametros = []) {
  extract(shortcode_atts(["destacados" => "0"], $parametros));

  $testimonios = get_posts([
      'post_type' => 'testimonios',
      'numberposts' => -1]);

  $contenido = '';
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

    $contenido = '[et_pb_column type="4_4" parallax="off" parallax_method="on"][et_pb_slider show_arrows="off" auto="on" auto_speed="10000" admin_label="Slider" body_font="||||"]';
    foreach ($testimoniosSel as $testimonio) {
      $contenido .= '[et_pb_slide heading="' . $testimonio->post_title . '" background_color="rgba(0,0,0,0.3)" image="' . get_the_post_thumbnail_url($testimonio) . '" use_bg_overlay="off" use_text_overlay="off" body_font="||on||" body_font_size="15px"]' . $testimonio->post_content . '[/et_pb_slide]';
    }
    $contenido .= '[/et_pb_slider][/et_pb_column]';
  }
  return do_shortcode($contenido);
}

add_shortcode('eah_testimonios', 'eah_testimonios');
