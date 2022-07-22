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
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

/**
 * SP Page Builder Helper Class
 * 
 * @since 1.0.0
 */
abstract class SppagebuilderHelper
{
	/**
	 * Undocumented variable
	 *
	 * @var string
	 */
	public static $extension = 'com_sppagebuilder';

	/**
	 * Add Sub menu function
	 *
	 * @param string $vName	Menu name
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	public static function addSubmenu($vName)
	{

		JHtmlSidebar::addEntry(
			Text::_('COM_SPPAGEBUILDER_PAGES'),
			'index.php?option=com_sppagebuilder&view=pages',
			$vName == 'pages'
		);

		JHtmlSidebar::addEntry(
			Text::_('COM_SPPAGEBUILDER_MEDIA'),
			'index.php?option=com_sppagebuilder&view=media',
			$vName == 'media'
		);

		JHtmlSidebar::addEntry(
			Text::_('COM_SPPAGEBUILDER_CATEGORIES'),
			'index.php?option=com_categories&extension=com_sppagebuilder',
			$vName == 'categories');

		JHtmlSidebar::addEntry(
			Text::_('COM_SPPAGEBUILDER_INTEGRATIONS'),
			'index.php?option=com_sppagebuilder&view=integrations',
			$vName == 'integrations');

		JHtmlSidebar::addEntry(
			Text::_('COM_SPPAGEBUILDER_LANGUAGES'),
			'index.php?option=com_sppagebuilder&view=languages',
			$vName == 'languages'
		);

		JHtmlSidebar::addEntry(
			Text::_('COM_SPPAGEBUILDER_ABOUT'),
			'index.php?option=com_sppagebuilder&view=about',
			$vName == 'about'
		);		
	}

	/**
	 * Add Script function
	 *
	 * @param string	$script		script name.
	 * @param string	$client		Client name.
	 * @param boolean	$version	script version
	 * 	
	 * @return void
	 * @since 1.0.0
	 */
	public static function addScript($script, $client = 'admin', $version = true)
	{
		$doc = Factory::getDocument();

		$script_url = Uri::root(true) . ($client == 'admin' ? '/administrator' : '') . '/components/com_sppagebuilder/assets/js/'. $script;
		
		if ($version)
		{
			$script_url .= '?' . self::getVersion(true);
		}

		$doc->addScript($script_url);
	}

