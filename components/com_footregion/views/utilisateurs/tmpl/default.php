<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.framework'); 				// javascript Joomla object for grid.sort !

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('10', $user->groups));		// sets flag when user group is '10' that is 'MRH Administrateur 
$isJoueur = (in_array('15', $user->groups));
?>

<?php if (!$isAdmin && !$isJoueur) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS') ); ?>
<?php else : ?>

	<h2><?php echo JText::_('COM_FOOTREGION_OPTIONS')." : ".JText::_('COM_FOOTREGION_UTILISATEURS')." - "; ?>
		<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=utilisateur'); ?>">
			<?php echo JText::_('COM_FOOTREGION_UTILISATEURS'); ?>
		</a>
	</h2>

	<?php echo $this->loadTemplate('items'); ?>

	<?php echo $this->pagination->getListFooter(); ?>

<?php endif; ?>
