/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { RichText, useBlockProps } from '@wordpress/block-editor';


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
const ProjectInfoBlockEdit = (props) => {
  const { attributes, setAttributes } = props;
  const { client, location, startDate, endDate, price } = attributes;

  const blockProps = useBlockProps();

  return (
    <div {...blockProps}>
      <div className="block-project-info__item">
        <p className="block-project-info__item-heading">{__('Client', 'plants')}</p>
        <RichText
          className="block-project-info__item-text"
          tagName="p"
          placeholder={__('Client', 'plants')}
          value={client}
          onChange={(client) => setAttributes({ client })}
        />
      </div>
      <div className="block-project-info__item">
        <p className="block-project-info__item-heading">{__('Location', 'plants')}</p>
        <RichText
          className="block-project-info__item-text"
          tagName="p"
          placeholder={__('Location', 'plants')}
          value={location}
          onChange={(location) => setAttributes({ location })}
        />
      </div>
      <div className="block-project-info__item">
        <p className="block-project-info__item-heading">{__('Start date', 'plants')}</p>
        <RichText
          className="block-project-info__item-text"
          tagName="p"
          placeholder={__('Start date', 'plants')}
          value={startDate}
          onChange={(startDate) => setAttributes({ startDate })}
        />
      </div>
      <div className="block-project-info__item">
        <p className="block-project-info__item-heading">{__('Completion date', 'plants')}</p>
        <RichText
          className="block-project-info__item-text"
          tagName="p"
          placeholder={__('Completion date', 'plants')}
          value={endDate}
          onChange={(endDate) => setAttributes({ endDate })}
        /> 
      </div>
      <div className="block-project-info__item">
        <p className="block-project-info__item-heading">{__('Price', 'plants')}</p>
        <RichText
          className="block-project-info__item-text"
          tagName="p"
          placeholder={__('Price', 'plants')}
          value={price}
          onChange={(price) => setAttributes({ price })}
        />
      </div>
    </div>
  );
};
export default ProjectInfoBlockEdit;
