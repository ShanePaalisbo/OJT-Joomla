<?php
/**
* @package SP Page Builder
* @author JoomShaper http://www.joomshaper.com
* @copyright Copyright (c) 2010 - 2021 JoomShaper
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

use Joomla\CMS\Language\Text;

//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

$row_settings = array(
	'type' 	=> 'content',
	'title' => 'Section',
	'attr' 	=> array(
		'general' => array(

			'admin_label'=>array(
				'type'=>'text',
				'title'=>Text::_('COM_SPPAGEBUILDER_ADMIN_LABEL'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_ADMIN_LABEL_DESC'),
				'std'=>''
			),

			'separator1'=>array(
				'type'=>'separator',
				'title'=>Text::_('Title Options')
			),

			'title'=>array(
				'type'=>'textarea',
				'title'=>Text::_('COM_SPPAGEBUILDER_SECTION_TITLE'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_SECTION_TITLE_DESC'),
				'css'=> 'min-height: 80px;',
				'std'=>''
			),

			'heading_selector'=>array(
				'type'=>'select',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_HEADINGS'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_HEADINGS_DESC'),
				'values'=>array(
					'h1'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_HEADINGS_H1'),
					'h2'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_HEADINGS_H2'),
					'h3'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_HEADINGS_H3'),
					'h4'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_HEADINGS_H4'),
					'h5'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_HEADINGS_H5'),
					'h6'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_HEADINGS_H6'),
				),
				'std'=>'h3',
				'depends' => array(
					array('title', '!=', ''),
				),
			),

			'title_fontsize'=>array(
				'type'=>'slider',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE_FONT_SIZE'),
				'std'=>'',
				'depends' => array(
					array('title', '!=', ''),
				),
				'responsive' => true,
				'max'=>500
			),

			'title_fontweight'=>array(
				'type'=>'text',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE_FONT_WEIGHT'),
				'std'=>'',
				'depends' => array(
					array('title', '!=', ''),
				),
			),

			'title_text_color'=>array(
				'type'=>'color',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE_TEXT_COLOR'),
				'depends' => array(
					array('title', '!=', ''),
				),
			),

			'title_margin_top'=>array(
				'type'=>'number',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_TOP'),
				'placeholder'=>'10',
				'depends' => array(
					array('title', '!=', ''),
				),
				'responsive' => true
			),

			'title_margin_bottom'=>array(
				'type'=>'number',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_BOTTOM'),
				'placeholder'=>'10',
				'depends' => array(
					array('title', '!=', ''),
				),
				'responsive' => true
			),

			'separator2'=>array(
				'type'=>'separator',
				'title'=>Text::_('Subtitle Options')
			),

			'subtitle'=>array(
				'type'=>'textarea',
				'title'=>Text::_('COM_SPPAGEBUILDER_SECTION_SUBTITLE'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_SECTION_SUBTITLE_DESC'),
				'css'=> 'min-height: 120px;',
			),

			'subtitle_fontsize'=>array(
				'type'=>'slider',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_SUB_TITLE_FONT_SIZE'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_SUB_TITLE_FONT_SIZE_DESC'),
				'responsive'=>true,
				'depends' => array(
					array('subtitle', '!=', ''),
				),
			),

			'title_position'=>array(
				'type'=>'select',
				'title'=>Text::_('COM_SPPAGEBUILDER_TITLE_SUBTITLE_POSITION'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_TITLE_SUBTITLE_POSITION_DESC'),
				'values'=>array(
					'sppb-text-left'=>Text::_('COM_SPPAGEBUILDER_LEFT'),
					'sppb-text-center'=>Text::_('COM_SPPAGEBUILDER_CENTER'),
					'sppb-text-right'=>Text::_('COM_SPPAGEBUILDER_RIGHT')
				),
				'std'=>'sppb-text-center',
			),

			'columns_align_center'=>array(
				'type'=>'checkbox',
				'title'=>Text::_('COM_SPPAGEBUILDER_ROW_COLUMNS_ALIGN_CENTER'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_ROW_COLUMNS_ALIGN_CENTER_DESC'),
				'std'=>0
			),

			'fullscreen'=>array(
				'type'=>'checkbox',
				'title'=>Text::_('COM_SPPAGEBUILDER_FULLSCREEN'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_FULLSCREEN_DESC'),
				'std'=>0,
			),

			'no_gutter'=>array(
				'type'=>'checkbox',
				'title'=>Text::_('COM_SPPAGEBUILDER_ROW_NO_GUTTER'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_ROW_NO_GUTTER_DESC'),
				'std'=>0,
			),

			'id'=>array(
				'type'=>'text',
				'title'=>Text::_('COM_SPPAGEBUILDER_SECTION_ID'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_SECTION_ID_DESC')
			),

			'class'=>array(
				'type'=>'text',
				'title'=>Text::_('COM_SPPAGEBUILDER_CSS_CLASS'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_CSS_CLASS_DESC')
			),

		),

		'style' => array(

			'padding'=>array(
				'type'=>'padding',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
				'std'=>'50px 0px 50px 0px',
				'placeholder'=>'10px 10px 10px 10px',
				'responsive' => true
			),

			'margin'=>array(
				'type'=>'margin',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_DESC'),
				'std'=>'0px 0px 0px 0px',
				'placeholder'=>'10px 10px 10px 10px',
				'responsive' => true
			),

			'color'=>array(
				'type'=>'color',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT_COLOR'),
			),

			'background_color'=>array(
				'type'=>'color',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
			),

			'background_image'=>array(
				'type'=>'media',
				'format'=>'image',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_IMAGE'),
				'std'=>'',
				'show_input' => true
			),

			'overlay'=>array(
				'type'=>'color',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_OVERLAY'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_OVERLAY_DESC')
			),

			'background_repeat'=>array(
				'type'=>'select',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_REPEAT'),
				'values'=>array(
					'no-repeat'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_NO_REPEAT'),
					'repeat'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_REPEAT_ALL'),
					'repeat-x'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_REPEAT_HORIZONTALLY'),
					'repeat-y'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_REPEAT_VERTICALLY'),
					'inherit'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_INHERIT'),
				),
				'std'=>'no-repeat',
				'depends' => array(
					array('background_image', '!=', ''),
				),
			),

			'background_size'=>array(
				'type'=>'select',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_SIZE'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_SIZE_DESC'),
				'values'=>array(
					'cover'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_SIZE_COVER'),
					'contain'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_SIZE_CONTAIN'),
					'inherit'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_INHERIT'),
				),
				'std'=>'cover',
				'depends' => array(
					array('background_image', '!=', ''),
				),
			),

			'background_attachment'=>array(
				'type'=>'select',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_ATTACHMENT'),
				'values'=>array(
					'fixed'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_ATTACHMENT_FIXED'),
					'scroll'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_ATTACHMENT_SCROLL'),
					'inherit'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_INHERIT'),
				),
				'std'=>'fixed',
				'depends' => array(
					array('background_image', '!=', ''),
				),
			),

			'background_position'=>array(
				'type'=>'select',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_POSITION'),
				'values'=>array(
					'0 0'=>Text::_('COM_SPPAGEBUILDER_LEFT_TOP'),
					'0 50%'=>Text::_('COM_SPPAGEBUILDER_LEFT_CENTER'),
					'0 100%'=>Text::_('COM_SPPAGEBUILDER_LEFT_BOTTOM'),
					'50% 0'=>Text::_('COM_SPPAGEBUILDER_CENTER_TOP'),
					'50% 50%'=>Text::_('COM_SPPAGEBUILDER_CENTER_CENTER'),
					'50% 100%'=>Text::_('COM_SPPAGEBUILDER_CENTER_BOTTOM'),
					'100% 0'=>Text::_('COM_SPPAGEBUILDER_RIGHT_TOP'),
					'100% 50%'=>Text::_('COM_SPPAGEBUILDER_RIGHT_CENTER'),
					'100% 100%'=>Text::_('COM_SPPAGEBUILDER_RIGHT_BOTTOM'),
				),
				'std'=>'0 0',
				'depends' => array(
					array('background_image', '!=', ''),
				),
			),

			'background_video'=>array(
				'type'=>'checkbox',
				'title'=>Text::_('COM_SPPAGEBUILDER_ROW_BACKGROUND_VIDEO_ENABLE'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_ROW_BACKGROUND_VIDEO_ENABLE_DESC'),
				'std'=>'0',
			),

			'background_video_mp4'=>array(
				'type'=>'media',
				'format'=>'video',
				'title'=>Text::_('COM_SPPAGEBUILDER_ROW_BACKGROUND_VIDEO_MP4'),
				'depends'=>array(
					array('background_video','=',1),
				)
			),

			'background_video_ogv'=>array(
				'type'=>'media',
				'format'=>'video',
				'title'=>Text::_('COM_SPPAGEBUILDER_ROW_BACKGROUND_VIDEO_OGV'),
				'depends'=>array(
					array('background_video','=',1),
				)
			),

			'separator_responsive'=>array(
				'type'=>'separator',
				'title'=>Text::_('COM_SPPAGEBUILDER_GLOBAL_RESPONSIVE')
			),

			'hidden_xs' 		=> array(
				'type'		=> 'checkbox',
				'title'		=> Text::_('COM_SPPAGEBUILDER_GLOBAL_HIDDEN_XS'),
				'desc'		=> Text::_('COM_SPPAGEBUILDER_GLOBAL_HIDDEN_XS_DESC'),
				'std'		=> '',
			),
			'hidden_sm' 		=> array(
				'type'		=> 'checkbox',
				'title'		=> Text::_('COM_SPPAGEBUILDER_GLOBAL_HIDDEN_SM'),
				'desc'		=> Text::_('COM_SPPAGEBUILDER_GLOBAL_HIDDEN_SM_DESC'),
				'std'		=> '',
			),
			'hidden_md' 		=> array(
				'type'		=> 'checkbox',
				'title'		=> Text::_('COM_SPPAGEBUILDER_GLOBAL_HIDDEN_MD'),
				'desc'		=> Text::_('COM_SPPAGEBUILDER_GLOBAL_HIDDEN_MD_DESC'),
				'std'		=> '',
			),

		),

		'animation' => array(
			'animation'=>array(
				'type'=>'animation',
				'title'=>Text::_('COM_SPPAGEBUILDER_ANIMATION'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_ANIMATION_DESC')
			),

			'animationduration'=>array(
				'type'=>'number',
				'title'=>Text::_('COM_SPPAGEBUILDER_ANIMATION_DURATION'),
				'desc'=> Text::_('COM_SPPAGEBUILDER_ANIMATION_DURATION_DESC'),
				'std'=>'300',
				'placeholder'=>'300',
			),

			'animationdelay'=>array(
				'type'=>'number',
				'title'=>Text::_('COM_SPPAGEBUILDER_ANIMATION_DELAY'),
				'desc'=>Text::_('COM_SPPAGEBUILDER_ANIMATION_DELAY_DESC'),
				'std'=>'0',
				'placeholder'=>'300',
			),
		),
	)
);
