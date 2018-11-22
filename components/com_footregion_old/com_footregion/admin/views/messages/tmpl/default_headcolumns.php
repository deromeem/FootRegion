<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

	<tr>         
        <th width="5" class="hidden-phone">
                <?php echo JHtml::_('grid.checkall'); ?>
        </th>                 
        <th width="45%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_MESSAGES_LIBELLE', 'm.libelle', $listDirn, $listOrder) ?>
        </th>
        <th width="15%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_UTILISATEURS_NOM', 'u.nom', $listDirn, $listOrder) ?>
        </th>
        <th width="15%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_DISCUSSIONS_THEME', 'd.theme', $listDirn, $listOrder) ?>
        </th>
        <th width="5%" style="min-width:55px" class="nowrap center hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'Publié', 'm.published', $listDirn, $listOrder) ?>
        </th>
        <th width="10%" style="min-width:120px" class="nowrap center">
                <?php echo JHtml::_('grid.sort', 'Date', 'm.modified', $listDirn, $listOrder) ?>
        </th>
		<th width="5%" class="hidden-tablet hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'm.hits', $listDirn, $listOrder); ?>
		</th>
		<th width="5%" class="nowrap center hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'm.id', $listDirn, $listOrder); ?>
		</th>
	</tr>

