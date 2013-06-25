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

if (isset($post))
{
    $post = (array) $post;
}
$id = isset($post['post_id']) ? $post['post_id'] : '';

?>
<div class="admin-box" >
    <h3>Nouvelle fiche</h3>
 
    <?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
    <fieldset>
 
    <div class="control-group <?php if (form_error('title')) echo 'error'; ?>">
        <label for="title">Titre</label>
        <div class="controls">
            <input type="text" name="title" class="input-xxlarge" value="<?php echo isset($post) ? $post->title : set_value('title'); ?>" />
            <?php if (form_error('title')) echo '<span class="help-inline">'. form_error('title') .'</span>'; ?>
        </div>
    </div>
 
    <div class="control-group <?php if (form_error('slug')) echo 'error'; ?>">
        <label for="slug">URL</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><?php echo site_url() .'aide/' ?></span>
                <input type="text" name="slug" class="input-xlarge" value="<?php echo isset($post) ? $post->slug : set_value('slug'); ?>" />
            </div>
            <?php if (form_error('slug')) echo '<span class="help-inline">'. form_error('slug') .'</span>'; ?>
            <p class="help-inline">Crée un lien permanent pour cette fiche d'aide.</p>
        </div>
    </div>
 
    <div class="control-group <?php if (form_error('body')) echo 'error'; ?>">
        <label for="body">Texte</label>
        <div class="controls">
            <?php if (form_error('body')) echo '<span class="help-inline">'. form_error('body') .'</span>'; ?>
			
            <textarea name="body" class="input-xxlarge" rows="15"><?php echo isset($post) ? $post->body : set_value('body') ?></textarea>
        </div>
    </div>
        
    <div class="form-actions">
        <input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('aide_action_create'); ?>"  />                               
        ou <?php echo anchor(SITE_AREA .'/content/aide', lang('aide_cancel'), 'class="btn btn-warning"'); ?>
    </div>

    </fieldset>
    <?php echo form_close(); ?>
</div>