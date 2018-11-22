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
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_DIRECTEURS_EMAIL', 'd.email', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" >
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_DIRECTEURS_NOM', 'u.nom', $listDirn, $listOrder) ?>
        </th>   
        <th width="35%" >
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_DIRECTEURS_PRENOM', 'u.prenom', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" >
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_DIRECTEURS_DATE_AFFECTATION', 'd.date_affectation', $listDirn, $listOrder) ?>
        </th>
	<th width="35%" style="min-width:55px" class="nowrap center ">
                <?php echo JHtml::_('grid.sort', 'Publié', 'd.published', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" style="min-width:120px" class="nowrap center">
                <?php echo JHtml::_('grid.sort', 'Date', 'd.modified', $listDirn, $listOrder) ?>
        </th>
		<th width="35%" class="nowrap center hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'd.id', $listDirn, $listOrder); ?>
		</th>
	</tr>
	</tr>

