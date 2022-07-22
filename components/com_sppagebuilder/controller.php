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
use Joomla\CMS\Language\Text;
use Joomla\CMS\Response\JsonResponse;
use Joomla\CMS\MVC\Controller\BaseController;

/**
 * Undocumented class
 * @since 1.0.0
 */
class SppagebuilderController extends BaseController
{
	/**
	 * Display function
	 *
	 * @param	boolean $cachable	Cachable
	 * @param	boolean $urlparams	Url params
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$app = Factory::getApplication();
		$viewStatus = false;

		$id    		= $this->input->getInt('id');
		$vName 		= $this->input->getCmd('view');

		if ($vName == 'page')
		{
			$viewStatus = true;
		}
		elseif ($vName == 'form')
		{
			$viewStatus = true;
		}
		elseif ($vName == 'ajax')
		{
			$viewStatus = true;
		}
		elseif ($vName == 'media')
		{
			$viewStatus = true;
		}

		if (!$viewStatus)
		{
			$app->enqueueMessage(Text::_('COM_SPPAGEBUILDER_ERROR_PAGE_NOT_FOUND'), 'error');
			$app->setHeader('status', 404, true);

			return;
		}

		$this->input->set('view', $vName);

		parent::display($cachable);
	}

	/**
	 * Export template file function
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function export()
	{
		$input  = Factory::getApplication()->input;
		$template = $input->get('template', '[]', 'RAW');
		$filename = 'template' . rand(10000, 99999);

		if ($template !== '[]')
		{
			$template  = json_decode($template);

			foreach ($template as &$row)
			{
				foreach ($row->columns as &$column)
				{
					foreach ($column->addons as &$addon)
					{
						if (isset($addon->type) && $addon->type == 'sp_row')
						{
							foreach ($addon->columns as &$column)
							{
								foreach ($column->addons as &$addon)
								{
									if (isset($addon->htmlContent))
									{
										unset($addon->htmlContent);
									}

									if (isset($addon->assets))
									{
										unset($addon->assets);
									}
								}
							}
						}
						else
						{
							if (isset($addon->htmlContent))
							{
								unset($addon->htmlContent);
							}

							if (isset($addon->assets))
							{
								unset($addon->assets);
							}
						}
					}
				}
			}

			$template  = json_encode($template);
		}

		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=$filename.json");
		header("Content-Type: application/json");
		header("Content-Transfer-Encoding: binary ");

		echo $template;
		die();
	}

	/**
	 * Ajax call function
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function ajax()
	{
		$app = Factory::getApplication();
		$input = $app->input;
		$format = strtolower($input->getWord('format'));
		$results = null;
		$addon = $input->get('addon', '', 'STRING');

		if ($addon)
		{
			$function = 'sp_' . $addon . '_get_ajax';
			$addon_class = 'SppagebuilderAddon' . ucfirst($addon);
			$method = $input->get('method', 'get', 'STRING');

			require_once JPATH_BASE . '/components/com_sppagebuilder/parser/addon-parser.php';

			$core_path 		= JPATH_BASE . '/components/com_sppagebuilder/addons/' . $input->get('addon') . '/site.php';
			$template_path 	= JPATH_BASE . '/templates/' . $this->getTemplateName() . '/sppagebuilder/addons/' . $input->get('addon') . '/site.php';

			if (file_exists($template_path))
			{
				require_once $template_path;
			}
			else
			{
				require_once $core_path;
			}

			if (class_exists($addon_class))
			{
				if (method_exists($addon_class, $method . 'Ajax'))
				{
					try
					{
						$results = call_user_func($addon_class . '::' . $method . 'Ajax');
					}
					catch (Exception $e)
					{
						$results = $e;
					}
				}
				else
				{
					$results = new LogicException(Text::sprintf('COM_AJAX_METHOD_NOT_EXISTS', $method . 'Ajax'), 404);
				}
			}
			else
			{
				if (function_exists($function))
				{
					try
					{
						$results = call_user_func($function);
					}
					catch (Exception $e)
					{
						$results = $e;
					}
				}
				else
				{
					$results = new LogicException(Text::sprintf('Function %s does not exist', $function), 404);
				}
			}
		}

		echo new JsonResponse($results, null, false, $input->get('ignoreMessages', true, 'bool'));
		die;
	}

	/**
	 * Get the template name function
	 *
	 * @return mixed
	 *
	 * @since 1.0.0
	 */
	private function getTemplateName()
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('template')));
		$query->from($db->quoteName('#__template_styles'));
		$query->where($db->quoteName('client_id') . ' = 0');
		$query->where($db->quoteName('home') . ' = 1');
		$db->setQuery($query);

		return $db->loadObject()->template;
	}
}
