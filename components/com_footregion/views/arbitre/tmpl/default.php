<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('12', $user->groups));		// sets flag when user group is '10' that is 'MRH Administrateur 
?>

<?php if (!$isAdmin) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS') ); ?>
<?php else : ?>
	<div class="form-inline form-inline-header">
		<div class="btn-group pull-left">
			<h2><?php echo JText::_('COM_FOOTREGION_ARBITRE'); ?></h2>
		</div>
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=arbitres'); ?>" class="btn" role="button">
				<span class="icon-cancel"></span></a>
		</div>	
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=form_a&layout=edit&id='.$this->item->id); ?>" class="btn" role="button"><span class="icon-edit"></span></a>
		</div>	
	</div>
	<div>
		<table class="table">
			<tbody>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_ARBITRES_ID'); ?></span>
					</td>
					<td width="80%">
						<h4><?php echo $this->item->id ?></h4>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_ARBITRES_EMAIL'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->email ?>
					</td>
				</tr>
					<td width="80%">
						<!--<a href="<?php // echo JRoute::_('index.php?option=com_footregion&view=arbitre&id='.(int) $this->item->entreprises_id); ?>"><?php // echo $this->item->entreprise ?></a>-->
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php endif; ?>
