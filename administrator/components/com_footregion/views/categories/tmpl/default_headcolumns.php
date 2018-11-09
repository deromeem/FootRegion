<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

	<tr>
        <th width="20" class="hidden-phone">
                <?php echo JHtml::_('grid.checkall'); ?>
        </th>                   
        <th width="35%" >
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_CATEGORIES_NOM', 'c.nom', $listDirn, $listOrder) ?>
        </th>
	<th width="35%" style="min-width:55px" class="nowrap center ">
                <?php echo JHtml::_('grid.sort', 'Publié', 'c.published', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" style="min-width:120px" class="nowrap center">
                <?php echo JHtml::_('grid.sort', 'Date', 'c.modified', $listDirn, $listOrder) ?>
        </th>
		<th width="35%" class="nowrap center hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'c.id', $listDirn, $listOrder); ?>
		</th>
	</tr>
	</tr>

