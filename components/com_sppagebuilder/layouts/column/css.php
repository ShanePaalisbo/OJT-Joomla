<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2022 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

use Joomla\CMS\Factory;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Uri\Uri;

$options = $displayData['options'];
$custom_class  = (isset($options->class)) ? ' ' . $options->class : '';
$data_attr = '';
$doc = Factory::getDocument();

//Image lazy load
$config = ComponentHelper::getParams('com_sppagebuilder');	
$lazyload = $config->get('lazyloadimg', '0');
$placeholder = $config->get('lazyplaceholder', '');
$lazy_bg_image = '';
$placeholder_bg_image = '';

// Style
$style ='';
$style_sm ='';
$style_xs ='';

$column_styles = '';

if(isset($options->padding) && is_object($options->padding)){
	if (isset($options->padding->md) && $options->padding->md) $style .= SppagebuilderHelperSite::getPaddingMargin($options->padding->md, 'padding');
	if (isset($options->padding->sm) && $options->padding->sm) $style_sm .= SppagebuilderHelperSite::getPaddingMargin($options->padding->sm, 'padding');
	if (isset($options->padding->xs) && $options->padding->xs) $style_xs .= SppagebuilderHelperSite::getPaddingMargin($options->padding->xs, 'padding');
} else {
	if (isset($options->padding) && $options->padding) $style .= SppagebuilderHelperSite::getPaddingMargin($options->padding, 'padding');
	if (isset($options->padding_sm) && $options->padding_sm) $style_sm .= SppagebuilderHelperSite::getPaddingMargin($options->padding_sm, 'padding');
	if (isset($options->padding_xs) && $options->padding_xs) $style_xs .= SppagebuilderHelperSite::getPaddingMargin($options->padding_xs, 'padding');
}

// Box Shadow
if(isset($options->boxshadow) && $options->boxshadow){
    if(is_object($options->boxshadow)){
        $ho = (isset($options->boxshadow->ho) && $options->boxshadow->ho != '') ? $options->boxshadow->ho.'px' : '0px';
        $vo = (isset($options->boxshadow->vo) && $options->boxshadow->vo != '') ? $options->boxshadow->vo.'px' : '0px';
        $blur = (isset($options->boxshadow->blur) && $options->boxshadow->blur != '') ? $options->boxshadow->blur.'px' : '0px';
        $spread = (isset($options->boxshadow->spread) && $options->boxshadow->spread != '') ? $options->boxshadow->spread.'px' : '0px';
        $color = (isset($options->boxshadow->color) && $options->boxshadow->color != '') ? $options->boxshadow->color : '#fff';
        $style .= "box-shadow: ${ho} ${vo} ${blur} ${spread} ${color};";
    } else {
        $style .= "box-shadow: " . $options->boxshadow . ";";
    }
}

if (isset($options->color) && $options->color) $style .= 'color:'.$options->color.';';
if (isset($options->background) && $options->background) $style .= 'background-color:'.$options->background.';';

$background_image = (isset($options->background_image) && $options->background_image) ? $options->background_image : '';
$background_image_src = isset($background_image->src) ? $background_image->src : $background_image;

if($background_image_src) {
	if($lazyload){
		if($placeholder){
			$placeholder_bg_image .= 'background-image:url(' . $placeholder.');';
		}
		if(strpos($background_image_src, "http://") !== false || strpos($background_image_src, "https://") !== false){
			$lazy_bg_image .= 'background-image:url(' . $background_image_src.');';
		} else {
			$lazy_bg_image .= 'background-image:url('. Uri::base(true) . '/' . $background_image_src.');';
		}
	} else {
		if(strpos($background_image_src, "http://") !== false || strpos($background_image_src, "https://") !== false){
			$style .= 'background-image:url(' . $background_image_src.');';
		} else {
			$style .= 'background-image:url('. Uri::base(true) . '/' . $background_image_src.');';
		}
	}

	if (isset($options->background_repeat) && $options->background_repeat) $style .= 'background-repeat:'.$options->background_repeat.';';
	if (isset($options->background_size) && $options->background_size) $style .= 'background-size:'.$options->background_size.';';
	if (isset($options->background_attachment) && $options->background_attachment) $style .= 'background-attachment:'.$options->background_attachment.';';
	if (isset($options->background_position) && $options->background_position) $style .= 'background-position:'.$options->background_position.';';
}

if($style) {
	$column_styles .= '#column-id-' . $options->dynamicId . '{'. $style .'}';
}
if($style_sm) {
	$column_styles .= '@media (min-width: 768px) and (max-width: 991px) { #column-id-' . $options->dynamicId . '{'. $style_sm .'} }';
}
if($style_xs) {
	$column_styles .= '@media (max-width: 767px) { #column-id-' . $options->dynamicId . '{'. $style_xs .'} }';
}
if (isset($options->background_image) && $options->background_image) {
	if (isset($options->overlay) && $options->overlay) {
		$column_styles .= '#column-id-' . $options->dynamicId . ' > .sppb-column-overlay {background-color: '. $options->overlay .'}';
	}
}

echo $column_styles;
