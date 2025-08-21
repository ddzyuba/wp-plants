<?php
/**
 * Title: Why Choose Us
 * Slug: plants/why-choose-us
 * Categories: plants-theme
 *
 */

?>

<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"100px"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"dark-green","textColor":"white","layout":{"type":"default"}} -->
<section class="wp-block-group has-white-color has-dark-green-background-color has-text-color has-background has-link-color" style="margin-top:100px;padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","bottom":"100px"}}},"layout":{"type":"constrained","wideSize":"1408px"}} -->
<div class="wp-block-group" style="padding-top:100px;padding-bottom:100px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php _e( 'Why Choose Us', 'plants' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php _e( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":null}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"className":"why-choose-us__paragraph","fontSize":"medium"} -->
<p class="why-choose-us__paragraph has-medium-font-size"><img style="width: 30px;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/tick.png" alt="<?php _e( 'Icon for checkmark', 'plants' ); ?>"><?php _e( 'Proper Take Care', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"why-choose-us__paragraph","style":{"layout":{"columnSpan":1,"rowSpan":1}},"fontSize":"medium"} -->
<p class="why-choose-us__paragraph has-medium-font-size"><img style="width: 30px;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/tick.png" alt="<?php _e( 'Icon for checkmark', 'plants' ); ?>"><?php _e( 'Expert Farmer', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"why-choose-us__paragraph","style":{"layout":{"columnSpan":1,"rowSpan":1}},"fontSize":"medium"} -->
<p class="why-choose-us__paragraph has-medium-font-size"><img style="width: 30px;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/tick.png" alt="<?php _e( 'Icon for checkmark', 'plants' ); ?>"><?php _e( 'Clean Working', 'plants' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"why-choose-us__paragraph","fontSize":"medium"} -->
<p class="why-choose-us__paragraph has-medium-font-size"><img style="width: 30px;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/tick.png" alt="<?php _e( 'Icon for checkmark', 'plants' ); ?>"><?php _e( 'Home Gardening', 'plants' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( get_bloginfo( 'url' ) . '/contact/' ); ?>"><?php _e( 'Get a Quote', 'plants' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/why-choose-us.png" alt="<?php _e( 'Photo', 'plants' ); ?>" /></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->