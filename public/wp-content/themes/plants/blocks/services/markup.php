<?php
/**
 * Services block markup
 *
 *
 * @var array    $attributes         Block attributes.
 * @var string   $content            Block content.
 * @var WP_Block $block              Block instance.
 * @var array    $context            Block context.
 */

$ids = [];
if ( ! empty( $attributes['posts'] ) ) {
	foreach ( $attributes['posts'] as $item ) {
		array_push( $ids, $item['id'] );
	}
}
$query = new WP_Query( [
	'post_type'     => 'service',
	'post__in'      => $ids,
] );

?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php if ( $query->have_posts() ) : ?>
		<div class="block-services__container">
			<?php
			foreach ( $query->posts as $item ) {
				$link      = get_permalink( $item->ID );
				$icon_ID_1 = get_post_meta( $item->ID, 'icon_1', true );
				$icon_ID_2 = get_post_meta( $item->ID, 'icon_2', true );
				$image_1   = wp_get_attachment_image( $icon_ID_1, 'service', false, [ 'class' => 'block-services__image-1' ] );
				$image_2   = wp_get_attachment_image( $icon_ID_2, 'service', false, [ 'class' => 'block-services__image-2' ] );
				?>
				<a class="block-services__item" href="<?php echo esc_url( $link ); ?>">
					<div class="block-services__item-wrapper">
						<div>
							<?php if ( $image_1 ) : ?>
								<?php echo $image_1; ?>
							<?php endif; ?>
							<?php if ( $image_2 ) : ?>
								<?php echo $image_2; ?>
							<?php endif; ?>
						</div>
						<div>
							<?php if ( $item->post_title ) : ?>
								<h3 class="block-services__item-title"><?php echo esc_html( $item->post_title ); ?></h3>
							<?php endif; ?>
							<?php if ( $item->post_excerpt ) : ?>
								<p class="block-services__item-text"><?php echo esc_html( $item->post_excerpt ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</a>
				<?php
			} ?>
		</div>
	<?php endif; ?>
</div>
