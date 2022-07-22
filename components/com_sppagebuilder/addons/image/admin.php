<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2022 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined ('_JEXEC') or die ('Restricted access');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig(
	array(
		'type'=>'content',
		'addon_name'=>'sp_image',
		'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE'),
		'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_DESC'),
		'category'=>'Media',
		'attr'=>array(
			'general' => array(
				'admin_label'=>array(
					'type'=>'text',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std'=> ''
				),

				'title'=>array(
					'type'=>'text',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
					'std'=>  ''
				),

				'heading_selector'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_DESC'),
					'values'=>array(
						'h1'=>Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H1'),
						'h2'=>Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H2'),
						'h3'=>Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H3'),
						'h4'=>Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H4'),
						'h5'=>Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H5'),
						'h6'=>Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H6'),
					),
					'std'=>'h3',
					'depends'=>array(array('title', '!=', '')),
				),

				'title_font_family'=>array(
					'type'=>'fonts',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_FAMILY'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_FAMILY_DESC'),
					'depends'=>array(array('title', '!=', '')),
					'selector'=> array(
						'type'=>'font',
						'font'=>'{{ VALUE }}',
						'css'=>'.sppb-addon-title { font-family: "{{ VALUE }}"; }'
					)
				),

				'title_fontsize'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_SIZE'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_SIZE_DESC'),
					'std'=>'',
					'depends'=>array(array('title', '!=', '')),
					'responsive' => true,
					'max'=> 400,
				),

				'title_lineheight'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_LINE_HEIGHT'),
					'std'=>'',
					'depends'=>array(array('title', '!=', '')),
					'responsive' => true,
					'max'=> 400,
				),

				'title_font_style'=>array(
					'type'=>'fontstyle',
					'title'=> Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_STYLE'),
					'depends'=>array(array('title', '!=', '')),
				),

				'title_letterspace'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LETTER_SPACING'),
					'values'=>array(
						'0'=> 'Default',
						'1px'=> '1px',
						'2px'=> '2px',
						'3px'=> '3px',
						'4px'=> '4px',
						'5px'=> '5px',
						'6px'=>	'6px',
						'7px'=>	'7px',
						'8px'=>	'8px',
						'9px'=>	'9px',
						'10px'=> '10px'
					),
					'std'=>'0',
					'depends'=>array(array('title', '!=', '')),
				),

				'title_text_color'=>array(
					'type'=>'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR_DESC'),
					'depends'=>array(array('title', '!=', '')),
				),

				'title_margin_top'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_TOP'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_TOP_DESC'),
					'placeholder'=>'10',
					'depends'=>array(array('title', '!=', '')),
					'responsive' => true,
					'max'=> 400,
				),

				'title_margin_bottom'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_BOTTOM'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_BOTTOM_DESC'),
					'placeholder'=>'10',
					'depends'=>array(array('title', '!=', '')),
					'responsive' => true,
					'max'=> 400,
				),

				'title_padding'=>array(
					'type'=>'padding',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'placeholder'=>'10',
					'depends'=>array(array('title', '!=', '')),
					'responsive' => true,
					'std'=> ''
				),

				'title_position'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_POSITION'),
					'values'=>array(
						'top'=> 'Top',
						'bottom'=> 'Bottom',
					),
					'std'=>'top',
					'depends'=>array(array('title', '!=', '')),
				),

				'image'=>array(
					'type'=>'media',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_SELECT'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_SELECT_DESC'),
					'show_input' => true,
					'std'=> array(
						'src' => 'https://sppagebuilder.com/addons/image/image1.jpg',
						'height' => '',
						'width' => '',
					)
				),
				'image_width'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'max'=> 2000,
					'min'=> 0,
					'responsive' => true,
				),
				'image_height'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'max'=> 2000,
					'min'=> 0,
					'responsive' => true,
				),

				'border_radius'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'std'=>0,
					'max'=>1200
				),

				'alt_text'=>array(
					'type'=>'text',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_ALT_TEXT'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_ALT_TEXT_DESC'),
					'std'=>'Image',
					'depends'=>array(
						array('image', '!=', ''),
					),
				),

				'position'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_ALIGNMENT'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_ALIGNMENT_DESC'),
					'values'=>array(
						'sppb-text-left'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'sppb-text-center'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
						'sppb-text-right'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
					),
					'std'=>'sppb-text-center',
					'depends'=>array(
						array('image', '!=', ''),
					),
				),

				'open_lightbox'=>array(
					'type'=>'checkbox',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_OPEN_LIGHTBOX'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_OPEN_LIGHTBOX_DESC'),
					'std'=>0,
					'depends'=>array(
						array('image', '!=', ''),
					),
				),

				'overlay_color'=>array(
					'type'=>'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_OVERLAY'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_OVERLAY_DESC'),
					'std'=>'rgba(119, 219, 31, .5)',
					'depends'=>array(
						array('image', '!=', ''),
						array('open_lightbox', '!=', 0),
					),
				),

				'link'=>array(
					'type'=>'media',
					'format'=>'attachment',
					'hide_preview'=>true,
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK_DESC'),
					'std'=>'',
					'depends'=>array(
						array('image', '!=', ''),
						array('open_lightbox', '!=', 1),
					),
				),

				'target'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_DESC'),
					'values'=>array(
						''=>Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_SAME_WINDOW'),
						'_blank'=>Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_NEW_WINDOW'),
					),

					'depends'=>array(
						array('image', '!=', ''),
						array('link', '!=', ''),
						array('open_lightbox', '!=', 1),
					),
				),

				'class'=>array(
					'type'=>'text',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
					'std'=>''
				),

			),
		),
	)
);
