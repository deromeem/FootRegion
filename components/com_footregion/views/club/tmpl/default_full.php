<?php
defined('_JEXEC') or die('Restricted access');
?>

<h1>Contacts de l'annuaire</h1>

<form action="<?php echo htmlspecialchars(JFactory::getURI()->toString()); ?>" method="post" name="adminForm" id="adminForm">

	<table class="category">
		<thead>
			<tr>
			<th class="title">Nom</th>
			<th class="title">sigle</th>
			<th class="title">Ville</th>
		</tr>
		</thead>

		<tbody>
			<?php foreach($this->tickets as $i => $item) : ?>
			<tr>
				<td><?php echo $item->nom ?></td>
				<td><?php echo $item->sigle ?></td>
				<td><?php echo $item->adr_ville ?></td>
			</tr>			
			<?php endforeach; ?>
		</tbody>
	</table>

</form>

<?php echo $this->pagination->getListFooter(); ?>
