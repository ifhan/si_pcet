<?php $columns = 6; ?>
<div class="admin-box">
	<h3>Messages</h3>

	<?php echo form_open(current_url()) ;?>
	<table class="table table-striped">
		<thead>
			<tr>
                            <?php if(has_permission('Contact.Content.Delete')):?>
                                <th class="column-check"><input class="check-all" type="checkbox" /></th>
                            <?php endif;?>
                            <th><?php echo lang('contact_form_name');?></th>
                            <th><?php echo lang('contact_form_email');?></th>
                            <th><?php echo lang('contact_form_subject');?></th>
                            <th><?php echo lang('contact_form_send');?></th>
                            <th>Actions</th>
			</tr>
		</thead>
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<tfoot>
                    <?php if(has_permission('Contact.Content.Delete')):?>
                    <tr>
			<td colspan="6">
                        	<input type="submit" name="delete" class="btn btn-danger" id="delete-me" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('pages_delete_multiple_confirm'); ?>')">
                                <?php echo lang('bf_with_selected') ?>
                        </td>
                    </tr>
		<?php endif; ?>
		</tfoot>
	<?php endif; ?>
		<tbody>
		<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
			<tr>
                            <?php if(has_permission('Contact.Content.Delete')):?>
				<td><input type="checkbox" name="checked[]" value="<?php echo $record->contact_id ?>" /></td>
                            <?php endif;?>
                            <td><?php echo $record->name; ?></td>
                            <td><?php echo $record->email_address;?></td>
                            <td><?php echo $record->subject;?></td>
                            <td><?php e(date("d/m/Y", strtotime(($record->created_on)))) ?></td>
                            <td><?php echo anchor(SITE_AREA .'/content/contact/view/'. $record->contact_id, '<i class="icon-search">&nbsp;</i>Voir le message') ?></td>
			</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
                            <td colspan="6"><?php echo lang('bf_no_record_found'); ?></td>
			</tr>
		<?php endif; ?>
		</tbody>
	</table>

	<?php echo form_close(); ?>

	<?php echo $this->pagination->create_links(); ?>

</div>	<!-- Contact Editor -->
