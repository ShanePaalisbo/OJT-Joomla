<?php
/**
 * @package SP_Page_Builder
 * @author JoomShaper <support@joomshaper.com>
 * @copyright Copyright (c) 2010 - 2022 JoomShaper <http://www.joomshaper.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct accees
defined('_JEXEC') or die('restricted aceess');

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Model\ItemModel;
use Joomla\CMS\Table\Table;

JLoader::register('SppagebuilderHelperRoute', JPATH_ROOT . '/components/com_sppagebuilder/helpers/route.php');

/**
 * Page Builder Page Model class
 *
 * @since 1.0.0
 */
class SppagebuilderModelPage extends ItemModel
{
	protected $_context = 'com_sppagebuilder.page';


	/**
	 * Populate State function
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	protected function populateState()
	{
		$app = Factory::getApplication('site');

		$pageId = $app->input->getInt('id');
		$this->setState('page.id', $pageId);

		$user = Factory::getUser();

		if ((!$user->authorise('core.edit.state', 'com_sppagebuilder')) && (!$user->authorise('core.edit', 'com_sppagebuilder')))
		{
			$this->setState('filter.published', 1);
		}

		$this->setState('filter.language', Multilanguage::isEnabled());
	}

	/**
	 * Get Item function
	 *
	 * @param	int $pageId	page id
	 *
	 * @return mixed
	 *
	 * @since 1.0.0
	 */
	public function getItem( $pageId = null )
	{
		$user = Factory::getUser();

		$pageId = (!empty($pageId)) ? $pageId : (int) $this->getState('page.id');

		if ($this->_item == null)
		{
			$this->_item = array();
		}

		if (!isset($this->_item[$pageId]))
		{
			try
			{
				$db = $this->getDbo();
				$query = $db->getQuery(true)
					->select('a.*')
					->from('#__sppagebuilder as a')
					->where('a.id = ' . (int) $pageId);

				$query->select('l.title AS language_title')
					->leftJoin($db->quoteName('#__languages') . ' AS l ON l.lang_code = a.language');

				$query->select('ua.name AS author_name')
					->leftJoin('#__users AS ua ON ua.id = a.created_by');

				// Filter by published state.
				$published = $this->getState('filter.published');

				if (is_numeric($published))
				{
					$query->where('a.published = ' . (int) $published);
				}
				elseif ($published === '')
				{
					$query->where('(a.published IN (0, 1))');
				}

				if ($this->getState('filter.language'))
				{
					$query->where('a.language in (' . $db->quote(Factory::getLanguage()->getTag()) . ',' . $db->quote('*') . ')');
				}

				$db->setQuery($query);
				$data = $db->loadObject();

				if (empty($data))
				{
					throw new Exception(Text::_('COM_SPPAGEBUILDER_ERROR_PAGE_NOT_FOUND'), 404);
				}

				if ($access = $this->getState('filter.access'))
				{
					$data->access_view = true;
				}
				else
				{
					$user = Factory::getUser();
					$groups = $user->getAuthorisedViewLevels();

					$data->access_view = in_array($data->access, $groups);
				}

				$data->link = SppagebuilderHelperRoute::getPageRoute($data->id, $data->language);
				$data->formLink = SppagebuilderHelperRoute::getFormRoute($data->id, $data->language);

				$this->_item[$pageId] = $data;
			}
			catch (Exception $e)
			{
				if ($e->getCode() == 404)
				{
					$app = Factory::getApplication();
					$app->enqueueMessage($e->getMessage(), 'error');
					$app->setHeader('status', 404, true);
				}
				else
				{
					$this->setError($e);
					$this->_item[$pageId] = false;
				}
			}
		}

		return $this->_item[$pageId];
	}

	/**
	 * Increment the hit counter for the page.
	 *
	 * @param   integer  $pk  Optional primary key of the page to increment.
	 *
	 * @return  boolean  True if successful; false otherwise and internal error set.
	 */
	public function hit($pk = 0)
	{
		$pk = (!empty($pk)) ? $pk : (int) $this->getState('page.id');
		$table = Table::getInstance('Page', 'SppagebuilderTable');
		$table->load($pk);
		$table->hit($pk);

		return true;
	}

	/**
	 * Get saved section from database function
	 *
	 * @return mixed
	 *
	 * @since 1.0.0
	 */
	public function getMySections()
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('id', 'title', 'section')));
		$query->from($db->quoteName('#__sppagebuilder_sections'));
		$query->order('id ASC');
		$db->setQuery($query);

		$results = $db->loadObjectList();

		return json_encode($results);
	}

	/**
	 * Delete saved section from database.
	 *
	 * @param	string $id	Section Id.
	 *
	 * @return mixed
	 *
	 * @since 1.0.0
	 */
	public function deleteSection($id)
	{
		$db = Factory::getDbo();

		$query = $db->getQuery(true);

		// Delete all custom keys for user 1001.
		$conditions = array(
		  $db->quoteName('id') . ' = ' . $id
		);

		$query->delete($db->quoteName('#__sppagebuilder_sections'));
		$query->where($conditions);

		$db->setQuery($query);

		return $db->execute();
	}

	/**
	 * Save Section function
	 *
	 * @param	string $title		Title
	 * @param	string $section		Section
	 *
	 * @return	mixed
	 * @since 1.0.0
	 */
	public function saveSection($title, $section)
	{
		$db = Factory::getDbo();
		$user = Factory::getUser();
		$obj = new stdClass;
		$obj->title = $title;
		$obj->section = $section;
		$obj->created = Factory::getDate()->toSql();
		$obj->created_by = $user->get('id');

		$db->insertObject('#__sppagebuilder_sections', $obj);

		return $db->insertid();
	}

}
