<div class="admin-box">
	<h3><?php echo lang('diagnostic_title'); ?>Loire-Atlantique</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Diagnostic.Loireatlantique.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>PCET</th>
					<th>Diagnostic gaz à effet de serre</th>
					<th>Consommation du territoire (ktep)</th>
					<th>Emissions du territoire (teq-CO2)</th>
					<th>Consomation "Patrimoine et Compétence" (ktep)</th>
					<th>Emissions "Patrimoine et Compétence" (teq-CO2)</th>
					<th>Scope du bilan GES territorial</th>
					<th>Scope du bilan GES "Patrimoine et Compétence"</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Diagnostic.Loireatlantique.Delete')) : ?>
				<tr>
					<td colspan="9">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('diagnostic_delete_confirm'))); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Diagnostic.Loireatlantique.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Diagnostic.Loireatlantique.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/loireatlantique/diagnostic/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->ID_PCET.' - '.$record->NOM_TYPE.' - '.$record->Nom_Commune.$record->Nom_Departement.$record->NOM_EPCI.$record->nom_pays.$record->nom_pnr) ?></td>
				<?php else: ?>
				<td><?php e($record->ID_PCET.' - '.$record->NOM_TYPE.' - '.$record->Nom_Commune.$record->Nom_Departement.$record->NOM_EPCI.$record->nom_pays.$record->nom_pnr) ?></td>
				<?php endif; ?>
			
				<td><?php e($record->GES_DIAG) ?></td>
				<td><?php e($record->CONSO_KTEP_T) ?></td>
				<td><?php e($record->EMIS_CO2_T) ?></td>
				<td><?php e($record->CONSO_KTEP_PC) ?></td>
				<td><?php e($record->EMIS_CO2_PC) ?></td>
				<td><?php e($record->ID_GES_BILAN_T) ?></td>
				<td><?php e($record->NOM_GES_BILAN) ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="9">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>