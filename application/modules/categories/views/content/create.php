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

if (isset($categories))
{
	$categories = (array) $categories;
}
$id = isset($categories['id']) ? $categories['id'] : '';

?>
<div class="admin-box">
	<h3>Categories</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('NOM_CATEGORIE') ? 'error' : ''; ?>">
				<?php echo form_label('Nom', 'categories_NOM_CATEGORIE', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='categories_NOM_CATEGORIE' type='text' name='categories_NOM_CATEGORIE' maxlength="255" value="<?php echo set_value('categories_NOM_CATEGORIE', isset($categories['NOM_CATEGORIE']) ? $categories['NOM_CATEGORIE'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NOM_CATEGORIE'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('categories_action_create'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/content/categories', lang('categories_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>