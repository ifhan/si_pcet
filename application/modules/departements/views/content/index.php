<div class="admin-box">
	<h3>Departements</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Departements.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
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
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Departements.Content.Delete')) : ?>
				<tr>
					<td colspan="10">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('departements_delete_confirm'))); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Departements.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Departements.Content.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/content/departements/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->INSEE_Region) ?></td>
				<?php else: ?>
				<td><?php e($record->INSEE_Region) ?></td>
				<?php endif; ?>
			
				<td><?php e($record->Id_BDCarto) ?></td>
				<td><?php e($record->Nom_Departement) ?></td>
				<td><?php e($record->INSEE_Departement) ?></td>
				<td><?php e($record->Abscisse_Departement) ?></td>
				<td><?php e($record->Ordonnee_Departement) ?></td>
				<td><?php e($record->EXTRACTION_IGN) ?></td>
				<td><?php e($record->RECETTE) ?></td>
				<td><?php e($record->the_geom) ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="10">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>