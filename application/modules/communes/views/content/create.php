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

if (isset($communes))
{
	$communes = (array) $communes;
}
$id = isset($communes['id']) ? $communes['id'] : '';

?>
<div class="admin-box">
	<h3>Communes</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('INSEE_Region') ? 'error' : ''; ?>">
				<?php echo form_label('INSEE Region', 'communes_INSEE_Region', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_INSEE_Region' type='text' name='communes_INSEE_Region' maxlength="2" value="<?php echo set_value('communes_INSEE_Region', isset($communes['INSEE_Region']) ? $communes['INSEE_Region'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('INSEE_Region'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Nom_Region') ? 'error' : ''; ?>">
				<?php echo form_label('Nom Region', 'communes_Nom_Region', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_Nom_Region' type='text' name='communes_Nom_Region' maxlength="30" value="<?php echo set_value('communes_Nom_Region', isset($communes['Nom_Region']) ? $communes['Nom_Region'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Nom_Region'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('INSEE_Departement') ? 'error' : ''; ?>">
				<?php echo form_label('INSEE Departement', 'communes_INSEE_Departement', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_INSEE_Departement' type='text' name='communes_INSEE_Departement' maxlength="2" value="<?php echo set_value('communes_INSEE_Departement', isset($communes['INSEE_Departement']) ? $communes['INSEE_Departement'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('INSEE_Departement'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Nom_Departement') ? 'error' : ''; ?>">
				<?php echo form_label('Nom Departement', 'communes_Nom_Departement', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_Nom_Departement' type='text' name='communes_Nom_Departement' maxlength="30" value="<?php echo set_value('communes_Nom_Departement', isset($communes['Nom_Departement']) ? $communes['Nom_Departement'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Nom_Departement'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('INSEE_Arrondissement') ? 'error' : ''; ?>">
				<?php echo form_label('INSEE Arrondissement', 'communes_INSEE_Arrondissement', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_INSEE_Arrondissement' type='text' name='communes_INSEE_Arrondissement' maxlength="1" value="<?php echo set_value('communes_INSEE_Arrondissement', isset($communes['INSEE_Arrondissement']) ? $communes['INSEE_Arrondissement'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('INSEE_Arrondissement'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('INSEE_Canton') ? 'error' : ''; ?>">
				<?php echo form_label('INSEE Canton', 'communes_INSEE_Canton', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_INSEE_Canton' type='text' name='communes_INSEE_Canton' maxlength="2" value="<?php echo set_value('communes_INSEE_Canton', isset($communes['INSEE_Canton']) ? $communes['INSEE_Canton'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('INSEE_Canton'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Id_BDCarto') ? 'error' : ''; ?>">
				<?php echo form_label('Id BDCarto', 'communes_Id_BDCarto', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_Id_BDCarto' type='text' name='communes_Id_BDCarto' maxlength="11" value="<?php echo set_value('communes_Id_BDCarto', isset($communes['Id_BDCarto']) ? $communes['Id_BDCarto'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Id_BDCarto'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Nom_Commune') ? 'error' : ''; ?>">
				<?php echo form_label('Nom Commune', 'communes_Nom_Commune', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_Nom_Commune' type='text' name='communes_Nom_Commune' maxlength="50" value="<?php echo set_value('communes_Nom_Commune', isset($communes['Nom_Commune']) ? $communes['Nom_Commune'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Nom_Commune'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('INSEE_Commune') ? 'error' : ''; ?>">
				<?php echo form_label('INSEE Commune', 'communes_INSEE_Commune', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_INSEE_Commune' type='text' name='communes_INSEE_Commune' maxlength="5" value="<?php echo set_value('communes_INSEE_Commune', isset($communes['INSEE_Commune']) ? $communes['INSEE_Commune'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('INSEE_Commune'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Statut') ? 'error' : ''; ?>">
				<?php echo form_label('Statut', 'communes_Statut', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_Statut' type='text' name='communes_Statut' maxlength="20" value="<?php echo set_value('communes_Statut', isset($communes['Statut']) ? $communes['Statut'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Statut'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Abscisse_Commune') ? 'error' : ''; ?>">
				<?php echo form_label('Abscisse Commune', 'communes_Abscisse_Commune', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_Abscisse_Commune' type='text' name='communes_Abscisse_Commune' maxlength="11" value="<?php echo set_value('communes_Abscisse_Commune', isset($communes['Abscisse_Commune']) ? $communes['Abscisse_Commune'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Abscisse_Commune'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Ordonnee_Commune') ? 'error' : ''; ?>">
				<?php echo form_label('Ordonnee Commune', 'communes_Ordonnee_Commune', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_Ordonnee_Commune' type='text' name='communes_Ordonnee_Commune' maxlength="11" value="<?php echo set_value('communes_Ordonnee_Commune', isset($communes['Ordonnee_Commune']) ? $communes['Ordonnee_Commune'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Ordonnee_Commune'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Superficie') ? 'error' : ''; ?>">
				<?php echo form_label('Superficie', 'communes_Superficie', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_Superficie' type='text' name='communes_Superficie' maxlength="11" value="<?php echo set_value('communes_Superficie', isset($communes['Superficie']) ? $communes['Superficie'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Superficie'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('Population') ? 'error' : ''; ?>">
				<?php echo form_label('Population', 'communes_Population', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_Population' type='text' name='communes_Population' maxlength="11" value="<?php echo set_value('communes_Population', isset($communes['Population']) ? $communes['Population'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('Population'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('EXTRACTION_IGN') ? 'error' : ''; ?>">
				<?php echo form_label('EXTRACTION IGN', 'communes_EXTRACTION_IGN', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_EXTRACTION_IGN' type='text' name='communes_EXTRACTION_IGN' maxlength="16" value="<?php echo set_value('communes_EXTRACTION_IGN', isset($communes['EXTRACTION_IGN']) ? $communes['EXTRACTION_IGN'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('EXTRACTION_IGN'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('RECETTE') ? 'error' : ''; ?>">
				<?php echo form_label('RECETTE', 'communes_RECETTE', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='communes_RECETTE' type='text' name='communes_RECETTE' maxlength="16" value="<?php echo set_value('communes_RECETTE', isset($communes['RECETTE']) ? $communes['RECETTE'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('RECETTE'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('communes_action_create'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/settings/communes', lang('communes_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>