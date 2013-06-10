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
	<h3><?php echo lang('structures_add'); ?></h3>
	<table class="table">
		<?php echo form_open($this->uri->uri_string()); ?>
		<tr>
			<td><strong>Communaut&eacute;s d'agglom&eacute;ration</strong></td>
			<td>
				<?php echo form_dropdown('structures_ID_STR',$communautes_agglomeration, set_value('structures_ID_STR', isset($structure['ID_STR']) ? $structure['ID_STR'] : '')); ?>		
				<?php
					$data = array(
						'structures_DEPARTEMENT_id'  => '53',
						'structures_TYPE_STRUCTURE_id' => '1',
					);
					echo form_hidden($data);
				?>
			</td>
			<td><input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('structures_action_create'); ?>"  /></td>
		</tr>
		<?php echo form_close(); ?>
		<?php if(!empty($communautes_urbaines)): ?>
		<?php echo form_open($this->uri->uri_string()); ?>
		<tr>
			<td><strong>Communaut&eacute;s urbaines</strong></td>
			<td>
				<?php echo form_dropdown('structures_ID_STR',$communautes_urbaines, set_value('structures_ID_STR', isset($structure['ID_STR']) ? $structure['ID_STR'] : '')); ?>	
				<?php
					$data = array(
						'structures_DEPARTEMENT_id'  => '53',
						'structures_TYPE_STRUCTURE_id' => '2',
					);
					echo form_hidden($data);
				?>
			</td>
			<td><input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('structures_action_create'); ?>"  /></td>
		</tr>
		<?php echo form_close(); ?>
		<?php endif; ?>
		<?php echo form_open($this->uri->uri_string()); ?>
		<tr>
			<td><strong>Communaut&eacute;s de communes</strong></td>
			<td>
				<?php echo form_dropdown('structures_ID_STR',$communautes_communes, set_value('structures_ID_STR', isset($structure['ID_STR']) ? $structure['ID_STR'] : '')); ?>		
			<?php
				$data = array(
					'structures_DEPARTEMENT_id'  => '53',
					'structures_TYPE_STRUCTURE_id' => '4',
				);
				echo form_hidden($data);
			?>
			</td>
			<td><input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('structures_action_create'); ?>"  /></td>
		</tr>
		<?php echo form_close(); ?>
		<?php echo form_open($this->uri->uri_string()); ?>
		<tr>
			<td><strong>Communes</strong></td>
			<td>
				<?php echo form_dropdown('structures_ID_STR',$communes, set_value('structures_ID_STR', isset($structure['ID_STR']) ? $structure['ID_STR'] : '')); ?>		
				<?php
					$data = array(
						'structures_DEPARTEMENT_id'  => '53',
						'structures_TYPE_STRUCTURE_id' => '3',
					);
					echo form_hidden($data);
				?>
			</td>
			<td><input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('structures_action_create'); ?>"  /></td>
		</tr>
		<?php echo form_close(); ?>
		<?php echo form_open($this->uri->uri_string()); ?>
		<tr>
			<td><strong>Conseil g&eacute;n&eacute;ral</strong></td>
			<td>
				<?php echo form_dropdown('structures_ID_STR',$departements, set_value('structures_ID_STR', isset($structure['ID_STR']) ? $structure['ID_STR'] : '')); ?>
				<?php
					$data = array(
						'structures_DEPARTEMENT_id'  => '53',
						'structures_TYPE_STRUCTURE_id' => '5',
					);
					echo form_hidden($data);
				?>
			</td>
			<td><input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('structures_action_create'); ?>"  /></td>
		</tr>
		<?php echo form_close(); ?>
		<?php echo form_open($this->uri->uri_string()); ?>
		<tr>
			<td><strong>Parcs Naturels R&eacute;gionaux</strong></td>
			<td>
				<?php echo form_dropdown('structures_ID_STR',$array_pnr, set_value('structures_ID_STR', isset($structure['ID_STR']) ? $structure['ID_STR'] : '')); ?>
				<?php
					$data = array(
						'structures_DEPARTEMENT_id'  => '53',
						'structures_TYPE_STRUCTURE_id' => '10',
					);
					echo form_hidden($data);
				?>
			</td>
			<td><input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('structures_action_create'); ?>"  /></td>
		</tr>
		<?php echo form_close(); ?>
		<?php echo form_open($this->uri->uri_string()); ?>
		<tr>
			<td><strong>Pays</strong></td>
			<td>
				<?php echo form_dropdown('structures_ID_STR',$array_pays, set_value('structures_ID_STR', isset($structure['ID_STR']) ? $structure['ID_STR'] : '')); ?>		
				<?php
					$data = array(
						'structures_DEPARTEMENT_id'  => '53',
						'structures_TYPE_STRUCTURE_id' => '9',
					);
					echo form_hidden($data);
				?>
			</td>
			<td><input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('structures_action_create'); ?>"  /></td>
		</tr>
		<?php echo form_close(); ?>
	</table>
	<div class="form-actions">
		<?php echo anchor(SITE_AREA .'/mayenne/structures', lang('structures_cancel'), 'class="btn btn-warning"'); ?>
	</div>
</div>