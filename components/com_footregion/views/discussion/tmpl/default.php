<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();               		// gets current user object
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
	<div>
		<table class="table">
			<tbody>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_DISCUSSIONS_THEME'); ?></span>
					</td>
					<td width="80%">
						<h4><?php echo $this->item->theme ?></h4>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_DISCUSSIONS_UTILISATEUR_ID'); ?></span>
					</td>
					<td width="80%">
						<h4><?php echo $this->item->utilisateur_id ?></h4>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_COMMENT'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->commentaire ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php endif; ?>
