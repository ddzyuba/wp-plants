<?php
/**
 * Class Helpers
 *
 * @package modules\theme
 */

namespace Module\Theme;

class Helpers {

    /**
	 * @param string $label
	 * @param string $plural_label
	 * @param array $custom_labels
	 *
	 * @return array
	 */
	public static function get_post_type_labels( string $label, string $plural_label = '', array $custom_labels = [] ) : array {
		$singular_name  = mb_convert_case( $label, MB_CASE_TITLE, 'UTF-8' );
		$plural_name    = $plural_label ? mb_convert_case( $plural_label, MB_CASE_TITLE, 'UTF-8' ) : $label;
		$default_labels = [
			'name'               => $plural_name,
			'singular_name'      => $singular_name,
			'add_new'            => __( 'Add New', 'plants' ),
			/* translators: %s: singular name */
			'add_new_item'       => sprintf( __( 'Add New %s', 'plants' ), $singular_name ),
			/* translators: %s: singular name */
			'edit_item'          => sprintf( __( 'Edit %s', 'plants' ), $singular_name ),
			/* translators: %s: singular name */
			'new_item'           => sprintf( __( 'New %s', 'plants' ), $singular_name ),
			/* translators: %s: plural name */
			'all_items'          => sprintf( __( 'All %s', 'plants' ), $plural_name ),
			/* translators: %s: singular name */
			'view_item'          => sprintf( __( 'View %s', 'plants' ), $singular_name ),
			/* translators: %s: singular name */
			'search_items'       => sprintf( __( 'Search %s', 'plants' ), $plural_name ),
			/* translators: %s: plural name */
			'not_found'          => sprintf( __( 'No %s found', 'plants' ), $plural_name ),
			/* translators: %s: plural name */
			'not_found_in_trash' => sprintf( __( 'No %s found in Trash', 'plants' ), $plural_name ),
			'parent_item_colon'  => null,
			'menu_name'          => $plural_name,
		];

		return wp_parse_args( $custom_labels, $default_labels );
	}

	/**
     * @param string $object
     * @param array  $fields
     */
    public static function register_rest_field( string $object, array $fields ): void
    {
        foreach ( $fields as $field => $function ) {
            register_rest_field( $object,
                $field,
                [
                    'get_callback'  => $function
                ]
            );
        }
    }

	/**
	 * @param string $field_id
	 * @param array $args
	 *
	 * @return mixed|null
	 */
	public static function mb_get_block_field( string $field_id, array $args = [] ) {
		if ( function_exists( 'mb_get_block_field' ) ) {
			return mb_get_block_field( $field_id, $args );
		}

		return null;
	}

	/**
	 * @param string $field_id
	 * @param array $args
	 * @param integer|null $post_id
	 *
	 * @return mixed|null
	 */
	public static function get_rwmb_meta( string $field_id, array $args = [], $post_id = null ) {
		if ( function_exists( 'rwmb_meta' ) ) {
			return rwmb_meta( $field_id, $args, $post_id );
		}

		return null;
	}

	/**
	 * @param string $field_id
	 * @param string $opt_page_slug
	 *
	 * @return mixed|null
	 */
	public static function get_rwmb_option( string $field_id, string $opt_page_slug ) {

		return self::get_rwmb_meta( $field_id, [ 'object_type' => 'setting' ], $opt_page_slug );
	}

	/**
	 * Create numeric pagination.
	 *
	 * @param int    $pages_of_posts Number of posts in WP Query.
	 * @param int    $paged          Page number from WP Query.
	 * @param string $slug           Page slug
	 * @return void                  Outputs HTML.
	 */
	public static function render_pagination( $pages_of_posts, $paged, $slug ) {

		if ( $pages_of_posts > 1 ) {
			$site_url = get_bloginfo( 'url' );
			?>
			<div class="pagination">
				<ul class="pagination__list">

				<?php if ( ( $paged - 1 ) > 1 ) : // generate a link to one page back if it exists ?>
					<?php $newer = $paged - 1; ?>
					<li class="pagination__newer-arrow">
						<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $newer . '/' ); ?>"><?php esc_html_e( '←', 'plants' ); ?></a>
					</li>
				<?php elseif ( ( $paged - 1 ) === 1 ) : ?>
					<?php $newer = $paged - 1; ?>
					<li class="pagination__newer-arrow">
						<a href="<?php echo esc_url( $site_url . '/' . $slug . '/' ); ?>"><?php esc_html_e( '←', 'plants' ); ?></a>
					</li>
				<?php endif; ?>

				<?php if ( ( $paged - 2 ) > 1 ) : // generate a link to two pages back if it exists ?>
					<?php $newer = $paged - 2; ?>
					<li class="pagination__newer-2">
						<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $newer . '/' ); ?>">
							<?php echo esc_html( $newer ); ?>
						</a>
					</li>
				<?php elseif ( ( $paged - 2 ) === 1 ) : ?>
					<?php $newer = $paged - 2; ?>
					<li class="pagination__newer-2">
						<a href="<?php echo esc_url( $site_url . '/' . $slug . '/' ); ?>">
							<?php echo esc_html( $newer ); ?>
						</a>
					</li>
				<?php endif; ?>

				<?php if ( ( $paged - 1 ) > 1 ) : // generate a link to one page back if it exists ?>
					<?php $newer = $paged - 1; ?>
					<li class="pagination__newer">
						<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $newer . '/' ); ?>">
							<?php echo esc_html( $newer ); ?>
						</a>
					</li>
				<?php elseif ( ( $paged - 1 ) === 1 ) : ?>
					<?php $newer = $paged - 1; ?>
					<li class="pagination__newer">
						<a href="<?php echo esc_url( $site_url . '/' . $slug . '/' ); ?>">
							<?php echo esc_html( $newer ); ?>
						</a>
					</li>
				<?php endif; ?>

					<li class="pagination__current">
						<?php echo esc_html( $paged ); // a holder for the current page ?>
					</li>

				<?php if ( ( $paged + 1 ) < $pages_of_posts ) : // generate a link to one page ahead if it exists ?>
					<?php $older = $paged + 1; ?>
					<li class="pagination__older">
						<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $older . '/' ); ?>">
							<?php echo esc_html( $older ); ?>
						</a>
					</li>
				<?php endif; ?>

				<?php if ( ( $paged + 2 ) <= $pages_of_posts ) : // generate a link to two pages ahead if it exists ?>
					<?php $older = $paged + 2; ?>
					<li class="pagination__older-2">
						<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $older . '/' ); ?>">
							<?php echo esc_html( $older ); ?>
						</a>
					</li>
				<?php endif; ?>

				<?php if ( ( $paged + 1 ) <= $pages_of_posts ) : // generate a link to one page ahead if it exists ?>
					<?php $older = $paged + 1; ?>
					<li class="pagination__older-arrow">
						<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $older . '/' ); ?>"><?php esc_html_e( '→', 'plants' ); ?></a>
					</li>
				<?php endif; ?>
				</ul>
			</div>
			<?php
		}
	}

	
}