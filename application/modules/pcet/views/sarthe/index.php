<div class="admin-box">
	<h3><?php echo lang('pcet'); ?> en Sarthe</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('PCET.Sarthe.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Identifiant du PCET</th>
					<th>Type</th>
					<th>Collectivit&eacute;</th>
					<th>Statut</th>
					<th>&Eacute;tat d'avancement</th>
					<th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('PCET.Sarthe.Delete')) : ?>
				<tr>
					<td colspan="10">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('pcet_delete_confirm'))); ?>')">
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
					<?php if ($this->auth->has_permission('PCET.Sarthe.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
                                        <td><?php e($record->ID_PCET) ?></td>
					<td><?php e($record->NOM_TYPE) ?></td>
					<td><?php e($record->Nom_Commune) ?><?php e($record->Nom_Departement) ?><?php e($record->NOM_EPCI) ?><?php e($record->nom_pays) ?><?php e($record->nom_pnr) ?></td>
					<td><?php e($record->STATUT_PCET) ?></td>
					<td><?php e($record->NOM_PHASE) ?></td>
                                        <td width="10%">                                   
                                            <?php if ($this->auth->has_permission('PCET.Sarthe.Edit')) : ?>					
                                                <?php echo anchor(SITE_AREA .'/sarthe/pcet/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?><br />
                                            <?php endif; ?>
                                            <?php echo anchor(SITE_AREA .'/sarthe/pcet/show/'. $record->ID_PCET, '<i class="icon-info-sign">&nbsp;</i>Voir la fiche') ?>
                                        </td>

				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="10"><?php echo lang('bf_no_record_found'); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>