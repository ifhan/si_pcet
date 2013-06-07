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

if (isset($structures))
{
	$structures = (array) $structures;
}
$id = isset($structures['id']) ? $structures['id'] : '';

?>
<div class="admin-box">
	<h3>Modifier une collectivit&eacute;</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<?php if($structures['TYPE_STRUCTURE_id'] == '1'): ?>
				<?php echo form_dropdown('structures_ID_STR',$communautes_agglomeration, set_value('structures_ID_STR', isset($structures['ID_STR']) ? $structures['ID_STR'] : ''),'Nom'); ?>
			<?php endif; ?>

			<?php if($structures['TYPE_STRUCTURE_id'] == '2'): ?>
				<?php echo form_dropdown('structures_ID_STR',$communautes_urbaines, set_value('structures_ID_STR', isset($structures['ID_STR']) ? $structures['ID_STR'] : ''),'Nom'); ?>
			<?php endif; ?>			
		
			<?php if($structures['TYPE_STRUCTURE_id'] == '3'): ?>
				<?php echo form_dropdown('structures_ID_STR',$communes, set_value('structures_ID_STR', isset($structures['ID_STR']) ? $structures['ID_STR'] : ''),'Nom'); ?>
			<?php endif; ?>
			
			<?php if($structures['TYPE_STRUCTURE_id'] == '4'): ?>
				<?php echo form_dropdown('structures_ID_STR',$communautes_communes, set_value('structures_ID_STR', isset($structures['ID_STR']) ? $structures['ID_STR'] : ''),'Nom'); ?>
			<?php endif; ?>

			<?php if($structures['TYPE_STRUCTURE_id'] == '5'): ?>
				<?php echo form_dropdown('structures_ID_STR',$departements, set_value('structures_ID_STR', isset($structures['ID_STR']) ? $structures['ID_STR'] : ''),'Nom'); ?>
			<?php endif; ?>
			
			<?php if($structures['TYPE_STRUCTURE_id'] == '9'): ?>
				<?php echo form_dropdown('structures_ID_STR',$array_pays, set_value('structures_ID_STR', isset($structures['ID_STR']) ? $structures['ID_STR'] : ''),'Nom'); ?>
			<?php endif; ?>
			
			<?php if($structures['TYPE_STRUCTURE_id'] == '10'): ?>
				<?php echo form_dropdown('structures_ID_STR',$array_pnr, set_value('structures_ID_STR', isset($structures['ID_STR']) ? $structures['ID_STR'] : ''),'Nom'); ?>
			<?php endif; ?>
			
			<?php echo form_dropdown('structures_TYPE_STRUCTURE_id',$types, set_value('structures_TYPE_STRUCTURE_id', isset($structures['TYPE_STRUCTURE_id']) ? $structures['TYPE_STRUCTURE_id'] : ''), 'Type de collectivit&eacute;'); ?>

			<?php echo form_dropdown('structures_DEPARTEMENT_id',$departements, set_value('structures_DEPARTEMENT_id', isset($structures['DEPARTEMENT_id']) ? $structures['DEPARTEMENT_id'] : ''), 'D&eacute;partement'); ?>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('structures_action_edit'); ?>"  />
				ou <?php echo anchor(SITE_AREA .'/loireatlantique/structures', lang('structures_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Structures.Loireatlantique.Delete')) : ?>
				ou
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('structures_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('structures_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>