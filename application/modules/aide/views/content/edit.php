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

if (isset($aide))
{
	$aide = (array) $aide;
}
$id = isset($aide['id']) ? $aide['id'] : '';

?>
<div class="admin-box">
	<h3><?php echo lang('aide_edit') ?></h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>
                    
                        <?php echo form_dropdown('aide_category_id',$categories, set_value('aide_category_id', isset($aide['category_id']) ? $aide['category_id'] : ''), "Catégorie"); ?> 

                        <div class="control-group <?php echo form_error('number') ? 'error' : ''; ?>">
				<?php echo form_label('Numéro de la catégorie', 'aide_number', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='aide_number' type='text' name='aide_number' maxlength="4" value="<?php echo set_value('aide_number', isset($aide['number']) ? $aide['number'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('number'); ?></span>
				</div>
			</div>                      
                    
			<div class="control-group <?php echo form_error('title') ? 'error' : ''; ?>">
				<?php echo form_label('Titre', 'aide_title', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='aide_title' type='text' name='aide_title' maxlength="255" class="input-xxlarge" value="<?php echo set_value('aide_title', isset($aide['title']) ? $aide['title'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('title'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('slug') ? 'error' : ''; ?>">
				<?php echo form_label('URL', 'aide_slug', array('class' => 'control-label') ); ?>
				<div class='controls'>
                                    <div class="input-prepend">
                                        <span class="add-on"><?php echo site_url() .'aide/' ?></span>
					<input id='aide_slug' type='text' name='aide_slug' maxlength="255" value="<?php echo set_value('aide_slug', isset($aide['slug']) ? $aide['slug'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('slug'); ?></span>
                                    </div>
				</div>
			</div>

			<div class="control-group <?php echo form_error('body') ? 'error' : ''; ?>">
				<?php echo form_label('Texte', 'aide_body', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'aide_body', 'id' => 'aide_body', 'rows' => '20', 'cols' => '200', 'class' => 'input-xxlarge', 'value' => set_value('aide_body', isset($aide['body']) ? $aide['body'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('body'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('aide_action_edit'); ?>"  />
				ou <?php echo anchor(SITE_AREA .'/content/aide', lang('aide_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Aide.Content.Delete')) : ?>
				ou
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('aide_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('aide_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>