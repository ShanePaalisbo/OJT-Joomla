<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2022 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Uri\Uri;

//no direct accees
defined('_JEXEC') or die();

$media = '';
$item = $displayData['media'];
$ext = File::getExt($item->path);
$app = Factory::getApplication();
$support = $app->input->post->get('support', 'image', 'STRING');
$filename = $item->title . '.' . $ext;

$innerHTML = false;
if(isset($displayData['innerHTML']) && $displayData['innerHTML']) {
	$innerHTML = true;
}

if(isset($displayData['support']) && $displayData['support']) {
	$support = $displayData['support'];
}

if(!$innerHTML) {
	$class = ' sp-pagebuilder-media-unsupported';
	if($support == $item->type) {
		$class = ' sp-pagebuilder-media-supported';
	}

	if($support == 'all') {
		$class = ' sp-pagebuilder-media-supported';
	}
	$media .= '<li class="sp-pagebuilder-media-item' . $class . ' sp-pagebuilder-media-type-' . $item->type . '" data-id="' . $item->id . '" data-type="' . $item->type . '" data-src="'. Uri::root(true) . '/' . $item->path .'" data-path="'. $item->path .'">';
}

if($item->type == 'image') {

	if(isset($item->thumb) && $item->thumb) {
		$thumbnail = Uri::root(true) . '/' . $item->thumb;
	} else {
		$thumbnail = Uri::root(true) . '/' . $item->path;
	}

	$media .= '<div class="sp-pagebuilder-media-item-image">';
	$media .= '<div title="'.$filename.'" class="sp-pagebuilder-media-title">' . $filename .'</div>';
	$media .= '<div class="sp-pagebuilder-media-item-thumbnail" style="background-image: url('. $thumbnail .');"></div>';
	$media .= '</div>';

} else {

	if($item->type == 'video') {
		$box_class = 'video';
		$icon_class = 'film';
	}
	else if ($item->type == 'audio')
	{
		$box_class = 'audio';
		$icon_class = 'music';
	}
	else if ($item->type == 'attachment')
	{
		if(($ext == 'doc') || ($ext == 'docx') || ($ext == 'odt'))
		{
			$box_class = 'attachment-document';
			$icon_class = 'file-word-o';
		}
		elseif(($ext == 'key') || ($ext == 'ppt') || ($ext == 'pptx') || ($ext == 'pps') || ($ext == 'ppsx'))
		{
			$box_class = 'attachment-presentation';
			$icon_class = 'file-powerpoint-o';
		}
		elseif(($ext == 'xls') || ($ext == 'xlsx'))
		{
			$box_class = 'attachment-excel';
			$icon_class = 'file-excel-o';
		}
		elseif(($ext == 'pdf'))
		{
			$box_class = 'attachment-pdf';
			$icon_class = 'file-pdf-o';
		}
		elseif(($ext == 'zip'))
		{
			$box_class = 'attachment-zip';
			$icon_class = 'file-archive-o';
		}
	}

	$media .= '<div class="sp-pagebuilder-media-item-'. $box_class .'">';
	$media .= '<div title="'.$filename.'" class="sp-pagebuilder-media-title">' . $filename .'</div>';
	$media .= '<div class="sp-pagebuilder-media-item-preview"><i class="fa fa-'.$icon_class.'" area-hidden="true"></i></div>';
	$media .= '</div>';

}

if(!$innerHTML) {
	$media .= '</li>';
}

echo $media;