<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

	<tr>
        <th width="20" class="hidden-phone">
                <?php echo JHtml::_('grid.checkall'); ?>
        </th>                   
        <th>
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_JOUEURS_EMAIL', 'j.clubs_email', $listDirn, $listOrder) ?>
        </th>
        <th class="nowrap">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_JOUEURS_POSTE', 'j.clubs_poste', $listDirn, $listOrder) ?>
        </th>
        <th class="nowrap hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_JOUEURS_NUM_LICENCE', 'j.categories_num_licence', $listDirn, $listOrder) ?>
        </th>
        </th>
        <th class="nowrap hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_JOUEURS_DATE_NAISS', 'j.entraineurs_date_naiss', $listDirn, $listOrder) ?>
        </th>
        <th class="nowrap hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_JOUEURS_EQUIPES_ID', 'j.clubs_equipes_id', $listDirn, $listOrder) ?>
        </th>
        <th class="nowrap" width="1%" style="min-width:55px">
                <?php echo JHtml::_('grid.sort', 'Publié', 'j.published', $listDirn, $listOrder) ?>
        </th>
        <th class="nowrap hidden-tablet hidden-phone"  width="1%" style="min-width:120px">
                <?php echo JHtml::_('grid.sort', 'Date', 'j.modified', $listDirn, $listOrder) ?>
        </th>
	<th class="nowrap hidden-tablet hidden-phone" width="1%">
		<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'j.hits', $listDirn, $listOrder); ?>
	</th>
	<th class="nowrap hidden-tablet hidden-phone" width="1%">
		<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'j.id', $listDirn, $listOrder); ?>
	</th>
	</tr>

