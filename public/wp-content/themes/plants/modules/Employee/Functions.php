<?php

namespace Module\Employee;

use Innocode\WPThemeModule\Abstracts\AbstractFunctions;


/**
 * Class Functions
 *
 * @package Module\Employee
 */
class Functions extends AbstractFunctions {

	const POST_TYPE = 'employee';
	const POST_TYPE_SLUG = 'employees';

    /**
     * @return array
     */
    public static function get_general_fields(): array
    {
        return [
            [
                'id'            => 'job',
                'name'          => __( 'Job', 'plants' ),
                'type'          => 'text',
            ],
            [
                'id'            => 'linkedin',
                'name'          => __( 'Linkedin', 'plants' ),
                'type'          => 'url'
            ],
            [
                'id'            => 'facebook',
                'name'          => __( 'Facebook', 'plants' ),
                'type'          => 'url'
            ],
            [
                'id'            => 'twitter',
                'name'          => __( 'Twitter', 'plants' ),
                'type'          => 'url'
            ],
        ];
    }

}
