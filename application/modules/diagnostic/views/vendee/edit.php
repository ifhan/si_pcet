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

if (isset($diagnostic))
{
	$diagnostic = (array) $diagnostic;
}
$id = isset($diagnostic['id']) ? $diagnostic['id'] : '';

?>
<div class="admin-box">
	<h3><?php echo lang('diagnostic_edit'); ?></h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<?php echo form_dropdown('diagnostic_ID_PCET',$pcets,set_value('diagnostic_ID_PCET', isset($diagnostic['ID_PCET']) ? $diagnostic['ID_PCET'] : ''),'Porteur du PCET');?>

			<?php // Change the values in this array to populate your dropdown as required
				$options = array(
					'Absent' => 'Absent',
					'Patrimonial' => 'Patrimonial',
					'Territorial' => 'Territorial',
					'Territorial et Patrimonial' => 'Territorial et Patrimonial',
				);

				echo form_dropdown('diagnostic_GES_DIAG', $options, set_value('diagnostic_GES_DIAG', isset($diagnostic['GES_DIAG']) ? $diagnostic['GES_DIAG'] : ''), 'Diagnostic "Gaz à effet de serre"');
			?>

			<div class="control-group <?php echo form_error('CONSO_KTEP_T') ? 'error' : ''; ?>">
				<?php echo form_label('Consommation du territoire', 'diagnostic_CONSO_KTEP_T', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_CONSO_KTEP_T' type='text' name='diagnostic_CONSO_KTEP_T' maxlength="11" value="<?php echo set_value('diagnostic_CONSO_KTEP_T', isset($diagnostic['CONSO_KTEP_T']) ? $diagnostic['CONSO_KTEP_T'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('CONSO_KTEP_T'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('EMIS_CO2_T') ? 'error' : ''; ?>">
				<?php echo form_label('Émissions du territoire', 'diagnostic_EMIS_CO2_T', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_EMIS_CO2_T' type='text' name='diagnostic_EMIS_CO2_T' maxlength="11" value="<?php echo set_value('diagnostic_EMIS_CO2_T', isset($diagnostic['EMIS_CO2_T']) ? $diagnostic['EMIS_CO2_T'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('EMIS_CO2_T'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('CONSO_KTEP_PC') ? 'error' : ''; ?>">
				<?php echo form_label('Consommation "Patrimoine et Compétences"', 'diagnostic_CONSO_KTEP_PC', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_CONSO_KTEP_PC' type='text' name='diagnostic_CONSO_KTEP_PC' maxlength="11" value="<?php echo set_value('diagnostic_CONSO_KTEP_PC', isset($diagnostic['CONSO_KTEP_PC']) ? $diagnostic['CONSO_KTEP_PC'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('CONSO_KTEP_PC'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('EMIS_CO2_PC') ? 'error' : ''; ?>">
				<?php echo form_label('Émissions "Patrimoine et Compétences"', 'diagnostic_EMIS_CO2_PC', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_EMIS_CO2_PC' type='text' name='diagnostic_EMIS_CO2_PC' maxlength="11" value="<?php echo set_value('diagnostic_EMIS_CO2_PC', isset($diagnostic['EMIS_CO2_PC']) ? $diagnostic['EMIS_CO2_PC'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('EMIS_CO2_PC'); ?></span>
				</div>
			</div>
                    
                    <?php echo form_dropdown('diagnostic_ID_GES_BILAN_T',$scope, set_value('diagnostic_ID_GES_BILAN_T', isset($diagnostic['ID_GES_BILAN_T']) ? $diagnostic['ID_GES_BILAN_T'] : ''), 'Scope du bilan GES territorial'); ?>                    
                        
                    <?php echo form_dropdown('diagnostic_ID_GES_BILAN_PC',$scope, set_value('diagnostic_ID_GES_BILAN_PC', isset($diagnostic['ID_GES_BILAN_PC']) ? $diagnostic['ID_GES_BILAN_PC'] : ''), 'Scope du bilan GES "Patrimoine et Compétences"'); ?>
			            
			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('diagnostic_action_edit'); ?>"  />
				ou <?php echo anchor(SITE_AREA .'/vendee/diagnostic', lang('diagnostic_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Diagnostic.Vendee.Delete')) : ?>
				ou
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('diagnostic_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('diagnostic_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>