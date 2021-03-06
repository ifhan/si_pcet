<div class="admin-box">
	<h3><?php echo lang('avis_title') ?>Vendée</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Avis.Vendee.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>PCET</th>
					<th>Date du rendu de l'avis de l'État</th>
					<th>Date du rendu de l'avis du Conseil régional</th>
					<th>Date du rendu de l'avis de l'USH</th>
					<th>Date du rendu de l'avis de l'ADEME</th>
					<th>Date d'adoption du PCET</th>
                                        <th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Avis.Vendee.Delete')) : ?>
				<tr>
					<td colspan="11">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('avis_delete_confirm'))); ?>')">
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
                                    <?php if ($this->auth->has_permission('Avis.Vendee.Delete')) : ?>
                                    <td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
                                    <?php endif;?>

                                    <td><?php e($record->ID_PCET.' - '.$record->NOM_TYPE.' - '.$record->Nom_Commune.$record->Nom_Departement.$record->NOM_EPCI.$record->nom_pays.$record->nom_pnr) ?></td>

                                    <td>
                                        <?php if($record->REP_ETAT_AVIS !== '0000-00-00'): ?>
                                            <?php e(date("d/m/Y", strtotime(($record->REP_ETAT_AVIS)))) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($record->REP_REG_AVIS !== '0000-00-00'): ?>
                                            <?php e(date("d/m/Y", strtotime(($record->REP_REG_AVIS)))) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($record->REP_USH_AVIS !== '0000-00-00'): ?>
                                            <?php e(date("d/m/Y", strtotime(($record->REP_USH_AVIS)))) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($record->REP_ADEME_AVIS !== '0000-00-00'): ?>
                                            <?php e(date("d/m/Y", strtotime(($record->REP_ADEME_AVIS)))) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($record->DATE_ADOPT_AVIS !== '0000-00-00'): ?>
                                            <?php e(date("d/m/Y", strtotime(($record->DATE_ADOPT_AVIS)))) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td width="20%">
                                        <?php echo anchor(SITE_AREA .'/vendee/avis/show/'. $record->id, '<i class="icon-info-sign">&nbsp;</i>Voir le suivi des avis') ?><br />
                                        <?php if ($this->auth->has_permission('Avis.Vendee.Edit')) : ?>
                                            <?php echo anchor(SITE_AREA .'/vendee/avis/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?><br />
                                        <?php endif; ?>     
                                    </td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="11"><?php echo lang('bf_no_record_found'); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>