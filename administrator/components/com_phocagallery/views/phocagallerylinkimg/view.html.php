<?php
/*
 * @package Joomla
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Component
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die();
jimport( 'joomla.application.component.view' );
use Joomla\String\StringHelper;

class phocaGalleryCpViewphocaGalleryLinkImg extends JViewLegacy
{
	var $_context 	= 'com_phocagallery.phocagallerylinkimg';
	protected $r;
	protected $t;
	protected $button;
	protected $user;
	protected $items;
	protected $request_url;
	protected $lists;

	function display($tpl = null) {
		$app	= JFactory::getApplication();

		$this->r = new PhocaGalleryRenderAdminViews();
		$this->t = PhocaGalleryUtils::setVars('linkimg');

		//JHtml::_('behavior.tooltip');
		//JHtml::_('behavior.formvalidation');
		//JHtml::_('behavior.keepalive');
		//JHtml::_('formbehavior.chosen', 'select');

		//Frontend Changes
		$tUri = '';
		$jsLink = JURI::base(true);
		if (!$app->isClient('administrator')) {
			$tUri = JURI::base();
			phocagalleryimport('phocagallery.render.renderadmin');
			phocagalleryimport('phocagallery.file.filethumbnail');
			$jsLink = JURI::base(true).'/administrator';
		}
		$document	= JFactory::getDocument();
		$uri		= \Joomla\CMS\Uri\Uri::getInstance();
		$db		    = JFactory::getDBO();
		//JHTML::stylesheet( 'media/com_phocagallery/css/administrator/phocagallery.css' );
		//JHTML::stylesheet( 'media/com_phocagallery/js/jcp/picker.css' );
		//$document->addScript(JURI::root(true) .'/media/com_phocagallery/js/jcp/picker.js');

		$eName				= $app->input->get('e_name', '', 'cmd');
		$this->t['ename']		= preg_replace( '#[^A-Z0-9\-\_\[\]]#i', '', $eName );
		$this->t['type']		= $app->input->get( 'type', 1, 'int' );
		$this->t['backlink']	= $tUri.'index.php?option=com_phocagallery&amp;view=phocagallerylinks&amp;tmpl=component&amp;e_name='.$this->t['ename'];




		$params = JComponentHelper::getParams('com_phocagallery') ;

		//Filter

		$filter_published		= $app->getUserStateFromRequest( $this->_context.'.filter_published',	'filter_published', '',	'word' );
		$filter_catid		= $app->getUserStateFromRequest( $this->_context.'.filter_catid',	'filter_catid',	0, 'int' );
		$filter_order		= $app->getUserStateFromRequest( $this->_context.'.filter_order',	'filter_order',	'a.ordering', 'cmd' );
		$filter_order_Dir	= $app->getUserStateFromRequest( $this->_context.'.filter_order_Dir',	'filter_order_Dir',	'',	'word' );
		$search				= $app->getUserStateFromRequest( $this->_context.'.search', 'search', '',	'string' );
		$search				= StringHelper::strtolower( $search );

		// Get data from the model
		$this->items					=  $this->get( 'Data');
		$total					=  $this->get( 'Total');
		$this->t['pagination'] 	=  $this->get( 'Pagination' );

		// build list of categories
		$javascript 	= 'class="inputbox" size="1" onchange="Joomla.submitform( );"';

		// get list of categories for dropdown filter
		$filter = '';

		// build list of categories
		$javascript 	= 'class="inputbox" size="1" onchange="Joomla.submitform( );"';

		$query = 'SELECT a.title AS text, a.id AS value, a.parent_id as parentid'
		. ' FROM #__phocagallery_categories AS a'
		. ' WHERE a.published = 1'
		. ' AND a.approved = 1'
		. ' ORDER BY a.ordering';
		$db->setQuery( $query );
		$phocagallerys = $db->loadObjectList();

		$tree = array();
		$text = '';
		$tree = PhocaGalleryCategory::CategoryTreeOption($phocagallerys, $tree, 0, $text, -1);
		array_unshift($tree, Joomla\CMS\HTML\HTMLHelper::_('select.option', '0', '- '.JText::_('COM_PHOCAGALLERY_SELECT_CATEGORY').' -', 'value', 'text'));
		$this->lists['catid'] = Joomla\CMS\HTML\HTMLHelper::_( 'select.genericlist', $tree, 'filter_catid',  $javascript , 'value', 'text', $filter_catid );
		//-----------------------------------------------------------------------

		// state filter
		$this->lists['state']		= Joomla\CMS\HTML\HTMLHelper::_('grid.state',  $filter_published );

		// table ordering
		$this->lists['order_Dir'] = $filter_order_Dir;
		$this->lists['order'] 	= $filter_order;

		// search filter
		$this->lists['search']	= $search;

		$this->user = JFactory::getUser();
		$this->request_url = $uri->toString();
		/*$this->assignRef('tmpl',		$t);
		$this->assignRef('button',		$this->button);
		$this->assignRef('user',		$this->user);
		$this->assignRef('items',		$this->items);
		$this->assignRef('request_url',	$this->request_url);*/

		switch($this->t['type']) {

			case 2:

				$i = 0;
				$itemsCount = $itemsStart = array();
				foreach($this->items as $key => $value) {

					$itemsCount[$i] = new StdClass();
					$itemsCount[$i]->value 	= $key;
					$itemsCount[$i]->text	= $key;
					$itemsStart[$i] = new StdClass();
					$itemsStart[$i]->value 	= $key;
					$itemsStart[$i]->text	= $key;
					$i++;
				}

				// Don't display it if no category is selected
				if($i > 0) {
					$itemsCount[$i] = new StdClass();
					$itemsCount[$i]->value 	= (int)$key + 1;
					$itemsCount[$i]->text	= (int)$key + 1;
				}
				$categoryId		= $app->input->get( 'filter_catid', 0, '', 'int' );
				$categoryIdList	= $app->getUserStateFromRequest( $this->_context.'.filter_catid',	'filter_catid',	0, 'int' );

				if ((int)$categoryId == 0 && $categoryIdList == 0) {
					$itemsCount = $itemsStart = array();
				}

				$this->lists['limitstartparam'] = Joomla\CMS\HTML\HTMLHelper::_( 'select.genericlist', $itemsStart, 'limitstartparam',  '' , 'value', 'text', '' );
				$this->lists['limitcountparam'] = Joomla\CMS\HTML\HTMLHelper::_( 'select.genericlist', $itemsCount, 'limitcountparam',  '' , 'value', 'text', '' );

				parent::display('images');
			break;

			case 3:

				parent::display('switchimage');
			break;

			case 4:

				parent::display('slideshow');
			break;

			case 1:
			default:

				parent::display($tpl);
			break;

		}
	}
}
?>
