<div class="admin-box">
	<h3>PCET</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('PCET.Vendee.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Statut</th>
					<th>Identifiant du PCET</th>
					<th>Commentaire sur l etat du PCET</th>
					<th>Site web</th>
					<th>CONTRAT ADEME PCET</th>
					<th>TYPE CONTRAT ADEME PCET</th>
					<th>Type de structure</th>
					<th>ID AVIS</th>
					<th>ID ENGAGE</th>
					<th>ID INDIC</th>
					<th>ID DIAG</th>
					<th>Phase</th>
					<th>ID ADAPT</th>
					<th>ID GOUV</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('PCET.Vendee.Delete')) : ?>
				<tr>
					<td colspan="15">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('pcet_delete_confirm'))); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('PCET.Vendee.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('PCET.Vendee.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/vendee/pcet/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->STATUT_PCET) ?></td>
				<?php else: ?>
				<td><?php e($record->STATUT_PCET) ?></td>
				<?php endif; ?>
			
				<td><?php e($record->ID_PCET) ?></td>
				<td><?php e($record->ETAT_PCET) ?></td>
				<td><?php e($record->INTERNET_PCET) ?></td>
				<td><?php e($record->CONTRAT_ADEME_PCET) ?></td>
				<td><?php e($record->TYPE_CONTRAT_ADEME_PCET) ?></td>
				<td><?php e($record->ID_STR) ?></td>
				<td><?php e($record->ID_AVIS) ?></td>
				<td><?php e($record->ID_ENGAGE) ?></td>
				<td><?php e($record->ID_INDIC) ?></td>
				<td><?php e($record->ID_DIAG) ?></td>
				<td><?php e($record->ID_PHASE) ?></td>
				<td><?php e($record->ID_ADAPT) ?></td>
				<td><?php e($record->ID_GOUV) ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="15">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>