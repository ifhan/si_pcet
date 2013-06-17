<div class="admin-box">
	<h3><?php echo lang('engagement_title'); ?>Vendée</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Engagement.Vendee.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>PCET</th>
					<th>Date de déliberation</th>
					<th>Date du courrier de la collectivité notifiant sa déliberation a l'État</th>
					<th>Date du courrier de la collectivité notifiant sa déliberation au Conseil regional</th>
					<th>Date courrier de notification d'engagement de la collectivité à l'USH</th>
					<th>Consultation aval de l'USH souhaitée ?</th>
					<th>Date du courrier de réponse de l'USH</th>
					<th>Date du Porter-à-connaissance de l'État</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Engagement.Vendee.Delete')) : ?>
				<tr>
					<td colspan="9">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('engagement_delete_confirm'))); ?>')">
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
					<?php if ($this->auth->has_permission('Engagement.Vendee.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Engagement.Vendee.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/vendee/engagement/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->ID_PCET.' - '.$record->NOM_TYPE.' - '.$record->Nom_Commune.$record->Nom_Departement.$record->NOM_EPCI.$record->nom_pays.$record->nom_pnr) ?></td>
				<?php else: ?>
				<td><?php e($record->ID_PCET.' - '.$record->NOM_TYPE.' - '.$record->Nom_Commune.$record->Nom_Departement.$record->NOM_EPCI.$record->nom_pays.$record->nom_pnr) ?></td>
				<?php endif; ?>
                                
				<td>
                                    <?php if($record->DATE_DELIB !== '0000-00-00'): ?>
                                        <?php e(date("d/m/Y", strtotime(($record->DATE_DELIB)))) ?>
                                    <?php endif; ?>
				<td>
                                    <?php if($record->NOTIF_DELIB_ETAT !== '0000-00-00'): ?>
                                        <?php e(date("d/m/Y", strtotime(($record->NOTIF_DELIB_ETAT)))) ?>
                                    <?php endif; ?>
                                </td>
				<td>
                                    <?php if($record->NOTIF_DELIB_CR !== '0000-00-00'): ?>
                                        <?php e(date("d/m/Y", strtotime(($record->NOTIF_DELIB_CR)))) ?>
                                    <?php endif; ?>
                                </td>
				<td>
                                    <?php if($record->NOTIF_USH !== '0000-00-00'): ?>
                                        <?php e(date("d/m/Y", strtotime(($record->NOTIF_USH)))) ?>
                                    <?php endif; ?>
                                </td>
				<td>
                                    <?php if($record->REP_USH == '1'): ?>
                                        <?php echo "Oui"; ?>
                                    <?php else: ?>
                                        <?php echo "Non"; ?>
                                    <?php endif; ?>
				<td>
                                    <?php if($record->DATE_REP_USH !== '0000-00-00'): ?>
                                        <?php e(date("d/m/Y", strtotime(($record->DATE_REP_USH)))) ?>
                                    <?php endif; ?>
                                </td>
				<td>
                                    <?php if($record->DATE_PAC !== '0000-00-00'): ?>
                                        <?php e(date("d/m/Y", strtotime(($record->DATE_PAC)))) ?>
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