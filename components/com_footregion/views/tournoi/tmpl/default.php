	<div class="form-inline form-inline-header">
		<div class="btn-group pull-left">
			<h2><?php echo JText::_('COM_FOOTREGION_TOURNOI'); ?></h2>
		</div>
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_footregion&view=tournois'); ?>" class="btn" role="button">
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
						<span class="label"><?php echo JText::_('COM_FOOTREGION_TOURNOIS_NOM'); ?></span>
					</td>
					<td width="80%">
						<h4><?php echo $this->item->nom ?></h4>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_EQUIPE_LOCAUX'); ?></span>
					</td>
					<td width="80%">
						<h4><?php echo $this->item->nomm ?></h4>
					</td>
				</tr>
				<tr>
				<td width="50%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_FOOTREGION_MATCHS_EQUIPE_VISITEURS'); ?></span>
					</td>
					<td width="80%">
						<h4><?php echo $this->item->Equipe_Invite ?></h4>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
