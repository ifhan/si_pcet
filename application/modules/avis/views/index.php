<div>
	<h1 class="page-header">Avis</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
		<th>Identifiant du PCET</th>
		<th>Date de la sollicitation avis de l Etat</th>
		<th>Commentaire sur la sollicitation de l avis de l Etat</th>
		<th>Date du rendu de l avis Etat</th>
		<th>Date de la sollicitation de l avis du Conseil regional</th>
		<th>Date du rendu de l avis du Conseil regional</th>
		<th>Date de la sollicitation de l avis de l USH</th>
		<th>Date du rendu de l avis de l USH</th>
		<th>Date de la sollicitation de l avis de l ADEME</th>
		<th>Date du rendu de l avis de l ADEME</th>
		<th>Points positifs</th>
		<th>Points negatifs</th>
		<th>Date d adoption du PCET</th>
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
							<?php e(($value > 0) ? lang('avis_true') : lang('avis_false')); ?>
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