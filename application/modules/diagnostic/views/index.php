<div>
	<h1 class="page-header">Diagnostic</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
		<th>PCET</th>
		<th>Diagnostic gaz a effet de serre</th>
		<th>Consommation du territoire</th>
		<th>Emissions du territoire</th>
		<th>Consomation patrimoine et competence</th>
		<th>Emissions patrimoine et competence</th>
		<th>NOM GES BILAN T</th>
		<th>ID GES BILAN PC</th>
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
							<?php e(($value > 0) ? lang('diagnostic_true') : lang('diagnostic_false')); ?>
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