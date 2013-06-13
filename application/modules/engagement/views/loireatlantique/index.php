<div class="admin-box">
	<h3>Suivi de l'engagement des démarches en Loire-Atlantique</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Engagement.Loireatlantique.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Identifiant du PCET</th>
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
				<?php if ($this->auth->has_permission('Engagement.Loireatlantique.Delete')) : ?>
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
					<?php if ($this->auth->has_permission('Engagement.Loireatlantique.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Engagement.Loireatlantique.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/loireatlantique/engagement/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->ID_PCET) ?></td>
				<?php else: ?>
				<td><?php e($record->ID_PCET) ?></td>
				<?php endif; ?>
                                
				<td><?php e($record->DATE_DELIB) ?></td>
				<td><?php e($record->NOTIF_DELIB_ETAT) ?></td>
				<td><?php e($record->NOTIF_DELIB_CR) ?></td>
				<td><?php e($record->NOTIF_USH) ?></td>
				<td><?php e($record->REP_USH) ?></td>
				<td><?php e($record->DATE_REP_USH) ?></td>
				<td><?php e($record->DATE_PAC) ?></td>
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