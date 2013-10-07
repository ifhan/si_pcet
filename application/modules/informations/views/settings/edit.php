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

if (isset($informations))
{
	$informations = (array) $informations;
}
$id = isset($informations['id']) ? $informations['id'] : '';

?>
<div class="admin-box">
	<h3><?php echo lang('informations_edit')?></h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('informations_title') ? 'error' : ''; ?>">
				<?php echo form_label('Titre', 'informations_title', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'informations_title', 'id' => 'informations_title', 'class' => 'input-xxlarge', 'rows' => '1', 'cols' => '255', 'value' => set_value('informations_title', isset($informations['informations_title']) ? $informations['informations_title'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('informations_title'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('informations_slug') ? 'error' : ''; ?>">
				<?php echo form_label('Slug', 'informations_slug', array('class' => 'control-label') ); ?>
				<div class='controls'>
                                    <div class="input-prepend">
                                      <span class="add-on"><?php echo site_url() .'informations/' ?></span>
					<?php echo form_textarea( array( 'name' => 'informations_slug', 'id' => 'informations_slug', 'class' => 'input-xxlarge', 'rows' => '1', 'cols' => '80', 'value' => set_value('informations_slug', isset($informations['informations_slug']) ? $informations['informations_slug'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('informations_slug'); ?></span>
                                    </div>
				</div>
			</div>

			<div class="control-group <?php echo form_error('informations_text') ? 'error' : ''; ?>">
				<?php echo form_label('Text', 'informations_text', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'informations_text', 'id' => 'informations_text', 'class' => 'input-xxlarge', 'rows' => '20', 'cols' => '200', 'value' => set_value('informations_text', isset($informations['informations_text']) ? $informations['informations_text'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('informations_text'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('informations_action_edit'); ?>"  />
				ou <?php echo anchor(SITE_AREA .'/settings/informations', lang('informations_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Informations.Settings.Delete')) : ?>
				ou
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('informations_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('informations_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>