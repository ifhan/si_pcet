<?php

$validation_errors = validation_errors();

if ($validation_errors) :
?>
<div class="alert alert-block alert-error fade in">
	<a class="close" data-dismiss="alert">&times;</a>
	<h4 class="alert-heading">Please fix the following errors:</h4>
	<?php echo $validation_errors; ?>
</div>
<?php
endif;

if (isset($epci))
{
	$epci = (array) $epci;
}
$id = isset($epci['id']) ? $epci['id'] : '';

?>
<div class="admin-box">
	<h3>EPCI</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('SIREN_EPCI') ? 'error' : ''; ?>">
				<?php echo form_label('SIREN EPCI', 'epci_SIREN_EPCI', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='epci_SIREN_EPCI' type='text' name='epci_SIREN_EPCI' maxlength="10" value="<?php echo set_value('epci_SIREN_EPCI', isset($epci['SIREN_EPCI']) ? $epci['SIREN_EPCI'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('SIREN_EPCI'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NOM_EPCI') ? 'error' : ''; ?>">
				<?php echo form_label('NOM EPCI', 'epci_NOM_EPCI', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='epci_NOM_EPCI' type='text' name='epci_NOM_EPCI' maxlength="50" value="<?php echo set_value('epci_NOM_EPCI', isset($epci['NOM_EPCI']) ? $epci['NOM_EPCI'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NOM_EPCI'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('TYPE_EPCI') ? 'error' : ''; ?>">
				<?php echo form_label('TYPE EPCI', 'epci_TYPE_EPCI', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='epci_TYPE_EPCI' type='text' name='epci_TYPE_EPCI' maxlength="7" value="<?php echo set_value('epci_TYPE_EPCI', isset($epci['TYPE_EPCI']) ? $epci['TYPE_EPCI'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('TYPE_EPCI'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NATURE_EPCI') ? 'error' : ''; ?>">
				<?php echo form_label('NATURE EPCI', 'epci_NATURE_EPCI', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='epci_NATURE_EPCI' type='text' name='epci_NATURE_EPCI' maxlength="50" value="<?php echo set_value('epci_NATURE_EPCI', isset($epci['NATURE_EPCI']) ? $epci['NATURE_EPCI'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NATURE_EPCI'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('epci_action_edit'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/content/epci', lang('epci_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('EPCI.Content.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('epci_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('epci_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>