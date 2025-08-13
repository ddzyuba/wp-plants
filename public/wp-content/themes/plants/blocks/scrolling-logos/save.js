import { InnerBlocks } from '@wordpress/block-editor';

/**
 * See https://wordpress.org/gutenberg/handbook/designers-developers/developers/block-api/block-edit-save/#save
 *
 * @returns {function}
 */
const ScrollingLogosBlockSave = () => <InnerBlocks.Content />;

export default ScrollingLogosBlockSave;
