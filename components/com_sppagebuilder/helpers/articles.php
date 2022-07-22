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
use Joomla\CMS\Access\Access;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

if(!class_exists('ContentHelperRoute')) require_once (JPATH_SITE . '/components/com_content/helpers/route.php');

abstract class SppagebuilderHelperArticles
{
	public static function getArticles( $count = 5, $ordering = 'latest', $catid = '', $include_subcategories = true, $post_format = '' ) {

		$authorised = Access::getAuthorisedViewLevels(Factory::getUser()->get('id'));

		$app = Factory::getApplication();
		$db = Factory::getDbo();
		$nullDate = $db->quote($db->getNullDate());
		$nowDate  = $db->quote(Factory::getDate()->toSql());

		$query = $db->getQuery(true);

		$query
		->select('a.*')
		->from($db->quoteName('#__content', 'a'))
		->select($db->quoteName('b.alias', 'category_alias'))
		->select($db->quoteName('b.title', 'category'))
		->join('LEFT', $db->quoteName('#__categories', 'b') . ' ON (' . $db->quoteName('a.catid') . ' = ' . $db->quoteName('b.id') . ')')
		->where($db->quoteName('b.extension') . ' = ' . $db->quote('com_content'));

		if($post_format) {
			$query->where($db->quoteName('a.attribs') . ' LIKE ' . $db->quote('%"post_format":"'. $post_format .'"%'));
		}

		// Category filter
		if ( ($catid != '' || is_array($catid)) ) {
			if (!is_array($catid)) {
				$catid = array($catid);
			}

			if (!in_array('', $catid)) {
				$categories = self::getCategories( $catid, $include_subcategories );
				$categories = array_merge($categories, $catid);
				//array_unshift($categories, $catid);
				$query->where($db->quoteName('a.catid')." IN (" . implode( ',', $categories ) . ")");
			}

		}

		// publishing
		if ( JVERSION < 4)
		{
			$query->where('(a.publish_up = ' . $nullDate . ' OR a.publish_up <= ' . $nowDate . ')');
			$query->where('(a.publish_down = ' . $nullDate . ' OR a.publish_down >= ' . $nowDate . ')');
		}
		else
		{
			$nowDate = Factory::getDate()->toSql();
			$query->extendWhere(
				'AND',
				[
					$db->quoteName('a.publish_up') . ' IS NULL',
					$db->quoteName('a.publish_up') . ' <= :publishUp',
				],
				'OR'
			)->extendWhere(
				'AND',
				[
					$db->quoteName('a.publish_down') . ' IS NULL',
					$db->quoteName('a.publish_down') . ' >= :publishDown',
				],
				'OR'
			)->bind([':publishUp', ':publishDown'], $nowDate);
		}
		
		// has order by
		if ($ordering == 'hits') {
			$query->order($db->quoteName('a.hits') . ' DESC');
		} elseif($ordering == 'featured') {
			$query->where($db->quoteName('a.featured') . ' = ' . $db->quote(1));
			$query->order($db->quoteName('a.created') . ' DESC');
		} elseif($ordering == 'oldest') {
			$query->order($db->quoteName('a.created') . ' ASC');
		} else {
			$query->order($db->quoteName('a.created') . ' DESC');
		}

		// Language filter
		if ($app->getLanguageFilter()) {
			$query->where('a.language IN (' . $db->Quote(Factory::getLanguage()->getTag()) . ',' . $db->Quote('*') . ')');
		}

		// continue query
		$query->where($db->quoteName('a.access')." IN (" . implode( ',', $authorised ) . ")");
		$query->order($db->quoteName('a.created') . ' DESC')
		->setLimit($count);

		$db->setQuery($query);
		$items = $db->loadObjectList();

		foreach ($items as &$item) {
			$item->slug    	= $item->id . ':' . $item->alias;
			$item->catslug 	= $item->catid . ':' . $item->category_alias;
			$item->username = Factory::getUser($item->created_by)->name;
			$item->link 	= Route::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));
			$attribs 		= json_decode($item->attribs);

