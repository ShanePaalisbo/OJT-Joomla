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

SpAddonsConfig::addonConfig(
	array(
		'type'=>'general',
		'addon_name'=>'sp_button_group',
		'pro'=>true,
		'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_BUTTON_GROUP'),
		'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_BUTTON_GROUP_DESC'),
		'category'=>'Content',
		'attr'=>false
	)
);
