<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(3) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content') ?>" id="list"><?php echo lang('bf_home'); ?></a>
	</li>
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/mayenne/structures') ?>" id="list"><?php echo lang('structures_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Structures.Mayenne.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/mayenne/structures/create') ?>" id="create_new"><?php echo lang('structures_new'); ?></a>
	</li>
	<?php endif; ?>
        <li <?php echo $this->uri->segment(3) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/categories/show/2') ?>" id="help" target="_blank"><?php echo lang('bf_help'); ?></a>
	</li>        
</ul>