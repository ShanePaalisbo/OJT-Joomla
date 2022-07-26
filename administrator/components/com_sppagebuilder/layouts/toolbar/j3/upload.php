<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2022 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$title = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_UPLOAD_FILES');
?>
<button id="sp-pagebuilder-upload-media" data-toggle="collapse" data-target="#collapseUpload" class="btn btn-small btn-success">
	<span class="fas fa-upload" aria-hidden="true"></span> <?php echo $title; ?>
</button>
