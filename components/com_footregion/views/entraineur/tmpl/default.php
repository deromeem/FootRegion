<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('11', $user->groups));	
$isDir = (in_array('13', $user->groups));
$isEnt = (in_array('14', $user->groups));

?>

<?php if (!$isAdmin && !$isDir && !$isEnt) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS') ); ?>
<?php else : ?>
	<div class="form-inline form-inline-header">
		<div class="btn-group pull-left">
			<h2><?php echo JText::_('COM_FOOTREGION_ENTRAINEUR'); ?></h2>
		</div>
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=entraineurs'); ?>" class="btn" role="button">
				<span class="icon-cancel"></span></a>
		</div>	
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=form_entraineur&layout=edit&id='.$this->item->id); ?>" class="btn" role="button"><span class="icon-edit"></span></a>
		</div>	
	</div>
	<div>
		<table class="table">
			<tbody>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_ENTRAINEURS_EMAIL'); ?></span>
					</td>
					<td width="80%">
						<h4><?php echo $this->item->email ?></h4>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_ENTRAINEURS_NUM_LICENCE'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->num_licence ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php endif; ?>
