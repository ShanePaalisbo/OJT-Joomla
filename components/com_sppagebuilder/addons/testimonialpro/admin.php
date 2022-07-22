<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2022 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig(
	array(
		'type'=>'repeatable',
		'addon_name'=>'sp_testimonialpro',
		'title'=>Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO'),
		'desc'=>Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_DESC'),
		'category'=>'Slider',
		'attr'=>false,
		'pro'=>true,
	)
);
