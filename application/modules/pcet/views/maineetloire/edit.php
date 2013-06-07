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

if (isset($pcet))
{
	$pcet = (array) $pcet;
}
$id = isset($pcet['id']) ? $pcet['id'] : '';

?>
<div class="admin-box">
	<h3>PCET</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<?php // Change the values in this array to populate your dropdown as required
				$options = array(
					'Obligatoire' => 'Obligatoire',
					'Volontaire' => 'Volontaire',
				);

				echo form_dropdown('pcet_STATUT_PCET', $options, set_value('pcet_STATUT_PCET', isset($pcet['STATUT_PCET']) ? $pcet['STATUT_PCET'] : ''), 'Statut');
			?>

			<div class="control-group <?php echo form_error('ID_PCET') ? 'error' : ''; ?>">
				<?php echo form_label('Identifiant du PCET', 'pcet_ID_PCET', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pcet_ID_PCET' type='text' name='pcet_ID_PCET' maxlength="10" value="<?php echo set_value('pcet_ID_PCET', isset($pcet['ID_PCET']) ? $pcet['ID_PCET'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_PCET'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ETAT_PCET') ? 'error' : ''; ?>">
				<?php echo form_label('Commentaire sur l etat du PCET', 'pcet_ETAT_PCET', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'pcet_ETAT_PCET', 'id' => 'pcet_ETAT_PCET', 'rows' => '5', 'cols' => '80', 'value' => set_value('pcet_ETAT_PCET', isset($pcet['ETAT_PCET']) ? $pcet['ETAT_PCET'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('ETAT_PCET'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('INTERNET_PCET') ? 'error' : ''; ?>">
				<?php echo form_label('Site web', 'pcet_INTERNET_PCET', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'pcet_INTERNET_PCET', 'id' => 'pcet_INTERNET_PCET', 'rows' => '5', 'cols' => '80', 'value' => set_value('pcet_INTERNET_PCET', isset($pcet['INTERNET_PCET']) ? $pcet['INTERNET_PCET'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('INTERNET_PCET'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('CONTRAT_ADEME_PCET') ? 'error' : ''; ?>">
				<?php echo form_label('CONTRAT ADEME PCET', 'pcet_CONTRAT_ADEME_PCET', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<label class='checkbox' for='pcet_CONTRAT_ADEME_PCET'>
						<input type='checkbox' id='pcet_CONTRAT_ADEME_PCET' name='pcet_CONTRAT_ADEME_PCET' value='1' <?php echo (isset($pcet['CONTRAT_ADEME_PCET']) && $pcet['CONTRAT_ADEME_PCET'] == 1) ? 'checked="checked"' : set_checkbox('pcet_CONTRAT_ADEME_PCET', 1); ?>>
						<span class='help-inline'><?php echo form_error('CONTRAT_ADEME_PCET'); ?></span>
					</label>
				</div>
			</div>

			<div class="control-group <?php echo form_error('TYPE_CONTRAT_ADEME_PCET') ? 'error' : ''; ?>">
				<?php echo form_label('TYPE CONTRAT ADEME PCET', 'pcet_TYPE_CONTRAT_ADEME_PCET', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pcet_TYPE_CONTRAT_ADEME_PCET' type='text' name='pcet_TYPE_CONTRAT_ADEME_PCET' maxlength="50" value="<?php echo set_value('pcet_TYPE_CONTRAT_ADEME_PCET', isset($pcet['TYPE_CONTRAT_ADEME_PCET']) ? $pcet['TYPE_CONTRAT_ADEME_PCET'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('TYPE_CONTRAT_ADEME_PCET'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ID_STR') ? 'error' : ''; ?>">
				<?php echo form_label('Type de structure', 'pcet_ID_STR', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pcet_ID_STR' type='text' name='pcet_ID_STR' maxlength="10" value="<?php echo set_value('pcet_ID_STR', isset($pcet['ID_STR']) ? $pcet['ID_STR'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_STR'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ID_AVIS') ? 'error' : ''; ?>">
				<?php echo form_label('ID AVIS', 'pcet_ID_AVIS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pcet_ID_AVIS' type='text' name='pcet_ID_AVIS' maxlength="10" value="<?php echo set_value('pcet_ID_AVIS', isset($pcet['ID_AVIS']) ? $pcet['ID_AVIS'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_AVIS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ID_ENGAGE') ? 'error' : ''; ?>">
				<?php echo form_label('ID ENGAGE', 'pcet_ID_ENGAGE', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pcet_ID_ENGAGE' type='text' name='pcet_ID_ENGAGE' maxlength="10" value="<?php echo set_value('pcet_ID_ENGAGE', isset($pcet['ID_ENGAGE']) ? $pcet['ID_ENGAGE'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_ENGAGE'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ID_INDIC') ? 'error' : ''; ?>">
				<?php echo form_label('ID INDIC', 'pcet_ID_INDIC', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pcet_ID_INDIC' type='text' name='pcet_ID_INDIC' maxlength="10" value="<?php echo set_value('pcet_ID_INDIC', isset($pcet['ID_INDIC']) ? $pcet['ID_INDIC'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_INDIC'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ID_DIAG') ? 'error' : ''; ?>">
				<?php echo form_label('ID DIAG', 'pcet_ID_DIAG', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pcet_ID_DIAG' type='text' name='pcet_ID_DIAG' maxlength="10" value="<?php echo set_value('pcet_ID_DIAG', isset($pcet['ID_DIAG']) ? $pcet['ID_DIAG'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_DIAG'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ID_PHASE') ? 'error' : ''; ?>">
				<?php echo form_label('Phase', 'pcet_ID_PHASE', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pcet_ID_PHASE' type='text' name='pcet_ID_PHASE' maxlength="10" value="<?php echo set_value('pcet_ID_PHASE', isset($pcet['ID_PHASE']) ? $pcet['ID_PHASE'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_PHASE'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ID_ADAPT') ? 'error' : ''; ?>">
				<?php echo form_label('ID ADAPT', 'pcet_ID_ADAPT', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pcet_ID_ADAPT' type='text' name='pcet_ID_ADAPT' maxlength="10" value="<?php echo set_value('pcet_ID_ADAPT', isset($pcet['ID_ADAPT']) ? $pcet['ID_ADAPT'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_ADAPT'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ID_GOUV') ? 'error' : ''; ?>">
				<?php echo form_label('ID GOUV', 'pcet_ID_GOUV', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pcet_ID_GOUV' type='text' name='pcet_ID_GOUV' maxlength="10" value="<?php echo set_value('pcet_ID_GOUV', isset($pcet['ID_GOUV']) ? $pcet['ID_GOUV'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_GOUV'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('pcet_action_edit'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/maineetloire/pcet', lang('pcet_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('PCET.Maineetloire.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('pcet_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('pcet_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>