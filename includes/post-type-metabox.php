<?php

namespace Custom\PostType\Slider;

if ( ! defined( __NAMESPACE__ . '\CUSTOM_META_KEY' ) ) {
	define( __NAMESPACE__ . '\CUSTOM_META_KEY', 'custom_meta' );
}

if ( ! defined( __NAMESPACE__ . '\SAVE_NONCE_NAME' ) ) {
	define( __NAMESPACE__ . '\SAVE_NONCE_NAME', 'nonce_name' );
}

if ( ! function_exists( __NAMESPACE__ . '\metabox' ) ) :
	function metabox( $wp_post ) {
		// Используем nonce для верификации.
		wp_nonce_field( basename( __FILE__ ), SAVE_NONCE_NAME );
		// Значение поля.
		$custom_meta = get_post_meta( $wp_post->ID, CUSTOM_META_KEY, true );

		?>
		<label>
			<p class="label"><?php echo __( 'Description for this field', DOMAIN ); ?></p>
			<input type="text" name="<?php echo esc_attr( CUSTOM_META_KEY ); ?>" value="<?php echo esc_attr( $custom_meta ); ?>" size="25" />
		</label>
		<?php
	}
endif;

if ( ! function_exists( __NAMESPACE__ . '\metabox_save' ) ) :
	function metabox_save( $post_id ) {
		// Проверка безопасности.
		if ( ! isset( $_POST[ SAVE_NONCE_NAME ] ) || ! wp_verify_nonce( wp_unslash( $_POST[ SAVE_NONCE_NAME ] ), basename( __FILE__ ) ) ) {
			return $post_id;
		}
		// Проверка автосохранения.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		// Проверка прав текущего пользователя.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		if ( isset( $_POST[ CUSTOM_META_KEY ] ) ) {
			update_post_meta( $post_id, CUSTOM_META_KEY, sanitize_text_field( wp_unslash( $_POST[ CUSTOM_META_KEY ] ) ) );
		}

		return $post_id;
	}
endif;
