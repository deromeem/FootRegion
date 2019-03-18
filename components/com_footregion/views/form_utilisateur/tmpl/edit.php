<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.calendar');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('10', $user->groups));	
$isArbitre = (in_array('12', $user->groups));
$isDirecteur = (in_array('13', $user->groups));
$isEntraineur = (in_array('14', $user->groups));
$isJoueur = (in_array('15', $user->groups));	// sets flag when user group is '10' that is 'MRH Administrateur 

?>

<?php if (!$isAdmin && !$isArbitre && !$isDirecteur && !$isEntraineur && !$isJoueur) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS') ); ?>
<?php else : ?>

	<script type="text/javascript">
		// fonction javascript pour gérer les actions sur les boutons
		Joomla.submitbutton = function(task)
		{
			// si bouton 'Annuler' ou si les champs du formulaire sont valides alors on envoie le formulaire
			if (task == 'utilisateur.cancel' || document.formvalidator.isValid(document.getElementById('adminForm')))
			{
				Joomla.submitform(task);
			}
		}
	</script>

	<div class="edit item-page">
		<form action="<?php echo JRoute::_('index.php?option=com_footregion&a_id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-vertical">
			
			<div class="form-inline form-inline-header">
				<div class="btn-group pull-left">
					<?php $isNew = ($this->item->id == 0); ?>
					<h2><?php echo JText::_('COM_FOOTREGION_UTILISATEUR')." ".($isNew ? JText::_('COM_FOOTREGION_MODIF_PAR'): JText::_('COM_FOOTREGION_MODIF_PAR')); ?></h2>
				</div>
				<div class="btn-toolbar">
					<div class="btn-group pull-right">
						<button type="button" class="btn" onclick="Joomla.submitbutton('utilisateur.cancel')">
							<span class="icon-cancel"></span>
						</button>
					</div>
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-primary validate" onclick="Joomla.submitbutton('utilisateur.save')">
							<span class="icon-ok"></span>
						</button>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>

			<fieldset>
				<ul class="nav nav-tabs">
					<li><a href="#profil" data-toggle="tab"><?php echo JText::_('COM_FOOTREGION_PROFIL'); ?></a></li>
					<li><a href="#commentaire" data-toggle="tab"><?php echo JText::_('COM_FOOTREGION_COMMENT'); ?></a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="profil">
						<table class="table">
							<tbody>
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('nom'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('nom'); ?></div>
									</td>
								</tr>

								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('prenom'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('prenom'); ?></div>
									</td>
								</tr>

								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('mobile'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('mobile'); ?></div>
									</td>
								</tr>

								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('alias'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('alias'); ?></div>
									</td>
								</tr>

								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('email'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('email'); ?></div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div class="tab-pane" id="commentaire">
						<table class="table">
							<tbody>
								<div class="tab-pane" id="commentaire">
								<?php echo $this->form->getControlGroup('commentaire'); ?>
							</tbody>
						</table>
					</div>

					<input type="hidden" name="task" value="" />
					<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />

				</div>
				<?php echo JHtml::_('form.token'); ?>
			</fieldset>
		</form>
	</div>

<?php endif; ?>
