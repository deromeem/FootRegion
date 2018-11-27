<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.framework'); 				// javascript Joomla object for grid.sort !

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('10', $user->groups));		// sets flag when user group is '10' that is 'MRH Administrateur 
$isAbr = (in_array('12', $user->groups));		// sets flag when user group is '1' that is 'FootRegion Public
$isPub = (in_array('1', $user->groups));		// set flags when user group is '12' that is 'FootRegion Public
?>

<?php if (!$isAdmin && !$isAbr) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS')); ?>
<?php else : ?>

	<h2><?php echo JText::_('COM_FOOTREGION_TOURNOIS'); ?>
	</h2>

	<?php echo $this->loadTemplate('items'); ?>

	<?php echo $this->pagination->getListFooter(); ?>

<?php endif; ?>
