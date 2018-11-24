<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

	<tr>
        <th width="20" class="hidden-phone">
                <?php echo JHtml::_('grid.checkall'); ?>
        </th>     
        <th class="nowrap hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_ENTRAINEURS', 'u.nom_entraineurs', $listDirn, $listOrder) ?>
        </th>    
        <th class="nowrap hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_ENTRAINEURS_NUM_LICENCE', 'en.num_licence', $listDirn, $listOrder) ?>
        </th>
        <th class="nowrap hidden-tablet hidden-phone">
                <?php echo JHtml::_('grid.sort', 'COM_FOOTREGION_ENTRAINEURS_EMAIL', 'en.email', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:55px" class="nowrap center ">
                <?php echo JHtml::_('grid.sort', 'Publié', 'en.published', $listDirn, $listOrder) ?>
        </th>
        <th width="1%" style="min-width:120px">
                <?php echo JHtml::_('grid.sort', 'Date', 'en.modified', $listDirn, $listOrder) ?>
        </th>
	<th width="1%">
		<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'en.hits', $listDirn, $listOrder); ?>
	</th>
	</tr>

