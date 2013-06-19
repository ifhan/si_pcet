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
	<h3><?php echo lang('diagnostic_create'); ?></h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<?php echo form_dropdown('diagnostic_ID_PCET',$pcets,set_value('diagnostic_ID_PCET', isset($pcets['ID_PCET']) ? $pcets['ID_PCET'] : ''),'Sélectionner un PCET');?>

                        <div class="control-group">
                            <div class='controls'>
                                <span>ou</span> <a href="<?php echo site_url(SITE_AREA .'/maineetloire/pcet/create') ?>" class="btn" type="button">Ajouter un PCET</a>
                                <span class='help-inline'>s'il n'y a pas de PCET disponible dans la liste.</span>
                            </div>
                        </div>
                    
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
					<span class='help-inline'>(en <abbr title="kilotonne équivalent pétrole">ktep</abbr>)</span>
                                        <span class='help-inline'><?php echo form_error('CONSO_KTEP_T'); ?></span>                                
				</div>
			</div>

			<div class="control-group <?php echo form_error('EMIS_CO2_T') ? 'error' : ''; ?>">
				<?php echo form_label('Émissions du territoire', 'diagnostic_EMIS_CO2_T', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_EMIS_CO2_T' type='text' name='diagnostic_EMIS_CO2_T' maxlength="11" value="<?php echo set_value('diagnostic_EMIS_CO2_T', isset($diagnostic['EMIS_CO2_T']) ? $diagnostic['EMIS_CO2_T'] : ''); ?>" />
					<span class='help-inline'>(en <abbr title="tonne équivalent CO2">teq-CO2</abbr>)</span>
                                        <span class='help-inline'><?php echo form_error('EMIS_CO2_T'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('CONSO_KTEP_PC') ? 'error' : ''; ?>">
				<?php echo form_label('Consommation "Patrimoine et Compétences"', 'diagnostic_CONSO_KTEP_PC', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_CONSO_KTEP_PC' type='text' name='diagnostic_CONSO_KTEP_PC' maxlength="11" value="<?php echo set_value('diagnostic_CONSO_KTEP_PC', isset($diagnostic['CONSO_KTEP_PC']) ? $diagnostic['CONSO_KTEP_PC'] : ''); ?>" />
					<span class='help-inline'>(en <abbr title="kilotonne équivalent pétrole">ktep</abbr>)</span>
                                        <span class='help-inline'><?php echo form_error('CONSO_KTEP_PC'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('EMIS_CO2_PC') ? 'error' : ''; ?>">
				<?php echo form_label('Émissions "Patrimoine et Compétences"', 'diagnostic_EMIS_CO2_PC', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='diagnostic_EMIS_CO2_PC' type='text' name='diagnostic_EMIS_CO2_PC' maxlength="11" value="<?php echo set_value('diagnostic_EMIS_CO2_PC', isset($diagnostic['EMIS_CO2_PC']) ? $diagnostic['EMIS_CO2_PC'] : ''); ?>" />
					<span class='help-inline'>(en <abbr title="tonne équivalent CO2">teq-CO2</abbr>)</span>
                                        <span class='help-inline'><?php echo form_error('EMIS_CO2_PC'); ?></span>
				</div>
			</div>

			<?php echo form_dropdown('diagnostic_ID_GES_BILAN_T',$scope, set_value('diagnostic_ID_GES_BILAN_T', isset($scope['ID_GES_BILAN_T']) ? $scope['ID_GES_BILAN_T'] : ''), 'Scope du bilan <abbr title="Gaz à effet de serre" class="initialism">GES</abbr> territorial'); ?>

			<?php echo form_dropdown('diagnostic_ID_GES_BILAN_PC',$scope, set_value('diagnostic_ID_GES_BILAN_PC', isset($scope['ID_GES_BILAN_PC']) ? $scope['ID_GES_BILAN_PC'] : ''), 'Scope du bilan <abbr title="Gaz à effet de serre" class="initialism">GES</abbr> "Patrimoine et Compétences"'); ?>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('diagnostic_action_create'); ?>"  />
				ou <?php echo anchor(SITE_AREA .'/maineetloire/diagnostic', lang('diagnostic_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>