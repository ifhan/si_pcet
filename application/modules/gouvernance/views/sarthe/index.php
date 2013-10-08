<div class="admin-box">
	<h3><?php echo lang('gouvernance_title'); ?>Sarthe</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Gouvernance.Sarthe.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>PCET</th>
					<th>Gouvernance mise en place ?</th>
					<th>Acteurs associés</th>
                                        <th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Gouvernance.Sarthe.Delete')) : ?>
				<tr>
					<td colspan="5">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('gouvernance_delete_confirm'))); ?>')">
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
                                    <?php if ($this->auth->has_permission('Gouvernance.Sarthe.Delete')) : ?>
                                    <td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
                                    <?php endif;?>
					
                                    <td><?php e($record->ID_PCET.' - '.$record->NOM_TYPE.' - '.$record->Nom_Commune.$record->Nom_Departement.$record->NOM_EPCI.$record->nom_pays.$record->nom_pnr) ?></td>
			
                                    <td>
                                        <?php if($record->PRESENCE_GOUV == '1'): ?>
                                            <?php echo "Oui"; ?>
                                        <?php else: ?>
                                            <?php echo "Non"; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php e($record->ACTEURS_GOUV) ?></td>
                                    <td>
                                        <?php if ($this->auth->has_permission('Gouvernance.Sarthe.Edit')) : ?>
                                            <?php echo anchor(SITE_AREA .'/sarthe/gouvernance/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?>
                                        <?php endif; ?>
                                    </td>
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