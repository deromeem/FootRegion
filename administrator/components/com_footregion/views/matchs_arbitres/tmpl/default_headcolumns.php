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
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_MATCHS_ARBITRES_ROLE', 'ma.role', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" class="nowrap hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_MATCHS_ARBITRES_ARBITRES', 'a.email', $listDirn, $listOrder) ?>
        </th>
        <th width="35%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_MATCHS_ARBITRES_MATCHS', 'm.nom', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:55px" class="nowrap center ">
                <?php echo JHtml::_('grid.sort', 'Publié', 'ma.published', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:120px" class="nowrap center">
                <?php echo JHtml::_('grid.sort', 'Date', 'ma.modified', $listDirn, $listOrder) ?>
        </th>
		<th width="10%">
			<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'ma.hits', $listDirn, $listOrder); ?>
		</th>
		<th width="1%" class="nowrap center hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'ma.id', $listDirn, $listOrder); ?>
		</th>
	</tr>

