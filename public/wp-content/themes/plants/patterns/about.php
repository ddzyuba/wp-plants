<?php
/**
 * Title: About
 * Slug: plants/about
 * Categories: plants-theme
 *
 */

?>

<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"100px"}}},"layout":{"type":"default"}} -->
<section class="wp-block-group" style="margin-top:100px;padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","wideSize":"1408px"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/why-choose-us.png" alt="" /></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:group {"className":"group-in-column-no-side-padding-mobile","style":{"spacing":{"padding":{"bottom":"45px","left":"30px","top":"45px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group group-in-column-no-side-padding-mobile" style="padding-top:45px;padding-bottom:45px;padding-left:30px"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark"} -->
<h2 class="wp-block-heading has-dark-color has-text-color has-link-color"><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-green-color"><?php _e( '25+ Years of Experience', 'plants' ); ?></mark>&nbsp;<?php _e( 'in Gardening and Landscaping', 'plants' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray"}}}},"textColor":"gray"} -->
<p class="has-gray-color has-text-color has-link-color"><?php _e( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60","margin":{"top":"50px"}}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":null}} -->
<div class="wp-block-group" style="margin-top:50px"><!-- wp:media-text {"mediaLink":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/small-details-1.png","mediaType":"image","mediaWidth":20,"isStackedOnMobile":false,"style":{"layout":{"columnSpan":1,"rowSpan":1}}} -->
<div class="wp-block-media-text" style="grid-template-columns:20% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/small-details-1.png" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"Content…","fontSize":"medium"} -->
<p class="has-medium-font-size"><strong><?php _e( 'Our Mission', 'plants' ); ?></strong></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:media-text -->

<!-- wp:media-text {"mediaLink":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/small-details-2.png","mediaType":"image","mediaWidth":20,"isStackedOnMobile":false} -->
<div class="wp-block-media-text" style="grid-template-columns:20% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/small-details-2.png" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"Content…","style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"medium"} -->
<p class="has-dark-color has-text-color has-link-color has-medium-font-size"><strong><?php _e( 'Our Vision', 'plants' ); ?></strong></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:media-text -->

<!-- wp:media-text {"mediaLink":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/small-details-3.png","mediaType":"image","mediaWidth":20,"isStackedOnMobile":false} -->
<div class="wp-block-media-text" style="grid-template-columns:20% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/small-details-3.png" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"Content…","style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"medium"} -->
<p class="has-dark-color has-text-color has-link-color has-medium-font-size"><strong><?php _e( 'Support Team', 'plants' ); ?></strong></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:media-text -->

<!-- wp:media-text {"mediaLink":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/small-details-4.png","mediaType":"image","mediaWidth":20,"isStackedOnMobile":false} -->
<div class="wp-block-media-text" style="grid-template-columns:20% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/small-details-4.png" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"Content…","style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"medium"} -->
<p class="has-dark-color has-text-color has-link-color has-medium-font-size"><strong><?php _e( 'Clients Trust', 'plants' ); ?></strong></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:media-text --></div>

<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"50px"}}}} -->
<div class="wp-block-buttons" style="margin-top:50px"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( get_bloginfo( 'url' ) . '/contact/' ); ?>"><?php _e( 'Get a Quote', 'plants' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->