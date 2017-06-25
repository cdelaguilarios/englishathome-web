<?php

function sydney_toolbox_register_cursos() {

  $slug = apply_filters('sydney_cursos_rewrite_slug', 'cursos');

  $labels = array(
      'name' => _x('Cursos', 'Post Type General Name', 'sydney_toolbox'),
      'singular_name' => _x('Curso', 'Post Type Singular Name', 'sydney_toolbox'),
      'menu_name' => __('Cursos', 'sydney_toolbox'),
      'parent_item_colon' => __('Curso padre:', 'sydney_toolbox'),
      'all_items' => __('Todos los cursos', 'sydney_toolbox'),
      'add_new_item' => __('Agregar nuevo curso', 'sydney_toolbox'),
      'add_new' => __('Agregar nuevo curso', 'sydney_toolbox'),
      'new_item' => __('Nuevo curso', 'sydney_toolbox'),
      'edit_item' => __('Editar curso', 'sydney_toolbox'),
      'update_item' => __('Actualizar curso', 'sydney_toolbox'),
      'view_item' => __('Ver curso', 'sydney_toolbox'),
      'search_items' => __('Buscar curso', 'sydney_toolbox'),
      'not_found' => __('No encontrado', 'sydney_toolbox'),
      'not_found_in_trash' => __('No se encuentra en la papelera', 'sydney_toolbox'),
  );
  $args = array(
      'label' => __('Curso', 'sydney_toolbox'),
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
  register_post_type('cursos', $args);
}

add_action('init', 'sydney_toolbox_register_cursos', 0);
