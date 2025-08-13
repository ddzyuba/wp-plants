<?php
/**
 * Testimonials block markup
 *
 *
 * @var array    $attributes         Block attributes.
 * @var string   $content            Block content.
 * @var WP_Block $block              Block instance.
 * @var array    $context            Block context.
 */

?>
<section <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="block-testimonials__container">
		<?php if ( $attributes['title'] ) : ?>
			<h2 class="block-testimonials__title has-dark-color ">
				<?php echo wp_kses_post( $attributes['title'] ); ?>
			</h2>
		<?php endif; ?>
		<div class="block-testimonials__wrapper-top">
			<?php if ( $attributes['text'] ) : ?>
				<p class="block-testimonials__text has-gray-color">
					<?php echo wp_kses_post( $attributes['text'] ); ?>
				</p>
			<?php endif; ?>
			<?php if ( isset( $attributes['details'] ) && ! empty( $attributes['details'] ) ) : ?>
				<div class="block-testimonials__pagination">
					<button class="swiper-button-prev"></button>
					<button class="swiper-button-next"></button>
				</div>
			<?php endif; ?>
		</div>
		<?php if ( isset( $attributes['details'] ) && ! empty( $attributes['details'] ) ) : ?>
			<div class="swiper">
				<div class="swiper-wrapper">
					<?php foreach ( $attributes['details'] as $item ) : ?>
						<div class="swiper-slide">
							<div class="block-testimonials__item">
								<?php
								if ( $item['attachmentId'] ) {
									echo wp_get_attachment_image( 
										$item['attachmentId'], 
										'testimonial', 
										[ 'class' => 'block-testimonials__item-image' ] 
									);
								}
								?>
								<div class="block-testimonials__item-text-wrapper">
									<?php if ( $item['text'] ) : ?>
										<p 
											class="block-testimonials__item-text"
										><?php echo wp_kses_post( $item['text'] ); ?></p>
									<?php endif; ?>
									<?php if ( $item['name'] ) : ?>
										<p 
											class="block-testimonials__item-name"
										><?php echo wp_kses_post( $item['name'] ); ?></p>
									<?php endif; ?>
									<?php if ( $item['job'] ) : ?>
										<p 
											class="block-testimonials__item-job"
										><?php echo wp_kses_post( $item['job'] ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
