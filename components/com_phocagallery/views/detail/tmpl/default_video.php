<?php
/*
 * @package Joomla
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Gallery
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

defined('_JEXEC') or die('Restricted access');

if ($this->t['ytb_display'] == 1) {

	$document	= JFactory::getDocument();
	$document->addCustomTag( "<style type=\"text/css\"> \n"
			." body {overflow:hidden;} \n"
			." </style> \n");

	echo '<div style="padding:0;margin:0;" class="pg-ytb-full">'.$this->item->videocode.'</div>';
} else {

	echo '<div id="phocagallery" class="pg-detail-view'.$this->params->get( 'pageclass_sfx' ).'">';
	if ($this->t['backbutton'] != '') {
		echo $this->t['backbutton'];
	}

	echo '<table border="0" style="width:'.$this->t['boxlargewidth'].'px;height:'.$this->t['boxlargeheight'].'px;">'
		.'<tr>'
		.'<td colspan="5" class="pg-center" align="center" valign="middle">'
		.$this->item->videocode
		.'</td>'
		.'</tr>';

	$titleDesc = '';
	if ($this->t['display_title_description'] == 1) {
		$titleDesc .= $this->item->title;
		if ($this->item->description != '' && $titleDesc != '') {
			$titleDesc .= ' - ';
		}
	}

	// Standard Description
	if ($this->t['displaydescriptiondetail'] == 1) {
		echo '<tr>'
		.'<td colspan="6" align="left" valign="top" class="pg-dv-desc">'
		.'<div class="pg-dv-desc">'
		. $titleDesc . $this->item->description . '</div>'
		.'</td>'
		.'</tr>';
	}

	if ($this->t['detailbuttons'] == 1){
		echo '<tr>'
		.'<td align="left" width="30%" style="padding-left:48px">'.$this->item->prevbutton.'</td>'
		.'<td align="center"></td>'
		.'<td align="center">'.str_replace("%onclickreload%", $this->t['detailwindowreload'], $this->item->reloadbutton).'</td>';
		if ($this->t['detailwindow'] == 4 || $this->t['detailwindow'] == 5 || $this->t['detailwindow'] == 7) {
		} else {
			echo '<td align="center">' . str_replace("%onclickclose%", $this->t['detailwindowclose'], $this->item->closebutton). '</td>';
		}
		echo '<td align="right" width="30%" style="padding-right:48px">'.$this->item->nextbutton.'</td>'
		.'</tr>';
	}
	echo '</table>';
	echo $this->loadTemplate('rating');
	if ($this->t['detailwindow'] == 7) {
        echo PhocaGalleryUtils::getExtInfo();
	}
	echo '</div>';
}
?>
