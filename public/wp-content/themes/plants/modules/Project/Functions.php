<?php

namespace Module\Project;

use Innocode\WPThemeModule\Abstracts\AbstractFunctions;


/**
 * Class Functions
 *
 * @package Module\Project
 */
class Functions extends AbstractFunctions {

    const POST_TYPE = 'project';
    const POST_TYPE_SLUG = 'projects';
    const PROJECT_CATEGORY = 'project_cat'; 


    /**
     * @return array
     */
    public static function get_general_fields(): array
    {
        return [
            [
                'id'            => 'client',
                'name'          => __( 'Client', 'plants' ),
                'type'          => 'text',

            ],
            [
                'id'            => 'location',
                'name'          => __( 'Location', 'plants' ),
                'type'          => 'text'
            ],
            [
              'name'       => 'Start date',
              'id'         => 'start_date',
              'type'       => 'date',
              'js_options' => [
                  'dateFormat'      => 'yy-mm-dd',
                  'showButtonPanel' => false,
              ],
              'inline'    => false,
              'timestamp' => false,
            ],
            [
              'name'       => 'End date',
              'id'         => 'end_date',
              'type'       => 'date',
              'js_options' => [
                  'dateFormat'      => 'yy-mm-dd',
                  'showButtonPanel' => false,
              ],
              'inline'    => false,
              'timestamp' => false,
            ],
            [
              'id'            => 'price',
              'name'          => __( 'Price', 'plants' ),
              'type'          => 'number'
            ],
        ];
    }

    /**
     * @param $post
     *
     * @return array|null
     */
    public static function prepare_featured_image_for_rest_api( $post ) {
        return get_the_post_thumbnail( $post['id'], 'project' );
    }

    public static function prepare_excerpt_for_rest_api( $post ) {
        return wp_trim_words( get_post_field( 'post_excerpt', $post['id'] ), 15 );
    }

}
