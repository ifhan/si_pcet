<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/pnr') ?>" id="list"><?php echo lang('pnr_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('PNR.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/pnr/create') ?>" id="create_new"><?php echo lang('pnr_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>