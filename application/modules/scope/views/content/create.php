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

if (isset($scope))
{
	$scope = (array) $scope;
}
$id = isset($scope['id']) ? $scope['id'] : '';

?>
<div class="admin-box">
	<h3>Scope</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('NOM_GES_BILAN') ? 'error' : ''; ?>">
				<?php echo form_label('Nom du scope', 'scope_NOM_GES_BILAN', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'scope_NOM_GES_BILAN', 'id' => 'scope_NOM_GES_BILAN', 'rows' => '5', 'cols' => '80', 'value' => set_value('scope_NOM_GES_BILAN', isset($scope['NOM_GES_BILAN']) ? $scope['NOM_GES_BILAN'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('NOM_GES_BILAN'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('scope_action_create'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/content/scope', lang('scope_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>