<div class="admin-box">
	<h3><?php echo lang('indicateur_title'); ?>Maine-et-Loire</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Indicateur.Maineetloire.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>PCET</th>
					<th>Tableau de bord</th>
					<th>Nombre total d'indicateur</th>
					<th>Nombre total d'indicateurs quantitatifs</th>
					<th>Nombre total d'indicateurs qualitatifs</th>
					<th>Nombre total d'actions</th>
                                        <th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Indicateur.Maineetloire.Delete')) : ?>
				<tr>
                                    <td colspan="8">
                                        <input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('indicateur_delete_confirm'))); ?>')">
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
                                    <?php if ($this->auth->has_permission('Indicateur.Maineetloire.Delete')) : ?>
                                    <td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
                                    <?php endif;?>
                                    
                                    <td><?php e($record->ID_PCET.' - '.$record->NOM_TYPE.' - '.$record->Nom_Commune.$record->Nom_Departement.$record->NOM_EPCI.$record->nom_pays.$record->nom_pnr) ?></td>

                                    <td>
                                        <?php if($record->TABLEAU_DE_BORD == '1'): ?>
                                            <?php echo "Oui"; ?>
					<?php else: ?>
                                            <?php echo "Non"; ?>
					<?php endif; ?>
                                    </td>
                                    <td><?php e($record->NB_TOTAL_INDICATEURS) ?></td>
                                    <td><?php e($record->NB_INDICATEURS_QT) ?></td>
                                    <td><?php e($record->NB_INDICATEURS_QL) ?></td>
                                    <td><?php e($record->NB_TOTAL_ACTIONS) ?></td>
                                    <td width="20%">
                                        <?php if ($this->auth->has_permission('Indicateur.Maineetloire.Edit')) : ?>
                                            <?php echo anchor(SITE_AREA .'/maineetloire/indicateur/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?><br />
                                        <?php endif; ?>     
                                    </td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="8"><?php echo lang('bf_no_record_found'); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>