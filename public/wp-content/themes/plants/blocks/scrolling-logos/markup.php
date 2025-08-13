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
<section <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <div class="block-scrolling-logos__container">
        <?php echo $content; // phpcs:disable ?>
    </div>
    <div class="block-scrolling-logos__container">
        <?php echo $content; // phpcs:disable ?>
    </div>
</section>
