<?php

namespace Custom\PostType\Slider;

/**
 * Регистрируем таксономию slider (Категории (термины) связывающие слайды (записи) в слайдер)
 */

if ( ! function_exists( __NAMESPACE__ . '\taxonomy' ) ) :
	function taxonomy() {
		$labels = array(
			'name'                       => __( 'Слайдер', 'textdomain' ),
			'singular_name'              => __( 'Слайдер', 'textdomain' ),
			'search_items'               => __( 'Найти слайдер', 'textdomain' ),
			'popular_items'              => __( 'Популярные слайдеры', 'textdomain' ),
			'all_items'                  => __( 'Все слайдеры', 'textdomain' ),
			'edit_item'                  => __( 'Изменить слайдер', 'textdomain' ),
			'update_item'                => __( 'Обновить слайдер', 'textdomain' ),
			'add_new_item'               => __( 'Добавить новый слайдер', 'textdomain' ),
			'new_item_name'              => __( 'Новое имя слайдера', 'textdomain' ),
			'separate_items_with_commas' => __( 'Введите слайдеры через запятую', 'textdomain' ),
			'add_or_remove_items'        => __( 'Добавить или удалить слайдер', 'textdomain' ),
			'choose_from_most_used'      => __( 'Выберите из популярных', 'textdomain' ),
			'menu_name'                  => __( 'Слайдер', 'textdomain' ),
		);

		register_taxonomy(
			TAXONOMY_NAME,
			NAME,
			array(
				'hierarchical' => false,
				'labels'       => $labels,
				'show_ui'      => true,
				'query_var'    => true,
			)
		);
	}
endif;
