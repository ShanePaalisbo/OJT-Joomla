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
		'type'=>'repeatable',
		'addon_name'=>'sp_carousel',
		'category'=>'Slider',
		'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL'),
		'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_DESC'),
		'attr'=>array(
			'general' => array(

				'admin_label'=>array(
					'type'=>'text',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std'=> ''
				),

				'autoplay'=>array(
					'type'=>'checkbox',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_AUTOPLAY'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_AUTOPLAY_DESC'),
					'values'=>array(
						1=>Text::_('JYES'),
						0=>Text::_('JNO'),
					),
					'std'=>1
				),

				'interval'=>array(
					'type'=>'number',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_INTERVAL'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_INTERVAL_DESC'),
					'std'=> 5,
					'depends'=> array(
						array('autoplay', '=', 1),
					)
				),

				'speed'=>array(
					'type'=>'number',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SPEED'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SPEED_DESC'),
					'std'=> 600,
				),

				'controllers'=>array(
					'type'=>'checkbox',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_CONTROLLERS'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_CONTROLLERS_DESC'),
					'values'=>array(
						1=>Text::_('JYES'),
						0=>Text::_('JNO'),
					),
					'std'=>1,
				),

				'arrows'=>array(
					'type'=>'checkbox',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_ARROWS'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_ARROWS_DESC'),
					'values'=>array(
						1=>Text::_('JYES'),
						0=>Text::_('JNO'),
					),
					'std'=>1,
				),

				'alignment'=>array(
					'type'=>'select',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTENT_ALIGNMENT'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTENT_ALIGNMENT_DESC'),
					'values'=>array(
						'sppb-text-left'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'sppb-text-center'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
						'sppb-text-right'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
					),
					'std'=>'sppb-text-center',
				),

				'class'=>array(
					'type'=>'text',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
					'std'=>''
				),

				//repeatable
				'sp_carousel_item'=>array(
					'title'=> Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEMS'),
					'attr'=>  array(

						'title'=>array(
							'type'=>'text',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_TITLE'),
							'std'=>'Where Art and Technology Collide',
						),

						'title_font_family'=>array(
							'type'=>'fonts',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_TITLE_FONT_FAMILY'),
							'depends'=>array(array('title', '!=', '')),
							'selector'=> array(
								'type'=>'font',
								'font'=>'{{ VALUE }}',
								'css'=>' h2 { font-family: "{{ VALUE }}"; }'
							)
						),

						'title_fontsize'=>array(
							'type'=>'slider',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_TITLE_FONTSIZE'),
							'max'=>100,
							'std'=>array('md'=>46, 'sm'=>36, 'xs'=>16),
							'responsive' => true
						),

						'title_lineheight'=>array(
							'type'=>'slider',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_TITLE_LINEHEIGHT'),
							'max'=>100,
							'std'=>array('md'=>56, 'sm'=>46, 'xs'=>20),
							'responsive' => true
						),

						'title_color'=>array(
							'type'=>'color',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_TITLE_COLOR'),
							'std'=>'#fff',
						),

						'title_padding'=>array(
							'type'=>'padding',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_TITLE_PADDING'),
							'std'=>array('md'=>'0px 0px 0px 0px', 'sm'=>'0px 0px 0px 0px', 'xs'=>'0px 0px 0px 0px'),
							'responsive' => true
						),

						'title_margin'=>array(
							'type'=>'margin',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_TITLE_MARGIN'),
							'std'=>array('md'=>'0px 0px 0px 0px', 'sm'=>'0px 0px 0px 0px', 'xs'=>'0px 0px 0px 0px'),
							'responsive' => true
						),

						'content'=>array(
							'type'=>'editor',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_CONTENT'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_CONTENT_DESC'),
							'std'=> 'You might remember the Dell computer commercials in which a youth reports this exciting news to his friends.<br />That they are about to get their new computer.'
						),

						'content_font_family'=>array(
							'type'=>'fonts',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_FONT_FAMILY'),
							'depends'=>array(array('content', '!=', '')),
							'selector'=> array(
								'type'=>'font',
								'font'=>'{{ VALUE }}',
								'css'=>' .sppb-carousel-pro-text .sppb-carousel-content { font-family: "{{ VALUE }}"; }'
							)
						),

						'content_fontsize'=>array(
							'type'=>'slider',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_CONTENT_FONTSIZE'),
							'max'=>100,
							'std'=>array('md'=>16, 'sm'=>14, 'xs'=>12),
							'responsive' => true
						),

						'content_lineheight'=>array(
							'type'=>'slider',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_CONTENT_LINEHEIGHT'),
							'max'=>100,
							'std'=>array('md'=>24, 'sm'=>22, 'xs'=>16),
							'responsive' => true
						),

						'content_color'=>array(
							'type'=>'color',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_CONTENT_COLOR'),
							'std'=>'#fff',
						),

						'content_padding'=>array(
							'type'=>'padding',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_CONTENT_PADDING'),
							'std'=>array('md'=>'20px 0px 30px 0px', 'sm'=>'15px 0px 20px 0px', 'xs'=>'10px 0px 10px 0px'),
							'responsive' => true
						),

						'content_margin'=>array(
							'type'=>'margin',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_MARGIN'),
							'std'=>array('md'=>'0px 0px 0px 0px', 'sm'=>'0px 0px 0px 0px', 'xs'=>'0px 0px 0px 0px'),
							'responsive' => true
						),

						'bg'=>array(
							'type'=>'media',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_IMAGE'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_IMAGE_DESC'),
							'format'=>'image',
							'std'=> array(
								'src' => 'https://sppagebuilder.com/addons/carousel/carousel-bg.jpg',
							)
						),

						//Button
						'button_text'=>array(
							'type'=>'text',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_TEXT'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_TEXT_DESC'),
							'std'=>'Learn More',
						),

						'button_font_family'=>array(
							'type'=>'fonts',
							'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_BUTTON_FONT_FAMILY'),
							'depends'=>array(array('button_text', '!=', '')),
							'selector'=> array(
								'type'=>'font',
								'font'=>'{{ VALUE }}',
								'css'=>'.sppb-carousel-pro-text .sppb-btn { font-family: "{{ VALUE }}"; }'
							)
						),

						'button_font_style'=>array(
							'type'=>'fontstyle',
							'title'=> Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_FONT_STYLE'),
							'depends'=> array(
								array('button_text', '!=', ''),
							)
						),

						'button_letterspace'=>array(
							'type'=>'select',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_LETTER_SPACING'),
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
							'depends'=> array(
								array('button_text', '!=', ''),
							)
						),

						'button_url'=>array(
							'type'=>'media',
							'format'=>'attachment',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_URL'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_URL_DESC'),
							'placeholder'=>'http://',
							'hide_preview'=>true,
							'depends'=> array(
								array('button_text', '!=', ''),
							)
						),

						'button_target'=>array(
							'type'=>'select',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB_DESC'),
							'values'=>array(
								''=>Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_SAME_WINDOW'),
								'_blank'=>Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_NEW_WINDOW'),
							),
							'depends'=> array(
								array('button_text', '!=', ''),
							)
						),

						'button_type'=>array(
							'type'=>'select',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE_DESC'),
							'values'=>array(
								'default'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_DEFAULT'),
								'primary'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_PRIMARY'),
								'secondary'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_SECONDARY'),
								'success'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_SUCCESS'),
								'info'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_INFO'),
								'warning'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_WARNING'),
								'danger'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_DANGER'),
								'dark'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_DARK'),
								'link'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
								'custom'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
							),
							'std'=>'success',
							'depends'=> array(
								array('button_text', '!=', ''),
							)
						),

						'button_appearance'=>array(
							'type'=>'select',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_DESC'),
							'values'=>array(
								''=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_FLAT'),
								'gradient'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_GRADIENT'),
								'outline'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_OUTLINE'),
								'3d'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_3D'),
							),
							'std'=>'flat',
							'depends'=> array(
								array('button_text', '!=', ''),
							)
						),

						'button_status'=>array(
							'type'=>'buttons',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_ENABLE_BACKGROUND_OPTIONS'),
							'std'=>'normal',
							'values'=>array(
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
							'depends'=>array(
								array('button_type', '=', 'custom'),
								array('button_text', '!=', ''),
							)
						),

						'button_background_color'=>array(
							'type'=>'color',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR_DESC'),
							'std' => '#444444',
							'depends'=> array(
								array('button_appearance', '!=', 'gradient'),
								array('button_type', '=', 'custom'),
								array('button_status', '=', 'normal'),
								array('button_text', '!=', ''),
							)
						),

						'button_background_gradient'=>array(
							'type'=>'gradient',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
							'std'=> array(
								"color" => "#B4EC51",
								"color2" => "#429321",
								"deg" => "45",
								"type" => "linear"
							),
							'depends'=>array(
								array('button_appearance', '=', 'gradient'),
								array('button_type', '=', 'custom'),
								array('button_status', '=', 'normal'),
								array('button_text', '!=', ''),
							)
						),

						'button_color'=>array(
							'type'=>'color',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR_DESC'),
							'std' => '#fff',
							'depends'=> array(
								array('button_type', '=', 'custom'),
								array('button_status', '=', 'normal'),
								array('button_text', '!=', ''),
							)
						),

						'button_background_color_hover'=>array(
							'type'=>'color',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR_HOVER'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR_HOVER_DESC'),
							'std' => '#222',
							'depends'=> array(
								array('button_appearance', '!=', 'gradient'),
								array('button_type', '=', 'custom'),
								array('button_status', '=', 'hover'),
								array('button_text', '!=', ''),
							)
						),

						'button_background_gradient_hover'=>array(
							'type'=>'gradient',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
							'std'=> array(
								"color" => "#429321",
								"color2" => "#B4EC51",
								"deg" => "45",
								"type" => "linear"
							),
							'depends'=>array(
								array('button_appearance', '=', 'gradient'),
								array('button_type', '=', 'custom'),
								array('button_status', '=', 'hover'),
								array('button_text', '!=', ''),
							)
						),

						'button_color_hover'=>array(
							'type'=>'color',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR_HOVER'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR_HOVER_DESC'),
							'std' => '#fff',
							'depends'=> array(
								array('button_type', '=', 'custom'),
								array('button_status', '=', 'hover'),
								array('button_text', '!=', ''),
							)
						),

						'button_size'=>array(
							'type'=>'select',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DESC'),
							'values'=>array(
								''=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DEFAULT'),
								'lg'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_LARGE'),
								'xlg'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_XLARGE'),
								'sm'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_SMALL'),
								'xs'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_EXTRA_SAMLL'),
							),
							'depends'=> array(
								array('button_text', '!=', ''),
							)
						),

						'button_shape'=>array(
							'type'=>'select',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_DESC'),
							'values'=>array(
								'rounded'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUNDED'),
								'square'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_SQUARE'),
								'round'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUND'),
							),
							'depends'=> array(
								array('button_text', '!=', ''),
							)
						),

						'button_block'=>array(
							'type'=>'select',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK_DESC'),
							'values'=>array(
								''=>Text::_('JNO'),
								'sppb-btn-block'=>Text::_('JYES'),
							),
							'depends'=> array(
								array('button_text', '!=', ''),
							)
						),

						'button_icon'=>array(
							'type'=>'icon',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON'),
							'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_DESC'),
							'depends'=> array(
								array('button_text', '!=', ''),
							)
						),

						'button_icon_position'=>array(
							'type'=>'select',
							'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_POSITION'),
							'values'=>array(
								'left'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
								'right'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
							),
							'depends'=> array(
								array('button_text', '!=', ''),
							)
						),

					),
				),
			),
		),
	)
);
