<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2022 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

use Joomla\CMS\MVC\Controller\AdminController;

//no direct accees
defined ('_JEXEC') or die ('restricted aceess');


class SppagebuilderControllerPages extends AdminController
{
	public function getModel($name = 'Page', $prefix = 'SppagebuilderModel', $config = array('ignore_request' => true))
	{
		return parent::getModel($name, $prefix, $config);
	}
}
