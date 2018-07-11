<?php
get_header();
$shortcode_slider_escritorio = get_field('shortcode_slider_escritorio');
$shortcode_slider_movil = get_field('shortcode_slider_movil');

$estructura = get_field('estructura');
$estructura_imagen = get_field('estructura_imagen');
$estructura_codigo = get_field('estructura_codigo');

$metodologia = get_field('metodologia');
$metodologia_imagen = get_field('metodologia_imagen');
$metodologia_codigo = get_field('metodologia_codigo');

$adaptabilidad = get_field('adaptabilidad');
$adaptabilidad_imagen = get_field('adaptabilidad_imagen');
$adaptabilidad_codigo = get_field('adaptabilidad_codigo');
?>

<div id="main-content">
  <div class="entry-content">
    <?php
    echo do_shortcode(
     (is_null($shortcode_slider_escritorio) && is_null($shortcode_slider_movil) ?
                    '[et_pb_section bb_built="1" admin_label="Section slider por defecto" fullwidth="on"]
	[et_pb_fullwidth_slider admin_label="Fullwidth Slider" show_arrows="off" show_pagination="off" auto="on" auto_speed="3000" bottom_padding="20px" disabled_on="off|off|off" auto_ignore_hover="off" parallax="off" parallax_method="off" remove_inner_shadow="off" background_position="default" background_size="default" hide_content_on_mobile="off" hide_cta_on_mobile="off" show_image_video_mobile="off" custom_button="off" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0"]
		[et_pb_slide heading="' . get_the_title() . '" background_image="' . get_the_post_thumbnail_url() . '" background_position="center" use_bg_overlay="off" use_text_overlay="on" text_overlay_color="rgba(0,0,0,0.5)" text_border_radius="10px" header_font="||||" button_icon_placement="right" button_on_hover="on" custom_css_main_element="height: 100vh;" background_size="default" background_color="#ffffff" alignment="center" background_layout="dark" allow_player_pause="off" header_font_select="default" body_font_select="default" body_font="||||" custom_button="off" button_font_select="default" button_font="||||" button_use_icon="default" custom_css_slide_title="margin-top:150px;"][/et_pb_slide]
	[/et_pb_fullwidth_slider]
     [/et_pb_section]' :
                    '[et_pb_section bb_built="1" admin_label="Sección Slider Escritorio" transparent_background="on" fullwidth="on" disabled_on="on|on|off" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off"]
	[et_pb_fullwidth_code admin_label="Slider escritorio" custom_css_main_element="padding-top:0px !important;"]
		' . $shortcode_slider_escritorio . '
	[/et_pb_fullwidth_code]
[/et_pb_section]
[et_pb_section bb_built="1" admin_label="Sección Slider Móvil" transparent_background="on" fullwidth="on" disabled_on="off|off|on" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off"]
	[et_pb_fullwidth_code admin_label="Slider móvil" custom_css_main_element="padding-top:138px !important;"]
		' . $shortcode_slider_movil . '
	[/et_pb_fullwidth_code]
[/et_pb_section]') .
            '[et_pb_section bb_built="1" background_image="/wp-content/uploads/2017/07/eah_registro.jpg" disabled_on="off|off|on"]
	[et_pb_row admin_label="Fila" custom_padding="5px|10px|10px|10px" custom_margin="5px|||" background_color="rgba(255,255,255,0.75)" parallax_method_1="off" parallax_method_2="off"]
		[et_pb_column type="1_2"]
			[et_pb_code admin_label="Formulario interesados" module_id="formulario-interesado" custom_css_main_element="margin-top:20px"]
				[eah_formulario_interesado titulo="" id_curso="' . get_the_ID() . '"]
			[/et_pb_code]
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]' .
            (!empty($estructura) ?
                    '[et_pb_section bb_built="1" admin_label="Sección Estructura" custom_padding="15px||0px|" transparent_background="off" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off"]
	[et_pb_row admin_label="Fila" custom_padding="0px||0px|" custom_margin="0px||0px|" parallax_method_1="off" custom_css_main_1="margin-bottom: 0px;" custom_css_main_element="padding: 0px;"]
		[et_pb_column type="4_4"]
			[et_pb_cta admin_label="Estructura" title="Estructura" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" custom_margin="0px||0px|" custom_padding="0px||0px|"]
				<div class="separator small center " style="margin-top: 10px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
			[/et_pb_cta]
		[/et_pb_column]
	[/et_pb_row]        
	[et_pb_row admin_label="Fila" custom_padding="0px||0px|" custom_margin="0px||0px|" parallax_method_1="off" parallax_method_2="off"]
		[et_pb_column type="1_2"]
			[et_pb_cta admin_label="Contenido estructura" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20"]
				<p style="text-align: justify;">' . $estructura . '</p>
			[/et_pb_cta]
		[/et_pb_column]
		[et_pb_column type="1_2"]
                        ' . ($estructura_imagen ?
                            '[et_pb_image admin_label="Estructura imagen" src="' . $estructura_imagen["url"] . '" animation="right" align="center" /]' : '') . '
                        ' . (!is_null($estructura_codigo) ?
                            '[et_pb_code admin_label="Estructura código"]
			' . $estructura_codigo . '
			[/et_pb_code]' : '') . '
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]' : '') .
            (!empty($metodologia) ?
                    '[et_pb_section bb_built="1" admin_label="Sección Metodología Escritorio" background_color="#e8e8e8" custom_padding="15px||0px|" disabled_on="on|on|off" transparent_background="off" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off"]
	[et_pb_row admin_label="Fila" custom_padding="0px||0px|" custom_margin="0px||0px|" parallax_method_1="off"]
		[et_pb_column type="4_4"]
			[et_pb_cta admin_label="Metodología escritorio" title="Metodología" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" custom_margin="0px||0px|" custom_padding="0px||0px|"]
				<div class="separator small center " style="margin-top: 10px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
			[/et_pb_cta]
		[/et_pb_column]
	[/et_pb_row]
	[et_pb_row admin_label="Fila" custom_padding="0px||0px|" custom_margin="0px||0px|" parallax_method_1="off" parallax_method_2="off"]
		[et_pb_column type="1_2"]
                        ' . ($metodologia_imagen ?
                            '[et_pb_image admin_label="Metodología imagen escritorio" src="' . $metodologia_imagen["url"] . '" animation="left" align="center" /]' : '') . '
                        ' . (!is_null($metodologia_codigo) ?
                            '[et_pb_code admin_label="Metodología código escritorio"]
			' . $metodologia_codigo . '
			[/et_pb_code]' : '') . '
		[/et_pb_column]
		[et_pb_column type="1_2"]
			[et_pb_cta admin_label="Contenido metodología escritorio" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20"]
				<p style="text-align: justify;">' . $metodologia . '</p>
			[/et_pb_cta]
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]

[et_pb_section bb_built="1" admin_label="Sección Metodología Móvil" background_color="#f5f5f5" custom_padding="15px||0px|" disabled_on="off|off|on" transparent_background="off" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off"]
	[et_pb_row admin_label="Fila" custom_padding="0px||0px|" custom_margin="0px||0px|" parallax_method_1="off"]
		[et_pb_column type="4_4"]
			[et_pb_cta admin_label="Metodología móvil" title="Metodología" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" custom_margin="0px||0px|" custom_padding="0px||0px|"]
				<div class="separator small center " style="margin-top: 10px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
			[/et_pb_cta]
		[/et_pb_column]
	[/et_pb_row]
	[et_pb_row admin_label="Fila" custom_padding="0px||0px|" custom_margin="0px||0px|" parallax_method_1="off" parallax_method_2="off"]
		[et_pb_column type="1_2"]
			[et_pb_cta admin_label="Contenido metodología móvil" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20"]
				<p style="text-align: justify;">' . $metodologia . '</p>
			[/et_pb_cta]
		[/et_pb_column]
		[et_pb_column type="1_2"]
                        ' . ($metodologia_imagen ?
                            '[et_pb_image admin_label="Metodología imagen móvil" src="' . $metodologia_imagen["url"] . '" animation="right" align="center" /]' : '') . '
                        ' . (!is_null($metodologia_codigo) ?
                            '[et_pb_code admin_label="Metodología código móvil"]
			' . $metodologia_codigo . '
			[/et_pb_code]' : '') . '
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]' : '') .
            (!empty($adaptabilidad) ?
                    '[et_pb_section bb_built="1" admin_label="Sección Adaptabilidad" custom_padding="15px||0px|" transparent_background="off" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off"]
	[et_pb_row admin_label="Fila" custom_padding="0px||0px|" custom_margin="0px||0px|" parallax_method_1="off"]
		[et_pb_column type="4_4"]
			[et_pb_cta admin_label="Adaptabilidad" title="Adaptabilidad" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" custom_margin="0px||0px|" custom_padding="0px||0px|"]
				<div class="separator small center " style="margin-top: 10px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
			[/et_pb_cta]
		[/et_pb_column]
	[/et_pb_row]
	[et_pb_row admin_label="Fila" custom_padding="0px||0px|" custom_margin="0px||0px|" parallax_method_1="off" parallax_method_2="off"]
		[et_pb_column type="1_2"]
			[et_pb_cta admin_label="Contenido adaptabilidad" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20"]
				<p style="text-align: justify;">' . $adaptabilidad . '</p>
			[/et_pb_cta]
		[/et_pb_column]
		[et_pb_column type="1_2"]
                        ' . ($adaptabilidad_imagen ?
                            '[et_pb_image admin_label="Adaptabilidad imagen" src="' . $adaptabilidad_imagen["url"] . '" animation="right" align="center" /]' : (!is_null($adaptabilidad_codigo) ?
                            '[et_pb_code admin_label="Adaptabilidad código"]
			' . $adaptabilidad_codigo . '
			[/et_pb_code]' : '')) . '
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]' : '') .
            '[et_pb_section bb_built="1" admin_label="Sección Testimonios" background_image="/wp-content/uploads/2017/07/eah_registro.jpg"]
	[et_pb_row admin_label="Fila" custom_padding="40px|10px|10px|10px" custom_margin="40px|||" background_color="rgba(255,255,255,0.75)" parallax_method_1="off" parallax_method_2="off"]
		[et_pb_column type="1_2"]
			[et_pb_cta admin_label="Testimonios" title="Testimonios" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" custom_margin="0px||0px|" custom_padding="0px||0px|"]
				<div class="separator small center " style="margin-top: 10px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
			[/et_pb_cta]
			[et_pb_code admin_label="Testimonios"]
				[eah_testimonios id_curso="' . get_the_ID() . '"]
			[/et_pb_code]
		[/et_pb_column]
		[et_pb_column type="1_2" disabled_on="on|on|off"]
			[et_pb_code admin_label="Formulario interesados" module_id="formulario-interesado" custom_css_main_element="margin-top:20px"]
				[eah_formulario_interesado titulo="" id_curso="' . get_the_ID() . '"]
			[/et_pb_code]
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]
[et_pb_section bb_built="1" admin_label="Sección" background_image="#3b3b3b" background_color="#3b3b3b" custom_padding="25px||25px|" global_module="1121"]
	[et_pb_row admin_label="Fila" global_parent="1121" custom_padding="0px|0px|0px|0px" parallax_method_1="off" parallax_method_2="off" parallax_method_3="off"]
		[et_pb_column type="1_3"]
			[et_pb_code admin_label="Información de la empresa" global_parent="1121" custom_css_main_element="color:#fafafa"]&lt;div&gt;&lt;!-- 
			[et_pb_line_break_holder] --&gt; &lt;h4 style=&quot;color:#fdfdfd&quot;&gt;English at Home Perú&lt;/h4&gt; &lt;!-- 
			[et_pb_line_break_holder] --&gt; &lt;div style=&quot;margin-left:4px;&quot;&gt;&lt;!-- [et_pb_line_break_holder] --&gt; &lt;p&gt;Nuestra Empresa debidamente constituida bajo el nombre de CAPACIDAD EMPRESARIAL EIRL con RUC: 20556702005 es una empresa especializada en la enseñanza del Idioma Inglés a domicilio e in-house para empresas.&lt;/p&gt;&lt;!-- 
			[et_pb_line_break_holder] --&gt; &lt;/div&gt;&lt;!-- 
			[et_pb_line_break_holder] --&gt;&lt;/div&gt;
			[/et_pb_code]
		[/et_pb_column]
		[et_pb_column type="1_3"]
			[et_pb_code admin_label="Trabaje con Nosotros" global_parent="1121" custom_css_main_element="color:#fafafa;||padding-bottom:0px;"]&lt;div&gt;&lt;!-- 
			[et_pb_line_break_holder] --&gt; &lt;h4 style=&quot;color:#fdfdfd&quot;&gt;Trabaje con Nosotros&lt;/h4&gt; &lt;!-- 
			[et_pb_line_break_holder] --&gt; &lt;div style=&quot;margin-left:4px;&quot;&gt;&lt;!-- [et_pb_line_break_holder] --&gt; &lt;p&gt;Estamos buscando profesionales competentes para unirse a nuestro equipo. Si es nativo o bilingüe y le interesa trabajar con nosotros, envíenos su Curriculum Vitae a info@englishathomeperu.com o también puede llenar el formulario ingresando al siguiente enlace.&lt;/p&gt;&lt;!-- 
			[et_pb_line_break_holder] --&gt; &lt;/div&gt;&lt;!-- 
			[et_pb_line_break_holder] --&gt;&lt;/div&gt;
			[/et_pb_code]
			[et_pb_button admin_label="Ingrese aquí" global_parent="1121" button_url="http://carlos.arquea.works/eah/postulante/nuevo/externo" url_new_window="on" button_text="Ingrese aquí" custom_button="on" button_text_size="14px" button_text_color="#ffffff" button_bg_color="#0e4f8f" button_border_width="0px" background_color="#7EBEC5" button_alignment="left" background_layout="light" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0" custom_css_main_element="margin-left:4px;" /]
		[/et_pb_column]
		[et_pb_column type="1_3"]
			[et_pb_code admin_label="Ubíquenos y escríbanos" global_parent="1121" custom_css_main_element="color:#fafafa"]&lt;aside class=&quot;widget-area span3&quot;&gt;&lt;!-- [et_pb_line_break_holder] --&gt; &lt;h4 style=&quot;color:#fdfdfd&quot;&gt;Ubíquenos&lt;/h4&gt; &lt;!-- [et_pb_line_break_holder] --&gt; &lt;div style=&quot;margin-left:4px;&quot;&gt;Jr. Loma de las Gardenias 235 - 1er Piso - Santiago de Surco  Lima - Perú&lt;/div&gt;&lt;br&gt;&lt;!-- 
			[et_pb_line_break_holder] --&gt; &lt;h4 style=&quot;color:#fdfdfd&quot;&gt;Escríbanos o Llámenos&lt;/h4&gt;&lt;!-- 
			[et_pb_line_break_holder] --&gt; &lt;p style=&quot;margin-left:4px;&quot;&gt;&lt;strong&gt;&lt;i class=&quot;fa fa-phone&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;&lt;/strong&gt; 970883890 &lt;strong&gt;Asesoría y Ventas&lt;/strong&gt;&lt;br&gt;&lt;!-- 
			[et_pb_line_break_holder] --&gt; &lt;strong&gt;&lt;i class=&quot;fa fa-phone&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;&lt;/strong&gt; 980375855 &lt;strong&gt;Coordinación&lt;/strong&gt;&lt;br&gt;&lt;!-- 
			[et_pb_line_break_holder] --&gt; &lt;strong&gt;&lt;i class=&quot;fa fa-envelope-o&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;&lt;/strong&gt; info@englishathomeperu.com&lt;br&gt;&lt;!-- [et_pb_line_break_holder] --&gt; &lt;strong&gt;&lt;i class=&quot;fa fa-envelope-o&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;&lt;/strong&gt; englishathomeperu@gmail.com&lt;/p&gt;&lt;!-- [et_pb_line_break_holder] --&gt; &lt;/aside&gt;
			[/et_pb_code]
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]');
    ?>
  </div> <!-- .entry-content -->
</div> <!-- #main-content -->

<?php get_footer(); ?>