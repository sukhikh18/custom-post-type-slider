<?php
/**
 * Меняем местами ссылки на таксономию и тип записи (что бы при нажатии на меню слайды открывались слайдеры (категории))
 *
 * @package custom.post-type.slider
 */

namespace Custom\PostType\Slider\Admin;

use \Custom\PostType;

if ( ! function_exists( __NAMESPACE__ . '\sort_menu_items' ) ) :
	function sort_menu_items() {
		global $menu, $submenu;

		if ( isset( $submenu[ 'edit.php?post_type=' . PostType\Slider\NAME ] ) ) {
			$last_submenu_item = array_pop( $submenu[ 'edit.php?post_type=' . PostType\Slider\NAME ] );
			array_unshift( $submenu[ 'edit.php?post_type=' . PostType\Slider\NAME ], $last_submenu_item );
		}
	}
endif;
