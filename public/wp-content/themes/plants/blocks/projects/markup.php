<?php
/**
 * Projects block markup
 *
 *
 * @var array    $attributes         Block attributes.
 * @var string   $content            Block content.
 * @var WP_Block $block              Block instance.
 * @var array    $context            Block context.
 */

global $post;

$new_paged      = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$filter         = get_query_var( 'filter' );
$taxonomy       = 'project_cat';
$categories     = get_categories( [ 'taxonomy' => $taxonomy ] );

$args = [
	'post_type'      => 'project',
	'posts_per_page' => 4,
	'post_status'    => 'publish',
	'paged'          => $new_paged
];

if ( $filter ) {
	$args['tax_query'] = [
		[
			'taxonomy' => $taxonomy,
			'field'    => 'slug',
			'terms'    => $filter,
		]
	];
}

$query = new WP_Query( $args );

$pages_of_posts = (int) $query->max_num_pages;

$pagination_slug = $filter === '' ? $post->post_name : "$post->post_name/filter/$filter";

?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php if ( ! empty( $categories ) ) : ?>
		<div class="block-projects__filters">
			<button 
				class="block-projects__filter-button <?php esc_attr_e( $filter === '' ? 'active' : '' ); ?>"
				type="button" 
				data-slug="<?php esc_attr_e( 'all' ); ?>"
				data-id="<?php esc_attr_e( '0' ); ?>"
				aria-pressed="<?php esc_attr_e( 'true' ); ?>"
			><?php _e( 'All', 'plants' ); ?></button>
			<?php foreach ( $categories as $item ) : ?>
				<button 
					class="block-projects__filter-button <?php esc_attr_e( $filter === $item->slug ? 'active' : '' ); ?>"
					type="button" 
					data-slug="<?php esc_attr_e( $item->slug ); ?>"
					data-id="<?php esc_attr_e( $item->term_id ); ?>"
					aria-pressed="<?php esc_attr_e( 'false' ); ?>"
				><?php esc_html_e( $item->name ); ?></button>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<?php if ( $query->have_posts() ) : ?>
		<div class="block-projects__projects">
			<?php while ( $query->have_posts() ) : ?>
				<?php $query->the_post(); ?>
				<div class="block-projects__item">
					<?php the_post_thumbnail( 'project' ); ?>
					<div class="block-projects__item-text">
						<a 
							href="<?php echo esc_url( get_post_permalink() ); ?>"
							class="block-projects__item-title"
						><?php esc_html_e( get_the_title() ); ?></a>
						<div 
							class="block-projects__item-excerpt"
						><?php echo wp_kses_post( get_the_excerpt() ); ?></div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); ?>
		<div class="block-projects__pagination" data-page-slug="<?php esc_attr_e( $post->post_name ); ?>">
			<?php \Module\Theme\Helpers::render_pagination( $pages_of_posts, $new_paged, $pagination_slug ); ?>
		</div>
	<?php endif; ?>
</div>
