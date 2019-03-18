<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.framework'); 				// javascript Joomla object for grid.sort !

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

	<h2><?php echo JText::_('COM_FOOTREGION_DISCUSSIONS'); ?>
	</h2>

	<?php echo $this->loadTemplate('items'); ?>

	<?php echo $this->pagination->getListFooter(); ?>

<?php endif; ?>
