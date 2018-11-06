<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'club.cancel' || document.formvalidator.isValid(document.id('footregion-form')))
		{
			<?php echo $this->form->getField('commentaire')->save(); ?>
			Joomla.submitform(task, document.getElementById('footregion-form'));
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_footregion&view=clubs&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="footregion-form" class="form-validate">

	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('nom'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('nom'); ?></div>
		<div class="control-label"><?php echo $this->form->getLabel('alias'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('alias'); ?></div>
	</div>					


	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', JText::_('COM_FOOTREGION_CLUB')); ?>
		<div class="row-fluid">
			
			<div class="span9">
				<div class="control-group">
				</div>
				<div class="form-vertical">
					<br/>
					<?php echo $this->form->getControlGroup('commentaire'); ?>
				</div>
			</div>
			<div class="span3">
				<?php echo JLayoutHelper::render('joomla.edit.global', $this); ?>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'infos', JText::_('COM_FOOTREGION_ADVANCED')); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="form-vertical">
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('sigle'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('sigle'); ?></div> 
					<div class="control-label"><?php echo $this->form->getLabel('adr_rue'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('adr_rue'); ?></div>
					<div class="control-label"><?php echo $this->form->getLabel('adr_ville'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('adr_ville'); ?></div>
					<div class="control-label"><?php echo $this->form->getLabel('adr_cp'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('adr_cp'); ?></div>
					<div class="control-label"><?php echo $this->form->getLabel('directeurs_id'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('directeurs_id'); ?></div> 
				</div>					
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
			
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'publishing', JText::_('JGLOBAL_FIELDSET_PUBLISHING', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla.edit.publishingdata', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla.edit.metadata', $this); ?>
			</div>
		</div>
	
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		<?php echo JLayoutHelper::render('joomla.edit.params', $this); ?>

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
