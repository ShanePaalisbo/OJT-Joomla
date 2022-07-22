<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */


defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Language\Text;

JLoader::register('SppagebuilderHelperRoute', JPATH_ROOT . '/components/com_sppagebuilder/helpers/route.php');

// Base this model on the backend version.
JLoader::register('SppagebuilderModelPage', JPATH_ADMINISTRATOR . '/components/com_sppagebuilder/models/page.php');


class SppagebuilderModelForm extends SppagebuilderModelPage
{
	protected $_context = 'com_sppagebuilder.page';
	protected $_item = array();

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

	public function getItem( $pageId = null )
	{
		$user = Factory::getUser();

		$pageId = (!empty($pageId))? $pageId : (int)$this->getState('page.id');

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
					->leftJoin( $db->quoteName('#__languages') . ' AS l ON l.lang_code = a.language');

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

				if (empty($data)) {
					return Factory::getApplication()->enqueueMessage(Text::_('COM_SPPAGEBUILDER_ERROR_PAGE_NOT_FOUND'), 'error');
				}

				if ($access = $this->getState('filter.access')) {
					$data->access_view = true;
				}else{
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
				if ($e->getCode() == 404 )
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

	public function getForm($data = array(), $loadData = true)
	{
		$app = Factory::getApplication();
		$user = Factory::getUser();

		// Get the form.
		$form = $this->loadForm('com_sppagebuilder.page', 'page', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
		}

		// Manually check-out
		$pageId = (!empty($pageId))? $pageId : (int)$this->getState('page.id');
		/**
		 * Check user id for manual check-out 
		 * 
		 * @since 3.7.10
		 */
		if ($user->id)
		{
			$this->checkout($pageId);
		}

		return parent::getForm();
	}
}
