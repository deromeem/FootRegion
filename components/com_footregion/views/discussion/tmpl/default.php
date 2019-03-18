<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();               		// gets current user object 
$isAdmin = (in_array('10', $user->groups));		// sets flag when user group is '10' that is 'MRH Administrateur 
$isJoueur = (in_array('15', $user->groups));
$isEntraineur = (in_array('14', $user->groups));
$isDirecteur = (in_array('13', $user->groups));
$isArbitre = (in_array('12', $user->groups));
?>

<?php if (!$isAdmin && !$isJoueur && !$isArbitre && !$isDirecteur && !$isEntraineur) : ?>
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
	</div>
	<table class="table table-striped" id="articleList">
		<thead>
			<tr>
			<th class="title">
					<?php echo JText::_('COM_FOOTREGION_MESSAGES_LIBELLE')?>
				</th>
				<th class="title">
					<?php echo JText::_('Utilisateur')?>
				</th>
				<!-- <th class="title">Publié</th> -->
				<th class="title">
					<?php echo JText::_('COM_FOOTREGION_MESSAGES_CREATED')?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->item as $ite) : ?>
				<tr class="row<?php echo $i = $i + $i;?>">
					<td><?php echo $ite->message ?></td>
					<td><?php echo $ite->utilisateur ?></td>
					<td><?php echo $ite->date; $i++;?></td>
				</tr>			
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