			// Featured Image
			if(isset($attribs->spfeatured_image) && $attribs->spfeatured_image != NULL) {
				$item->featured_image = $featured_image = $attribs->spfeatured_image;

				$img_baseurl = basename($featured_image);

				//Small
				$small = JPATH_ROOT . '/' . dirname($featured_image) . '/' . File::stripExt($img_baseurl) .  '_small.' . File::getExt($img_baseurl);
				if(file_exists($small)) {
					$item->image_small = Uri::root(true) . '/' . dirname($featured_image) . '/' . File::stripExt($img_baseurl) . '_small.' . File::getExt($img_baseurl);
				}

				//Thumb
				$thumbnail = JPATH_ROOT . '/' . dirname($featured_image) . '/' . File::stripExt($img_baseurl) .  '_thumbnail.' . File::getExt($img_baseurl);
				if(file_exists($thumbnail)) {
					$item->image_thumbnail = Uri::root(true) . '/' . dirname($featured_image) . '/' . File::stripExt($img_baseurl) . '_thumbnail.' . File::getExt($img_baseurl);
				} else {
					$item->image_thumbnail = Uri::root(true) . '/' . $item->featured_image;
				}

				//Medium
				$medium = JPATH_ROOT . '/' . dirname($featured_image) . '/' . File::stripExt($img_baseurl) .  '_medium.' . File::getExt($img_baseurl);
				if(file_exists($medium)) {
					$item->image_medium = Uri::root(true) . '/' . dirname($featured_image) . '/' . File::stripExt($img_baseurl) . '_medium.' . File::getExt($img_baseurl);
				}

				//Large
				$large = JPATH_ROOT . '/' . dirname($featured_image) . '/' . File::stripExt($img_baseurl) .  '_large.' . File::getExt($img_baseurl);
				if(file_exists($large)) {
					$item->image_large = Uri::root(true) . '/' . dirname($featured_image) . '/' . File::stripExt($img_baseurl) . '_large.' . File::getExt($img_baseurl);
				}
			} else {
				$images = json_decode($item->images);
				if(isset($images->image_intro) && $images->image_intro) {
					$item->image_thumbnail = Uri::root(true) . '/' . $images->image_intro;
				} elseif (isset($images->image_fulltext) && $images->image_fulltext) {
					$item->image_thumbnail = Uri::root(true) . '/' . $images->image_fulltext;
				} else {
					$item->image_thumbnail = false;
				}
			}

			// Post Format
			$item->post_format = 'standard';
			if(isset($attribs->post_format) && $attribs->post_format != '') {
				$item->post_format = $attribs->post_format;
			}

			// Post Format Video
			if(isset($attribs->post_format) && $attribs->post_format == 'video') {
				if(isset($attribs->video) && $attribs->video != NULL) {
					$video = parse_url($attribs->video);

					$video_src = '';

					switch($video['host']) {
						case 'youtu.be':
						$video_id 	= trim($video['path'],'/');
						$video_src 	= '//www.youtube.com/embed/' . $video_id;
						break;

						case 'www.youtube.com':
						case 'youtube.com':
						parse_str($video['query'], $query);
						$video_id 	= $query['v'];
						$video_src 	= '//www.youtube.com/embed/' . $video_id;
						break;

						case 'vimeo.com':
						case 'www.vimeo.com':
						$video_id 	= trim($video['path'],'/');
						$video_src 	= "//player.vimeo.com/video/" . $video_id;
					}

					$item->video_src = $video_src;
				} else {
					$item->video_src = '';
				}
			}

			// Post Format Audio
			if(isset($attribs->post_format) && $attribs->post_format == 'audio') {
				if(isset($attribs->audio) && $attribs->audio != NULL) {
					$item->audio_embed = $attribs->audio;
				} else {
					$item->audio_embed = '';
				}
			}

			// Post Format Quote
			if(isset($attribs->post_format) && $attribs->post_format == 'quote') {
				if(isset($attribs->quote_text) && $attribs->quote_text != NULL) {
					$item->quote_text = $attribs->quote_text;
				} else {
					$item->quote_text = '';
				}

				if(isset($attribs->quote_author) && $attribs->quote_author != NULL) {
					$item->quote_author = $attribs->quote_author;
				} else {
					$item->quote_author = '';
				}
			}

			// Post Format Status
			if(isset($attribs->post_format) && $attribs->post_format == 'status') {
				if(isset($attribs->post_status) && $attribs->post_status != NULL) {
					$item->post_status = $attribs->post_status;
				} else {
					$item->post_status = '';
				}
			}

			// Post Format Link
			if(isset($attribs->post_format) && $attribs->post_format == 'link') {
				if(isset($attribs->link_title) && $attribs->link_title != NULL) {
					$item->link_title = $attribs->link_title;
				} else {
					$item->link_title = '';
				}

				if(isset($attribs->link_url) && $attribs->link_url != NULL) {
					$item->link_url = $attribs->link_url;
				} else {
					$item->link_url = '';
				}
			}

