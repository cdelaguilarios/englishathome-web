<?php get_header(); ?>

<?php
$programa = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));

$cursos = get_posts([
    'post_type' => 'cursos',
    'numberposts' => -1,
    'tax_query' => [
        ['taxonomy' => 'programas',
            'field' => 'id',
            'terms' => $programa->term_id,
            'include_children' => false]
        ]]);

$auxCont = 0;
$contenido = '[et_pb_section fb_built="1" custom_padding="0px|0px|0px|0px"][et_pb_row][et_pb_column type="4_4" parallax="off" parallax_method="on"][et_pb_cta title="' . $programa->name . ' - Cursos" use_background_color="off" background_layout="light"][/et_pb_cta][/et_pb_column][/et_pb_row][et_pb_row]';
foreach ($cursos as $curso) {
  $resumenCurso = get_the_excerpt($curso);
  if (empty($resumenCurso)) {
    $resumenCurso = substr($curso->post_content, 0, 100) . (strlen($curso->post_content) > 100 ? "..." : "");
  }

  $contenido .= '[et_pb_column type="1_3" parallax="off" parallax_method="on"][et_pb_blurb title="' . $curso->post_title . '" url="' . get_post_permalink($curso) . '" image="' . get_the_post_thumbnail_url($curso) . '" text_orientation="center" custom_margin="0px|0px|10px|0px"]
<p style="text-align: justify;">' . $resumenCurso . '</p>
[/et_pb_blurb][et_pb_button button_url="' . get_post_permalink($curso) . '" button_text="Ver mas detalles del curso" button_alignment="center" background_color="#7EBEC5" custom_button="on" button_text_size="12px" button_text_color="#0e4f8f" button_icon="%%36%%" button_icon_placement="left"][/et_pb_button][/et_pb_column]';
  $auxCont++;
  if (($auxCont % 3) == 0) {
    $contenido .= '[/et_pb_row][et_pb_row]';
  }
}
$contenido .= '[/et_pb_row][/et_pb_section]';
?>

<div id="main-content">
  <div class="entry-content" style="padding-top: 111px;">
    <?php echo do_shortcode($contenido) ?>
  </div> <!-- .entry-content -->
</div> <!-- #main-content -->

<?php get_footer(); ?>