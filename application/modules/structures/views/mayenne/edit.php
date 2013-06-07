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

if (isset($structures))
{
	$structures = (array) $structures;
}
$id = isset($structures['id']) ? $structures['id'] : '';

?>
<div class="admin-box">
	<h3>Structures</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('ID_STR') ? 'error' : ''; ?>">
				<?php echo form_label('Identifiant de la structure', 'structures_ID_STR', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='structures_ID_STR' type='text' name='structures_ID_STR' maxlength="10" value="<?php echo set_value('structures_ID_STR', isset($structures['ID_STR']) ? $structures['ID_STR'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_STR'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NOM_STR') ? 'error' : ''; ?>">
				<?php echo form_label('Nom de la structure', 'structures_NOM_STR', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='structures_NOM_STR' type='text' name='structures_NOM_STR' maxlength="255" value="<?php echo set_value('structures_NOM_STR', isset($structures['NOM_STR']) ? $structures['NOM_STR'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NOM_STR'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('TYPE_STRUCTURE_id') ? 'error' : ''; ?>">
				<?php echo form_label('Type de structure', 'structures_TYPE_STRUCTURE_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='structures_TYPE_STRUCTURE_id' type='text' name='structures_TYPE_STRUCTURE_id' maxlength="11" value="<?php echo set_value('structures_TYPE_STRUCTURE_id', isset($structures['TYPE_STRUCTURE_id']) ? $structures['TYPE_STRUCTURE_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('TYPE_STRUCTURE_id'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('DEPARTEMENT_id') ? 'error' : ''; ?>">
				<?php echo form_label('Departement', 'structures_DEPARTEMENT_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='structures_DEPARTEMENT_id' type='text' name='structures_DEPARTEMENT_id' maxlength="2" value="<?php echo set_value('structures_DEPARTEMENT_id', isset($structures['DEPARTEMENT_id']) ? $structures['DEPARTEMENT_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('DEPARTEMENT_id'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('structures_action_edit'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/mayenne/structures', lang('structures_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Structures.Mayenne.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('structures_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('structures_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>