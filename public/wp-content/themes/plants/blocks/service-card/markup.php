<?php
/**
 * the $content is the html generated from innerBlocks
 * it is being created from the save method in JS or the render_callback
 * in php and is sanitized.
 *
 * Re sanitizing it through `wp_kses_post` causes
 * embed blocks to break and other core filters don't apply.
 * therefore no additional sanitization is done and it is being output as is
 */

?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <?php echo $content; // phpcs:disable ?>
    <?php if ( isset( $attributes['link'], $attributes['title'] ) ) : ?>
        <a 
            class="block-service-card__link"
            href="<?php echo esc_url( $attributes['link'] ); ?>">
            <span class="screen-reader-text"><?php esc_html_e( $attributes['title'] ); ?></span>
        </a>
    <?php endif; ?>
</div>
