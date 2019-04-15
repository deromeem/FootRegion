<?php

JHtml::_('behavior.framework'); 				// javascript Joomla object for grid.sort !

?>



	<h2><?php echo JText::_('COM_FOOTREGION_TOURNOIS'); ?>
	</h2>

	<?php echo $this->loadTemplate('items'); ?>

	<?php echo $this->pagination->getListFooter(); ?>


