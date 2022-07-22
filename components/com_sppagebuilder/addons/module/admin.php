<?php
/**
* @package SP Page Builder
* @author JoomShaper http://www.joomshaper.com
* @copyright Copyright (c) 2010 - 2021 JoomShaper
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

use Joomla\CMS\Language\Text;

//no direct accees
defined ('_JEXEC') or die ('Restricted access');

SpAddonsConfig::addonConfig(
array(
	'type'=>'content',
	'addon_name'=>'sp_module',
	'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_MODULE'),
	'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_MODULE_DESC'),
	'category'=>'General',
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

			'separator_options'=>array(
				'type'=>'separator',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_ADDON_OPTIONS')
			),

			'module_type'=>array(
				'type'=>'select',
				'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_MODULE_TYPE'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_MODULE_TYPE_DESC'),
				'values'=>array(
					'module'=>Text::_('COM_SPPAGEBUILDER_ADDON_MODULE_TYPE_MODULE'),
					'position'=>Text::_('COM_SPPAGEBUILDER_ADDON_MODULE_TYPE_POSITION')
				),
				'std'=>'module',
			),

			'id'=>array(
				'type'=>'module',
				'module'=>'module',
				'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_MODULE_SELECT'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_MODULE_SELECT_DESC'),
				'depends'=>array('module_type'=>'module'),
			),

			'position'=>array(
				'type'=>'module',
				'module'=>'position',
				'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_MODULE_POSITION'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_MODULE_POSITION_DESC'),
				'depends'=>array('module_type'=>'position')
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
