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

if (isset($departements))
{
	$departements = (array) $departements;
}
$id = isset($departements['id']) ? $departements['id'] : '';

?>
<div class="admin-box">
	<h3><?php echo lang('departements_edit')?></h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('INSEE_Region') ? 'error' : ''; ?>">
				<?php echo form_label('Code INSEE de la région', 'departements_INSEE_Region', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_INSEE_Region' type='text' name='departements_INSEE_Region' maxlength="2" value="<?php echo set_value('departements_INSEE_Region', isset($departements['INSEE_Region']) ? $departements['INSEE_Region'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('INSEE_Region'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Id_BDCarto') ? 'error' : ''; ?>">
				<?php echo form_label('Identifiant BDCarto', 'departements_Id_BDCarto', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_Id_BDCarto' type='text' name='departements_Id_BDCarto' maxlength="11" value="<?php echo set_value('departements_Id_BDCarto', isset($departements['Id_BDCarto']) ? $departements['Id_BDCarto'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Id_BDCarto'); ?></span>
				</div>
			</div>
                    
			<div class="control-group <?php echo form_error('INSEE_Departement') ? 'error' : ''; ?>">
				<?php echo form_label('Code INSEE du département', 'departements_INSEE_Departement', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_INSEE_Departement' type='text' name='departements_INSEE_Departement' maxlength="2" value="<?php echo set_value('departements_INSEE_Departement', isset($departements['INSEE_Departement']) ? $departements['INSEE_Departement'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('INSEE_Departement'); ?></span>
				</div>
			</div>                    

			<div class="control-group <?php echo form_error('Nom_Departement') ? 'error' : ''; ?>">
				<?php echo form_label('Nom', 'departements_Nom_Departement', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_Nom_Departement' type='text' name='departements_Nom_Departement' maxlength="30" value="<?php echo set_value('departements_Nom_Departement', isset($departements['Nom_Departement']) ? $departements['Nom_Departement'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Nom_Departement'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('departements_action_edit'); ?>"  />
				ou <?php echo anchor(SITE_AREA .'/content/departements', lang('departements_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Departements.Content.Delete')) : ?>
				ou
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('departements_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('departements_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>