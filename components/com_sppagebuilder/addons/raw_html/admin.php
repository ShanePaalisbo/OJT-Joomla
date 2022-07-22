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
		'type'=>'content',
		'addon_name'=>'sp_raw_html',
		'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_RAW_HTML'),
		'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_RAW_HTML_DESC'),
		'category'=>'General',
		'attr'=>false,
		'pro'=>true,
	)
);
