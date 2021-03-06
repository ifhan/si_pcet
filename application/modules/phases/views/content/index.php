<div class="admin-box">
	<h3>Liste des phases de l'&eacute;tat d'avancement d'un PCET</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Phases.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Nom de la phase</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Phases.Content.Delete')) : ?>
				<tr>
					<td colspan="2">						
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('phases_delete_confirm'))); ?>')">
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
					<?php if ($this->auth->has_permission('Phases.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Phases.Content.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/content/phases/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->NOM_PHASE) ?></td>
				<?php else: ?>
				<td><?php e($record->NOM_PHASE) ?></td>
				<?php endif; ?>
			
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="2">Aucun enregistrement ne correspond &agrave; votre s&eacute;lection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>