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

$contenido = '[et_pb_section fb_built="1" background_color="#f5f5f5" custom_padding="35px|0px|35px|0px" fullwidth="on" admin_label="Sección"]
  [et_pb_fullwidth_header title="' . $programa->name . ' - Cursos" text_orientation="center" title_font_color="#0e4f8f" admin_label="Título de anchura completa" title_font="|on|||" custom_css_main_element="padding: 20px 0 0 0;"]
    <div class="separator small center " style="margin-top: 10px; margin-bottom: 24px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
  [/et_pb_fullwidth_header]
  [et_pb_fullwidth_code admin_label="Código de anchura completa"]
    [et_pb_row make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="10px||10px|" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" parallax_2="off" parallax_method_2="off" parallax_3="off" parallax_method_3="off"]';
foreach ($cursos as $curso) {
  $contenido .= '[et_pb_column type="1_3"]
                  [et_pb_blurb title="' . $curso->post_title . '" url="' . get_post_permalink($curso) . '" image="' . get_the_post_thumbnail_url($curso) . '" animation="off" text_orientation="center" module_class="elemento_curso" header_font_size="20px" background_color="#ffffff" use_border_color="on" border_color="#d8d8d8" custom_padding="20px|20px|20px|20px" custom_css_main_element="border-radius: 5px;" custom_css_blurb_image="margin: -20px -20px 10px;"]
                  [/et_pb_blurb]
                  [et_pb_button button_url="' . get_post_permalink($curso) . '" button_text="Ver detalles del curso" button_alignment="center" admin_label="Button" custom_button="on" button_text_size="15px" button_text_color="#ffffff" background_color="#7EBEC5" button_bg_color="#0e4f8f" button_border_width="0px"][/et_pb_button]
                [/et_pb_column]';
  $auxCont++;
  if (($auxCont % 3) == 0) {
    $contenido .= '[/et_pb_row][et_pb_row make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="10px||10px|" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" parallax_2="off" parallax_method_2="off" parallax_3="off" parallax_method_3="off"]';
  }
}
$contenido .= '[/et_pb_row][/et_pb_fullwidth_code]
[/et_pb_section]';

$contenido .= '[et_pb_section fb_built="1" background_image="#3b3b3b" background_color="#3b3b3b" custom_padding="25px||25px|" admin_label="Sección" global_module="1121"][et_pb_row custom_padding="0px|0px|0px|0px" parallax_method_1="off" parallax_method_2="off" parallax_method_3="off" admin_label="Fila"][et_pb_column type="1_3" parallax="off" parallax_method="off"][et_pb_code admin_label="Código" custom_css_main_element="color:#fafafa"]&lt;div&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	&lt;h4 style=&quot;color:#fdfdfd&quot;&gt;English at Home Perú&lt;/h4&gt; &lt;!-- [et_pb_line_break_holder] --&gt;	&lt;div&gt;&lt;!-- [et_pb_line_break_holder] --&gt;		&lt;p&gt;Nuestra Empresa debidamente constituida bajo el nombre de CAPACIDAD EMPRESARIAL EIRL con RUC: 20556702005 es una empresa especializada en la enseñanza del Idioma Inglés a domicilio e in-house para empresas.&lt;/p&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	&lt;/div&gt;&lt;!-- [et_pb_line_break_holder] --&gt;&lt;/div&gt;[/et_pb_code][/et_pb_column][et_pb_column type="1_3" parallax="off" parallax_method="off"][et_pb_code admin_label="Código" custom_css_main_element="color:#fafafa"]&lt;div&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	&lt;h4 style=&quot;color:#fdfdfd&quot;&gt;Trabaje con Nosotros&lt;/h4&gt; &lt;!-- [et_pb_line_break_holder] --&gt;	&lt;div&gt;&lt;!-- [et_pb_line_break_holder] --&gt;		&lt;p&gt;Estamos buscando profesionales competentes para unirse a nuestro equipo. Si es nativo o bilingüe y le interesa trabajar con nosotros, envíenos su Curriculum Vitae a info@englishathomeperu.com o también puede llenar el formulario ingresando al siguiente enlace.&lt;/p&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	&lt;/div&gt;&lt;!-- [et_pb_line_break_holder] --&gt;&lt;/div&gt;[/et_pb_code][et_pb_button button_url="http://carlos.arquea.works/eah/postulante/nuevo/externo" url_new_window="on" button_text="Envíanos tu curriculum" custom_button="on" button_text_size="14px" button_text_color="#ffffff" button_bg_color="#0e4f8f" button_border_width="0px" background_color="#7EBEC5"][/et_pb_button][/et_pb_column][et_pb_column type="1_3" parallax="off" parallax_method="off"][et_pb_code admin_label="Código" custom_css_main_element="color:#fafafa"]&lt;aside class=&quot;widget-area span3&quot;&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	 &lt;div&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	 &lt;h4 style=&quot;color:#fdfdfd&quot;&gt;Ubíquenos&lt;/h4&gt; &lt;!-- [et_pb_line_break_holder] --&gt;	 &lt;div&gt;Jr. Loma de las Gardenias 235 - 1er Piso - Santiago de Surco  Lima - Perú&lt;br&gt;&lt;br&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	&lt;h4 style=&quot;color:#fdfdfd&quot;&gt;Escribanos o Llámenos&lt;/h4&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	&lt;p&gt;&lt;strong&gt;&lt;i class=&quot;fa fa-phone&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;&lt;/strong&gt; 970883890 &lt;strong&gt;Asesoría y Ventas&lt;/strong&gt;&lt;br&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	&lt;strong&gt;&lt;i class=&quot;fa fa-phone&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;&lt;/strong&gt; 980375855 &lt;strong&gt;Coordinación&lt;/strong&gt;&lt;br&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	&lt;strong&gt;&lt;i class=&quot;fa fa-envelope-o&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;&lt;/strong&gt; info@englishathomeperu.com&lt;br&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	&lt;strong&gt;&lt;i class=&quot;fa fa-envelope-o&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;&lt;/strong&gt; englishathomeperu@gmail.com&lt;/p&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	&lt;/div&gt;&lt;!-- [et_pb_line_break_holder] --&gt;	 &lt;/div&gt;&lt;!-- [et_pb_line_break_holder] --&gt; &lt;/aside&gt;[/et_pb_code][/et_pb_column][/et_pb_row][/et_pb_section]';
?>

<div id="main-content">
  <div class="entry-content" style="padding-top: 111px;">
    <?php echo do_shortcode($contenido) ?>
  </div> <!-- .entry-content -->
</div> <!-- #main-content -->

<?php get_footer(); ?>