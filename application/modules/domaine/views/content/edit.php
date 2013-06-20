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

if (isset($domaine))
{
	$domaine = (array) $domaine;
}
$id = isset($domaine['id']) ? $domaine['id'] : '';

?>
<div class="admin-box">
	<h3>Domaine</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('NOM_DOMAINE_ACTION') ? 'error' : ''; ?>">
				<?php echo form_label('Nom du domaine de l\'action', 'domaine_NOM_DOMAINE_ACTION', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='domaine_NOM_DOMAINE_ACTION' type='text' name='domaine_NOM_DOMAINE_ACTION' maxlength="70" value="<?php echo set_value('domaine_NOM_DOMAINE_ACTION', isset($domaine['NOM_DOMAINE_ACTION']) ? $domaine['NOM_DOMAINE_ACTION'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NOM_DOMAINE_ACTION'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('domaine_action_edit'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/content/domaine', lang('domaine_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Domaine.Content.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('domaine_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('domaine_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>