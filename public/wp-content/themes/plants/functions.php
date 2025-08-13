<?php

const TEXT_DOMAIN = 'plants';

if ( ! class_exists( 'Innocode\WPThemeModule\Loader' ) ) {
	wp_die( 'Please install <a href="https://github.com/innocode-digital/wp-theme-module" target="_blank" rel="noopener noreferrer">Theme Module</a> library.' );
}

$loader = new Innocode\WPThemeModule\Loader();
$loader->run();
