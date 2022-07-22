<?php

/**
 * @package SP_Page_Builder
 * @author JoomShaper <support@joomshaper.com>
 * @copyright Copyright (c) 2010 - 2022 JoomShaper <http://www.joomshaper.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct accees
defined('_JEXEC') or die('restricted access');

use Joomla\CMS\Helper\ModuleHelper;

JLoader::register('ModSPagebuilderHelper', __DIR__ . '/helper.php');

$data = ModSPagebuilderHelper::getData($module->id, $params);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require ModuleHelper::getLayoutPath('mod_sppagebuilder', $params->get('layout', 'default'));
