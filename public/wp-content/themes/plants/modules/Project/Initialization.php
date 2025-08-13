<?php

namespace Module\Project;

use Innocode\WPThemeModule\Abstracts\AbstractInitialization;
use Innocode\WPThemeModule\PostType\PostType;
use Innocode\WPThemeModule\Taxonomy\Taxonomy;
use Module\Theme\Helpers;


/**
 * Class Initialization
 *
 * @package Module\Project
 */
class Initialization extends AbstractInitialization {

	public function get_post_types() : array {
		$post_type           = new PostType( Functions::POST_TYPE );
		$post_type->label    = __( 'Projects', 'plants' );
		$post_type->supports = [
			'title',
			'thumbnail',
			'editor',
			'excerpt',
			'author',
		];

		$post_type->set_labels( Helpers::get_post_type_labels( __( 'Project', 'plants' ), __( 'Projects', 'plants' ) ) );
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

		$tax = new Taxonomy( Functions::PROJECT_CATEGORY, Functions::POST_TYPE );
		$tax->set_labels( [
			'name'              => __( 'Project category', 'plants' ),
			'singular_name'     => __( 'Project category', 'plants' ),
			'search_items'      => __( 'Search Project category', 'plants' ),
			'all_items'         => __( 'All Project categories', 'plants' ),
			'parent_item'       => __( 'Parent Project category', 'plants' ),
			'parent_item_colon' => __( 'Parent Project category:', 'plants' ),
			'edit_item'         => __( 'Edit Project category', 'plants' ),
			'update_item'       => __( 'Update Project category', 'plants' ),
			'add_new_item'      => __( 'Add New Project category', 'plants' ),
			'new_item_name'     => __( 'New Project Name category', 'plants' ),
			'menu_name'         => __( 'Project category', 'plants' ),
		] );
		$tax->hierarchical       = true;
		$tax->show_in_rest       = true;
		$tax->public             = true;
		$tax->show_ui            = true;
		$tax->publicly_queryable = true;
		$tax->show_admin_column  = true;

		return [ $tax ];
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

	public function register_rest_fields() {
		Helpers::register_rest_field(
			Functions::POST_TYPE,
			[
				'image'         => [ 'Module\Project\Functions', 'prepare_featured_image_for_rest_api' ],
				'excerpt_short' => [ 'Module\Project\Functions', 'prepare_excerpt_for_rest_api' ],
			]
		);
    }

}
