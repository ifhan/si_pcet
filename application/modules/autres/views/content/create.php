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

if (isset($autres))
{
	$autres = (array) $autres;
}
$id = isset($autres['id']) ? $autres['id'] : '';

?>
<div class="admin-box">
	<h3>Autres</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('ID_STR') ? 'error' : ''; ?>">
				<?php echo form_label('Identifiant', 'autres_ID_STR', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='autres_ID_STR' type='text' name='autres_ID_STR' maxlength="10" value="<?php echo set_value('autres_ID_STR', isset($autres['ID_STR']) ? $autres['ID_STR'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ID_STR'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NOM') ? 'error' : ''; ?>">
				<?php echo form_label('Nom', 'autres_NOM', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='autres_NOM' type='text' name='autres_NOM' maxlength="255" value="<?php echo set_value('autres_NOM', isset($autres['NOM']) ? $autres['NOM'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NOM'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('COMMENT') ? 'error' : ''; ?>">
				<?php echo form_label('Commentaire', 'autres_COMMENT', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'autres_COMMENT', 'id' => 'autres_COMMENT', 'rows' => '5', 'cols' => '80', 'value' => set_value('autres_COMMENT', isset($autres['COMMENT']) ? $autres['COMMENT'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('COMMENT'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('autres_action_create'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/content/autres', lang('autres_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>