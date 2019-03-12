<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('13', $user->groups));		// sets flag when user group is '10' that is 'MRH Administrateur 
$isAdm = (in_array('11', $user->groups));		// sets flag when user group is '11' that is 'FootRegion Administrateur 
$isDir = (in_array('13', $user->groups));		// sets flag when user group is '13' that is 'FootRegion Directeur  
?>

<?php if (!$isAdm && !$isDir) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS') ); ?>
<?php else : ?>
	<div class="form-inline form-inline-header">
		<div class="btn-group pull-left">
			<h2><?php echo JText::_('COM_FOOTREGION_DISCUSSION'); ?></h2>
		</div>
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=discussions'); ?>" class="btn" role="button">
				<span class="icon-cancel"></span></a>
		</div>	
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=form&layout=edit&id='.$this->item->id); ?>" class="btn" role="button">
				<span class="icon-edit"></span></a>
		</div>	
	</div>
	<table class="table table-striped" id="articleList">
		<thead>
			<tr>
			<th class="title">
					<?php echo JText::_('COM_FOOTREGION_MESSAGES_LIBELLE')?>
				</th>
				<th class="title">
					<?php echo JText::_('COM_FOOTREGION_UTILISATEURS_NOM')?>
				</th>
				<!-- <th class="title">Publié</th> -->
				<th class="title">
					<?php echo JText::_('COM_FOOTREGION_MESSAGES_CREATED')?>
				</th>
			</tr>
		</thead>
		<tbody>
		
			<?php foreach($this->item as $i => $ite) : ?>
				<tr class="row<?php echo $i % 2; ?>">
				<?php var_dump($this->item->message) ?>
					<td><?php echo $this->ite[1]['message'] ?></td>
					<td><?php echo $this->ite->utilisateur ?></td>
					<td><?php echo $this->ite->date ?></td>
				</tr>			
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
