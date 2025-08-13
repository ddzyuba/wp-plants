<?php

namespace Module\Service;

use Innocode\WPThemeModule\Abstracts\AbstractFunctions;


/**
 * Class Functions
 *
 * @package Module\Service
 */
class Functions extends AbstractFunctions {

  	const POST_TYPE = 'service';
  	const POST_TYPE_SLUG = 'services';


    /**
     * @return array
     */
    public static function get_general_fields(): array
    {
        return [
            [
                'id'            => 'icon_1',
                'name'          => __( 'Icon 1', 'plants' ),
                'type'          => 'single_image',
            ],
            [
              'id'            => 'icon_2',
              'name'          => __( 'Icon 2', 'plants' ),
              'type'          => 'single_image',
            ],
        ];
    }

}
