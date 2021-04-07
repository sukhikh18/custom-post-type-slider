<?php
/**
 * Plugin Name: Произвольный тип записи на примере слайдера
 * Plugin URI: https://github.com/nikolays93/custom-post-type-slider
 * Description: Пример кода реализующего регистрацию собственного типа записи и новую таксономию.
 * Version: 0.1.0
 * Author: NikolayS93
 * Author URI: https://vk.com/nikolays_93
 * Author EMAIL: NikolayS93@ya.ru
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: custom-post-type-slider
 * Domain Path: /languages/
 *
 * @package custom.post-type.slider
 */

namespace Custom\PostType\Slider;

defined( 'ABSPATH' ) || exit( 'You shall not pass' );

// Plugin top doc properties.
$plugin_data = get_plugin_data( __FILE__ );

if ( ! defined( __NAMESPACE__ . '\PLUGIN_DIR' ) ) {
	define( __NAMESPACE__ . '\PLUGIN_DIR', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );
}

if ( ! defined( __NAMESPACE__ . '\DOMAIN' ) ) {
	define( __NAMESPACE__ . '\DOMAIN', $plugin_data['TextDomain'] );
}

if ( ! defined( __NAMESPACE__ . '\TAXONOMY_NAME' ) ) {
	define( __NAMESPACE__ . '\TAXONOMY_NAME', 'slider' );
}

if ( ! defined( __NAMESPACE__ . '\NAME' ) ) {
	define( __NAMESPACE__ . '\NAME', 'slide' );
}

// load plugin languages.
load_plugin_textdomain( DOMAIN, false, basename( PLUGIN_DIR ) . $plugin_data['DomainPath'] );

require_once ABSPATH . 'wp-admin/includes/plugin.php';
require PLUGIN_DIR . 'includes/post-type.php';
require PLUGIN_DIR . 'includes/post-type-metabox.php';
require PLUGIN_DIR . 'includes/taxonomy.php';
require PLUGIN_DIR . 'includes/admin/sort-menu-items.php';

// Зарегистрировать тип записи.
add_action( 'init', __NAMESPACE__ . '\post_type', 10, 1 );
// Зарегистрировать мета бокс который показывается при добавлении/редактировании записи типа слайд.
add_action(
	'add_meta_boxes',
	function() {
		add_meta_box( 'custom_slider_metabox', __( 'Custom post meta data', 'textdomain' ), __NAMESPACE__ . '\metabox', __NAMESPACE__ . '\NAME', 'advanced', 'high' );
	}
);
// Сохранять данные формы в мета боксе.
add_action( 'save_post', __NAMESPACE__ . '\metabox_save' );
// Зарегистрировать таксономию слайдер.
add_action( 'init', __NAMESPACE__ . '\taxonomy' );

// Изменить порядок меню, поставить "слайдер" главным меню.
add_action( 'admin_menu', __NAMESPACE__ . '\Admin\sort_menu_items', 99 );
