<?php
defined('_JEXEC') or die('Restricted access');
?>

<h1>Signalements</h1>

<form action="<?php echo htmlspecialchars(JFactory::getURI()->toString()); ?>" method="post" name="adminForm" id="adminForm">

	<table class="category">
		<thead>
			<tr>
			<th class="title">libellé</th>
			<th class="title">arbitres_id</th>
			<th class="title">entraîneurs_id</th>
		</tr>
		</thead>

		<tbody>
			<?php foreach($this->tickets as $i => $item) : ?>
			<tr>
				<td><?php echo $item->libelle ?></td>
				<td><?php echo $item->artibre_id ?></td>
				<td><?php echo $item->entraineurs_id ?></td>
			</tr>			
			<?php endforeach; ?>
		</tbody>
	</table>

</form>

<?php echo $this->pagination->getListFooter(); ?>
