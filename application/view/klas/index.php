	<table border="1">
		<tr>
			<th>ID</th>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th colspan="3">Actie</th>
		</tr>
		<?php 

		foreach ($data as $row) { 
		?>
		<tr>
			
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['voornaam']; ?></td>
			<td><?php echo $row['achternaam']; ?></td>
			<td><a href="read/<?php echo $row['id']; ?>">Read</a></td>
			<td><a href="update/<?php echo $row['id']; ?>">Update</a></td>
			<td><a href="delete/<?php echo $row['id']; ?>">Delete</a></td>

		</tr>
		<?php 
		} 
		?>
	</table>