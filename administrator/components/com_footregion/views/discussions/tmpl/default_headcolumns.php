<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

	<tr>
        <th width="20" class="hidden-phone">
                <?php echo JHtml::_('grid.checkall'); ?>
        </th>                   
        <th width="35%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_DISCUSSIONS_THEME', 'd.theme', $listDirn, $listOrder) ?>
        </th>
        <th width="35%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_UTILISATEURS_NOM', 'noms', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:55px" class="nowrap center">
                <?php echo JHtml::_('grid.sort', 'Publié', 'd.published', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:120px" class="nowrap center">
                <?php echo JHtml::_('grid.sort', 'Date', 'd.modified', $listDirn, $listOrder) ?>
        </th>
		<th width="10%" class="hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'd.hits', $listDirn, $listOrder); ?>
		</th>
		<th width="1%" class="nowrap center hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'd.id', $listDirn, $listOrder); ?>
		</th>
	</tr>

