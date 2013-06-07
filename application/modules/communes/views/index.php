<div>
	<h1 class="page-header">Communes</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
		<th>INSEE Region</th>
		<th>Nom Region</th>
		<th>INSEE Departement</th>
		<th>Nom Departement</th>
		<th>INSEE Arrondissement</th>
		<th>INSEE Canton</th>
		<th>Id BDCarto</th>
		<th>Nom Commune</th>
		<th>INSEE Commune</th>
		<th>Statut</th>
		<th>Abscisse Commune</th>
		<th>Ordonnee Commune</th>
		<th>Superficie</th>
		<th>Population</th>
		<th>EXTRACTION IGN</th>
		<th>RECETTE</th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td>
						<?php if ($field == 'deleted'): ?>
							<?php e(($value > 0) ? lang('communes_true') : lang('communes_false')); ?>
						<?php else: ?>
							<?php e($value); ?>
						<?php endif ?>
					</td>
				<?php endif; ?>
				
			<?php endforeach; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>