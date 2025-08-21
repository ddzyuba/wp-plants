<?php
/**
 * Title: Staff
 * Slug: plants/staff
 * Categories: plants-theme
 *
 */

?>

<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"100px"}}},"layout":{"type":"default"}} -->
<section class="wp-block-group" style="margin-top:100px;padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","wideSize":"1408px"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark"} -->
<h2 class="wp-block-heading has-dark-color has-text-color has-link-color"><?php _e( 'Our', 'plants' ); ?> <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-green-color"><?php _e( 'Trained Staff', 'plants' ); ?></mark></h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"75%"} -->
<div class="wp-block-column" style="flex-basis:75%"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray"}}}},"textColor":"gray"} -->
<p class="has-gray-color has-text-color has-link-color"><?php _e( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'plants' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( get_bloginfo( 'url' ) . '/contact/' ); ?>"><?php _e( 'Get a Quote', 'plants' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"staff","style":{"spacing":{"margin":{"top":"50px"},"blockGap":"30px"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":null}} -->
<div class="wp-block-group staff" style="margin-top:50px"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/team-1.png","isUserOverlayColor":true,"gradient":"plants-gradient-1","contentPosition":"bottom center","sizeSlug":"full","className":"staff__item","style":{"color":{"duotone":"unset"},"border":{"radius":"10px"},"spacing":{"padding":{"top":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center staff__item" style="border-radius:10px;padding-top:0"><img class="wp-block-cover__image-background size-full" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/team-1.png" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-plants-gradient-1-gradient-background"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"0"}}},"textColor":"white","fontSize":"medium"} -->
<p class="has-text-align-center has-white-color has-text-color has-link-color has-medium-font-size" style="padding-top:0"><?php _e( 'Full name', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"margin":{"top":"5px"}}},"textColor":"white","fontSize":"small"} -->
<p class="has-text-align-center has-white-color has-text-color has-link-color has-small-font-size" style="margin-top:5px"><?php _e( 'Design Expert', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"staff__social-links","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group staff__social-links"><!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://facebook.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/facebook.svg" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://twitter.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/twitter.svg" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://linkedin.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/linkedin.svg" alt="" /></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/team-2.png","isUserOverlayColor":true,"gradient":"plants-gradient-1","contentPosition":"bottom center","sizeSlug":"full","className":"staff__item","style":{"border":{"radius":"10px"}},"layout":{"type":"default"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center staff__item" style="border-radius:10px"><img class="wp-block-cover__image-background size-full" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/team-2.png" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-plants-gradient-1-gradient-background"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size"><?php _e( 'Full name', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"5px"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:5px"><?php _e( 'Design Expert', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"staff__social-links","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group staff__social-links"><!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://facebook.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/facebook.svg" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://twitter.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/twitter.svg" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://linkedin.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/linkedin.svg" alt="" /></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/team-3.png","isUserOverlayColor":true,"gradient":"plants-gradient-1","contentPosition":"bottom center","sizeSlug":"full","className":"staff__item","style":{"border":{"radius":"10px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center staff__item" style="border-radius:10px"><img class="wp-block-cover__image-background size-full" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/team-3.png" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-plants-gradient-1-gradient-background"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size"><?php _e( 'Full name', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"5px"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:5px"><?php _e( 'Design Expert', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"staff__social-links","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group staff__social-links"><!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://facebook.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/facebook.svg" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://twitter.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/twitter.svg" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://linkedin.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/linkedin.svg" alt="" /></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/team-4.png","isUserOverlayColor":true,"gradient":"plants-gradient-1","contentPosition":"bottom center","sizeSlug":"full","className":"staff__item","style":{"border":{"radius":"10px"}},"layout":{"type":"default"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center staff__item" style="border-radius:10px"><img class="wp-block-cover__image-background size-full" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/team-4.png" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-plants-gradient-1-gradient-background"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","fontSize":"medium"} -->
<p class="has-text-align-center has-white-color has-text-color has-link-color has-medium-font-size"><?php _e( 'Full name', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"margin":{"top":"5px"}}},"textColor":"white"} -->
<p class="has-text-align-center has-white-color has-text-color has-link-color" style="margin-top:5px"><?php _e( 'Design Expert', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"staff__social-links","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group staff__social-links"><!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://facebook.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/facebook.svg" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://twitter.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/twitter.svg" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large"><a href="https://linkedin.com" target="_blank" rel=" noreferrer noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/linkedin.svg" alt="" /></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->