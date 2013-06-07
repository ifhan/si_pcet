<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/phases') ?>" id="list"><?php echo lang('phases_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Phases.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/phases/create') ?>" id="create_new"><?php echo lang('phases_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>