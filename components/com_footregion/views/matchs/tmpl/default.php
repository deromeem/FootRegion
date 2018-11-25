<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.framework'); 				// javascript Joomla object for grid.sort !

$user = JFactory::getUser();               		// gets current user object
$isAdm = (in_array('11', $user->groups));		// sets flag when user group is '11' that is 'FootRegion Administrateur 
$isDir = (in_array('13', $user->groups));		// sets flag when user group is '13' that is 'FootRegion Directeur 
?>

<?php if (!$isAdm && !$isDir) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_ANNUAIRE_RESTRICTED_ACCESS') ); ?>
<?php else : ?>

	<h2><?php echo JText::_('COM_ANNUAIRE_OPTIONS')." : ".JText::_('COM_ANNUAIRE_ENTREPRISES')." - "; ?>
		<a href="<?php echo JRoute::_('index.php?option=com_annuaire&view=contacts'); ?>">
			<?php echo JText::_('COM_ANNUAIRE_CONTACTS'); ?>
		</a>
	</h2>

	<?php echo $this->loadTemplate('items'); ?>

	<?php echo $this->pagination->getListFooter(); ?>

<?php endif; ?>
