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
use Joomla\CMS\MVC\Controller\BaseController;

// Require helper file
JLoader::register('SppagebuilderHelperSite', __DIR__ . '/helpers/helper.php');

$controller = BaseController::getInstance('Sppagebuilder');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
