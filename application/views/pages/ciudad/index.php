<?php
if($ciudades): ?>
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>
					Nombre
				</th>
				<th>
					Latitud
				</th>
				<th>
					Longitud
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($ciudades as $ciudad): ?>
			<tr>
				<td>

					<?php echo $ciudad->name; ?>

				</td>
				<td>

					<?php echo $ciudad->lat; ?>

				</td>
				<td>

					<?php echo $ciudad->lon; ?>

				</td>
			</tr>

			<?php endforeach ?>
		</tbody>

	</table>
</div>
<?php
else: ?>
<p class="text-danger">
	<?php echo $error; ?>
</p>
<?php endif; ?>