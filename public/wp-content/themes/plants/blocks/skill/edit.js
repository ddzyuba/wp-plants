/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { RichText, useBlockProps } from '@wordpress/block-editor';
import { RangeControl } from '@wordpress/components';


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
  const { title, skill } = attributes;

  const blockProps = useBlockProps();

  return (
    <div {...blockProps}>
      <RangeControl
        __nextHasNoMarginBottom
        __next40pxDefaultSize
        label={__('Skill', 'plants')}
        value={skill}
        onChange={(skill) => setAttributes({ skill })}
        min={ 10 }
        max={ 100 }
      />
      <RichText
				className="wp-block-skill__title"
				tagName="p"
				placeholder={__('Custom Title', 'plants')}
				value={title}
				onChange={(title) => setAttributes({ title })}
			/>
      {skill && (
        <div className="wp-block-skill__percentage-wrapper">
          <div className="wp-block-skill__percentage" style={{ width: `${skill}%` }}></div>
        </div>
      )}
    </div>
  );
};
export default ServicesBlockEdit;
