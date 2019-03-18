<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'arbitre.cancel' || document.formvalidator.isValid(document.id('footregion-form')))
		{
			Joomla.submitform(task, document.getElementById('footregion-form'));
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_footregion&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="footregion-form" class="form-validate">

	<div class="form-inline form-inline-header">
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
		</div>	
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('email'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('email'); ?></div>
		</div>					
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('alias'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('alias'); ?></div>
		</div>					
	</div>
	
	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'arbitre')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'arbitre', JText::_('COM_FOOTREGION_ARBITRE')); ?>
		<div class="row-fluid">
			<div class="span9">
				<div class="form-vertical">
					<div class="control-group">
						<div class="span2">
							<div class="control-label"><?php echo $this->form->getLabel('email'); ?></div>
						</div>
						<div class="span7">
							<div class="controls"><?php echo $this->form->getInput('email'); ?></div>
						</div>
					</div>
					<div class="control-group">
						<div class="span2">
							<div class="control-label"><?php echo $this->form->getLabel('mobile'); ?></div>
						</div>
						<div class="span7">
							<div class="controls"><?php echo $this->form->getInput('mobile'); ?></div>
						</div>
					</div>
					<div class="control-group">
						<div class="span2">
							<div class="control-label"><?php echo $this->form->getLabel('date_naiss'); ?></div>
						</div>
						<div class="span7">
							<div class="controls"><?php echo $this->form->getInput('date_naiss'); ?></div>
						</div>	
					</div>
				</div>
			</div>
			<div class="span3">
				<?php echo JLayoutHelper::render('joomla.edit.global', $this); ?>
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
