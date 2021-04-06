<?php

namespace Custom\PostType\Slider;

if ( ! function_exists( __NAMESPACE__ . '\post_type' ) ) :
	function post_type() {
		$labels = array(
			'name'               => __( 'Слайды', 'textdomain' ),
			'singular_name'      => __( 'Слайд', 'textdomain' ),
			'add_new'            => __( 'Добавить слайд', 'textdomain' ),
			'add_new_item'       => __( 'Добавить слайд', 'textdomain' ),
			'edit_item'          => __( 'Редактировать слайд', 'textdomain' ),
			'new_item'           => __( 'Новый слайд', 'textdomain' ),
			'all_items'          => __( 'Все слайды', 'textdomain' ),
			'view_item'          => __( 'Просмотр слайда на сайте', 'textdomain' ),
			'search_items'       => __( 'Найти слайд', 'textdomain' ),
			'not_found'          => __( 'Слайдов не найдено.', 'textdomain' ),
			'not_found_in_trash' => __( 'В корзине нет слайдов.', 'textdomain' ),
			'menu_name'          => __( 'Слайды', 'textdomain' ),
		);

		$args = array(
			'labels'              => $labels,
			'public'              => true,
			'publicly_queryable'  => null,
			'exclude_from_search' => null,
			'show_ui'             => null,
			'show_in_menu'        => null,
			'show_in_admin_bar'   => null,
			'show_in_nav_menus'   => null,
			'menu_icon'           => 'dashicons-images-alt2',
			'menu_position'       => 15,
			'has_archive'         => true,
			'hierarchical'        => false,
			// available supports: title, editor, author, thumbnail, excerpt, trackbacks, custom-fields, comments, revisions, page-attributes, post-formats.
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'description'         => '',
		);

		register_post_type( NAME, $args );
	}
endif;
