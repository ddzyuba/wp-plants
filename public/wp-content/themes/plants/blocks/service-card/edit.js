/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks, InspectorControls, URLInput } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
// import { Link } from '@10up/block-components';

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
const ServiceCardBlockEdit = (props) => {

  const { attributes, setAttributes } = props;
  const { link, title } = attributes;

  const blockProps = useBlockProps();

  const allowedBlocks = [ 
    'core/image',
    'core/heading',
    'core/paragraph',
    'core/group'
  ];

  return (
    <>
      <div {...blockProps}>
        <div className="block-service-card">
          <InnerBlocks allowedBlocks={allowedBlocks} />
        </div>
      </div>
      <InspectorControls>
				<PanelBody>
          <TextControl
            __nextHasNoMarginBottom
            __next40pxDefaultSize
            label={__('Screen reader title', 'plants')}
            value={title}
            onChange={(newTitle) => {
							setAttributes({ title: newTitle });
						}}
          />
					<URLInput
						label={__('URL', 'plants')}
						value={link}
						onChange={(newLink) => {
							setAttributes({ link: newLink });
						}}
					/>
				</PanelBody>
			</InspectorControls>
    </>
  );
};
export default ServiceCardBlockEdit;
