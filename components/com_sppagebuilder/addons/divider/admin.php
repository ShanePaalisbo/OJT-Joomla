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
		'addon_name'=>'sp_divider',
		'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER'),
		'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_DESC'),
		'category'=>'General',
		'attr'=>array(
			'general' => array(
					
				'admin_label'=>array(
					'type'=>'text',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std'=> '',
				),

				'divider_type'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_TYPE'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_TYPE_DESC'),
					'values'=> array(
						'border'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_TYPE_BORDER'),
						'image'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE'),
					),
					'std'=>'border',
				),

				'divider_vertical'=>array(
					'type' => 'checkbox',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_VERTICAL'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_VERTICAL_DESC'),
					'std' => 0,
					'depends' => array('divider_type' => 'border'),
				),

				'divider_height_vertical'=>array(
					'type' => 'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_HEIGHT'),
					'depends' => array('divider_vertical' => 1),
					'max'=>2500,
					'responsive'=> true,
					'std'=>array('md'=>'100', 'sm'=>'', 'xs'=>''),
				),

				'divider_image'=>array(
					'type' => 'media',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_IMAGE'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_IMAGE_DESC'),
					'std'=> array(
						'src' => '',
					),
					'depends' => array('divider_type' => 'image'),
				),

				'background_repeat'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_BG_REPEAT'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_BG_REPEAT_DESC'),
					'values'=>array(
						'no-repeat'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_NO_REPEAT'),
						'repeat'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_REPEAT_ALL'),
						'repeat-x'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_REPEAT_HORIZONTALLY'),
						'repeat-y'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_REPEAT_VERTICALLY'),
						'inherit'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_INHERIT'),
					),
					'std'=>'no-repeat',
					'depends' => array('divider_type' => 'image'),
				),

				'divider_height'=>array(
					'type' => 'number',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_HEIGHT'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_HEIGHT_DESC'),
					'std' => '10',
					'placeholder' => '10',
					'depends' => array('divider_type' => 'image'),
				),

				'divider_position'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_POSITION'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_POSITION_DESC'),
					'values'=>array(
						'left'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'center'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
						'right'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
					),
					'responsive'=> true,
					'std'=>'',
				),

				'container_div_width'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_CONTAINER_WIDTH'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_CONTAINER_WIDTH_DESC'),
					'depends' => array(
						array('divider_vertical', '!=', 1),
					),
					'max'=>2000,
					'responsive'=> true,
					'std'=>array('md'=>'', 'sm'=>'', 'xs'=>''),
				),

				'border_style'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_BORDER_STYLE_DESC'),
					'values'=>array(
						'solid'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_SOLID'),
						'dashed'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_DASHED'),
						'dotted'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_DOTTED'),
					),
					'std'=>'solid',
					'depends' => array('divider_type' => 'border'),
				),

				'border_width'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_BORDER_WIDTH_DESC'),
					'std'=>'1',
					'depends' => array('divider_type' => 'border'),
				),

				'border_radius'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_BORDER_RADIUS'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_BORDER_RADIUS_DESC'),
					'max'=> 1000,
					'std'=>'',
					'depends' => array('divider_type' => 'border'),
				),

				'border_color'=>array(
					'type' => 'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_BORDER_COLOR_DESC'),
					'std' => '#cccccc',
					'depends' => array('divider_type' => 'border'),
				),

				'margin_top'=>array(
					'type' => 'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_MARGIN_TOP'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_MARGIN_TOP_DESC'),
					'std' => array('md'=>30, 'sm'=>20, 'xs'=>10),
					'responsive' => true
				),

				'margin_bottom'=>array(
					'type' => 'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_MARGIN_BOTTOM'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_DIVIDER_MARGIN_BOTTOM_DESC'),
					'std' => array('md'=>30, 'sm'=>20, 'xs'=>10),
					'responsive' => true
				),

				'class'=>array(
					'type'=>'text',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
					'std'=> ''
				),
			),
		)
	)
);
