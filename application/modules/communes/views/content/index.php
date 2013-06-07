<div class="admin-box">
	<h3>Communes</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Communes.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>INSEE Region</th>
					<th>Nom de la r&eacute;gion</th>
					<th>INSEE Departement</th>
					<th>Nom Departement</th>
					<th>INSEE Arrondissement</th>
					<th>INSEE Canton</th>
					<th>Nom de la commune</th>
					<th>Code INSEE de la commune</th>
					<th>Statut</th>
					<th>Superficie</th>
					<th>Population</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Communes.Content.Delete')) : ?>
				<tr>
					<td colspan="17">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('communes_delete_confirm'))); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Communes.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Communes.Content.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/content/communes/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->INSEE_Region) ?></td>
				<?php else: ?>
				<td><?php e($record->INSEE_Region) ?></td>
				<?php endif; ?>
			
				<td><?php e($record->Nom_Region) ?></td>
				<td><?php e($record->INSEE_Departement) ?></td>
				<td><?php e($record->Nom_Departement) ?></td>
				<td><?php e($record->INSEE_Arrondissement) ?></td>
				<td><?php e($record->INSEE_Canton) ?></td>
				<td><?php e($record->Nom_Commune) ?></td>
				<td><?php e($record->INSEE_Commune) ?></td>
				<td><?php e($record->Statut) ?></td>
				<td><?php e($record->Superficie) ?></td>
				<td><?php e($record->Population) ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="17">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>