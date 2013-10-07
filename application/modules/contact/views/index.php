<div>
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($contact) ) {
	$contact = (array)$contact;
}
$id = isset($contact['contact_id']) ? "/".$contact['contact_id'] : '';
?>
    <h3>Contact</h3>
    <div id="login">
        <?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
        <div>
            <?php echo form_label(lang('contact_form_name').' <span class="required">*</span>:', 'name'); ?>
            <input id="name" type="text" name="name" maxlength="150" value="<?php echo set_value('name', isset($contact['name']) ? $contact['name'] : ''); ?>"  />
        </div>
        <div>
            <?php echo form_label(lang('contact_form_email').' <span class="required">*</span>:', 'email_address'); ?>
            <input id="email_address" type="text" name="email_address" maxlength="150" class="input-xxlarge" value="<?php echo set_value('email_address', isset($contact['email_address']) ? $contact['email_address'] : ''); ?>"  />
        </div>
        <div>
            <?php echo form_label(lang('contact_form_subject').' <span class="required">*</span>:', 'subject'); ?>
            <input id="subject" type="text" name="subject" maxlength="150" value="<?php echo set_value('subject', isset($contact['subject']) ? $contact['subject'] : ''); ?>"  />
        </div> 
        <div>
            <?php echo form_label(lang('contact_form_message').' <span class="required">*</span>:', 'message'); ?>
            <?php echo form_textarea( array( 'name' => 'message', 'id' => 'message', 'class' => 'input-xxlarge', 'rows' => '20', 'cols' => '200', 'value' => set_value('message', isset($contact['message']) ? $contact['message'] : '') ) )?>
        </div>
        <input class="btn btn-primary" type="submit" name="submit" value="<?php echo lang('contact_submit');?>">

        <?php echo form_close(); ?>

    </div>
</div>