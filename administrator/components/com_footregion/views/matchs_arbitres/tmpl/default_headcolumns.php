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
        <th width="35%">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_MATCHS_ARBITRES_MATCHS_ID', 'ma.matchs_id', $listDirn, $listOrder) ?>
        </th>
        <th width="35%" class="nowrap hidden-phone">
<<<<<<< HEAD:administrator/components/com_footregion/views/matchs/tmpl/default_headcolumns.php
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_MATCHS_EQUIPE_VISITEURS', 'm.equipe_invite', $listDirn, $listOrder) ?>
=======
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_MATCHS_ARBITRES_ARBITRES_ID', 'ma.arbitres_id', $listDirn, $listOrder) ?>
>>>>>>> 9c9ba101812b36a3c63ab4cedf8d827267555930:administrator/components/com_footregion/views/matchs_arbitres/tmpl/default_headcolumns.php
        </th>
        <th class="nowrap center hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_MATCHS_ARBITRES_ALIAS', 'ma.alias', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:55px" class="nowrap center ">
                <?php echo JHtml::_('grid.sort', 'Publié', 'u.published', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:120px" class="nowrap center">
                <?php echo JHtml::_('grid.sort', 'Date', 'u.modified', $listDirn, $listOrder) ?>
        </th>
		<th width="10%">
			<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'u.hits', $listDirn, $listOrder); ?>
		</th>
		<th width="1%" class="nowrap center hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'u.id', $listDirn, $listOrder); ?>
		</th>
	</tr>

