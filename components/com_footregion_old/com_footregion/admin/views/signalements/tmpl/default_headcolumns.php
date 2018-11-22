<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

	<tr>
        <th width="20" class="hidden-phone">
                <?php echo JHtml::_('grid.checkall'); ?>
        </th>                   
        <th width="30%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_SIGNALEMENTS_LIBELLE', 's.libelle', $listDirn, $listOrder) ?>
        </th>
        <th width="30%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_SIGNALEMENTS_ARBITRES_ID', 'a.email', $listDirn, $listOrder) ?>
        </th>
        <th width="30%" class="nowrap hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_SIGNALEMENTS_ENTRAINEURS_ID', 'e.email', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:55px" class="nowrap center ">
                <?php echo JHtml::_('grid.sort', 'Publié', 's.published', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:120px" class="nowrap center">
                <?php echo JHtml::_('grid.sort', 'Date', 's.modified', $listDirn, $listOrder) ?>
        </th>
		<th width="10%">
			<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 's.hits', $listDirn, $listOrder); ?>
		</th>
		<th width="1%" class="nowrap center hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 's.id', $listDirn, $listOrder); ?>
		</th>
	</tr>

