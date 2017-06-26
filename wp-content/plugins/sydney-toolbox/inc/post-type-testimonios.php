<?php

function sydney_toolbox_register_testimonios() {

  $slug = apply_filters('sydney_testimonios_rewrite_slug', 'testimonios');

  $labels = array(
      'name' => _x('Testimonios', 'Post Type General Name', 'sydney_toolbox'),
      'singular_name' => _x('Testimonio', 'Post Type Singular Name', 'sydney_toolbox'),
      'menu_name' => __('Testimonios', 'sydney_toolbox'),
      'parent_item_colon' => __('Testimonio padre:', 'sydney_toolbox'),
      'all_items' => __('Todos los testimonios', 'sydney_toolbox'),
      'add_new_item' => __('Agregar nuevo testimonio', 'sydney_toolbox'),
      'add_new' => __('Agregar nuevo testimonio', 'sydney_toolbox'),
      'new_item' => __('Nuevo testimonio', 'sydney_toolbox'),
      'edit_item' => __('Editar testimonio', 'sydney_toolbox'),
      'update_item' => __('Actualizar testimonio', 'sydney_toolbox'),
      'view_item' => __('Ver testimonio', 'sydney_toolbox'),
      'search_items' => __('Buscar testimonio', 'sydney_toolbox'),
      'not_found' => __('No encontrado', 'sydney_toolbox'),
      'not_found_in_trash' => __('No se encuentra en la papelera', 'sydney_toolbox'),
  );
  $args = array(
      'label' => __('Testimonio', 'sydney_toolbox'),
      'labels' => $labels,
      'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 26,
      'menu_icon' => 'dashicons-book',
      'show_in_admin_bar' => true,
      'show_in_nav_menus' => true,
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'page',
      'rewrite' => array('slug' => $slug),
  );
  register_post_type('testimonios', $args);
}

add_action('init', 'sydney_toolbox_register_testimonios', 0);
