<div class="admin-box">
	<h3><?php echo lang('actions_title'); ?>Sarthe</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Actions.Sarthe.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>PCET</th>
					<th>Domaines d'action</th>
					<th>Compétence de la collectivité</th>
					<th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Actions.Sarthe.Delete')) : ?>
				<tr>
					<td colspan="7">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('actions_delete_confirm'))); ?>')">
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
					<?php if ($this->auth->has_permission('Actions.Sarthe.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
                                    <td><?php e($record->ID_PCET.' - '.$record->NOM_TYPE.' - '.$record->Nom_Commune.$record->Nom_Departement.$record->NOM_EPCI.$record->nom_pays.$record->nom_pnr) ?></td>
                                    <td><?php e($record->NOM_DOMAINE_ACTION) ?></td>
                                    <td><?php if($record->COMPETENCE == '1'): ?>
                                        <?php echo "Oui"; ?>
                                        <?php else: ?>
                                        <?php echo "Non"; ?>
                                        <?php endif; ?>
                                    </td>

                                    <td width="20%">
                                        <?php echo anchor(SITE_AREA .'/sarthe/actions/dashboard/'. $record->ID_PCET, '<i class="icon-info-sign">&nbsp;</i>Voir le tableau de bord du PCET') ?>
                                        <?php echo anchor(SITE_AREA .'/sarthe/actions/show/'. $record->id, '<i class="icon-info-sign">&nbsp;</i>Voir l\'action') ?><br />                               
                                        <?php if ($this->auth->has_permission('Actions.Sarthe.Edit')) : ?>
                                            <?php echo anchor(SITE_AREA .'/sarthe/actions/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier l\'action') ?><br />
                                        <?php endif; ?>                                     
                                    </td>
				</tr>
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