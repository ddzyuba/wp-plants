/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import {
	RichText,
	MediaUpload,
	MediaUploadCheck,
	useBlockProps,
} from '@wordpress/block-editor';
import { Icon, Spinner, Button } from '@wordpress/components';

const ALLOWED_IMAGE_TYPES = ['image/gif', 'image/jpeg', 'image/png'];

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
const TestimonialsBlockEdit = (props) => {
	const { attributes, setAttributes } = props;
	const { title, text, details } = attributes;

	const blockProps = useBlockProps({ className: 'block-testimonials' });

	const handleDetailsTextChange = (index, text) => {
		const newDetails = [...details];
		newDetails[index].text = text;
		setAttributes({ details: newDetails });
	};

	const handleDetailsNameChange = (index, name) => {
		const newDetails = [...details];
		newDetails[index].name = name;
		setAttributes({ details: newDetails });
	};

	const handleDetailsJobChange = (index, job) => {
		const newDetails = [...details];
		newDetails[index].job = job;
		setAttributes({ details: newDetails });
	};

	const handleDetailsImageChange = (index, media) => {
		const attachmentId = media.id;
		const imageSrc = media.sizes.thumbnail.url;

		const newDetails = [...details];
		newDetails[index].attachmentId = attachmentId;
		newDetails[index].imageSrc = imageSrc;
		setAttributes({ details: newDetails });
	};

	const handleDetailsImageDelete = (index) => {
		const newDetails = [...details];
		newDetails[index].attachmentId = 0;
		newDetails[index].imageSrc = '';
		setAttributes({ details: newDetails });
	};

	const handleAddDetailsItem = () => {
		const newItem = {
			id: Date.now(),
			text: '',
			name: '',
			job: '',
			attachmentId: 0,
			imageSrc: '',
		};
		const newDetails = [...details, newItem];
		setAttributes({ details: newDetails });
	};

	const handleDeleteDetailsItem = (index) => {
		const newDetails = details.filter((_, itemIndex) => itemIndex !== index);
		setAttributes({ details: newDetails });
	};

	return (
		<>
			<div {...blockProps}>
				<div className="block-testimonials__container">
					<RichText
						className="block-testimonials__title"
						tagName="h2"
						placeholder={__('Custom Title', 'plants')}
						value={title}
						onChange={(title) => setAttributes({ title })}
					/>
					<div className="block-testimonials__wrapper-top">
						<RichText
							className="block-testimonials__text"
							tagName="p"
							placeholder={__('Some text', 'plants')}
							value={text}
							onChange={(text) => setAttributes({ text })}
						/>
					</div>
					<div className="swiper">
						{details.length > 0 && (
							<div className="swiper-wrapper">
								{details.map((d, index) => (
									<div key={d.id} className="swiper-slide">
										<div className="block-testimonials__item">
											<MediaUploadCheck>
												<MediaUpload
													onSelect={(media) => {
														handleDetailsImageChange(index, media);
													}}
													allowedTypes={ALLOWED_IMAGE_TYPES}
													value={d.attachmentId}
													render={({ open }) => (
														<Button
															className="image-button"
															onClick={open}
															icon={
																!!d.attachmentId &&
																!d.imageSrc && <Icon icon={Spinner} />
															}
															iconSize={46}
															text={
																!d.imageSrc
																	? __('Set image', 'plants')
																	: ''
															}
															label={__('Image', 'plants')}
														>
															{!!d.imageSrc && (
																<img
																	src={d.imageSrc}
																	width={190}
																	height={275}
																	alt=""
																/>
															)}
														</Button>
													)}
												/>
												{!!d.attachmentId && !!d.imageSrc && (
													<Button
														className="components-button is-secondary is-destructive delete-image"
														onClick={() => {
															handleDetailsImageDelete(index);
														}}
													>
														{__('Remove Image', 'plants')}
													</Button>
												)}
											</MediaUploadCheck>
											<div className="block-testimonials__item-text-wrapper">
												<RichText
													className="block-testimonials__item-text"
													tagName="p"
													placeholder={__('Testimonial text', 'plants')}
													value={d.text}
													onChange={(text) => handleDetailsTextChange(index, text)}
												/>
												<RichText
													className="block-testimonials__item-name"
													tagName="p"
													placeholder={__('Author name', 'plants')}
													value={d.name}
													onChange={(name) => handleDetailsNameChange(index, name)}
												/>
												<RichText
													className="block-testimonials__item-job"
													tagName="p"
													placeholder={__('Author job', 'plants')}
													value={d.job}
													onChange={(job) => handleDetailsJobChange(index, job)}
												/>
											</div>

											<Button
												className="components-button is-secondary is-destructive delete-testimonial"
												onClick={() => {
													handleDeleteDetailsItem(index);
												}}
											>
												{__('Delete testimonial', 'plants')}
											</Button>
										</div>
									
									</div>
								))}
							</div>
						)}
					</div>
					<button 
						className="components-button is-primary"
						type="button" 
						onClick={handleAddDetailsItem}
					>
						{__('Add testimonial', 'plants')}
					</button>
				</div>
			</div>
		</>
	);
};
export default TestimonialsBlockEdit;
