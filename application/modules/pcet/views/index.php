<div>
	<h1 class="page-header">PCET</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Collectivit&eacute;</th>
				<th>Identifiant du PCET</th>
				<th>Statut</th>
				<th>&Eacute;tat d'avancement</th>
				<th>Commentaires</th>
				<th>Site web</th>
				<th>Contrat ADEME</th>
				<th>Type de contrat ADEME</th>
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
							<?php e(($value > 0) ? lang('pcet_true') : lang('pcet_false')); ?>
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