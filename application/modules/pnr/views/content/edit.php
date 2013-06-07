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

if (isset($pnr))
{
	$pnr = (array) $pnr;
}
$id = isset($pnr['id']) ? $pnr['id'] : '';

?>
<div class="admin-box">
	<h3>PNR</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('id_dpt') ? 'error' : ''; ?>">
				<?php echo form_label('Departement', 'pnr_id_dpt', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pnr_id_dpt' type='text' name='pnr_id_dpt' maxlength="3" value="<?php echo set_value('pnr_id_dpt', isset($pnr['id_dpt']) ? $pnr['id_dpt'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('id_dpt'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('id_regional') ? 'error' : ''; ?>">
				<?php echo form_label('Identifiant regional', 'pnr_id_regional', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pnr_id_regional' type='text' name='pnr_id_regional' maxlength="9" value="<?php echo set_value('pnr_id_regional', isset($pnr['id_regional']) ? $pnr['id_regional'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('id_regional'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('nom') ? 'error' : ''; ?>">
				<?php echo form_label('Nom', 'pnr_nom', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pnr_nom' type='text' name='pnr_nom' maxlength="160" value="<?php echo set_value('pnr_nom', isset($pnr['nom']) ? $pnr['nom'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('nom'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('surf_sig_l93') ? 'error' : ''; ?>">
				<?php echo form_label('Surface calculee', 'pnr_surf_sig_l93', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pnr_surf_sig_l93' type='text' name='pnr_surf_sig_l93' maxlength="11" value="<?php echo set_value('pnr_surf_sig_l93', isset($pnr['surf_sig_l93']) ? $pnr['surf_sig_l93'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('surf_sig_l93'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('url_site') ? 'error' : ''; ?>">
				<?php echo form_label('Site web', 'pnr_url_site', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pnr_url_site' type='text' name='pnr_url_site' maxlength="160" value="<?php echo set_value('pnr_url_site', isset($pnr['url_site']) ? $pnr['url_site'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('url_site'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('id_type') ? 'error' : ''; ?>">
				<?php echo form_label('Id Type', 'pnr_id_type', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pnr_id_type' type='text' name='pnr_id_type' maxlength="2" value="<?php echo set_value('pnr_id_type', isset($pnr['id_type']) ? $pnr['id_type'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('id_type'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('pnr_action_edit'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/content/pnr', lang('pnr_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('PNR.Content.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('pnr_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('pnr_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>