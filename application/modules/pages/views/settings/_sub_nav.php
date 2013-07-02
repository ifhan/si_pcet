<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(3) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content') ?>" id="home"><?php echo lang('bf_home'); ?></a>
	</li>    
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/settings/pages') ?>" id="list"><?php echo lang('pages_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Pages.Settings.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/settings/pages/create') ?>" id="create_new"><?php echo lang('pages_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>