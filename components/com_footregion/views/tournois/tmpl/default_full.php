<?php
defined('_JEXEC') or die('Restricted access');
?>

<h1>Tournois de FootRegion</h1>

<form action="<?php echo htmlspecialchars(JFactory::getURI()->toString()); ?>" method="post" name="adminForm" id="adminForm">

	<table class="category">
		<thead>
			<tr>
			<th class="title">Nom</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($this->tickets as $i => $item) : ?>
			<tr>
				<td><?php echo $item->nom ?></td>
			</tr>			
			<?php endforeach; ?>
		</tbody>
	</table>
</form>

<?php echo $this->pagination->getListFooter(); ?>
