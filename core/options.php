<?php
/**
 * Generate options
 * @param void
 * @return array $option
 * @since 1.0
 * @author tatthien
 */
if(!function_exists('tt_generate_options')) {
	function tt_generate_options() {
		$options = array(
			array(
				'name' => __('Facebook slug', 'harmony'),
				'id' => 'facebook-slug',
				'desc' => __('Enter your Facebook page slug. E.g http://facebook.com/{page-slug}', 'harmony'),
				'type' => 'text',
				'default' => ''
			),

			array(
				'name' => __('Message box title', 'harmony'),
				'id' => 'message-box-title',
				'desc' => __('Enter your custom message box title. E.g "Send us message via Facebook"', 'harmony'),
				'type' => 'text',
				'default' => __('Send us message via Facebook', 'harmony')
			),

			array(
				'name' => __('Message box title color', 'harmony'),
				'id' => 'message-box-title',
				'desc' => __('Pick your color for the background of message box title', 'harmony'),
				'type' => 'color',
				'default' => '#007acc'
			),

			array(
				'name' => __('Languages', 'harmony'),
				'id' => 'languages',
				'desc' => __('Enter your message box language. See full languages code <a href="https://gist.github.com/tatthien/160d655bdfcd2caab8b7" target="_blank">here</a>', 'harmony'),
				'type' => 'text',
				'default' => 'en_US'
			),

			array(
				'name' => __('Header image', 'harmony'),
				'id' => 'header-image',
				'desc' => __('You can select small header, large header or hide it', 'harmony'),
				'value' => array(
					__('Small') => 'small',
					__('Large') => 'large',
					__('Hidden') => 'hidden',
				),
				'type' => 'radio',
				'default' => 'small'
			)
		);

		return $options;
	}
}