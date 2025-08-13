<?php
/**
 * Skill block markup
 *
 *
 * @var array    $attributes         Block attributes.
 * @var string   $content            Block content.
 * @var WP_Block $block              Block instance.
 * @var array    $context            Block context.
 */
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <?php if ( $attributes['title'] && $attributes['skill'] ) : ?>
        <div class="wp-block-skill__text-wrapper" style="width: <?php esc_attr_e( $attributes['skill'] ); ?>%;">
            <div><?php echo esc_html( $attributes['title'] ); ?></div>
            <div><?php echo esc_html( $attributes['skill'] ) . '%'; ?></div>
        </div>
        <div class="wp-block-skill__percentage-wrapper">
            <div class="wp-block-skill__percentage" style="width: <?php esc_attr_e( $attributes['skill'] ); ?>%;"></div>
        </div>
    <?php endif; ?>
</div>
