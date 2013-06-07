<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/communes') ?>" id="list"><?php echo lang('communes_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Communes.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/communes/create') ?>" id="create_new"><?php echo lang('communes_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>