			// Post Format Gallery
			if(isset($attribs->post_format) && $attribs->post_format == 'gallery') {

				$item->imagegallery = new stdClass();

				if(isset($attribs->gallery) && $attribs->gallery != NULL) {
					$gallery_all_images = json_decode($attribs->gallery)->gallery_images;

					$gallery_images = array();

					foreach ($gallery_all_images as $key=>$value) {
						$gallery_images[$key]['full'] = $value;

						$gallery_img_baseurl = basename($value);

						//Small
						$small = JPATH_ROOT . '/' . dirname($value) . '/' . File::stripExt($gallery_img_baseurl) .  '_small.' . File::getExt($gallery_img_baseurl);
						if(file_exists($small)) {
							$gallery_images[$key]['small'] = Uri::root(true) . '/' . dirname($value) . '/' . File::stripExt($gallery_img_baseurl) . '_small.' . File::getExt($gallery_img_baseurl);
						}

						//Thumbnail
						$thumbnail = JPATH_ROOT . '/' . dirname($value) . '/' . File::stripExt($gallery_img_baseurl) .  '_thumbnail.' . File::getExt($gallery_img_baseurl);
						if(file_exists($thumbnail)) {
							$gallery_images[$key]['thumbnail'] = Uri::root(true) . '/' . dirname($value) . '/' . File::stripExt($gallery_img_baseurl) . '_thumbnail.' . File::getExt($gallery_img_baseurl);
						}

						//Medium
						$medium = JPATH_ROOT . '/' . dirname($value) . '/' . File::stripExt($gallery_img_baseurl) .  '_medium.' . File::getExt($gallery_img_baseurl);
						if(file_exists($medium)) {
							$gallery_images[$key]['medium'] = Uri::root(true) . '/' . dirname($value) . '/' . File::stripExt($gallery_img_baseurl) . '_medium.' . File::getExt($gallery_img_baseurl);
						}

						//Large
						$large = JPATH_ROOT . '/' . dirname($value) . '/' . File::stripExt($gallery_img_baseurl) .  '_large.' . File::getExt($gallery_img_baseurl);
						if(file_exists($large)) {
							$gallery_images[$key]['large'] = Uri::root(true) . '/' . dirname($value) . '/' . File::stripExt($gallery_img_baseurl) . '_large.' . File::getExt($gallery_img_baseurl);
						}
					}

					$item->imagegallery->images = $gallery_images;

				} else {
					$item->imagegallery->images = array();
				}
			}
		}

		return $items;
	}

	public static function getCategories($parent_id = 1, $include_subcategories = true, $child = false, $cats = array()) {

		$app = Factory::getApplication();
		$db = Factory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select('*')
			->from($db->quoteName('#__categories'))
			->where($db->quoteName('extension') . ' = ' . $db->quote('com_content'))
			->where($db->quoteName('published') . ' = ' . $db->quote(1))
			->where($db->quoteName('access')." IN (" . implode( ',', Factory::getUser()->getAuthorisedViewLevels() ) . ")")
			->where($db->quoteName('language')." IN (" . $db->Quote(Factory::getLanguage()->getTag()).", ".$db->Quote('*') . ")")
			->where($db->quoteName('parent_id')." IN (" . implode( ',', $parent_id ) . ")")
			->order($db->quoteName('lft') . ' ASC');

		$db->setQuery($query);
		$rows = $db->loadObjectList();

		foreach ($rows as $row) {

			if($include_subcategories) {
				array_push($cats, $row->id);
				if (self::hasChildren($row->id)) {
					$cats = self::getCategories(array($row->id), $include_subcategories, true, $cats);
				}
			}
		}

		return $cats;
	}

	private static function hasChildren($parent_id = 1) {

		$app = Factory::getApplication();
		$db = Factory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select('*')
			->from($db->quoteName('#__categories'))
			->where($db->quoteName('extension') . ' = ' . $db->quote('com_content'))
			->where($db->quoteName('published') . ' = ' . $db->quote(1))
			->where($db->quoteName('access')." IN (" . implode( ',', Factory::getUser()->getAuthorisedViewLevels() ) . ")")
			->where($db->quoteName('language')." IN (" . $db->Quote(Factory::getLanguage()->getTag()).", ".$db->Quote('*') . ")")
			->where($db->quoteName('parent_id') . ' = ' . $db->quote($parent_id))
			->order($db->quoteName('created_time') . ' DESC');

		$db->setQuery($query);

		$childrens = $db->loadObjectList();



		if(is_array($childrens) && count($childrens)) {
			return true;
		}

		return false;
	}
}
