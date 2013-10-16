<div class="admin-box">
	<h3><?php echo lang('contacts_title');  ?>Sarthe</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Contacts.Sarthe.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
                                        <th>Collectivité</th>
					<th>Civilité</th>
					<th>Nom</th>
                                        <th>Prénom</th>
					<th>Courriel</th>
                                        <th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Contacts.Sarthe.Delete')) : ?>
				<tr>
					<td colspan="7">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('contacts_delete_confirm'))); ?>')">
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
					<?php if ($this->auth->has_permission('Contacts.Sarthe.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					

                                <td><?php e($record->NOM_TYPE) ?>&nbsp; - <?php e($record->Nom_Commune) ?><?php e($record->Nom_Departement) ?><?php e($record->NOM_EPCI) ?><?php e($record->nom_pays) ?><?php e($record->nom_pnr) ?></td>
                                <td><?php e($record->CIVILITE) ?></td>
                                <td><?php e($record->NOM_CONTACT) ?></td>
				<td><?php e($record->PRENOM) ?></td>
				<td>
                                    <?php echo mailto($record->MAIL, '<i class="icon-envelope">&nbsp;</i> ' .  $record->MAIL, 'target="_blank"'); ?>
                                </td>
                                
                                <?php if ($this->auth->has_permission('Contacts.Sarthe.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/sarthe/contacts/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?></td>
				<?php else: ?>
				
				<?php endif; ?>
                                
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