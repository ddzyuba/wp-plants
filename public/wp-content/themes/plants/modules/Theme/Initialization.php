<?php

namespace Module\Theme;

use Innocode\WPThemeAssets;
use Innocode\WPThemeModule\Abstracts\AbstractThemeInitialization;

/**
 * Class Initialization
 *
 * @package Module\Theme
 */
class Initialization extends AbstractThemeInitialization {

	/**
	 * @return array
	 */
	public function get_image_sizes(): array {
		return [
			'project'              => [ 330, 225, true ],
			'service'              => [ 70, 70, true ],
			'testimonial'          => [ 190, 275, true ],
		];
	}

	/**
	 * @return array
	 */
	public function get_nav_menus_locations(): array {
		return [];
	}

	/**
	 * @return void
	 */
	public function enqueue_styles(): void {
		WPThemeAssets\Queue::add_style( 'theme-screen', 'css/screen.css' );
		WPThemeAssets\Queue::add_style(
			'theme-print',
			'css/print.css',
			[],
			'print'
		);
	}

	/**
	 * @return void
	 */
	public function enqueue_scripts(): void {
		foreach ( [
			'vendor',
			'common',
			'main',
		] as $handle ) {
			// We add 'defer' attribute, so no need to load script in footer.
			// Probably browser can load it faster if it will be placed in header with 'defer'.
			WPThemeAssets\Queue::add_script(
				"theme-$handle",
				"js/$handle.js"
			);
		}

		wp_localize_script( 'theme-main', 'siteData', [
			'siteUrl'      => get_bloginfo( 'url' )
		] );

		wp_register_style( 
			'swiper-bundle', 
			get_theme_file_uri( 'assets/src/css/swiper-bundle.css' ), 
			[], 
			'11.2.10' 
		);
	}

	/**
	 * @return void
	 */
	public function add_action_admin_init(): void {
		add_editor_style( WPThemeAssets\Helpers::url( 'css/editor.css' ) );
	}

	/**
	 * @return void
	 */
	public function add_action_admin_enqueue_scripts(): void {
		WPThemeAssets\Queue::add_style( 'theme-admin', 'css/admin.css' );
	}

	/**
	 * @return void
	 */
	public function add_action_login_enqueue_scripts(): void {
		WPThemeAssets\Queue::add_style( 'theme-login', 'css/login.css' );
	}

	/**
	 * @return void
	 */
	public function add_action_wp_body_open(): void {
		WPThemeAssets\Helpers::template( 'sprite.svg' );
	}

	/**
	 * @return void
	 */
	public function add_action_wp_footer(): void {
		get_template_part( 'partials/no-js' );
	}

	/**
	 * @return array
	 */
	public function add_filter_focal_previews_sizes(): array {
		return array_keys( $this->get_image_sizes() );
	}

	/**
	 * @return array
	 */
	public function add_filter_innocode_critical_css_styles(): array {
		return [
			'theme-screen',
		];
	}

	/**
	 * @param string $stylesheet
	 *
	 * @return string
	 */
	public function add_filter_innocode_critical_css_stylesheet( string $stylesheet ): string {
		// @TODO: fix url
		$stylesheet = str_replace(
			'../fonts/',
			WPThemeAssets\Helpers::url( '/build/fonts/' ),
			$stylesheet
		);

		return function_exists( 'get_cloudfront_attachment_url' )
			? get_cloudfront_attachment_url( $stylesheet, true )
			: $stylesheet;
	}

	/**
	 * @return array
	 */
	public function add_filter_deferred_loading_styles(): array {
		return [
			'dashicons',
			'wp-block-library',
		];
	}

	/**
	 * @return void
	 */
	public function add_action_innocode_critical_css_printed(): void {
		add_filter(
			'deferred_loading_styles',
			function () {
				return [
					'theme-screen',
				];
			}
		);
	}

	/**
	 * @return array|string
	 */
	public function add_filter_deferred_loading_scripts() {
		return '*';
	}

	/**
	 * @return void
	 */
	public function register_block_categories() {
		add_filter( 'block_categories_all', 
			function ( $categories, $post ) {
				
				array_unshift( $categories, array(
					'slug'	=> 'plants-theme',
					'title' => 'Plants Theme'
				) );

				return $categories;
			}, 
			10, 
			2
		);
		
	}

	/**
	 * @return void
	 */
	public function register_pattern_category() {
		add_action( 'init', function() {
			register_block_pattern_category(
				'plants-theme',
				[ 'label' => __( 'Plants theme', 'plants' ) ]
			);
		} );
	}

	/**
	 * @return void
	 */
	public function register_theme_block_styles() {
		add_action( 'init', function() {
			register_block_style(
		        'core/button',
		        array(
		            'name'         => 'call-us',
		            'label'        => __( 'Call Us', 'plants' ),
		            'inline_style' => '
		                .is-style-call-us > a {
							line-height: 1;
		                    padding: 15.5px 35px 15.5px 70px;
		                }
		            ',
		        )
	    	);
			register_block_style(
		        'core/column',
		        [
		            'name'         => 'home-hero-column-1',
		            'label'        => 'Home Hero Column 1',
		            'style_handle' => 'theme-screen'
		        ]
		    );
		} );
	}

	/**
	 * @return void
	 */
	public function register_rewrite_rules() {
		add_action( 'init', function() {
			add_rewrite_rule(
		        '^(.+?)/filter/(.+)/page/([0-9]+)/?$',
		        'index.php?pagename=$matches[1]&filter=$matches[2]&paged=$matches[3]',
		        'top'
		    );

			add_rewrite_rule(
		        '^(.+?)/filter/([^/]+)/?$',
		        'index.php?pagename=$matches[1]&filter=$matches[2]',
		        'top'
		    );
		} );

		add_filter( 'query_vars', function( $query_vars ) {
		    $query_vars[] = 'filter';
			$query_vars[] = 'paged';
		    return $query_vars;
		} );
	}

	/**
	 * @return void
	 */
	public function register_theme_blocks() {
		add_action( 'init', function() {
			$build_dir = get_theme_file_path( 'assets/build/blocks' );

			foreach ( scandir( $build_dir ) as $block ) {
				if ( $block === '.' || $block === '..' ) {
					continue;
				}

				$block_json = "$build_dir/$block/block.json";

				if ( file_exists( $block_json ) ) {
					register_block_type( $block_json );
				}
			}
		} );
	}

	/**
	 * @return void
	 */
	public function register_after_setup_theme() {
		add_action( 'after_setup_theme', function() {
			add_theme_support( 'block-template-parts' );
		} );
	}
}
