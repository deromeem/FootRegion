<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.framework'); 				// javascript Joomla object for grid.sort !

$user = JFactory::getUser();               		// gets current user object
$isPublic = (in_array('10', $user->groups));
$isAdm = (in_array('11', $user->groups));
$isArb = (in_array('12', $user->groups));	
$isDir = (in_array('13', $user->groups));	
$isEnt = (in_array('14', $user->groups));	
$isJou = (in_array('15', $user->groups));			
?>

<?php if (!$isArb && !$isArb && !$isDir && !$isEnt && !$isJou && !$isAdm) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS') ); ?>
<?php else : ?>

	<h2><?php echo JText::_('COM_FOOTREGION_MATCHS'); ?>
	</h2>

	<?php echo $this->loadTemplate('items'); ?>

	<?php echo $this->pagination->getListFooter(); ?>

<?php endif; ?>
