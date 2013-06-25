<script type="text/javascript">
		var xinha_plugins = [ 'Linker' ],
			xinha_editors = [ 'body' ];

		function xinha_init() {
			if ( ! Xinha.loadPlugins(xinha_plugins, xinha_init)) {
				return;
			}

			var xinha_config = new Xinha.Config();

			xinha_editors = Xinha.makeEditors(xinha_editors, xinha_config, xinha_plugins);
			Xinha.startEditors(xinha_editors);
		}
		xinha_init();
	</script>

<div class="admin-box" >
    <h3>Nouvelle fiche</h3>
 
    <?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
 
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
            <p class="help-block">Fiche consultable &agrave; cet URL unique</p>
        </div>
    </div>
 
    <div class="control-group <?php if (form_error('body')) echo 'error'; ?>">
        <label for="body">Texte</label>
        <div class="controls">
            <?php if (form_error('body')) echo '<span class="help-inline">'. form_error('body') .'</span>'; ?>
			
            <textarea name="body" class="input-xxlarge" rows="15"><?php echo isset($post) ? $post->body : set_value('body') ?></textarea>
        </div>
    </div>
	


    <?php echo form_close(); ?>
</div>