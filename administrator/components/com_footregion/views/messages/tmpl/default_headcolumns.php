<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

	<tr>         
        <th width="20" class="hidden-phone">
                <?php echo JHtml::_('grid.checkall'); ?>
        </th>                 
        <th width="20%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_MESSAGES_LIBELLE', 'm.libelle', $listDirn, $listOrder) ?>
        </th>
        <th width="20%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_MESSAGES_UTILISATEURS_ID', 'm.utilisateurs_id', $listDirn, $listOrder) ?>
        </th>
        <th width="20%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_MESSAGES_DISCUSSIONS_ID', 'm.discussions_id', $listDirn, $listOrder) ?>
        </th>
        <th width="20%" style="min-width:55px" class="nowrap center hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'Publié', 'm.published', $listDirn, $listOrder) ?>
        </th>
        <th width="20%" style="min-width:120px" class="nowrap center">
                <?php echo JHtml::_('grid.sort', 'Date', 'm.modified', $listDirn, $listOrder) ?>
        </th>
		<th width="20%" class="hidden-tablet hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'm.hits', $listDirn, $listOrder); ?>
		</th>
		<th width="20%" class="nowrap center hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'm.id', $listDirn, $listOrder); ?>
		</th>
	</tr>

