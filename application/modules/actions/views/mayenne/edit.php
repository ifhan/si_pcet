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

if (isset($actions))
{
	$actions = (array) $actions;
}
$id = isset($actions['id']) ? $actions['id'] : '';

?>
<div class="admin-box">
	<h3><?php echo lang('actions_edit'); ?></h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<?php echo form_dropdown('actions_ID_PCET',$pcets,set_value('actions_ID_PCET', isset($actions['ID_PCET']) ? $actions['ID_PCET'] : ''),'Sélectionner un PCET');?>

			<?php echo form_dropdown('actions_DOMAINES_ACTION_id',$domaine, set_value('actions_DOMAINES_ACTION_id', isset($actions['DOMAINES_ACTION_id']) ? $actions['DOMAINES_ACTION_id'] : ''), 'Domaine d\'action'); ?>

			<div class="control-group <?php echo form_error('COMPETENCE') ? 'error' : ''; ?>">
				<?php echo form_label('Competence de la collectivite', 'actions_COMPETENCE', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<label class='checkbox' for='actions_COMPETENCE'>
						<input type='checkbox' id='actions_COMPETENCE' name='actions_COMPETENCE' value='1' <?php echo (isset($actions['COMPETENCE']) && $actions['COMPETENCE'] == 1) ? 'checked="checked"' : set_checkbox('actions_COMPETENCE', 1); ?>>
						<span class='help-inline'><?php echo form_error('COMPETENCE'); ?></span>
					</label>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NOM_ACTION') ? 'error' : ''; ?>">
				<?php echo form_label('Nom de l action', 'actions_NOM_ACTION', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'actions_NOM_ACTION', 'id' => 'actions_NOM_ACTION', 'class' => 'input-xxlarge', 'rows' => '20', 'cols' => '200', 'value' => set_value('actions_NOM_ACTION', isset($actions['NOM_ACTION']) ? $actions['NOM_ACTION'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('NOM_ACTION'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('OBJECTIFS') ? 'error' : ''; ?>">
				<?php echo form_label('Objectifs', 'actions_OBJECTIFS', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'actions_OBJECTIFS', 'id' => 'actions_OBJECTIFS', 'class' => 'input-xxlarge', 'rows' => '20', 'cols' => '200', 'value' => set_value('actions_OBJECTIFS', isset($actions['OBJECTIFS']) ? $actions['OBJECTIFS'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('OBJECTIFS'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('INDICATEUR_SUIVI') ? 'error' : ''; ?>">
				<?php echo form_label('Indicateurs de suivi', 'actions_INDICATEUR_SUIVI', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'actions_INDICATEUR_SUIVI', 'id' => 'actions_INDICATEUR_SUIVI', 'class' => 'input-xxlarge', 'rows' => '20', 'cols' => '200', 'value' => set_value('actions_INDICATEUR_SUIVI', isset($actions['INDICATEUR_SUIVI']) ? $actions['INDICATEUR_SUIVI'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('INDICATEUR_SUIVI'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('actions_action_edit'); ?>"  />
				ou <?php echo anchor(SITE_AREA .'/mayenne/actions', lang('actions_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Actions.Mayenne.Delete')) : ?>
				ou
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('actions_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('actions_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>