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

if (isset($avis))
{
	$avis = (array) $avis;
}
$id = isset($avis['id']) ? $avis['id'] : '';

?>
<div class="admin-box">
	<h3>Avis</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('ID_PCET') ? 'error' : ''; ?>">
				<?php echo form_label('Identifiant du PCET', 'avis_ID_PCET', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_ID_PCET' type='text' name='avis_ID_PCET' maxlength="10" value="<?php echo set_value('avis_ID_PCET', isset($avis['ID_PCET']) ? $avis['ID_PCET'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_PCET'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('DEM_ETAT_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Date de la sollicitation avis de l Etat', 'avis_DEM_ETAT_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_DEM_ETAT_AVIS' type='text' name='avis_DEM_ETAT_AVIS' maxlength="10" value="<?php echo set_value('avis_DEM_ETAT_AVIS', isset($avis['DEM_ETAT_AVIS']) ? $avis['DEM_ETAT_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('DEM_ETAT_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('COM_ETAT_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Commentaire sur la sollicitation de l avis de l Etat', 'avis_COM_ETAT_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'avis_COM_ETAT_AVIS', 'id' => 'avis_COM_ETAT_AVIS', 'rows' => '5', 'cols' => '80', 'value' => set_value('avis_COM_ETAT_AVIS', isset($avis['COM_ETAT_AVIS']) ? $avis['COM_ETAT_AVIS'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('COM_ETAT_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('REP_ETAT_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Date du rendu de l avis Etat', 'avis_REP_ETAT_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_REP_ETAT_AVIS' type='text' name='avis_REP_ETAT_AVIS' maxlength="10" value="<?php echo set_value('avis_REP_ETAT_AVIS', isset($avis['REP_ETAT_AVIS']) ? $avis['REP_ETAT_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('REP_ETAT_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('DEM_REG_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Date de la sollicitation de l avis du Conseil regional', 'avis_DEM_REG_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_DEM_REG_AVIS' type='text' name='avis_DEM_REG_AVIS' maxlength="10" value="<?php echo set_value('avis_DEM_REG_AVIS', isset($avis['DEM_REG_AVIS']) ? $avis['DEM_REG_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('DEM_REG_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('REP_REG_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Date du rendu de l avis du Conseil regional', 'avis_REP_REG_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_REP_REG_AVIS' type='text' name='avis_REP_REG_AVIS' maxlength="10" value="<?php echo set_value('avis_REP_REG_AVIS', isset($avis['REP_REG_AVIS']) ? $avis['REP_REG_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('REP_REG_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('DEM_USH_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Date de la sollicitation de l avis de l USH', 'avis_DEM_USH_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_DEM_USH_AVIS' type='text' name='avis_DEM_USH_AVIS' maxlength="10" value="<?php echo set_value('avis_DEM_USH_AVIS', isset($avis['DEM_USH_AVIS']) ? $avis['DEM_USH_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('DEM_USH_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('REP_USH_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Date du rendu de l avis de l USH', 'avis_REP_USH_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_REP_USH_AVIS' type='text' name='avis_REP_USH_AVIS' maxlength="10" value="<?php echo set_value('avis_REP_USH_AVIS', isset($avis['REP_USH_AVIS']) ? $avis['REP_USH_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('REP_USH_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('DEM_ADEME_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Date de la sollicitation de l avis de l ADEME', 'avis_DEM_ADEME_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_DEM_ADEME_AVIS' type='text' name='avis_DEM_ADEME_AVIS' maxlength="10" value="<?php echo set_value('avis_DEM_ADEME_AVIS', isset($avis['DEM_ADEME_AVIS']) ? $avis['DEM_ADEME_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('DEM_ADEME_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('REP_ADEME_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Date du rendu de l avis de l ADEME', 'avis_REP_ADEME_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_REP_ADEME_AVIS' type='text' name='avis_REP_ADEME_AVIS' maxlength="10" value="<?php echo set_value('avis_REP_ADEME_AVIS', isset($avis['REP_ADEME_AVIS']) ? $avis['REP_ADEME_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('REP_ADEME_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('PP_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Points positifs', 'avis_PP_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_PP_AVIS' type='text' name='avis_PP_AVIS'  value="<?php echo set_value('avis_PP_AVIS', isset($avis['PP_AVIS']) ? $avis['PP_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('PP_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('PN_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Points negatifs', 'avis_PN_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_PN_AVIS' type='text' name='avis_PN_AVIS'  value="<?php echo set_value('avis_PN_AVIS', isset($avis['PN_AVIS']) ? $avis['PN_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('PN_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('DATE_ADOPT_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('Date d adoption du PCET', 'avis_DATE_ADOPT_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='avis_DATE_ADOPT_AVIS' type='text' name='avis_DATE_ADOPT_AVIS' maxlength="10" value="<?php echo set_value('avis_DATE_ADOPT_AVIS', isset($avis['DATE_ADOPT_AVIS']) ? $avis['DATE_ADOPT_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('DATE_ADOPT_AVIS'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('avis_action_create'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/vendee/avis', lang('avis_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>