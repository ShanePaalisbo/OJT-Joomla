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
            'type' => 'repeatable',
            'addon_name' => 'sp_tab',
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB'),
            'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_DESC'),
            'category' => 'Content',
            'attr' => array(
                'general' => array(
                    'admin_label' => array(
                        'type' => 'text',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
                        'std' => ''
                    ),
                    'title' => array(
                        'type' => 'text',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
                        'std' => ''
                    ),
                    'heading_selector' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_DESC'),
                        'values' => array(
                            'h1' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H1'),
                            'h2' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H2'),
                            'h3' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H3'),
                            'h4' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H4'),
                            'h5' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H5'),
                            'h6' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H6'),
                        ),
                        'std' => 'h3',
                        'depends' => array(array('title', '!=', '')),
                    ),
                    'title_font_family' => array(
                        'type' => 'fonts',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_FAMILY'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_FAMILY_DESC'),
                        'depends' => array(array('title', '!=', '')),
                        'selector' => array(
                            'type' => 'font',
                            'font' => '{{ VALUE }}',
                            'css' => '.sppb-addon-title { font-family: "{{ VALUE }}"; }'
                        )
                    ),
                    'title_fontsize' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_SIZE'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_SIZE_DESC'),
                        'std' => '',
                        'depends' => array(array('title', '!=', '')),
                        'max' => 400,
                        'responsive' => true
                    ),
                    'title_lineheight' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_LINE_HEIGHT'),
                        'std' => '',
                        'depends' => array(array('title', '!=', '')),
                        'max' => 400,
                        'responsive' => true
                    ),
                    'title_font_style' => array(
                        'type' => 'fontstyle',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_STYLE'),
                        'depends' => array(array('title', '!=', '')),
                    ),
                    'title_letterspace' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LETTER_SPACING'),
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
                        'std' => '0',
                        'depends' => array(array('title', '!=', '')),
                    ),
                    'title_text_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR_DESC'),
                        'depends' => array(array('title', '!=', '')),
                    ),
                    'title_margin_top' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_TOP'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_TOP_DESC'),
                        'placeholder' => '10',
                        'depends' => array(array('title', '!=', '')),
                        'max' => 400,
                        'responsive' => true
                    ),
                    'title_margin_bottom' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_BOTTOM'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_BOTTOM_DESC'),
                        'placeholder' => '10',
                        'depends' => array(array('title', '!=', '')),
                        'max' => 400,
                        'responsive' => true
                    ),
                    'style' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_STYLE'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_STYLE_DESC'),
                        'values' => array(
                            'modern' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_STYLE_MODERN'),
                            'tabs' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_STYLE_DEFAULT'),
                            'pills' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_STYLE_PILLS'),
                            'lines' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_STYLE_LINES'),
                            'custom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                        ),
                        'std' => 'tabs'
                    ),
                    // Repeatable Item
                    'sp_tab_item' => array(
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEMS'),
                        'attr' => array(
                            'title' => array(
                                'type' => 'text',
                                'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_TITLE'),
                                'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_TITLE_DESC'),
                                'std' => 'Tab'
                            ),
                            'subtitle' => array(
                                'type' => 'text',
                                'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_SUBTITLE'),
                                'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_SUBTITLE_DESC'),
                                'std' => 'Subtitle',
                            ),
                            'image_or_icon'=>array(
                                'type'=>'buttons',
                                'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_ICON_OR_IMAGE'),
                                'std'=>'icon',
                                'values'=>array(
                                    array(
                                        'label' => 'Icon',
                                        'value' => 'icon'
                                    ),
                                    array(
                                        'label' => 'Image',
                                        'value' => 'image'
                                    ),
                                ),
                                'tabs' => true,
                            ),
                            'icon' => array(
                                'type' => 'icon',
                                'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_ICON'),
                                'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_ICON_DESC'),
                                'std' => '',
                                'depends' => array(
                                    array('image_or_icon', '=', 'icon'),
                                )
                            ),
                            'image' => array(
                                'type' => 'media',
                                'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_IMAGE'),
                                'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_IMAGE_DESC'),
                                'depends' => array(
                                    array('image_or_icon', '=', 'image'),
                                ),
                                'std'=> array(
                                    'src' => '',
                                )
                            ),
                            'content' => array(
                                'type' => 'builder',
                                'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_TEXT'),
                                'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_TEXT_DESC'),
                                'std' => 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.'
                            ),
                        ),
                    ),
                    //Custom Tab Style
                    'custom_tab_style'=>array(
                        'type'=>'buttons',
                        'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TAB_STYLE_OPTIONS'),
                        'std'=>'navigation',
                        'values'=>array(
                            array(
                                'label' => 'Navigation',
                                'value' => 'navigation'
                            ),
                            array(
                                'label' => 'Nav Icon or Image',
                                'value' => 'icon_image'
                            ),
                            array(
                                'label' => 'Content',
                                'value' => 'content'
                            ),
                        ),
                        'tabs' => true,
                        'depends' => array(
                            array('style', '=', 'custom')
                        ),
                    ),
                    'tab_separator'=>array(
                        'type'=>'separator',
                        'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TAB_SEPERATOR'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'nav_position'=>array(
                        'type'=>'select',
                        'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TAB_NAV_POSITION'),
                        'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_TAB_NAV_POSITION_DESC'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                        'values' => array(
                            'nav-left' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                            'nav-right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                        ),
                    ),
                    'nav_gutter' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_NAV_GUTTER'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_NAV_GUTTER_DESC'),
                        'responsive' => true,
                        'max' => 100,
                        'std' => array('md' => 15),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'nav_style' => array(
                        'type' => 'buttons',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_NAV_STYLE'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_NAV_STYLE_DESC'),
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
                            array(
                                'label' => 'Active',
                                'value' => 'active'
                            ),
                        ),
                        'tabs' => true,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'nav_width' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_NAV_WIDTH'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_NAV_WIDTH_DESC'),
                        'responsive' => true,
                        'max' => 100,
                        'std' => array('md'=>30, 'sm'=>30, 'xs'=> 30),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'nav_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_NAV_COLOR'),
                        'std' => '#fff',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'nav_bg_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_NAV_BG_COLOR'),
                        'std' => '#000',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'nav_fontsize' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_NAV_FONT_SIZE'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                        'max' => 400,
                        'responsive' => true,
                        'std' => array('md'=>16),
                    ),
                    'nav_lineheight'=>array(
                        'type'=>'slider',
                        'title'=>Text::_('COM_SPPAGEBUILDER_TAB_NAV_LINEHEIGHT'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                        'responsive' => true,
                        'max'=> 400,
                        'std' => array('md'=>''),
                    ),
                    'nav_font_family'=>array(
                        'type'=>'fonts',
                        'title'=>Text::_('COM_SPPAGEBUILDER_TAB_NAV_FONT_FAMILY'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                        'selector'=> array(
                            'type'=>'font',
                            'font'=>'{{ VALUE }}',
                            'css'=>'.sppb-nav-custom a{ font-family: "{{ VALUE }}"; }'
                        )
                    ),
                    'nav_font_style'=>array(
                        'type'=>'fontstyle',
                        'title'=> Text::_('COM_SPPAGEBUILDER_TAB_NAV_FONT_STYLE'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'nav_border' => array(
                        'type' => 'margin',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_NAV_BORDER'),
                        'std' => '1px 1px 1px 1px',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'nav_border_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_NAV_BORDER_COLOR'),
                        'std' => '#e5e5e5',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'nav_border_radius' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_NAV_BORDER_RADIUS'),
                        'std' => '',
                        'max' => 400,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'nav_margin' => array(
                        'type' => 'margin',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_NAV_MARGIN'),
                        'responsive' => true,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                        'std' => '0px 0px 5px 0px',
                    ),
                    'nav_padding' => array(
                        'type' => 'padding',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_NAV_PADDING'),
                        'responsive' => true,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                        'std' => '10px 10px 10px 10px',
                    ),
                    'nav_text_align' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_TEXT_POSITION'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                        'values' => array(
                            'sppb-text-left' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                            'sppb-text-center' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
                            'sppb-text-right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                        ),
                        'std' => 'left',
                    ),
                    //Hover Nav Style
                    'hover_tab_bg' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_HOVER_BG'),
                        'std' => '',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'hover'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'hover_tab_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_HOVER_COLOR'),
                        'std' => '',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'hover'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'hover_tab_border_width' => array(
                        'type' => 'margin',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_HOVER_BORDER'),
                        'std' => '',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'hover'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'hover_tab_border_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_HOVER_BORDER_COLOR'),
                        'std' => '',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'hover'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    //Active Nav Style
                    'active_tab_bg' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ACTIVE_BG'),
                        'std' => '#e5e5e5',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'active'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'active_tab_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ACTIVE_COLOR'),
                        'std' => '#333333',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'active'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'active_tab_border_width' => array(
                        'type' => 'margin',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ACTIVE_BORDER'),
                        'std' => '',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'active'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    'active_tab_border_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ACTIVE_BORDER_COLOR'),
                        'std' => '',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'active'),
                            array('custom_tab_style', '=', 'navigation'),
                        ),
                    ),
                    //Icon or Image style
                    'image_or_icon_style'=>array(
                        'type'=>'buttons',
                        'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_ICON_OR_IMAGE_STYLE'),
                        'std'=>'icon_style',
                        'values'=>array(
                            array(
                                'label' => 'Icon Style',
                                'value' => 'icon_style'
                            ),
                            array(
                                'label' => 'Image Style',
                                'value' => 'image_style'
                            ),
                        ),
                        'tabs' => true,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'icon_image'),
                        ),
                    ),
                    //Icon Style
                    'icon_separator'=>array(
                        'type'=>'separator',
                        'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TAB_ICON_OPTIONS'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'icon_style'),
                        ),
                    ),
                    'nav_icon_postion' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_ICON_POSITION'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'icon_style'),
                        ),
                        'values' => array(
                            'top' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TOP'),
                            'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                            'bottom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BOTTOM'),
                            'left' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                        ),
                        'std' => 'left',
                    ),
                    'icon_fontsize' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_ICON_SIZE'),
                        'responsive' => true,
                        'max' => 400,
                        'std' => array('md'=>16),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'icon_style'),
                        ),
                    ),
                    'icon_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_ICON_COLOR'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'icon_style'),
                        ),
                    ),
                    'icon_color_hover' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_ICON_COLOR_HOVER'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'hover'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'icon_style'),
                        ),
                    ),
                    'icon_color_active' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_ICON_COLOR_ACTIVE'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'active'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'icon_style'),
                        ),
                    ),
                    'icon_margin' => array(
                        'type' => 'margin',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_ICON_MARGIN'),
                        'responsive' => true,
                        'std' => '0px',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'icon_style'),
                        ),
                        'std' => '',
                    ),
                    //Image Style
                    'image_separator'=>array(
                        'type'=>'separator',
                        'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TAB_IMG_OPTIONS'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'image_style'),
                        ),
                    ),
                    'nav_image_postion' => array(
                        'type' => 'select',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_ALIGNMENT'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'image_style'),
                        ),
                        'values' => array(
                            'top' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TOP'),
                            'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                            'bottom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BOTTOM'),
                            'left' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                        ),
                        'std' => 'left',
                    ),
                    'image_height' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_IMG_HEIGHT'),
                        'responsive' => true,
                        'max' => 200,
                        'std' => array('md'=>30),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'image_style'),
                        ),
                    ),
                    'image_width' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_IMG_WIDTH'),
                        'responsive' => true,
                        'max' => 200,
                        'std' => array('md'=>30),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'image_style'),
                        ),
                    ),
                    'image_margin' => array(
                        'type' => 'margin',
                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                        'responsive' => true,
                        'std' => '0px',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('nav_style', '=', 'normal'),
                            array('custom_tab_style', '=', 'icon_image'),
                            array('image_or_icon_style', '=', 'image_style'),
                        ),
                        'std' => '',
                    ),
                    //Content Style
                    'content_separator'=>array(
                        'type'=>'separator',
                        'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_OPTIONS'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'content_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_CONTENT_COLOR'),
                        'std' => '#000',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'content_backround' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_BG'),
                        'std' => '#e5e5e5',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'content_fontsize' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_CONTENT_FONT_SIZE'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                        'max' => 400,
                        'responsive' => true,
                        'std' => array('md'=>''),
                    ),
                    'content_lineheight'=>array(
                        'type'=>'slider',
                        'title'=>Text::_('COM_SPPAGEBUILDER_TAB_CONTENT_LINEHEIGHT'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                        'responsive' => true,
                        'max'=> 400,
                        'std' => array('md'=>''),
                    ),
                    'content_font_family'=>array(
                        'type'=>'fonts',
                        'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_FONT_FAMILY'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                        'selector'=> array(
                            'type'=>'font',
                            'font'=>'{{ VALUE }}',
                            'css'=>'.sppb-tab-custom-content > div{ font-family: "{{ VALUE }}"; }'
                        )
                    ),
                    'content_font_style'=>array(
                        'type'=>'fontstyle',
                        'title'=> Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_FONTSTYLE'),
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'content_border' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_CONTENT_BORDER'),
                        'std' => 1,
                        'max' => 20,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'content_border_radius' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_CONTEN_BORDER_RADIUS'),
                        'std' => '',
                        'max' => 400,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'content_border_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_CONTENT_BORDER_COLOR'),
                        'std' => '#e5e5e5',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'show_boxshadow' => array(
                        'type' => 'checkbox',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_BOXSHADOW_SHOW'),
                        'desc' => Text::_('COM_SPPAGEBUILDER_TAB_BOXSHADOW_SHOW_DESC'),
                        'std' => 1,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'shadow_color' => array(
                        'type' => 'color',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_BOXSHADOW_COLOR'),
                        'std' => '#000',
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('show_boxshadow', '=', 1),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'shadow_horizontal' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_SHADOW_HORIZONTAL'),
                        'std' => '',
                        'max' => 100,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('show_boxshadow', '=', 1),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'shadow_vertical' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_SHADOW_VERTICAL'),
                        'std' => '',
                        'max' => 100,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('show_boxshadow', '=', 1),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'shadow_blur' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_SHADOW_BLUR'),
                        'std' => '',
                        'max' => 100,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('show_boxshadow', '=', 1),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'shadow_spread' => array(
                        'type' => 'slider',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_SHADOW_SPREAD'),
                        'std' => '',
                        'max' => 100,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('show_boxshadow', '=', 1),
                            array('custom_tab_style', '=', 'content'),
                        ),
                    ),
                    'content_margin' => array(
                        'type' => 'margin',
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_MARGIN'),
                        'responsive' => true,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                        'std' => '',
                    ),
                    'content_padding' => array(
                        'type' => 'padding',
                        'title' => Text::_('COM_SPPAGEBUILDER_TAB_CONTENT_PADDING'),
                        'responsive' => true,
                        'depends' => array(
                            array('style', '=', 'custom'),
                            array('custom_tab_style', '=', 'content'),
                        ),
                        'std' => '10px 10px 10px 10px',
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
