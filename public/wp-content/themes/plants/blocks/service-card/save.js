import { InnerBlocks } from '@wordpress/block-editor';

/**
 * See https://wordpress.org/gutenberg/handbook/designers-developers/developers/block-api/block-edit-save/#save
 *
 * @returns {function}
 */
const ServiceCardBlockSave = () => <InnerBlocks.Content />;

export default ServiceCardBlockSave;
