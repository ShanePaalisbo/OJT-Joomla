<?php
/**
 * @package SP_Page_Builder
 * @author JoomShaper <support@joomshaper.com>
 * @copyright Copyright (c) 2010 - 2022 JoomShaper <http://www.joomshaper.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct accees
defined('_JEXEC') or die('restricted access');

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Session\Session;
use Joomla\CMS\MVC\Controller\FormController;

/**
 * Undocumented class
 *
 * @since 1.0.0
 */
class SppagebuilderControllerPage extends FormController
{

	/**
	 * Undocumented function
	 *
	 * @param	array $config	Config
	 *
	 * @since 1.0.0
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
	}

	/**
	 * Undocumented function
	 *
	 * @param 	string	$name		Name
	 * @param	string	$prefix		prefix
	 * @param 	array	$config		config
	 *
	 * @return 	mixed
	 *
	 * @since 1.0.0
	 */
	public function getModel($name = 'form', $prefix = '', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}

	/**
	 * Undocumented function
	 *
	 * @param	string $key		key
	 * @param	string $urlVar	url
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function save($key = null, $urlVar = null)
	{

		$user   = Factory::getUser();
		$app    = Factory::getApplication();
		$input  = $app->input;
		$Itemid = $input->get('Itemid', 0, 'INT');
		$root   = Uri::base();
		$root   = new Uri($root);
		$link   = $root->getScheme() . '://' . $root->getHost();

		$model    = $this->getModel('Form');
		$data     = $this->input->post->get('jform', array(), 'array');
		$task     = $this->getTask();
		$context  = 'com_sppagebuilder.edit.page';
		$recordId = $data['id'];
		$output   = array();

		// Authorized
		if (empty($recordId))
		{
			$authorised = $user->authorise('core.create', 'com_sppagebuilder') || (count((array) $user->getAuthorisedCategories('com_sppagebuilder', 'core.create')));
		}
		else
		{
			$authorised = $user->authorise('core.edit', 'com_sppagebuilder') || $user->authorise('core.edit', 'com_sppagebuilder.page.' . $recordId) || ($user->authorise('core.edit.own', 'com_sppagebuilder.page.' . $recordId) && $data['created_by'] == $user->id);
		}

		if ($authorised !== true)
		{
			$output['status'] = false;
			$output['message'] = Text::_('JERROR_ALERTNOAUTHOR');
			echo json_encode($output);
			die();
		}

		// Check for request forgeries.
		$output['status'] = false;
		$output['message'] = Text::_('JINVALID_TOKEN');
		Session::checkToken() or die(json_encode($output));

		$output['status'] = true;

		// Check for validation errors.
		if ($data === false)
		{
			// Get the validation messages.
			$errors = $model->getErrors();

			$output['status'] = false;
			$output['message'] = '';

			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count((array) $errors); $i < $n && $i < 3; $i++)
			{
				if ($errors[$i] instanceof Exception)
				{
					$output['message'] .= $errors[$i]->getMessage();
				}
				else
				{
					$output['message'] .= $errors[$i];
				}
			}

			// Save the data in the session.
			$app->setUserState('com_sppagebuilder.edit.page.data', $data);

			// Redirect back to the edit screen.
			$url = $link . Route::_('index.php?option=com_sppagebuilder&view=form&layout=edit&tmpl=component&id=' . $recordId . '&Itemid=' . $Itemid);
			$output['redirect'] = $url;
			echo json_encode($output);
			die();
		}

		// Attempt to save the data.
		if (!$model->save($data))
		{
			// Save the data in the session.
			$app->setUserState('com_sppagebuilder.edit.page.data', $data);

			// Redirect back to the edit screen.
			$output['status'] = false;
			$output['message'] = Text::sprintf('JLIB_APPLICATION_ERROR_SAVE_FAILED', $model->getError());
			$output['redirect'] = $link . Route::_('index.php?option=com_sppagebuilder&view=form&layout=edit&tmpl=component&id=' . $recordId . '&Itemid=' . $Itemid);
			echo json_encode($output);
			die();
		}

		// Save succeeded, check-in the row.
		if ($model->checkin($data['id']) === false)
		{
			// Check-in failed, go back to the row and display a notice.
			$output['status'] = false;
			$output['message'] = Text::sprintf('JLIB_APPLICATION_ERROR_CHECKIN_FAILED', $model->getError());
			$output['redirect'] = $link . Route::_('index.php?option=com_sppagebuilder&view=form&layout=edit&tmpl=component&id=' . $recordId . '&Itemid=' . $Itemid);
			echo json_encode($output);
			die();
		}

		$output['status'] = true;
		$output['message'] = Text::_('COM_SPPAGEBUILDER_PAGE_SAVE_SUCCESS');

		// Redirect the user and adjust session state based on the chosen task.
		switch ($task)
		{
			case 'apply':
				// Set the row data in the session.
				$this->holdEditId($context, $recordId);
				$app->setUserState('com_sppagebuilder.edit.page.data', null);

				// Delete generated CSS file
				$cssFolderPath = JPATH_ROOT . '/media/com_sppagebuilder/css';
				$cssFilePath = $cssFolderPath . '/page-' . $recordId . '.css';

				if (file_exists($cssFilePath))
				{
					File::delete($cssFilePath);
				}

				// Redirect back to the edit screen.
				$output['redirect'] = $link . Route::_('index.php?option=com_sppagebuilder&view=form&layout=edit&tmpl=component&id=' . $recordId . '&Itemid=' . $Itemid);
				$output['id'] = $recordId;
				break;

			default:
				// Clear the row id and data in the session.
				$this->releaseEditId($context, $recordId);
				$app->setUserState('com_sppagebuilder.edit.page.data', null);

				// Redirect to the list screen.
				$output['redirect'] = $link . Route::_('index.php?option=' . $this->option . '&view=' . $this->view_list . $this->getRedirectToListAppend(), false);
				break;
		}

		if (isset($output['id']) && $output['id'])
		{
			$cssFilePath = JPATH_ROOT . "/media/sppagebuilder/css/page-{$output['id']}.css";

			if (file_exists($cssFilePath))
			{
				unlink($cssFilePath);
			}
		}

		echo json_encode($output);
		die();
	}

	/**
	 * Get Saved Section function
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function getMySections()
	{
		$model = $this->getModel();
		die($model->getMySections());
	}

	/**
	 * Delete Section function
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function deleteSection()
	{
		$model = $this->getModel();
		$app = Factory::getApplication();
		$input = $app->input;

		$id = $input->get('id', '', 'INT');

		die($model->deleteSection($id));
	}

	/**
	 * Save Section function
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function saveSection()
	{
		$model = $this->getModel();
		$app = Factory::getApplication();
		$input = $app->input;

		$title = htmlspecialchars($input->get('title', '', 'STRING'));
		$section = $input->get('section', '', 'RAW');

		if ($title && $section)
		{
			$sectionId = $model->saveSection($title, $section);
			echo $sectionId;
			die();
		}
		else
		{
			die('Failed');
		}
	}

	/**
	 * Cancel function
	 *
	 * @param 	string $key	key
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function cancel($key = 'id')
	{
		parent::cancel($key);
		$returnUrl = Factory::getApplication()->input->get('return_page', null, 'base64');

		$this->setRedirect(base64_decode($returnUrl));
	}

}
