/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';
import ServerSideRender from '@wordpress/server-side-render';
import { ContentPicker } from '@10up/block-components';

/**
 * Edit component.
 * See https://wordpress.org/gutenberg/handbook/designers-developers/developers/block-api/block-edit-save/#edit
 *
 * @param {object}   props                  The block props.
 * @param {object}   props.attributes       Block attributes.
 * @param {string}   props.attributes.title Custom title to be displayed.
 * @param {string}   props.className        Class name for the block.
 * @param {Function} props.setAttributes    Sets the value for block attributes.
 * @returns {Function} Render the edit screen
 */
const ServicesBlockEdit = (props) => {
	const { attributes, setAttributes } = props;
	const { posts } = attributes;

	const blockProps = useBlockProps();

	return (
		<>
			<div {...blockProps}>
				{posts.length > 0 ? (
					<ServerSideRender
						block="plants/services"
						skipBlockSupportAttributes
						attributes={ attributes }
					/>
				) : (
					<h1>{__('Please select services.', 'plants')}</h1>
				)}
			</div>
			<InspectorControls>
				<PanelBody>
					<ContentPicker
						onPickChange={(pickedContent) => {
							setAttributes({ posts: pickedContent });
						}}
						mode="post"
						label={__('Please select services.', 'plants')}
						contentTypes={['service']}
						content={posts}
						maxContentItems={8}
						isOrderable
						uniqueContentItems
					/>
				</PanelBody>
			</InspectorControls>
		</>
	);
};
export default ServicesBlockEdit;
