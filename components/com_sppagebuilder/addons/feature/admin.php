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
		'addon_name'=>'sp_feature',
		'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX'),
		'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_DESC'),
		'category'=>'Content',
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
					'std'=>  'Feature Box'
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
						'css'=>'.sppb-addon-title { font-family: {{ VALUE }}; }'
					)
				),

				'title_position'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_ICON_IMAGE_POSITION'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_ICON_IMAGE_POSITION_DESC'),
					'values'=>array(
						'after'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_TITLE_POSITION_BEFORE_TITLE'),
						'before'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_TITLE_POSITION_AFTER_TITLE'),
						'left'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'right'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
					),
					'std'=>'after',
					'depends'=>array(array('title', '!=', '')),
				),

				'title_fontsize'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_SIZE'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_SIZE_DESC'),
					'std'=>array('md'=>16),
					'depends'=>array(array('title', '!=', '')),
					'responsive' => true,
					'max'=> 400,
				),

				'title_lineheight'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_LINE_HEIGHT'),
					'std'=>array('md'=>22),
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
					'std'=>'#4A4A4A',
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

				'title_url'=>array(
					'type'=>'media',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_TITLE_IMAGE_URL'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_TITLE_IMAGE_URL_DESC'),
					'placeholder'=>'http://',
					'hide_preview'=>true,
					'std'=>'',
				),

				'link_open_new_window' => array(
					'type' => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_NEW_WINDOW'),
					'std' => 0,
					'depends'=>array(array('title_url', '!=', '')),
				),

				'url_appear'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_URL_APEAR'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_URL_APEAR_DESC'),
					'values'=>array(
						'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_URL_APEAR_TITLE'),
						'icon'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_URL_APEAR_ICON'),
						'both'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_URL_APEAR_BOTH'),
					),
					'std'=>'title',
					'depends'=>array(array('title_url', '!=', '')),
				),

				'feature_type'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_LAYOUT_TYPE'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_LAYOUT_TYPE_DESC'),
					'values'=> array(
						'icon'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_LAYOUT_TYPE_ICON'),
						'image'=>Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE'),
						'both'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_LAYOUT_TYPE_BOTH'),
					),
					'std' => 'icon'
				),

				'separator_image_options'=>array(
					'type'=>'separator',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_image_OPTIONS'),
					'depends'=>array(
                        array('feature_type', '!=', 'icon'),
                    )
				),

				'feature_image'=>array(
					'type' => 'media',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_IMAGE'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_IMAGE_DESC'),
					'depends'=>array(
                        array('feature_type', '!=', 'icon'),
					),
					'std'=> array(
						'src' => '',
						'height' => '',
						'width' => '',
					),
				),
				'feature_image_width'=>array(
					'type' => 'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_IMAGE_WIDTH'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_IMAGE_WIDTH_DESC'),
                    'responsive' => true,
                    'max'=> 100,
					'std' => array('md'=>50),
					'depends' => array(
                        array('feature_type', '!=', 'icon'),
                        array('title_position', '!=', 'before'),
                        array('title_position', '!=', 'after'),
                    )
				),
                'feature_image_margin'=>array(
                    'type'=>'margin',
                    'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                    'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_DESC'),
                    'depends'=>array(
                        array('feature_type', '!=', 'icon'),
                    ),
                    'responsive' => true
				),
                            
                'separator_icon_options'=>array(
					'type'=>'separator',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_ICON_OPTIONS'),
					'depends'=>array(
                        array('feature_type', '!=', 'image'),
                    )
				),

				'icon_name'=>array(
					'type'=>'icon',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON_NAME'),
					'std'=> 'fa-trophy',
					'depends'=>array(
                        array('feature_type', '!=', 'image'),
                    )
				),

				'icon_size'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON_SIZE'),
					'placeholder'=>36,
					'std'=>array('md'=>36),
					'depends'=>array(
                        array('feature_type', '!=', 'image'),
                    ),
					'responsive' => true,
					'max'=> 400,
				),

				'icon_color'=>array(
					'type'=>'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std'=>'#0080FE',
					'depends'=>array(
                        array('feature_type', '!=', 'image'),
                    )
				),

				'icon_background'=>array(
					'type'=>'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
					'depends'=>array(
                        array('feature_type', '!=', 'image'),
                    )
				),

				'icon_border_color'=>array(
					'type'=>'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends'=>array(
                        array('feature_type', '!=', 'image'),
                    )
				),

				'icon_border_width'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'depends'=>array(
                        array('feature_type', '!=', 'image'),
                    ),
					'responsive' => true,
					'max'=> 400,
				),

				'icon_border_radius'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'depends'=>array(
                        array('feature_type', '!=', 'image'),
                    ),
					'responsive' => true,
					'max'=> 400,
				),

				'icon_boxshadow'=>array(
					'type'=>'boxshadow',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_ICON_BOXSHADOW'),
					'std'=>'0 0 0 0 #ffffff'
				),

				'icon_margin_top'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_TOP'),
					'depends'=>array(
                        array('feature_type', '!=', 'image'),
                    ),
					'responsive' => true,
					'min'=> -200,
					'max'=> 400,
				),

				'icon_margin_bottom'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_BOTTOM'),
					'depends'=>array(
                        array('feature_type', '!=', 'image'),
                    ),
					'responsive' => true,
					'max'=> 400,
				),

				'icon_padding'=>array(
					'type'=>'padding',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
					'depends'=>array(
                        array('feature_type', '!=', 'image'),
                    ),
					'responsive' => true
				),

				'separator_addon_options'=>array(
					'type'=>'separator',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_OPTIONS')
				),

				'text'=>array(
					'type'=>'editor',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
					'std'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus sollicitudin pellentesque et non erat. Maecenas nibh dolor, malesuada et bibendum a, sagittis accumsan ipsum.'
				),

				'text_font_family'=>array(
					'type'=>'fonts',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_FONT_FAMILY'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_FONT_FAMILY_DESC'),
					'depends'=>array(array('text', '!=', '')),
					'selector'=> array(
						'type'=>'font',
						'font'=>'{{ VALUE }}',
						'css'=>'.sppb-addon-content .sppb-addon-text { font-family: "{{ VALUE }}"; }'
					)
				),

				'text_fontsize'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT_FONT_SIZE'),
					'std'=>'',
					'max'=>400,
					'responsive'=>true
				),

				'text_fontweight'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_FONTWEIGHT'),
					'values'=>array(
						'100'=>100,
						'200'=>200,
						'300'=>300,
						'400'=>400,
						'500'=>500,
						'600'=>600,
						'700'=>700,
						'900'=>900,
					),
					'std'=>'',
				),

				'text_lineheight'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT_LINE_HEIGHT'),
					'std'=>'',
					'max'=>400,
					'responsive'=>true
				),
                                
                'text_background'=>array(
					'type'=>'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
				),
                'text_padding'=>array(
					'type'=>'padding',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
					'responsive' => true
				),

				'alignment'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_CONTENT_ALIGNMENT'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_CONTENT_ALIGNMENT'),
					'values'=>array(
						'sppb-text-left'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'sppb-text-center'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
						'sppb-text-right'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
					),
					'std'=>'sppb-text-center',
				),

				'global_separator'=>array(
					'type'=>'separator',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_CON_HOVER_OPTIONS'),
				),
				'addon_hover_bg'=>array(
					'type'=>'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_HOVER_BG'),
				),
				'addon_hover_boxshadow'=>array(
					'type'=>'boxshadow',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_HOVER_BOXSHADOW'),
					'std'=>'0 0 0 0 #ffffff'
				),
				'addon_hover_color'=>array(
					'type'=>'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_ADDON_HOVER_COLOR'),
				),
				'title_hover_color'=>array(
					'type'=>'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_TITLE_HOVER_COLOR'),
				),
				'icon_hover_bg'=>array(
					'type'=>'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_ICON_HOVER_BG'),
				),
				'icon_hover_color'=>array(
					'type'=>'color',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_FEATURE_BOX_ICON_HOVER_COLOR'),
				),
				//Button
				'button_options' => array(
					'type' => 'separator',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_BUTTON_OPTIONS'),
				),
				'btn_text' => array(
					'type' => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_TEXT'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_TEXT_DESC'),
				),
				'btn_font_family' => array(
					'type' => 'fonts',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_FONT_FAMILY'),
					'selector' => array(
						'type' => 'font',
						'font' => '{{ VALUE }}',
						'css' => '.sppb-btn { font-family: "{{ VALUE }}"; }'
					),
					'depends'=>array(
						array('btn_text', '!=', ''),
					)
				),
				'btn_font_style' => array(
					'type' => 'fontstyle',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_FONT_STYLE'),
					'depends'=>array(
						array('btn_text', '!=', ''),
					)
				),

				'btn_letterspace' => array(
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_LETTER_SPACING'),
					'values' => array(
						'-10px'=> '-10px',
						'-9px'=>  '-9px',
						'-8px'=>  '-8px',
						'-7px'=>  '-7px',
						'-6px'=>  '-6px',
						'-5px'=>  '-5px',
						'-4px'=>  '-4px',
						'-3px'=>  '-3px',
						'-2px'=>  '-2px',
						'-1px'=>  '-1px',
						'0px'=> 'Default',
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
					'std' => '0px',
					'depends'=>array(
						array('btn_text', '!=', ''),
					)
				),
				'btn_url' => array(
					'type' => 'media',
					'format' => 'attachment',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_URL'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_URL_DESC'),
					'placeholder' => 'http://',
					'hide_preview' => true,
					'depends'=>array(
						array('btn_text', '!=', ''),
					)
				),
				'btn_target' => array(
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB_DESC'),
					'values' => array(
						'' => Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_SAME_WINDOW'),
						'_blank' => Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_NEW_WINDOW'),
					),
					'depends' => array(array('btn_url', '!=', '')),
				),
				'btn_type' => array(
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE_DESC'),
					'values' => array(
						'default' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DEFAULT'),
						'primary' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PRIMARY'),
						'secondary' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SECONDARY'),
						'success' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SUCCESS'),
						'info' => Text::_('COM_SPPAGEBUILDER_GLOBAL_INFO'),
						'warning' => Text::_('COM_SPPAGEBUILDER_GLOBAL_WARNING'),
						'danger' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DANGER'),
						'dark' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DARK'),
						'link' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
						'custom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
					),
					'std' => 'custom',
					'depends'=>array(
						array('btn_text', '!=', ''),
					)
				),
				'btn_appearance' => array(
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_DESC'),
					'values' => array(
						'' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_FLAT'),
						'gradient' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_GRADIENT'),
						'outline' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_OUTLINE'),
						'3d' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_3D'),
					),
					'std' => '',
					'depends'=>array(
						array('btn_text', '!=', ''),
					)
				),
				'btn_fontsize' => array(
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_FONT_SIZE'),
					'std' => array('md' => 16),
					'responsive' => true,
					'max' => 400,
					'depends' => array(
						array('btn_type', '=', 'custom'),
						array('btn_text', '!=', ''),
					)
				),
				'button_status' => array(
					'type' => 'buttons',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ENABLE_BACKGROUND_OPTIONS'),
					'std' => 'normal',
					'values' => array(
						array(
							'label' => 'Normal',
							'value' => 'normal'
						),
						array(
							'label' => 'Hover',
							'value' => 'hover'
						),
					),
					'tabs' => true,
					'depends' => array(
						array('btn_type', '=', 'custom'),
						array('btn_text', '!=', ''),
					)
				),
				'btn_background_color' => array(
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR_DESC'),
					'std' => '#0080FE',
					'depends' => array(
						array('btn_appearance', '!=', 'gradient'),
						array('btn_type', '=', 'custom'),
						array('button_status', '=', 'normal'),
						array('btn_text', '!=', ''),
					)
				),
				'btn_background_gradient' => array(
					'type' => 'gradient',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
					'std' => array(
						"color" => "#B4EC51",
						"color2" => "#429321",
						"deg" => "45",
						"type" => "linear"
					),
					'depends' => array(
						array('btn_appearance', '=', 'gradient'),
						array('btn_type', '=', 'custom'),
						array('button_status', '=', 'normal'),
					)
				),
				'btn_color' => array(
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR_DESC'),
					'std' => '#FFFFFF',
					'depends' => array(
						array('btn_type', '=', 'custom'),
						array('button_status', '=', 'normal'),
						array('btn_text', '!=', ''),
					),
				),
				'btn_background_color_hover' => array(
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR_HOVER'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR_HOVER_DESC'),
					'std' => '#de6906',
					'depends' => array(
						array('btn_appearance', '!=', 'gradient'),
						array('btn_type', '=', 'custom'),
						array('button_status', '=', 'hover'),
					)
				),
				'btn_background_gradient_hover' => array(
					'type' => 'gradient',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
					'std' => array(
						"color" => "#429321",
						"color2" => "#B4EC51",
						"deg" => "45",
						"type" => "linear"
					),
					'depends' => array(
						array('btn_appearance', '=', 'gradient'),
						array('btn_type', '=', 'custom'),
						array('button_status', '=', 'hover'),
					)
				),
				'btn_color_hover' => array(
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR_HOVER'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR_HOVER_DESC'),
					'std' => '#FFFFFF',
					'depends' => array(
						array('btn_type', '=', 'custom'),
						array('button_status', '=', 'hover'),
					),
				),
				'button_margin'=>array(
					'type'=>'margin',
					'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_DESC'),
					'placeholder'=>'10px 10px 10px 10px',
					'depends'=>array(
						array('btn_text', '!=', ''),
					),
					'responsive' => true,
					'std' => '25px 0px 0px 0px',
				),
				'button_padding' => array(
					'type' => 'padding',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
					'std'=>'',
					'depends' => array(
						array('btn_type', '=', 'custom'),
						array('btn_text', '!=', ''),
					),
					'responsive' => true,
					'std' => '8px 22px 10px 22px',
				),
				'btn_size' => array(
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DESC'),
					'values' => array(
						'' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DEFAULT'),
						'lg' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_LARGE'),
						'xlg' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_XLARGE'),
						'sm' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_SMALL'),
						'xs' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_EXTRA_SAMLL'),
					),
					'depends'=>array(
						array('btn_text', '!=', ''),
					),
					'std'=>''
				),
				'btn_shape' => array(
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_DESC'),
					'values' => array(
						'rounded' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUNDED'),
						'square' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_SQUARE'),
						'round' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUND'),
					),
					'depends'=>array(
						array('btn_text', '!=', ''),
					),
					'std'=>'square'
				),
				'btn_block' => array(
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK_DESC'),
					'values' => array(
						'' => Text::_('JNO'),
						'sppb-btn-block' => Text::_('JYES'),
					),
					'depends' => array(
						array('btn_type', '!=', 'link'),
					)
				),
				'btn_icon' => array(
					'type' => 'icon',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_DESC'),
					'depends'=>array(
						array('btn_text', '!=', ''),
					)
				),
				'btn_icon_position' => array(
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_POSITION'),
					'values' => array(
						'left' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
					),
					'std' => 'left',
					'depends'=>array(
						array('btn_text', '!=', ''),
					)
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