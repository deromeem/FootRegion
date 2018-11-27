<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('12', $user->groups));		// sets flag when user group is '1' that is 'FootRegion Public
$isArb = (in_array('10', $user->groups));		// sets flag when user group is '10' that is 'MRH Administrateur
$isPub = (in_array('1', $user->groups));		// set flags when user group is '1' that is 'FootRegion Public

?>

<?php if (!$isAdmin && !$isAbr) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS') ); ?>
<?php else : ?>
	<div class="form-inline form-inline-header">
		<div class="btn-group pull-left">
			<h2><?php echo JText::_('COM_FOOTREGION_TOURNOI'); ?></h2>
		</div>
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=tournois'); ?>" class="btn" role="button">
				<span class="icon-cancel"></span></a>
		</div>	
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=form_c&layout=edit&id='.$this->item->id); ?>" class="btn" role="button"><span class="icon-edit"></span></a>
		</div>	
	</div>
	<div>
		<table class="table">
			<tbody>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_TOURNOIS_NOM'); ?></span>
					</td>
					<td width="80%">
						<h4><?php echo $this->item->nom ?></h4>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php endif; ?>
