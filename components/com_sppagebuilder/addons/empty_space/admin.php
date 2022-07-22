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
		'addon_name'=>'empty_space',
		'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_EMPTY_SPACE'),
		'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_EMPTY_SPACE_DESC'),
		'category'=>'General',
		'attr'=>array(
			'general' => array(

				'admin_label'=>array(
					'type'=>'text',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std'=> ''
				),

				'gap'=>array(
					'type'=>'slider',
					'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_EMPTY_SPACE_GAP'),
					'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_EMPTY_SPACE_GAP_DESC'),
					'min'=>5,
					'max'=>400,
					'std'=>array('md'=>40, 'sm'=>30, 'xs'=>20),
					'responsive'=>true
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
