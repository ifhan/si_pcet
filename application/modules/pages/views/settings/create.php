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

if (isset($pages))
{
	$pages = (array) $pages;
}
$id = isset($pages['id']) ? $pages['id'] : '';

?>
<div class="admin-box">
	<h3>Pages</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('pages_title') ? 'error' : ''; ?>">
				<?php echo form_label('Titre'. lang('bf_form_label_required'), 'pages_title', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pages_title' type='text' name='pages_title' maxlength="255" value="<?php echo set_value('pages_title', isset($pages['pages_title']) ? $pages['pages_title'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('pages_title'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('pages_text') ? 'error' : ''; ?>">
				<?php echo form_label('Texte', 'pages_text', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'pages_text', 'id' => 'pages_text', 'rows' => '5', 'cols' => '80', 'value' => set_value('pages_text', isset($pages['pages_text']) ? $pages['pages_text'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('pages_text'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('pages_slug') ? 'error' : ''; ?>">
				<?php echo form_label('URL', 'pages_slug', array('class' => 'control-label') ); ?>
				<div class='controls'>
                                    <div class="input-prepend">
                                      <span class="add-on"><?php echo site_url() .'pages/' ?></span>
					<input id='pages_slug' type='text' name='pages_slug' maxlength="255" class="input-xxlarge" value="<?php echo set_value('pages_slug', isset($pages['pages_slug']) ? $pages['pages_slug'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('pages_slug'); ?></span>
                                    </div>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('pages_action_create'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/settings/pages', lang('pages_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>