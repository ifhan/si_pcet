<div class="admin-box">
	<h3>Informations</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Informations.Settings.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Titre</th>
					<th>Slug</th>
                                        <th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Informations.Settings.Delete')) : ?>
				<tr>
					<td colspan="5">	
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('informations_delete_confirm'))); ?>')">
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
                                    <?php if ($this->auth->has_permission('Informations.Settings.Delete')) : ?>
                                    <td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
                                    <?php endif;?>
					
                                    <td><?php e($record->informations_title) ?></td>
                                    <td><?php e($record->informations_slug) ?></td>
                                    <td>
                                    <?php echo anchor(SITE_AREA .'/settings/informations/show/'. $record->id, '<i class="icon-globe">&nbsp;</i>Voir la page') ?><br />
                                    <?php if ($this->auth->has_permission('Informations.Settings.Edit')) : ?>
                                        <?php echo anchor(SITE_AREA .'/settings/informations/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?><br />    
                                    <?php endif; ?><?php echo anchor(SITE_AREA .'/'. $record->informations_slug, '<i class="icon-globe">&nbsp;</i>Slug') ?>
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