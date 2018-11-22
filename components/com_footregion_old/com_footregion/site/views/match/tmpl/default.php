<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('10', $user->groups));		// sets flag when user group is '10' that is 'MRH Administrateur 
?>

<?php if (!$isAdmin) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_footregion_RESTRICTED_ACCESS') ); ?>
<?php else : ?>
	<div class="form-inline form-inline-header">
		<div class="btn-group pull-left">
			<h2><?php echo JText::_('COM_footregion_match'); ?></h2>
		</div>
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=matchs'); ?>" class="btn" role="button">
				<span class="icon-cancel"></span></a>
		</div>	
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=form_c&layout=edit&id='.$this->item->id); ?>" class="btn" role="button"><span class="icon-edit"></span></a>
		</div>	
	</div>
	<div>
		<table class="table">
			<tbody>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_footregion_matchS_NOM'); ?></span>
					</td>
					<td width="80%">
						<h4><?php echo $this->item->nom ?></h4>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_footregion_matchS_PRENOM'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->prenom ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_footregion_matchS_CIVILITE'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->civilite ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_footregion_matchS_TYPEmatch'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->typematch ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_footregion_matchS_match'); ?></span>
					</td>
					<td width="80%">
						<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=match&id='.(int) $this->item->matchs_id); ?>"><?php echo $this->item->match ?></a>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_footregion_matchS_FONCTION'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->fonction; ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_footregion_matchS_EMAIL'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->email ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_footregion_matchS_MOBILE'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->mobile ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_footregion_matchS_TEL'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->tel ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_footregion_COMMENT'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->commentaire ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php endif; ?>
