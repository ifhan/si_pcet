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

if (isset($types))
{
	$types = (array) $types;
}
$id = isset($types['id']) ? $types['id'] : '';

?>
<div class="admin-box">
	<h3>Types</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('NOM_TYPE') ? 'error' : ''; ?>">
				<?php echo form_label('Nom du type de structure', 'types_NOM_TYPE', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='types_NOM_TYPE' type='text' name='types_NOM_TYPE' maxlength="50" value="<?php echo set_value('types_NOM_TYPE', isset($types['NOM_TYPE']) ? $types['NOM_TYPE'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NOM_TYPE'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('types_action_edit'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/content/types', lang('types_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Types.Content.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('types_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('types_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>