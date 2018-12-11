<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();               		// gets current user object
$isPublic = (in_array('10', $user->groups));
$isAdm = (in_array('11', $user->groups));
$isArb = (in_array('12', $user->groups));	
$isDir = (in_array('13', $user->groups));	
$isEnt = (in_array('14', $user->groups));	
$isJou = (in_array('15', $user->groups));			
?>

<?php if (!$isArb && !$isArb && !$isDir && !$isEnt && !$isJou && !$isAdm) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_footregion_RESTRICTED_ACCESS') ); ?>
<?php else : ?>
	<div class="form-inline form-inline-header">
		<div class="btn-group pull-left">
			<h2><?php echo JText::_('COM_FOOTREGION_MATCH'); ?></h2>
		</div>
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=matchs'); ?>" class="btn" role="button">
				<span class="icon-cancel"></span></a>
		</div>	
		<?php if (!$isArb && !$isArb && !$isDir && !$isJou) : ?>
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=form_match&layout=edit&id='.$this->item->id); ?>" class="btn" role="button">
				<span class="icon-edit"></span></a>
		</div>	
		<?php endif; ?>
	</div>	
	<div>
		<table class="table">
			<tbody>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_NOM'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->nom ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_DATE_HEURE'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->date_heure ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_SCORE_DOM'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->score_domicile; ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_SCORE_INV'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->score_invite; ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_ADR_RUE'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->adr_rue ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_ADR_VILLE'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->adr_ville ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_ADR_CP'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->adr_cp ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_COORD_GPS'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->coord_gps ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_EQUIPE_VISITEURS'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->equipe_invite ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_EQUIPE_LOCAUX'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->equipe_domicile ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_ENTRAINEUR_LOCAUX'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->entraineur_initiateur ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_ENTRAINEUR_VISITEURS'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->entraineur_invite?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_TOURNOI'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->tournoi?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php endif; ?>
