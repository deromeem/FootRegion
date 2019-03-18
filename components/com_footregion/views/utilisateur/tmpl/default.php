<?php
defined('_JEXEC') or die('Restricted access');

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
	<div class="form-inline form-inline-header">
		<div class="btn-group pull-left">
			<?php if ($isEntraineur) : ?>		
				<h2><?php echo "Entraineur"; ?></h2>
			<?php endif; ?>
			<?php if ($isDirecteur) : ?>		
				<h2><?php echo "Directeur"; ?></h2>
			<?php endif; ?>
			<?php if ($isJoueur) : ?>		
				<h2><?php echo "Joueur"; ?></h2>
			<?php endif; ?>
			<?php if ($isArbitre) : ?>		
				<h2><?php echo "Arbitre"; ?></h2>
			<?php endif; ?>
		</div>
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=Form_utilisateur&layout=edit&id='.$this->item->id); ?>" class="btn" role="button">
				<span class="icon-edit"></span></a>
		</div>	
	</div>
	<div>
		<table class="table">
			<tbody>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_UTILISATEURS_NOM'); ?></span>
					</td>
					<td width="80%">
						<h4><?php echo $this->item->nom ?></h4>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_UTILISATEURS_PRENOM'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->prenom ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_UTILISATEURS_EMAIL'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->email ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_UTILISATEURS_MOBILE'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->mobile ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_UTILISATEURS_ALIAS'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->alias; ?>
					</td>
				</tr>
				<?php if ($isDirecteur) : ?>
						<tr>
							<td width="20%" class="nowrap right">
								<span class="label"><?php echo JText::_('COM_FOOTREGION_UTILISATEURS_DATE_AFFECTATION'); ?></span>
							</td>
							<td width="80%">
								<?php echo $this->item->date_aff; ?>
							</td>
						</tr>

				<?php endif; ?>
				<?php if ($isEntraineur) : ?>		
					<tr>
						<td width="20%" class="nowrap right">
							<span class="label"><?php echo JText::_('COM_FOOTREGION_UTILISATEURS_NUM_LICENCE'); ?></span>
						</td>
						<td width="80%">
							<?php echo $this->item->num_licence_e; ?>
						</td>
					</tr>
				<?php endif; ?>
				<?php if ($isJoueur) : ?>
					<tr>
						<td width="20%" class="nowrap right">
							<span class="label"><?php echo JText::_('COM_FOOTREGION_UTILISATEURS_NUM_LICENCE'); ?></span>
						</td>
						<td width="80%">
							<?php echo $this->item->num_licence; ?>
						</td>
					</tr>
					<tr>					
						<td width="20%" class="nowrap right">
							<span class="label"><?php echo JText::_('COM_FOOTREGION_UTILISATEURS_POSTE'); ?></span>
						</td>
						<td width="80%">
							<?php echo $this->item->poste; ?>
						</td>
					</tr>	
					<tr>
						<td width="20%" class="nowrap right">
							<span class="label"><?php echo JText::_('COM_FOOTREGION_UTILISATEURS_DATE_NAISS'); ?></span>
						</td>
						<td width="80%">
							<?php echo $this->item->date_naiss; ?>
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
<?php endif; ?>
