<div class="admin-box">
	<h3><?php echo lang('structures_porteuses'); ?>Vend&eacute;e</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Structures.Vendee.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>			
					<th>Type de collectivit&eacute;</th>
					<th>Nom de la collectivit&eacute;</th>
					<th>Identifiant de la collectivit&eacute;</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Structures.Vendee.Delete')) : ?>
				<tr>
					<td colspan="5">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('structures_delete_confirm'))); ?>')">
						<?php echo lang('bf_with_selected') ?>
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Structures.Vendee.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
				<td><?php e($record->NOM_TYPE) ?></td>
				<td><?php e($record->Nom_Commune) ?><?php e($record->Nom_Departement) ?><?php e($record->NOM_EPCI) ?><?php e($record->nom_pays) ?><?php e($record->nom_pnr) ?></td>
				
				<?php if ($this->auth->has_permission('Structures.Vendee.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/vendee/structures/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->ID_STR) ?></td>
				<?php else: ?>
				<td><?php e($record->ID_STR) ?></td>
				<?php endif; ?>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo lang('bf_no_record_found'); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>