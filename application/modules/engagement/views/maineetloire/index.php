<div class="admin-box">
	<h3>Engagement</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Engagement.Maineetloire.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Identifiant du PCET</th>
					<th>Commentaire sur l implication de la ddt sur le projet</th>
					<th>Date de deliberation</th>
					<th>Date du courrier de la structure notifiant sa deliberation a l Etat</th>
					<th>Date du courrier de la structure notifiant sa deliberation au Conseil regional</th>
					<th>Date courrier de notification d engagement de la collectivite a l USH</th>
					<th>Consultation aval USH souhaitee</th>
					<th>Date du courrier de reponse de l USH</th>
					<th>Date du Porter-a-connaissance de l Etat</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Engagement.Maineetloire.Delete')) : ?>
				<tr>
					<td colspan="10">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('engagement_delete_confirm'))); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Engagement.Maineetloire.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Engagement.Maineetloire.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/maineetloire/engagement/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->ID_PCET) ?></td>
				<?php else: ?>
				<td><?php e($record->ID_PCET) ?></td>
				<?php endif; ?>
			
				<td><?php e($record->COMMENT_DDT) ?></td>
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
					<td colspan="10">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>