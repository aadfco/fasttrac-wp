<?php
if ( class_exists( 'WPForms_Template' ) ) :
/**
 * Contact Page Form
 * Template for WPForms.
 */
class WPForms_Template_contact_page_form extends WPForms_Template {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Template name
		$this->name = 'Contact Page Form';

		// Template slug
		$this->slug = 'contact_page_form';

		// Template description
		$this->description = '';

		// Template field and settings
		$this->data = array (
	'field_id' => 6,
	'fields' => array (
		5 => array (
			'id' => '5',
			'type' => 'html',
			'code' => '<h4>Contact Us</h4>',
			'label_disable' => '1',
		),
		1 => array (
			'id' => '1',
			'type' => 'name',
			'label' => 'Name',
			'format' => 'simple',
			'required' => '1',
			'size' => 'medium',
			'simple_placeholder' => 'Full Name',
			'label_hide' => '1',
		),
		2 => array (
			'id' => '2',
			'type' => 'email',
			'label' => 'Email',
			'required' => '1',
			'size' => 'medium',
			'placeholder' => 'Email',
			'label_hide' => '1',
		),
		3 => array (
			'id' => '3',
			'type' => 'phone',
			'label' => 'Phone',
			'format' => 'us',
			'size' => 'medium',
			'placeholder' => 'Phone Number',
			'label_hide' => '1',
		),
		4 => array (
			'id' => '4',
			'type' => 'textarea',
			'label' => 'Paragraph Text',
			'required' => '1',
			'size' => 'medium',
			'placeholder' => 'Type your message.',
			'label_hide' => '1',
		),
	),
	'settings' => array (
		'form_title' => 'Contact Page Form',
		'form_class' => 'contact-form-wrapper',
		'submit_text' => 'Send Message',
		'submit_text_processing' => 'Sending...',
		'submit_class' => 'button expanded',
		'honeypot' => '1',
		'notification_enable' => '1',
		'notifications' => array (
			1 => array (
				'notification_name' => 'Default Notification',
				'email' => '{admin_email}',
				'subject' => 'New Entry: Blank Form',
				'sender_name' => 'Fast Trac',
				'sender_address' => '{admin_email}',
				'message' => '{all_fields}',
			),
		),
		'confirmations' => array (
			1 => array (
				'name' => 'Default Confirmation',
				'type' => 'message',
				'message' => '<p>Thanks for contacting us! We will be in touch with you shortly.</p>',
				'message_scroll' => '1',
				'page' => '24',
			),
		),
	),
	'meta' => array (
		'template' => 'contact_page_form',
	),
);
	}
}
new WPForms_Template_contact_page_form;
endif;
