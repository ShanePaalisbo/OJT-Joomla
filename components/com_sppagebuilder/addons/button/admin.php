<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2022 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Language\Text;

//no direct accees
defined('_JEXEC') or die('Restricted access');
SpAddonsConfig::addonConfig(
        array(
            'type' => 'general',
            'addon_name' => 'sp_button',
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_BUTTON'),
            'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_BUTTON_DESC'),
            'category' => 'Content',
            'attr' => array(
                'general' => array(
                    'admin_label' => array(
                        'type' => 'text',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
                        'std' => ''
                    ),
                    'text' => array(
                        'type' => 'text',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_TEXT'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_TEXT_DESC'),
                        'std' => 'Button',
                    ),
                    'alignment' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_CONTENT_ALIGNMENT'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_CONTENT_ALIGNMENT_DESC'),
                        'values' => array(
                            'sppb-text-left' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                            'sppb-text-center' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
                            'sppb-text-right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                        ),
                        'std' => 'sppb-text-left',
                    ),
                    'font_family' => array(
                        'type' => 'fonts',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_FONT_FAMILY'),
                        'selector' => array(
                            'type' => 'font',
                            'font' => '{{ VALUE }}',
                            'css' => '.sppb-btn { font-family: "{{ VALUE }}"; }'
                        )
                    ),
                    'font_style' => array(
                        'type' => 'fontstyle',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_FONT_STYLE'),
                    ),
                    'letterspace' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_LETTER_SPACING'),
                        'values' => array(
                            '0' => 'Default',
                            '1px' => '1px',
                            '2px' => '2px',
                            '3px' => '3px',
                            '4px' => '4px',
                            '5px' => '5px',
                            '6px' => '6px',
                            '7px' => '7px',
                            '8px' => '8px',
                            '9px' => '9px',
                            '10px' => '10px'
                        ),
                        'std' => '0'
                    ),
                    'url' => array(
                        'type' => 'media',
                        'format' => 'attachment',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_URL'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_URL_DESC'),
                        'placeholder' => 'http://',
                        'hide_preview' => true,
                    ),
                    'target' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB_DESC'),
                        'values' => array(
                            '' => Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_SAME_WINDOW'),
                            '_blank' => Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_NEW_WINDOW'),
                        ),
                        'depends' => array(array('url', '!=', '')),
                    ),
                    'type' => array(
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
                        'std' => 'default',
                    ),
                    'appearance' => array(
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
                        'depends' => array(
                            array('type', '!=', 'link'),
                        )
                    ),
                    'fontsize' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_FONT_SIZE'),
                        'std' => array('md' => 16),
                        'responsive' => true,
                        'max' => 400,
                        'depends' => array(
                            array('type', '=', 'custom'),
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
                            array('type', '=', 'custom'),
                        )
                    ),
                    'background_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR_DESC'),
                        'std' => '#03E16D',
                        'depends' => array(
                            array('appearance', '!=', 'gradient'),
                            array('type', '=', 'custom'),
                            array('button_status', '=', 'normal'),
                        )
                    ),
                    'background_gradient' => array(
                        'type' => 'gradient',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
                        'std' => array(
                            "color" => "#B4EC51",
                            "color2" => "#429321",
                            "deg" => "45",
                            "type" => "linear"
                        ),
                        'depends' => array(
                            array('appearance', '=', 'gradient'),
                            array('type', '=', 'custom'),
                            array('button_status', '=', 'normal'),
                        )
                    ),
                    'color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR_DESC'),
                        'std' => '#FFFFFF',
                        'depends' => array(
                            array('type', '=', 'custom'),
                            array('button_status', '=', 'normal'),
                        ),
                    ),
                    'background_color_hover' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR_HOVER'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BACKGROUND_COLOR_HOVER_DESC'),
                        'std' => '#00E66E',
                        'depends' => array(
                            array('appearance', '!=', 'gradient'),
                            array('type', '=', 'custom'),
                            array('button_status', '=', 'hover'),
                        )
                    ),
                    'background_gradient_hover' => array(
                        'type' => 'gradient',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
                        'std' => array(
                            "color" => "#429321",
                            "color2" => "#B4EC51",
                            "deg" => "45",
                            "type" => "linear"
                        ),
                        'depends' => array(
                            array('appearance', '=', 'gradient'),
                            array('type', '=', 'custom'),
                            array('button_status', '=', 'hover'),
                        )
                    ),
                    'color_hover' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR_HOVER'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR_HOVER_DESC'),
                        'std' => '#FFFFFF',
                        'depends' => array(
                            array('type', '=', 'custom'),
                            array('button_status', '=', 'hover'),
                        ),
                    ),
                    //Link Button Style
                    'link_button_status' => array(
                        'type' => 'buttons',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE'),
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
                            array('type', '=', 'link'),
                        )
                    ),
                    'link_button_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                        'std' => '',
                        'depends' => array(
                            array('type', '=', 'link'),
                            array('link_button_status', '=', 'normal'),
                        )
                    ),
                    'link_button_border_width' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
                        'max'=> 30,
                        'std' => '',
                        'depends' => array(
                            array('type', '=', 'link'),
                            array('link_button_status', '=', 'normal'),
                        )
                    ),
                    'link_border_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                        'std' => '',
                        'depends' => array(
                            array('type', '=', 'link'),
                            array('link_button_status', '=', 'normal'),
                        )
                    ),
                    'link_button_padding_bottom' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_PADDING_BOTTOM'),
                        'max'=>100,
                        'std' => '',
                        'depends' => array(
                            array('type', '=', 'link'),
                            array('link_button_status', '=', 'normal'),
                        )
                    ),
                    //Link Hover
                    'link_button_hover_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR_HOVER'),
                        'std' => '',
                        'depends' => array(
                            array('type', '=', 'link'),
                            array('link_button_status', '=', 'hover'),
                        )
                    ),
                    'link_button_border_hover_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR_HOVER'),
                        'std' => '',
                        'depends' => array(
                            array('type', '=', 'link'),
                            array('link_button_status', '=', 'hover'),
                        )
                    ),
                    'button_padding' => array(
                        'type' => 'padding',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
                        'std' => '',
                        'depends' => array(
                            array('type', '=', 'custom'),
                        ),
                        'responsive' => true
                    ),
                    'size' => array(
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
                    ),
                    'shape' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_DESC'),
                        'values' => array(
                            'rounded' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUNDED'),
                            'square' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_SQUARE'),
                            'round' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUND'),
                        ),
                        'depends' => array(
                            array('type', '!=', 'link'),
                        )
                    ),
                    'block' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK_DESC'),
                        'values' => array(
                            '' => Text::_('JNO'),
                            'sppb-btn-block' => Text::_('JYES'),
                        ),
                        'depends' => array(
                            array('type', '!=', 'link'),
                        )
                    ),
                    'icon' => array(
                        'type' => 'icon',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_DESC'),
                    ),
                    'icon_margin' => array(
                        'type' =>'margin',
                        'title' =>Text::_('COM_SPPAGEBUILDER_TAB_ICON_MARGIN'),
                        'responsive'=>true,
                        'std'=>'0px 0px 0px 0px',
                    ),
                    'icon_position' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_POSITION'),
                        'values' => array(
                            'left' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                            'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                        ),
                        'std' => 'left',
                    ),
                    'class' => array(
                        'type' => 'text',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
                        'std' => ''
                    ),
                ),
            ),
        )
);
