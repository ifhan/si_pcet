<div class="admin-box">
	<h3>Pays</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Pays.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Identifiant du pays</th>
					<th>D&eacute;partement</th>
					<th>Nom</th>
					<th>Statut</th>
					<th>Superficie</th>
					<th>Population</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Pays.Content.Delete')) : ?>
				<tr>
					<td colspan="7">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('pays_delete_confirm'))); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Pays.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Pays.Content.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/content/pays/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->id_pays) ?></td>
				<?php else: ?>
				<td><?php e($record->id_pays) ?></td>
				<?php endif; ?>

				<td><?php e($record->insee_dep) ?></td>
				<td><?php e($record->nom) ?></td>
				<td><?php e($record->statut) ?></td>
				<td><?php e($record->superficie) ?></td>
				<td><?php e($record->population) ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7"><?php echo lang('bf_no_record_found'); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>