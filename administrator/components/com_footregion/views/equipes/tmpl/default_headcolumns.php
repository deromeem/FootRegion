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
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_EQUIPES_NOM', 'eq.nom', $listDirn, $listOrder) ?>
        </th>
        <th class="nowrap center hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_EQUIPES_CLUBS', 'eq.clubs_id', $listDirn, $listOrder) ?>
        </th>
        </th>
        <th class="nowrap center hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_EQUIPES_CATEGORIES', 'eq.categories_id', $listDirn, $listOrder) ?>
        </th>
        </th>
        <th class="nowrap center hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_EQUIPES_ENTRAINEURS', 'eq.entraineurs_id', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:55px" class="nowrap center ">
                <?php echo JHtml::_('grid.sort', 'Publié', 'eq.published', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:120px" class="nowrap center">
                <?php echo JHtml::_('grid.sort', 'Date', 'eq.modified', $listDirn, $listOrder) ?>
        </th>
	<th width="10%">
		<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'eq.hits', $listDirn, $listOrder); ?>
	</th>
	<th width="1%" class="nowrap center hidden-phone">
		<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'eq.id', $listDirn, $listOrder); ?>
	</th>
	</tr>

