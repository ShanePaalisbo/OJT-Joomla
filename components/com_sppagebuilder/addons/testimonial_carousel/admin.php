<?php
/**
* @package SP Page Builder
* @author JoomShaper http://www.joomshaper.com
* @copyright Copyright (c) 2010 - 2021 JoomShaper
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('Restricted access');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig(
	array(
		'type' => 'repeatable',
		'addon_name'=>'testimonial_carousel',
		'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_CAROUSEL'),
		'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_CAROUSEL_DESC'),
		'category'=>'Content',
		'attr'=>false,
		'pro'=>true,
	)
);
