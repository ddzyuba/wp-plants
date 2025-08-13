<?php
/**
 * Project Info block markup
 *
 *
 * @var array    $attributes         Block attributes.
 * @var string   $content            Block content.
 * @var WP_Block $block              Block instance.
 * @var array    $context            Block context.
 */
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <?php if ( $attributes['client'] ) : ?>
        <div class="block-project-info__item">
            <p class="block-project-info__item-heading"><?php _e( 'Client', 'plants' ); ?></p>
            <p class="block-project-info__item-text"><?php esc_html_e( $attributes['client'] ); ?></p>
        </div>
    <?php endif; ?>
    <?php if ( $attributes['location'] ) : ?>
        <div class="block-project-info__item">
            <p class="block-project-info__item-heading"><?php _e( 'Location', 'plants' ); ?></p>
            <p class="block-project-info__item-text"><?php esc_html_e( $attributes['location'] ); ?></p>
        </div>
    <?php endif; ?>
    <?php if ( $attributes['startDate'] ) : ?>
        <div class="block-project-info__item">
            <p class="block-project-info__item-heading"><?php _e( 'Start date', 'plants' ); ?></p>
            <p class="block-project-info__item-text"><?php esc_html_e( $attributes['startDate'] ); ?></p>
        </div>
    <?php endif; ?>
    <?php if ( $attributes['endDate'] ) : ?>
        <div class="block-project-info__item">
            <p class="block-project-info__item-heading"><?php _e( 'Completion date', 'plants' ); ?></p>
            <p class="block-project-info__item-text"><?php esc_html_e( $attributes['endDate'] ); ?></p>
        </div>
    <?php endif; ?>
    <?php if ( $attributes['price'] ) : ?>
        <div class="block-project-info__item">
            <p class="block-project-info__item-heading"><?php _e( 'Price', 'plants' ); ?></p>
            <p class="block-project-info__item-text"><?php esc_html_e( $attributes['price'] ); ?></p>
        </div>
    <?php endif; ?>
</div>
