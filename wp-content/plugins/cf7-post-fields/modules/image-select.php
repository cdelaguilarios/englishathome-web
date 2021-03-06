<?php
/*
 * A base module for [post_checkbox] and [post_checkbox*]
 * Author: Markus Froehlich
 */
if(!defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!class_exists('wpcf7_post_fields_image_select') )
{
    class wpcf7_post_fields_image_select extends wpcf7_post_fields_module
    {
        /*
         * Data Fields
         */
        private $plugin_file;

        /*
         * Constructor
         */
        public function __construct($plugin_file)
        {
            $this->plugin_file = $plugin_file;

            // Add shortcode
            add_action('wpcf7_init', array($this, 'wpcf7_add_form_tag_post_image_select'));

            // Validation filter
            add_filter('wpcf7_validate_post_image_select', array($this, 'wpcf7_post_image_select_validation_filter'), 10, 2);
            add_filter('wpcf7_validate_post_image_select*', array($this, 'wpcf7_post_image_select_validation_filter'), 10, 2);

            add_action('wpcf7_admin_init', array($this, 'wpcf7_add_tag_generator_menu'), 90);

            add_action('wpcf7_enqueue_styles', array($this, 'wpcf7_select2_enqueue_styles'));
            add_action('wpcf7_enqueue_scripts', array($this, 'wpcf7_select2_enqueue_scripts'));

            add_action('wp_footer', array($this, 'wpcf7_select2_callback_script'));
        }

        public function wpcf7_add_form_tag_post_image_select()
        {
            if (function_exists('wpcf7_add_form_tag')) {
                wpcf7_add_form_tag(array('post_image_select', 'post_image_select*'), array($this, 'wpcf7_post_image_select_shortcode_handler'), true);
            }
        }

        public function wpcf7_post_image_select_shortcode_handler( $tag )
        {
            if ( ! wp_style_is( 'wpcf7-post-image-select2', 'registered' ) ) {
                $this->wpcf7_select2_enqueue_styles();
            }

            if ( ! wp_script_is( 'wpcf7-post-image-select2', 'registered' )) {
                $this->wpcf7_select2_enqueue_scripts();
            }

            wp_enqueue_style( 'wpcf7-post-image-select2' );
            wp_enqueue_script( 'wpcf7-post-image-select2' );

            $tag = new WPCF7_FormTag( $tag );

            if ( empty( $tag->name ) ) {
                return '';
            }

            $validation_error = wpcf7_get_validation_error( $tag->name );

            $class = wpcf7_form_controls_class( 'select post-image' );

            if ( $validation_error ) {
                $class .= ' wpcf7-not-valid';
            }

            $atts = array();

            $atts['class'] = $tag->get_class_option( $class );
            $atts['id'] = $tag->get_id_option();
            $atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );

            if ( $tag->is_required() ) {
                $atts['aria-required'] = 'true';
            }

            $atts['aria-invalid'] = $validation_error ? 'true' : 'false';

            $multiple = $tag->has_option( 'multiple' );

            // No include blank on multiple select
            $include_blank = !$multiple ? $tag->has_option( 'include_blank' ) : false;
            $first_as_label = $tag->has_option( 'first_as_label' );
            $search_box = $tag->has_option( 'search_box' );

            if ( $tag->has_option( 'size' ) ) {
                $size = $tag->get_option( 'size', 'int', true );

                if ( $size ) {
                    $atts['size'] = $size;
                } elseif ( $multiple ) {
                    $atts['size'] = 4;
                } else {
                    $atts['size'] = 1;
                }
            }

            // Sanitize custom fields
            $atts['allow-clear'] = $include_blank ? 'true' : 'false';
            $atts['search-box'] = $search_box ? 'true' : 'false';

            $image_size_value = $tag->get_option('image-size', '', true);
            $image_size = $this->sanitize_image_size($image_size_value);
            $image_width = $this->get_image_width($image_size);

            $excerpt_lenght = $tag->get_option('excerpt-lenght', 'int', true);
            $excerpt_lenght = is_numeric($excerpt_lenght) ? intval($excerpt_lenght) : 55;

            $meta_data = $tag->get_option('meta-data', '', true);

            $post_values = $this->get_post_values($tag);

            $labels = $post_values['labels'];
            $values = $post_values['values'];
            $ids    = $post_values['ids'];

            $defaults = array();

            $default_choice = $tag->get_default_option( null, 'multiple=1' );

            foreach ( $default_choice as $value )
            {
                $key = array_search( $value, $values, true );

                if ( false !== $key ) {
                    $defaults[] = (int) $key + 1;
                }
            }

            // Abfrage nach post_id
            foreach ( $default_choice as $id )
            {
                if(is_numeric($id))
                {
                    $key = array_search( (int)$id, $ids, true );

                    if ( false !== $key ) {
                        $defaults[] = (int) $key + 1;
                    }
                }
            }

            if ( $matches = $tag->get_first_match_option( '/^default:([0-9_]+)$/' ) ) {
                $defaults = array_merge( $defaults, explode( '_', $matches[1] ) );
            }

            $defaults = array_unique( $defaults );

            $shifted = false;

            if ( $include_blank || empty( $values ) ) {
                array_unshift( $labels, __('&mdash; Select &mdash;'));
                array_unshift( $values, '' );
                array_unshift( $ids, -1 );
                $shifted = true;
            } elseif ( $first_as_label ) {
                $values[0] = '';
            }

            $html = '';
            $hangover = wpcf7_get_hangover( $tag->name );

            add_filter('excerpt_length', array($this, 'wpcf7_post_image_select_excerpt_length'), 999);

            foreach ( $values as $key => $value )
            {
                $selected = false;

                if ( $hangover ) {
                    if ( $multiple ) {
                        $selected = in_array( esc_sql( $value ), (array) $hangover );
                    } else {
                        $selected = ( $hangover == esc_sql( $value ) );
                    }
                } else {
                    if ( ! $shifted && in_array( (int) $key + 1, (array) $defaults ) ) {
                        $selected = true;
                    } elseif ( $shifted && in_array( (int) $key, (array) $defaults ) ) {
                        $selected = true;
                    }
                }

                // Check if the post exists
                if(get_post_status($ids[$key]) !== false)
                {
                    $post = get_post($ids[$key]);

                    if(has_excerpt($post->ID)) {
                        $excerpt = get_the_excerpt($post->ID);
                    } else {
                        $excerpt = get_post_field('post_content', $post->ID);
                    }

                    if($excerpt_lenght > 0)
                    {
                        $excerpt = strip_shortcodes($excerpt);
                        $excerpt = wp_trim_words( $excerpt, $excerpt_lenght);
                    }
                    else
                    {
                        $excerpt = '';
                    }

                    $image_url = has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, $image_size) : '';
                    $meta_data_array = $this->get_replace_meta_tags($meta_data, $post);

                    $item_atts = array(
                        'value'             => $value,
                        'data-id'           => $post->ID,
                        'data-image'        => $image_url,
                        'data-width'        => $image_width,
                        'data-excerpt'      => $excerpt,
                        'data-meta'         => implode('|', $meta_data_array),
                        'selected'          => $selected ? 'selected' : ''
                    );
                }
                else
                {
                    $item_atts = array(
                        'value'         => $value,
                        'selected'      => $selected ? 'selected' : ''
                    );
                }

                $item_atts = wpcf7_format_atts( $item_atts );

                $label = isset( $labels[$key] ) ? $labels[$key] : $value;

                $html .= sprintf( '<option %1$s>%2$s</option>', $item_atts, esc_html( $label ) );
            }

            remove_filter('excerpt_length', array($this, 'wpcf7_post_image_select_excerpt_length'), 999);

            if ( $multiple )
                $atts['multiple'] = 'multiple';

            $atts['name'] = $tag->name . ( $multiple ? '[]' : '' );

            $atts = wpcf7_format_atts( $atts );

            $html = sprintf(
                '<span class="wpcf7-form-control-wrap %1$s"><select %2$s>%3$s</select>%4$s</span>',
                sanitize_html_class( $tag->name ), $atts, $html, $validation_error );

            return $html;
        }

        public function wpcf7_post_image_select_excerpt_length($length)
        {
            $length = 150;
            return $length;
        }

        /*
         * Validation Filter
         */
        public function wpcf7_post_image_select_validation_filter( $result, $tag )
        {
	        $tag = new WPCF7_FormTag( $tag );

            $name = $tag->name;

            if ( isset( $_POST[$name] ) && is_array( $_POST[$name] ) ) {
                foreach ( $_POST[$name] as $key => $value ) {
                    if ( '' === $value )
                        unset( $_POST[$name][$key] );
                }
            }

            $empty = ! isset( $_POST[$name] ) || empty( $_POST[$name] ) && '0' !== $_POST[$name];

            if ( $tag->is_required() && $empty ) {
                $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
            }

            return $result;
        }

        public function wpcf7_add_tag_generator_menu()
        {
            if (class_exists('WPCF7_TagGenerator'))
            {
                $tag_generator = WPCF7_TagGenerator::get_instance();
                $tag_generator->add('post_image_select', __('posts').' '.__('Image').'-'.__( 'drop-down menu', 'contact-form-7' ), array($this, 'wpcf7_tag_generator_menu'));
            }
        }

        public function wpcf7_tag_generator_menu($contact_form, $args = '')
        {
            $args = wp_parse_args( $args, array() );
            $description = __('Generate a form-tag for a posts image drop-down menu.', 'cf7-post-fields');

            include dirname(__FILE__) . '/generators/image-select.php';

            $this->enqueue_post_field_javascript($args);
        }

        protected function enqueue_post_field_javascript($args)
        {
            parent::enqueue_post_field_javascript($args);

            ?>
            <script type="text/javascript">
                jQuery(function($) {

                    $('.<?php echo esc_attr( $args['content'] . '-custom-image-size' ); ?>').hide();

                    var tg_name_field = $('#<?php echo esc_attr( $args['content'] . '-name' ); ?>');
                    var tg_image_size_fields = $('#<?php echo esc_attr( $args['content'] . '-image-size input[type=hidden][name=image-size]' ); ?>');

                    var image_width_field = $('#<?php echo esc_attr( $args['content'] . '-image-width' ); ?>');
                    var image_height_field = $('#<?php echo esc_attr( $args['content'] . '-image-height' ); ?>');

                    image_width_field.change(function() {
                        set_custom_image_size(image_width_field.val(), image_height_field.val(), tg_name_field, tg_image_size_fields);
                    });

                    image_height_field.change(function() {
                        set_custom_image_size(image_width_field.val(), image_height_field.val(), tg_name_field, tg_image_size_fields);
                    });

                    // If there is a page refresh error
                    if($('#<?php echo esc_attr( $args['content'] . '-image-size' ); ?> input[type=radio][name=size-name]:checked').val() === 'custom') {
                        $('.<?php echo esc_attr( $args['content'] . '-custom-image-size' ); ?>').show();
                        set_custom_image_size(image_width_field.val(), image_height_field.val(), tg_name_field, tg_image_size_fields);
                    }

                    $('#<?php echo esc_attr( $args['content'] . '-image-size' ); ?> input[type=radio][name=size-name]').change(function() {

                        var image_size_name = $(this).val();

                        if(image_size_name === 'custom') {
                            $('.<?php echo esc_attr( $args['content'] . '-custom-image-size' ); ?>').show();
                            set_custom_image_size(image_width_field.val(), image_height_field.val(), tg_name_field, tg_image_size_fields);
                        } else {
                            $('.<?php echo esc_attr( $args['content'] . '-custom-image-size' ); ?>').hide();
                            tg_image_size_fields.val(image_size_name);
                        }

                        // Trigger the change event
                        tg_name_field.trigger('change');
                    });

                    function set_custom_image_size(image_width, image_height, tg_name_field, tg_image_size_fields) {
                        if( $.isNumeric(image_width) && $.isNumeric(image_height) ) {
                            tg_image_size_fields.val(image_width_field.val() + 'x' + image_height_field.val());
                        }

                        tg_name_field.trigger('change');
                    }
                });
            </script>
            <?php
        }

        public function wpcf7_select2_enqueue_styles()
        {
            wp_register_style('wpcf7-select2', plugin_dir_url($this->plugin_file).'assets/select2/select2.css', array('dashicons'), '4.0.3');
            wp_register_style('wpcf7-post-image-select2', plugin_dir_url($this->plugin_file).'assets/css/wpcf7-post-image-select2.css', array('wpcf7-select2'), '1.0');
        }

        public function wpcf7_select2_enqueue_scripts()
        {
            wp_register_script('wpcf7-select2', plugin_dir_url($this->plugin_file).'assets/select2/select2.min.js', array('jquery'), '4.0.3', true );

            // Localize
            $dependencies = array('wpcf7-select2');
            $locale       = str_replace( '_', '-', get_locale() );
            $locale_short = substr( $locale, 0, 2 );
            $locale = file_exists(plugin_dir_path($this->plugin_file).'assets/select2/i18n/'.$locale.'.js') ? $locale : $locale_short;

            if(file_exists(plugin_dir_path($this->plugin_file).'assets/select2/i18n/'.$locale.'.js'))
            {
                wp_register_script( 'wpcf7-select2-i18n', plugin_dir_url($this->plugin_file).'assets/select2/i18n/'.$locale.'.js', array('jquery'), '4.0.3', true );
                $dependencies[] = 'wpcf7-select2-i18n';
            }

            wp_register_script('wpcf7-post-image-select2', plugin_dir_url($this->plugin_file).'assets/js/jquery.post.image.select2.js', $dependencies, 1.0, true);
            wp_localize_script('wpcf7-post-image-select2', 'wpcf7_post_image_select_obj', array(
                'placeholder'   => __('&mdash; Select &mdash;'),
                'locale'        => $locale
            ));
        }

        public function wpcf7_select2_callback_script()
        {
            if (!wp_script_is('wpcf7-post-image-select2', 'enqueued')) {
                return;
            }
        }
    }
}