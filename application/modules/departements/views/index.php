<div>
	<h1 class="page-header">Departements</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
		<th>INSEE Region</th>
		<th>Id BDCarto</th>
		<th>Nom Departement</th>
		<th>INSEE Departement</th>
		<th>Abscisse Departement</th>
		<th>Ordonnee Departement</th>
		<th>EXTRACTION IGN</th>
		<th>RECETTE</th>
		<th>The Geom</th>
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
							<?php e(($value > 0) ? lang('departements_true') : lang('departements_false')); ?>
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