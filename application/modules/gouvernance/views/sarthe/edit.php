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

if (isset($gouvernance))
{
	$gouvernance = (array) $gouvernance;
}
$id = isset($gouvernance['id']) ? $gouvernance['id'] : '';

?>
<div class="admin-box">
	<h3><?php echo lang('gouvernance_edit'); ?></h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<?php echo form_dropdown('gouvernance_ID_PCET',$pcets,set_value('gouvernance_ID_PCET', isset($gouvernance['ID_PCET']) ? $gouvernance['ID_PCET'] : ''),'Sélectionner un PCET');?>

			<div class="control-group <?php echo form_error('PRESENCE_GOUV') ? 'error' : ''; ?>">
				<?php echo form_label('Presence de gouvernance', 'gouvernance_PRESENCE_GOUV', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<label class='checkbox' for='gouvernance_PRESENCE_GOUV'>
						<input type='checkbox' id='gouvernance_PRESENCE_GOUV' name='gouvernance_PRESENCE_GOUV' value='1' <?php echo (isset($gouvernance['PRESENCE_GOUV']) && $gouvernance['PRESENCE_GOUV'] == 1) ? 'checked="checked"' : set_checkbox('gouvernance_PRESENCE_GOUV', 1); ?>>
						<span class='help-inline'><?php echo form_error('PRESENCE_GOUV'); ?></span>
					</label>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ACTEURS_GOUV') ? 'error' : ''; ?>">
				<?php echo form_label('Les acteurs associes', 'gouvernance_ACTEURS_GOUV', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'gouvernance_ACTEURS_GOUV', 'id' => 'gouvernance_ACTEURS_GOUV', 'rows' => '5', 'cols' => '80', 'value' => set_value('gouvernance_ACTEURS_GOUV', isset($gouvernance['ACTEURS_GOUV']) ? $gouvernance['ACTEURS_GOUV'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('ACTEURS_GOUV'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('gouvernance_action_edit'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/sarthe/gouvernance', lang('gouvernance_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Gouvernance.Sarthe.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('gouvernance_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('gouvernance_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>