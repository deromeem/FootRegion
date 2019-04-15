<?php
defined('_JEXEC') or die;

$uriCompoDetail = JURI::base(true)."/index.php?option=com_footregion&view=joueur&id=";

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$isEnt = (in_array('14', $user->groups));
$isAdmin = (in_array('11', $user->groups));


?>

<form action="<?php echo JUri::getInstance()->toString(); ?>" method="post" name="adminForm" id="adminForm">

	<!-- affichage du filtre de nombre d'enregistrement par page -->
	<fieldset class="filters">
		<div class="display-limit">
			<?php // echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
			<?php // echo $this->pagination->getLimitBox(); ?>
		</div>
		<input type="hidden" name="filter_order" value="<?php echo $listOrder ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn ?>" />
		<input type="hidden" name="task" value="" />
	</fieldset>
	
	<div class="form-inline form-inline-header">
		<div class="filter-search btn-group pull-left">
			<input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER');?>" 
			value="<?php echo $this->escape($this->state->get('filter.search')); ?>" />
		</div>		
		<div class="btn-group pull-left">
			<button type="submit" class="btn" title="<?php echo JText::_('JSEARCH_FILTER');?>">
				<i class="icon-search"></i></button>
		</div>
		<div class="btn-group pull-left">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=form&layout=edit'); ?>" class="btn" role="button" <?php if (!$isEnt && !$isAdmin)?> type="hidden" <?php ?> <span class="icon-plus"></span></a>
		</div>
		<div class="btn-group pull-right">
			<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
			<?php echo $this->pagination->getLimitBox(); ?>
		</div>
	</div>			
	<div class="clearfix"> </div>
	<br />
	<table class="table table-striped" id="articleList">
		<thead>
			<tr>
			<th class="title">
					<?php echo JHtml::_('grid.sort', JText::_('COM_FOOTREGION_UTILISATEURS_NOM'), 'nom', $listDirn, $listOrder) ?>
				</th>
				<th class="title">
					<?php echo JHtml::_('grid.sort', JText::_('COM_FOOTREGION_EQUIPES_NOM'), 'nom_equipe', $listDirn, $listOrder) ?>
				</th>
				<th class="title">
					<?php echo JHtml::_('grid.sort', JText::_('COM_FOOTREGION_JOUEURS_EMAIL'), 'email', $listDirn, $listOrder) ?>
				</th>
				<!-- <th class="title">Publié</th> -->
				<th class="title">
					<?php echo JHtml::_('grid.sort', JText::_('COM_FOOTREGION_JOUEURS_POSTE'), 'poste', $listDirn, $listOrder) ?>
				</th>
				<th class="title">
					<?php echo JHtml::_('grid.sort', JText::_('COM_FOOTREGION_JOUEURS_DATE_NAISS'), 'date_naiss', $listDirn, $listOrder) ?>
				</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($this->items as $i => $item) : ?>
				<tr class="row<?php echo $i % 2; ?>">
					<td><?php echo $item->utilisateur ?></td>
					<td><?php echo $item->equipe ?></td>
					<td>
						<a href="<?php echo $uriCompoDetail.$item->id ?>"><?php echo $item->email ?></a>
					</td>
					<!-- <td><?php echo JHtml::_('jgrid.published', $item->published, $i, 'joueurs.', true); ?></td> -->
					<td><?php echo $item->poste ?></td>
					<td><?php echo $item->date_naiss ?></td>
					</tr>			
			<?php endforeach; ?>
		</tbody>
	</table>
</form>
