<div class="admin-box">
	<h3>Contacts</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Contacts.Maineetloire.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Civilite</th>
					<th>Prenom</th>
					<th>Nom</th>
					<th>Courriel</th>
					<th>Collectivite</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Contacts.Maineetloire.Delete')) : ?>
				<tr>
					<td colspan="6">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('contacts_delete_confirm'))); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Contacts.Maineetloire.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Contacts.Maineetloire.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/maineetloire/contacts/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->CIVILITE) ?></td>
				<?php else: ?>
				<td><?php e($record->CIVILITE) ?></td>
				<?php endif; ?>
			
				<td><?php e($record->PRENOM) ?></td>
				<td><?php e($record->NOM_CONTACT) ?></td>
				<td><?php e($record->MAIL) ?></td>
				<td><?php e($record->ID_STR) ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="6">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>