<div class="admin-box">
	<h3><?php echo lang('pcet'); ?> en Loire-Atlantique</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('PCET.Loireatlantique.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Identifiant du PCET</th>
					<th>Type</th>
					<th>Collectivit&eacute;</th>
					<th>Statut</th>
					<th>&Eacute;tat d'avancement</th>
					<th>Commentaires</th>
					<th>Site web</th>
					<th>Contrat ADEME</th>
					<th>Type de contrat</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('PCET.Loireatlantique.Delete')) : ?>
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
					<?php if ($this->auth->has_permission('PCET.Loireatlantique.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
					<?php if ($this->auth->has_permission('PCET.Loireatlantique.Edit')) : ?>
					<td><?php echo anchor(SITE_AREA .'/loireatlantique/pcet/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->ID_PCET) ?></td>
					<?php else: ?>
					<td><?php e($record->ID_PCET) ?></td>
					<?php endif; ?>
				
					<td><?php e($record->NOM_TYPE) ?></td>
					<td><?php e($record->Nom_Commune) ?><?php e($record->Nom_Departement) ?><?php e($record->NOM_EPCI) ?><?php e($record->nom_pays) ?><?php e($record->nom_pnr) ?></td>
					<td><?php e($record->STATUT_PCET) ?></td>
					<td><?php e($record->NOM_PHASE) ?></td>
					<td><?php e($record->ETAT_PCET) ?></td>
					<td>
						<?php if(!empty($record->INTERNET_PCET)): ?>
							<?php echo anchor($record->INTERNET_PCET, '<i class="icon-globe">&nbsp;</i>Consulter', 'target="_blank"'); ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if($record->CONTRAT_ADEME_PCET == '1'): ?>
							<?php echo "Oui"; ?>
						<?php else: ?>
							<?php echo "Non"; ?>
						<?php endif; ?>
					</td>
					<td><?php e($record->TYPE_CONTRAT_ADEME_PCET) ?></td>

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