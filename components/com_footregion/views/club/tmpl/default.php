<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();               		// gets current user object
$groupeNumb = substr(implode($user->groups),1,2);
$isAdmin = (in_array($groupeNumb, $user->groups));		// sets flag when user group is '13' that is 'Footregion Directeur
?>

<?php if (!$isAdmin) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_FOOTREGION_RESTRICTED_ACCESS') ); ?>
<?php else : ?>
	<div class="form-inline form-inline-header">
		<div class="btn-group pull-left">
			<h2><?php echo JText::_('COM_FOOTREGION_CLUB'); ?></h2>
		</div>
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=clubs'); ?>" class="btn" role="button">
				<span class="icon-cancel"></span></a>
		</div>
	</div>
	<div>
		<table class="table">
			<tbody>
				<tr>
					<!--TEST-->
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_CLUBS_NOM'); ?></span>
					</td>
					<td width="30%">
						<h4><?php echo $this->item->nom ?></h4>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_CLUBS_SIGLE'); ?></span>
					</td>
					<td width="30%">
						<?php echo $this->item->sigle ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_CLUBS_ADR_RUE'); ?></span>
					</td>
					<td width="30%">
						<?php echo $this->item->adr_rue ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_CLUBS_ADR_VILLE'); ?></span>
					</td>
					<td width="30%">
						<?php echo $this->item->adr_ville ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_CLUBS_ADR_cp'); ?></span>
					</td>
					<td width="30%">
						<?php echo $this->item->adr_cp ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_DIRECTEURS_NOM'); ?></span>
					</td>
					<td width="30%">
						<?php echo $this->item->nomDirecteur ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_DIRECTEURS_PRENOM'); ?></span>
					</td>
					<td width="30%">
						<?php echo $this->item->prenomDirecteur ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php endif; ?>
