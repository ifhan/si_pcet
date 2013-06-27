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

if (isset($adaptation))
{
	$adaptation = (array) $adaptation;
}
$id = isset($adaptation['id']) ? $adaptation['id'] : '';

?>
<div class="admin-box">
	<h3><?php echo lang('adaptation_add'); ?></h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

                        <?php if(isset($pcets)): ?>
                            <?php echo form_dropdown('adaptation_ID_PCET',$pcets,set_value('adaptation_ID_PCET', isset($pcets['ID_PCET']) ? $pcets['ID_PCET'] : ''),'Sélectionner un PCET');?>
                        <?php else: ?>
                            <div class="control-group">
                                <div class='controls'>
                                    <a href="<?php echo site_url(SITE_AREA .'/sarthe/pcet/create') ?>" class="btn" type="button">Ajouter un PCET</a>
                                    <span class='help-inline'>si aucun PCET n'a pas été saisi pour ce département.</span>
                                </div>
                            </div>                    
                        <?php endif; ?>
                        
			<div class="control-group <?php echo form_error('VULNERABLE_ADAPT') ? 'error' : ''; ?>">
				<?php echo form_label('Étude de vulnérabilité', 'adaptation_VULNERABLE_ADAPT', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<label class='checkbox' for='adaptation_VULNERABLE_ADAPT'>
						<input type='checkbox' id='adaptation_VULNERABLE_ADAPT' name='adaptation_VULNERABLE_ADAPT' value='1' <?php echo (isset($adaptation['VULNERABLE_ADAPT']) && $adaptation['VULNERABLE_ADAPT'] == 1) ? 'checked="checked"' : set_checkbox('adaptation_VULNERABLE_ADAPT', 1); ?>>
						<span class='help-inline'><?php echo form_error('VULNERABLE_ADAPT'); ?></span>
					</label>
				</div>
			</div>

			<div class="control-group <?php echo form_error('METHODE_ADAPT') ? 'error' : ''; ?>">
				<?php echo form_label('Méthodes employées', 'adaptation_METHODE_ADAPT', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'adaptation_METHODE_ADAPT', 'id' => 'adaptation_METHODE_ADAPT', 'rows' => '5', 'cols' => '80', 'value' => set_value('adaptation_METHODE_ADAPT', isset($adaptation['METHODE_ADAPT']) ? $adaptation['METHODE_ADAPT'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('METHODE_ADAPT'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ALEA_ADAPT') ? 'error' : ''; ?>">
				<?php echo form_label('Aléas identifiés', 'adaptation_ALEA_ADAPT', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'adaptation_ALEA_ADAPT', 'id' => 'adaptation_ALEA_ADAPT', 'rows' => '5', 'cols' => '80', 'value' => set_value('adaptation_ALEA_ADAPT', isset($adaptation['ALEA_ADAPT']) ? $adaptation['ALEA_ADAPT'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('ALEA_ADAPT'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('adaptation_action_create'); ?>"  />
				ou <?php echo anchor(SITE_AREA .'/sarthe/adaptation', lang('adaptation_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>