<div class="admin-box">
	<h3>PNR</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('PNR.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Departement</th>
					<th>Identifiant regional</th>
					<th>Nom</th>
					<th>Surface calculee</th>
					<th>Site web</th>
					<th>Id Type</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('PNR.Content.Delete')) : ?>
				<tr>
					<td colspan="7">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('pnr_delete_confirm'))); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('PNR.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('PNR.Content.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/content/pnr/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->id_dpt) ?></td>
				<?php else: ?>
				<td><?php e($record->id_dpt) ?></td>
				<?php endif; ?>
			
				<td><?php e($record->id_regional) ?></td>
				<td><?php e($record->nom) ?></td>
				<td><?php e($record->surf_sig_l93) ?></td>
				<td><?php e($record->url_site) ?></td>
				<td><?php e($record->id_type) ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>