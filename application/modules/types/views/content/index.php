<div class="admin-box">
	<h3><?php echo lang('types_title') ?></h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Types.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Libell&eacute;</th>
                                        <th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Types.Content.Delete')) : ?>
				<tr>
					<td colspan="2">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('types_delete_confirm'))); ?>')">
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
					<?php if ($this->auth->has_permission('Types.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
                                        
                                        <td><?php e($record->NOM_TYPE) ?></td>
                                        
                                        <td>
					
                                        <?php if ($this->auth->has_permission('Types.Content.Edit')) : ?>
                                            <?php echo anchor(SITE_AREA .'/content/types/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?><br />
                                        <?php endif; ?>
                                            
                                            <?php echo anchor(SITE_AREA .'/content/types/show/'. $record->id, '<i class="icon-globe">&nbsp;</i>Voir les collectivités') ?>
                                            
                                        </td>
			
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="2">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>