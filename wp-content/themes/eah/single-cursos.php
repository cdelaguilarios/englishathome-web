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
    echo do_shortcode('<script>
      var waitForEl = function(selector, callback) {
        if (jQuery(selector).length) {
          callback();
        } else {
          setTimeout(function() {
            waitForEl(selector, callback);
          }, 100);
        }
      };
      jQuery(document).ready(function(){
        waitForEl("select[name=\'curso\']", function() {
          jQuery("select[name=\'curso\']").val(' . get_the_ID() . ');
        });
      });
     </script>   

     ' . (is_null($shortcode_slider_escritorio) && is_null($shortcode_slider_movil) ?
                    '[et_pb_section bb_built="1" admin_label="Section" fullwidth="on"]
	[et_pb_fullwidth_slider admin_label="Fullwidth Slider" show_arrows="off" show_pagination="off" auto="on" auto_speed="3000" bottom_padding="20px" disabled_on="off|off|off" auto_ignore_hover="off" parallax="off" parallax_method="off" remove_inner_shadow="off" background_position="default" background_size="default" hide_content_on_mobile="off" hide_cta_on_mobile="off" show_image_video_mobile="off" custom_button="off" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0"]
		[et_pb_slide heading="' . get_the_title() . '" background_image="' . get_the_post_thumbnail_url() . '" background_position="center" use_bg_overlay="off" use_text_overlay="on" text_overlay_color="rgba(0,0,0,0.5)" text_border_radius="10px" header_font="||||" button_icon_placement="right" button_on_hover="on" custom_css_main_element="height: 100vh;" background_size="default" background_color="#ffffff" alignment="center" background_layout="dark" allow_player_pause="off" header_font_select="default" body_font_select="default" body_font="||||" custom_button="off" button_font_select="default" button_font="||||" button_use_icon="default" custom_css_slide_title="margin-top:150px;"][/et_pb_slide]
	[/et_pb_fullwidth_slider]
     [/et_pb_section]' :
                    '[et_pb_section bb_built="1" admin_label="Section" transparent_background="on" fullwidth="on" disabled_on="on|on|" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off"]
	[et_pb_fullwidth_code admin_label="Slider escritorio" disabled_on="off|off|" custom_css_main_element="padding-top:0px !important;" disabled="off"]
		' . $shortcode_slider_escritorio . '
	[/et_pb_fullwidth_code]
[/et_pb_section]
[et_pb_section bb_built="1" admin_label="Section" transparent_background="on" fullwidth="on" disabled_on="off|off|on" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" disabled="off" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off"]
	[et_pb_fullwidth_code admin_label="Slider móvil" disabled_on="off|off|" disabled="off"]
		' . $shortcode_slider_movil . '
	[/et_pb_fullwidth_code]
[/et_pb_section]') .
            (!empty($estructura) ?
                    '[et_pb_section bb_built="1" admin_label="Sección" transparent_background="off" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off"]
	[et_pb_row admin_label="Fila" make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="0px||0px|" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" custom_padding="0px||0px|"]
		[et_pb_column type="4_4"]
			[et_pb_cta admin_label="Estructura" title="Estructura" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" url_new_window="off" background_color="#7EBEC5" text_orientation="center" use_border_color="off" border_color="#ffffff" border_style="solid" custom_button="off" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0"]
				<div class="separator small center " style="margin-top: 10px; margin-bottom: 24px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
			[/et_pb_cta]
		[/et_pb_column]
	[/et_pb_row]        
	[et_pb_row admin_label="Fila" make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="0px||0px|" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" parallax_2="off" parallax_method_2="off" custom_padding="0px||0px|"]
		[et_pb_column type="1_2"]
			[et_pb_cta admin_label="Contenido estructura" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" url_new_window="off" background_color="#7EBEC5" text_orientation="center" use_border_color="off" border_color="#ffffff" border_style="solid" custom_button="off" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0"]
				<p style="text-align: justify;">' . $estructura . '</p>
			[/et_pb_cta]
		[/et_pb_column]
		[et_pb_column type="1_2"]
                        ' . ($estructura_imagen ?
                            '[et_pb_image admin_label="Estructura imagen" src="' . $estructura_imagen["url"] . '" show_in_lightbox="off" url_new_window="off" use_overlay="off" animation="right" sticky="off" align="center" force_fullwidth="off" always_center_on_mobile="on" use_border_color="off" border_color="#ffffff" border_style="solid" /]' : '') . '
                        ' . (!is_null($estructura_codigo) ?
                            '[et_pb_code admin_label="Estructura código"]
			' . $estructura_codigo . '
			[/et_pb_code]' : '') . '
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]' : '') .
            (!empty($metodologia) ?
                    '[et_pb_section bb_built="1" admin_label="Sección" transparent_background="off" background_color="#e8e8e8" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off" disabled="off" disabled_on="on|on|off"]
	[et_pb_row admin_label="Fila" make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="0px||0px|" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" custom_padding="0px||0px|"]
		[et_pb_column type="4_4"]
			[et_pb_cta admin_label="Metodología escritorio" title="Metodología" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" url_new_window="off" background_color="#7EBEC5" text_orientation="center" use_border_color="off" border_color="#ffffff" border_style="solid" custom_button="off" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0"]
				<div class="separator small center " style="margin-top: 10px; margin-bottom: 24px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
			[/et_pb_cta]
		[/et_pb_column]
	[/et_pb_row]
	[et_pb_row admin_label="Fila" make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="0px||0px|" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" parallax_2="off" parallax_method_2="off" custom_padding="0px||0px|"]
		[et_pb_column type="1_2"]
                        ' . ($metodologia_imagen ?
                            '[et_pb_image admin_label="Metodología imagen escritorio" src="' . $metodologia_imagen["url"] . '" show_in_lightbox="off" url_new_window="off" use_overlay="off" animation="left" sticky="off" align="center" force_fullwidth="off" always_center_on_mobile="on" use_border_color="off" border_color="#ffffff" border_style="solid" /]' : '') . '
                        ' . (!is_null($metodologia_codigo) ?
                            '[et_pb_code admin_label="Metodología código escritorio"]
			' . $metodologia_codigo . '
			[/et_pb_code]' : '') . '
		[/et_pb_column]
		[et_pb_column type="1_2"]
			[et_pb_cta admin_label="Contenido metodología escritorio" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" url_new_window="off" background_color="#7EBEC5" text_orientation="center" use_border_color="off" border_color="#ffffff" border_style="solid" custom_button="off" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0"]
				<p style="text-align: justify;">' . $metodologia . '</p>
			[/et_pb_cta]
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]
[et_pb_section bb_built="1" admin_label="Sección" transparent_background="off" background_color="#e8e8e8" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off" disabled="off" disabled_on="||on"]
	[et_pb_row admin_label="Fila" make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="0px||0px|" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" custom_padding="0px||0px|"]
		[et_pb_column type="4_4"]
			[et_pb_cta admin_label="Metodología móvil" title="Metodología" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" url_new_window="off" background_color="#7EBEC5" text_orientation="center" use_border_color="off" border_color="#ffffff" border_style="solid" custom_button="off" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0"]
				<div class="separator small center " style="margin-top: 10px; margin-bottom: 24px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
			[/et_pb_cta]
		[/et_pb_column]
	[/et_pb_row]
	[et_pb_row admin_label="Fila" make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="0px||0px|" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" parallax_2="off" parallax_method_2="off" custom_padding="0px||0px|"]
		[et_pb_column type="1_2"]
			[et_pb_cta admin_label="Contenido metodología móvil" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" url_new_window="off" background_color="#7EBEC5" text_orientation="center" use_border_color="off" border_color="#ffffff" border_style="solid" custom_button="off" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0"]
				<p style="text-align: justify;">' . $metodologia . '</p>
			[/et_pb_cta]
		[/et_pb_column]
		[et_pb_column type="1_2"]
                        ' . ($metodologia_imagen ?
                            '[et_pb_image admin_label="Metodología imagen móvil" src="' . $metodologia_imagen["url"] . '" show_in_lightbox="off" url_new_window="off" use_overlay="off" animation="left" sticky="off" align="center" force_fullwidth="off" always_center_on_mobile="on" use_border_color="off" border_color="#ffffff" border_style="solid" /]' : '') . '
                        ' . (!is_null($metodologia_codigo) ?
                            '[et_pb_code admin_label="Metodología código móvil"]
			' . $metodologia_codigo . '
			[/et_pb_code]' : '') . '
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]' : '') .
            (!empty($adaptabilidad) ?
                    '[et_pb_section bb_built="1" admin_label="Sección" transparent_background="off" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off"]
	[et_pb_row admin_label="Fila" make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="0px||0px|" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" custom_padding="0px||0px|"]
		[et_pb_column type="4_4"]
			[et_pb_cta admin_label="Adaptabilidad" title="Adaptabilidad" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" url_new_window="off" background_color="#7EBEC5" text_orientation="center" use_border_color="off" border_color="#ffffff" border_style="solid" custom_button="off" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0"]
				<div class="separator small center " style="margin-top: 10px; margin-bottom: 24px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
			[/et_pb_cta]
		[/et_pb_column]
	[/et_pb_row]
	[et_pb_row admin_label="Fila" make_fullwidth="off" use_custom_width="off" width_unit="on" use_custom_gutter="off" custom_margin="0px||0px|" allow_player_pause="off" parallax="off" parallax_method="on" make_equal="off" parallax_1="off" parallax_method_1="off" parallax_2="off" parallax_method_2="off" custom_padding="0px||0px|"]
		[et_pb_column type="1_2"]
			[et_pb_cta admin_label="Contenido adaptabilidad" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" url_new_window="off" background_color="#7EBEC5" text_orientation="center" use_border_color="off" border_color="#ffffff" border_style="solid" custom_button="off" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0"]
				<p style="text-align: justify;">' . $adaptabilidad . '</p>
			[/et_pb_cta]
		[/et_pb_column]
		[et_pb_column type="1_2"]
                        ' . ($adaptabilidad_imagen ?
                            '[et_pb_image admin_label="Adaptabilidad imagen" src="' . $adaptabilidad_imagen["url"] . '" show_in_lightbox="off" url_new_window="off" use_overlay="off" animation="right" sticky="off" align="center" force_fullwidth="off" always_center_on_mobile="on" use_border_color="off" border_color="#ffffff" border_style="solid" max_width="250px" /]' : '') . '
                        ' . (!is_null($adaptabilidad_codigo) ?
                            '[et_pb_code admin_label="Adaptabilidad código"]
			' . $adaptabilidad_codigo . '
			[/et_pb_code]' : '') . '
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]' : '') .
            '[et_pb_section bb_built="1" admin_label="Sección" fullwidth="off" specialty="off" transparent_background="off" background_color="#f5f5f5" allow_player_pause="off" inner_shadow="off" parallax="off" parallax_method="on" make_fullwidth="off" use_custom_width="off" width_unit="on" make_equal="off" use_custom_gutter="off"]
	[et_pb_row admin_label="Fila"]
		[et_pb_column type="1_2"]
                        [et_pb_cta admin_label="Testimonios" title="Testimonios" use_background_color="off" background_layout="light" header_font="|on|||" header_font_size="40" header_text_color="#0e4f8f" body_font_size="20" url_new_window="off" background_color="#7EBEC5" text_orientation="center" use_border_color="off" border_color="#ffffff" border_style="solid" custom_button="off" button_letter_spacing="0" button_use_icon="default" button_icon_placement="right" button_on_hover="on" button_letter_spacing_hover="0"]
				<div class="separator small center " style="margin-top: 10px; margin-bottom: 24px; background-color: #0e4f8f; height: 1px; width: 50px;"></div>
			[/et_pb_cta]
			[et_pb_code admin_label="Testimonios"]
				[eah_testimonios]
			[/et_pb_code]
		[/et_pb_column]
		[et_pb_column type="1_2"]
			[et_pb_code admin_label="Formulario interesados" module_id="formulario-interesado"]
				[eah_formulario_interesado]
			[/et_pb_code]
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]');
    ?>
  </div> <!-- .entry-content -->
</div> <!-- #main-content -->

<?php get_footer(); ?>