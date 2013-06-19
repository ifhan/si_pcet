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

if (isset($indicateur))
{
	$indicateur = (array) $indicateur;
}
$id = isset($indicateur['id']) ? $indicateur['id'] : '';

?>
<div class="admin-box">
	<h3><?php echo lang('indicateur_create'); ?></h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<?php echo form_dropdown('indicateur_ID_PCET',$pcets,set_value('indicateur_ID_PCET', isset($pcets['ID_PCET']) ? $pcets['ID_PCET'] : ''),'Sélectionner un PCET');?>

			<div class="control-group <?php echo form_error('TABLEAU_DE_BORD') ? 'error' : ''; ?>">
				<?php echo form_label('Tableau de bord', 'indicateur_TABLEAU_DE_BORD', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<label class='checkbox' for='indicateur_TABLEAU_DE_BORD'>
						<input type='checkbox' id='indicateur_TABLEAU_DE_BORD' name='indicateur_TABLEAU_DE_BORD' value='1' <?php echo (isset($indicateur['TABLEAU_DE_BORD']) && $indicateur['TABLEAU_DE_BORD'] == 1) ? 'checked="checked"' : set_checkbox('indicateur_TABLEAU_DE_BORD', 1); ?>>
						<span class='help-inline'><?php echo form_error('TABLEAU_DE_BORD'); ?></span>
					</label>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NB_TOTAL_INDICATEURS') ? 'error' : ''; ?>">
				<?php echo form_label('Nombre total d\'indicateurs', 'indicateur_NB_TOTAL_INDICATEURS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='indicateur_NB_TOTAL_INDICATEURS' type='text' name='indicateur_NB_TOTAL_INDICATEURS' maxlength="11" value="<?php echo set_value('indicateur_NB_TOTAL_INDICATEURS', isset($indicateur['NB_TOTAL_INDICATEURS']) ? $indicateur['NB_TOTAL_INDICATEURS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NB_TOTAL_INDICATEURS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NB_INDICATEURS_QT') ? 'error' : ''; ?>">
				<?php echo form_label('Nombre total d\'indicateurs quantitatifs', 'indicateur_NB_INDICATEURS_QT', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='indicateur_NB_INDICATEURS_QT' type='text' name='indicateur_NB_INDICATEURS_QT' maxlength="11" value="<?php echo set_value('indicateur_NB_INDICATEURS_QT', isset($indicateur['NB_INDICATEURS_QT']) ? $indicateur['NB_INDICATEURS_QT'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NB_INDICATEURS_QT'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NB_INDICATEURS_QL') ? 'error' : ''; ?>">
				<?php echo form_label('Nombre total d\'indicateurs qualitatifs', 'indicateur_NB_INDICATEURS_QL', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='indicateur_NB_INDICATEURS_QL' type='text' name='indicateur_NB_INDICATEURS_QL' maxlength="11" value="<?php echo set_value('indicateur_NB_INDICATEURS_QL', isset($indicateur['NB_INDICATEURS_QL']) ? $indicateur['NB_INDICATEURS_QL'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NB_INDICATEURS_QL'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NB_TOTAL_ACTIONS') ? 'error' : ''; ?>">
				<?php echo form_label('Nombre total d\'actions', 'indicateur_NB_TOTAL_ACTIONS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='indicateur_NB_TOTAL_ACTIONS' type='text' name='indicateur_NB_TOTAL_ACTIONS' maxlength="11" value="<?php echo set_value('indicateur_NB_TOTAL_ACTIONS', isset($indicateur['NB_TOTAL_ACTIONS']) ? $indicateur['NB_TOTAL_ACTIONS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NB_TOTAL_ACTIONS'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('indicateur_action_create'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/maineetloire/indicateur', lang('indicateur_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>