<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.calendar');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('10', $user->groups));		// sets flag when user group is '10' that is 'MRH Administrateur 
?>

<?php if (!$isAdmin) : ?>
<<<<<<< HEAD
	<?php echo JError::raiseWarning( 100, JText::_('COM_ANNUAIRE_RESTRICTED_ACCESS') ); ?>
=======
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS') ); ?>
>>>>>>> 2bca2880384ad9920075063e1855712b08fecf20
<?php else : ?>

	<script type="text/javascript">
		// fonction javascript pour gérer les actions sur les boutons
		Joomla.submitbutton = function(task)
		{
			// si bouton 'Annuler' ou si les champs du formulaire sont valides alors on envoie le formulaire
			if (task == 'entreprise.cancel' || document.formvalidator.isValid(document.getElementById('adminForm')))
			{
				Joomla.submitform(task);
			}
		}
	</script>

	<div class="edit item-page">
<<<<<<< HEAD
		<form action="<?php echo JRoute::_('index.php?option=com_annuaire&a_id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-vertical">
=======
		<form action="<?php echo JRoute::_('index.php?option=com_footregion&a_id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-vertical">
>>>>>>> 2bca2880384ad9920075063e1855712b08fecf20
			
			<div class="form-inline form-inline-header">
				<div class="btn-group pull-left">
					<?php $isNew = ($this->item->id == 0); ?>
<<<<<<< HEAD
					<h2><?php echo JText::_('COM_ANNUAIRE_ENTREPRISE')." ".($isNew ? JText::_('COM_ANNUAIRE_ADD_PAR'): JText::_('COM_ANNUAIRE_MODIF_PAR')); ?></h2>
				</div>
				<div class="btn-toolbar">
					<div class="btn-group pull-right">
						<button type="button" class="btn" onclick="Joomla.submitbutton('entreprise.cancel')">
=======
					<h2><?php echo JText::_('COM_FOOTREGION_DISCUSSION')." ".($isNew ? JText::_('COM_FOOTREGION_ADD_PAR'): JText::_('COM_FOOTREGION_MODIF_PAR')); ?></h2>
				</div>
				<div class="btn-toolbar">
					<div class="btn-group pull-right">
						<button type="button" class="btn" onclick="Joomla.submitbutton('discussion.cancel')">
>>>>>>> 2bca2880384ad9920075063e1855712b08fecf20
							<span class="icon-cancel"></span>
						</button>
					</div>
					<div class="btn-group pull-right">
<<<<<<< HEAD
						<button type="button" class="btn btn-primary validate" onclick="Joomla.submitbutton('entreprise.save')">
=======
						<button type="button" class="btn btn-primary validate" onclick="Joomla.submitbutton('discussion.save')">
>>>>>>> 2bca2880384ad9920075063e1855712b08fecf20
							<span class="icon-ok"></span>
						</button>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>

			<fieldset>
				<ul class="nav nav-tabs">
<<<<<<< HEAD
					<li><a href="#entreprise" data-toggle="tab"><?php echo JText::_('COM_ANNUAIRE_ENTREPRISE'); ?></a></li>
					<li><a href="#avance" data-toggle="tab"><?php echo JText::_('COM_ANNUAIRE_ADVANCED'); ?></a></li>
					<li><a href="#commentaire" data-toggle="tab"><?php echo JText::_('COM_ANNUAIRE_COMMENT'); ?></a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="entreprise">
=======
					<li><a href="#discussion" data-toggle="tab"><?php echo JText::_('COM_FOOTREGION_DISCUSSION'); ?></a></li>
					<li><a href="#avance" data-toggle="tab"><?php echo JText::_('COM_FOOTREGION_ADVANCED'); ?></a></li>
					<li><a href="#commentaire" data-toggle="tab"><?php echo JText::_('COM_FOOTREGION_COMMENT'); ?></a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="discussion">
>>>>>>> 2bca2880384ad9920075063e1855712b08fecf20
						<table class="table">
							<tbody>
								<tr>
									<td width="20%" class="nowrap right">
<<<<<<< HEAD
										<div class="control-label"><?php echo $this->form->getLabel('nom'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('nom'); ?></div>
=======
										<div class="control-label"><?php echo $this->form->getLabel('theme'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('theme'); ?></div>
>>>>>>> 2bca2880384ad9920075063e1855712b08fecf20
									</td>
								</tr>
								<tr>
									<td width="20%" class="nowrap right">
<<<<<<< HEAD
										<div class="control-label"><?php echo $this->form->getLabel('logo'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('logo'); ?></div>
										<?php echo "<img src='" . JURI::root() . "images/annuaire/logos/" . $this->item->logo . "' border='0' />"; ?>
									</td>
								</tr>
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('activite'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('activite'); ?></div>
									</td>
								</tr>
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('codeAPE_NAF'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('codeAPE_NAF'); ?></div>
=======
										<div class="control-label"><?php echo $this->form->getLabel('utilisateur_id'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('utilisateur_id'); ?></div>
>>>>>>> 2bca2880384ad9920075063e1855712b08fecf20
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div class="tab-pane" id="avance">
						<table class="table">
							<tbody>
<<<<<<< HEAD
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('pays_id'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('pays_id'); ?></div>
									</td>
								</tr>
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('numSIREN'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('numSIREN'); ?></div>
									</td>
								</tr>
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('numTVAintra'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('numTVAintra'); ?></div>
									</td>
								</tr>
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('siteWeb'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('siteWeb'); ?></div>
									</td>
								</tr>
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('adrRue'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('adrRue'); ?></div>
									</td>
								</tr>
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('adrVille'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('adrVille'); ?></div>
									</td>
								</tr>
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('adrCP'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('adrCP'); ?></div>
									</td>
								</tr>
=======
>>>>>>> 2bca2880384ad9920075063e1855712b08fecf20
							</tbody>
						</table>				

						<input type="hidden" name="task" value="" />
						<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
					</div>
					<div class="tab-pane" id="commentaire">
						<?php echo $this->form->getControlGroup('commentaire'); ?>
					</div>
					</div>
				<?php echo JHtml::_('form.token'); ?>
			</fieldset>
		</form>
	</div>

<?php endif; ?>
