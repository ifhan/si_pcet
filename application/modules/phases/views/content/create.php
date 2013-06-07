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

if (isset($phases))
{
	$phases = (array) $phases;
}
$id = isset($phases['id']) ? $phases['id'] : '';

?>
<div class="admin-box">
	<h3>Phases</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('NOM_PHASE') ? 'error' : ''; ?>">
				<?php echo form_label('Nom de la phase', 'phases_NOM_PHASE', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='phases_NOM_PHASE' type='text' name='phases_NOM_PHASE' maxlength="70" value="<?php echo set_value('phases_NOM_PHASE', isset($phases['NOM_PHASE']) ? $phases['NOM_PHASE'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NOM_PHASE'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('phases_action_create'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/content/phases', lang('phases_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>