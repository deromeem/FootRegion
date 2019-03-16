<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.framework'); 				// javascript Joomla object for grid.sort !

$user = JFactory::getUser();               		// gets current user object

$groupeNumb = substr(implode($user->groups),1,2);
$isAdmin = (in_array($groupeNumb, $user->groups));		// sets flag when user group is '10' that is 'MRH Administrateur
?>

<?php if (!$isAdmin) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS') ); ?>
<?php else : ?>

	<h2><?php echo JText::_('COM_FOOTREGION_CLUBS')." "; ?>
		<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=clubs'); ?>">

		</a>
	</h2>

	<?php echo $this->loadTemplate('items'); ?>

	<?php echo $this->pagination->getListFooter(); ?>

<?php endif; ?>
