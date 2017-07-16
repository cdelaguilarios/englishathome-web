<?php
get_header();

$tituloCurso = get_field('titulo');
$subtitulo = get_field('subtitulo');

$estructuraContenidos = [];
$txtEstructuraContenidos = "";
preg_match_all("/\[\[idImagen:(.*?)\]\[urlImagen:(.*?)\]\[titulo:(.*?)\]\[descripcion:(.*?)\]\]/", get_field("estructura_contenidos"), $estructuraContenidos);
if (count($estructuraContenidos) == 5) {
  $auxCont = 0;
  $txtEstructuraContenidos = "[et_pb_row]";
  foreach ($estructuraContenidos[3] as $k => $titulo) {
    $urlImagen = wp_get_attachment_url($estructuraContenidos[1][$k]);
    $txtEstructuraContenidos .='[et_pb_column type="1_3" parallax="off" parallax_method="on"][et_pb_blurb title="' . $titulo . '" image="' . $urlImagen . '" animation="left" text_orientation="center"]' . $estructuraContenidos[4][$k] . '[/et_pb_blurb][/et_pb_column]';
    $auxCont++;
    if (($auxCont % 3) == 0) {
      $txtEstructuraContenidos .= '[/et_pb_row][et_pb_row]';
    }
  }
  $txtEstructuraContenidos .= '[/et_pb_row]';
}

$metodologia = get_field('metodologia');
$metodologiaPilares = [];
$txtMetodologiaPilares = "";
preg_match_all("/\[\[idImagen:(.*?)\]\[urlImagen:(.*?)\]\[titulo:(.*?)\]\[descripcion:(.*?)\]\]/", get_field("metodologia_pilares_fundamentales"), $metodologiaPilares);
if (count($metodologiaPilares) == 5) {
  $auxCont = 0;
  $txtMetodologiaPilares = "[et_pb_row]";
  foreach ($metodologiaPilares[3] as $k => $titulo) {
    $urlImagen = wp_get_attachment_url($metodologiaPilares[1][$k]);
    $txtMetodologiaPilares .='[et_pb_column type="1_3" parallax="off" parallax_method="on"][et_pb_blurb title="' . $titulo . '" image="' . $urlImagen . '" animation="left" text_orientation="center"]' . $metodologiaPilares[4][$k] . '[/et_pb_blurb][/et_pb_column]';
    $auxCont++;
    if (($auxCont % 3) == 0) {
      $txtMetodologiaPilares .= '[/et_pb_row][et_pb_row]';
    }
  }
  $txtMetodologiaPilares .= '[/et_pb_row]';
}

$adaptabilidad = get_field('adaptabilidad');

$testimonios = get_field('testimonios');
$txtTestimonios = '';
if (!empty($testimonios)) {
  $testimonios = (is_array($testimonios) ? $testimonios : []);
  $txtTestimonios = '[et_pb_column type="1_2"][et_pb_slider admin_label="Slider" show_arrows="off" auto="on" auto_speed="10000" body_font="||||"] ';
  foreach ($testimonios as $testimonio) {
    $txtTestimonios .= '[et_pb_slide heading="' . $testimonio->post_title . '" background_color="rgba(255,255,255,0)" image="' . get_the_post_thumbnail_url($testimonio) . '" use_bg_overlay="off" use_text_overlay="off" background_layout="light" body_font="||on||" body_font_size="15px"]' . $testimonio->post_content . '[/et_pb_slide]';
  }
  $txtTestimonios .='[/et_pb_slider][/et_pb_column]';
}
?>

<div id="main-content">
  <div class="entry-content">
    <?php    
    echo do_shortcode('[et_pb_section fb_built="1" fullwidth="on" admin_label="Section"]
        [et_pb_fullwidth_slider show_arrows="off" show_pagination="off" auto="on" auto_speed="3000" bottom_padding="0px" disabled_on="off|off|off" admin_label="Fullwidth Slider"]
          [et_pb_slide heading="' . $tituloCurso . '" background_image="' . get_the_post_thumbnail_url() . '" background_position="center" use_bg_overlay="off" use_text_overlay="on" text_overlay_color="rgba(0,0,0,0.5)" text_border_radius="10px" header_font="||||" button_icon_placement="right" button_on_hover="on" custom_css_main_element="height: 100vh;"]
            ' . $subtitulo . '
          [/et_pb_slide]
        [/et_pb_fullwidth_slider]
      [/et_pb_section]
      [et_pb_section fb_built="1" custom_padding="0px|0px|0px|0px" admin_label="section"]
        [et_pb_row make_fullwidth="on"]
          [et_pb_column type="1_2" parallax="off" parallax_method="on"]
            [et_pb_cta title="Estructura" use_background_color="off" background_layout="light" admin_label="Call To Action" header_font="|on|||" header_text_color="#0e4f8f"]
              <div class="separator small center " style="margin-top: 10px; margin-bottom: 24px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
              <p style="text-align: justify;">' . apply_filters('the_content', get_post_field('post_content', $post_id)) . '</p>
            [/et_pb_cta]
          [/et_pb_column]
          [et_pb_column type="1_2" parallax="off" parallax_method="on"]
            [et_pb_image src="/wp-content/uploads/2017/07/eah_cursos_niveles.png" align="center" max_width="250px"]
            [/et_pb_image]
          [/et_pb_column]
        [/et_pb_row]
      [/et_pb_section]
      [et_pb_section fb_built="1" background_color="#f5f5f5" custom_padding="0px|0px|0px|0px" admin_label="section"]
        [et_pb_row make_fullwidth="on" admin_label="row"]
          [et_pb_column type="1_2" parallax="off" parallax_method="on"]
            [et_pb_image src="/wp-content/uploads/2017/07/eah_american_english_file_1.jpg" align="center" max_width="250px"]
            [/et_pb_image]
          [/et_pb_column]
          [et_pb_column type="1_2" parallax="off" parallax_method="on"]
            [et_pb_cta title="Metodología" use_background_color="off" background_layout="light" admin_label="Call To Action" header_font="|on|||" header_text_color="#0e4f8f"]
              <div class="separator small center " style="margin-top: 10px; margin-bottom: 24px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
              <p style="text-align: justify;">' . $metodologia . '</p>
            [/et_pb_cta]
          [/et_pb_column]
        [/et_pb_row]
      [/et_pb_section]
      [et_pb_section fb_built="1" custom_padding="0px|0px|0px|0px" admin_label="section"]
        [et_pb_row make_fullwidth="on" admin_label="row"]
          [et_pb_column type="1_2" parallax="off" parallax_method="on"]
            [et_pb_cta title="Metodología" use_background_color="off" background_layout="light" admin_label="Call To Action" header_font="|on|||" header_text_color="#0e4f8f"]
              <div class="separator small center " style="margin-top: 10px; margin-bottom: 24px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
              <p style="text-align: justify;">' . $adaptabilidad . '</p>
            [/et_pb_cta]
            [et_pb_image src="/wp-content/uploads/2017/07/eah_cursos_dinamismo.png" align="center" max_width="450px"]
            [/et_pb_image]
          [/et_pb_column]
          [et_pb_column type="1_2" parallax="off" parallax_method="on"]
            [et_pb_code]
              [eah_formulario_interesado]
            [/et_pb_code]
          [/et_pb_column]
        [/et_pb_row]
      [/et_pb_section]')
    ?>
  </div> <!-- .entry-content -->
</div> <!-- #main-content -->

<?php get_footer(); ?>