	/**
	 * Add Style Sheet function
	 *
	 * @param string	$stylesheet	Style sheet name.
	 * @param string	$client		Client name.
	 * @param boolean	$version	Style sheet version.
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	public static function addStylesheet($stylesheet, $client = 'admin', $version = true)
	{
		$doc = Factory::getDocument();
		$stylesheet_url = Uri::root(true) . ($client == 'admin' ? '/administrator' : '') . '/components/com_sppagebuilder/assets/css/'. $stylesheet;

		if ($version)
		{
			$stylesheet_url .= '?' . self::getVersion(true);
		}

		$doc->addStylesheet($stylesheet_url);
	}

	/**
	 * Load Assets function
	 *
	 * @param string $type
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	public static function loadAssets($type = 'all')
	{
		$doc = Factory::getDocument();
		HTMLHelper::_('jquery.framework');

		if ($type == 'all' || $type == 'css')
		{
			self::addStylesheet('font-awesome-5.min.css', 'site');
			self::addStylesheet('font-awesome-v4-shims.css', 'site');
			self::addStylesheet('pbfont.css');
			self::addStylesheet('sppagebuilder.css');

			if (JVERSION < 4)
			{
				self::addStylesheet('joomla3.css');
			}
		}

	}

	/**
	 * Load Editor function
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public static function loadEditor()
	{
		$app = Factory::getApplication();
		$doc = Factory::getDocument();
		$conf = Factory::getConfig();
		
		if (JVERSION < 4)
		{
			$doc->addScript(Uri::root(true) . '/media/editors/tinymce/tinymce.min.js');
			$doc->addScriptdeclaration('var tinyTheme="modern";');
		}
		else
		{
			$wa = $doc->getWebAssetManager();

			if (!$wa->assetExists('script', 'tinymce'))
			{
				$wa->registerScript('tinymce', 'media/vendor/tinymce/tinymce.min.js', [], ['defer' => true]);
			}

			if (!$wa->assetExists('script', 'plg_editors_tinymce'))
			{
				$wa->registerScript('plg_editors_tinymce', 'plg_editors_tinymce/tinymce.min.js', [], ['defer' => true], ['core', 'tinymce']);
			}

			$wa->useScript('tinymce')
				->useScript('plg_editors_tinymce');

			$doc->addScriptdeclaration('var tinyTheme="silver";');
			$doc->addStyledeclaration('.tox-tinymce-aux {z-index: 130012 !important;}');
		}

		// JCE Editor
		$editor  = $conf->get('editor');

		if ($editor == 'jce') {
			require_once(JPATH_ADMINISTRATOR . '/components/com_jce/includes/base.php');
			wfimport('admin.models.editor');
			$editor = new WFModelEditor();

			$settings = $editor->getEditorSettings();

			$app->triggerEvent('onBeforeWfEditorRender', array(&$settings));
			echo $editor->render($settings);
		}
	}

	/**
	 * Get Version function
	 *
	 * @param boolean $md5
	 * @return void
	 */
	public static function getVersion($md5 = false)
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true)
		->select('e.manifest_cache')
		->select($db->quoteName('e.manifest_cache'))
		->from($db->quoteName('#__extensions', 'e'))
		->where($db->quoteName('e.element') . ' = ' . $db->quote('com_sppagebuilder'));

		$db->setQuery($query);
		$manifest_cache = json_decode($db->loadResult());

		if (isset($manifest_cache->version) && $manifest_cache->version)
		{
			
			if($md5)
			{
				return md5($manifest_cache->version);
			}

			return $manifest_cache->version;
		}

		return '1.0';
	}

	/**
	 * Page Content function
	 *
	 * @param [type] $extension
	 * @param [type] $extension_view
	 * @param integer $view_id
	 * @return void
	 */
	public static function getPageContent($extension, $extension_view, $view_id = 0)
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('text')));
		$query->from($db->quoteName('#__sppagebuilder'));
		$query->where($db->quoteName('extension') . ' = '. $db->quote($extension));
		$query->where($db->quoteName('extension_view') . ' = '. $db->quote($extension_view));
		$query->where($db->quoteName('view_id') . ' = '. $db->quote($view_id));
		$query->where($db->quoteName('active') . ' = 1');
		$db->setQuery($query);
		$result = $db->loadObject();

		if(count((array) $result)) {
			return $result;
		}

		return false;
	}

	/**
	 * Check Page function
	 *
	 * @param string $extension
	 * @param string $extension_view
	 * @param integer $view_id
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	private static function checkPage($extension, $extension_view, $view_id = 0)
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('id')));
		$query->from($db->quoteName('#__sppagebuilder'));
		$query->where($db->quoteName('extension') . ' = '. $db->quote($extension));
		$query->where($db->quoteName('extension_view') . ' = '. $db->quote($extension_view));
		$query->where($db->quoteName('view_id') . ' = '. $db->quote($view_id));
		$db->setQuery($query);

		return $db->loadResult();
	}

	/**
	 * Page Insert function
	 *
	 * @param array $content
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	private static function insertPage($content = array())
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);

		$columns = array(
			'title',
			'text',
			'extension',
			'extension_view',
			'view_id',
			'active',
			'published',
			'created_on',
			'created_by',
			'modified',
			'modified_by',
			'language'
		);

		$query
		->insert($db->quoteName('#__sppagebuilder'))
		->columns($db->quoteName($columns))
		->values(implode(',', $content));

		$db->setQuery($query);
		$db->execute();
	}

	/**
	 * Update page function
	 *
	 * @param string $view_id
	 * @param string $content
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	private static function updatePage($view_id, $content)
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$condition = array($db->quoteName('view_id') . ' = ' . $db->quote($view_id));
		$query->update($db->quoteName('#__sppagebuilder'))->set($content)->where($condition);
		$db->setQuery($query);
		$db->execute();
	}

	/**
	 * Menu Id function
	 *
	 * @param string $pageId
	 * @return void
	 */
	public static function getMenuId($pageId)
	{
		$db    = Factory::getDbo();
		$query = $db->getQuery(true);

		$query->select($db->quoteName(array('id')));
		$query->from($db->quoteName('#__menu'));
		$query->where($db->quoteName('link') . ' LIKE '. $db->quote('%option=com_sppagebuilder&view=page&id='. $pageId .'%'));
		$query->where($db->quoteName('published') . ' = '. $db->quote('1'));
		
		$db->setQuery($query);

		$result = $db->loadResult();

		if ($result)
		{
			return '&Itemid=' . $result;
		}

		return '';
	}
}
