<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.framework'); 				// javascript Joomla object for grid.sort !

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('10', $user->groups));		// sets flag when user group is '10' that is 'MRH Administrateur 
$isAbr = (in_array('12', $user->groups));		// sets flag when user group is '1' that is 'FootRegion Public
$isPub = (in_array('11', $user->groups));		// set flags when user group is '12' that is 'FootRegion Public
$isPub1 = (in_array('12', $user->groups));		// set flags when user group is '12' that is 'FootRegion Public
$isPub2 = (in_array('13', $user->groups));		// set flags when user group is '12' that is 'FootRegion Public
$isPub3 = (in_array('14', $user->groups));		// set flags when user group is '12' that is 'FootRegion Public
$isPub4 = (in_array('15', $user->groups));		// set flags when user group is '12' that is 'FootRegion Public
?>

<?php if (!$isAdmin && !$isAbr && !$isPub && !$isPub1 && !$isPub2 && !$isPub3 && !$isPub4) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS')); ?>
<?php else : ?>

	<h2><?php echo JText::_('COM_FOOTREGION_TOURNOIS'); ?>
	</h2>

	<?php echo $this->loadTemplate('items'); ?>

	<?php echo $this->pagination->getListFooter(); ?>

<?php endif; ?>
