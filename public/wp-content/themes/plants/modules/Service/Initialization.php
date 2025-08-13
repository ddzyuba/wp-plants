<?php

namespace Module\Service;

use Innocode\WPThemeModule\Abstracts\AbstractInitialization;
use Innocode\WPThemeModule\PostType\PostType;
use Innocode\WPThemeModule\Taxonomy\Taxonomy;
use Module\Theme\Helpers;


/**
 * Class Initialization
 *
 * @package Module\Service
 */
class Initialization extends AbstractInitialization {

	public function get_post_types() : array {
		$post_type           = new PostType( Functions::POST_TYPE );
		$post_type->label    = __( 'Services', 'plants' );
		$post_type->supports = [
			'title',
			'thumbnail',
			'editor',
			'excerpt',
			'author',
		];

		$post_type->set_labels( Helpers::get_post_type_labels( __( 'Service', 'plants' ), __( 'Services', 'plants' ) ) );
		$post_type->public              = true;
		$post_type->has_archive         = true;
		$post_type->hierarchical        = false;
		$post_type->menu_icon           = 'dashicons-media-spreadsheet';
		$post_type->exclude_from_search = false;
		$post_type->show_in_rest        = true;
		$post_type->show_ui             = true;
		$post_type->set_rewrite(
			[
				'slug'       => Functions::POST_TYPE_SLUG,
				'with_front' => true,
			]
		);

		return [ $post_type ];
	}

	public function get_taxonomies() : array {
		return [];
	}

	public function register_meta_boxes() {
        add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {
            $meta_boxes[] = [
                'id'            => Functions::POST_TYPE . '_general_info',
                'title'         => __( 'General info', 'plants' ),
                'post_types'    => Functions::POST_TYPE,
                'context'       => 'side',
                'fields'        => Functions::get_general_fields()
            ];

            return $meta_boxes;
        } );
    }

}
