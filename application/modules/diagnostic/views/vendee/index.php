<div class="admin-box">
	<h3><?php echo lang('diagnostic_title'); ?>Vendée</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Diagnostic.Vendee.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>PCET</th>
					<th>Diagnostic "Gaz à effet de serre"</th>
					<th>Consommation du territoire (<abbr title="kilotonne équivalent pétrole">ktep</abbr>)</th>
					<th>Émissions du territoire (<abbr title="tonne équivalent CO2">teq-CO2</abbr>)</th>
					<th>Consommation "Patrimoine et Compétence" (<abbr title="kilotonne équivalent pétrole">ktep</abbr>)</th>
					<th>Émissions "Patrimoine et Compétence" (<abbr title="tonne équivalent CO2">teq-CO2</abbr>)</th>
                                        <th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Diagnostic.Vendee.Delete')) : ?>
				<tr>
					<td colspan="9">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('diagnostic_delete_confirm'))); ?>')">
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
                                    <?php if ($this->auth->has_permission('Diagnostic.Vendee.Delete')) : ?>
                                    <td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
                                    <?php endif;?>
                                    
                                    <td><?php e($record->ID_PCET.' - '.$record->NOM_TYPE.' - '.$record->Nom_Commune.$record->Nom_Departement.$record->NOM_EPCI.$record->nom_pays.$record->nom_pnr) ?></td>

                                    <td><?php e($record->GES_DIAG) ?></td>
                                    <td><?php e($record->CONSO_KTEP_T) ?></td>
                                    <td><?php e($record->EMIS_CO2_T) ?></td>
                                    <td><?php e($record->CONSO_KTEP_PC) ?></td>
                                    <td><?php e($record->EMIS_CO2_PC) ?></td>
                                    <td width="20%">
                                        <?php if ($this->auth->has_permission('Diagnostic.Vendee.Edit')) : ?>
                                            <?php echo anchor(SITE_AREA .'/vendee/diagnostic/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?><br />
                                        <?php endif; ?>     
                                    </td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="9"><?php echo lang('bf_no_record_found'); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>