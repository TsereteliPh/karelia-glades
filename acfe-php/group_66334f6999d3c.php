<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_66334f6999d3c',
	'title' => 'Block:service-description',
	'fields' => array(
		array(
			'key' => 'field_66334f869b22e',
			'label' => '(Column 3/12)',
			'name' => '',
			'aria-label' => '',
			'type' => 'acfe_column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'columns' => '3/12',
			'endpoint' => 0,
			'border' => '',
			'acfe_field_group_condition' => 0,
			'border_endpoint' => array(
				0 => 'endpoint',
			),
		),
		array(
			'key' => 'field_66334fa79b22f',
			'label' => 'Название услуги',
			'name' => 'label',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'acfe_field_group_condition' => 0,
		),
		array(
			'key' => 'field_66334fd89b232',
			'label' => 'Пояснение',
			'name' => 'explanation',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => 'Текст в скобках после названия услуги',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'acfe_field_group_condition' => 0,
		),
		array(
			'key' => 'field_6633500c9b233',
			'label' => 'Популярное',
			'name' => 'popular',
			'aria-label' => '',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'ui' => 1,
			'style' => '',
			'acfe_field_group_condition' => 0,
		),
		array(
			'key' => 'field_663350329b234',
			'label' => 'Добавить кнопку записи?',
			'name' => 'button',
			'aria-label' => '',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'style' => '',
			'ui_on_text' => '',
			'ui_off_text' => '',
			'ui' => 1,
			'acfe_field_group_condition' => 0,
		),
		array(
			'key' => 'field_66334fa99b230',
			'label' => '(Column 9/12)',
			'name' => '',
			'aria-label' => '',
			'type' => 'acfe_column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'columns' => '9/12',
			'endpoint' => 0,
			'border' => '',
			'acfe_field_group_condition' => 0,
			'border_endpoint' => array(
				0 => 'endpoint',
			),
		),
		array(
			'key' => 'field_663350599b235',
			'label' => 'Текст',
			'name' => 'text',
			'aria-label' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'acfe_wysiwyg_height' => 500,
			'acfe_wysiwyg_max_height' => '',
			'acfe_wysiwyg_valid_elements' => '',
			'acfe_wysiwyg_custom_style' => '',
			'acfe_wysiwyg_disable_wp_style' => 0,
			'acfe_wysiwyg_autoresize' => 0,
			'acfe_wysiwyg_disable_resize' => 0,
			'acfe_wysiwyg_remove_path' => 0,
			'acfe_wysiwyg_menubar' => 0,
			'acfe_wysiwyg_transparent' => 0,
			'acfe_wysiwyg_merge_toolbar' => 0,
			'acfe_wysiwyg_custom_toolbar' => 0,
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 0,
			'delay' => 0,
			'acfe_field_group_condition' => 0,
			'acfe_wysiwyg_auto_init' => 0,
			'acfe_wysiwyg_min_height' => 300,
			'acfe_wysiwyg_toolbar_buttons' => array(
			),
		),
		array(
			'key' => 'field_66334fab9b231',
			'label' => '(Column Fill)',
			'name' => '',
			'aria-label' => '',
			'type' => 'acfe_column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'columns' => 'fill',
			'endpoint' => 0,
			'border' => '',
			'acfe_field_group_condition' => 0,
			'border_endpoint' => array(
				0 => 'endpoint',
			),
		),
		array(
			'key' => 'field_663350719b236',
			'label' => 'Изображение',
			'name' => 'img',
			'aria-label' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'uploader' => '',
			'acfe_thumbnail' => 0,
			'return_format' => 'id',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'preview_size' => 'medium',
			'acfe_field_group_condition' => 0,
			'library' => 'all',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => false,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_autosync' => array(
		0 => 'php',
	),
	'acfe_form' => 0,
	'acfe_display_title' => '',
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1714640742,
));

endif;