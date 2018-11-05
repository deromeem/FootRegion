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
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_CLUBS_NOM', 'c.nom', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" class="nowrap hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_CLUBS_ALIAS', 'c.alias', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" class="nowrap hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_CLUBS_SIGLE', 'c.sigle', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" class="nowrap hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_CLUBS_NOM_DIRECTEUR', 'c.nom', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" class="nowrap hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_CLUBS_PRENOM_DIRECTEUR', 'c.prenom', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" class="nowrap hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_CLUBS_ADR_RUE', 'c.adr_rue', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" class="nowrap hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_CLUBS_ADR_VILLE', 'c.adr_ville', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" class="nowrap hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_CLUBS_ADR_CP', 'c.adr_cp', $listDirn, $listOrder) ?>
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

