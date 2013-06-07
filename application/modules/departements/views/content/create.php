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
	<h3>Departements</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('INSEE_Region') ? 'error' : ''; ?>">
				<?php echo form_label('INSEE Region', 'departements_INSEE_Region', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_INSEE_Region' type='text' name='departements_INSEE_Region' maxlength="2" value="<?php echo set_value('departements_INSEE_Region', isset($departements['INSEE_Region']) ? $departements['INSEE_Region'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('INSEE_Region'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Id_BDCarto') ? 'error' : ''; ?>">
				<?php echo form_label('Id BDCarto', 'departements_Id_BDCarto', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_Id_BDCarto' type='text' name='departements_Id_BDCarto' maxlength="11" value="<?php echo set_value('departements_Id_BDCarto', isset($departements['Id_BDCarto']) ? $departements['Id_BDCarto'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Id_BDCarto'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Nom_Departement') ? 'error' : ''; ?>">
				<?php echo form_label('Nom Departement', 'departements_Nom_Departement', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_Nom_Departement' type='text' name='departements_Nom_Departement' maxlength="30" value="<?php echo set_value('departements_Nom_Departement', isset($departements['Nom_Departement']) ? $departements['Nom_Departement'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Nom_Departement'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('INSEE_Departement') ? 'error' : ''; ?>">
				<?php echo form_label('INSEE Departement', 'departements_INSEE_Departement', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_INSEE_Departement' type='text' name='departements_INSEE_Departement' maxlength="2" value="<?php echo set_value('departements_INSEE_Departement', isset($departements['INSEE_Departement']) ? $departements['INSEE_Departement'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('INSEE_Departement'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Abscisse_Departement') ? 'error' : ''; ?>">
				<?php echo form_label('Abscisse Departement', 'departements_Abscisse_Departement', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_Abscisse_Departement' type='text' name='departements_Abscisse_Departement' maxlength="11" value="<?php echo set_value('departements_Abscisse_Departement', isset($departements['Abscisse_Departement']) ? $departements['Abscisse_Departement'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Abscisse_Departement'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Ordonnee_Departement') ? 'error' : ''; ?>">
				<?php echo form_label('Ordonnee Departement', 'departements_Ordonnee_Departement', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_Ordonnee_Departement' type='text' name='departements_Ordonnee_Departement' maxlength="11" value="<?php echo set_value('departements_Ordonnee_Departement', isset($departements['Ordonnee_Departement']) ? $departements['Ordonnee_Departement'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Ordonnee_Departement'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('EXTRACTION_IGN') ? 'error' : ''; ?>">
				<?php echo form_label('EXTRACTION IGN', 'departements_EXTRACTION_IGN', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_EXTRACTION_IGN' type='text' name='departements_EXTRACTION_IGN' maxlength="16" value="<?php echo set_value('departements_EXTRACTION_IGN', isset($departements['EXTRACTION_IGN']) ? $departements['EXTRACTION_IGN'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('EXTRACTION_IGN'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('RECETTE') ? 'error' : ''; ?>">
				<?php echo form_label('RECETTE', 'departements_RECETTE', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_RECETTE' type='text' name='departements_RECETTE' maxlength="16" value="<?php echo set_value('departements_RECETTE', isset($departements['RECETTE']) ? $departements['RECETTE'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('RECETTE'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('the_geom') ? 'error' : ''; ?>">
				<?php echo form_label('The Geom', 'departements_the_geom', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='departements_the_geom' type='text' name='departements_the_geom' maxlength="16" value="<?php echo set_value('departements_the_geom', isset($departements['the_geom']) ? $departements['the_geom'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('the_geom'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('departements_action_create'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/content/departements', lang('departements_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>