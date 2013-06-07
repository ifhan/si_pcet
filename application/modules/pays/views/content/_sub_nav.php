<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/pays') ?>" id="list"><?php echo lang('pays_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Pays.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/pays/create') ?>" id="create_new"><?php echo lang('pays_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>