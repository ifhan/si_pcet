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

if (isset($pays))
{
	$pays = (array) $pays;
}
$id = isset($pays['id']) ? $pays['id'] : '';

?>
<div class="admin-box">
	<h3>Pays</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('id_pays') ? 'error' : ''; ?>">
				<?php echo form_label('Identifiant du pays', 'pays_id_pays', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pays_id_pays' type='text' name='pays_id_pays' maxlength="4" value="<?php echo set_value('pays_id_pays', isset($pays['id_pays']) ? $pays['id_pays'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('id_pays'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('superficie') ? 'error' : ''; ?>">
				<?php echo form_label('Superficie', 'pays_superficie', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pays_superficie' type='text' name='pays_superficie' maxlength="11" value="<?php echo set_value('pays_superficie', isset($pays['superficie']) ? $pays['superficie'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('superficie'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('statut') ? 'error' : ''; ?>">
				<?php echo form_label('Statut', 'pays_statut', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pays_statut' type='text' name='pays_statut' maxlength="100" value="<?php echo set_value('pays_statut', isset($pays['statut']) ? $pays['statut'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('statut'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('insee_dep') ? 'error' : ''; ?>">
				<?php echo form_label('Departement', 'pays_insee_dep', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pays_insee_dep' type='text' name='pays_insee_dep' maxlength="10" value="<?php echo set_value('pays_insee_dep', isset($pays['insee_dep']) ? $pays['insee_dep'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('insee_dep'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('nom') ? 'error' : ''; ?>">
				<?php echo form_label('Nom', 'pays_nom', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pays_nom' type='text' name='pays_nom' maxlength="70" value="<?php echo set_value('pays_nom', isset($pays['nom']) ? $pays['nom'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('nom'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('population') ? 'error' : ''; ?>">
				<?php echo form_label('Population', 'pays_population', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='pays_population' type='text' name='pays_population' maxlength="11" value="<?php echo set_value('pays_population', isset($pays['population']) ? $pays['population'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('population'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('pays_action_edit'); ?>"  />
				or <?php echo anchor(SITE_AREA .'/content/pays', lang('pays_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Pays.Content.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('pays_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('pays_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>