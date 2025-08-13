/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';


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
const ScrollingLogosBlockEdit = (props) => {

  const blockProps = useBlockProps();

  return (
    <>
      <div {...blockProps}>
        <h1>{__('Please select images.', 'plants')}</h1>
        <div className="block-scrolling-logos__container">
          <InnerBlocks allowedBlocks={[ 'core/image' ]} />
        </div>
      </div>
    </>
  );
};
export default ScrollingLogosBlockEdit;
