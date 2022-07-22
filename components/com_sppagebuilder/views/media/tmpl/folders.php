<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2022 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die ('restricted aceess');

use Joomla\CMS\Factory;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Uri\Uri;

$input 	= Factory::getApplication()->input;
$path 	= $input->post->get('path', '/images', 'PATH');
$media 	= $this->media;

$report['folders'] = $media['folders'];
$report['folders_list'] = $media['folders_list'];

$images = array();

foreach ($media['images'] as $key => $image)
{
	$image 			= str_replace('\\', '/',$image);
	$root_path 	= str_replace('\\', '/', JPATH_ROOT);
	$path 			= str_replace($root_path . '/', '', $image);

	$images[$key]['path'] 	= $path;

	$thumb = dirname($path) . '/_sp-pagebuilder_thumbs/' . basename($path);

	if (file_exists(JPATH_ROOT . '/' . $thumb))
	{
		$images[$key]['src'] = Uri::root(true) . '/' . $thumb;
	}
	else
	{
		$images[$key]['src'] = Uri::root(true) . '/' . $path;
	}

	$filename = basename($image);
	$title = File::stripExt($filename);
	$ext = File::getExt($filename);

	$images[$key]['title'] 	= $title;
	$images[$key]['ext'] 		= $ext;
}

$report['images'] = $images;

echo json_encode($report); die;
