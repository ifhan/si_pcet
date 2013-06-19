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

if (isset($contacts))
{
	$contacts = (array) $contacts;
}
$id = isset($contacts['id']) ? $contacts['id'] : '';

?>
<div class="admin-box">
	<h3><?php echo lang('contacts_edit'); ?></h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>
                    
                        <?php echo form_dropdown('contacts_ID_STR',$structures, set_value('contacts_ID_STR', isset($contacts['ID_STR']) ? $contacts['ID_STR'] : ''), "S&eacute;lectionner une collectivit&eacute;"); ?> 

			<?php // Change the values in this array to populate your dropdown as required
				$options = array(
					'M.' => 'M.',
					'Mme' => 'Mme',
				);

				echo form_dropdown('contacts_CIVILITE', $options, set_value('contacts_CIVILITE', isset($contacts['CIVILITE']) ? $contacts['CIVILITE'] : ''), 'Civilité');
			?>
                    
			<div class="control-group <?php echo form_error('NOM_CONTACT') ? 'error' : ''; ?>">
				<?php echo form_label('Nom', 'contacts_NOM_CONTACT', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='contacts_NOM_CONTACT' type='text' name='contacts_NOM_CONTACT' maxlength="30" value="<?php echo set_value('contacts_NOM_CONTACT', isset($contacts['NOM_CONTACT']) ? $contacts['NOM_CONTACT'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NOM_CONTACT'); ?></span>
				</div>
			</div>                    

			<div class="control-group <?php echo form_error('PRENOM') ? 'error' : ''; ?>">
				<?php echo form_label('Prénom', 'contacts_PRENOM', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='contacts_PRENOM' type='text' name='contacts_PRENOM' maxlength="30" value="<?php echo set_value('contacts_PRENOM', isset($contacts['PRENOM']) ? $contacts['PRENOM'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('PRENOM'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('MAIL') ? 'error' : ''; ?>">
				<?php echo form_label('Courriel', 'contacts_MAIL', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='contacts_MAIL' class="input-xxlarge" type='text' name='contacts_MAIL' maxlength="100" value="<?php echo set_value('contacts_MAIL', isset($contacts['MAIL']) ? $contacts['MAIL'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('MAIL'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('contacts_action_edit'); ?>"  />
				ou <?php echo anchor(SITE_AREA .'/vendee/contacts', lang('contacts_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Contacts.Vendee.Delete')) : ?>
				ou
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('contacts_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('contacts_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>