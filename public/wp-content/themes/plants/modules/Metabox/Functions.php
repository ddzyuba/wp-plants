<?php

namespace Module\Metabox;

use Innocode\WPThemeModule\Abstracts\AbstractFunctions;

/**
 * Class Functions
 *
 * @package Module\Metabox
 */
class Functions extends AbstractFunctions {

    const GOALS_PAGE = 'goals';

    /**
     * @return array
     */
    public static function get_homepage_hero_settings(): array {
        return [
            [
                'id'                => 'heading',
                'name'              => __( 'Heading', 'antiloop' ),
                'type'              => 'text',
            ],
            [
                'id'                => 'subheading',
                'name'              => __( 'Desktop Sub-Heading', 'antiloop' ),
                'type'              => 'textarea',
            ],
            [
                'id'                => 'subheading-mob',
                'name'              => __( 'Mobile Sub-Heading', 'antiloop' ),
                'type'              => 'textarea',
                'label_description' => __( 'Recommended maximum 130 symbols.', 'antiloop' ),
            ],
            [
                'id'                => 'links',
                'name'              => __( 'Links', 'antiloop' ),
                'type'              => 'group',
                'clone'             => true,
                'group_title'       => __( 'Link {#}', 'antiloop' ),
                'collapsible'       => true,
                'max_clone'         => 2,
                'default_state'     => 'collapsed',
                'fields'            => [
                    [
                        'id'   => 'text',
                        'name' => __( 'Button text', 'antiloop' ),
                        'type' => 'text',
                    ],
                    [
                        'id'      => 'url_type',
                        'name'    => __( 'URL type', 'antiloop' ),
                        'type'    => 'select',
                        'options' => [
                            'external' => __( 'External', 'antiloop' ),
                            'internal' => __( 'Internal', 'antiloop' )
                        ]
                    ],
                    [
                        'id'      => 'external_url',
                        'name'    => __( 'External URL', 'antiloop' ),
                        'type'    => 'url',
                        'visible' => [ 'url_type', 'external' ]
                    ],
                    [
                        'id'         => 'internal_url_id',
                        'name'       => __( 'Internal URL', 'antiloop' ),
                        'type'       => 'post',
                        'post_type'  => ['page', 'lesson', 'post'],
                        'ajax'       => true,
                        'query_args' => [
                            'posts_per_page' => 10,
                        ],
                        'js_options' => [
                            'minimumInputLength' => 1,
                        ],
                        'visible'    => [ 'url_type', 'internal' ]
                    ],
                ],
            ],
            
        ];
    }

    /**
     * @return array
     */
    public static function get_goals_page_hero_settings(): array {
        return [
            [
                'id'                => 'heading',
                'name'              => __( 'Heading', 'antiloop' ),
                'type'              => 'text',
            ],
            [
                'id'                => 'subheading',
                'name'              => __( 'Sub-Heading', 'antiloop' ),
                'type'              => 'textarea',
            ],
        ];
    }

    /**
     * 
     * @return bool
     */
    public static function is_front_page_callback(): bool {
        if ( ! is_admin() ) {
            return false;
        }

        if ( ! isset( $_GET['post'] ) ) {
            return false;
        }
        $post_id = (int) $_GET['post'];

        if ( ! $post_id ) {
            return false;
        }

        $front_pade_id =  (int) get_option( 'page_on_front' );

        if ( $post_id === $front_pade_id ) {
            return true;
        }        

        return false;
    }
}