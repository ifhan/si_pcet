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
	<h3>Diagnostic</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('ID_DIAG') ? 'error' : ''; ?>">
				<?php echo form_label('PCET', 'diagnostic_ID_DIAG', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_ID_DIAG' type='text' name='diagnostic_ID_DIAG' maxlength="10" value="<?php echo set_value('diagnostic_ID_DIAG', isset($diagnostic['ID_DIAG']) ? $diagnostic['ID_DIAG'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_DIAG'); ?></span>
				</div>
			</div>

			<?php // Change the values in this array to populate your dropdown as required
				$options = array(
					'A' => 'A',
					'P' => 'P',
					'T' => 'T',
					'TP' => 'TP',
				);

				echo form_dropdown('diagnostic_GES_DIAG', $options, set_value('diagnostic_GES_DIAG', isset($diagnostic['GES_DIAG']) ? $diagnostic['GES_DIAG'] : ''), 'Diagnostic gaz a effet de serre');
			?>

			<div class="control-group <?php echo form_error('CONSO_KTEP_T') ? 'error' : ''; ?>">
				<?php echo form_label('Consommation du territoire', 'diagnostic_CONSO_KTEP_T', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_CONSO_KTEP_T' type='text' name='diagnostic_CONSO_KTEP_T' maxlength="11" value="<?php echo set_value('diagnostic_CONSO_KTEP_T', isset($diagnostic['CONSO_KTEP_T']) ? $diagnostic['CONSO_KTEP_T'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('CONSO_KTEP_T'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('EMIS_CO2_T') ? 'error' : ''; ?>">
				<?php echo form_label('Emissions du territoire', 'diagnostic_EMIS_CO2_T', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_EMIS_CO2_T' type='text' name='diagnostic_EMIS_CO2_T' maxlength="11" value="<?php echo set_value('diagnostic_EMIS_CO2_T', isset($diagnostic['EMIS_CO2_T']) ? $diagnostic['EMIS_CO2_T'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('EMIS_CO2_T'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('CONSO_KTEP_PC') ? 'error' : ''; ?>">
				<?php echo form_label('Consomation patrimoine et competence', 'diagnostic_CONSO_KTEP_PC', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_CONSO_KTEP_PC' type='text' name='diagnostic_CONSO_KTEP_PC' maxlength="11" value="<?php echo set_value('diagnostic_CONSO_KTEP_PC', isset($diagnostic['CONSO_KTEP_PC']) ? $diagnostic['CONSO_KTEP_PC'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('CONSO_KTEP_PC'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('EMIS_CO2_PC') ? 'error' : ''; ?>">
				<?php echo form_label('Emissions patrimoine et competence', 'diagnostic_EMIS_CO2_PC', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_EMIS_CO2_PC' type='text' name='diagnostic_EMIS_CO2_PC' maxlength="11" value="<?php echo set_value('diagnostic_EMIS_CO2_PC', isset($diagnostic['EMIS_CO2_PC']) ? $diagnostic['EMIS_CO2_PC'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('EMIS_CO2_PC'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ID_GES_BILAN_T') ? 'error' : ''; ?>">
				<?php echo form_label('NOM GES BILAN T', 'diagnostic_ID_GES_BILAN_T', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_ID_GES_BILAN_T' type='text' name='diagnostic_ID_GES_BILAN_T' maxlength="10" value="<?php echo set_value('diagnostic_ID_GES_BILAN_T', isset($diagnostic['ID_GES_BILAN_T']) ? $diagnostic['ID_GES_BILAN_T'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_GES_BILAN_T'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ID_GES_BILAN_PC') ? 'error' : ''; ?>">
				<?php echo form_label('ID GES BILAN PC', 'diagnostic_ID_GES_BILAN_PC', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_ID_GES_BILAN_PC' type='text' name='diagnostic_ID_GES_BILAN_PC' maxlength="10" value="<?php echo set_value('diagnostic_ID_GES_BILAN_PC', isset($diagnostic['ID_GES_BILAN_PC']) ? $diagnostic['ID_GES_BILAN_PC'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_GES_BILAN_PC'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('diagnostic_action_edit'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/maineetloire/diagnostic', lang('diagnostic_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Diagnostic.Maineetloire.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('diagnostic_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('diagnostic_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>