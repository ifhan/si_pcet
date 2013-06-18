<div class="admin-box">
	<h3>Diagnostic</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Diagnostic.Maineetloire.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
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
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Diagnostic.Maineetloire.Delete')) : ?>
				<tr>
					<td colspan="9">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('diagnostic_delete_confirm'))); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Diagnostic.Maineetloire.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Diagnostic.Maineetloire.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/maineetloire/diagnostic/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->ID_DIAG) ?></td>
				<?php else: ?>
				<td><?php e($record->ID_DIAG) ?></td>
				<?php endif; ?>
			
				<td><?php e($record->GES_DIAG) ?></td>
				<td><?php e($record->CONSO_KTEP_T) ?></td>
				<td><?php e($record->EMIS_CO2_T) ?></td>
				<td><?php e($record->CONSO_KTEP_PC) ?></td>
				<td><?php e($record->EMIS_CO2_PC) ?></td>
				<td><?php e($record->ID_GES_BILAN_T) ?></td>
				<td><?php e($record->ID_GES_BILAN_PC) ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="9">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>