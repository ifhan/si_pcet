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

if (isset($engagement))
{
	$engagement = (array) $engagement;
}
$id = isset($engagement['id']) ? $engagement['id'] : '';

?>
<div class="admin-box">
	<h3><?php echo lang('engagement_create'); ?></h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

                        <?php if(isset($pcets)): ?>
                            <?php echo form_dropdown('engagement_ID_PCET',$pcets,set_value('engagement_ID_PCET', isset($pcets['ID_PCET']) ? $pcets['ID_PCET'] : ''),'Sélectionner un PCET');?>
                        <?php else: ?>
                            <div class="control-group">
                                <div class='controls'>
                                    <a href="<?php echo site_url(SITE_AREA .'/loireatlantique/pcet/create') ?>" class="btn" type="button">Ajouter un PCET</a>
                                    <span class='help-inline'>si aucun PCET n'a pas été saisi pour ce département.</span>
                                </div>
                            </div>                    
                        <?php endif; ?>
                    
			<div class="control-group <?php echo form_error('COMMENT_DDT') ? 'error' : ''; ?>">
				<?php echo form_label('Implication de la DDT', 'engagement_COMMENT_DDT', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?php echo form_textarea( array( 'name' => 'engagement_COMMENT_DDT', 'id' => 'engagement_COMMENT_DDT', 'rows' => '5', 'cols' => '80', 'value' => set_value('engagement_COMMENT_DDT', isset($engagement['COMMENT_DDT']) ? $engagement['COMMENT_DDT'] : '') ) ); ?>
					<span class='help-inline'><?php echo form_error('COMMENT_DDT'); ?></span>
				</div>
			</div>                    
                    
			<div class="control-group <?php echo form_error('DATE_DELIB') ? 'error' : ''; ?>">
				<?php echo form_label('Date de délibération', 'engagement_DATE_DELIB', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='engagement_DATE_DELIB' type='text' name='engagement_DATE_DELIB' maxlength="10" value="<?php echo set_value('engagement_DATE_DELIB', isset($engagement['DATE_DELIB']) ? $engagement['DATE_DELIB'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('DATE_DELIB'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NOTIF_DELIB_ETAT') ? 'error' : ''; ?>">
				<?php echo form_label('Date du courrier de la collectivité notifiant sa délibération a l\'État', 'engagement_NOTIF_DELIB_ETAT', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='engagement_NOTIF_DELIB_ETAT' type='text' name='engagement_NOTIF_DELIB_ETAT' maxlength="10" value="<?php echo set_value('engagement_NOTIF_DELIB_ETAT', isset($engagement['NOTIF_DELIB_ETAT']) ? $engagement['NOTIF_DELIB_ETAT'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NOTIF_DELIB_ETAT'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NOTIF_DELIB_CR') ? 'error' : ''; ?>">
				<?php echo form_label('Date du courrier de la collectivité notifiant sa délibération au Conseil régional', 'engagement_NOTIF_DELIB_CR', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='engagement_NOTIF_DELIB_CR' type='text' name='engagement_NOTIF_DELIB_CR' maxlength="10" value="<?php echo set_value('engagement_NOTIF_DELIB_CR', isset($engagement['NOTIF_DELIB_CR']) ? $engagement['NOTIF_DELIB_CR'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NOTIF_DELIB_CR'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('NOTIF_USH') ? 'error' : ''; ?>">
				<?php echo form_label('Date du courrier de notification d\'engagement de la collectivité à l\'USH', 'engagement_NOTIF_USH', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='engagement_NOTIF_USH' type='text' name='engagement_NOTIF_USH' maxlength="10" value="<?php echo set_value('engagement_NOTIF_USH', isset($engagement['NOTIF_USH']) ? $engagement['NOTIF_USH'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('NOTIF_USH'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('REP_USH') ? 'error' : ''; ?>">
				<?php echo form_label('Consultation aval de l\'USH souhaitée ?', 'engagement_REP_USH', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<label class='checkbox' for='engagement_REP_USH'>
						<input type='checkbox' id='engagement_REP_USH' name='engagement_REP_USH' value='1' <?php echo (isset($engagement['REP_USH']) && $engagement['REP_USH'] == 1) ? 'checked="checked"' : set_checkbox('engagement_REP_USH', 1); ?>>
						<span class='help-inline'><?php echo form_error('REP_USH'); ?></span>
					</label>
				</div>
			</div>

			<div class="control-group <?php echo form_error('DATE_REP_USH') ? 'error' : ''; ?>">
				<?php echo form_label('Date du courrier de réponse de l\'USH', 'engagement_DATE_REP_USH', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='engagement_DATE_REP_USH' type='text' name='engagement_DATE_REP_USH' maxlength="10" value="<?php echo set_value('engagement_DATE_REP_USH', isset($engagement['DATE_REP_USH']) ? $engagement['DATE_REP_USH'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('DATE_REP_USH'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('DATE_PAC') ? 'error' : ''; ?>">
				<?php echo form_label('Date du Porter-à-connaissance de l\'État', 'engagement_DATE_PAC', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='engagement_DATE_PAC' type='text' name='engagement_DATE_PAC' maxlength="10" value="<?php echo set_value('engagement_DATE_PAC', isset($engagement['DATE_PAC']) ? $engagement['DATE_PAC'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('DATE_PAC'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('engagement_action_create'); ?>"  />
				ou <?php echo anchor(SITE_AREA .'/loireatlantique/engagement', lang('engagement_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>