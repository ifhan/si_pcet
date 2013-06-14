<div class="admin-box">
	<h3>Avis</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Avis.Loireatlantique.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
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
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Avis.Loireatlantique.Delete')) : ?>
				<tr>
					<td colspan="14">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('avis_delete_confirm'))); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Avis.Loireatlantique.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Avis.Loireatlantique.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/loireatlantique/avis/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->ID_PCET) ?></td>
				<?php else: ?>
				<td><?php e($record->ID_PCET) ?></td>
				<?php endif; ?>
			
				<td><?php e($record->DEM_ETAT_AVIS) ?></td>
				<td><?php e($record->COM_ETAT_AVIS) ?></td>
				<td><?php e($record->REP_ETAT_AVIS) ?></td>
				<td><?php e($record->DEM_REG_AVIS) ?></td>
				<td><?php e($record->REP_REG_AVIS) ?></td>
				<td><?php e($record->DEM_USH_AVIS) ?></td>
				<td><?php e($record->REP_USH_AVIS) ?></td>
				<td><?php e($record->DEM_ADEME_AVIS) ?></td>
				<td><?php e($record->REP_ADEME_AVIS) ?></td>
				<td><?php e($record->PP_AVIS) ?></td>
				<td><?php e($record->PN_AVIS) ?></td>
				<td><?php e($record->DATE_ADOPT_AVIS) ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="14">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>