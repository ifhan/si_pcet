<div>
	<h1 class="page-header">Engagement</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
		<th>Identifiant du PCET</th>
		<th>Commentaire sur l implication de la ddt sur le projet</th>
		<th>Date de deliberation</th>
		<th>Date du courrier de la structure notifiant sa deliberation a l Etat</th>
		<th>Date du courrier de la structure notifiant sa deliberation au Conseil regional</th>
		<th>Date courrier de notification d engagement de la collectivite a l USH</th>
		<th>Consultation aval USH souhaitee</th>
		<th>Date du courrier de reponse de l USH</th>
		<th>Date du Porter-a-connaissance de l Etat</th>
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
							<?php e(($value > 0) ? lang('engagement_true') : lang('engagement_false')); ?>
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