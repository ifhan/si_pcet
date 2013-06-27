<div class="admin-box">
	<h3><?php echo lang('categories_title') ?></h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Categories.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
                                        <th>Numéro</th>
					<th>Nom</th>
                                        <th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Categories.Content.Delete')) : ?>
				<tr>
					<td colspan="4">					
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('categories_delete_confirm'))); ?>')">
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
					<?php if ($this->auth->has_permission('Categories.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
                                        <td><?php e($record->number) ?></td>
                                        <td><?php e($record->NOM_CATEGORIE) ?></td>
                                        
                                        <td>
                                            <?php if ($this->auth->has_permission('Categories.Content.Edit')) : ?>
                                              <?php echo anchor(SITE_AREA .'/content/categories/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?><br />
                                            <?php endif; ?>
                                            <?php echo anchor(SITE_AREA .'/content/categories/show/'. $record->id, '<i class="icon-search">&nbsp;</i>Voir les fiches correspondantes') ?>
                                        </td>
			
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="4"><?php echo lang('bf_no_record_found'); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>