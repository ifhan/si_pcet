<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<div class="admin-box">
    <h3>Message</h3>
    <form class="form-horizontal">
        <fieldset>
            <div class="control-group">
                <label class="control-label"><?php echo lang('contact_form_name')?></label>
                <div class="controls">
                    <?php echo isset($contact->name) ? $contact->name : ''; ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo lang('contact_form_email')?></label>
                <div class="controls">
                    <?php echo isset($contact->email_address) ? $contact->email_address : ''; ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo lang('contact_form_send')?></label>
                <div class="controls">
                    <?php echo isset($contact->created_on) ? e(date("d/m/Y", strtotime(($contact->created_on)))) : ''; ?>
                </div>
            </div>            
            <div class="control-group">
                <label class="control-label"><?php echo lang('contact_form_subject')?></label>
                <div class="controls">
                    <?php echo isset($contact->subject) ? $contact->subject : ''; ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo lang('contact_form_message')?></label>
                <div class="controls">
                    <?php echo isset($contact->message) ? $contact->message : '';?>
                </div>
            </div>
        </fieldset>
    </form>
        <?php if (has_permission('Contact.Content.Delete') && isset($contact->contact_id)) : ?>
	<!-- Purge? -->
        <div class="admin-box">
            <div class="form-actions">
                <a class="btn btn-danger" href="<?php echo site_url(SITE_AREA .'/content/contact/delete/'. $contact->contact_id); ?>" onclick="return confirm('<?php echo lang('contact_delete_confirm') ?>')"><i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('bf_action_delete'); ?></a>
            </div>
	</div>
	<?php endif; ?>
</div>
